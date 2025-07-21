<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseItemController extends Controller
{
    public function index($id)
    {
        $products = Product::where('status', '=', true)->get();
        return view('admin.purchase-items', compact('products', 'id'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'purchase_order_id' => 'required|exists:purchase_orders,id',
            'date' => 'required|string',
            'product_id' => 'required|exists:products,id',
            'received_qty' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        $validated['unit_price'] = $product->unit_price;
        $validated['subtotal'] = $validated['received_qty'] * $validated['unit_price'];

        PurchaseOrderItem::create($validated);

        return redirect()->back()->with('success', 'Purchase Order Item added successfully.');
    }

}
