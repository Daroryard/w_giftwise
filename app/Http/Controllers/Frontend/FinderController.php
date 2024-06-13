<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF, App;

class FinderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View ('frontend.finder.finder');
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

    public function filterFinder (Request $request) {

        $priceMin = $request->priceMin;
        $priceMax = $request->priceMax;
        $qty = $request->qty;
        $timeline = $request->timeline;


        try{

        if($timeline == 'ready'){
       
            $productlist = DB::table('conf_subproduct')
            ->join('conf_mainproduct', 'conf_subproduct.conf_mainproduct_id', '=', 'conf_mainproduct.conf_mainproduct_id')
            ->whereBetween('conf_subproduct_price1',[$priceMin,$priceMax])
            ->orwhereBetween('conf_subproduct_price2',[$priceMin,$priceMax])
            ->orwhereBetween('conf_subproduct_price3',[$priceMin,$priceMax])
            ->orwhereBetween('conf_subproduct_price4',[$priceMin,$priceMax])
            ->orwhereBetween('conf_subproduct_price5',[$priceMin,$priceMax])
            ->where('conf_subproduct_quota', '<=', $qty)
            ->where('conf_subproduct_days', '=', 0)
            ->get();

        }else{

            $productlist = DB::table('conf_subproduct')
            ->join('conf_mainproduct', 'conf_subproduct.conf_mainproduct_id', '=', 'conf_mainproduct.conf_mainproduct_id')
            ->whereBetween('conf_subproduct_price1',[$priceMin,$priceMax])
            ->orwhereBetween('conf_subproduct_price2',[$priceMin,$priceMax])
            ->orwhereBetween('conf_subproduct_price3',[$priceMin,$priceMax])
            ->orwhereBetween('conf_subproduct_price4',[$priceMin,$priceMax])
            ->orwhereBetween('conf_subproduct_price5',[$priceMin,$priceMax])
            ->where('conf_subproduct_quota', '<=', $qty)
            ->where('conf_subproduct_days', '<=', $timeline)
            ->get();


        }




        foreach($productlist as $product){

            $tag = DB::table('conf_mainproduct_tag')
            ->select('conf_mainproduct_tag_name_th')
            ->where('conf_mainproduct_id', $product->conf_mainproduct_id)
            ->where('conf_mainproduct_tag_active', 1)
            ->groupBy('conf_mainproduct_tag_name_th')
            ->get();


            $product->tag = $tag;


        }


        // duplicate data tag







        return response()->json($productlist);


        }catch(\Exception $e){
            
            return response()->json($e->getMessage());
        }




    }


    public function previewFinder (Request $request) {

        $product = $request->product;

        $productdata = DB::table('conf_subproduct')
        ->join('conf_mainproduct', 'conf_subproduct.conf_mainproduct_id', '=', 'conf_mainproduct.conf_mainproduct_id')
        ->whereIn('conf_subproduct.conf_subproduct_id', $product)
        ->get();




        return response()->json($productdata);

    }




    public function downloadPDF (Request $request) {



        $product = $request->product;

        $productdata = DB::table('conf_subproduct')
        ->join('conf_mainproduct', 'conf_subproduct.conf_mainproduct_id', '=', 'conf_mainproduct.conf_mainproduct_id')
        ->whereIn('conf_subproduct.conf_subproduct_id', $product)
        ->get();  

        

        try{

 

            $data = [
                'catalog' => $productdata
            ];

            $pdf = App::make('dompdf.wrapper');

            $pdf = PDF::loadView('frontend.finder.download-catalog', $data)->setPaper('a4', 'landscape');

            $filename_format_time = date('YmdHis');
            // return $pdf->stream();

            return $pdf->download();



        }catch(\Exception $e){

            return response($e->getMessage());

        }
    
        
        
}

        public function downloadPDF2 (Request $request) {

            try{

            $product = $request->check_product;

            $productdata = DB::table('conf_mainproduct')
            ->whereIn('conf_mainproduct_id', $product)
            ->get();  
                // dd($productdata);


            foreach($productdata as $product){

                $subproduct = DB::table('conf_subproduct')
                ->where('conf_mainproduct_id', $product->conf_mainproduct_id)
                ->where('conf_subproduct_stcqty', '>', 0)
                ->inRandomOrder()->take(3)
                ->get();


                $product->subproduct = $subproduct;


            }


            $data = [
                'catalog' => $productdata
            ];


            $pdf = App::make('dompdf.wrapper');

            $pdf = PDF::loadView('frontend.finder.download-catalog', $data)->setPaper('a4', 'landscape');

            $filename_format_time = date('YmdHis');

            // dd($productdata);
            // return $pdf->stream();

            return $pdf->download($filename_format_time.'.pdf');

            }catch(\Exception $e){

                dd($e->getMessage());
                return view('frontend.finder.finder');

            }



        }

        public function finder () {
            return View ('frontend.finder.finder');
        }



}
