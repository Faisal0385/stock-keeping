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
        <div class="container-fluid py-4">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <h4 class="fw-bold mb-1">Sales Order</h4>
                                <p class="text-muted mb-0">Fill in the form below to add or update a sales order.</p>
                            </div>

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

                            <form action="{{ route('sales.store') }}" method="POST">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label for="sale_date" class="form-label">Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="sale_date" name="sale_date"
                                            required>
                                    </div>

                                    {{-- <div class="col-md-6">
                                        <label for="customer" class="form-label">Customer <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="customer" name="customer_id">
                                            <option value="">-- Select Customer --</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <label for="notes" class="form-label">Notes</label>
                                        <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Enter any additional notes..."></textarea>
                                    </div>
                                </div>

                                <div class="mt-4 text-end">
                                    <button type="submit" class="btn btn-primary px-4 py-2">Save Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <hr>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <h4 class="fw-semibold">📦 Sale Orders Overview</h4>
                    <p class="text-muted mb-0">Manage and review all your sale orders in one place.</p>
                </div>

                <div class="col-lg-12">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Order No</th>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $index => $order)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ \Carbon\Carbon::parse($order->date)->format('Y-m-d') }}</td>
                                                <td>{{ $order->sale_code }}</td>
                                                <td>{{ $order->customer?->name ?? 'No Data' }}</td>
                                                <td>{{ $order->order_amount ?? 0 }}</td>
                                                <td>{{ $order->notes ?? 'N/A' }}</td>
                                                <td>
                                                    <a href="{{ route('sales.items', $order->id) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        Add Items
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
