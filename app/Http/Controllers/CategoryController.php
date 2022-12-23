<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();

        return view('category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {



        $request->validate([

            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'status',
            'popular',
            'image' => 'image',
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
        
        // $category->status = $request->input('status') == TRUE ? 'on': 'off';
        // $category->popular = $request->input('popular') == TRUE ? 'on': 'off';
        Category::create($data);

        return redirect()->route('category.index')->with('success', 'Category was added successfully !');
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
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([

            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'image' => 'image',
            'status',
            'popular',
            'meta_title',
            'meta_description',
            'meta_keywords',
        ]);
 
        if ($request->hasFile('image')) {

           $path = 'storage/images/' . $category->image;

           if (File::exists($path)) {
            File::delete($path);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->storeAs('images', $filename, 'public');
         }
        $data = $request->all();
        $data['image'] = $filename ?? $category->image ?? 'no image';

        $category = Category::find($category->id);
        Category::findOrFail($category->id)->update($data);
          
        return redirect()->route('category.index')
            ->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Category deleted successfully');
    }
}
