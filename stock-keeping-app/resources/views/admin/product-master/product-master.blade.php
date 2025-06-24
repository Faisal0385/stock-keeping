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
                        <h5 class="card-title">Product Master</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Add Product</h6>
                        <p class="card-text">
                            <hr>
                        <form action="{{ route('product.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control form-control-sm" name="name"
                                    placeholder="Product Name">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" class="form-control form-control-sm" name="sku"
                                            placeholder="SKU">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Unit Name</label>
                                        <select class="form-select form-select-sm" aria-label="Small select example">
                                            <option selected>Select Unit Name </option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                                        <select class="form-select form-select-sm" aria-label="Small select example">
                                            <option selected>Select Category Name </option>
                                            <option value="1">Purchase</option>
                                            <option value="2">Sales</option>
                                            <option value="3">Purchase Return</option>
                                            <option value="3">Sale Return</option>
                                            <option value="3">Adjust</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Sub Category Name</label>
                                        <select class="form-select form-select-sm" aria-label="Small select example">
                                            <option selected>Select Sub Category Name </option>
                                            <option value="1">Purchase</option>
                                            <option value="2">Sales</option>
                                            <option value="3">Purchase Return</option>
                                            <option value="3">Sale Return</option>
                                            <option value="3">Adjust</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="cost_price" class="form-label">Purchase Price *</label>
                                        <input type="text" class="form-control form-control-sm" name="cost_price"
                                            placeholder="Purchase Price *">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="sell_price" class="form-label">Selling Price *</label>
                                        <input type="text" class="form-control form-control-sm" name="sell_price"
                                            placeholder="Selling Price *">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Discount Price</label>
                                        <input type="text" class="form-control form-control-sm"
                                            id="exampleFormControlInput1" placeholder="Discount Price">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Re-Ordering Stock</label>
                                        <input type="text" class="form-control form-control-sm"
                                            id="exampleFormControlInput1" placeholder="Re-Ordering Stock">
                                    </div>
                                </div>
                            </div>
                            </p>
                            <hr>
                            <button class="btn btn-sm btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class=" card-body">
                        <h5 class="card-title">Show All Product</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Product List</h6>
                        <p class="card-text">
                            <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">SKU</th>
                                    <th scope="col">Cost Price</th>
                                    <th scope="col">Sell Price</th>
                                    <th scope="col">Stock Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->sell_price }}</td>
                                        <td>{{ $product->cost_price }}</td>
                                        <td>{{ $product->stock_quantity }}</td>
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
@endsection
