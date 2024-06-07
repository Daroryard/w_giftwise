<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DocuCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hd = DB::table('docu_customer')->get();
        
        return view('backend.docucustomer.docucustomer-list', compact('hd'));
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
        $docs_last = DB::connection('sqlsrv_erp')->table('sal_project_hd')
            ->where('sal_project_hd_docuno', 'like', '%' . date('ym') . '%')
            ->orderBy('sal_project_hd_id', 'desc')->first();
        if ($docs_last) {
            $docs = 'PJ' . date('ym')  . str_pad($docs_last->sal_project_hd_number + 1, 4, '0', STR_PAD_LEFT);
            $docs_number = $docs_last->sal_project_hd_number + 1;
        } else {
            $docs = 'PJ' . date('ym')  . str_pad(1, 4, '0', STR_PAD_LEFT);
            $docs_number = 1;
        } 
        $hd = [
            'sal_project_hd_docuno' => $docs,
            'sal_project_hd_number' => $docs_number,
            'sal_project_hd_date' => $request->sal_project_hd_date,
            'sal_project_type_id' => 2,
            'sal_project_hd_remark' => $request->sal_project_hd_remark,
            'sal_project_status_id' => 2,
            'ms_customer_id' => $request->ms_customer_id,
            'sal_project_hd_update' => Carbon::now(),
            'sal_project_hd_save' => Auth::user()->name,
            'ms_customersub_id' => $request->ms_customersub_id,
            'sal_project_hd_duedate' => $request->sal_project_hd_duedate,
            'ms_customerduelist_id' => 0,
            'catalog' => 'N',
            'appointment' => 'N',
            'reserve' => 'N',
            'quotation' => 'N',
            'pj_status_id' => 1,
            'followup_date' => Carbon::now(),
            'pj_cost' => $request->pj_cost
        ];
        try{
            DB::beginTransaction();
            $in_hd = DB::connection('sqlsrv_erp')->table('sal_project_hd')->create($hd)->sal_project_hd_id;
            $last_id = DB::connection('sqlsrv_erp')->table('sal_project_hd')->latest('sal_project_hd_id')->first();
            foreach ($request->docu_customersub_id as $key => $value) {
                $ckdt = DB::table('docu_customersub')->where('docu_customersub_id',$value)->first();
                $pd = DB::connection('sqlsrv_erp')->table('vw_product_list')->where('ms_product_code',$ckdt->product_code)->first();
                $dt[] = [
                    'sal_project_hd_id' => $last_id->sal_project_hd_id,
                    'sal_project_dt_listno' => $key + 1,
                    'ms_product_category_id' => $pd->ms_product_id,
                    'ms_product_categorysub_code' => $ckdt->product_code,
                    'ms_product_categorysub_name' => $ckdt->product_name,
                    'sal_project_dt_duedate'  => $request->sal_project_hd_duedate,
                    'sal_project_dt_flag' => true,
                    'sal_project_dt_update' => Carbon::now(),
                    'sal_project_dt_qty' => $ckdt->product_qty,
                    'sal_project_dt_remark' => $ckdt->product_addon,
                    'ms_typescreen_id' => 0,
                    'ms_product_color_id' => 0,
                    'sal_project_dt_pic1' => '-',
                    'sal_project_dt_pic2' => '-',
                    'sal_project_dt_pic3' => '-',
                    'sal_project_dt_pic4' => '-',
                    'sal_project_dt_price' => $ckdt->product_price,
                    'user_id' => 0
                ];
            }
            $uphd = DB::table('docu_customer')
            ->where('docu_customer_id',$id)
            ->update([
                'emp_date' => Carbon::now(),
                'emp_person' => Auth::user()->name,
                'emp_remark' => $request->sal_project_hd_remark,
                'duedocuno' => $docs
            ]);
            DB::commit();
            return redirect()->route('docucustomer.index')->with('success', 'เพิ่มสินค้าเรียบร้อยแล้ว' . Carbon::now()->format('Y-m-d H:i:s'));
        } catch (Exception $e) {
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
        $hd = DB::table('docu_customer')->where('docu_customer_id',$id)->first();
        $cust = DB::table('erp_ms_customersub')->where('ms_customersub_email',$hd->docu_customer_email)->first();
        $users = DB::table('users')->where('email',$hd->docu_customer_email)->first();
        $dt = DB::table('docu_customersub')
        ->where('docu_customer_id',$id)
        ->get();
        $customer = DB::connection('sqlsrv_erp')->table('ms_customer')->where('ms_customer_flag',true)->get();
        return view('backend.docucustomer.docucustomer-edit', compact('hd','cust','users','dt','customer'));
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
