<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductMasterController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', '=', true)->get();
        $subCategories = SubCategory::where('status', '=', true)->get();
        $units = Unit::where('status', '=', true)->get();
        $products = Product::where('status', '=', true)->latest()->paginate(1);

        return view('admin.product-master', compact('categories', 'subCategories', 'units', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'unit_id' => 'required|exists:units,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'reorder_stock' => 'nullable|integer|min:0',
        ]);


        // ✅ Auto-generate incremental SKU
        $lastSkuNumber = Product::orderBy('id', 'desc')->value('sku');

        if ($lastSkuNumber && preg_match('/SKU-(\d+)/', $lastSkuNumber, $matches)) {
            $nextNumber = (int) $matches[1] + 1;
        } else {
            $nextNumber = 1001;
        }

        $sku = 'SKU-' . $nextNumber;

        // ✅ Create the product
        Product::create([
            'name' => $validated['name'],
            'sku' => $sku,
            'unit_id' => $validated['unit_id'],
            'category_id' => $validated['category_id'],
            'sub_category_id' => $validated['sub_category_id'],
            'purchase_price' => $validated['purchase_price'],
            'selling_price' => $validated['selling_price'],
            'reorder_stock' => $validated['reorder_stock'] ?? 0,
            'status' => true,
        ]);

        return redirect()->back()->with('success', 'Product created successfully!');
    }
}
