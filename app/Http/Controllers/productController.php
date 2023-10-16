<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $product = DB::table('products')
        //     ->join('sub_categories', 'sub_categories.id', '=', 'products.subcate_id')
        //     ->join('categories', 'categories.id', '=', 'sub_categories.category_id')
        //     ->select('*', 'products.id as pid', 'sub_categories.id as sid', 'categories.id as cid', 'sub_categories.status as sub_status')
        //     ->get();
        $product = product::get();
        $category = category::where([
            ['parent_id', '=', 0],
        ])->get();
        $subcate = category::where([
            ['parent_id', '!=', 0],
        ])->get();
        // dd($product);
        return view('backend/product', compact('product', 'category', 'subcate'));
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
    public function store(Request $request)
    {
        $request->validate([
            'cate' => 'required',
            'subcate' => 'required',
            'skuid' => 'required',
            'product' => 'required',
            'image.*' => 'required|image|mimes:jpeg,jpg,gif,webp,svg,png',
            'desc' => 'required',
            'mrp' => 'required',
            'retail' => 'required',
            'wholesale' => 'required',
            'material' => 'required',
            'width' => 'required',
            'depth' => 'required',
            'height' => 'required',
            'weight' => 'required',
        ]);

        $duplicate = product::where([
            ['product_name', '=', $request->get('product')],
        ])->first();

        if ($duplicate) {
            return back()->with('warning', 'Product Already Exist!');
        } else {
            $images = array();
            if ($files = $request->file('image')) {
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move('images/products', $name);
                    $images[] = $name;
                }
                $data = new product([
                    'category_id' => $request->get('cate'),
                    'subcate_id' => $request->get('subcate'),
                    'sku_id' => $request->get('skuid'),
                    'product_name' => $request->get('product'),
                    'product_image' => implode(',', $images),
                    'description' => $request->get('desc'),
                    'mrp' => $request->get('mrp'),
                    'retail_price' => $request->get('retail'),
                    'wholesale_price' => $request->get('wholesale'),
                    'material' => $request->get('material'),
                    'width' => $request->get('width'),
                    'height' => $request->get('height'),
                    'depth' => $request->get('depth'),
                    'weight' => $request->get('weight'),
                    'tags' => $request->get('tags'),
                    'shop_keywords' => $request->get('keyword'),
                ]);
                $data->save();
            }
            $msg = $request->get('product') . " Product Added!";
            return back()->with('success', $msg);
        }







        // $image = $request->file('image')->getClientOriginalName();
        // $data = new product([
        //     'category_id' => $request->get('cate'),
        //     'subcate_id' => $request->get('subcate'),
        //     'sku_id' => $request->get('skuid'),
        //     'product_name' => $request->get('product'),
        //     'product_image' => $image,
        //     'description' => $request->get('desc'),
        //     'mrp' => $request->get('mrp'),
        //     'retail_price' => $request->get('retail'),
        //     'wholesale_price' => $request->get('wholesale'),
        //     'material' => $request->get('material'),
        //     'width' => $request->get('width'),
        //     'height' => $request->get('height'),
        //     'depth' => $request->get('depth'),
        //     'weight' => $request->get('weight'),
        //     'tags' => $request->get('tags'),
        //     'shop_keywords' => $request->get('keyword'),
        // ]);
        // $data->save();
        // $request->file('image')->move('images/products', $image);

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
        $request->validate([
            'image.*' => 'image|mimes:jpeg,jpg,gif,webp,svg,png',
        ]);
        $images = array();
        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('images/products', $name);
                $images[] = $name;
            }
            // $image = $request->file('image')->getClientOriginalName();
            $data = product::find($id);
            $data->category_id = $request->get('cate');
            $data->subcate_id = $request->get('subcate');
            $data->sku_id = $request->get('skuid');
            $data->product_name = $request->get('product');
            $data->product_image = implode(',', $images);
            $data->description = $request->get('desc');
            $data->mrp = $request->get('mrp');
            $data->retail_price = $request->get('retail');
            $data->wholesale_price = $request->get('wholesale');
            $data->material = $request->get('material');
            $data->width = $request->get('width');
            $data->height = $request->get('height');
            $data->depth = $request->get('depth');
            $data->weight = $request->get('weight');
            $data->tags = $request->get('tags');
            $data->shop_keywords = $request->get('keyword');
            $data->update();
            // $request->file('image')->move('images/products', $image);
        } else {
            $data = product::find($id);
            $data->category_id = $request->get('cate');
            $data->subcate_id = $request->get('subcate');
            $data->sku_id = $request->get('skuid');
            $data->product_name = $request->get('product');
            $data->description = $request->get('desc');
            $data->mrp = $request->get('mrp');
            $data->retail_price = $request->get('retail');
            $data->wholesale_price = $request->get('wholesale');
            $data->material = $request->get('material');
            $data->width = $request->get('width');
            $data->height = $request->get('height');
            $data->depth = $request->get('depth');
            $data->weight = $request->get('weight');
            $data->tags = $request->get('tags');
            $data->shop_keywords = $request->get('keyword');
            $data->update();
        }
        $msg = $request->get('product') . " Product Updated!";
        return back()->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = product::find($id);
        $check = product::where([
            ['id', '=', $id]
        ])->first();
        $msg = $check->product_name . " Product Deleted!";
        $data->delete();
        return back()->with('success', $msg);
    }
}
