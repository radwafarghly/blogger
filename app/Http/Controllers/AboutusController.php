<?php

namespace App\Http\Controllers;

use App\Aboutus;
use Illuminate\Http\Request;
use Validator;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about_us=Aboutus::all();
        return response()->json(['about_us'=>$about_us],201);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about=Aboutus::find($id);
        return response()->json(['about'=>$about],201);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->only('details');
        $rules = [
            'details'=>'required',
        ];
        //validate
        $this->validate($request, [
            "details"=>"required",

        ]);

        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json([
                'message'=> $validator->messages(),
            ]);
        }

        //insert into aboutus table
        $user=new Aboutus([
            "details"=>$request->input('details'),
        ]);


        $user->save();
        return response()->json(['message'=>"Add About us successfully"],201);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $about_us = Aboutus::find($id);
        return response()->json(['about'=>$about_us],201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$id)
    {
        $credentials = $request->all();
        $rules = [
            "details"=>"required",
        ];
        //validate
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json([
                'response' => 'error',
                'message'=> $validator->messages(),
            ],400);
        }
        $about_us = Aboutus::find($id);
        $about_us->details=$request->input('details');
        $about_us->save();

        return response()->json([
            'response'=>'success',
            'message' => 'About us Updated Succesfully',

        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $about_us = Aboutus::find($id);
        $about_us->delete();


        return response()->json([
            'response'=>'success',
            'message' => 'About us delete Succesfully',
        ],200);


    }
}
