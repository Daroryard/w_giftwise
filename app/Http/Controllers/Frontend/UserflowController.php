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
        $cat = Category::where('conf_category_active',1)
        ->whereIn('conf_category_id',[20,21,22,23,24,28,29,30,31,35])->get();
       
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
        $cat = Category::where('conf_category_active',1)
        ->whereIn('conf_category_id',[20,21,22,23,24,28,29,30,31,35])->get();
       
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


        // dd($pjlist);
        
        return view('frontend.userflow.userflow-detail-show' , compact('cat','catmanu','arr_cate','categorie_sub','hd','dt','product_hit','pjlist'));
    }
}
