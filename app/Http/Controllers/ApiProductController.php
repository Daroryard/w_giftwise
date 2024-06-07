<?php

namespace App\Http\Controllers;

use App\Models\SubProduct;
use App\Models\MainProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MainProductTag;
use App\Models\SubProductAddon;
use App\Models\Category;





class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(MainProduct::where('postapi',1)->all(),status:200);
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
        $subPd = SubProduct::where('conf_mainproduct_id',$id)->where('postapi',1)->get();
        if($subPd){
            return response()->json($subPd,status:200);
        }
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

    public function ProductMain()
    {
        return response()->json(MainProduct::where('conf_mainproduct_active',true)->where('postapi',1)->get(),status:200);
    }
    public function ProductSub()
    {
        return response()->json(SubProduct::where('conf_subproduct_active',true)->where('postapi',1)->get(),status:200);
    }
    public function getDataMain($id)
    {

        try{

        $mainPd = MainProduct::where('conf_mainproduct_id',$id)
        ->where('postapi',1)
        ->where('conf_mainproduct_active',true)
        ->first();

        if($mainPd){
            
            return response()->json($mainPd,status:200);
        }
        }catch(\Exception $e){
            return response()->json(['message' => 'Not Found!'], 404);
        }


       
    }
    public function getDataMainAll($id)
    {

        try{

        $subPd = SubProduct::where('conf_mainproduct_id',$id)
        ->where('postapi',1)
        ->where('conf_subproduct_active',true)
        ->get();

        if($subPd){
            return response()->json($subPd,status:200);
        }

        }catch(\Exception $e){
            return response()->json(['message' => 'Not Found!'], 404);
        }

    }
    public function getDataSub($id)
    {

        try{

        $subPd = SubProduct::where('conf_subproduct_id',$id)
        ->where('postapi',1)
        ->where('conf_subproduct_active',true)
        ->first();
        if($subPd){
            return response()->json($subPd,status:200);
        }
        }catch(\Exception $e){
            return response()->json(['message' => 'Not Found!'], 404);
        }
       
    }
    public function getDataTag($id)
    {

        try{
        $tagPd = MainProductTag::where('conf_mainproduct_id',$id)
        ->where('postapi',1)
        ->where('conf_mainproduct_tag_active',true)
        ->get();
        if($tagPd){
            return response()->json($tagPd,status:200);
        }
        }catch(\Exception $e){
            return response()->json(['message' => 'Not Found!'], 404);
        }
       
    }
    public function getDataAddno($id)
    {
        try{
        $addonPd = SubProductAddon::where('conf_subproduct_id',$id)
        ->where('conf_subproduct_addno_active',true)
        ->get();
        if($addonPd){
            return response()->json($addonPd,status:200);
        }
    }catch(\Exception $e){
        return response()->json(['message' => 'Not Found!'], 404);
    }
    }
    public function getDataTagAll()
    {
        try{
        $tagPd = MainProductTag::select('conf_mainproduct_tag_name_th','conf_mainproduct_tag_name_en')
        ->groupBy('conf_mainproduct_tag_name_th','conf_mainproduct_tag_name_en')
        ->get();
        if($tagPd){
            return response()->json($tagPd,status:200);
        }
        }catch(\Exception $e){
            return response()->json(['message' => 'Not Found!'], 404);
        }      
    }
    public function ProductCategory()
    {
        try{
        $catPd = Category::where('conf_category_active',true)->get();
        if($catPd){
            return response()->json($catPd,status:200);
        }
        }catch(\Exception $e){
            return response()->json(['message' => 'Not Found!'], 404);
        }      
    }
    public function getPdTag($id)
    {      
            try{
            $mainPd = MainProduct::leftjoin('conf_mainproduct_tag','conf_mainproduct.conf_mainproduct_id','=','conf_mainproduct_tag.conf_mainproduct_id')
            ->where('conf_mainproduct_active',true)
            ->where('postapi',1)
            ->where('conf_mainproduct_tag_active',true)
            ->where('conf_mainproduct_tag.conf_mainproduct_tag_name_th',$id)
            ->get();
            if($mainPd){
                return response()->json($mainPd,status:200);
            }
            }catch(\Exception $e){
                return response()->json(['message' => 'Not Found!'], 404);
            }
    }
    public function getPdCategory($id)
    {      
        try{
            $mainPd = MainProduct::where('conf_category_id',$id)
            ->where('postapi',1)
            ->where('conf_mainproduct_active',true)
            ->get();
            if($mainPd){
                
                return response()->json($mainPd,status:200);
            }
            }catch(\Exception $e){
                return response()->json(['message' => 'Not Found!'], 404);
            }
    }



    public function mainProducts ($id){


        try{

        $mainProducts = MainProduct::where('conf_mainproduct_id',$id)->where('postapi',1)->first();


        $mainprice = $mainProducts->conf_mainproduct_price;

        $minprice = 0;
        
        $maxprice = 0;

    
        $mainprice = explode('-', $mainprice);
        if(count($mainprice) > 1){
            if(strpos($mainprice[0], '฿') !== false){
                $minprice = str_replace('฿', '', $mainprice[0]);
            }else{
                $minprice = $mainprice[0];
            }
            if(strpos($mainprice[1], '฿') !== false){
                $maxprice = str_replace('฿', '', $mainprice[1]);
            }else{
                $maxprice = $mainprice[1];
            }
        }else{
            $minprice = $maxprice = str_replace('฿', '', $mainprice[0]);
        }
        $mainProducts->conf_mainproduct_price = [
            'min' => (float) $minprice,
            'max' => (float) $maxprice
        ];

        $mainProducts->main_img = [
         
            $mainProducts->conf_mainproduct_img1,
            $mainProducts->conf_mainproduct_img2,
            $mainProducts->conf_mainproduct_img3,
            $mainProducts->conf_mainproduct_img4,
            $mainProducts->conf_mainproduct_img5,   
            $mainProducts->conf_mainproduct_img6,
            $mainProducts->conf_mainproduct_img7,
            $mainProducts->conf_mainproduct_img8

        ];



        $mainProducts->main_img = array_filter($mainProducts->main_img);


            $subProducts = SubProduct::where('conf_mainproduct_id',$mainProducts->conf_mainproduct_id)
            ->where('postapi',1)
            ->get();

            $tags = MainProductTag::where('conf_mainproduct_id', $mainProducts->conf_mainproduct_id)
            ->get();

            $tags_array = [];
          
            foreach($tags as $val2){

                            $tags_array[] = [
                                    'conf_mainproduct_tag_name_th' => $val2->conf_mainproduct_tag_name_th,
                                    'conf_mainproduct_tag_name_en' => $val2->conf_mainproduct_tag_name_en
                            ];

            }

            $sub_color = [];

            $sub_size = [];

            $img_sub = [];



            foreach($subProducts as $subProduct){

                $subProduct->conf_subproduct_price1 = (float) $subProduct->conf_subproduct_price1;
                $subProduct->conf_subproduct_price2 = (float) $subProduct->conf_subproduct_price2;
                $subProduct->conf_subproduct_price3 = (float) $subProduct->conf_subproduct_price3;
                $subProduct->conf_subproduct_price4 = (float) $subProduct->conf_subproduct_price4;
                $subProduct->conf_subproduct_price5 = (float) $subProduct->conf_subproduct_price5;

                $img_sub = [

                    $subProduct->conf_subproduct_img1,
                    $subProduct->conf_subproduct_img2,
                    $subProduct->conf_subproduct_img3,
                    $subProduct->conf_subproduct_img4

                ];



                $subProduct->img_sub = array_filter($img_sub);

                $sub_color[] = $subProduct->conf_color_name_th;

                $sub_size[] = $subProduct->conf_size_name_th;


           
            }



            $mainProducts->sub_color = $sub_color;

            $mainProducts->sub_size = $sub_size;

            $mainProducts->sub_product = $subProducts;

            $mainProducts->tags = $tags_array;




            $mainProducts->sub_color = array_unique($mainProducts->sub_color);

            $mainProducts->sub_size = array_unique($mainProducts->sub_size);



            $mainProducts->sub_size = array_values($mainProducts->sub_size);


        

        if($mainProducts){

            return response()->json($mainProducts);

        }else{

            return response()->json(['message' => 'Not Found!'], 404);

        }
        


    }catch(\Exception $e){


        return response()->json(['message' => 'Not Found!'], 404);


    }

}


public function multiProductsTags(Request $request){


try{

    $category = $request->category;

    $tags_filter = $request->input('tags', []);



   
    if($category != 'all' && $tags_filter == null){ 

        $minPrice = $request->input('minPrice');

        $maxPrice = $request->input('maxPrice');

        $mainProducts = MainProduct::where('conf_category_id', $category)->where('postapi',1)
        ->paginate($request->input('per_page', 20));

        $mainProducts = $mainProducts->unique('conf_mainproduct_id');

        $mainProducts = $mainProducts->sortBy('conf_mainproduct_id')->values();


        $mainProducts = new \Illuminate\Pagination\LengthAwarePaginator($mainProducts, $mainProducts->count(), $request->input('per_page', 20));


        $mainProducts->setPath($request->url());

        $mainProducts->appends($request->all());

        $count = $mainProducts->count();

        foreach($mainProducts as $val){

            $mainprice = $val->conf_mainproduct_price;

            $minprice = 0;

            $maxprice = 0;

            $mainprice = explode('-', $mainprice);
            if(count($mainprice) > 1){
                if(strpos($mainprice[0], '฿') !== false){
                    $minprice = str_replace('฿', '', $mainprice[0]);
                }else{
                    $minprice = $mainprice[0];
                }
                if(strpos($mainprice[1], '฿') !== false){
                    $maxprice = str_replace('฿', '', $mainprice[1]);
                }else{
                    $maxprice = $mainprice[1];
                }
            }else{
                $minprice = $maxprice = str_replace('฿', '', $mainprice[0]);
            }
            $val->conf_mainproduct_price = [
                'min' => (float) $minprice,
                'max' => (float) $maxprice
            ];


            $tags = MainProductTag::where('conf_mainproduct_id', $val->conf_mainproduct_id)
                    ->get();

            $subProducts = SubProduct::
                    select('conf_mainproduct_id','conf_subproduct_id','conf_subproduct_code','conf_subproduct_name_th','conf_subproduct_name_en','conf_color_name_th',
                    'conf_size_name_th','conf_subproduct_price5 as min','conf_subproduct_price1 as max','conf_subproduct_img1','conf_subproduct_img2','conf_subproduct_img3','conf_subproduct_img4')
                    ->where('postapi',1)
                    ->where('conf_mainproduct_id',$val->conf_mainproduct_id)
                    ->orderBy('conf_subproduct_id','asc')
                    ->get();

            $tags_array = [];
            $productsub_array = [];
            $size_array = [];

            foreach($tags as $val2){

                            $tags_array[] = [
                                    'conf_mainproduct_tag_name_th' => $val2->conf_mainproduct_tag_name_th,
                                    'conf_mainproduct_tag_name_en' => $val2->conf_mainproduct_tag_name_en
                            ];

            }

            $img_sub = [];

            foreach($subProducts as $val3){

                $img_sub = [

                    $val3->conf_subproduct_img1,
                    $val3->conf_subproduct_img2,
                    $val3->conf_subproduct_img3,
                    $val3->conf_subproduct_img4

                ];

                $img_sub = array_filter($img_sub);

                

            $productsub_array[] = [
                                'conf_subproduct_id' => $val3->conf_subproduct_id,
                                'conf_subproduct_code' => $val3->conf_subproduct_code,
                                'conf_subproduct_name_th' => $val3->conf_subproduct_name_th,
                                'conf_subproduct_name_en' => $val3->conf_subproduct_name_en,
                                'conf_color_name_th' => $val3->conf_color_name_th,
                                'conf_size_name_th' => $val3->conf_size_name_th,
                                'min' => (float) $val3->min,
                                'max' => (float) $val3->max,
                                'img_sub' => $img_sub
                            ];

                            $productsub_array = collect($productsub_array)->filter(function($value, $key) use ($minPrice, $maxPrice) {
                                $price_min = $value['min'];
                                $price_max = $value['max'];
                
                                if(empty($minPrice) && empty($maxPrice)){
                
                                    return $value;
                
                                }else if(empty($minPrice)){
                                    if ($price_min <= $maxPrice && $price_max <= $maxPrice) {
                                        return $value;
                
                                    }
                                }else if(empty($maxPrice)){
                                    if ($price_min >= $minPrice) {
                                        return $value;
                                    }
                                }else{
                                    if ($price_min >= $minPrice && $price_min <= $maxPrice && $price_max <= $maxPrice) {
                                        if ($price_max <= $maxPrice) {
                                            return $value;
                                        }
                                       
                                    }
                                }
                            });

            $size_array[] = $val3->conf_size_name_th;

            }

            $val->sub_product = $productsub_array;

            $val->size = array_unique($size_array);

            $val->size = array_values($val->size);
            
            $val->tags = $tags_array; 

            }

            $mainProducts = $mainProducts->filter(function($value, $key) use ($minPrice, $maxPrice) {
                $price = $value->conf_mainproduct_price;
                
                if (empty($minPrice) && empty($maxPrice)) {
                    return $value;
    
                } else if (empty($minPrice)) {
                    if ($price['max'] <= $maxPrice) {
                        return $value;
                    }
                } else if (empty($maxPrice)) {
                    if ($price['min'] >= $minPrice) {
                        return $value;
                    }
                } else {
                    if ($price['min'] >= $minPrice && $price['min'] <= $maxPrice && $price['max'] <= $maxPrice) {
                        if ($price['max'] <= $maxPrice) {
                            return $value;
                        }
                    }
                }
            });
    
    
            $mainProducts = $mainProducts->unique('conf_mainproduct_id');
    
            $mainProducts = $mainProducts->sortBy('conf_mainproduct_id')->values();
    
    
            $mainProducts = new \Illuminate\Pagination\LengthAwarePaginator($mainProducts, $mainProducts->count(), $request->input('per_page', 20));
    
    
            $mainProducts->setPath($request->url());
    
            $mainProducts->appends($request->all());
    
            $count = $mainProducts->count();


        $res = [
            'product_total' => $count,
            'item' => $mainProducts
        ];

        if($mainProducts){

            return response()->json($res);

        }else{

            return response()->json($res);

        }


    }else if($category != 'all' && $tags_filter != null){

        $minPrice = $request->input('minPrice');

        $maxPrice = $request->input('maxPrice');

        $mainProducts = MainProduct::where('conf_category_id', $category)
        ->join('conf_mainproduct_tag','conf_mainproduct.conf_mainproduct_id','=','conf_mainproduct_tag.conf_mainproduct_id')
        ->whereIn('conf_mainproduct_tag_name_th', $tags_filter)
        ->where('postapi',1)
        ->paginate($request->input('per_page', 20));

        $mainProducts = $mainProducts->unique('conf_mainproduct_id');

        $mainProducts = $mainProducts->sortBy('conf_mainproduct_id')->values();


        $mainProducts = new \Illuminate\Pagination\LengthAwarePaginator($mainProducts, $mainProducts->count(), $request->input('per_page', 20));


        $mainProducts->setPath($request->url());

        $mainProducts->appends($request->all());

        $count = $mainProducts->count();


        foreach($mainProducts as $val){

            $mainprice = $val->conf_mainproduct_price;

            $minprice = 0;

            $maxprice = 0;

            $mainprice = explode('-', $mainprice);
            if(count($mainprice) > 1){
                if(strpos($mainprice[0], '฿') !== false){
                    $minprice = str_replace('฿', '', $mainprice[0]);
                }else{
                    $minprice = $mainprice[0];
                }
                if(strpos($mainprice[1], '฿') !== false){
                    $maxprice = str_replace('฿', '', $mainprice[1]);
                }else{
                    $maxprice = $mainprice[1];
                }
            }else{
                $minprice = $maxprice = str_replace('฿', '', $mainprice[0]);
            }
            $val->conf_mainproduct_price = [
                'min' => (float) $minprice,
                'max' => (float) $maxprice
            ];

            $tags = MainProductTag::where('conf_mainproduct_id', $val->conf_mainproduct_id)
                    ->get();

            $subProducts = SubProduct::
                    select('conf_mainproduct_id','conf_subproduct_id','conf_subproduct_code','conf_subproduct_name_th','conf_subproduct_name_en','conf_color_name_th',
                    'conf_size_name_th','conf_subproduct_price5 as min','conf_subproduct_price1 as max','conf_subproduct_img1','conf_subproduct_img2','conf_subproduct_img3','conf_subproduct_img4')
                    ->where('postapi',1)
                    ->where('conf_mainproduct_id',$val->conf_mainproduct_id)
                    ->orderBy('conf_subproduct_id','asc')
                    ->get();

            $tags_array = [];
            $productsub_array = [];
            $size_array = [];

            foreach($tags as $val2){

                            $tags_array[] = [
                                    'conf_mainproduct_tag_name_th' => $val2->conf_mainproduct_tag_name_th,
                                    'conf_mainproduct_tag_name_en' => $val2->conf_mainproduct_tag_name_en
                            ];

            }

            $img_sub = [];

            foreach($subProducts as $val3){

                
                $img_sub = [

                    $val3->conf_subproduct_img1,
                    $val3->conf_subproduct_img2,
                    $val3->conf_subproduct_img3,
                    $val3->conf_subproduct_img4

                ];

                $img_sub = array_filter($img_sub);


            $productsub_array[] = [
                                'conf_subproduct_id' => $val3->conf_subproduct_id,
                                'conf_subproduct_code' => $val3->conf_subproduct_code,
                                'conf_subproduct_name_th' => $val3->conf_subproduct_name_th,
                                'conf_subproduct_name_en' => $val3->conf_subproduct_name_en,
                                'conf_color_name_th' => $val3->conf_color_name_th,
                                'conf_size_name_th' => $val3->conf_size_name_th,
                                'min' => (float) $val3->min,
                                'max' => (float) $val3->max,
                                'img_sub' => $img_sub
                            ];

                            $productsub_array = collect($productsub_array)->filter(function($value, $key) use ($minPrice, $maxPrice) {
                                $price_min = $value['min'];
                                $price_max = $value['max'];
                
                                if(empty($minPrice) && empty($maxPrice)){
                
                                    return $value;
                
                                }else if(empty($minPrice)){
                                    if ($price_min <= $maxPrice && $price_max <= $maxPrice) {
                                        return $value;
                
                                    }
                                }else if(empty($maxPrice)){
                                    if ($price_min >= $minPrice) {
                                        return $value;
                                    }
                                }else{
                                    if ($price_min >= $minPrice && $price_min <= $maxPrice && $price_max <= $maxPrice) {
                                        if ($price_max <= $maxPrice) {
                                            return $value;
                                        }
                                       
                                    }
                                }
                            });

            $size_array[] = $val3->conf_size_name_th;

            }

            $val->sub_product = $productsub_array;

            $val->size = array_unique($size_array);

            $val->size = array_values($val->size);

            $val->tags = $tags_array;

            }

            $mainProducts = $mainProducts->filter(function($value, $key) use ($minPrice, $maxPrice) {
                $price = $value->conf_mainproduct_price;
                
                if (empty($minPrice) && empty($maxPrice)) {
                    return $value;
    
                } else if (empty($minPrice)) {
                    if ($price['max'] <= $maxPrice) {
                        return $value;                      
                    }
                } else if (empty($maxPrice)) {
                    if ($price['min'] >= $minPrice) {
                        return $value;
                    }
                } else {
                    if ($price['min'] >= $minPrice && $price['min'] <= $maxPrice && $price['max'] <= $maxPrice) {
                        if ($price['max'] <= $maxPrice) {
                            return $value;
                        }
                    }
                }
            });
    
    
            $mainProducts = $mainProducts->unique('conf_mainproduct_id');
    
            $mainProducts = $mainProducts->sortBy('conf_mainproduct_id')->values();
    
    
            $mainProducts = new \Illuminate\Pagination\LengthAwarePaginator($mainProducts, $mainProducts->count(), $request->input('per_page', 20));
    
    
            $mainProducts->setPath($request->url());
    
            $mainProducts->appends($request->all());
    
            $count = $mainProducts->count();



        $res = [
            'product_total' => $count,
            'item' => $mainProducts
        ];

        if($mainProducts->isNotEmpty()){

            return response()->json($res);

        }else{

            return response()->json($res);

        }


    }else if($category == 'all' && $tags_filter != null){

        $minPrice = $request->input('minPrice');

        $maxPrice = $request->input('maxPrice');

        $mainProducts = MainProduct::join('conf_mainproduct_tag','conf_mainproduct.conf_mainproduct_id','=','conf_mainproduct_tag.conf_mainproduct_id')
        ->whereIn('conf_mainproduct_tag_name_th', $tags_filter)
        ->where('postapi',1)
        ->paginate($request->input('per_page', 20));
            
        $mainProducts = $mainProducts->unique('conf_mainproduct_id');

        $mainProducts = $mainProducts->sortBy('conf_mainproduct_id')->values();


        $mainProducts = new \Illuminate\Pagination\LengthAwarePaginator($mainProducts, $mainProducts->count(), $request->input('per_page', 20));


        $mainProducts->setPath($request->url());

        $mainProducts->appends($request->all());

        $count = $mainProducts->count();
        


        foreach($mainProducts as $val){

            $mainprice = $val->conf_mainproduct_price;

            $minprice = 0;

            $maxprice = 0;

            $mainprice = explode('-', $mainprice);
            if(count($mainprice) > 1){
                if(strpos($mainprice[0], '฿') !== false){
                    $minprice = str_replace('฿', '', $mainprice[0]);
                }else{
                    $minprice = $mainprice[0];
                }
                if(strpos($mainprice[1], '฿') !== false){
                    $maxprice = str_replace('฿', '', $mainprice[1]);
                }else{
                    $maxprice = $mainprice[1];
                }
            }else{
                $minprice = $maxprice = str_replace('฿', '', $mainprice[0]);
            }
            $val->conf_mainproduct_price = [
                'min' => (float) $minprice,
                'max' => (float) $maxprice
            ];

            $tags = MainProductTag::where('conf_mainproduct_id', $val->conf_mainproduct_id)
                    ->get();

            $subProducts = SubProduct::
                    select('conf_mainproduct_id','conf_subproduct_id','conf_subproduct_code','conf_subproduct_name_th','conf_subproduct_name_en','conf_color_name_th',
                    'conf_size_name_th','conf_subproduct_price5 as min','conf_subproduct_price1 as max','conf_subproduct_img1','conf_subproduct_img2','conf_subproduct_img3','conf_subproduct_img4')
                    ->where('postapi',1)
                    ->where('conf_mainproduct_id',$val->conf_mainproduct_id)
                    ->orderBy('conf_subproduct_id','asc')
                    ->get();

            $tags_array = [];
            $productsub_array = [];
            $size_array = [];

            foreach($tags as $val2){

                            $tags_array[] = [
                                    'conf_mainproduct_tag_name_th' => $val2->conf_mainproduct_tag_name_th,
                                    'conf_mainproduct_tag_name_en' => $val2->conf_mainproduct_tag_name_en
                            ];

            }

            $img_sub = [];

            foreach($subProducts as $val3){

                
                $img_sub = [

                    $val3->conf_subproduct_img1,
                    $val3->conf_subproduct_img2,
                    $val3->conf_subproduct_img3,
                    $val3->conf_subproduct_img4

                ];

                $img_sub = array_filter($img_sub);


            $productsub_array[] = [
                                'conf_subproduct_id' => $val3->conf_subproduct_id,
                                'conf_subproduct_code' => $val3->conf_subproduct_code,
                                'conf_subproduct_name_th' => $val3->conf_subproduct_name_th,
                                'conf_subproduct_name_en' => $val3->conf_subproduct_name_en,
                                'conf_color_name_th' => $val3->conf_color_name_th,
                                'conf_size_name_th' => $val3->conf_size_name_th,
                                'min' => (float) $val3->min,
                                'max' => (float) $val3->max,
                                'img_sub' => $img_sub
                            ];

                            
            $productsub_array = collect($productsub_array)->filter(function($value, $key) use ($minPrice, $maxPrice) {
                $price_min = $value['min'];
                $price_max = $value['max'];

                if(empty($minPrice) && empty($maxPrice)){

                    return $value;

                }else if(empty($minPrice)){
                    if ($price_min <= $maxPrice && $price_max <= $maxPrice) {
                        return $value;

                    }
                }else if(empty($maxPrice)){
                    if ($price_min >= $minPrice) {
                        return $value;
                    }
                }else{
                    if ($price_min >= $minPrice && $price_min <= $maxPrice && $price_max <= $maxPrice) {
                        if ($price_max <= $maxPrice) {
                            return $value;
                        }
                       
                    }
                }
            });

            $size_array[] = $val3->conf_size_name_th;
                
                }

            $val->sub_product = $productsub_array;

            $val->size = array_unique($size_array);

            $val->size = array_values($val->size);

            $val->tags = $tags_array;

            }

            $mainProducts = $mainProducts->filter(function($value, $key) use ($minPrice, $maxPrice) {
                $price = $value->conf_mainproduct_price;
                
                if (empty($minPrice) && empty($maxPrice)) {
                    return $value;
    
                } else if (empty($minPrice)) {
                    if ($price['max'] <= $maxPrice) {
                        return $value;
                    }
                } else if (empty($maxPrice)) {
                    if ($price['min'] >= $minPrice) {
                        return $value;
                    }
                } else {
                    if ($price['min'] >= $minPrice && $price['min'] <= $maxPrice && $price['max'] <= $maxPrice) {
                        if ($price['max'] <= $maxPrice) {
                            return $value;
                        }
                    }
                }
            });
    
    
            $mainProducts = $mainProducts->unique('conf_mainproduct_id');
    
            $mainProducts = $mainProducts->sortBy('conf_mainproduct_id')->values();
    
    
            $mainProducts = new \Illuminate\Pagination\LengthAwarePaginator($mainProducts, $mainProducts->count(), $request->input('per_page', 20));
    
    
            $mainProducts->setPath($request->url());
    
            $mainProducts->appends($request->all());
    
            $count = $mainProducts->count();

$res = [
    'product_total' => $count,
    'item' => $mainProducts
];

if($mainProducts->isNotEmpty()){
    return response()->json($res);
} else {
    return response()->json($res);
}


    }else if($category == 'all' && $tags_filter == null){



        $minPrice = $request->input('minPrice');

        $maxPrice = $request->input('maxPrice');

        

        $mainProducts = MainProduct::where('postapi',1)->paginate($request->input('per_page', 20));


        $mainProducts = $mainProducts->unique('conf_mainproduct_id');

        $mainProducts = $mainProducts->sortBy('conf_mainproduct_id')->values();


        $mainProducts = new \Illuminate\Pagination\LengthAwarePaginator($mainProducts, $mainProducts->count(), $request->input('per_page', 20));


        $mainProducts->setPath($request->url());

        $mainProducts->appends($request->all());

        $count = $mainProducts->count();
      

        foreach($mainProducts as $val){
            $mainprice = $val->conf_mainproduct_price;
            $minprice = 0;
            $maxprice = 0;

            $mainprice = explode('-', $mainprice);
            if(count($mainprice) > 1){
                if(strpos($mainprice[0], '฿') !== false){
                    $minprice = str_replace('฿', '', $mainprice[0]);
                }else{
                    $minprice = $mainprice[0];
                }
                if(strpos($mainprice[1], '฿') !== false){
                    $maxprice = str_replace('฿', '', $mainprice[1]);
                }else{
                    $maxprice = $mainprice[1];
                }
            }else{
                $minprice = $maxprice = str_replace('฿', '', $mainprice[0]);
            }
            $val->conf_mainproduct_price = [
                'min' => (float) $minprice,
                'max' => (float) $maxprice
            ];

            $tags = MainProductTag::where('conf_mainproduct_id', $val->conf_mainproduct_id)
                    ->get();


            $subProducts = SubProduct::
                    select('conf_mainproduct_id','conf_subproduct_id','conf_subproduct_code','conf_subproduct_name_th','conf_subproduct_name_en','conf_color_name_th',
                    'conf_size_name_th','conf_subproduct_price5 as min','conf_subproduct_price1 as max','conf_subproduct_img1','conf_subproduct_img2','conf_subproduct_img3','conf_subproduct_img4')
                    ->where('postapi',1)
                    ->where('conf_mainproduct_id',$val->conf_mainproduct_id)
                    ->orderBy('conf_subproduct_id','asc')
                    ->get();


            $tags_array = [];
            $productsub_array = [];
            $size_array = [];

            foreach($tags as $val2){

                            $tags_array[] = [
                                    'conf_mainproduct_tag_name_th' => $val2->conf_mainproduct_tag_name_th,
                                    'conf_mainproduct_tag_name_en' => $val2->conf_mainproduct_tag_name_en
                            ];

            }
            $img_sub = [];

            foreach($subProducts as $val3){

                $img_sub = [

                    $val3->conf_subproduct_img1,
                    $val3->conf_subproduct_img2,
                    $val3->conf_subproduct_img3,
                    $val3->conf_subproduct_img4

                ];

                $img_sub = array_filter($img_sub);





            $productsub_array[] = [
                                'conf_subproduct_id' => $val3->conf_subproduct_id,
                                'conf_subproduct_code' => $val3->conf_subproduct_code,
                                'conf_subproduct_name_th' => $val3->conf_subproduct_name_th,
                                'conf_subproduct_name_en' => $val3->conf_subproduct_name_en,
                                'conf_color_name_th' => $val3->conf_color_name_th,
                                'conf_size_name_th' => $val3->conf_size_name_th,
                                'min' => (float) $val3->min,
                                'max' => (float) $val3->max,
                                'img_sub' => $img_sub
                            ];


            $productsub_array = collect($productsub_array)->filter(function($value, $key) use ($minPrice, $maxPrice) {
                $price_min = $value['min'];
                $price_max = $value['max'];

                if(empty($minPrice) && empty($maxPrice)){

                    return $value;

                }else if(empty($minPrice)){
                    if ($price_min <= $maxPrice && $price_max <= $maxPrice) {
                        return $value;

                    }
                }else if(empty($maxPrice)){
                    if ($price_min >= $minPrice) {
                        return $value;
                    }
                }else{
                    if ($price_min >= $minPrice && $price_min <= $maxPrice && $price_max <= $maxPrice) {
                        if ($price_max <= $maxPrice) {
                            return $value;
                        }
                       
                    }
                }
            });
            

       
         



            $size_array[] = $val3->conf_size_name_th;

         

            }

            $val->sub_product = $productsub_array;

            $val->size = array_unique($size_array);

            $val->size = array_values($val->size);

            $val->tags = $tags_array;


            }

     

        $mainProducts = $mainProducts->filter(function($value, $key) use ($minPrice, $maxPrice) {
            $price = $value->conf_mainproduct_price;
            
            if (empty($minPrice) && empty($maxPrice)) {
                return $value;

            } else if (empty($minPrice)) {
                if ($price['max'] <= $maxPrice) {
                    return $value;
                }
            } else if (empty($maxPrice)) {
                if ($price['min'] >= $minPrice) {
                    return $value;
                }
            } else {
                if ($price['min'] >= $minPrice && $price['min'] <= $maxPrice && $price['max'] <= $maxPrice) {
                    if ($price['max'] <= $maxPrice) {
                        return $value;
                    }
                }
            }
        });


        $mainProducts = $mainProducts->unique('conf_mainproduct_id');

        $mainProducts = $mainProducts->sortBy('conf_mainproduct_id')->values();


        $mainProducts = new \Illuminate\Pagination\LengthAwarePaginator($mainProducts, $mainProducts->count(), $request->input('per_page', 20));


        $mainProducts->setPath($request->url());

        $mainProducts->appends($request->all());

        $count = $mainProducts->count();

      

        $res = [
            'product_total' => $count,
            'item' =>$mainProducts
        ];


        if($mainProducts->isNotEmpty()){

            return response()->json($res);

        }else{

            return response()->json($res);

        }


    }



    } catch(\Exception $e){

        $mess = $e->getMessage();

        return response()->json(['message' => 'Not Found!'], 404);

    }


}







  

}