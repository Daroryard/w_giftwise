<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DueQuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == "superadmin"){
            $hd = DB::table('erp_dueproject')->get();
        } 
        elseif(Auth::user()->role == "customer"){
            $hd = DB::table('erp_dueproject')->where('ms_customersub_email',Auth::user()->email)->get();
        }
        return view('backend.duequotation.duequotation-list', compact('hd'));
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
        $request->validate([
            'docu_transport_number' => ['required'],
        ]);    
        try{
            DB::beginTransaction();
            foreach ($request->sal_salecommand_hd_id as $key => $value) {
               $hd = DB::table('docu_transport')->insert([
                'ref_id' => $value,
                'ref_docuno' => $request->sal_salecommand_hd_docuno[$key],
                'docu_transport_number' => $request->docu_transport_number[$key],
                'docu_transport_remark' => $request->docu_transport_remark[$key],
                'created_at' => Carbon::now(),
                'docu_transport_save' => Auth::user()->name,
               ]);
            }
            DB::commit();
            return redirect()->route('duequotation.index')->with('success', 'เพิ่มสินค้าเรียบร้อยแล้ว' . Carbon::now()->format('Y-m-d H:i:s'));
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
        $hd = DB::table('erp_sal_salecommand_hd')
        ->leftjoin('erp_ms_customer','erp_sal_salecommand_hd.ms_customer_id','=','erp_ms_customer.ms_customer_id')
        ->where('sal_project_hd_docuno',$id)
        ->where('sal_salecommand_status_id','<>',2)
        ->get();
        return view('backend.duequotation.duequotation-transport', compact('hd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hd1 = DB::table('erp_projectalldocu')
        ->where('sal_project_hd_docuno',$id)
        ->where('listno',1)
        ->get();
        $hd2 = DB::table('erp_projectalldocu')
        ->where('sal_project_hd_docuno',$id)
        ->where('listno',2)
        ->get();
        $hd3 = DB::table('erp_projectalldocu')
        ->where('sal_project_hd_docuno',$id)
        ->where('listno',3)
        ->get();
        $hd4 = DB::table('erp_projectalldocu')
        ->where('sal_project_hd_docuno',$id)
        ->where('listno',4)
        ->get();
        $hd5 = DB::table('erp_projectalldocu')
        ->where('sal_project_hd_docuno',$id)
        ->where('listno',5)
        ->get();
        return view('backend.duequotation.duequotation-detail', compact('hd1','hd2','hd3','hd4','hd5'));
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
