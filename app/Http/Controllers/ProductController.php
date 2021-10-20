<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Str;
use DB;
class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create() {
        return view('product.create');
    }

    public function store(ProductRequest  $request) {
        $data = $request->all();
        if(isset($request->image) || $request->image !== "" )
            $data['image'] = uploadImage('products' , $request->image);
        Product::create($data);
        return redirect()->route('admin.products')->with(['success' => 'Product Add Successfully']);
    }

    public function edit($id) {
        $product = Product::find($id);
        return view('product.edit' , compact('product'));
    }
    public function update( ProductRequest  $request , $id) {
        $product = Product::find($id);
        if(!$product)
            return redirect()->route('admin.products')->with(['success' => 'Product Not Found']);
        $data = $request->all();
        unset($data['_token']);
        $fileImage = Str::after($product->image, 'product_image/');
        if(isset($request->image) || $request->image !== null )
            $data['image'] = uploadImage('products' , $data['image']);
        else
            $data['image'] = $fileImage;
        Product::where('id' , $id)->update($data);
        return redirect()->route('admin.products')->with(['success' => 'Courier Updated Successfully']);
    }

    public function delete($id) {
        $product = Product::find($id);
        if(!$product)
            return redirect()->route('admin.products')->with(['success' => 'Product Not Found']);
        DB::beginTransaction();
        $fileImage = Str::after($product->image, 'product_image/');
        $image =  public_path() . '/product_image/'.$fileImage;
        unlink($image);
        $product->delete();
        DB::commit();
        return redirect()->route('admin.products')->with(['success' => 'Product Deleted Successfully']);
    }
}
