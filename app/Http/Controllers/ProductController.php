<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'name' => 'required | string | max:255',
            'price' => 'required | numeric | min:1',
            'quantity' => 'required | integer | min:0'
        ]);

        Product::create($request->all());

       return redirect()->route('products.index')
            ->with('success','Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|integer|min:0'
        ]);
    
        $product->update($request->all());
    
        return redirect()->route('products.index')
                ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                ->with('success','Product deleted successfully');
    }

    public function relationship()
    {
        $users = User::find(1);
        $posts = $users->posts;

        dd($posts);

         return view('eloquent.index', compact('posts'));
    }

    /**
     * Summary of profileImageUpload
     * 
     * Step : 
     * 1. Migration : Agar users table me profile image column nahi hai to migration create karo.
     * 1. php artisan storage:link
     */
    public function profileImage() 
    {
        return view('profile_image_upload');
    }

    public function profileImageUpload(Request $request) 
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = User::find(1);

        if ($request->hasFile('profile_image')) 
        {
            // Delete old image
            if ($user->profile_image && Storage::exists('public/'.$user->profile_image))
            {
                Storage::delete('public/'.$user->profile_image);
            }

            // Upload new image
            $file = $request->file('profile_image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('profile_images', $filename, 'public');

            // Save path in database
            $user->profile_image = $path;
            $user->save();
        }

        return back()->with('success','Profile image uploaded successfully');
    }
}
