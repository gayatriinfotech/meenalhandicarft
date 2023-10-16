<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::where([
            ['parent_id', '=', 0],
        ])->get();
        return view('backend/category', compact('category'));
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
            'status' => 'required',
            'cate' => 'required',
            'cate_image' => ['image', 'mimes:jpeg,jpg,gif,webp,svg,png'],
        ]);
        $image = $request->file('cate_image')->getClientOriginalName();
        $duplicate = category::where([
            ['name', '=', $request->get('cate')],
        ])->first();

        if ($duplicate) {
            return back()->with('warning', 'Category Already Exist!');
        } else {

            $data = new category([
                'name' => $request->get('cate'),
                'image' => $image,
                'status' => $request->get('status'),
            ]);
            $data->save();
            $request->file('cate_image')->move('images/category', $image);
            $msg = $request->get('cate') . " Category Added!";
            return back()->with('success', $msg);
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
        $request->validate([
            'subcate_image' => ['image', 'mimes:jpeg,jpg,gif,webp,svg,png'],
        ]);
        if ($request->file('cate_image')) {
            $image = $request->file('cate_image')->getClientOriginalName();
            $data = category::find($id);
            $data->name = $request->get('cate');
            $data->image = $image;
            $data->status = $request->get('status');
            $data->update();
            $request->file('cate_image')->move('images/category', $image);
        } else {
            $data = category::find($id);
            $data->name = $request->get('cate');
            $data->status = $request->get('status');
            $data->update();
        }
        $msg = $request->get('cate') . " Category Updated!";
        return back()->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = category::find($id);
        $check = category::where([
            ['id', '=', $id]
        ])->first();
        $msg = $check->name . " Category Deleted!";

        if ($data->delete()) {
            category::where([
                ['parent_id', '=', $id],
            ])->delete();
            product::where([
                ['category_id', '=', $id],
            ])->delete();
            return back()->with('success', $msg);
        }
    }
}
