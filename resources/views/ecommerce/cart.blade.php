@extends('layout.master')

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Cart</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Ecommerce</li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Cart</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="order-history table-responsive theme-scrollbar wishlist">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Prdouct</th>
                                            <th>Prdouct Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img class="img-fluid img-40" src="{{ 'assets/images/product/1.png' }}"
                                                    alt="#"></td>
                                            <td>
                                                <div class="product-name"><a href="{{ route('product_page') }}">
                                                        <h6>Long Top</h6>
                                                    </a></div>
                                            </td>
                                            <td>$21</td>
                                            <td>
                                                <fieldset class="qty-box">
                                                    <div class="input-group">
                                                        <input class="touchspin text-center" type="text" value="5">
                                                    </div>
                                                </fieldset>
                                            </td>
                                            <td><i data-feather="x-circle"></i></td>
                                            <td>$105</td>
                                        </tr>
                                        <tr>
                                            <td><img class="img-fluid img-40" src="{{ 'assets/images/product/13.png' }}"
                                                    alt="#"></td>
                                            <td>
                                                <div class="product-name"><a href="{{ route('product_page') }}">
                                                        <h6>Fancy watch</h6>
                                                    </a></div>
                                            </td>
                                            <td>$50</td>
                                            <td>
                                                <fieldset class="qty-box">
                                                    <div class="input-group">
                                                        <input class="touchspin text-center" type="text" value="5">
                                                    </div>
                                                </fieldset>
                                            </td>
                                            <td><i data-feather="x-circle"></i></td>
                                            <td>$250</td>
                                        </tr>
                                        <tr>
                                            <td><img class="img-fluid img-40" src="{{ 'assets/images/product/4.png' }}"
                                                    alt="#"></td>
                                            <td>
                                                <div class="product-name"><a href="{{ route('product_page') }}">
                                                        <h6>Man shoes</h6>
                                                    </a></div>
                                            </td>
                                            <td>$12</td>
                                            <td>
                                                <fieldset class="qty-box">
                                                    <div class="input-group">
                                                        <input class="touchspin text-center" type="text" value="5">
                                                    </div>
                                                </fieldset>
                                            </td>
                                            <td><i data-feather="x-circle"></i></td>
                                            <td>$60</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <div class="input-group">
                                                    <input class="form-control" type="text"
                                                        placeholder="Enter coupan code"><a class="btn btn-primary"
                                                        href="#">Apply</a>
                                                </div>
                                            </td>
                                            <td class="total-amount">
                                                <h6 class="m-0 text-end"><span class="f-w-600">Total Price :</span></h6>
                                            </td>
                                            <td><span>$360.00 </span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-end" colspan="5"><a
                                                    class="btn btn-secondary cart-btn-transform"
                                                    href="{{ route('product') }}">continue shopping</a></td>
                                            <td><a class="btn btn-success cart-btn-transform" href="{{ route('checkout') }}">check
                                                    out</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ 'assets/js/touchspin/vendors.min.js' }}"></script>
    <script src="{{ 'assets/js/touchspin/touchspin.js' }}"></script>
    <script src="{{ 'assets/js/touchspin/input-groups.min.js' }}"></script>
@endsection
