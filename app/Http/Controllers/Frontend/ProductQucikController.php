<?php

namespace App\Http\Controllers\Frontend;

use App\Models\MainProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CategorySub;
use App\Models\Category;
use App\Models\SubProduct;



class ProductQucikController extends Controller
{
    //
    public function index()
    {
        $pd = MainProduct::where('conf_mainproduct_days','<=',3)
        ->where('conf_mainproduct_days','>=',0)
        ->inRandomOrder()->get();
        $pd1 = MainProduct::where('conf_mainproduct_days','<=',7)
        ->where('conf_mainproduct_days','>=',3)
        ->inRandomOrder()->get();
        $pd2 = MainProduct::where('conf_mainproduct_days','<=',14)
        ->where('conf_mainproduct_days','>=',7)
        ->inRandomOrder()->get();
        $pd3 = MainProduct::where('conf_mainproduct_days','<=',30)
        ->where('conf_mainproduct_days','>=',14)
        ->inRandomOrder()->get();
        $img1 = DB::table('conf_productquick')->where('conf_productquick_id',1)->first();
        $img2 = DB::table('conf_productquick')->where('conf_productquick_id',2)->first();

        $categories = CategorySub::where('conf_categorysub_active', 1)
        ->orderBy('conf_category_id', 'asc')
        ->where('conf_categorysub_img1','<>',null)
        ->get();

      

        // dd($catmanu);


        return view('frontend.product-quick.product-quick',compact('pd','pd1','pd2','pd3','img1','img2','categories'));
    }
    public function quickcategorysub($ref,$id)
    {
 
        $pds = SubProduct::join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
        ->where('conf_mainproduct.conf_category_id',$id)
        ->get();


        $pds = $pds->unique('conf_mainproduct_id');


        $pds_count = $pds->unique('conf_mainproduct_id')->count();
    

        $pd = MainProduct::where('conf_mainproduct_days','<=',3)
        ->where('conf_mainproduct_days','>=',0)
        ->inRandomOrder()->get();
        $pd1 = MainProduct::where('conf_mainproduct_days','<=',7)
        ->where('conf_mainproduct_days','>=',3)
        ->inRandomOrder()->get();
        $pd2 = MainProduct::where('conf_mainproduct_days','<=',14)
        ->where('conf_mainproduct_days','>=',7)
        ->inRandomOrder()->get();
        $pd3 = MainProduct::where('conf_mainproduct_days','<=',30)
        ->where('conf_mainproduct_days','>=',14)
        ->inRandomOrder()->get();
        $img1 = DB::table('conf_productquick')->where('conf_productquick_id',1)->first();
        $img2 = DB::table('conf_productquick')->where('conf_productquick_id',2)->first();

        $categories = CategorySub::where('conf_categorysub_active', 1)
        ->orderBy('conf_category_id', 'asc')
        ->where('conf_categorysub_img1','<>',null)
        ->get();


        return view('frontend.product-quick.product-quick-search',compact('pd','pd1','pd2','pd3','img1','img2','categories','pds','pds_count'));


    }


    function filter(Request $request){


        $price_min = substr($request->price_min,1);
        $price_max = substr($request->price_max,1);
        $product_qty = $request->check_order;
        $check_date = $request->check_date;
        $check_category = $request->check_category;
        $check_color = $request->check_color;





        try {

        

        if($product_qty == null || $product_qty == '' || $product_qty == '0'){

          if($check_date == null || $check_date == ''){

            if($check_category == null || $check_category == ''){

                if($check_color == null || $check_color == ''){


                    $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                    ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                    ->where('conf_subproduct_price1','<=',$price_max)
                    ->where('conf_subproduct_quota', '=', 0)
                    ->get();

                }else{

                    $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                    ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                    ->where('conf_subproduct_price1','<=',$price_max)
                    ->whereIN('conf_color_name_th',$check_color)
                    ->get();

                }

            }else{

                if($check_color == null || $check_color == ''){

                    $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                    ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                    ->where('conf_subproduct_price1','<=',$price_max)
                    ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                    ->get();

                }else{

                    $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                    ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                    ->where('conf_subproduct_price1','<=',$price_max)
                    ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                    ->whereIN('conf_color_name_th',$check_color)
                    ->get();

                }

            }
            

            }else if($check_date == 'ready'){

                if($check_category == null || $check_category == ''){

                    if($check_color == null || $check_color == ''){
    
    
                        $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price1','<=',$price_max)
                        ->where('conf_subproduct_stcqty', '>', 0)
                        ->where('conf_subproduct_quota', '=', 0)
                        ->get();
    
                    }else{
    
                        $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price1','<=',$price_max)
                        ->whereIN('conf_color_name_th',$check_color)
                        ->where('conf_subproduct_stcqty', '>', 0)
                        ->where('conf_subproduct_quota', '=', 0)
                        ->get();
    
                    }
    
                }else{
    
                    if($check_color == null || $check_color == ''){
    
                        $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price1','<=',$price_max)
                        ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                        ->where('conf_subproduct_stcqty', '>', 0)
                        ->where('conf_subproduct_quota', '=', 0)
                        ->get();
    
                    }else{
    
                        $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price1','<=',$price_max)
                        ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                        ->whereIN('conf_color_name_th',$check_color)
                        ->where('conf_subproduct_stcqty', '>', 0)
                        ->where('conf_subproduct_quota', '=', 0)
                        ->get();
    
                    }
    
                }



            }else{

            if($check_category == null || $check_category == ''){

                if($check_color == null || $check_color == ''){

                    $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                    ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                    ->where('conf_subproduct_price1','<=',$price_max)
                    ->where('conf_subproduct_days', '<=', $check_date)
                    ->get();

                }else{

                    $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                    ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                    ->where('conf_subproduct_price1','<=',$price_max)
                    ->where('conf_subproduct_days', '<=', $check_date)
                    ->whereIN('conf_color_name_th',$check_color)
                    ->get();

                }

            }else{

                if($check_color == null || $check_color == ''){

                    $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                    ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                    ->where('conf_subproduct_price1','<=',$price_max)
                    ->where('conf_subproduct_days' , '<=', $check_date)
                    ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                    ->get();

                }else{

                    $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                    ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                    ->where('conf_subproduct_price1','<=',$price_max)
                    ->where('conf_subproduct_days', '<=', $check_date)
                    ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                    ->whereIN('conf_color_name_th',$check_color)
                    ->get();

                }

            }

            }

        } else if($product_qty == '20' || $product_qty == '50'){

            if($check_date == null || $check_date == '' || $check_date == 'ready'){

                if($check_category == null || $check_category == ''){

                    if($check_color == null || $check_color == ''){
                        
                        $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price1','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->get();
    
                    }else{
    
                        $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price1','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->whereIN('conf_color_name_th',$check_color)
                        ->get();
    
                    }

                }else{

                    if($check_color == null || $check_color == ''){

                        $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price1','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                        ->get();
    
                    }else{
    
                        $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price1','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                        ->whereIN('conf_color_name_th',$check_color)
                        ->get();
    
                    }

                }

            }else{

                if($check_category == null || $check_category == ''){

                    if($check_color == null || $check_color == ''){

                        $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price1','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->where('conf_subproduct_days','<=' , $check_date)
                        ->get();

                    }else{

                        $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price1','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->where('conf_subproduct_days','<=' , $check_date)
                        ->whereIN('conf_color_name_th',$check_color)
                        ->get();

                    }

                }else{

                    if($check_color == null || $check_color == ''){

                        $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price1','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->where('conf_subproduct_days','<=' , $check_date)
                        ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                        ->get();

                    }else{

                        $pd = SubProduct::where('conf_subproduct_price1','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price1','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->where('conf_subproduct_days','<=' , $check_date)
                        ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                        ->whereIN('conf_color_name_th',$check_color)
                        ->get();

                    }

                }


            }

                


        }else if($product_qty == '100'){

            if($check_date == null || $check_date == '' || $check_date == 'ready'){

                if($check_category == null || $check_category == ''){

                    if($check_color == null || $check_color == ''){
                        $pd = SubProduct::where('conf_subproduct_price2','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price2','<=',$price_max)
                        ->where('conf_subproduct_quota', '>=', $product_qty)
                        ->get();
    
                    }else{
    
                        $pd = SubProduct::where('conf_subproduct_price2','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price2','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->whereIN('conf_color_name_th',$check_color)
                        ->get();
    
                    }

                }else{

                    if($check_color == null || $check_color == ''){

                        $pd = SubProduct::where('conf_subproduct_price2','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price2','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                        ->get();
    
                    }else{
    
                        $pd = SubProduct::where('conf_subproduct_price2','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price2','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                        ->whereIN('conf_color_name_th',$check_color)
                        ->get();
    
                    }

                }

            }else{

                if($check_category == null || $check_category == ''){

                    if($check_color == null || $check_color == ''){

                        $pd = SubProduct::where('conf_subproduct_price2','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price2','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->where('conf_subproduct_days','<=' , $check_date)
                        ->get();

                    }else{

                        $pd = SubProduct::where('conf_subproduct_price2','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price2','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->where('conf_subproduct_days','<=' , $check_date)
                        ->whereIN('conf_color_name_th',$check_color)
                        ->get();

                    }

                }else{

                    if($check_color == null || $check_color == ''){

                        $pd = SubProduct::where('conf_subproduct_price2','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price2','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->where('conf_subproduct_days','<=' , $check_date)
                        ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                        ->get();

                    }else{

                        $pd = SubProduct::where('conf_subproduct_price2','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price2','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->where('conf_subproduct_days','<=' , $check_date)
                        ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                        ->whereIN('conf_color_name_th',$check_color)
                        ->get();

                    }

                }

            }

        }else if($product_qty == '500' || $product_qty == '500over'){

            if($product_qty == '500over'){

                $product_qty = '500';

            }

            if($check_date == null || $check_date == '' || $check_date == 'ready'){

                if($check_category == null || $check_category == ''){

                    if($check_color == null || $check_color == ''){

                        $pd = SubProduct::where('conf_subproduct_price5','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price5','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->get();
    
                    }else{
    
                        $pd = SubProduct::where('conf_subproduct_price5','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price5','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->whereIN('conf_color_name_th',$check_color)
                        ->get();
    
                    }

                }else{

                    if($check_color == null || $check_color == ''){

                        $pd = SubProduct::where('conf_subproduct_price5','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price5','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                        ->get();
    
                    }else{
    
                        $pd = SubProduct::where('conf_subproduct_price5','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price5','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                        ->whereIN('conf_color_name_th',$check_color)
                        ->get();
    
                    }

                }

            }else{

                if($check_category == null || $check_category == ''){

                    if($check_color == null || $check_color == ''){

                        $pd = SubProduct::where('conf_subproduct_price5','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price5','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->where('conf_subproduct_days','<=' , $check_date)
                        ->get();

                    }else{

                        $pd = SubProduct::where('conf_subproduct_price5','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price5','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->where('conf_subproduct_days','<=' , $check_date)
                        ->whereIN('conf_color_name_th',$check_color)
                        ->get();

                    }

                }else{

                    if($check_color == null || $check_color == ''){

                        $pd = SubProduct::where('conf_subproduct_price5','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price5','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->where('conf_subproduct_days','<=' , $check_date)
                        ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                        ->get();

                    }else{

                        $pd = SubProduct::where('conf_subproduct_price5','>=',$price_min)
                        ->join('conf_mainproduct','conf_mainproduct.conf_mainproduct_id','=','conf_subproduct.conf_mainproduct_id')
                        ->where('conf_subproduct_price5','<=',$price_max)
                        ->where('conf_subproduct_quota', '<=', $product_qty)
                        ->where('conf_subproduct_days','<=' , $check_date)
                        ->whereIN('conf_mainproduct.conf_category_id',$check_category)
                        ->whereIN('conf_color_name_th',$check_color)
                        ->get();

                    }

                }

            }

        }

        foreach($pd as $p){

            $tag = DB::table('conf_mainproduct_tag')
            ->where('conf_mainproduct_id',$p->conf_mainproduct_id)
            ->get();

            $p->tag = $tag;

        }




        return response()->json([
            'pd' => $pd
        ]);
  
        

    }catch(\Exception $e){

        return response()->json($e->getMessage());

    }


    }

    public function productSearch ($id){
            
        $pds = MainProduct::
        where('conf_mainproduct.conf_mainproduct_id',$id)
        ->get();

        $pds_count = MainProduct::
        where('conf_mainproduct.conf_mainproduct_id',$id)
        ->count();

        
        foreach($pds as $p){

            $tag = DB::table('conf_mainproduct_tag')
            ->where('conf_mainproduct_id',$p->conf_mainproduct_id)
            ->get();

            $p->saleProductTags = $tag;

        }

    

        $pd = MainProduct::where('conf_mainproduct_days','<=',3)
        ->where('conf_mainproduct_days','>=',0)
        ->inRandomOrder()->get();
        $pd1 = MainProduct::where('conf_mainproduct_days','<=',7)
        ->where('conf_mainproduct_days','>=',3)
        ->inRandomOrder()->get();
        $pd2 = MainProduct::where('conf_mainproduct_days','<=',14)
        ->where('conf_mainproduct_days','>=',7)
        ->inRandomOrder()->get();
        $pd3 = MainProduct::where('conf_mainproduct_days','<=',30)
        ->where('conf_mainproduct_days','>=',14)
        ->inRandomOrder()->get();
        $img1 = DB::table('conf_productquick')->where('conf_productquick_id',1)->first();
        $img2 = DB::table('conf_productquick')->where('conf_productquick_id',2)->first();

        $categories = CategorySub::where('conf_categorysub_active', 1)
        ->orderBy('conf_category_id', 'asc')
        ->where('conf_categorysub_img1','<>',null)
        ->get();



        return view('frontend.product-quick.product-quick-search',compact('pd','pd1','pd2','pd3','img1','img2','categories','pds','pds_count'));

    }

    public function productQuick () {

        $pd = MainProduct::where('conf_mainproduct_days','<=',3)
        ->where('conf_mainproduct_days','>=',0)
        ->inRandomOrder()->get();
        $pd1 = MainProduct::where('conf_mainproduct_days','<=',7)
        ->where('conf_mainproduct_days','>=',3)
        ->inRandomOrder()->get();
        $pd2 = MainProduct::where('conf_mainproduct_days','<=',14)
        ->where('conf_mainproduct_days','>=',7)
        ->inRandomOrder()->get();
        $pd3 = MainProduct::where('conf_mainproduct_days','<=',30)
        ->where('conf_mainproduct_days','>=',14)
        ->inRandomOrder()->get();
        $img1 = DB::table('conf_productquick')->where('conf_productquick_id',1)->first();
        $img2 = DB::table('conf_productquick')->where('conf_productquick_id',2)->first();

        $categories = CategorySub::where('conf_categorysub_active', 1)
        ->orderBy('conf_category_id', 'asc')
        ->where('conf_categorysub_img1','<>',null)
        ->get();

    

        return view('frontend.product-quick.product-quick',compact('pd','pd1','pd2','pd3','img1','img2','categories'));
    }



    public function productTag ($id) {

        $tags = DB::table('conf_mainproduct_tag')->where('conf_mainproduct_tag_id',$id)->first();

        $check_tag = DB::table('conf_mainproduct_tag')
        ->where('conf_mainproduct_tag_name_th',$tags->conf_mainproduct_tag_name_th)
        ->whereOr('conf_mainproduct_tag_name_en',$tags->conf_mainproduct_tag_name_en)
        ->get();

        $get_id = array();

        foreach($check_tag as $c){

            $get_id[] = $c->conf_mainproduct_id;

        }


               
        $pds = MainProduct::whereIn('conf_mainproduct.conf_mainproduct_id',$get_id)
        ->get();

        $pds_count = MainProduct::whereIn('conf_mainproduct.conf_mainproduct_id',$get_id)
        ->count();



        //add tag to product

        foreach($pds as $p){

            $tag = DB::table('conf_mainproduct_tag')
            ->where('conf_mainproduct_id',$p->conf_mainproduct_id)
            ->get();

            $p->saleProductTags = $tag;

        }



    

        $pd = MainProduct::where('conf_mainproduct_days','<=',3)
        ->where('conf_mainproduct_days','>=',0)
        ->inRandomOrder()->get();
        $pd1 = MainProduct::where('conf_mainproduct_days','<=',7)
        ->where('conf_mainproduct_days','>=',3)
        ->inRandomOrder()->get();
        $pd2 = MainProduct::where('conf_mainproduct_days','<=',14)
        ->where('conf_mainproduct_days','>=',7)
        ->inRandomOrder()->get();
        $pd3 = MainProduct::where('conf_mainproduct_days','<=',30)
        ->where('conf_mainproduct_days','>=',14)
        ->inRandomOrder()->get();
        $img1 = DB::table('conf_productquick')->where('conf_productquick_id',1)->first();
        $img2 = DB::table('conf_productquick')->where('conf_productquick_id',2)->first();

        $categories = CategorySub::where('conf_categorysub_active', 1)
        ->orderBy('conf_category_id', 'asc')
        ->where('conf_categorysub_img1','<>',null)
        ->get();

        // dd($pds);



        return view('frontend.product-quick.product-quick-search',compact('pd','pd1','pd2','pd3','img1','img2','categories','pds','pds_count'));

    


    }









}

