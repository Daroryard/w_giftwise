<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\SaleProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategorySub;
use Illuminate\Support\Facades\DB;


class DiscoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pdsale = SaleProduct::where('conf_mainproduct_name_th','not like','ค่า%')
        ->where('conf_mainproduct_img1','<>',null)
        ->orderBy('qty','DESC')
        ->inRandomOrder()->take(30)
        ->get();
        $categ1 = Category::where('conf_category_active',1)
        ->whereIn('conf_category_id',[20,21,22,23,24])
        ->inRandomOrder()->take(4)
        ->get();
        $categ2 = Category::where('conf_category_active',1)
        ->whereIn('conf_category_id',[28,29,30,31,35])
        ->inRandomOrder()->take(4)
        ->get();

        $categories = CategorySub::where('conf_categorysub_active', 1)
        ->orderBy('conf_category_id', 'asc')
        ->where('conf_categorysub_img1','<>',null)
        ->get();

       


        return view('frontend.discover.discover-detail' , compact('pdsale','categ1','categ2','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function discover()
    {
        
        $pdsale = SaleProduct::where('conf_mainproduct_name_th','not like','ค่า%')
        ->where('conf_mainproduct_img1','<>',null)
        ->orderBy('qty','DESC')
        ->inRandomOrder()->take(30)
        ->get();
        $categ1 = Category::where('conf_category_active',1)
        ->whereIn('conf_category_id',[20,21,22,23,24])
        ->inRandomOrder()->take(4)
        ->get();
        $categ2 = Category::where('conf_category_active',1)
        ->whereIn('conf_category_id',[28,29,30,31,35])
        ->inRandomOrder()->take(4)
        ->get();

        $categories = CategorySub::where('conf_categorysub_active', 1)
        ->orderBy('conf_category_id', 'asc')
        ->where('conf_categorysub_img1','<>',null)
        ->get();

       
        return view('frontend.discover.discover-detail' , compact('pdsale','categ1','categ2','categories'));
    }

    public function searchCategory (Request $request){

        $keyword = $request->search;

        $category = DB::table('conf_mainproduct')
        ->select('conf_mainproduct_id' , 'conf_category_name_th' , 'conf_category_name_en')
        ->where('conf_category_name_th' , 'LIKE' , '%'.$keyword.'%')
        ->orWhere('conf_category_name_en' , 'LIKE' , '%'.$keyword.'%')
        ->groupBy('conf_mainproduct_id' ,'conf_category_name_th','conf_category_name_en')
        ->get();

        $productname = DB::table('conf_mainproduct')
        ->select('conf_mainproduct_id' , 'conf_mainproduct_name_th' , 'conf_mainproduct_name_en')
        ->where('conf_mainproduct_name_th' , 'LIKE' , '%'.$keyword.'%')
        ->orWhere('conf_mainproduct_name_en' , 'LIKE' , '%'.$keyword.'%')->get();


        return response()->json(['category' => $category , 'productname' => $productname]);


    }
}
