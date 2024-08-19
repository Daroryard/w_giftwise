<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategorySub;
use App\Models\SaleProduct;
use Illuminate\Support\Facades\DB;


class UserflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $erp_manual = DB::connection('sqlsrv_erp')
        ->table('ms_product_manual')
        ->select('ms_product_category_id')
        ->where('status',1)->get();


        $arr = array();

        foreach($erp_manual as $erp){
            $arr[] = $erp->ms_product_category_id;
        }


        $cat = Category::where('conf_category_active',1)
        ->whereIn('conf_category_id',$arr)->get();

     
       
        return view('frontend.userflow.userflow-detail' , compact('cat'));

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
        $cat = Category::where('conf_category_active',1)
        ->whereIn('conf_category_id',[20,21,22,23,24,28,29,30,31,35])->get();
        $categorie_sub = CategorySub::where('conf_categorysub_active', 1)->orderBy('conf_category_id', 'asc')->get();
        $catmanu = Category::where('conf_category_active',1)
        ->whereIn('conf_category_id',[20,21,22,23,24,28,29,30,31,35])->get();
        $arr_cate = array();
        foreach($categorie_sub as $cate){
            if(!in_array($cate->conf_category_id, $arr_cate)){
                $arr_cate[] = $cate->conf_category_id;           
            }            
        }
        $hd = Category::where('conf_category_active',1)->where('conf_category_id',$id)->first();
        $dt =  CategorySub::where('conf_categorysub_active', 1)->where('conf_category_id',$id)->get();
        return view('frontend.userflow.userflow-detail-show' , compact('cat','catmanu','arr_cate','categorie_sub','hd','dt'));
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

    public function userflow ()
    {

        $erp_manual = DB::connection('sqlsrv_erp')
        ->table('ms_product_manual')
        ->select('ms_product_category_id')
        ->where('status',1)->get();


        $arr = array();

        foreach($erp_manual as $erp){
            $arr[] = $erp->ms_product_category_id;
        }



        $cat = Category::where('conf_category_active',1)
        ->whereIn('conf_category_id',$arr)->get();

     
       
        return view('frontend.userflow.userflow-detail' , compact('cat'));
    }

    public function userflowShow ($ref,$id) {

        $cat = Category::where('conf_category_active',1)
        ->whereIn('conf_category_id',[20,21,22,23,24,28,29,30,31,35])->get();
        $categorie_sub = CategorySub::where('conf_categorysub_active', 1)->orderBy('conf_category_id', 'asc')->get();
        $catmanu = Category::where('conf_category_active',1)
        ->whereIn('conf_category_id',[20,21,22,23,24,28,29,30,31,35])->get();
        $arr_cate = array();

        foreach($categorie_sub as $cate){
            if(!in_array($cate->conf_category_id, $arr_cate)){
                $arr_cate[] = $cate->conf_category_id;           
            }            
        }
        $hd = Category::where('conf_category_active',1)->where('conf_category_id',$id)->first();
        $dt =  CategorySub::where('conf_categorysub_active', 1)->where('conf_category_id',$id)->get();

        $product_hit = SaleProduct::where('conf_mainproduct_name_th','not like','ค่า%')
        ->where('conf_mainproduct_img1','<>',null)
        ->orderBy('qty','DESC')
        ->inRandomOrder()->take(10)->get();

        $pjlist = DB::table('conf_projectlist')->whereNotNull('conf_projectlist_img1')->inRandomOrder()->take(20)->get();   
        
    
        $erp_manual = DB::connection('sqlsrv_erp')
        ->table('ms_product_manual')
        ->where('ms_product_category_id',$id)
        ->first();

        // $pick_tag =  DB::table('vw_erp_producttag')
        // ->select('ms_product_tag_name','ms_product_tag_nameen')
        // ->groupBy('ms_product_tag_name','ms_product_tag_nameen')
        // ->inRandomOrder()->take(5)
        // ->get();
        // dd($pick_tag);

        $tag_cate = DB::table('conf_mainproduct_tag')
        ->select('conf_mainproduct_tag.conf_mainproduct_tag_name_th','conf_mainproduct_tag.conf_mainproduct_tag_name_en')
        ->leftJoin('erp_productlist','conf_mainproduct_id','=','ms_product_id')
        ->leftJoin('erp_producttag','erp_producttag.ms_product_id','=','conf_mainproduct_tag.conf_mainproduct_id')
        ->where('erp_productlist.ms_product_category_id',$id)
        ->groupBy('conf_mainproduct_tag.conf_mainproduct_tag_name_th','conf_mainproduct_tag.conf_mainproduct_tag_name_en')
        ->get();


        $compare_table = DB::connection('sqlsrv_erp')
        ->table('ms_product_compare_table')
        ->where('ms_product_category_id',$id)
        ->where('status',1)
        ->get();



        // dd($compare_table);
        
        return view('frontend.userflow.userflow-detail-show' , compact('cat','catmanu','arr_cate','categorie_sub','hd','dt','product_hit','pjlist','erp_manual','tag_cate','compare_table'));
    }
}
