@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
@endsection

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Sliders</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Manage Website</li>
            <li class="breadcrumb-item active">Sliders</li>
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
            <div class="row">
                <div class="col-md-6">
                    <h4>Sliders Table</h4>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#sliderModal">Add Slider</a>
                </div>
            </div>
          </div>
          <div class="card-body">
            {{ $dataTable->table() }}
            <!-- <div class="dt-ext table-responsive theme-scrollbar">
              <table class="display" id="keytable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Banner</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Starting Price</th>
                    <th>Link Url</th>
                    <th>Serial</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Tata Co.</td>
                    <td>#AS61</td>
                    <td> <i class="icofont icofont-arrow-up me-1">1.4%</i></td>
                    <td>2011/04/25</td>
                    <td><span class="badge badge-light-warning">Medium</span></td>
                    <td>$320.800,00</td>
                    <td> 
                      <ul class="action"> 
                        <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                        <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                      </ul>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>

    {{-- Add Slider Modal --}}
    <div class="modal fade bd-example-modal-lg" id="sliderModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Add Slider</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Title" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Banner</label>
                                            <input class="form-control" type="file" name="banner" value="{{ old('banner') }}" placeholder="Banner" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Type</label>
                                            <input class="form-control" type="text" name="type" value="{{ old('type') }}" placeholder="Type">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Starting Price</label>
                                            <input class="form-control" type="text" name="starting_price" value="{{ old('starting_price') }}" placeholder="Starting Price" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Link Url</label>
                                            <input class="form-control" type="text" name="btn_url" value="{{ old('btn_url') }}" placeholder="Link Url">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Serial</label>
                                            <input class="form-control" type="number" name="serial" value="{{ old('serial') }}" placeholder="Serial" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select class="form-select" name="status" id="status">
                                                <option value="1" {{ old('status') == 1 ? 'selected' : ''}}>Active</option>
                                                <option value="0" {{ old('status') == 0 ? 'selected' : ''}}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button"
                            data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-secondary" type="submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-extension/custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection