<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;
use DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //raw query
        // $result = DB::select(DB::raw("SELECT * FROM medicines"));

        //query builder
        // $result = DB::table("medicines")->get();

        //eloquent model
        $result = Medicine::all();

        // dd($result);

        return view('medicine.index',compact('result'));
        // return view('medicine.index',['data'->$result]);
    }

    public function front_index(){
        $medicine=Medicine::all();
        return view('frontend.product',compact('medicine'));
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
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        // dd($medicine);
        $data=$medicine;
        return view("medicine.show",compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }

    public function coba1(){
        //query builder filter
        $result = DB::table('medicines')
            -> where("price",">",20000)
            ->get();

        $result = DB::table('medicines')
            -> where("generic_name","like","%fen")
            ->get();

        //groupby
        $result = DB::table('medicines')
            -> select("generic_name")
            -> groupBy("generic_name")
            ->get();

        //aggregate
        $result = DB::table('medicines')->count();
        $result = DB::table('medicines')->max('price');

        //filter+aggregate
        $result = DB::table('medicines')
            -> where("generic_name","like","%fen")
            ->avg('price');
            
        //join+orderBy
        $result = DB::table('medicines')
            ->join('categories','medicines.category_id','=','categories.id')
            ->orderBy('price','desc')
            ->get();

        //Eloquent
        $result = Medicine::where("price",">",20000)
            ->get();

        $result = Medicine::find(3);

        dd($result);
    }

    public function mostExpensive()
    {
        $result = DB::select(DB::raw("SELECT categories.category_name, medicines.generic_name, medicines.form, MAX(medicines.price) as price, medicines.image 
        FROM medicines
        INNER JOIN categories ON medicines.category_id = categories.id
        GROUP BY categories.category_name"));
       return view('report.list_mostExpensiveMedicine_by_category',compact('result'));
    }

    public function showInfo(){
        $result=Medicine::orderBy('price','desc')->first();
        return response()->json(array(
            'status'=>'oke',
            'msg'=>"<div class='alert alert-info'>
                     Did you know? 
                     <br>The most expensive medicine is ".$result->generic_name." ".$result->form." with price : Rp ".$result->price.
                     ",-</div>"
        ),200);
        
    }

    public function addToCart($id){
        $m=Medicine::find($id);
        $cart=session()->get('cart');
        if(!isset($cart[$id])){
            $cart[$id]=[
                "name"=>$m->generic_name." (".$m->form.")", 
                "qty"=>1,
                "price"=>$m->price,
                "img"=>$m->image
            ];
        }else{
            $cart[$id]['qty']++;
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Medicine: '.$cart[$id]["name"].'     Qty: '.$cart[$id]['qty']);
    }

    public function checkout(){
        return view('frontend.checkout');
    }


}
