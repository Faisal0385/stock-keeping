@extends('admin.master_admin')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Product Master</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Add Product</h6>
                        <p class="card-text">
                            <hr>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                            <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1"
                                placeholder="Product Name">
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">SKU</label>
                                    <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1"
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
                                    <label for="exampleFormControlInput1" class="form-label">Purchase Price *</label>
                                    <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1"
                                        placeholder="Purchase Price *">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Selling Price *</label>
                                    <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1"
                                        placeholder="Selling Price *">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Discount Price</label>
                                    <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1"
                                        placeholder="Discount Price">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Re-Ordering Stock</label>
                                    <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1"
                                        placeholder="Re-Ordering Stock">
                                </div>
                            </div>
                        </div>
                        </p>
                        <hr>
                        <a href="#" class="btn btn-sm btn-primary">Save</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title mb-3">Show All Product</h5>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class=" card-body">
                        <h5 class="card-title">Show Transaction</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Sales</h6>
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
@endsection
