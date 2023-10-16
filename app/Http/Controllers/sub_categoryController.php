<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class sub_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $sub_category = DB::table('sub_categories')
        //     ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
        //     ->select('*', 'sub_categories.id as sid', 'sub_categories.status as sub_status')
        //     ->get();
        $sub_category = category::where([
            ['parent_id', '!=', 0],
        ])->get();
        $category = category::where([
            ['parent_id', '=', 0]
        ])->get();
        return view('backend/subcategory', compact('sub_category', 'category'));
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
            'subcate' => 'required',
            'subcate_image' => ['image', 'mimes:jpeg,jpg,gif,webp,svg,png'],
        ]);
        $image = $request->file('subcate_image')->getClientOriginalName();
        $duplicate = category::where([
            ['name', '=', $request->get('subcate')],
        ])->first();
        if ($duplicate) {
            return back()->with('warning', 'Sub-Category Already Exist!');
        } else {
            $data = new category([
                'name' => $request->get('subcate'),
                'image' => $image,
                'status' => $request->get('status'),
                'parent_id' => $request->get('cate'),
            ]);
            $data->save();
            $request->file('subcate_image')->move('images/subcategory', $image);
            $msg = $request->get('subcate') . " Sub-Category Added!";
            return back()->with('success', $msg);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
        if ($request->file('subcate_image')) {
            $image = $request->file('subcate_image')->getClientOriginalName();
            $data = category::find($id);
            $data->name = $request->get('subcate');
            $data->image = $image;
            $data->status = $request->get('status');
            $data->parent_id = $request->get('cate');
            $data->update();
            $request->file('subcate_image')->move('images/subcategory', $image);
        } else {
            $data = category::find($id);
            $data->name = $request->get('subcate');
            $data->status = $request->get('status');
            $data->parent_id = $request->get('cate');
            $data->update();
        }
        $msg = $request->get('subcate') . " Sub-Category Updated!";
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
        $msg = $check->name . " Sub-Category Deleted!";

        if ($data->delete()) {
            product::where([
                ['subcate_id', '=', $id],
            ])->delete();
            return back()->with('success', $msg);
        }
    }
}
