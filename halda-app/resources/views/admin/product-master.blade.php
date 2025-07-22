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

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow rounded-4 border-0">
                    <div class="card-header bg-primary text-white rounded-top-4">
                        <h5 class="mb-0">Product Master</h5>
                        <small class="text-light">Add New Product</small>
                    </div>
                    <div class="card-body bg-light">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
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

                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="product_name" class="form-label fw-semibold">Product Name</label>
                                <input type="text" name="name" id="product_name"
                                    class="form-control form-control-sm" placeholder="Enter product name" required>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="unit_id" class="form-label fw-semibold">Unit</label>
                                        <select name="unit_id" id="unit_id" class="form-select form-select-sm"
                                            required>
                                            <option value="">Select Unit</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label fw-semibold">Category</label>
                                        <select name="category_id" id="category_id" class="form-select form-select-sm"
                                            required>
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="sub_category_id" class="form-label fw-semibold">Subcategory</label>
                                        <select name="sub_category_id" id="sub_category_id"
                                            class="form-select form-select-sm" required>
                                            <option value="">Select Subcategory</option>
                                            @foreach ($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="purchase_price" class="form-label fw-semibold">Purchase Price
                                            *</label>
                                        <input type="number" step="0.01" name="purchase_price" id="purchase_price"
                                            class="form-control form-control-sm" placeholder="0.00" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="selling_price" class="form-label fw-semibold">Selling Price
                                            *</label>
                                        <input type="number" step="0.01" name="selling_price" id="selling_price"
                                            class="form-control form-control-sm" placeholder="0.00" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="reorder_stock" class="form-label fw-semibold">Re-Order
                                            Stock</label>
                                        <input type="number" name="reorder_stock" id="reorder_stock"
                                            class="form-control form-control-sm" placeholder="Minimum qty to restock">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-sm btn-success px-4">Save Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <h4 class="fw-semibold">All Products - Product List</h4>
            </div>

            <div class="col-lg-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Product List</h5>
                            <span class="text-sm fw-light">Latest product records</span>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">SKU</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Subcategory</th>
                                        <th scope="col">Purchase Price</th>
                                        <th scope="col">Selling Price</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Reorder</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $index => $product)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->sku }}</td>
                                            <td>{{ $product->unit->name ?? 'N/A' }}</td>
                                            <td>{{ $product->category->name ?? 'N/A' }}</td>
                                            <td>{{ $product->subCategory->name ?? 'N/A' }}</td>
                                            <td>{{ number_format($product->purchase_price, 2) }}</td>
                                            <td>{{ number_format($product->selling_price, 2) }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->reorder_stock }}</td>
                                            <td>
                                                @if ($product->status)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>
