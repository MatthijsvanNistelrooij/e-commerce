<?php

namespace App\Http\Controllers;

use Session;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.products.index')->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if($categories->count() == 0 )
        {
            Session::flash('info', 'You have no categories yet.');

            return redirect()->back();
        }
        return view('admin.products.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:200',
            'image' => 'required|image',
            'description' => 'required',
            'category_id' => 'required',

            'price' => 'required',
        ]);
            $image = $request->image;
            $image_new_name = time(). $image->getClientOriginalName();
            $image->move('uploads/products', $image_new_name);

            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => 'uploads/products/' .$image_new_name,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'slug' => str_slug($request->name)
            ]);

            Session::flash('success',  'Product added successfully.');
            return redirect()->route('products');
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
        $product = Product::find($id);
        return view('admin.products.edit')->with('product', $product)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required'
        ]);
        $product = Product::find($id);

        if($request->hasFile('image'))
        {
            $image = $request->image;
            $image_new_name = time(). $image->getClientOriginalName();

            $image->move('uploads/products', $image_new_name);

            $product->image = 'uploads/products/'.$image_new_name;
        }
        {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $category_id = $request->category_id;

            $product->save();

            Session::flash('success', 'Product updated successfully.');

            return redirect()->route('products');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        Session::flash('success', 'Product trashed successfully.');

        return redirect()->back();
    }

    public function trashed(){
        $products = Product::onlyTrashed()->get();

        return view('admin.products.trashed')->with('products', $products);
    }
    public function kill($id)
    {
        $product = Product::withTrashed()->where('id', $id)->first();

        $product->forceDelete();
        Session::flash('success', 'Product deleted permanently.');
        return redirect()->back();

    }

    public function restore($id)
    {
        $product = Product::withTrashed()->where('id', $id)->first();
        $product->restore();

        Session::flash('success', 'Product restored successfully.');

        return redirect()->route('products');
    }

}
