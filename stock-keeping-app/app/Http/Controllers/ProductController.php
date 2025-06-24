<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('admin.product-master.product-master', compact('products'));
    }
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'sku' => 'required|string|max:100|unique:products,sku',
            'cost_price' => 'required|numeric|min:0',
            'sell_price' => 'required|numeric|min:0',
        ]);

        // Create product
        Product::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'cost_price' => $request->cost_price,
            'sell_price' => $request->sell_price,
        ]);

        // Redirect to product list with success message
        return redirect()->back()->with('success', 'Product created successfully!');
    }
}
