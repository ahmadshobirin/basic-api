<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function message()
    {
        $data = [
            "status"    => 200,
            "message"   => "OK",
            "data"      => [
                "nama"  => ucwords("ahmad shobirin"),
                "email" => "ahmadshobirin.dev@gmail.com",
                "bio"   => ucwords("backend developer"),
            ]
        ];

        return response()->json($data);
    }
}
