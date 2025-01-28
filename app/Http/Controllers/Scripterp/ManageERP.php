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
                    
                    $newcode = substr($erpcode, 3);

                    $cus_c = 'CT-'.str_pad($newcode + 1, 6, '0', STR_PAD_LEFT);

                    $mca = $value->docu_customer_address;



                  

                    }



                }





            }





            


        


    }
    









}
