<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $data = Product::with('user', 'category', 'colors')->get();
        return view('products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Category::all();
        $colors = Color::all();
        return view('products.create', compact('cats', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // return $request;
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $product = Product::create($data);

        $product->colors()->sync($request->color_id);

        return redirect()->back();
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
        $data = Product::with('category', 'colors')->find($id);
        $cats = Category::all();
        $colors = Color::all();

        return view('products.edit', compact('data', 'cats', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Product::find($id);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|max:255',
            'desc' => 'required|max:255',
            'image' => 'nullable'
        ]);

        $data->update($validated);

        $data->colors()->sync($request->color_id);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::with('colors')->find($id);
        $product->colors()->detach($product->colors);
        $product->delete();
        return back();
    }
}
