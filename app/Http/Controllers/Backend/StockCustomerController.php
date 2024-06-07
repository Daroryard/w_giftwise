<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StockCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $hd = DB::table('docu_customerstock')
        ->leftjoin('docu_customer','docu_customerstock.docu_customer_id','=','docu_customer.docu_customer_id')
        ->get();      
        return view('backend.stockcustomer.stockcustomer-list', compact('hd'));
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
        $hd = DB::table('erp_stockcustomer')
        ->where('docu_customerstock_id',$id)
        ->first();
        return view('backend.stockcustomer.stockcustomer-edit', compact('hd'));
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
        try{
            DB::beginTransaction();
            $hd = DB::table('docu_customerstock')
            ->where('docu_customerstock_id',$id)
            ->update([
                'docu_customerstock_status' => 'Y',
                'refremark' => $request->docu_customerstock_remark,
                'refperson' => Auth::user()->name,
            ]);
            DB::commit();
            return redirect()->route('stockcustomer.index')->with('success', 'บันทึกเรียบร้อยแล้ว' . Carbon::now()->format('Y-m-d H:i:s'));
        } catch (Exception $e) {
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
        //
    }
}
