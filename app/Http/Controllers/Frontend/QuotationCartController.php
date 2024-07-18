<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\MainProduct;
use App\Models\CategorySub;
use App\Models\Category;
use App\Models\SubProduct;
use Illuminate\Support\Facades\DB;


class QuotationCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
        $cart = Cart::content();

        $cart_count = Cart::count();

        $totalprice_cart = array();

        $sku_cart = count($cart);

     

        foreach($cart as $key => $item){


            $totalprice_cart[] = ($item->options->subproduct['price'] * $item->qty);

        }

        $net_totalprice_cart = array_sum($totalprice_cart);


        return view('frontend.quotation.quotation', compact('cart','cart_count', 'net_totalprice_cart', 'sku_cart'));
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


        $duplicate = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id && $cartItem->options->subproduct['id'] === $request->subproduct['id'];
        });

        if($duplicate->isNotEmpty()){
            return response()->json(['status' => 'duplicate' , 'message' => 'มีสินค้านี้อยู่ในตะกร้าแล้ว']);
        }

        $mainproduct = MainProduct::where('conf_mainproduct_id', $request->id)->first();


        $subproduct = SubProduct::where('conf_subproduct_id', $request->subproduct['id'])->first();

   



        $screen_day = floatval($request->addon['day']);

        $timeline_day = floatval($request->timeline['day']);

        $packaging_day = floatval($request->packaging['day']);

        $day_addon = $screen_day + $timeline_day + $packaging_day;

        $cal = (($subproduct->conf_subproduct_days / $subproduct->conf_subproduct_quota) * $request->qty) + $day_addon;

        $cal_integer = intval($cal);

        try{

        $subproductPrice = floatval($request->subproduct['price']);

        Cart::add([
            'id' => $request->id,
            'name' => $mainproduct->conf_mainproduct_name_th,
            'qty' => $request->qty,
            'price' => $request->total,
            'weight' => 0,
            'options' => [
                'subproduct_price' => $subproductPrice,
                'subproduct' => $request->subproduct,
                'addon' => $request->addon,
                'timeline' => $request->timeline,
                'packaging' => $request->packaging,
                'totalday' => $cal_integer,
                'img' => $mainproduct->conf_mainproduct_img1
            ]
        ]);


        $cart = Cart::content();

        $sku_cart = count($cart);

      



        return response()->json(['status' => true , 'cart' => Cart::content() , 'count' => Cart::count() , 'total_day' => $cal_integer , 'sku_cart' => $sku_cart]);


        }catch(\Exception $e){


            return response()->json(['status' => false , 'message' => $e->getMessage()]);


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


    public function quotationIndex () {
          
        $cart = Cart::content();

        $cart_count = Cart::count();

        $totalprice_cart = array();

        $sku_cart = count($cart);

     

        foreach($cart as $key => $item){


            $totalprice_cart[] = ($item->options->subproduct['price'] * $item->qty);

        }

        $net_totalprice_cart = array_sum($totalprice_cart);


        return view('frontend.quotation.quotation', compact('cart','cart_count', 'net_totalprice_cart', 'sku_cart'));
    }

    public function cartCount () {

        $cart = Cart::content();


        $sku_cart = count($cart);


        return response()->json(['sku_cart' => $sku_cart]);


    }

    public function cartDelete (Request $request) {

        try{

            $id = $request->id;

            $cart = Cart::content();

          foreach($cart as $key => $item){

            if($item->options->subproduct['id'] == $id){

                Cart::remove($item->rowId);

            }

          }

          return response()->json(['status' => true , 'cart' => Cart::content() , 'count' => Cart::count()]);

        }catch(\Exception $e){

            return response()->json(['status' => false , 'message' => $e->getMessage()]);

        }

    }

    public function checkLeadtime (Request $request) {

        try{

            $id = $request->subid;

            $qty = $request->qty;


            $subproduct = SubProduct::where('conf_subproduct_id', $id)->first();

            $screen_day = floatval($request->screen_day) ?? 0;
    
            $timeline_day = floatval($request->timeline_day) ?? 0;
    
            $packaging_day = floatval($request->packaging_day) ?? 0;
    
            $day_addon = $screen_day + $timeline_day + $packaging_day;
    
            $cal = (($subproduct->conf_subproduct_days / $subproduct->conf_subproduct_quota) * $qty) + $day_addon;
    
            $cal_integer = intval($cal);


            return response()->json(['status' => true , 'total_day' => $cal_integer]);

        }catch(\Exception $e){

            return response()->json(['status' => false , 'message' => $e->getMessage()]);

        }

    }








    public function quoTationSave (Request $request) {

        try{

            DB::beginTransaction();


            $fullname = $request->fm_fullname;
            $company = $request->fm_company;
            $tel = $request->fm_tel;
            $companyemail = $request->fm_companyemail;
            $message = $request->fm_message;
            $account_option = $request->fm_account_option;
            $fm_taxid = $request->fm_taxid;
            $fulladdress = $request->fm_address.' '.$request->fm_district.' '.$request->fm_amphoe.' '.$request->fm_province.' '.$request->fm_zipcode;
            
            $insert = DB::table('docu_customer')->insertGetId([
                'docu_customer_email' => $companyemail,
                'docu_customer_companyname' => $company,
                'docu_customer_tel' => $tel,
                'docu_customer_companyemail' => $companyemail,
                'docu_customer_remark' => $message,
                'docu_customer_design' => 1,
                'docu_customer_flag' => 1,
                'docu_customer_name' => $fullname,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'docu_customer_companyaddress' => $fulladdress,
                'docu_customer_companytaxid' => $fm_taxid,
            ] , 'docu_customer_id');

            if(Cart::count() > 0){
                $customer = DB::table('docu_customer')->where('docu_customer_id' , $insert)->first();
                foreach(Cart::content() as $key => $value){
                    $product = DB::table('conf_subproduct')->where('conf_subproduct_id' , $value->options['subproduct']['id'])->first();
                    $product_price = $value->options['subproduct']['price'];
                    $product_total = $value->options['subproduct']['price'] * $value->options['subproduct']['qty'];
                    $product_qty = $value->options['subproduct']['qty'];
                    $product_day = $value->options['totalday'];
                    $product_addon = [
                        $value->options['addon']['name'],
                        $value->options['timeline']['name'],
                        $value->options['packaging']['name'],
                    ];

                       $insertsub = DB::table('docu_customersub')->insert([
                        'docu_customer_id' => $insert,
                        'product_code' => $product->conf_subproduct_code,
                        'product_name' => $product->conf_subproduct_name_th,
                        'product_price' => $product_price,
                        'product_qty' => $product_qty,
                        'product_total' => $product_total,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'product_addon' => implode(',' , $product_addon),
                        'product_days'  => $product_day,
                        'docu_customersub_flag' => $customer->docu_customer_flag,
                    ]);
                    
                }
            }


            if($insert && $insertsub){

                Cart::destroy();

            }



        DB::commit();



        return response()->json(['all' => $request->all(), 'cart' => Cart::content() , 'count' => Cart::count(), 'customer' => $customer, 'status' => true]);


        }catch(\Exception $e){

            DB::rollback();

            

            return response()->json(['status' => false , 'message' => $e->getMessage()]);

        }



    }



}
