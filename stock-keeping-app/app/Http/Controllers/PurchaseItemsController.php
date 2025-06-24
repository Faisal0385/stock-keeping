<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseItem;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseItemsController extends Controller
{
    public function index($id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $order_id = $purchaseOrder->order_no;
        $products = Product::get();
        return view('admin.purchase-items.purchase-items', compact('products', 'order_id'));
    }
    public function store(Request $request)
    {
        // Validate the form inputs
        $validated = $request->validate([
            'date' => 'required|date', // can be used later or stored if needed
            'purchase_order_id' => 'required',
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
        ]);

        // Retrieve unit price from the products table
        $product = Product::findOrFail($validated['product_id']);
        $unitPrice = $product->cost_price;

        // Calculate subtotal
        $subtotal = $unitPrice * $validated['qty'];

        // Create the purchase order item
        PurchaseItem::create([
            'purchase_order_id' => $validated['purchase_order_id'],
            'product_id' => $validated['product_id'],
            'quantity' => $validated['qty'],
            'unit_price' => $unitPrice,
            'received_quantity' => 0,
            'subtotal' => $subtotal,
        ]);

        return redirect()->back()->with('success', 'Purchase item added successfully!');
    }
}
