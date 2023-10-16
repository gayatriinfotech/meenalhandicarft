<?php

namespace App\Http\Controllers;

use App\Models\adminlogin;
use App\Models\category;
use App\Models\product;
use App\Models\stock;
use Illuminate\Http\Request;

class backendController extends Controller
{
    public function index()
    {
        return view('backend/dashboard');
    }
    public function adminlogin()
    {
        return view('backend/login');
    }

    public function adminloginPost(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $data = adminlogin::where([
            ['username', '=', $req->get('username')],
            ['password', '=', $req->get('password')],
        ])->first();

        if ($data) {
            $req->session()->put('adminlogin', $req->get('username'));
            $checklogin = $req->session()->get('adminlogin');
            if (isset($checklogin)) {
                return redirect('/dashboard')->with('success', $req->get('username'));
            }
        }
        return back()->with('warning', 'Invalid Username & Password');
    }

    public function adminlogout()
    {
        session()->forget('adminlogin');
        return redirect('adminlogin');
    }

    public function getIP(Request $req)
    {
        $clientIP = $req->getClientIp(true);
        echo $clientIP;
    }

    public function stock()
    {
        $product = product::get();
        $stock = stock::get();
        return view('backend/stocks', compact('stock', 'product'));
    }

    public function getsubcate($id)
    {
        $subcate = category::where([
            ['parent_id', '=', $id],
        ])->get();
        return response()->json($subcate);
    }
}
