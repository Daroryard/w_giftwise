<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SaleConfirmorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $hd = DB::table('erp_sal_confirmorder_hd')
        ->leftjoin('erp_ms_customer','erp_sal_confirmorder_hd.ms_customer_id','=','erp_ms_customer.ms_customer_id')
        ->leftjoin('erp_ms_customersub','erp_sal_confirmorder_hd.ms_customersub_id','=','erp_ms_customersub.ms_customersub_id')
        ->select('erp_sal_confirmorder_hd.*','erp_ms_customer.ms_customer_fullname','erp_ms_customersub.ms_customersub_name','erp_ms_customersub.ms_customersub_email','erp_ms_customersub.ms_customersub_tel')
        ->where('sal_confirmorder_hd_id',$id)
        ->first();
        $dt = DB::table('erp_sal_confirmorder_dt')
        ->leftjoin('erp_ms_productsub','erp_sal_confirmorder_dt.ms_product_code','=','erp_ms_productsub.ms_productsub_code')
        ->where('sal_confirmorder_hd_id',$id)
        ->where('sal_confirmorder_dt_flag',true)
        ->get();
        $tra = DB::table('erp_sal_confirmorder_sub')
        ->where('sal_confirmorder_hd_id',$id)
        ->where('sal_confirmorder_sub_flag',true)
        ->get();
        return view('backend.saleconfirmorder.sale-confirmorder-detail', compact('hd','dt','tra'));
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
}
