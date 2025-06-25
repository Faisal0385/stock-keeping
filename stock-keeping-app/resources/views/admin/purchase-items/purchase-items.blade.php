@extends('admin.master_admin')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-6">
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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Purchase Items</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Add/Update</h6>
                        <form action="{{ route('purchase.item.store') }}" method="POST">
                            @csrf

                            {{-- Date --}}
                            <div class="mb-3">
                                <label for="date" class="form-label">Date *</label>
                                <input type="date" name="date" id="date"
                                    class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}"
                                    required>
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Purchase Order ID --}}
                            <div class="mb-3">
                                <label for="purchase_order_id" class="form-label">Purchase Order ID *</label>
                                <input type="text" name="purchase_order_id" id="purchase_order_id"
                                    class="form-control @error('purchase_order_id') is-invalid @enderror"
                                    placeholder="Enter Purchase Order ID" value="{{ $order_id }}" required>
                                @error('purchase_order_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

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

                            {{-- Quantity --}}
                            <div class="mb-3">
                                <label for="qty" class="form-label">Quantity (PCS) *</label>
                                <input type="number" name="qty" id="qty"
                                    class="form-control @error('qty') is-invalid @enderror"
                                    placeholder="Enter quantity in pieces" value="{{ old('qty') }}" min="1"
                                    required>
                                @error('qty')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
        {{-- <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="card-title mb-3">Sale/Purchase Transactions</h5>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class=" card-body">
                            <!-- <h5 class="card-title">Sale/Purchase Transactions</h5>
                                                                                                                                            <h6 class="card-subtitle mb-2 text-body-secondary">Sale/Purchase Transactions</h6> -->
                            <p class="card-text">
                                <hr>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Invoice</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>@social</td>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <br>
    </div>
@endsection
