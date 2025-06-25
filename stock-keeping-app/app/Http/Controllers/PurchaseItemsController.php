<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseItem;
use App\Models\PurchaseOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseItemsController extends Controller
{
    public function index($id)
    {
        $products = Product::get();
        $purchaseItems = PurchaseItem::where('purchase_order_id', '=', $id)->get();
        return view('admin.purchase-items.purchase-items', compact('products', 'id','purchaseItems'));
    }

    public function store(Request $request)
    {
        ## Validate the form inputs
        $validated = $request->validate([
            'date' => 'required|date', ## can be used later or stored if needed
            'purchase_order_id' => 'required',
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
        ]);


        ## Retrieve unit price from the products table
        $product = Product::findOrFail($validated['product_id']);
        $unitPrice = $product->cost_price;


        ## Calculate subtotal
        $subtotal = $unitPrice * $validated['qty'];

        ## ✅ Update product stock (add the new quantity to existing stock)
        $product->stock_quantity += $validated['qty'];
        $product->save();



        ## Retrieve unit price from the products table
        $purchase_order = PurchaseOrder::findOrFail($validated['purchase_order_id']);

        ## ✅ Update product stock (add the new quantity to existing stock)
        $purchase_order->total_amount += $subtotal;
        $purchase_order->save();

        DB::table('stock_movements')->insert([
            'item_id' => $validated['product_id'],
            'movement_type' => 'purchase',
            'quantity' => $validated['qty'],
            'reference_id' => $validated['purchase_order_id'],
            'reference_type' => 'purchase_order',
            'date' => Carbon::now(),
        ]);

        DB::table('supplier_transactions')->insert([
            'type' => 'purchase_payment',
            'amount' => $subtotal,
            'reference' => $validated['purchase_order_id'],
            'date' => Carbon::now(),
        ]);

        ## ✅ Create the purchase item
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
