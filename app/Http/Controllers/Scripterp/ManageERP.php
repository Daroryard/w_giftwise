<?php

namespace App\Http\Controllers\Scripterp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageERP extends Controller
{

    function orderList ($date) {


            $order = DB::table('docu_customer')
            ->whereRaw('CAST(created_at AS DATE) = ?', [$date])
            ->where('erp_status', '=', null)
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();


            if($order->isEmpty()) {
                
                return response()->json(['message' => 'No data found'], 404);


            } else {

                foreach($order as $key => $value) {

                    $customerERP =  DB::connection('sqlsrv_erp')->table('ms_customer')
                    ->where('ms_customer_email', '=', $value->docu_customer_companyemail)
                    ->first();
                    
                    if($customerERP) {
                        dd('มีข้อมูล');
                  
                    } else {

                        
                    $customerERP =  DB::connection('sqlsrv_erp')->table('ms_customer')
                    ->orderByDesc('ms_customer_id')->limit(1)->first();

                    $erpcode  = $customerERP->ms_customer_code;
                    // CT-007014 + 1 = CT-007015
                    $newcode = substr($erpcode, 3);

                    $cus_c = 'CT-'.str_pad($newcode + 1, 6, '0', STR_PAD_LEFT);

                    $mca = $value->docu_customer_address;



                    
                        dd($customerERP);
                        
                        // $data = [
                        //     'ms_customer_code' => $cus_c,
                        //     'ms_title_id' => $request->ms_title_id,
                        //     'ms_customer_name1' => $request->ms_customer_name1,
                        //     'ms_customer_name2' => $request->ms_customer_name2,
                        //     'ms_typebusiness_id' => $request->ms_typebusiness_id,
                        //     'ms_sizebusiness_id' => $request->ms_sizebusiness_id,
                        //     'ms_customergroup_id' => $request->ms_customergroup_id,
                        //     'ms_customer_taxid' => $request->ms_customer_taxid,
                        //     'ms_customer_email' => $request->ms_customer_email,
                        //     'ms_customer_tel' => $request->ms_customer_tel,
                        //     'ms_branch_id' => $request->ms_branch_id,
                        //     'ms_branch_number' => $request->ms_branch_number,
                        //     'ms_customer_creditday' => $request->ms_customer_creditday,
                        //     'ms_customer_budget' => $request->ms_customer_budget,
                        //     'ms_customer_address' => $mca,
                        //     'ms_region_id' => $request->ms_region_id,
                        //     'ms_province_id' => $ppro,
                        //     'ms_amphur_id' => $aamp,
                        //     'ms_district_id' => $ddist,
                        //     'ms_customer_postcode' => $pac,
                        //     'ms_customer_remark' => $request->ms_customer_remark,
                        //     'ms_customer_flag' => $request->ms_customer_flag ?? false,
                        //     'ms_customer_save' => Auth::user()->name,
                        //     'created_at' => Carbon::now(),
                        //     'ms_customer_fullname' =>$fname,
                        //     'ms_customer_fulladdress' =>$faddr,
                        //     'giftpolicy' => $request->giftpolicy,
                        //     'ms_customer_website' => $request->ms_customer_website,
                        //     'ms_customer_facebook'=> $request->ms_customer_facebook,
                        //     'ms_customer_line' => $request->ms_customer_line,
                        //     'ms_customer_credencelink' => $request->ms_customer_credencelink,
                        //     'registeredcapital' => $request->registeredcapital,
                        //     'companyvalue' => $request->companyvalue,
                        //     'postflag' => 'N'
                        // ];    

           









                        // return response()->json(['message' => 'Customer is not exist'], 200);

                    }



                }









                // check customer is duplicate 

                // $customerERP =  DB::connection('sqlsrv_erp')->table('ms_customer')
                // ->limit(5)->get();


                // dd($customerERP);












                


                // return response()->json($order, 200);


            }





            


        


    }
    









}
