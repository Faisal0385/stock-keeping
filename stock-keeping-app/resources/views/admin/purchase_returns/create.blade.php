@extends('admin.master_admin')

@section('content')
    <br>
    <div class="container-fluid">
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
                        <h5 class="card-title">Purchase Return</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Add/Update</h6>
                        <form action="{{ route('purchase.order.store') }}" method="POST">
                            @csrf

                            <div class="row mt-3">
                                {{-- Date --}}
                                {{-- <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date *</label>
                                        <input type="date"
                                            class="form-control form-control-sm @error('date') is-invalid @enderror"
                                            name="date" value="{{ old('date') }}">
                                        @error('date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}

                                {{-- Order No --}}
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="purchase_return_id" class="form-label">Purchase Order ID</label>
                                        <select class="form-select form-select-sm" id="purchase_return_id"
                                            name="purchase_return_id" required>
                                            <option value="">Select Purchase Order ID</option>
                                            @foreach ($purchaseOrders as $order)
                                                <option value="{{ $order->id }}">#PO-{{ $order->order_no }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Notes --}}
                                {{-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="notes" class="form-label">Notes</label>
                                        <input type="text"
                                            class="form-control form-control-sm @error('notes') is-invalid @enderror"
                                            name="notes" placeholder="Optional notes" value="{{ old('notes') }}">
                                        @error('notes')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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

                                    @if (!empty($purchaseItems))
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
                                    @endif

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
