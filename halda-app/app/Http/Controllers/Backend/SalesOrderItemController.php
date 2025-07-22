<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesOrderItemController extends Controller
{
    public function index($id)
    {
        $products = Product::where('status', '=', true)->get();
        $saleItems = SaleItem::get();
        return view('admin.sales-items', compact('products', 'id', 'saleItems'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'sale_date' => 'required|date',
            'product_id' => 'required|exists:products,id',
            'qty_sold' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $product = Product::findOrFail($validated['product_id']);

            $validated['unit_price'] = $product->selling_price;
            $validated['subtotal'] = $validated['qty_sold'] * $product->selling_price;

            // Save the purchase order item
            SaleItem::create($validated);

            // Update the product stock
            $product->stock -= $validated['qty_sold'];
            $product->save();

            // Update the purchase order's total amount
            $purchaseOrder = Sale::findOrFail($validated['sale_id']);
            $purchaseOrder->total_amount = $purchaseOrder->items()->sum('subtotal');
            $purchaseOrder->save();

            DB::commit();

            return redirect()->back()->with('success', 'Sale Order Item added, product stock and order amount updated.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Something went wrong. Transaction rolled back. ' . $e->getMessage());
        }
    }
}
