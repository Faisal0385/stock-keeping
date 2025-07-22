@extends('admin.layouts.master-layout')

@section('content')
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
        @include('admin.home.components.data-info')
        <hr>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="card-title mb-3">Show Today's Transaction</h5>
                </div>
                <div class="col-lg-12">

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-sale-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-sale" type="button" role="tab" aria-controls="pills-sale"
                                aria-selected="true">Sales</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-purchase-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-purchase" type="button" role="tab"
                                aria-controls="pills-purchase" aria-selected="false">Purchase</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-sale" role="tabpanel"
                            aria-labelledby="pills-sale-tab" tabindex="0">
                            @include('admin.home.components.sales-tab')
                        </div>
                        <div class="tab-pane fade" id="pills-purchase" role="tabpanel" aria-labelledby="pills-purchase-tab"
                            tabindex="0">
                            @include('admin.home.components.purchase-tab')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
@endsection
