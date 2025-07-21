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
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Halda</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./transaction.html">Transaction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./product-master.html">Product Master</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Others
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Category</a></li>
                                    <li><a class="dropdown-item" href="#">Sub Category</a></li>
                                    <li><a class="dropdown-item" href="#">Unit</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
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
            <div class="col-lg-6">
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
                            <label for="exampleFormControlInput1" class="form-label">Transaction Type
                                *</label>
                            <select class="form-select form-select-sm" aria-label="Small select example">
                                <option selected>Transaction Type</option>
                                <option value="1">Purchase</option>
                                <option value="2">Sales</option>
                                <option value="3">Purchase Return</option>
                                <option value="3">Sale Return</option>
                                <option value="3">Adjust</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Invoive ID</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Invoive ID">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Purchase ID</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Purchase ID">
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

                        <div class="row">
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
                        </div>

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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Available Stock</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Add/Update</h6>
                        <p class="card-text">
                            <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" style="width: 80%;">Product Name</th>
                                    <th scope="col" class="text-center">Available Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td class="text-center">7</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td class="text-center">10</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>John</td>
                                    <td class="text-center">4</td>
                                </tr>
                            </tbody>
                        </table>
                        </p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>