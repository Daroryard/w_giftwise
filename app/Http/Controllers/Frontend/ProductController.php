<?php

namespace App\Http\Controllers\Frontend;

use App\Models\MainProduct;
use App\Models\MainProductTag;
use App\Models\SubProduct;
use App\Models\SubProductAddon;
use App\Models\SaleProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CategorySub;
use App\Models\Category;

class ProductController extends Controller
{
    public function detail($id,$ref){
        $hd = MainProduct::find($ref);

        if(!$hd){
            abort(403);
        }

        $productsub = SubProduct::where('conf_mainproduct_id', $ref)->where('conf_subproduct_active', 1)->get();

        $productmain_code = $hd->conf_mainproduct_code;

        $review = DB::table('docu_review')->where('product_code', 'like', '%' . $productmain_code . '%')->get();    
             
        $countreviw = DB::table('docu_review')->where('product_code', 'like', '%' . $productmain_code . '%')->count();

        $review_avg = DB::table('docu_review')->where('product_code', 'like', '%' . $productmain_code . '%')->avg('docu_review_qty');+

        $review_avg = number_format($review_avg, 1);

        if($review_avg == null){

            $review_avg = 0;

        }else{

            $review_avg = number_format($review_avg, 1);

        }

        $project = DB::table('vw_projectlist')
        ->join('erp_productlist', 'vw_projectlist.ms_product_id', '=', 'erp_productlist.ms_product_id')
        ->where('vw_projectlist.conf_projectlist_img1', '<>', '')
        ->where('typescreen_name_th','<>', 'ไม่มีข้อมูล')
        ->where('vw_projectlist.ms_product_id', $ref)
        ->get();

        $projectGroup = DB::table('vw_projectlist')->select('typescreen_name_th', 'typescreen_name_en')
        ->where('ms_product_id', $ref)
        ->where('typescreen_name_th','<>', 'ไม่มีข้อมูล')
        ->where('conf_projectlist_img1', '<>', '')
        ->groupBy('typescreen_name_th', 'typescreen_name_en')->get();

        $project_count_total = 0;


        foreach($projectGroup as $key => $value){

            $count = DB::table('vw_projectlist')->where('typescreen_name_th', $value->typescreen_name_th)->where('ms_product_id', $ref)->where('conf_projectlist_img1', '<>', '')->count();
            $projectGroup[$key]->count = $count;
            $project_count_total += $count;

        }

        $pdsale = SaleProduct::inRandomOrder()->take(30)->get();

        $arr_img = array();

        foreach($review as $r)
        {
            if($r->docu_review_img1 != null)
            {  
                $arr_img[] = [
                'remark' => $r->docu_review_remeak,
                'star' => $r->docu_review_qty,
                'img' => $r->docu_review_img1,
                'id' => $r->product_code
            ];
            if($r->docu_review_img2 != null)
            {
                $arr_img[] = [
                    'remark' => $r->docu_review_remeak,
                    'star' => $r->docu_review_qty,
                    'img' => $r->docu_review_img2,
                    'id' => $r->product_code
                ];
            }
            if($r->docu_review_img3 != null)
            {
                $arr_img[] = [
                    'remark' => $r->docu_review_remeak,
                    'star' => $r->docu_review_qty,
                    'img' => $r->docu_review_img3,
                    'id' => $r->product_code
                ];
            }
            if($r->docu_review_img4 != null)
            {
                $arr_img[] = [
                    'remark' => $r->docu_review_remeak,
                    'star' => $r->docu_review_qty,
                    'img' => $r->docu_review_img4,
                    'id' => $r->product_code
                ];
            }

            }
           
          
        }

        // count 
        $count = count($arr_img);

        return view('frontend.product.detail' , compact('pdsale','hd','productsub','review','countreviw','review_avg','projectGroup','project','project_count_total','ref','arr_img','count'));
    }

    public function checkStock(Request $request){
        $product = SubProduct::where('conf_mainproduct_id', $request->id)
        ->where('conf_subproduct_active', 1)
        ->get();

        $addons = SubProductAddon::where('conf_mainproduct_id', $request->id)
        ->where('conf_subproduct_addno_active', 1)
        ->get();

        return response()->json([
            'product' => $product,
            'addons' => $addons
        ]);
    }

    public function getAddon(Request $request){
        $addons = SubProductAddon::where('conf_mainproduct_id', $request->id)->where('conf_subproduct_addno_active' , 1)->get();
        return response()->json($addons);
    }

    public function getsize(Request $request){

        $color = $request->color;
        $id = $request->ref;
        $subid = $request->subid;
        
        $size = SubProduct::where('conf_mainproduct_id', $id)->where('conf_subproduct_active' , 1)->where('conf_color_id' , $color)->get();

        $getimg = SubProduct::where('conf_subproduct_id', $subid)
                ->select('conf_subproduct_img1','conf_subproduct_img2','conf_subproduct_img3','conf_subproduct_img4')
                ->first();


        return response()->json([
            'size' => $size,
            'getimg' => $getimg
        ]);
    }

    public function getaddonsku(Request $request){

        $color = $request->color;
        $id = $request->ref;
        $main = $request->id;
        $id_size = $request->size;

        $size = SubProduct::where('conf_mainproduct_id', $id)->where('conf_subproduct_active' , 1)->where('conf_color_id' , $color)->where('conf_size_id' , $id_size)->get();


        $addons = SubProductAddon::where('conf_subproduct_id' , $size[0]->conf_subproduct_id)->where('conf_subproduct_addno_active' , 1)->get();

        $screen = SubProductAddon::where('conf_subproduct_id' , $size[0]->conf_subproduct_id)->where('conf_subproduct_addno_active' , 1)->get();
        

        return response()->json([
            'size' => $size,
            'addons' => $addons,
            'screen' => $screen
        ]);
        

    }

    public function projectList(Request $request){
        
        $typescreen = $request->type;
        $id = $request->id;

        $project = DB::table('vw_projectlist')
        ->join('erp_productlist', 'vw_projectlist.ms_product_id', '=', 'erp_productlist.ms_product_id')
        ->where('vw_projectlist.conf_projectlist_img1', '<>', '')
        ->where('typescreen_name_th', $typescreen)
        ->where('vw_projectlist.ms_product_id', $id)
        ->get();

        return response()->json($project);

    }




}
