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
use App\Models\MainProduct;




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

        $categories = CategorySub::
        join('conf_category','conf_category.conf_category_id','=','conf_categorysub.conf_category_id')
        ->where('conf_categorysub.conf_categorysub_active', 1)
        ->orderBy('conf_category.conf_category_id', 'asc')
        ->where('conf_categorysub_img1','<>',null)
        ->get();


        $pdsale1 = SaleProduct::where('conf_mainproduct_name_th','not like','ค่า%')
        ->where('conf_mainproduct_img1','<>',null)
        ->orderBy('qty','DESC')
        ->inRandomOrder()->take(50)->get();

        $pdsale1 = $pdsale1->unique('conf_mainproduct_id');

        $pdsale2 = SaleProduct::where('conf_mainproduct_name_th','not like','ค่า%')
        ->where('conf_mainproduct_img1','<>',null)
        ->where('qty','>',0)
        ->where('price','<>','0')
        ->where('price','<>','0.00')
        ->where('price','<>','-')
        ->orderBy('qty','ASC')->inRandomOrder()->take(50)->get();

        $pdsale2 = $pdsale2->unique('conf_mainproduct_id');


        $pdsale3 = SaleProduct::where('conf_mainproduct_name_th','not like','ค่า%')
        ->where('conf_mainproduct_img1','<>',null)
        ->inRandomOrder()->get();

        $pdsale3 = $pdsale3->unique('conf_mainproduct_id');

        $pdsale4 = SaleProduct::where('conf_mainproduct_name_th','not like','ค่า%')
        ->where('conf_mainproduct_img1','<>',null)
        ->orderBy('timeline_day','ASC')
        ->inRandomOrder()->take(50)->get(); 

        $pdsale4 = $pdsale4->unique('conf_mainproduct_id');

        $pick1 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',1)->first(); 
        $pick2 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',2)->first(); 
        $pick3 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',3)->first(); 
        $pick4 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',4)->first(); 
        $pick5 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',5)->first(); 
        $pick6 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',6)->first(); 
        $pick7 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',7)->first(); 
        $pick8 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',8)->first(); 
        $pick9 =DB::table('conf_homestaffpick')->where('conf_homestaffpick_listno',9)->first(); 


        $pick_tag =  DB::table('vw_erp_producttag')
        ->select('ms_product_tag_name','ms_product_tag_nameen')
        ->groupBy('ms_product_tag_name','ms_product_tag_nameen')
        ->inRandomOrder()->take(5)
        ->get();

        $fav_tag =  DB::table('vw_erp_producttag')
        ->select('ms_product_tag_id','ms_product_tag_name','ms_product_tag_nameen','ms_product_tag_remark','ms_product_tag_remarken','ms_product_tag_img1')
        ->groupBy('ms_product_tag_id','ms_product_tag_name','ms_product_tag_nameen','ms_product_tag_remark','ms_product_tag_remarken','ms_product_tag_img1')
        ->inRandomOrder()->take(4)
        ->get();

        $pjlist = DB::table('conf_projectlist')->whereNotNull('conf_projectlist_img1')->inRandomOrder()->take(20)->get();   

        foreach($pjlist as $key => $value){
            $pd_sub = DB::table('erp_productsublist')->select(
                'ms_product_id',
                'ms_productsub_name1',
                'ms_productsub_name2',
                'ms_productsub_img1',
                'ms_productsub_img2',
                'ms_productsub_img3',
                'ms_productsub_img4'
                )
            ->where('ms_productsub_code',$value->conf_projectlist_pdcode)->first();

            if($pd_sub == null){
                $value->ms_pd = 'ไม่มีข้อมูล';
                $value->ms_productsub_name_th = 'ไม่มีข้อมูล';
                $value->ms_productsub_name_en = 'ไม่มีข้อมูล';
                $value->ms_productsub_img1 = 'ไม่มีข้อมูล';
                $value->ms_productsub_img2 = 'ไม่มีข้อมูล';
                $value->ms_productsub_img3 = 'ไม่มีข้อมูล';
                $value->ms_productsub_img4 = 'ไม่มีข้อมูล';
            }else{
            $value->ms_pd = $pd_sub->ms_product_id;
            $value->ms_productsub_name_th = $pd_sub->ms_productsub_name1;
            $value->ms_productsub_name_en = $pd_sub->ms_productsub_name2;
            $value->ms_productsub_img1 = $pd_sub->ms_productsub_img1;
            $value->ms_productsub_img2 = $pd_sub->ms_productsub_img2;
            $value->ms_productsub_img3 = $pd_sub->ms_productsub_img3;
            $value->ms_productsub_img4 = $pd_sub->ms_productsub_img4;

            }


        }
        
    
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


        return view('frontend.home' , compact('slides' , 'categories','pdsale1','pdsale2','pdsale3','pdsale4','pick1','pick2','pick3','pick4','pick5','pick6','pick7','pick8','pick9','pjlist','cate','pickmanu','cont1','cont2','pick_tag','fav_tag'));

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

        $th = $request->th;

        $en = $request->en;


        $check_tag = DB::table('conf_mainproduct_tag')
        ->where('conf_mainproduct_tag_name_th',$th)
        ->whereOr('conf_mainproduct_tag_name_en',$en)
        ->get();

        $get_id = array();

        foreach($check_tag as $c){

            $get_id[] = $c->conf_mainproduct_id;

        }

               
        $pds = MainProduct::whereIn('conf_mainproduct.conf_mainproduct_id',$get_id)
        ->inRandomOrder()->take(9)
        ->get();


 

        return response()->json(['data' => $pds]);

    }







}
