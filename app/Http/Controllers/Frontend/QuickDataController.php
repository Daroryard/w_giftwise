<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;

class QuickDataController extends Controller
{
    //

    public function quotationAdd(Request $request){

    $check =  DB::table('docu_customer')->get();


        try{


            if($request->hasFile('file')){

                $file = $request->file('file');
                $path = $file->storeAs('assets/frontend/images/file_quickquetation', 'QQUO_' . date('YmdHis') . str_pad(rand(0, 1000), 4, '0', STR_PAD_LEFT) . '.' . $file->extension());
                $filename = 'QQUO_' . date('YmdHis') . str_pad(rand(0, 1000), 4, '0', STR_PAD_LEFT) . '.' . $file->extension();

            }else{

                $filename = null;
                $path = null;

            }



            $insert = DB::table('docu_customer')->insertGetId([
                'docu_customer_email' => $request->email,
                'docu_customer_companyname' => $request->company,
                'docu_customer_tel' => $request->tel,
                'docu_customer_companyemail' => $request->companyemail,
                'docu_customer_remark' => $request->message,
                'docu_customer_file' => $path,
                'docu_customer_design' => $request->account_option,
                'docu_customer_flag' => 1,
                'docu_customer_name' => $request->name,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ] , 'docu_customer_id');
                
            if(Cart::count() > 0){
                $customer = DB::table('docu_customer')->where('docu_customer_id' , $insert)->first();
                foreach(Cart::content() as $key => $value){
                    foreach($value->options['subproduct'] as $key2 => $value2){
                    $product = DB::table('conf_subproduct')->where('conf_subproduct_id' , $value2['id'])->first();
                    $product_price = $value2['price'] * $value2['qty'];
                    $product_total = $value->price;
                    $product_qty = $value2['qty'];
                    $product_day = ($value2['day'] * $value2['qty']) + ($value->options['addon']['day'] * $value2['qty']) + ($value->options['packaging']['day'] * $value2['qty']) + $value->options['timeline']['day'];
                    $product_addon = [
                        $value->options['addon']['id'],
                        $value->options['addon']['id'],
                        $value->options['packaging']['id'],
                    ];
                       DB::table('docu_customersub')->insert([
                        'docu_customer_id' => $insert,
                        'product_code' => $product->conf_subproduct_code,
                        'product_name' => $product->conf_subproduct_name_th,
                        'product_price' => $product_price,
                        'product_qty' => $product_qty,
                        'product_total' => $product_total,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'product_addon' => implode(',' , $product_addon),
                        'product_days'  => $product_day,
                        'docu_customersub_flag' => $customer->docu_customer_flag,
                    ]);
                    }
                    
                }
            }
            Cart::destroy();
            DB::commit();
            return response()->json(['status' => 'success' , 'message' => 'บันทึกข้อมูลสำเร็จ' , 'data' => $insert]);


        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }




    }

    public function quotationAddHome (Request $request) {

        
        try{


            if($request->hasFile('file')){


                $file = $request->file('file');
                $path = $file->storeAs('assets/frontend/images/file_quickquetation', 'QQUO_' . date('YmdHis') . str_pad(rand(0, 1000), 4, '0', STR_PAD_LEFT) . '.' . $file->extension());
                $filename = 'QQUO_' . date('YmdHis') . str_pad(rand(0, 1000), 4, '0', STR_PAD_LEFT) . '.' . $file->extension();

            }else{

                $filename = null;
                $path = null;

            }


            $insert = DB::table('docu_customer')->insert([
                'docu_customer_email' => $request->email,
                'docu_customer_companyname' => $request->company,
                'docu_customer_tel' => $request->tel,
                'docu_customer_companyemail' => $request->email,
                'docu_customer_remark' => $request->remark,
                'docu_customer_file' => $path,
                'docu_customer_design' => $request->option,
                'docu_customer_flag' => 1,
                'docu_customer_name' => $request->name,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            DB::commit();


            return response()->json(['status' => 'success' , 'message' => 'success' , 'data' => $insert]);
            
        }catch(\Exception $e){

            return response()->json($e->getMessage());

        }

    }



    public function searchProduct (Request $request){

        $keyword = $request->search;

        $category = DB::table('conf_mainproduct')
        ->select('conf_mainproduct_id' , 'conf_categorysub_name_th' , 'conf_categorysub_name_en')
        ->where('conf_categorysub_name_th' , 'LIKE' , '%'.$keyword.'%')
        ->orWhere('conf_categorysub_name_en' , 'LIKE' , '%'.$keyword.'%')->get();

        $productname = DB::table('conf_mainproduct')
        ->select('conf_mainproduct_id' , 'conf_mainproduct_name_th' , 'conf_mainproduct_name_en')
        ->where('conf_mainproduct_name_th' , 'LIKE' , '%'.$keyword.'%')
        ->orWhere('conf_mainproduct_name_en' , 'LIKE' , '%'.$keyword.'%')->get();

        $tag = DB::table('conf_mainproduct_tag')
        ->select('conf_mainproduct_tag_id', 'conf_mainproduct_id', 'conf_mainproduct_tag_name_th' , 'conf_mainproduct_tag_name_en')
        ->where('conf_mainproduct_tag_name_th' , 'LIKE' , '%'.$keyword.'%')
        ->orWhere('conf_mainproduct_tag_name_en' , 'LIKE' , '%'.$keyword.'%')->get();



        return response()->json(['category' => $category , 'productname' => $productname , 'tag' => $tag]);


    }





}
