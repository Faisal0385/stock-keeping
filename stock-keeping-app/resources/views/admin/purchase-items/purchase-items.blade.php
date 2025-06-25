@extends('admin.master_admin')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-8">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input:
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Purchase Items</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Add/Update</h6>
                        <form action="{{ route('purchase.item.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-4">
                                    {{-- Date --}}
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date *</label>
                                        <input type="date" name="date" id="date"
                                            class="form-control form-control-sm @error('date') is-invalid @enderror"
                                            value="{{ old('date') }}" required>
                                        @error('date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Purchase Order ID --}}
                                    <div class="mb-3">
                                        <input type="hidden" name="purchase_order_id" value="{{ $id }}">
                                        @error('purchase_order_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    {{-- Product Select --}}
                                    <div class="mb-3">
                                        <label for="product_id" class="form-label">Select Product *</label>
                                        <select name="product_id" id="product_id"
                                            class="form-select form-select-sm @error('product_id') is-invalid @enderror"
                                            aria-label="Select Product" required>
                                            <option value="" disabled selected>Select Product</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('product_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    {{-- Quantity --}}
                                    <div class="mb-3">
                                        <label for="qty" class="form-label">Quantity (PCS) *</label>
                                        <input type="number" name="qty" id="qty"
                                            class="form-control form-control-sm @error('qty') is-invalid @enderror"
                                            placeholder="Enter quantity in pieces" value="{{ old('qty') }}"
                                            min="1" required>
                                        @error('qty')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="card-title mb-3">Purchase Items List</h5>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class=" card-body">
                            <p class="card-text">
                                <hr>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Invoice</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($purchaseItems as $key => $purchaseItem)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $purchaseItem->purchaseOrder?->order_no }}</td>
                                            <td>{{ $purchaseItem->product?->name }}</td>
                                            <td>{{ $purchaseItem->quantity }}</td>
                                            <td>{{ $purchaseItem->unit_price }}</td>
                                            <td>{{ $purchaseItem->subtotal }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
@endsection
