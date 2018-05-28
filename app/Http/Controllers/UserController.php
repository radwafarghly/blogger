<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class UserController extends Controller
{
    public function signUp(Request $request)
    {
        //validate
        $this->validate($request, [
            "name"=>"required",
            "email"=>"required|email|unique:users",
            "password" =>"required"
           /* "password"=> array(
                'required',
                'regex:/(^([a-zA-Z]+)(\d+)?$)/u'
            )*/
        ]);
        //insert into users table the resquest data
        $user=new User([
            "name"=>$request->input('name'),
            "email"=>$request->input('email'),
            "password"=>bcrypt($request->input('password')),

        ]);
        $user->save();
        return response()->json(['message'=>"Create user successfully"],201);
    }

    public function signIn(Request $request)
    {
        //Validate
        $this->validate($request, [

            "email"=>"required|email",
            "password"=>"required"
        ]);
        $credentials=$request->only('email','password');
        //$email= $request->input('email');


        try{
            //$customClaims=['role'=>'Client'];
            if(! $token = JWTAuth::attempt($credentials))//,$customClaims))
            {
                // JWTAuth::fromUser($user,['role' => $user->role]);
                return response()->json(['error'=>"Invaild credentials"],401);
            }
        }catch(JWTException $e){
            return response()->json(['error'=>"Could not create token"],500);
        }

        return response()->json(['token'=>$token],200);
    }



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
}
