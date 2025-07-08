<?php

namespace App\Http\Controllers\backend\product;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //**INDEX */
    public function index()
    {
        return view('backend.product.index');
    }

    //** ALL PRODUCT */
    public function productRecords()
    {
        $products = product::latest()->get();
        // dd($products);
        return view('backend.product.allProduct', compact('products'));
    }

    //**STORE  */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'stock_status' => 'required|boolean',
            'details' => 'required|string',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'required_with:faqs.*.answer|string',
            'faqs.*.answer' => 'required_with:faqs.*.question|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products'), $filename);
                $imageNames[] = $filename;
            }
        }

        Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'discount' => $request->discount,
            'stock_status' => $request->stock_status,
            'details' => $request->details,
            'faqs' => $request->faqs,
            'images' => $imageNames,
        ]);

        return response()->json(['message' => 'Product created successfully']);
    }


    // **DELETE
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Optionally delete physical image files
        if (is_array($product->images)) {
            foreach ($product->images as $image) {
                $path = public_path('uploads/products/' . $image);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }




    public function edit($id)
    {
        $product = Product::findOrFail($id);

        // dd($product);
        return view('backend.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $id,
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'stock_status' => 'required|boolean',
            'details' => 'required|string',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'required_with:faqs.*.answer|string',
            'faqs.*.answer' => 'required_with:faqs.*.question|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $keepImages = json_decode($request->retained_images, true) ?? [];

        $newImages = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products'), $filename);
                $newImages[] = $filename;
            }
        }

        $finalImages = array_merge($keepImages, $newImages);

        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'discount' => $request->discount,
            'stock_status' => $request->stock_status,
            'details' => $request->details,
            'faqs' => $request->faqs,
            'images' => $finalImages,
        ]);

        return response()->json(['message' => 'Product updated successfully']);
    }
}
