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
            ->get();


            if($order->isEmpty()) {
                
                return response()->json(['message' => 'No data found'], 404);


            } else {







                


                return response()->json($order, 200);


            }





            


        


    }
    









}
