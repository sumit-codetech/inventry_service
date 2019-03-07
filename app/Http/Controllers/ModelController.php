<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carmodel;
class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $models=Carmodel::with('manufacturer')->get()->toArray();
        return response()->json($models,200);
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
        $request->validate([
            'name' => 'required|string|max:50',
            'color' => 'required|string|max:20',
            'year_of_manufacturer' => 'required|string|max:4',
            'registration_number' => 'required|string|max:10',
            'note' => 'required|string|max:50',
            'count' => 'required|string|max:4',
            'manufacturer_id' => 'required|numeric|exists:manufacturers,id'
            ]);
        $mnf = new Carmodel();
        $mnf->name=$request->name;
        $mnf->color=$request->color;
        $mnf->year_of_manufacturer=$request->year_of_manufacturer;
        $mnf->registration_number=$request->registration_number;
        $mnf->note=$request->note;
        $mnf->count=$request->count;
        $mnf->manufacturer_id=$request->manufacturer_id;
        $mnf->save();
        return response()->json('Model added successfully',200);
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
        $model=Carmodel::with('manufacturer')->where('id',$id)->get();
        return response()->json($model,200);
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
        Carmodel::destroy($id);
        return response()->json('Model deleted successfully',200);

    }
}
