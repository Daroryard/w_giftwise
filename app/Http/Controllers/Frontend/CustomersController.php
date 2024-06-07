<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\CategorySub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use PDF, App;
use App\Helpers;





class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cat = Category::where('conf_category_active',1)
        // ->whereIn('conf_category_id',[20,21,22,23,24,28,29,30,31,35])->get();
       
        // $pj = DB::table('docu_review')
        // ->whereNotNull('docu_review_img1')->get();

        // //dd($pj);
        // return view('frontend.customer.customer-detail' , compact('cat','pj'));
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

    public function customerProject($id,$ref)
    {
        
        // $cat = Category::where('conf_category_active',1)
        // ->whereIn('conf_category_id',[20,21,22,23,24,28,29,30,31,35])->get();
       
        // $pj = DB::table('conf_projectlist')->whereNotNull('conf_projectlist_img1')->where('conf_projectlist_id',$ref)->first();


        // $product_main = explode("-",$pj->conf_projectlist_pdcode);

        $arr_img = array();


        $review = DB::table('vw_feedbackcust')->get();


        foreach($review as $r)
        {
            if($r->feedback_pic1 != null)
            {
                $arr_img[] = [
                    'id' => $r->ms_product_code,
                    'img' => $r->feedback_pic1
                ];
            }
            if($r->feedback_pic2 != null)
            {
                $arr_img[] = [
                    'id' => $r->ms_product_code,
                    'img' => $r->feedback_pic2
                ];
            }
            if($r->feedback_pic3 != null)
            {
                $arr_img[] = [
                    'id' => $r->ms_product_code,
                    'img' => $r->feedback_pic3
                ];
            }
            if($r->feedback_pic4 != null)
            {
                $arr_img[] = [
                    'id' => $r->ms_product_code,
                    'img' => $r->feedback_pic4
                ];
            }
          
        }

        // $review = DB::table('docu_review')->get();
        
        return view('frontend.customer.customer-detail' , compact('review','arr_img'));

    }

    public function getModalReview(Request $request)
    {
        $code = $request->ref;


        $review = DB::table('docu_review')
        ->join('conf_subproduct', 'docu_review.product_code', '=', 'conf_subproduct.conf_subproduct_code')
        ->join('conf_mainproduct', 'conf_subproduct.conf_mainproduct_id', '=', 'conf_mainproduct.conf_mainproduct_id')
        ->where('docu_review.product_code' , $code)
        ->orderBy('docu_review_id','desc')
        ->limit(1)
        ->first();

        $ck = 0;

        if($review == null)
        {

            $review = DB::table('docu_review')
            ->where('product_code' , $code)
            ->orderBy('docu_review_id','desc')
            ->limit(1)
            ->first();

            $ck = 1;

        }





     

       

        return response()->json([
            'review' => $review,
            'ck' => $ck
        ]);
        
    }

    public function loginCustomer (Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $password = md5($password);

        $user = DB::table('users')->where('email' , $email)->where('password' , $password)->where('role' , 'customer')->first();


        if($user){

            $request->session()->put('customer', $user);

            return response()->json(['status' => 'success']);

        }else{

            return response()->json(['status' => 'error']);

        }

    }

    public function logoutCustomer (Request $request)
    {
        $request->session()->forget('customer');

        return redirect()->route('home');
    }


    public function profileCustomer()
    {


        $projectlist = DB::table('conf_projectlist')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('conf_projectlist_img1', '<>', null)
        ->get();


        
        // dd($projectlist);



       
        return view('frontend.profilecustomer.home-customer' , compact('projectlist'));
    }

    public function saveRating(Request $request){
    
        $rate = $request->rate;
        $remark = $request->remark;
        $project = $request->project;


        try{

            DB::beginTransaction();

            $data = [
                'conf_projectlist_score' => $rate,
                'conf_projectlist_remark_th' => $remark,
                'updated_at' => carbon::now()
            ];

            $review = DB::table('conf_projectlist')->where('conf_projectlist_id',$project)->update($data);

            DB::commit();

            return response()->json([
                'status' => 'success'
            ]);

        }catch(\Exception $e){

            DB::rollback();

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);

        }




    }

    public function projectDetail(Request $request)
    {
        $id = $request->ref;

        $project = DB::table('conf_projectlist')
        ->where('conf_projectlist_id',$id)
        ->get();

        return response()->json($project);
    }
    
    

    public function quotationCustomer() {

        $cart = Cart::content();

        $cart_count = Cart::count();

        $totalprice_cart = array();

        $sku_cart = count($cart);

     

        foreach($cart as $key => $item){


            $totalprice_cart[] = ($item->options->subproduct['price'] * $item->qty);

        }

        $net_totalprice_cart = array_sum($totalprice_cart);





        return view('frontend.profilecustomer.home-quotation-list' , compact('cart','cart_count','net_totalprice_cart','sku_cart'));


    }

    public function quotationSend() {



        $quotation_send = DB::table('vw_quotationlist')
        ->where('ms_customersub_email',session('customer')->email)
        ->whereNotNull('ms_product_pic1')
        ->whereNotIn('sal_confirmorder_status_name', ['ยกเลิก','รอยืนยันออเดอร์'])
        ->get();




        return view('frontend.profilecustomer.home-quotation-send' , compact('quotation_send'));


      
    }


    public function quotationDetail(Request $request) {


        $quotation_send = DB::table('vw_quotationlist')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('sal_quotation_dt_id',$request->ref)
        ->where('sal_confirmorder_status_name', '<>', 'ยกเลิก')
        ->first();


        return response()->json($quotation_send);


    }


        


    public function quotationCancel() {

        $quotation_cancel = DB::table('vw_quotationlist')
        ->where('ms_customersub_email',session('customer')->email)
        ->whereNotNull('ms_product_pic1')
        ->where('sal_confirmorder_status_name', 'ยกเลิก')
        ->get();




        return view('frontend.profilecustomer.home-quotation-cancel', compact('quotation_cancel'));


      
    }

    public function productionAll() {

        $production_all = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        // ->whereIn('webconfirmorder_status_id',[1,8])
        ->get();


        $count_confirm = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        // ->whereIn('webconfirmorder_status_id',[1,8])
        ->count();

        return view('frontend.profilecustomer.home-production-all' , compact('production_all','count_confirm'));

    }

    public function productionConfirm() {

        $production_confirm = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('webconfirmorder_status_id',1)
        ->get();

        // dd($production_confirm);

        $count_confirm = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('webconfirmorder_status_id',1)
        ->count();




        return view('frontend.profilecustomer.home-production-confirm' , compact('production_confirm','count_confirm'));

    }

    public function productionConfirmWait() {

        $production_confirm = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('webconfirmorder_status_id',8)
        ->get();

        $count_confirm = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('webconfirmorder_status_id',8)
        ->count();

        return view('frontend.profilecustomer.home-production-confirm-wait' , compact('production_confirm','count_confirm'));

    }

    
    public function productionPrototype() {

        $production_prototype = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->whereIn('webconfirmorder_status_id',[3,9])
        ->get();

        $count_confirm = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->whereIn('webconfirmorder_status_id',[3,9])
        ->count();

        return view('frontend.profilecustomer.home-production-prototype' , compact('production_prototype','count_confirm'));

    }

    public function productionPrototypeCreate() {
            
            $production_prototype = DB::table('vw_confirmorderlist')
            ->whereNotNull('sal_confirmorder_dt_imgpic')
            ->where('ms_customersub_email',session('customer')->email)
            ->where('webconfirmorder_status_id',3)
            ->get();
    
            $count_confirm = DB::table('vw_confirmorderlist')
            ->whereNotNull('sal_confirmorder_dt_imgpic')
            ->where('ms_customersub_email',session('customer')->email)
            ->where('webconfirmorder_status_id',3)
            ->count();
    
            return view('frontend.profilecustomer.home-production-prototype-create' , compact('production_prototype','count_confirm'));

    }


    public function productionPrototypeWait() {
            
        $production_prototype = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('webconfirmorder_status_id',9)
        ->get();

        $count_confirm = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('webconfirmorder_status_id',9)
        ->count();

        return view('frontend.profilecustomer.home-production-prototype-wait' , compact('production_prototype','count_confirm'));
    }



    public function productionPrototypeEdit() {
            
        $production_prototype = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('webconfirmorder_status_id',8)
        ->get();

        $count_confirm = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('webconfirmorder_status_id',8)
        ->count();

        return view('frontend.profilecustomer.home-production-prototype-edit' , compact('production_prototype','count_confirm'));
    }



    public function productionReal() {

        $production_real = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('webconfirmorder_status_id',4)
        ->get();

        $count_confirm = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('webconfirmorder_status_id',4)
        ->count();



        return view('frontend.profilecustomer.home-production-real' , compact('production_real','count_confirm'));

    }


    public function productionRealWait() {

        $production_real = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('webconfirmorder_status_id',4)
        ->get();

        $count_confirm = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('webconfirmorder_status_id',4)
        ->count();

        return view('frontend.profilecustomer.home-production-real-wait' , compact('production_real','count_confirm'));

    }

    public function productionRealConfirm() {

        // $production_real = DB::table('vw_confirmorderlist')
        // ->whereNotNull('sal_confirmorder_dt_imgpic')
        // ->where('ms_customersub_email',session('customer')->email)
        // // ->where('sal_confirmorder_dt_status',3)
        // ->get();

        // $count_confirm = DB::table('vw_confirmorderlist')
        // ->whereNotNull('sal_confirmorder_dt_imgpic')
        // ->where('ms_customersub_email',session('customer')->email)
        // // ->where('sal_confirmorder_dt_status',3)
        // ->count();

        // return view('frontend.profilecustomer.home-production-real-confirm' , compact('production_real','count_confirm'));


        // return view('frontend.error.404');

    }

    public function productionRealEdit() {
            
            // $production_real = DB::table('vw_confirmorderlist')
            // ->whereNotNull('sal_confirmorder_dt_imgpic')
            // ->where('ms_customersub_email',session('customer')->email)
            // // ->where('sal_confirmorder_dt_status',3)
            // ->get();
    
            // $count_confirm = DB::table('vw_confirmorderlist')
            // ->whereNotNull('sal_confirmorder_dt_imgpic')
            // ->where('ms_customersub_email',session('customer')->email)
            // // ->where('sal_confirmorder_dt_status',3)
            // ->count();
    
            // return view('frontend.profilecustomer.home-production-real-edit' , compact('production_real','count_confirm'));
    
        }
       




    public function productionWarehouse() {

        $production_warehouse = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('webconfirmorder_status_id',4)
        ->get();

        $count_confirm = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('webconfirmorder_status_id',4)
        ->count();



        return view('frontend.profilecustomer.home-production-warehouse' , compact('production_warehouse','count_confirm'));

    }




    public function warehouseAll() {

        $warehouse_all = DB::table('vw_stocklist')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('stcqty1','>',0)
        ->get();

        $check_issue = DB::table('docu_customer')
        ->select('docu_customerstock.docu_customer_id',DB::raw('SUM(docu_customerstock.docu_customerstock_qty) as docu_customerstock_qty'),'docu_customerstock.docu_customerstock_status','docu_customerstock.sal_salecommand_dt_id')
        ->join('docu_customerstock','docu_customer.docu_customer_id','=','docu_customerstock.docu_customer_id')
        ->where('docu_customerstock.docu_customerstock_status','N')
        ->groupBy('docu_customerstock.docu_customer_id','docu_customerstock.sal_salecommand_dt_id','docu_customerstock.docu_customerstock_status')
        ->get();



        foreach($warehouse_all as $key => $item)
        {
            $item->issue = 0;

            $sum = 0;

            foreach($check_issue as $issue)
            {


                if($item->sal_salecommand_dt_id == $issue->sal_salecommand_dt_id)
                {

                    $sum += $issue->docu_customerstock_qty;

                    $item->issue = 1;

                }

                $item->issue_qty = $sum;



            }


        }




        $count_warehouse = DB::table('vw_stocklist')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('stcqty1','>',0)
        ->count();

        $checklast_order = DB::table('docu_customer')
        ->where('docu_customer_email',session('customer')->email)
        ->orderBy('docu_customer_id','desc')->limit(1)->first();

        $ck = 0;

        if($checklast_order != null)
        {
            $ck = 1;
        }else{
            $ck = 0;
        }


        // dd($checklast_order);


        
        return view('frontend.profilecustomer.home-warehouse-all-in' , compact('warehouse_all','count_warehouse','checklast_order','ck'));

    }


    public function warehouseAllOut() {
        

        $warehouse_all = DB::table('vw_stocklist')
        // ->where('ms_customersub_email',session('customer')->email)
        ->where('stcqty1',0)
        ->get();

        $count_warehouse = DB::table('vw_stocklist')
        // ->where('ms_customersub_email',session('customer')->email)
        ->where('stcqty1',0)
        ->count();

        $checklast_order = DB::table('docu_customer')
        ->where('docu_customer_email',session('customer')->email)
        ->orderBy('docu_customer_id','desc')->limit(1)->first();

        $ck = 0;

        if($checklast_order != null)
        {
            $ck = 1;
        }else{
            $ck = 0;
        }


    return view('frontend.profilecustomer.home-warehouse-all-out' , compact('warehouse_all','count_warehouse','checklast_order','ck'));

     
    }

    public function warehouseGiftwise() {
        $warehouse_all = DB::table('vw_stocklist')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('stcqty1','>',0)
        ->get();

        $check_issue = DB::table('docu_customer')
        ->select('docu_customerstock.docu_customer_id',DB::raw('SUM(docu_customerstock.docu_customerstock_qty) as docu_customerstock_qty'),'docu_customerstock.docu_customerstock_status','docu_customerstock.sal_salecommand_dt_id')
        ->join('docu_customerstock','docu_customer.docu_customer_id','=','docu_customerstock.docu_customer_id')
        ->where('docu_customerstock.docu_customerstock_status','N')
        ->groupBy('docu_customerstock.docu_customer_id','docu_customerstock.sal_salecommand_dt_id','docu_customerstock.docu_customerstock_status')
        ->get();



        foreach($warehouse_all as $key => $item)
        {
            $item->issue = 0;

            $sum = 0;

            foreach($check_issue as $issue)
            {


                if($item->sal_salecommand_dt_id == $issue->sal_salecommand_dt_id)
                {

                    $sum += $issue->docu_customerstock_qty;

                    $item->issue = 1;

                }

                $item->issue_qty = $sum;



            }


        }


        $count_warehouse = DB::table('vw_stocklist')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('stcqty1','>',0)
        ->count();

        $checklast_order = DB::table('docu_customer')
        ->where('docu_customer_email',session('customer')->email)
        ->orderBy('docu_customer_id','desc')->limit(1)->first();

        $ck = 0;

        if($checklast_order != null)
        {
            $ck = 1;
        }else{
            $ck = 0;
        }

        return view('frontend.profilecustomer.home-warehouse-giftwise-in' , compact('warehouse_all','count_warehouse','checklast_order','ck'));

    }

    public function warehouseGiftwiseOut() {

      
        $warehouse_all = DB::table('vw_stocklist')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('stcqty1',0)
        ->get();

        $count_warehouse = DB::table('vw_stocklist')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('stcqty1',0)
        ->count();

        $checklast_order = DB::table('docu_customer')
        ->where('docu_customer_email',session('customer')->email)
        ->orderBy('docu_customer_id','desc')->limit(1)->first();

        $ck = 0;

        if($checklast_order != null)
        {
            $ck = 1;
        }else{
            $ck = 0;
        }

        return view('frontend.profilecustomer.home-warehouse-giftwise-out' , compact('warehouse_all','count_warehouse','checklast_order','ck'));

    }

    public function warehouseDeposit() {
        $warehouse_all = DB::table('vw_stocklist')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('stcqty1','>',0)
        ->get();

        $check_issue = DB::table('docu_customer')
        ->select('docu_customerstock.docu_customer_id',DB::raw('SUM(docu_customerstock.docu_customerstock_qty) as docu_customerstock_qty'),'docu_customerstock.docu_customerstock_status','docu_customerstock.sal_salecommand_dt_id')
        ->join('docu_customerstock','docu_customer.docu_customer_id','=','docu_customerstock.docu_customer_id')
        ->where('docu_customerstock.docu_customerstock_status','N')
        ->groupBy('docu_customerstock.docu_customer_id','docu_customerstock.sal_salecommand_dt_id','docu_customerstock.docu_customerstock_status')
        ->get();



        foreach($warehouse_all as $key => $item)
        {
            $item->issue = 0;

            $sum = 0;

            foreach($check_issue as $issue)
            {


                if($item->sal_salecommand_dt_id == $issue->sal_salecommand_dt_id)
                {

                    $sum += $issue->docu_customerstock_qty;

                    $item->issue = 1;

                }

                $item->issue_qty = $sum;



            }


        }




        $count_warehouse = DB::table('vw_stocklist')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('stcqty1','>',0)
        ->count();

        $checklast_order = DB::table('docu_customer')
        ->where('docu_customer_email',session('customer')->email)
        ->orderBy('docu_customer_id','desc')->limit(1)->first();

        $ck = 0;

        if($checklast_order != null)
        {
            $ck = 1;
        }else{
            $ck = 0;
        }


        return view('frontend.profilecustomer.home-warehouse-deposit' , compact('warehouse_all','count_warehouse','checklast_order','ck'));

    }

    public function transport() {

        $orderlist = DB::table('vw_deliverylist')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('deliverydocu_status_id',1)
        ->where('docu_review_remeak',null)
        ->get();

        $count_orderlist = DB::table('vw_deliverylist')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('deliverydocu_status_id',1)
        ->where('docu_review_remeak',null)
        ->count();

        // dd($orderlist);

        return view('frontend.profilecustomer.home-warehouse-transport' , compact('orderlist','count_orderlist'));

    }

    public function transportDelivered(Request $request) {


        $orderlist = DB::table('vw_deliverylist')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('deliverydocu_status_id',3)
        ->where('docu_review_remeak','<>',null)
        ->get();

        $count_orderlist = DB::table('vw_deliverylist')
        ->where('ms_customersub_email',session('customer')->email)
        ->where('deliverydocu_status_id',3)
        ->where('docu_review_remeak','<>',null)
        ->count();

        // dd($orderlist);

        return view('frontend.profilecustomer.home-warehouse-transport-success' , compact('orderlist','count_orderlist'));

    }

      

    public function productionConfirmDetail(Request $request) {


        $production_confirm = DB::table('vw_confirmorderlist')
        ->whereNotNull('sal_confirmorder_dt_imgpic')
        ->where('sal_confirmorder_dt_id',$request->ref)
        ->get();


        foreach($production_confirm as $key => $item)
        {


            $co = DB::table('erp_sal_confirmorder_hd')->where('sal_confirmorder_hd_id',$item->sal_confirmorder_hd_id)->first();

            $item->quotation = DB::table('erp_sal_quotation_hd')
            ->select('sal_quotation_hd_id','sal_quotation_hd_docuno','sal_project_hd_docuno')
            ->where('erp_sal_quotation_hd.sal_quotation_hd_id',$co->sal_quotation_hd_id)
            ->first();

        }

        $inv = DB::connection('sqlsrv_erp')->table('sal_quotation_log')
        ->where('sal_quotation_hd_id', $production_confirm[0]->quotation->sal_quotation_hd_id)
        ->first();

        if($inv != null)
        {
            $production_confirm[0]->inv = $inv;

        }else{
            $production_confirm[0]->inv = null;
        }


        $sd = DB::connection('sqlsrv_erp')->table('sal_saleorder_hd')
        ->where('sal_project_hd_docuno', $production_confirm[0]->quotation->sal_project_hd_docuno)
        ->first();


        if($sd != null)
        {
            $production_confirm[0]->sd = $sd;

            // check paypal

            $production_confirm[0]->so = DB::connection('sqlsrv_erp')->table('sal_salecommand_hd')
            ->select('paypal_time')
            ->where('sal_salecommand_hd_id',$sd->sal_salecommand_hd_id)
            ->first();

        }else{

            $production_confirm[0]->sd = null;
            $production_confirm[0]->so = null;


        }




        return response()->json($production_confirm);


    }




    public function confirmOrder (Request $request) {

        $id = $request->ref;

        try{

        $confirm = DB::connection('sqlsrv_erp')->table('sal_confirmorder_dt')
        ->where('sal_confirmorder_dt_id' , $id)
        ->update([
            'webconfirmorder_status_id' => 3
        ]);

        DB::commit();

        return response()->json([
            'status' => 'success'
        ]);
        

        }catch(\Exception $e){

            DB::rollback();

            return response()->json([
                'status' => 'error'
            ]);


        }


    }

    public function editConfirmOrder (Request $request) {

        $id = $request->ref;
        $remark = $request->detail;

        try{

        $confirm = DB::connection('sqlsrv_erp')->table('sal_confirmorder_dt')
        ->where('sal_confirmorder_dt_id' , $id)
        ->update([
            'webconfirmorder_status_id' => 8,
            'webconfirmorder_remark' => $remark
        ]);

        DB::commit();

        return response()->json([
            'status' => 'success'
        ]);
        

        }catch(\Exception $e){

            DB::rollback();

            return response()->json([
                'status' => 'error'
            ]);

        }

    }

    public function confirmPrototype (Request $request) {

        $id = $request->ref;

        try{

        $confirm = DB::connection('sqlsrv_erp')->table('sal_confirmorder_dt')
        ->where('sal_confirmorder_dt_id' , $id)
        ->update([
            'webconfirmorder_status_id' => 3
        ]);

        DB::commit();

        return response()->json([
            'status' => 'success'
        ]);
        

        }catch(\Exception $e){

            DB::rollback();

            return response()->json([
                'status' => 'error'
            ]);

        }

    }

    public function wareHousesaveOrder (Request $request) {

        $sku = $request->sku;
        $qty = $request->qty;
        $email = $request->fm_email;
        $name = $request->fm_name;
        $phone = $request->fm_phone;
        $address = $request->fm_address;
        $district = $request->fm_district;
        $amphoe = $request->fm_amphoe;
        $province = $request->fm_province;
        $zipcode = $request->fm_zipcode;

        $fulladdress = $address.' '.$district.' '.$amphoe.' '.$province.' '.$zipcode;
    

        try{

        DB::beginTransaction();

        $data_customer = [
            'docu_customer_email' => $email,
            'docu_customer_companyname' => $name,
            'docu_customer_tel' => $phone,
            'docu_customer_companyemail' => $email,
            'docu_customer_remark' => $fulladdress,
            'docu_customer_design' => '1',
            'docu_customer_flag' => '1',
            'docu_customer_name' => $name,
            'created_at' => carbon::now(),
            'updated_at' => carbon::now(),
            'docu_customer_type' => 'เบิกสินค้า'
        ];

        $customer = DB::table('docu_customer')->insertGetId($data_customer);

        $data_item = array();

       

        foreach($sku as $key => $item){

            $check_stock = DB::table('vw_stocklist')->where('sal_salecommand_dt_id',$item)->first();

            $data_item[] = [
                'sal_salecommand_dt_id' => $item,
                'mpddocuno' => $check_stock->mpddocuno,
                'ms_product_code' => $check_stock->ms_product_code,
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
                'person_save' => session('customer')->name,
                'sal_salecommand_dt_qty' => intval($check_stock->stcqty1),
                'docu_customerstock_qty' => $qty[$key],
                'ms_typescreen_name' => $check_stock->ms_typescreen_name,
                'ms_product_name' => $check_stock->ms_product_name1,
                'ms_packing_name' => $check_stock->ms_packing_name,
                'docu_customerstock_flag' => '1',
                'docu_customerstock_status' => 'N',
                'docu_customer_id' => $customer
            ];

            
      

        }

        $customer_stock = DB::table('docu_customerstock')->insert($data_item);

        DB::commit();

        return response()->json([
            'status' => 'success'
        ]);
            
        }catch(\Exception $e){

            DB::rollback();

            $massage = $e->getMessage();

            return response()->json([
                'status' => 'error',
                'message' => $massage
            ]);

        }

       return response()->json($request->all());

    }





    public function wareHousesaveOrderOld (Request $request) {

        $sku = $request->sku;
        $qty = $request->qty;
        $email = $request->fm_email;
        $name = $request->fm_name;
        $phone = $request->fm_phone;
        $address = $request->fm_address;
      
        $fulladdress = $address;

        
        try{

            DB::beginTransaction();
    
            $data_customer = [
                'docu_customer_email' => $email,
                'docu_customer_companyname' => $name,
                'docu_customer_tel' => $phone,
                'docu_customer_companyemail' => $email,
                'docu_customer_remark' => $fulladdress,
                'docu_customer_design' => '1',
                'docu_customer_flag' => '1',
                'docu_customer_name' => $name,
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
                'docu_customer_type' => 'เบิกสินค้า'
            ];
    
            $customer = DB::table('docu_customer')->insertGetId($data_customer);
    
            $data_item = array();
    
           
    
            foreach($sku as $key => $item){
    
                $check_stock = DB::table('vw_stocklist')->where('sal_salecommand_dt_id',$item)->first();
    
                $data_item[] = [
                    'sal_salecommand_dt_id' => $item,
                    'mpddocuno' => $check_stock->mpddocuno,
                    'ms_product_code' => $check_stock->ms_product_code,
                    'created_at' => carbon::now(),
                    'updated_at' => carbon::now(),
                    'person_save' => session('customer')->name,
                    'sal_salecommand_dt_qty' => intval($check_stock->stcqty1),
                    'docu_customerstock_qty' => $qty[$key],
                    'ms_typescreen_name' => $check_stock->ms_typescreen_name,
                    'ms_product_name' => $check_stock->ms_product_name1,
                    'ms_packing_name' => $check_stock->ms_packing_name,
                    'docu_customerstock_flag' => '1',
                    'docu_customerstock_status' => 'N',
                    'docu_customer_id' => $customer
                ];
    
                
          
    
            }
    
            $customer_stock = DB::table('docu_customerstock')->insert($data_item);
    
            DB::commit();
    
            return response()->json([
                'status' => 'success',
                'all' => $request->all()
            ]);
                
            }catch(\Exception $e){
    
                DB::rollback();
    
                $massage = $e->getMessage();
    
                return response()->json([
                    'status' => 'error',
                    'message' => $massage
                ]);
    
            }
    
           return response()->json($request->all());

    }

       


    public function footCheckStock(Request $request) {

        $id = $request->skudt;

        $warehouse = DB::table('vw_stocklist')
        ->whereIn('sal_salecommand_dt_id',$id)
        ->get();

        return response()->json([
            'status' => 'success'
        ]);

    }

    public function wareHouseOutOrder (Request $request) {

        $sku = $request->sku;
        $address = $request->fm_address;
        $amphoe = $request->fm_amphoe;
        $district = $request->fm_district;
        $email = $request->fm_email;
        $name = $request->fm_name;
        $phone = $request->fm_phone;
        $province = $request->fm_province;
        $zipcode = $request->fm_zipcode;
        $fulladdress = $address.' '.$district.' '.$amphoe.' '.$province.' '.$zipcode;



        try{

        DB::beginTransaction();


        $data_customer = [
            'docu_customer_email' => $email,
            'docu_customer_companyname' => $name,
            'docu_customer_tel' => $phone,
            'docu_customer_companyemail' => $email,
            'docu_customer_remark' => $fulladdress,
            'docu_customer_design' => '1',
            'docu_customer_flag' => '1',
            'docu_customer_name' => $name,
            'created_at' => carbon::now(),
            'updated_at' => carbon::now(),
            'docu_customer_type' => 'สั่งซื้ออีกครั้ง'
        ];

        $customer = DB::table('docu_customer')->insertGetId($data_customer);


        $data_item = array();

        foreach($sku as $key => $item)
        {

            $check_so = DB::table('erp_sal_salecommand_dt')
            ->where('sal_salecommand_dt_id',$item)
            ->first();
    

            $data_item[] = [
                'docu_customerreturn_name' => $name,
                'docu_customerreturn_tel' => $phone,
                'docu_customerreturn_email' => $email,
                'product_code' => $check_so->ms_product_code,
                'product_name' => $check_so->ms_product_name1,
                'product_qty' => $check_so->sal_salecommand_dt_qty,
                'docu_customerreturn_address' => $fulladdress,
                'created_at' => carbon::now(),
                'updated_at' => carbon::now(),
                'docu_customerstock_id' => $customer
            ];

        }

        $customer_stock = DB::table('docu_customerreturn')->insert($data_item);

        DB::commit();

        return response()->json([
            'status' => 'success'
        ]);

        }catch(\Exception $e){

            DB::rollback();

            $massage = $e->getMessage();

            return response()->json([
                'status' => 'error',
                'message' => $massage
            ]);

        }





        return response()->json($check_so);


    }

    public function transpotProductDetail (Request $request) {

        $id = $request->ref;

        $product = DB::table('vw_deliverylist')
        ->where('deliverydocu_dt_id',$id)
        ->get();

        return response()->json($product);

    }


    public function logoutCustomerBack ()
    {

        session()->forget('customer');

        return redirect()->route('home');
       
    }


    public function downloadQuotation ($id) {

        $quotation = DB::table('erp_sal_quotation_hd')
        ->join('erp_sal_quotation_dt','erp_sal_quotation_hd.sal_quotation_hd_id','=','erp_sal_quotation_dt.sal_quotation_hd_id')
        ->join('erp_ms_customer','erp_sal_quotation_hd.ms_customer_id','=','erp_ms_customer.ms_customer_id')
        ->join('erp_ms_customersub','erp_sal_quotation_hd.ms_customersub_id','=','erp_ms_customersub.ms_customersub_id')
        ->join('erp_ms_currency','erp_sal_quotation_hd.ms_currency_id','=','erp_ms_currency.ms_currency_id')
        ->where('erp_sal_quotation_hd.sal_quotation_hd_id',$id)
        ->get();

        $docuno = DB::table('erp_sal_quotation_hd')
        ->join('erp_ms_customer','erp_sal_quotation_hd.ms_customer_id','=','erp_ms_customer.ms_customer_id')
        ->join('erp_ms_customersub','erp_sal_quotation_hd.ms_customersub_id','=','erp_ms_customersub.ms_customersub_id')
        ->join('erp_ms_currency','erp_sal_quotation_hd.ms_currency_id','=','erp_ms_currency.ms_currency_id')
        ->where('sal_quotation_hd_id',$id)
        ->first();


        $pdf = App::make('dompdf.wrapper');

        PDF::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif','margin-top' => 0,'margin-bottom' => 0,'margin-left' => 0,'margin-right' => 0]);
        $pdf = PDF::loadView('frontend.profilecustomer.download-quotation', compact('quotation','docuno'))
        ->setPaper('a4', 'portrait');

        $filename_format_docs = $docuno->sal_quotation_hd_docuno;



        // view pdf
        // return $pdf->stream($filename_format_docs.'.pdf');


        // load pdf
        return $pdf->download($filename_format_docs.'.pdf');



    }

    public function downloadCO ($dt,$hd){


        // connect erp

        $confirmorder = DB::connection('sqlsrv_erp')->table('sal_confirmorder_hd')
        ->join('ms_typevat', 'sal_confirmorder_hd.ms_typevat_id', '=', 'ms_typevat.ms_typevat_id')
        ->join('ms_currency', 'sal_confirmorder_hd.ms_currency_id', '=', 'ms_currency.ms_currency_id')
        ->join('ms_customersub', 'sal_confirmorder_hd.ms_customersub_id', '=', 'ms_customersub.ms_customersub_id')
        ->join('ms_customer', 'sal_confirmorder_hd.ms_customer_id', '=', 'ms_customer.ms_customer_id')
        ->where('sal_confirmorder_hd_id', $hd)->first();

        if ($confirmorder == null) {
            $confirmorder = DB::connection('sqlsrv_erp')->table('sal_confirmorder_hd')
                ->join('ms_typevat', 'sal_confirmorder_hd.ms_typevat_id', '=', 'ms_typevat.ms_typevat_id')
                ->join('ms_currency', 'sal_confirmorder_hd.ms_currency_id', '=', 'ms_currency.ms_currency_id')
                ->join('ms_customer', 'sal_confirmorder_hd.ms_customer_id', '=', 'ms_customer.ms_customer_id')
                ->where('sal_confirmorder_hd_id', $hd)->first();
        }


        $dt = DB::connection('sqlsrv_erp')->table('sal_confirmorder_dt')
            ->join('sal_confirmorder_hd', 'sal_confirmorder_dt.sal_confirmorder_hd_id', '=', 'sal_confirmorder_hd.sal_confirmorder_hd_id')
            ->join('ms_typescreen', 'sal_confirmorder_dt.ms_typescreen_id', '=', 'ms_typescreen.ms_typescreen_id')
            ->join('vw_product_list', 'sal_confirmorder_dt.ms_product_code', '=', 'vw_product_list.ms_product_code')
            ->join('ms_packing', 'sal_confirmorder_dt.sal_confirmorder_dt_packremark', '=', 'ms_packing.ms_packing_id')
            ->join('ms_confirmorder', 'sal_confirmorder_dt.sal_confirmorder_dt_conremark', '=', 'ms_confirmorder.ms_confirmorder_id')
            ->where('sal_confirmorder_dt.sal_confirmorder_hd_id', $hd)
            ->where('sal_confirmorder_dt.sal_confirmorder_dt_id', $dt)
            ->where('vw_product_list.ms_warehouse_id', 1)
            ->where('sal_confirmorder_dt.sal_confirmorder_dt_flag', 1)
            ->get();

        // dd($dt);


        $ms_remark = DB::connection('sqlsrv_erp')->table('comfirmorder_remark')
            ->orderBy('comfirmorder_remark_listno', 'ASC')
            ->get();


        $sub = DB::connection('sqlsrv_erp')->table('sal_confirmorder_sub')->where('sal_confirmorder_hd_id', $hd)
            ->where('sal_confirmorder_dt_id', $dt[0]->sal_confirmorder_dt_id)
            ->orderBy('sal_confirmorder_sub_listno', 'ASC')
            ->get();


        foreach ($dt as $key => $val) {
            $arr_sub[$val->sal_confirmorder_dt_id] = DB::connection('sqlsrv_erp')->table('sal_confirmorder_sub')->where('sal_confirmorder_hd_id', $hd)
                ->where('sal_confirmorder_dt_id', $val->sal_confirmorder_dt_id)
                ->orderBy('sal_confirmorder_sub_listno', 'ASC')
                ->get();
        }



        $pdf = App::make('dompdf.wrapper');



        $pdf = PDF::loadView('frontend.profilecustomer.download-confirmorder', compact('confirmorder', 'dt', 'ms_remark', 'sub', 'arr_sub'))
        ->setPaper('a4', 'landscape');

        $filename_format_docs = $confirmorder->sal_confirmorder_hd_docuno;

        // view pdf

        //   return $pdf->stream($filename_format_docs.'.pdf');

        // load pdf

        return $pdf->download($filename_format_docs.'.pdf');

    }

    public function downloadInvoice ($id){

        $quotation = DB::connection('sqlsrv_erp')->table('sal_quotation_hd')
        ->leftjoin('sal_quotation_status','sal_quotation_hd.sal_quotation_status_id','=','sal_quotation_status.sal_quotation_status_id')
        ->leftjoin('ms_customer','sal_quotation_hd.ms_customer_id','=','ms_customer.ms_customer_id')
        ->leftjoin('ms_customersub','sal_quotation_hd.ms_customersub_id','=','ms_customersub.ms_customersub_id')
        ->leftJoin('ms_currency', 'sal_quotation_hd.ms_currency_id', '=', 'ms_currency.ms_currency_id')
        ->leftjoin('sal_quotation_log', 'sal_quotation_hd.sal_quotation_hd_id', '=', 'sal_quotation_log.sal_quotation_hd_id')
        ->where('sal_quotation_hd.sal_quotation_hd_id', $id)
        ->first();
        $checkcus = DB::connection('sqlsrv_erp')->table('sal_quotation_hd')->where('sal_quotation_hd_id', $id)->first();
        $ms_customer = DB::connection('sqlsrv_erp')->table('vw_customer_list')->where('ms_customer_id',$checkcus->ms_customer_id)->first();


        $dt = DB::connection('sqlsrv_erp')->table('sal_quotation_hd')
        ->join('sal_quotation_dt','sal_quotation_hd.sal_quotation_hd_id','=','sal_quotation_dt.sal_quotation_hd_id')
        ->join('vw_product_list','sal_quotation_dt.ms_product_code','=','vw_product_list.ms_product_code')
        ->join('ms_currency','sal_quotation_hd.ms_currency_id','=','ms_currency.ms_currency_id')
        ->where('sal_quotation_dt.sal_quotation_hd_id', $id)
        ->where('sal_quotation_dt.sal_quotation_dt_flag', true)
        ->get();



        $company = DB::connection('sqlsrv_erp')->table('ms_company')->get();



        $podepo = DB::connection('sqlsrv_erp')->table('sal_quotation_Invoice')
        ->join('sal_quotation_hd', 'sal_quotation_hd.sal_quotation_hd_id', '=', 'sal_quotation_Invoice.sal_quotation_hd_id')
        ->where('sal_quotation_hd.sal_quotation_hd_id', $id)
        ->where('sal_quotation_Invoice_flag', true)
        ->get();





        $remark = DB::connection('sqlsrv_erp')->table('quotation_remark')->get();
        $remark1 = DB::connection('sqlsrv_erp')->table('quotation_remark')->where('quotation_remark_id',1)->first();
        $remark2 = DB::connection('sqlsrv_erp')->table('quotation_remark')->where('quotation_remark_id',2)->first();
        $remark3 = DB::connection('sqlsrv_erp')->table('quotation_remark')->where('quotation_remark_id',3)->first();
        $remark4 = DB::connection('sqlsrv_erp')->table('quotation_remark')->where('quotation_remark_id',4)->first();
        $remark5 = DB::connection('sqlsrv_erp')->table('quotation_remark')->where('quotation_remark_id',5)->first();


        // pdf

        $pdf = App::make('dompdf.wrapper');

        $pdf = PDF::loadView('frontend.profilecustomer.download-invoice', compact('quotation','dt','company','podepo','remark','ms_customer','remark1','remark2','remark3','remark4','remark5'))
        ->setPaper('a4', 'portrait');

        $filename_format_docs = $quotation->invoice_docuno;

        // view pdf

        return $pdf->stream($filename_format_docs.'.pdf');

        // load pdf

        // return $pdf->download($filename_format_docs.'.pdf');

       
    }

    public function downloadSaleOrder ($id) {

        $hd = DB::connection('sqlsrv_erp')->table('sal_saleorder_hd')
        ->leftjoin('ms_customer', 'sal_saleorder_hd.ms_customer_id', '=', 'ms_customer.ms_customer_id')
        ->leftjoin('ms_customersub', 'sal_saleorder_hd.ms_customersub_id', '=', 'ms_customersub.ms_customersub_id')
        ->join('ms_typevat', 'ms_typevat.ms_typevat_id', '=', 'sal_saleorder_hd.ms_typevat_id')
        ->join('ms_currency', 'ms_currency.ms_currency_id', '=', 'sal_saleorder_hd.ms_currency_id')
        ->join('sal_saleorder_status', 'sal_saleorder_status.sal_saleorder_status_id', '=', 'sal_saleorder_hd.sal_saleorder_status_id')
        ->where('sal_saleorder_hd_id', '=', $id)
        ->first();
        
        // dd($hd);
        $dt = DB::connection('sqlsrv_erp')->table('sal_saleorder_hd')
        ->join('sal_saleorder_dt', 'sal_saleorder_hd.sal_saleorder_hd_id', '=', 'sal_saleorder_dt.sal_saleorder_hd_id')
        ->join('ms_currency', 'sal_saleorder_hd.ms_currency_id', '=', 'ms_currency.ms_currency_id')
        ->where('sal_saleorder_hd.sal_saleorder_hd_id', '=', $id)
        ->get();


        // dd($dt);
        $company = DB::connection('sqlsrv_erp')->table('ms_company')->get();
        // dd($company);
        // dd($hd);
        $remark = DB::connection('sqlsrv_erp')->table('quotation_remark')->get();     

        // dd($remark);


        $pdf = App::make('dompdf.wrapper');

        $pdf = PDF::loadView('frontend.profilecustomer.download-saleorder', compact('hd','dt','company','remark'))
        ->setPaper('a4', 'portrait');

        $filename_format_docs = $hd->sal_saleorder_hd_docuno;

        // view pdf

        // return $pdf->stream($filename_format_docs.'.pdf');

        // load pdf

        return $pdf->download($filename_format_docs.'.pdf');



    }


    public function generateOrderLink (Request $request){

        $id = $request->ref;

        $date = Carbon::now();

        $string = $id.'/'.$date;

        $token = base64_encode($string);



        return response()->json([
            'status' => 'success',
            'token' => $token
        ]);



    }

    public function confirmOrderLink ($token){


        try{

        $datenow = Carbon::now();

        $token = base64_decode($token);

        $token = explode('/',$token);

        $ref = $token[0];

        $date = $token[1];




        if($datenow->diffInDays($date) > 1)
        {

            return redirect()->route('home');

        }else{

            $production_confirm = DB::table('vw_confirmorderlist')
            ->whereNotNull('sal_confirmorder_dt_imgpic')
            ->where('webconfirmorder_status_id',1)
            ->where('sal_confirmorder_dt_id',$ref)
            ->first();

            if($production_confirm == null)
            {
                return redirect()->route('home');
            }else{
                    
                    return view('frontend.profilecustomer.link-confirm-order',compact('ref'));
    
                
            }


        }



        }catch(\Exception $e){

            return redirect()->route('home');

        }


    }



    public function generateOrderLinkProduct (Request $request){

        $id = $request->ref;

        $date = Carbon::now();

        $string = $id.'/'.$date;

        $token = base64_encode($string);



        return response()->json([
            'status' => 'success',
            'token' => $token
        ]);



    }


    public function productOrderLink ($token){


        try{

        $datenow = Carbon::now();

        $token = base64_decode($token);

        $token = explode('/',$token);

        $ref = $token[0];

        $date = $token[1];




        if($datenow->diffInDays($date) > 1)
        {

            return redirect()->route('home');

        }else{

            $production_confirm = DB::table('vw_confirmorderlist')
            ->whereNotNull('sal_confirmorder_dt_imgpic')
            ->where('sal_confirmorder_dt_id',$ref)
            ->first();

            if($production_confirm == null)
            {
                return redirect()->route('home');
            }else{
                    
                    return view('frontend.profilecustomer.link-product-order',compact('ref'));
    
                
            }


        }



        }catch(\Exception $e){

            return redirect()->route('home');

        }


    }
  

   


    
}
