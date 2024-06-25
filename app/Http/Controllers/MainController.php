<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function destroySession(Request $request)
    {
        Session::flush();
        return response()->json(['message' => 'Session destroyed']);
    }
}
