<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeStaffPick;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class HomeStaffPickController extends Controller
{
    public $folder_homestaffpick_img;
    public function __construct()
    {
        $this->folder_homestaffpick_img = config('constants.folder_home_staff_pick_imgs');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homestaffpicks = HomeStaffPick::orderBy("conf_homestaffpick_listno", "asc")->get();
        return view('backend.home-staff-pick.list', compact('homestaffpicks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.home-staff-pick.create');
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
            'conf_homestaffpick_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            DB::beginTransaction();
            $data['conf_homestaffpick_listno'] = HomeStaffPick::max('conf_homestaffpick_listno') + 1;
            $data['conf_homestaffpick_active'] = $request->has('conf_homestaffpick_active') ? 1 : 0;
            $data['created_at'] = Carbon::now();
            $data['conf_homestaffpick_img'] = $request->file('conf_homestaffpick_img')->storeAs($this->folder_homestaffpick_img, Str::random(10) . '_' . Carbon::now()->format('YmdHis') . '.' . $request->file('conf_homestaffpick_img')->getClientOriginalExtension());
            HomeStaffPick::create($data);
            DB::commit();
            return redirect()->route('home-staff-pick.index')->with('success', 'เพิ่มข้อมูลสไลด์หน้าแรกสำเร็จ');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'เพิ่มข้อมูลสไลด์หน้าแรกไม่สำเร็จ');
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
        $homestaffpick = HomeStaffPick::findOrFail($id);
        return view('backend.home-staff-pick.edit', compact('homestaffpick'));
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
            'conf_homestaffpick_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $homestaffpick = HomeStaffPick::findOrFail($id);
        try {
            DB::beginTransaction();
            $homestaffpick->conf_homestaffpick_active = $request->has('conf_homestaffpick_active') ? 1 : 0;
            $homestaffpick->updated_at = Carbon::now();
            if ($request->hasFile('conf_homestaffpick_img')) {
                if (File::exists(public_path($homestaffpick->conf_homestaffpick_img))) {
                    File::delete(public_path($homestaffpick->conf_homestaffpick_img));
                }
                $homestaffpick->conf_homestaffpick_img = $request->file('conf_homestaffpick_img')->storeAs($this->folder_homestaffpick_img, Str::random(10) . '_' . Carbon::now()->format('YmdHis') . '.' . $request->file('conf_homestaffpick_img')->getClientOriginalExtension());
            }
            $homestaffpick->save();
            DB::commit();
            return redirect()->route('home-staff-pick.index')->with('success', 'แก้ไขข้อมูลสไลด์หน้าแรกสำเร็จ ' . Carbon::now());
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'แก้ไขข้อมูลสไลด์หน้าแรกไม่สำเร็จ');
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
        try {
            DB::beginTransaction();
            $homestaffpick = HomeStaffPick::findOrFail($id);
            if (File::exists(public_path($homestaffpick->conf_homestaffpick_img))) {
                File::delete(public_path($homestaffpick->conf_homestaffpick_img));
            }
            $homestaffpick->delete();
            DB::commit();
            return response()->json(['success' => true, 'msg' => 'ลบข้อมูลสำเร็จ']);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'msg' => 'เกิดข้อผิดพลาดในการลบข้อมูล']);
        }
    }

    public function status(Request $request)
    {
        $staffpick = HomeStaffPick::find($request->id);
        if (!$staffpick) {
            return response()->json(['success' => false, 'msg' => 'ไม่พบข้อมูล']);
        }
        $staffpick->conf_homestaffpick_active = $request->conf_homestaffpick_active;
        $staffpick->updated_at = Carbon::now();
        $staffpick->save();
        return response()->json(['success' => true, 'msg' => 'แก้ไขสถานะสำเร็จ']);
    }

    public function sort(Request $request)
    {
        $staffpicks = $request->homestaffpicks;
        try {
            foreach ($staffpicks as $key => $value) {
                $staffpicks = HomeStaffPick::find($value['id']);
                $staffpicks->conf_homestaffpick_listno = $value['newOrder'];
                $staffpicks->save();
            }
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
