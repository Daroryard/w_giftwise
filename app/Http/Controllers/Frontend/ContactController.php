<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CategorySub;
use App\Models\Category;
use Carbon\Carbon;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cont = DB::table('conf_contact')->where('conf_contact_id',2)->first(); 
        $categories = CategorySub::where('conf_categorysub_active', 1)
        ->orderBy('conf_category_id', 'asc')
        ->where('conf_categorysub_img1','<>',null)
        ->get();

      

        return view('frontend.contact.contact-detail',compact('cont','categories'));
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

    try{

        DB::beginTransaction();

      $help = 0;

      if($request->con_help == 'on'){

        $help = 1;

        }else{

        $help = 0;

        }

        $text_them = '';

        foreach($request->con_pj_them as $themeproduct){

            $text_them .= $themeproduct.',';

        }

        


        $docu_project = DB::table('docu_project')->insert([
            'docu_project_name' => $request->con_pj_name,
            'docu_project_objective' => $request->con_pj_ob_name,
            'docu_project_themeproduct' => $text_them,
            'docu_project_looking' => $request->con_pj_product,
            'docu_project_productqty' => $request->con_pj_amount,
            'docu_project_productday' => $request->con_pj_time,
            'docu_project_need' => $request->con_pj_detail,
            'docu_project_email' => $request->con_email,
            'docu_project_tel' => $request->con_tel,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'docu_project_companyname' => $request->con_company,
            'docu_project_contactname' => $request->con_name,
            'docu_project_remark' => $request->con_detail,
            'docu_project_help' => $help
        ]);

        DB::commit();

        return response()->json(['status' => 'success']);

    }catch(\Exception $e){

        DB::rollback();

        return response()->json(['status' => 'error','message' => $e->getMessage()]);

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

    public function contact () {

        $cont = DB::table('conf_contact')->where('conf_contact_id',2)->first(); 
        $categories = CategorySub::where('conf_categorysub_active', 1)
        ->orderBy('conf_category_id', 'asc')
        ->where('conf_categorysub_img1','<>',null)
        ->get();

      

        return view('frontend.contact.contact-detail',compact('cont','categories'));
    }

    public function contactStore (Request $request) {
        try{

            DB::beginTransaction();
    
          $help = 0;
    
          if($request->con_help == 'on'){
    
            $help = 1;
    
            }else{
    
            $help = 0;
    
            }
    
            $text_them = '';
    
            foreach($request->con_pj_them as $themeproduct){
    
                $text_them .= $themeproduct.',';
    
            }
    
            
    
    
            $docu_project = DB::table('docu_project')->insert([
                'docu_project_name' => $request->con_pj_name,
                'docu_project_objective' => $request->con_pj_ob_name,
                'docu_project_themeproduct' => $text_them,
                'docu_project_looking' => $request->con_pj_product,
                'docu_project_productqty' => $request->con_pj_amount,
                'docu_project_productday' => $request->con_pj_time,
                'docu_project_need' => $request->con_pj_detail,
                'docu_project_email' => $request->con_email,
                'docu_project_tel' => $request->con_tel,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'docu_project_companyname' => $request->con_company,
                'docu_project_contactname' => $request->con_name,
                'docu_project_remark' => $request->con_detail,
                'docu_project_help' => $help
            ]);
    
            DB::commit();
    
            return response()->json(['status' => 'success']);
    
        }catch(\Exception $e){
    
            DB::rollback();
    
            return response()->json(['status' => 'error','message' => $e->getMessage()]);
    
        }
    }
}
