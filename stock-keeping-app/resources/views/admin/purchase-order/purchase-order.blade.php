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
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Purchase Orders</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Add/Update</h6>
                        <p class="card-text">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1">
                                </div>

                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Order No</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Order No">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Select Supplier
                                        *</label>
                                    <select class="form-select form-select-sm" aria-label="Small select example">
                                        <option selected>Select Supplier</option>
                                        <option value="1">Purchase</option>
                                        <option value="2">Sales</option>
                                        <option value="3">Purchase Return</option>
                                        <option value="3">Sale Return</option>
                                        <option value="3">Adjust</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Notes</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Notes">
                        </div>

                        </p>
                        <hr>
                        <a href="#" class="btn btn-sm btn-primary">Save</a>
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
                                        <th scope="col">Supplier</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Notes</th>
                                        <th scope="col">Action</th>
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
                                        <td>
                                            <a href="{{route('purchase.items', 2)}}" class="btn btn-sm btn-primary">Add Items</a>
                                        </td>
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
