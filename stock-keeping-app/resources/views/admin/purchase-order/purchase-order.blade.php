@extends('admin.master_admin')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Purchase Orders</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Add/Update</h6>
                        <form action="{{ route('purchase.order.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                {{-- Date --}}
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date *</label>
                                        <input type="date" class="form-control @error('date') is-invalid @enderror"
                                            name="date" value="{{ old('date') }}">
                                        @error('date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Order No --}}
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="order_no" class="form-label">Order No *</label>
                                        <input type="text" class="form-control @error('order_no') is-invalid @enderror"
                                            name="order_no" placeholder="Enter order number" value="{{ old('order_no') }}">
                                        @error('order_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Supplier --}}
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="supplier" class="form-label">Select Supplier</label>
                                        <select class="form-select @error('supplier') is-invalid @enderror" name="supplier">
                                            <option value="">-- Select Supplier --</option>
                                            <option value="1" {{ old('supplier') == 1 ? 'selected' : '' }}>Purchase
                                            </option>
                                            <option value="2" {{ old('supplier') == 2 ? 'selected' : '' }}>Sales
                                            </option>
                                            <option value="3" {{ old('supplier') == 3 ? 'selected' : '' }}>Purchase
                                                Return</option>
                                            <option value="4" {{ old('supplier') == 4 ? 'selected' : '' }}>Sale Return
                                            </option>
                                            <option value="5" {{ old('supplier') == 5 ? 'selected' : '' }}>Adjust
                                            </option>
                                        </select>
                                        @error('supplier')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Notes --}}
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notes</label>
                                <input type="text" class="form-control @error('notes') is-invalid @enderror"
                                    name="notes" placeholder="Optional notes" value="{{ old('notes') }}">
                                @error('notes')
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="card-title mb-3">Purchase Orders Table</h5>
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
                                        <th scope="col">Date</th>
                                        <th scope="col">Order No</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Notes</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchaseOrders as $key => $purchaseOrder)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $purchaseOrder->order_date }}</td>
                                            <td>{{ $purchaseOrder->order_no }}</td>
                                            <td>{{ $purchaseOrder->total_amount }}</td>
                                            <td>{{ $purchaseOrder->notes }}</td>
                                            <td>
                                                <a href="{{ route('purchase.item', $purchaseOrder->id) }}"
                                                    class="btn btn-sm btn-primary">Add
                                                    Items</a>
                                            </td>
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
