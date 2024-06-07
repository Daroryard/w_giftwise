<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class HomeSlideController extends Controller
{
    public $folder_homeslide_img;
    public function __construct()
    {
        $this->folder_homeslide_img = config('constants.folder_home_slide_imgs');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeslides = HomeSlide::orderBy("conf_homeslide_listno", "asc")->get();
        return view('backend.home-slide.list', compact('homeslides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.home-slide.create');
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
            'conf_homeslide_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            DB::beginTransaction();
            $data['conf_homeslide_listno'] = HomeSlide::max('conf_homeslide_listno') + 1;
            $data['conf_homeslide_active'] = $request->has('conf_homeslide_active') ? 1 : 0;
            $data['created_at'] = Carbon::now();
            $data['conf_homeslide_img'] = $request->file('conf_homeslide_img')->storeAs($this->folder_homeslide_img, Str::random(10) . '_' . Carbon::now()->format('YmdHis') . '.' . $request->file('conf_homeslide_img')->getClientOriginalExtension());
            HomeSlide::create($data);
            DB::commit();
            return redirect()->route('home-slide.index')->with('success', 'เพิ่มข้อมูลสำเร็จ ' . Carbon::now());
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->withErrors('เพิ่มข้อมูลไม่สำเร็จ');
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
        $homeslide = HomeSlide::findOrFail($id);
        return view('backend.home-slide.edit', compact('homeslide'));
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
            'conf_homeslide_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            $homeslide = HomeSlide::findOrFail($id);
            DB::beginTransaction();
            $homeslide->conf_homeslide_active = $request->has('conf_homeslide_active') ? 1 : 0;
            $homeslide->updated_at = Carbon::now();
            if ($request->hasFile('conf_homeslide_img')) {
                if (File::exists(public_path($homeslide->conf_homeslide_img))) {
                    File::delete(public_path($homeslide->conf_homeslide_img));
                }
                $homeslide->conf_homeslide_img = $request->file('conf_homeslide_img')->storeAs($this->folder_homeslide_img, Str::random(10) . '_' . Carbon::now()->format('YmdHis') . '.' . $request->file('conf_homeslide_img')->getClientOriginalExtension());
            }
            $homeslide->save();
            DB::commit();
            return redirect()->route('home-slide.index')->with('success', 'แก้ไขข้อมูลสำเร็จ ' . Carbon::now());
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->withErrors('แก้ไขข้อมูลไม่สำเร็จ');
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
            $homeslide = HomeSlide::findOrFail($id);
            DB::beginTransaction();
            if (File::exists(public_path($homeslide->conf_homeslide_img))) {
                File::delete(public_path($homeslide->conf_homeslide_img));
            }
            $homeslide->delete();
            DB::commit();
            return response()->json(['success' => true, 'msg' => 'ลบข้อมูลสำเร็จ']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'msg' => 'เกิดข้อผิดพลาดในการลบข้อมูล']);
        }
    }

    public function status(Request $request)
    {
        $slide = HomeSlide::find($request->id);
        if (!$slide) {
            return response()->json(['success' => false, 'msg' => 'ไม่พบข้อมูล']);
        }
        $slide->conf_homeslide_active = $request->conf_homeslide_active;
        $slide->updated_at = Carbon::now();
        $slide->save();
        return response()->json(['success' => true, 'msg' => 'แก้ไขสถานะสำเร็จ']);
    }

    public function sort(Request $request)
    {
        $homeslides = $request->homeslides;
        try {
            foreach ($homeslides as $key => $value) {
                $homeslides = HomeSlide::find($value['id']);
                $homeslides->conf_homeslide_listno = $value['newOrder'];
                $homeslides->save();
            }
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
