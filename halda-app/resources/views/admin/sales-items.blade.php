<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Managment System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    {{-- navbar --}}
    @include('admin.components.navbar')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-2">
                <div class="alert alert-primary" role="alert">
                    Sale/Purchase and Inventory Managment System
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm rounded-4 border-0">
                    <div class="card-body">
                        <!-- Header with background color -->
                        <div class="bg-primary text-white p-4 rounded-top">
                            <h5 class="card-title fw-semibold mb-1">Sale Transactions</h5>
                            <h6 class="card-subtitle mb-0 opacity-75">Add Transactions</h6>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show m-1" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('sales.items.store') }}" method="POST" class="pt-5">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 mb-4">
                                    <label for="sale_date" class="form-label">Date <span
                                            class="text-danger">*</span></label>
                                    <input type="hidden" name="sale_id" value="{{ $id }}">
                                    <input type="date" class="form-control" name="sale_date" required>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <label for="product_id" class="form-label">Select Product <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="product_id" required>
                                        <option selected disabled>Select Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4 col-lg-3 px-0">
                                    <label for="qty_sold" class="form-label">Quantity (PCS) <span
                                            class="text-danger">*</span></label>
                                    <input type="number" min="1" class="form-control" name="qty_sold"
                                        placeholder="Enter quantity" required>
                                </div>

                            </div>
                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-sm px-4">Save</button>
                                {{-- <a href="./payment.html" class="btn btn-success btn-sm px-4">Payment</a> --}}
                            </div>
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
                                        <th scope="col">Invoice</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($saleItems as $key => $saleItem)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th> {{-- Row Number --}}
                                            <td>{{ $saleItem->saleOrder?->sale_code }}</td>
                                            <td>{{ $saleItem->product->name ?? 'N/A' }}</td>
                                            {{-- Product Name --}}
                                            <td>{{ $saleItem->qty_sold }}</td> {{-- Received Quantity --}}
                                            <td>{{ number_format($saleItem->unit_price, 2) }}</td>
                                            {{-- Unit Price --}}
                                            <td>{{ number_format($saleItem->subtotal, 2) }}</td>
                                            {{-- Subtotal --}}
                                            <td>
                                                <form action="{{ route('purchase-items.destroy', $saleItem->id) }}"
                                                    method="POST" onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                            {{-- Delete --}}
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>
