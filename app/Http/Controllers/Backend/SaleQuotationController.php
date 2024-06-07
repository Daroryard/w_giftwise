<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SaleQuotationController extends Controller
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
        $hd = DB::table('erp_sal_quotation_hd')
        ->leftjoin('erp_ms_customer','erp_sal_quotation_hd.ms_customer_id','=','erp_ms_customer.ms_customer_id')
        ->leftjoin('erp_ms_customersub','erp_sal_quotation_hd.ms_customersub_id','=','erp_ms_customersub.ms_customersub_id')
        ->select('erp_sal_quotation_hd.*','erp_ms_customer.ms_customer_fullname','erp_ms_customersub.ms_customersub_name','erp_ms_customersub.ms_customersub_email','erp_ms_customersub.ms_customersub_tel')
        ->where('sal_quotation_hd_id',$id)
        ->first();
        $dt = DB::table('erp_sal_quotation_dt')
        ->leftjoin('erp_ms_productsub','erp_sal_quotation_dt.ms_product_code','=','erp_ms_productsub.ms_productsub_code')
        ->where('sal_quotation_hd_id',$id)
        ->where('sal_quotation_dt_flag',true)
        ->get();
        $pay = DB::table('erp_sal_quotation_Invoice')
        ->where('sal_quotation_hd_id',$id)
        ->where('sal_quotation_Invoice_flag',true)
        ->get();
        return view('backend.salequotation.sale-quotation-detail', compact('hd','dt','pay'));
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
    public function printQuotation($id)
    {
        $hd = DB::table('erp_sal_quotation_hd')
        ->leftjoin('erp_sal_quotation_status','erp_sal_quotation_hd.sal_quotation_status_id','=','erp_sal_quotation_status.sal_quotation_status_id')
        ->leftjoin('erp_ms_customersub','erp_sal_quotation_hd.ms_customersub_id','=','erp_ms_customersub.ms_customersub_id')
        ->where('erp_sal_quotation_hd.sal_quotation_hd_id', $id)
        ->first();
        $checkcus = DB::table('erp_sal_quotation_hd')->where('sal_quotation_hd_id', $id)->first();
        $dt = DB::table('erp_sal_quotation_dt')->where('sal_quotation_hd_id', $id)
        ->where('sal_quotation_dt_flag', true)
        ->get();
        $company = DB::table('erp_ms_company')->get();
        $remark = DB::table('erp_quotation_remark')->get();
        $ms_customer = DB::table('erp_ms_customer')->where('ms_customer_id',$checkcus->ms_customer_id)->first();
        return view('backend.salequotation.sale-quotation-print-th', compact('hd', 'dt', 'id', 'company', 'remark', 'ms_customer'));
    }
    public function printQuotationEn($id)
    {
        $hd = DB::table('erp_sal_quotation_hd')
        ->leftjoin('erp_sal_quotation_status','erp_sal_quotation_hd.sal_quotation_status_id','=','erp_sal_quotation_status.sal_quotation_status_id')
        ->leftjoin('erp_ms_customersub','erp_sal_quotation_hd.ms_customersub_id','=','erp_ms_customersub.ms_customersub_id')
        ->where('erp_sal_quotation_hd.sal_quotation_hd_id', $id)
        ->first();
        $checkcus = DB::table('erp_sal_quotation_hd')->where('sal_quotation_hd_id', $id)->first();
        $dt = DB::table('erp_sal_quotation_dt')->where('sal_quotation_hd_id', $id)
        ->where('sal_quotation_dt_flag', true)
        ->get();
        $company = DB::table('erp_ms_company')
        ->get();
        $remark = DB::table('erp_quotation_remark')->get();
        $ms_customer = DB::table('erp_ms_customer')->where('ms_customer_id',$checkcus->ms_customer_id)->first();
        return view('backend.salequotation.sale-quotation-print-en', compact('hd', 'dt', 'id', 'company', 'remark', 'ms_customer'));    
    }
    public function getQuotationDetailPrint(Request $request)
    {
        $hd = DB::table('erp_sal_quotation_hd')
        ->leftjoin('erp_sal_quotation_status','erp_sal_quotation_hd.sal_quotation_status_id','=','erp_sal_quotation_status.sal_quotation_status_id')
        ->leftjoin('erp_ms_customer','erp_sal_quotation_hd.ms_customer_id','=','erp_ms_customer.ms_customer_id')
        ->leftjoin('erp_ms_customersub','erp_sal_quotation_hd.ms_customersub_id','=','erp_ms_customersub.ms_customersub_id')
        ->leftJoin('erp_ms_currency', 'erp_sal_quotation_hd.ms_currency_id', '=', 'erp_ms_currency.ms_currency_id')
        ->leftjoin('erp_sal_quotation_log', 'erp_sal_quotation_hd.sal_quotation_hd_id', '=', 'erp_sal_quotation_log.sal_quotation_hd_id')
        ->where('erp_sal_quotation_hd.sal_quotation_hd_id', $request->refid)
        ->first();
        $checkcus = DB::table('erp_sal_quotation_hd')->where('sal_quotation_hd_id', $request->refid)->first();
        $ms_customer = DB::table('erp_ms_customer')->where('ms_customer_id',$checkcus->ms_customer_id)->first();
        $dt = DB::table('erp_sal_quotation_dt')->where('sal_quotation_hd_id',$request->refid)
        ->where('sal_quotation_dt_flag', true)
        ->get();
        $company = DB::table('erp_ms_company')->get();
        $podepo = DB::table('erp_sal_quotation_Invoice')
        ->join('erp_sal_quotation_hd', 'erp_sal_quotation_hd.sal_quotation_hd_id', '=', 'erp_sal_quotation_Invoice.sal_quotation_hd_id')
        ->where('erp_sal_quotation_hd.sal_quotation_hd_id', $request->refid)
        ->where('erp_sal_quotation_Invoice.sal_quotation_Invoice_flag', true)
        ->get();
        $remark = DB::table('erp_quotation_remark')->get();
        return response()->json(
            [
                'status' => true,
                'hd' => $hd,
                'dt' => $dt,
                'company' => $company,
                'podepo' => $podepo,
                'remark' => $remark,
                'ms_customer' => $ms_customer
            ]);
    }
    public function printInvoiceQt($id)
    {
        $hd = DB::table('erp_sal_quotation_hd')
        ->leftjoin('erp_sal_quotation_status','erp_sal_quotation_hd.sal_quotation_status_id','=','erp_sal_quotation_status.sal_quotation_status_id')
        ->leftjoin('erp_ms_customer','erp_sal_quotation_hd.ms_customer_id','=','erp_ms_customer.ms_customer_id')
        ->leftjoin('erp_ms_customersub','erp_sal_quotation_hd.ms_customersub_id','=','erp_ms_customersub.ms_customersub_id')
        ->leftjoin('erp_sal_quotation_log', 'erp_sal_quotation_hd.sal_quotation_hd_id', '=', 'erp_sal_quotation_log.sal_quotation_hd_id')
        ->where('erp_sal_quotation_hd.sal_quotation_hd_id', $id)
        ->first();
        $dt = DB::table('erp_sal_quotation_dt')->where('sal_quotation_hd_id', $id)
        ->where('sal_quotation_dt_flag', true)
        ->get();       
        $company = DB::table('erp_ms_company')->get();
        $remark = DB::table('erp_quotation_remark')->get();       
        return view('backend.saleinvoice.sale-invoice-print', compact('hd', 'dt', 'id', 'company', 'remark')); 
    }
}
