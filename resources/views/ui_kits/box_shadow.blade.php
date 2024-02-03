@extends('layout.master')

@section('main_content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Box Shadow</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Ui Kits</li>
                        <li class="breadcrumb-item active">Box Shadow</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card box-shadow-title">
                    <div class="card-header pb-0">
                        <h4>Box Shadow Examples</h4><span>While shadows on components are disabled by default in Bootstrap
                            and can be enabled via <code>$enable-shadows</code>, you can also quickly add or remove a shadow
                            with our <code>box-shadow</code> utility classes. Includes support for <code>.shadow-none</code>
                            and three default sizes (which have associated variables to match).</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="sub-title m-0">Larger shadow</h6>
                            </div>
                            <div class="col-sm-4">
                                <div class="shadow-lg p-25 shadow-showcase text-center">
                                    <h5 class="m-0 f-16">Larger shadow</h5>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="shadow-lg p-25 shadow-showcase text-center">
                                    <h5 class="m-0 f-16">Larger shadow</h5>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="shadow-lg p-25 shadow-showcase text-center">
                                    <h5 class="m-0 f-16">Larger shadow</h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <h6 class="sub-title">Regular shadow</h6>
                            </div>
                            <div class="col-sm-4">
                                <div class="shadow shadow-showcase p-25 text-center">
                                    <h5 class="m-0 f-16">Regular shadow</h5>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="shadow shadow-showcase p-25 text-center">
                                    <h5 class="m-0 f-16">Regular shadow</h5>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="shadow shadow-showcase p-25 text-center">
                                    <h5 class="m-0 f-16">Regular shadow</h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <h6 class="sub-title">Small shadow</h6>
                            </div>
                            <div class="col-sm-4">
                                <div class="shadow-sm shadow-showcase p-25 text-center">
                                    <h5 class="m-0 f-16">Small shadow</h5>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="shadow-sm shadow-showcase p-25 text-center">
                                    <h5 class="m-0 f-16">Small shadow</h5>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="shadow-sm shadow-showcase p-25 text-center">
                                    <h5 class="m-0 f-16">Small shadow</h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <h6 class="sub-title">No shadow</h6>
                            </div>
                            <div class="col-sm-4 mb-0">
                                <div class="shadow-none shadow-showcase p-25 text-center">
                                    <h5 class="m-0 f-16">No shadow</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-0">
                                <div class="shadow-none shadow-showcase p-25 text-center">
                                    <h5 class="m-0 f-16">No shadow</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-0">
                                <div class="shadow-sm shadow-showcase shadow-none p-25 text-center">
                                    <h5 class="m-0 f-16">No shadow</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection