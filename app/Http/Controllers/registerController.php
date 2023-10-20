<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\profile_tbl;
use App\Models\register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $clientIP = $req->getClientIp(true);
        if (session('email')) {
            $useremail = session()->get('email');
            $getcart = cart::where([
                ['user_ip', '=', $useremail],
            ])->count();
            session()->put('cart', $getcart);
        } else {
            $getcart = cart::where([
                ['user_ip', '=', $clientIP],
            ])->count();
            session()->put('cart', $getcart);
        }
        return view('frontend/register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'fname' => 'required',
            'lname' => 'required',
            'phoneno' => 'required|digits:10|numeric',
            'password' => 'required|min:8',
        ]);

        $check = register::where([
            ['email', '=', $req->get('email')],
        ])->get();

        $count = count($check);
        if ($count == 0) {
            if ($req->get('password') == $req->get('cpassword')) {
                $data = new register([
                    'email' => $req->get('email'),
                    'firstname' => $req->get('fname'),
                    'lastname' => $req->get('lname'),
                    'mobileno' => $req->get('phoneno'),
                    'password' => $req->get('password'),
                ]);
                if ($data->save()) {
                    $profile = new profile_tbl([
                        'email' => $req->get('email'),
                        'firstname' => $req->get('fname'),
                        'lastname' => $req->get('lname'),
                        'mobileno' => $req->get('phoneno'),
                        'password' => $req->get('password'),
                    ]);
                    $name = $req->get('fname');
                    $userEmail['to'] = $req->get('email');
                    $profile->save();
                    Mail::send('frontend/registermail', compact('name'), function($msg) use ($userEmail) {
                        $msg->to($userEmail['to'])
                            ->subject('Registered Successfully!');
                    });
                    return redirect('login')->with('success', 'Register Successfully');
                } else {
                    echo "Error";
                }
            } else {
                return back()->with('warning', 'Password Not Matched!');
            }
        } else {
            return back()->with('warning', 'User Already Exist!, Try Another Email.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
