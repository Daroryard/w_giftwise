<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\HomeSlide;
use App\Models\CategorySub;
use App\Models\SaleProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;



class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $slides = HomeSlide::where('conf_homeslide_active', 1)->orderBy('conf_homeslide_listno', 'asc')->get();

        $categories = CategorySub::where('conf_categorysub_active', 1)
        ->orderBy('conf_category_id', 'asc')
        ->where('conf_categorysub_img1','<>',null)
        ->get();


        $pdsale1 = SaleProduct::where('conf_mainproduct_name_th','not like','ค่า%')
        ->where('conf_mainproduct_img1','<>',null)
        ->orderBy('qty','DESC')
        ->inRandomOrder()->take(50)->get();
        $pdsale2 = SaleProduct::where('conf_mainproduct_name_th','not like','ค่า%')
        ->where('conf_mainproduct_img1','<>',null)
        ->orderBy('qty','ASC')->inRandomOrder()->take(50)->get();
        $pdsale3 = SaleProduct::where('conf_mainproduct_name_th','not like','ค่า%')
        ->where('conf_mainproduct_img1','<>',null)
        ->inRandomOrder()->get();
        $pdsale4 = SaleProduct::where('conf_mainproduct_name_th','not like','ค่า%')
        ->where('conf_mainproduct_img1','<>',null)
        ->orderBy('timeline_day','ASC')
        ->inRandomOrder()->take(50)->get();      
        $pick1 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',1)->first(); 
        $pick2 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',2)->first(); 
        $pick3 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',3)->first(); 
        $pick4 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',4)->first(); 
        $pick5 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',5)->first(); 
        $pick6 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',6)->first(); 
        $pick7 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',7)->first(); 
        $pick8 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',8)->first(); 
        $pick9 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',9)->first(); 
        $pjlist = DB::table('conf_projectlist')->whereNotNull('conf_projectlist_img1')->inRandomOrder()->take(20)->get();    
        $cate = Category::where('conf_category_active',1)
        ->whereIn('conf_category_id',[20,21,22,23,24,28,29,30,31,35])
        ->inRandomOrder()->take(4)
        ->get();
        $pickmanu = Category::where('conf_category_active',1)
        ->whereIn('conf_category_id',[20,21,22,23,24,28,29,30,31,35])
        ->inRandomOrder()->take(5)
        ->get();
        $cont1 = DB::table('conf_contact')->where('conf_contact_id',1)->first(); 
        $cont2 = DB::table('conf_contact')->where('conf_contact_id',2)->first(); 



        return view('frontend.home' , compact('slides' , 'categories','pdsale1','pdsale2','pdsale3','pdsale4','pick1','pick2','pick3','pick4','pick5','pick6','pick7','pick8','pick9','pjlist','cate','pickmanu','cont1','cont2'));

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

    public function checkSubscribe(Request $request){

        $email = $request->email;

        $check = DB::table('docu_newmessage')->where('docu_newmessage_email',$email)->first();

        if($check){

            return response()->json(['message' => 'duplicate']);

        }else{

            $insert = DB::table('docu_newmessage')->insert([
                'docu_newmessage_email' => $email,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'docu_newmessage_flag' => 1
                
            ]);

            return response()->json(['message' => 'notduplicate']);

        }

    }

    public function getPlayList(Request $request){

        $id = $request->ref;

        $pickmanu = Category::where('conf_category_active',1)
        ->where('conf_category_id', $id)
        ->get();

        return response()->json(['data' => $pickmanu]);

    }







}