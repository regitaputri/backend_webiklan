<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class IklanController extends Controller
{
    public function iklan()
    {
        $data = "Data All Iklan";
        return response()->json($data, 200);
    }

    public function iklanAuth()
    {
        $data = "Welcome " . Auth::user()->name;
        return response()->json($data, 200);
    }
}
