@extends('admin.master_admin')

@section('content')
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-2">
                <div class="alert alert-primary" role="alert">
                    Sale/Purchase and Inventory Managment System
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sale/Purchase Transactions</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Add/Update</h6>
                        <p class="card-text">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Date</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Purchase Order ID</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Purchase Order ID">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Select Product
                                *</label>
                            <select class="form-select form-select-sm" aria-label="Small select example">
                                <option selected>Select Product</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <!-- <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Purchase Price
                                            *</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            placeholder="22.00" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Selling Price *</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="50" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Discount Price</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            placeholder="0" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Current QTY
                                            (PCS)</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            placeholder="2" disabled>
                                    </div>
                                </div>
                            </div> -->

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">QTY (PCS)*</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                        placeholder="QTY (PCS)*">
                                </div>
                            </div>
                        </div>

                        </p>
                        <hr>
                        <a href="#" class="btn btn-sm btn-primary">Save</a>
                        <a href="./payment.html" class="btn btn-sm btn-success">Payment</a>
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
        </div>
        <br>
    </div>
@endsection
