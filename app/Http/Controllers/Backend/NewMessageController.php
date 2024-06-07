<?php

namespace App\Http\Controllers\Backend;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NewMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hd = DB::table('docu_newmessage')->get();
        return view('backend.newmessage.newmessage-list', compact('hd'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        try{
            DB::beginTransaction();
            $hd = DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => Carbon::now(),
                'status' => true,
                'role' => 'customer'
            ]);
            DB::commit();
            return redirect()->route('newmessage.index')->with('success', 'เพิ่มสินค้าเรียบร้อยแล้ว' . Carbon::now()->format('Y-m-d H:i:s'));
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
        $hd = DB::table('docu_newmessage')->where('docu_newmessage_id',$id)->first();
        $cust = DB::table('erp_ms_customersub')->where('ms_customersub_email',$hd->docu_newmessage_email)->first();
        $users = DB::table('users')->where('email',$hd->docu_newmessage_email)->first();
        $dt = DB::table('docu_newmessagesub')->where('docu_newmessage_id',$id)->get();
        return view('backend.newmessage.newmessage-edit', compact('hd','cust','users','dt'));
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
        $request->validate([
            'docu_newmessagesub_remark' => ['required'],
        ]);      
        try{
            DB::beginTransaction();
            $hd = DB::table('docu_newmessage')
            ->where('docu_newmessage_id',$id)
            ->update([
                'emp_date' => Carbon::now(),
                'emp_person' => Auth::user()->name,
            ]);
            $up = DB::table('docu_newmessagesub')
            ->insert([
                'docu_newmessage_id' => $id,
                'docu_newmessagesub_remark' => $request->docu_newmessagesub_remark,
                'created_at' => Carbon::now(),
                'docu_newmessagesub_save' => Auth::user()->name,
            ]);
            DB::commit();
            return redirect()->route('newmessage.index')->with('success', 'เพิ่มสินค้าเรียบร้อยแล้ว' . Carbon::now()->format('Y-m-d H:i:s'));
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
