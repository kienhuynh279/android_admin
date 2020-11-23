<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartDetail = CartDetail::all();
        return view('admin.page.cart-detail.index',[
            'cartDetail' => $cartDetail
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cateCart = Cart::all();
        $product = Product::all();

        return view('admin.page.cart-detail.create',[
            'cart' => $cateCart,
            'product' => $product
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
        CartDetail::create([
            "product_name" => $request->get("name"),
            "product_price" => $request->get("price"),
            "product_image" => $request->get("image"),
            "product_description" => $request->get("desc"),
            "product_id" => $request->get("categoryf"),
        ]);

        return redirect()->route("admin.product.index")->withErrors([
            "success" => "Tạo thành công thể loại"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CartDetail $cartDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cart = Cart::findOrFail($id);
        return view('admin.page.cart.edit',[
            'cart' => $cart
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartDetail $cartDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CartDetail::findOrFail($id)->delete();

        return redirect()->route("admin.cart-detail.index")->withErrors([
            "success" => "Xóa tin tức thành công"
        ]);
    }
}
