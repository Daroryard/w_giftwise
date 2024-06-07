<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SaleCommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $hd = DB::table('erp_sal_salecommand_hd')
        ->leftjoin('erp_ms_customer','erp_sal_salecommand_hd.ms_customer_id','=','erp_ms_customer.ms_customer_id')
        ->leftjoin('erp_ms_customersub','erp_sal_salecommand_hd.ms_customersub_id','=','erp_ms_customersub.ms_customersub_id')
        ->leftjoin('docu_transport','erp_sal_salecommand_hd.sal_salecommand_hd_id','=','docu_transport.ref_id')
        ->select('erp_sal_salecommand_hd.*','erp_ms_customer.ms_customer_fullname','erp_ms_customersub.ms_customersub_name','erp_ms_customersub.ms_customersub_email','erp_ms_customersub.ms_customersub_tel','docu_transport.docu_transport_number','docu_transport.docu_transport_remark')
        ->where('sal_salecommand_hd_id',$id)->first();

        $dt = DB::table('erp_sal_salecommand_dt')
        ->leftjoin('erp_ms_productsub','erp_sal_salecommand_dt.ms_product_code','=','erp_ms_productsub.ms_productsub_code')
        ->where('sal_salecommand_hd_id',$id)
        ->where('sal_salecommand_dt_flag',true)
        ->get();


        $checkdt_duplicate = DB::table('docu_review')
        ->where('docu_review_refdocu',$hd->sal_salecommand_hd_docuno)
        ->get();

        foreach($checkdt_duplicate as $key => $val){

            foreach($dt as $key2 => $val2){

                if($val->docu_review_refdocu_dt_id == $val2->sal_salecommand_dt_id){
                    unset($dt[$key2]);
                }

            }


        }


        return view('backend.salecommand.sale-command-detail', compact('hd','dt'));
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

    public function insertReview(Request $request)
    {
        try{

            DB::beginTransaction();


            $hd = DB::table('erp_sal_salecommand_hd')
            ->leftjoin('erp_ms_customer','erp_sal_salecommand_hd.ms_customer_id','=','erp_ms_customer.ms_customer_id')
            ->leftjoin('erp_ms_customersub','erp_sal_salecommand_hd.ms_customersub_id','=','erp_ms_customersub.ms_customersub_id')
            ->leftjoin('docu_transport','erp_sal_salecommand_hd.sal_salecommand_hd_id','=','docu_transport.ref_id')
            ->select('erp_sal_salecommand_hd.*','erp_ms_customer.ms_customer_fullname','erp_ms_customersub.ms_customersub_name','erp_ms_customersub.ms_customersub_email','erp_ms_customersub.ms_customersub_tel','docu_transport.docu_transport_number','docu_transport.docu_transport_remark')
            ->where('sal_salecommand_hd_id',$request->sal_salecommand_hd_id)->first();
           

    

            foreach($request->sal_salecommand_dt_id as $key => $val){
                $dt = DB::table('erp_sal_salecommand_dt')
                ->leftjoin('erp_ms_productsub','erp_sal_salecommand_dt.ms_product_code','=','erp_ms_productsub.ms_productsub_code')
                ->where('sal_salecommand_hd_id',$request->sal_salecommand_hd_id)
                ->where('sal_salecommand_dt_id',$val)
                ->where('sal_salecommand_dt_flag',true)
                ->first();

                if($request->hasFile('file1'.$val)){
                    $file1 = $request->file('file1'.$val);
                    $filename1 = $file1->getClientOriginalName();
                    $extension1 = $file1->getClientOriginalExtension();
                    $filename1 = 'IMG_'.date('Ymd').$val.'.'.$extension1;
                    $upload = $file1->move('assets/backend/images/review/',$filename1);
                    $path1 = 'assets/backend/images/review/'.$filename1;
                }else{
                    $path1 = null;
                }

                if($request->hasFile('file2'.$val)){
                    $file2 = $request->file('file2'.$val);
                    $filename2 = $file2->getClientOriginalName();
                    $extension2 = $file2->getClientOriginalExtension();
                    $filename2 = 'IMG_'.date('Ymd').$val.'.'.$extension2;
                    $upload = $file2->move('assets/backend/images/review/',$filename2);
                    $path2 = 'assets/backend/images/review/'.$filename2;
                }else{
                    $path2 = null;
                }

                if($request->hasFile('file3'.$val)){
                    $file3 = $request->file('file3'.$val);
                    $filename3 = $file3->getClientOriginalName();
                    $extension3 = $file3->getClientOriginalExtension();
                    $filename3 = 'IMG_'.date('Ymd').$val.'.'.$extension3;
                    $upload = $file3->move('assets/backend/images/review/',$filename3);
                    $path3 = 'assets/backend/images/review/'.$filename3;
                }else{
                    $path3 = null;
                }

                if($request->hasFile('file4'.$val)){
                    $file4 = $request->file('file4'.$val);
                    $filename4 = $file4->getClientOriginalName();
                    $extension4 = $file4->getClientOriginalExtension();
                    $filename4 = 'IMG_'.date('Ymd').$val.'.'.$extension4;
                    $upload = $file4->move('assets/backend/images/review/',$filename4);
                    $path4 = 'assets/backend/images/review/'.$filename4;
                }else{
                    $path4 = null;
                }


                DB::table('docu_review')->insert([
                    'product_code' => $dt->ms_product_code,
                    'product_name' => $dt->ms_product_name1,
                    'docu_review_qty' => $request->star[$key],
                    'docu_review_remeak' => $request->remark[$key],
                    'docu_review_email' => $request->ms_customersub_email,
                    'docu_review_img1' => $path1,
                    'docu_review_img2' => $path2,
                    'docu_review_img3' => $path3,
                    'docu_review_img4' => $path4,
                    'docu_review_refdocu' => $request->sal_salecommand_hd_docuno,
                    'docu_review_refdocu_dt_id' => $val,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
         

            }

            DB::commit();

            return redirect()->route('duequotation.index')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว' . date('Y-m-d H:i:s'));

        }catch(\Exception $e){

            return redirect()->back()->with('alert', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');


        }



       
     
    }



}
