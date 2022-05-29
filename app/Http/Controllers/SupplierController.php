<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use App\Category;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Supplier::all();
        return view('supplier.index',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('supplier.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $result = new Supplier();
        $result -> name=$request->get('name');
        $result -> address=$request->get('address');
        $result->save();
        return redirect()->route('suppliers.index')->with('status','Data supplier "'.$request->get('name').'" berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        // dd($supplier);
        $data=$supplier;
        return view('supplier.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->name=$request->get('name');
        $supplier->address=$request->get('address');
        $supplier->save();
        return redirect()->route('suppliers.index')->with('status','Data supplier "'.$request->get('name').'" berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $this->authorize('delete-permission');

        $supplier->delete();
        return redirect()->route('suppliers.index')->with('status','Data supplier berhasil dihapus');
    }

    public function getEditForm(Request $request){
        $id=$request->get('id');
        $data =Supplier::find($id);
        return response()->json(array(
            'status'=>'OK','msg'=>view('supplier.getEditForm',compact('data'))->render()
        ),200);
    }

    public function deleteData(Request $request){
        $id=$request->get('id');
        $supplier =Supplier::find($id);
        $supplier->delete();
        return response()->json(array(
            'status'=>'OK','msg'=>'Data berhasil dihapus'
        ),200);
    }

    public function getEditForm2(Request $request){
        $id=$request->get('id');
        $data =Supplier::find($id);
        return response()->json(array(
            'status'=>'OK','msg'=>view('supplier.getEditForm2',compact('data'))->render()
        ),200);
    }
    public function saveData(Request $request){
        $id=$request->get('id');
        $supplier =Supplier::find($id);
        $supplier ->name=$request->get('name');
        $supplier ->address=$request->get('address');
        $supplier->save();
        return response()->json(array(
            'status'=>'OK','msg'=>'Data berhasil diubah'
        ),200);
    }
}

