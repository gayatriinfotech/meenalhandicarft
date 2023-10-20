<?php

namespace App\Http\Controllers;

use App\Models\bill_details;
use App\Models\cart;
use App\Models\category;
use App\Models\contact;
use App\Models\order_details;
use App\Models\product;
use App\Models\profile_tbl;
use App\Models\register;
use App\Models\stock;
use App\Models\subscribers;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Support\Carbon;

class frontendController extends Controller
{
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
        // $product = product::orderBy('id', 'DESC')->limit(8)->get();
        $product = DB::table('products')
            ->leftJoin('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('*', 'stocks.id as sid', 'products.id as pid')
            ->orderBy('products.id', 'DESC')
            ->limit(8)
            ->get();
        // echo $product;
        // print_r($product);
        // foreach($product as $p)
        // {
        //         echo "fff <br>";
        //     }
        // exit();
        $category = category::where([
            ['parent_id', '=', 0],
        ])->get();
        $subcate = category::where([
            ['parent_id', '!=', 0],
        ])->get();
        return view('frontend/home', compact('product', 'category', 'subcate'));
    }

    public function cart(Request $req)
    {
        $clientIP = $req->getClientIp(true);

        if (session('email')) {
            $useremail = session()->get('email');
            $getcart = cart::where([
                ['user_ip', '=', $useremail],
            ])->count();
            session()->put('cart', $getcart);

            $email = session()->get('email');
            $cart = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->leftJoin('stocks', 'products.id', '=', 'stocks.product_id')
                ->select('*', 'products.id as pid', 'carts.id as cid', 'stocks.id as sid')
                ->where('carts.user_ip', '=', $email)
                ->get();
        } else {
            $getcart = cart::where([
                ['user_ip', '=', $clientIP],
            ])->count();
            session()->put('cart', $getcart);

            $cart = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->leftJoin('stocks', 'products.id', '=', 'stocks.product_id')
                ->select('*', 'products.id as pid', 'carts.id as cid', 'stocks.id as sid')
                ->where('carts.user_ip', '=', $clientIP)
                ->get();
        }
        // foreach($cart as $c)
        // {
        //     echo $c->product_name;
        //     echo "<br><br><br>";
        // }
        // exit();
        return view('frontend/cart', compact('cart'));
    }

    public function addtocart($id, Request $req)
    {
        $pprice = product::find($id);
        $clientIP = $req->getClientIp(true);
        if (session('email')) {
            $user = session()->get('email');
            $check = cart::where([
                ['user_ip', '=', $user],
                ['product_id', '=', $id],
            ])->first();

            if ($check) {
                $cartupdate = cart::find($check->id);
                $cartupdate->quantity = $cartupdate->quantity + 1;
                $cartupdate->update();
            } else {

                $cart = new cart([
                    'user_ip' => $user,
                    'product_id' => $id,
                    'pprice' => $pprice->wholesale_price,
                    'quantity' => 1,
                ]);

                $cart->save();
            }
        } else {
            $check = cart::where([
                ['user_ip', '=', $clientIP],
                ['product_id', '=', $id],
            ])->first();

            if ($check) {
                $cartupdate = cart::find($check->id);
                $cartupdate->quantity = $cartupdate->quantity + 1;
                $cartupdate->update();
            } else {

                $cart = new cart([
                    'user_ip' => $clientIP,
                    'product_id' => $id,
                    'pprice' => $pprice->wholesale_price,
                    'quantity' => 1,
                ]);

                $cart->save();
            }
        }

        return redirect('cart');
    }

    public function removecart($id)
    {
        $removecart = cart::find($id);
        $removecart->delete();
        return back();
    }

    public function login(Request $req)
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
        return view('frontend/login');
    }

    public function loginPost(Request $req)
    {
        $clientIP = $req->getClientIp(true);
        $check = register::where([
            ['email', '=', $req->get('email')],
            ['password', '=', $req->get('password')],
        ])->first();

        if ($check) {
            $req->session()->put('username', $check->firstname . " " . $check->lastname);
            $req->session()->put('userid', $check->id);
            $req->session()->put('email', $check->email);
            if (session('userid')) {
                $email = session()->get('email');
                $updatecart = cart::where([
                    ['user_ip', '=', $email]
                ])->get();
                if (count($updatecart) > 0) {
                    foreach ($updatecart as $u) {
                        $u->quantity = $u->quantity + 1;
                        $u->update();
                    }
                    cart::where('user_ip', '=', $clientIP)->delete();
                } else {
                    cart::where('user_ip', '=', $clientIP)->update(['user_ip' => $email]);
                }
                // $updatecart->user_ip = $req->session()->get('email');
                // $updatecart->update();

                return redirect('/')->with('success', 'Login Successfully!');
            } else {
                return back()->with('warning', 'Session Not Set');
            }
        } else {
            return back()->with('warning', 'Invalid Credentials!');
        }
    }

    public function logout()
    {
        session()->forget('userid');
        session()->forget('firstname');
        session()->forget('email');
        return back()->with('success', 'Logout Successfully');
    }

    public function products($id)
    {
        $product = product::where([
            ['category_id', '=', $id],
        ])->get();
        $category = category::find($id);
        $subcate = category::where([
            ['parent_id', '!=', 0],
        ])->get();
        return view('frontend/products', compact('product', 'category', 'subcate'));
    }

    public function category(Request $req)
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
        $category = category::where([
            ['parent_id', '=', 0],
        ])->get();
        return view('frontend/categories', compact('category'));
    }

    public function about(Request $req)
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
        $category = category::where([
            ['parent_id', '=', 0],
        ])->get();
        return view('frontend/about', compact('category'));
    }

    public function minusqty($id)
    {
        $minus = cart::find($id);
        $minus->quantity = $minus->quantity - 1;
        $minus->update();
        return response()->json(['status' => 'success']);
    }

    public function plusqty($id)
    {
        $minus = cart::find($id);
        $minus->quantity = $minus->quantity + 1;
        $minus->update();
        return response()->json(['status' => 'success']);
    }

    public function singleproduct(Request $req, $id)
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

        // $product = product::find($id);
        $product = DB::table('products')
            ->leftJoin('stocks', 'products.id', '=', 'stocks.product_id')
            ->where('products.id', '=', $id)
            ->select('*', 'stocks.id as sid', 'products.id as pid')
            ->first();
        return view('frontend/singleproduct', compact('product'));
    }

    public function subcate(Request $req, $id)
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

        // $product = product::where([
        //     ['category_id', '=', $id],
        // ])->get();

        $product = DB::table('products')
            ->leftJoin('stocks', 'products.id', '=', 'stocks.product_id')
            ->where('products.category_id', '=', $id)
            ->select('*', 'stocks.id as sid', 'products.id as pid')
            ->get();

        $category = category::find($id);
        $subcate = category::where([
            ['parent_id', '=', $id],
        ])->get();
        // dd($subcate);
        return view('frontend/category', compact('subcate', 'category', 'product'));
    }

    public function sub(Request $req, $id)
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
        // $product = product::where([
        //     ['subcate_id', '=', $id],
        // ])->get();
        $product = DB::table('products')
            ->leftJoin('stocks', 'products.id', '=', 'stocks.product_id')
            ->where('products.subcate_id', '=', $id)
            ->select('*', 'stocks.id as sid', 'products.id as pid')
            ->get();
        $subcate = category::find($id);
        return view('frontend/products', compact('product', 'subcate'));
    }

    public function checkout(Request $req)
    {
        $email = session()->get('email');
        $cart = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('*', 'products.id as pid', 'carts.id as cid')
            ->where('carts.user_ip', '=', $email)
            ->get();
        return view('frontend/checkout', compact('cart'));
    }

    public function profile(Request $req)
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
        $id = session()->get('userid');
        $data = profile_tbl::find($id);
        return view('frontend/profile', compact('data'));
    }

    public function subscribe(Request $req)
    {
        $check = subscribers::where([
            ['email', '=', $req->get('email')],
        ])->first();
        if ($check) {
            return back()->with('warning', 'Already Subscribed!');
        } else {
            // echo "not";
            $data = new subscribers([
                'email' => $req->get('email'),
            ]);
            $data->save();
            return back()->with('success', 'Subscribed Successfully!');
        }
    }

    public function profileupdate($id, Request $req)
    {
        $data = profile_tbl::find($id);
        $data->firstname = $req->get('fname');
        $data->lastname = $req->get('lname');
        $data->mobileno = $req->get('mobileno');
        $data->gender = $req->get('gender');
        $data->pincode = $req->get('pincode');
        $data->address = $req->get('address');
        $data->city = $req->get('city');
        $data->state = $req->get('state');
        $data->country = $req->get('country');
        $data->landmark = $req->get('landmark');
        $data->update();
        return back()->with('success', 'Profile Updated');
    }

    public function wishlist(Request $req)
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
        // $cart = DB::table('carts')
        // ->join('products', 'carts.product_id', '=', 'products.id')
        // ->select('*', 'products.id as pid', 'carts.id as cid')
        // ->where('carts.user_ip', '=', $clientIP)
        // ->get();
        $user = session()->get('userid');
        $product = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', '=', 'products.id')
            ->leftJoin('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('*', 'wishlists.id as wid', 'products.id as pid', 'stocks.id as sid')
            ->where('wishlists.user_id', '=', $user)
            ->get();
        return view('frontend/wishlist', compact('product'));
    }

    public function addtowishlist($id)
    {
        $userid = session()->get('userid');
        $wishlist = wishlist::where([
            ['user_id', '=', $userid],
            ['product_id', '=', $id],
        ])->get();

        if (count($wishlist) > 0) {
            return back()->with('warning', 'Already exist in your wishlist!');
        } else {
            $add = new wishlist([
                'user_id' => $userid,
                'product_id' => $id,
            ]);
            $add->save();
        }
        // $product = product::find($id);
        // $add = new wishlist([
        //     'user_id' => $userid,
        //     'product_id' => $product->id,
        // ]);
        // $add->save();
        // echo $userid;
        return back()->with('success', 'Product Added To Wishlist');
    }

    public function removewishlist($id)
    {
        $wishlist = wishlist::find($id);
        $wishlist->delete();
        return back();
    }

    public function contact(Request $req)
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
        $category = category::where([
            ['parent_id', '=', 0],
        ])->get();
        return view('frontend/contact', compact('category'));
    }

    public function contactPost(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobileno' => 'required|digits:10|numeric',
            'message' => 'required',
        ]);

        $contact = new contact([
            'name' => $req->get('name'),
            'email' => $req->get('email'),
            'mobile_no' => $req->get('mobileno'),
            'message' => $req->get('message'),
        ]);
        $contact->save();
        return back()->with('success', 'Form Submitted!');
    }

    public function searchproduct(Request $req)
    {
        $query = $req->get('term', '');
        $products = product::where('product_name', 'LIKE', '%' . $query . '%')->get();
        $data = [];
        foreach ($products as $items) {
            $data[] = [
                'value' => $items->product_name,
                'id' => $items->id,
            ];
        }
        if (count($data)) {
            return $data;
        } else {
            return ['value' => 'No Result Found', 'id' => ''];
        }
    }

    public function result(Request $req)
    {
        $searchingdata = $req->input('search_product');
        // $products = product::where('product_name', 'LIKE', '%' . $searchingdata . '%')->first();
        // $product = product::where('product_name', 'LIKE', '%' . $searchingdata . '%')->get();
        $products = DB::table('products')
            ->leftJoin('stocks', 'products.id', '=', 'stocks.product_id')
            ->where('products.product_name', 'LIKE', '%' . $searchingdata . '%')
            ->select('*', 'stocks.id as sid', 'products.id as pid')
            ->first();

        $product = DB::table('products')
            ->leftJoin('stocks', 'products.id', '=', 'stocks.product_id')
            ->where('products.product_name', 'LIKE', '%' . $searchingdata . '%')
            ->select('*', 'stocks.id as sid', 'products.id as pid')
            ->get();

        if ($products) {
            if (isset($_POST['searchbtn'])) {
                // return redirect('singleproduct/' . $products->id);
                // echo '1';
                return view('frontend/searchresult', compact('product', 'searchingdata'));
            } else {
                return redirect('singleproduct/' . $products->id);
                // echo "2";
            }
        } else {
            // return redirect('singleproduct/' . $products->id);
            // echo "else";
            return view('frontend/searchresult', compact('product', 'searchingdata'));
        }
    }

    public function placeorder(Request $req)
    {
        $req->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
            'number' => 'required|digits:10|numeric',
            'address' => 'required|min:6',
            'landmark' => 'required',
            'pincode' => 'required|digits:6|numeric',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);
        $shipping = 0;
        $ship = 0;
        $date = now()->day . now()->month . now()->year;
        $order_id = $date . random_int(00000000, 99999999);
        $carts = cart::where([
            ['user_ip', '=', session()->get('email')]
        ])->get();
        $sendcarts = $carts;
        // print_r($sendcarts);
        // echo number_format(40/count($carts),2);
        if ($req->get('subtotal') < 1000) {
            $shipping = number_format(40 / count($carts), 2);
            $ship = 40;
        }
        // exit();
        foreach ($carts as $c) {
            $date_time = Carbon::now()->toArray();
            $order_id = $date . random_int(00000000, 99999999);
            $data[$order_id] = [
                'order_id' => $order_id,
                'name' => $req->get('name'),
                'number' => $req->get('number'),
                'email' => $req->get('email'),
                'address' => $req->get('address'),
                'pincode' => $req->get('pincode'),
                'city' => $req->get('city'),
                'state' => $req->get('state'),
                'landmark' => $req->get('landmark'),
                'user_id' => session()->get('email'),
                'product_id' => $c->product_id,
                'quantity' => $c->quantity,
                'price' => $c->pprice,
                'total' => $c->quantity * $c->pprice,
                'shipping' => $ship,
                'date' => $date_time['day'] . '-' . $date_time['month'] . '-' . $date_time['year'],
                'time' => $date_time['hour'] . ':' . $date_time['minute'] . ':' . $date_time['second'],
            ];
            $billDetails = new bill_details([
                'order_id' => $order_id,
                'name' => $req->get('name'),
                'number' => $req->get('number'),
                'email' => $req->get('email'),
                'address' => $req->get('address'),
                'pincode' => $req->get('pincode'),
                'city' => $req->get('city'),
                'state' => $req->get('state'),
                'country' => $req->get('country'),
                'landmark' => $req->get('landmark'),
                'product_status' => "Pending",
                'delivery_status' => "Pending",
            ]);
            if ($billDetails->save()) {
                $orderDetails = new order_details([
                    'order_id' => $order_id,
                    'user_id' => session()->get('email'),
                    'product_id' => $c->product_id,
                    'quantity' => $c->quantity,
                    'price' => $c->pprice,
                    'shipping' => $shipping,
                    'total' => $c->quantity * $c->pprice,
                    'payment_mode' => 'cash',
                    'delivery_status' => 'Pending',
                    'date' => $date_time['day'] . '-' . $date_time['month'] . '-' . $date_time['year'],
                    'time' => $date_time['hour'] . ':' . $date_time['minute'] . ':' . $date_time['second'],
                ]);
                $orderDetails->save();
            }

            $stock = stock::where([
                ['product_id', '=', $c->product_id],
            ])->first();
            $stock->stocks = $stock->stocks - $c->quantity;
            $stock->update();

            $deletecart = cart::find($c->id);
            $deletecart->delete();
        }
        $product = product::get();
        $name = $req->get('name');
        $userEmail['to'] = $req->get('email');
        $pdf = PDF::loadView('frontend/invoice2', compact('data', 'product'));
        Mail::send('frontend/ordermail', compact('name'), function ($msg) use ($userEmail, $pdf) {
            $msg->to($userEmail['to'])
                ->subject('Order Placed Successfully!')
                ->attachData($pdf->output(), 'invoice.pdf');
        });
        return view('frontend/orderpage');
    }

    public function myorders(Request $req)
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

        $orders = DB::table('order_details')
            ->join('bill_details', 'order_details.order_id', '=', 'bill_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->where('order_details.user_id', '=', session()->get('email'))
            ->select('*', 'order_details.id as oid', 'bill_details.id as bid', 'products.id as pid')
            ->get();

        return view('frontend/myorders', compact('orders'));
    }

    public function demo()
    {
        // $date_time = Carbon::now()->toArray();
        // echo $d['month'];
    }
}
