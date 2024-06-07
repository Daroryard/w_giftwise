<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'superadmin'){
            $hd = DB::table('erp_customersub')
            ->where('role','customer')
            ->get();
        }
        else {
            $hd = DB::table('erp_customersub')
            ->where('sal_project_hd_save',Auth::user()->name)
            ->where('role','customer')
            ->get();
        }
        return view('backend.users.users-cust-list', compact('hd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'superadmin'){
            $cust = DB::table('erp_customersub')->where('role',null)->get();
        }else {
            $cust = DB::table('erp_customersub')->where('role',null)->where('sal_project_hd_save',Auth::user()->name)->get();
        }
       
        return view('backend.users.users-cust-create',compact('cust'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkUser = DB::table('users')->where('email',$request->email)->first();
        if($checkUser){
            return redirect()->route('users-cust.create')->with('error', 'มีข้อมูลผู้ใช้งานนี้อยู่แล้ว ' . Carbon::now()->format('Y-m-d H:i:s'));
        }else{           
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6'],
            ]);    
            $emp = DB::table('erp_customersub')->where('ms_customersub_email',$request->email)->first();
            try{
                DB::beginTransaction();
                $hd = DB::table('users')->insert([
                    'name' => $emp->ms_customersub_name,
                    'email' => $request->email,
                    'password' => md5($request->password),
                    'created_at' => Carbon::now(),
                    'status' => true,
                    'role' => 'customer'
                ]);
                DB::commit();
                return redirect()->route('users-cust.index')->with('success', 'เพิ่มสินค้าเรียบร้อยแล้ว' . Carbon::now()->format('Y-m-d H:i:s'));
            }catch(\Exception $e){
                DB::rollBack();
                Log::error($e->getMessage());
                return redirect()->route('users-cust.create')->with('error', 'เกิดข้อผิดพลาด' . Carbon::now()->format('Y-m-d H:i:s'));
            }
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
}
