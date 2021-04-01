<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select("id", "name", "email", "created_at")->orderBy("id", "desc")->get();

        return response()->json([
            "status" => 200,
            "message" => "OK",
            "data" => $users,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "email"    => "email|required|min:8|max:100|unique:users,email",
            "name"     => "string|required|min:3",
            "password" => "string|required|min:3"
        ]);

        User::create([
            "email"    => $request->email,
            "name"     => $request->name,
            "password" => bcrypt($request->password),
        ]);

        return response()->json([
            "status" => 201,
            "message" => "OK"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::select("id", "name", "email", "created_at")->where('id',$id)->first();

        if(!$user){
            return response()->json([
                "status" => 404,
                "message" => "Requested data not found",
            ], 404);
        }

        return response()->json([
            "status" => 201,
            "message" => "OK",
            "data" => $user,
        ], 201);
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
        $request->validate([
            "name"     => "string|required|min:3",
        ]);

        User::where('id', $id)->update([
            "name" => $request->name,
        ]);

        return response()->json([
            "status" => 200,
            "message" => "OK"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        if(!$user){
            return response()->json([
                "status" => 404,
                "message" => "Requested data not found",
            ], 404);
        }

        $user->delete();

        return response()->json([
            "status" => 200,
            "message" => "OK",
        ], 200);
    }
}
