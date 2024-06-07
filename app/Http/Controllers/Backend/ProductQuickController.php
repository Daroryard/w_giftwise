<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ProductQuickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hd = DB::table('conf_productquick')->get();
        return view('backend.productquick.productquick-list', compact('hd'));
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
        $hd = DB::table('conf_productquick')->where('conf_productquick_id',$id)->first();
        return view('backend.productquick.productquick-edit', compact('hd'));
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
        $data = [
            'updated_at' => Carbon::now(),
        ];
        if($request->hasFile('conf_productquick_img')){
            $data['conf_productquick_img'] = $request->file('conf_productquick_img')->storeAs('assets/backend/images/productquicks', "IMG_" . carbon::now()->format('Ymdhis') . "_" . Str::random(5) . "." . $request->file('conf_productquick_img')->extension());
        }
        try {
            DB::beginTransaction();
            $hd = DB::table('conf_productquick')
            ->where('conf_productquick_id',$id)
            ->update($data);
            DB::commit();
            return redirect()->route('productquick.index')->with('success', 'แก้ไขข้อมูลสำเร็จ ' . Carbon::now());
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('productquick.index')->with('error', 'ก้ไขข้อมูลไม่สำเร็จ ' . Carbon::now());
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
