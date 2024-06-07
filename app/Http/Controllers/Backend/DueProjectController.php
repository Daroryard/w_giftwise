<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DueProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hd = DB::table('docu_project')
        ->leftjoin('erp_customersub','docu_project.docu_project_email','=','erp_customersub.ms_customersub_email')
        ->get();
        
        return view('backend.dueproject.dueproject-list', compact('hd'));
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
        $docs_last = DB::connection('sqlsrv_erp')->table('ms_customerduelist')->where('ms_customerduelist_docuno', 'like', '%' . date('ym') . '%')
        ->orderBy('id', 'desc')->first();
        if ($docs_last) {
            $docs = 'DUE' . date('ym') . str_pad($docs_last->ms_customerduelist_number + 1, 4, '0', STR_PAD_LEFT);
            $docs_number = $docs_last->ms_customerduelist_number + 1;
        } 
        else 
        {
            $docs = 'DUE' . date('ym')  . str_pad(1, 4, '0', STR_PAD_LEFT);
            $docs_number = 1;
        }
        $hd = [
            'ms_customerduelist_date' => $request->ms_customerduelist_date,
            'ms_customerduelist_docuno' => $docs,
            'ms_customerduelist_number' => $docs_number,
            'ms_customerduelist_duedate' => $request->ms_customerduelist_duedate,
            'ms_sales_funnel_id' => $request->ms_sales_funnel_id,              
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'ms_customer_id' => $request->ms_customer_id,
            'ms_customersub_id' => $request->ms_customersub_id,
            'ms_customersub_newsale' => $request->ms_customersub_newsale,
            'sale_id' => $request->sale_id,
            'ms_customerduelist_senddate' => $request->ms_customerduelist_senddate,
            'ms_customerduelist_price' => $request->ms_customerduelist_price,
            'ms_customerduelist_remark' => $request->ms_customerduelist_remark,
            'ms_customerduelist_save' =>  Auth::user()->name,
            'open_project' => false,
            'ms_customerduestatus_id' => 1,
            'sale_oldid' => 0
        ];
        try{
            DB::beginTransaction();
            $doc_hd = DB::connection('sqlsrv_erp')->table('ms_customerduelist')->insertGetId($hd);
            $uphd = DB::table('docu_project')
            ->where('docu_project_id',$id)
            ->update([
                'emp_date' => Carbon::now(),
                'emp_person' => Auth::user()->name,
                'emp_remark' => $request->ms_customerduelist_remark,
                'duedocuno' => $docs
            ]);
            DB::commit();
            return redirect()->route('dueproject.index')->with('success', 'เพิ่มสินค้าเรียบร้อยแล้ว' . Carbon::now()->format('Y-m-d H:i:s'));
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
        $hd = DB::table('docu_project')
        ->leftjoin('erp_customersub','docu_project.docu_project_email','=','erp_customersub.ms_customersub_email')
        ->where('docu_project_id',$id)->first();
        $cust = DB::table('erp_ms_customersub')->where('ms_customersub_email',$hd->docu_project_email)->first();
        $users = DB::table('users')->where('email',$hd->docu_project_email)->first();
        $customer = DB::connection('sqlsrv_erp')->table('ms_customer')->where('ms_customer_flag',true)->get();
        $sales = DB::connection('sqlsrv_erp')->table('ms_sales_funnel')->where('ms_sales_funnel_flag',true)->get();
        $docs_ck = DB::connection('sqlsrv_erp')->table('ms_customerduelist')->orderBy('id', 'desc')->first();
        $emp = DB::connection('sqlsrv_erp')->table('users')->where('id',$docs_ck->sale_id)->first();
        $emps = DB::connection('sqlsrv_erp')->table('users')->whereIn('ms_job_id',[17,18,19])->get();
        return view('backend.dueproject.dueproject-edit', compact('hd','cust','users','customer','sales','emp','emps'));
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
    
    public function getSubCustomer(Request $request)
    {
        $subcustomer = DB::connection('sqlsrv_erp')->table('ms_customersub')->where('ms_customer_id', $request->ms_customer_id)->get();
        return response()->json(['status' => true, 'subcustomer' => $subcustomer]);
    }
}
