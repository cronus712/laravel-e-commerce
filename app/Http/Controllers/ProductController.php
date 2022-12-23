<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $category = Category::all();
        $product = Product::all();

        return view('product.index', compact('product', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    $category = Category::all();
        return view('product.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'category_id',
            'name' => 'required',
            'small_description',
            'description' => 'required',
            'original_price',
            'selling_price',
            'image',
            'quantity',
            'tax',
            'status',
            'trending',
            'meta_title',
            'meta_description',
            'meta_keywords',
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->storeAs('images', $filename, 'public');
        }

        $data = $request->all();
        $data['image'] = $filename ?? 'no image';

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Product was added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    $category = Category::all();
        $product = Product::find($id);
        return view('product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([

            'category_id' => 'required',
            'name' => 'required',
            'small_description',
            'description' => 'required',
            'original_price',
            'selling_price',
            'image',
            'quantity',
            'tax',
            'status',
            'trending',
            'meta_title',
            'meta_description',
            'meta_keywords',
        ]);

        if ($request->hasFile('image')) {

            $path = 'storage/images/' . $product->image;
 
            if (File::exists($path)) {
             File::delete($path);
             }
 
             $file = $request->file('image');
             $extension = $file->getClientOriginalExtension();
             $filename = time() . '.' . $extension;
             $file->storeAs('images', $filename, 'public');
          }
         $data = $request->all();
         $data['image'] = $filename ?? $product->image ?? 'no image';
 
         $product = Product::find($product->id);
         Product::findOrFail($product->id)->update($data);
           
         return redirect()->route('product.index')
             ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully');

    }
}
