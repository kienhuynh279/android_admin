<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.page.product.index',[
            'product' => $product 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Category::all();
        return view('admin.page.product.create', [
            'category' => $cate
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create([
            "product_name" => $request->get("name"),
            "product_price" => $request->get("price"),
            "product_image" => $request->get("image"),
            "product_description" => $request->get("desc"),
            "product_id" => $request->get("category"),
        ]);

        return redirect()->route("admin.product.index")->withErrors([
            "success" => "Tạo thành công thể loại"
        ]);
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
    public function edit($id)
    {
        $cate = Category::all();
        $product = Product::findOrFail($id)->first();
        return view('admin.page.product.edit',[
            'category' => $cate,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

    
        $product->product_name = $request->get("name");
        $product->product_price = $request->get("price");
        $product->product_description = $request->get("desc");
        $product->product_image = $request->get("image");
        $product->product_id = $request->get("category");
        $product->save();

        return redirect()->route("admin.product.index")->withErrors([
            "success" => "Chỉnh sửa tin tức thành công"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route("admin.product.index")->withErrors([
            "success" => "Xóa tin tức thành công"
        ]);
    }
}
