<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymobController extends Controller
{
    public function handleCallback(Request $request){
        $data = $request->all();
        if ($data['success'] == true) {
            return redirect()->route('home');
        }
    }
}
