<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\MainProduct;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public $folder_products_img;
    public function __construct()
    {
        $this->folder_products_img = config('constants.folder_products_imgs');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = MainProduct::orderBy("conf_mainproduct_id", "asc")->get();
        return view('backend.product.main-product-list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $erp_products = DB::table('erp_productlist')->get();
        $erp_categorysublist = DB::table('erp_categorysublist')->get();
        // dd($erp_products[0]);
        return view('backend.product.create', compact('erp_products' , 'erp_categorysublist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'erp_product' => 'required',
            'product_code' => 'required',
            'product_name_th' => 'required',
            'product_name_en' => 'required',
            'hashtag_th' => 'required',
            'hashtag_en' => 'required',
            'slug' => 'required',
            'product_price_qty50' => 'required',
            'product_price_qty100' => 'required',
            'product_price_qty300' => 'required',
            'product_price_qty500' => 'required',
            'product_price_qty1000' => 'required',
        ]);

            if(count($request->hashtag_en) != count($request->hashtag_th)){
                return redirect()->back()->withInput()->withErrors('จำนวนแท็กภาษาไทยและภาษาอังกฤษไม่เท่ากัน');
            }

        try{
            $data = $request->all();
            $data['slug'] = Str::slug($request->slug);
            $data['hashtag_th'] = $request->hashtag_th ? implode(',', $request->hashtag_th) : null;
            $data['hashtag_en'] = $request->hashtag_en ? implode(',', $request->hashtag_en) : null;
            $data['created_at'] = Carbon::now();
            if($request->hasFile('product_image')){
                foreach($request->file('product_image') as $key => $file){
                    $data['product_img' . ($key+1)] = $file->storeAs($this->folder_products_img, Str::slug($request->slug) . '-' . $key + 1 . '-' . Carbon::now()->format('YmdHis') . '.' .$file->getClientOriginalExtension());
                }
            }
            DB::beginTransaction();
            $product = Product::create($data);
            foreach($request->hashtag_en as $key => $tag){
                ProductTag::create([
                    'conf_product_tag_name_th' => $request->hashtag_th[$key],
                    'conf_product_tag_name_en' => $request->hashtag_en[$key],
                    'conf_product_tag_active' => 1,
                    'conf_product_id' => $product->conf_product_id,
                    'created_at' => Carbon::now()
                ]);
            }
            DB::commit();
            return redirect()->route('product.index')->with('success', 'เพิ่มสินค้าเรียบร้อยแล้ว' . Carbon::now()->format('Y-m-d H:i:s'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = MainProduct::findOrFail($id);
        return view('backend.product.main-product-edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'erp_product' => 'required',
            'product_code' => 'required',
            'product_name_th' => 'required',
            'product_name_en' => 'required',
            'hashtag_th' => 'required',
            'hashtag_en' => 'required',
            'slug' => 'required',
            'product_price_qty50' => 'required',
            'product_price_qty100' => 'required',
            'product_price_qty300' => 'required',
            'product_price_qty500' => 'required',
            'product_price_qty1000' => 'required',
        ]);

        if(count($request->hashtag_en) != count($request->hashtag_th)){
            return redirect()->back()->withInput()->withErrors('จำนวนแท็กภาษาไทยและภาษาอังกฤษไม่เท่ากัน');
        }

        try{
            $data = $request->all();
            $data['slug'] = Str::slug($request->slug);
            $data['hashtag_th'] = $request->hashtag_th ? implode(',', $request->hashtag_th) : null;
            $data['hashtag_en'] = $request->hashtag_en ? implode(',', $request->hashtag_en) : null;
            $data['updated_at'] = Carbon::now();
            for($i=1; $i<=9; $i++){
                if($request->hasFile('product_img' . $i)){
                    if(File::exists(public_path($product['product_img' . $i]))){
                        File::delete(public_path($product['product_img' . $i]));
                    }
                    $data['product_img' . $i] = $request->file('product_img' . $i)->storeAs($this->folder_products_img, Str::slug($request->slug) . '-' . $i . '-' . Carbon::now()->format('YmdHis') . '.' .$request->file('product_img' . $i)->getClientOriginalExtension());
                }
            }
            DB::beginTransaction();
            $product->update($data);
            $product->productTags()->delete();
            foreach($request->hashtag_en as $key => $tag){
                ProductTag::create([
                    'conf_product_tag_name_th' => $request->hashtag_th[$key],
                    'conf_product_tag_name_en' => $request->hashtag_en[$key],
                    'conf_product_tag_active' => 1,
                    'conf_product_id' => $product->conf_product_id,
                    'created_at' => Carbon::now()
                ]);
            }
            DB::commit();
            return redirect()->route('product.index')->with('success', 'แก้ไขสินค้าเรียบร้อยแล้ว ' . Carbon::now()->format('Y-m-d H:i:s'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(!$product){
            return response()->json(['success' => false, 'msg' => 'ไม่พบข้อมูล']);
        }
        try {
            DB::beginTransaction();
            for($i=1; $i<=9; $i++){
                if(File::exists(public_path($product['product_img' . $i]))){
                    File::delete(public_path($product['product_img' . $i]));
                }
            }
            $product->delete();
            DB::commit();
            return response()->json(['success' => true , 'msg' => 'ลบข้อมูลสำเร็จ']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'msg' => 'เกิดข้อผิดพลาดในการลบข้อมูล']);
        }
    }

    public function status(Request $request)
    {
        $product = Product::find($request->id);
        if(!$product){
            return response()->json(['success' => false, 'msg' => 'ไม่พบข้อมูล']);
        }
        $product->product_active = $request->product_active;
        $product->updated_at = Carbon::now();
        $product->save();
        return response()->json(['success' => true , 'msg' => 'แก้ไขสถานะสำเร็จ']);
    }
}
