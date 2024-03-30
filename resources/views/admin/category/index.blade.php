@extends('admin.layout.master')

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h3>Category</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Manage Categories</li>
                    <li class="breadcrumb-item active">Category</li>
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
                            <h4>Category Table</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn btn-primary float-end" id="addCategory" onclick="openModal()"><i class="fa fa-plus"></i> Add Category</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
</div>

    {{-- Add Category Modal --}}
    <div class="modal fade bd-example-modal-lg" id="AddCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="AddCategoryForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Add Category</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Icon</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="icon" value="{{ old('icon') }}" placeholder="Category Icon"
                                                    aria-label="Category Icon"><span
                                                    class="input-group-text" onclick="openIconModal()">Pick Icon</span>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Category Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Status</label>
                                            <select class="form-select" name="status" required>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
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
                        <button class="btn btn-secondary" id="SaveCategory">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Category Modal --}}
    <div class="modal fade bd-example-modal-lg" id="EditCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="EditCategoryForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Edit Category</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Icon</label>
                                            <input class="form-control" type="text" name="icon" value="{{ old('icon') }}" placeholder="Category Icon" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Category Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Status</label>
                                            <select class="form-select" name="status" required>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
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
                        <button class="btn btn-secondary" type="button" id="updateCategory">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Icon Modal --}}
    <div class="modal fade bd-example-modal-lg" id="IconModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Pick Icon</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('icons.ico_icon')
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/js/icons/icons-notify.js') }}"></script>
<script src="{{ asset('assets/js/icons/icon-clipart.js') }}"></script>
<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>   
<script>
    function openModal(){
        $('#AddCategoryModal').modal('show');
    }

    function openIconModal(){
        $('#IconModal').modal('show');
    }

    $(document).ready(function() {
        $('#SaveCategory').click(function(e) {
            e.preventDefault();

            var formData = new FormData($('#AddCategoryForm')[0]);

            $.ajax({
                type: 'POST',
                url: "{{ route('admin.category.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 200) {
                        $('#AddCategoryModal').modal('hide');
                        // Refresh or update your page as needed
                        location.reload();
                        toastr.success(response.message, 'Success!');
                    } else {
                        toastr.error(response.message, 'Error!');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    if (xhr.status == 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        $.each(errors, function(key, value) {
                            errorMessage += value[0] + '\n';
                        });
                        toastr.error(errorMessage);
                    } else {
                        toastr.error(response.message, 'Error!');
                    }
                }
            });
        });
    });


    // Function to open the edit modal and fill in data
    function editModal(event, id) {
        event.preventDefault();
        
        // AJAX request to get category data
        $.ajax({
            url: '/admin/category/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                // Fill in data in the edit form
                $('#EditCategoryForm input[name="icon"]').val(response.icon);
                $('#EditCategoryForm input[name="name"]').val(response.name);
                $('#EditCategoryForm select[name="status"]').val(response.status);
                
                // Set the data-id attribute to the category id
                $('#EditCategoryForm').attr('data-id', id);
                
                // Show the edit modal
                $('#EditCategoryModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                if (xhr.status == 422) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    $.each(errors, function(key, value) {
                        errorMessage += value[0] + '\n';
                    });
                    toastr.error(errorMessage);
                } else {
                    toastr.error(response.message, 'Error!');
                }
            }
        });
    }

    // Function to handle update category
    $('#updateCategory').click(function() {
        var id = $('#EditCategoryForm').data('id'); // Get category id from data-id attribute
        var formData = $('#EditCategoryForm').serialize(); // Serialize form data

        // AJAX request to update category
        $.ajax({
            url: '/admin/category/' + id,
            type: 'PUT',
            data: formData, // Send serialized form data
            success: function(response) {
                if (response.status == 200) {
                    $('#EditCategoryModal').modal('hide');
                    // Refresh or update your page as needed
                    location.reload();
                    toastr.success(response.message, 'Success!');
                    // Refresh or update your page as needed
                } else {
                    toastr.error(response.message, 'Error!');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                if (xhr.status == 422) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    $.each(errors, function(key, value) {
                        errorMessage += value[0] + '\n';
                    });
                    toastr.error(errorMessage);
                } else {
                    toastr.error(response.message);
                }
            }
        });
    });

    $(document).ready(function () {
        $('body').on('click', '.change-status', function () {
            var id = $(this).data('id');
            var isChecked = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('admin.category.change-status') }}",
                type: 'PUT',
                data: {
                    status: isChecked,
                    id: id
                },
                success: function (response) {
                    if (response.status == 200) {
                        toastr.success(response.message, 'Success!');
                    } else {
                        toastr.error(response.message, 'Error!');
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    if (xhr.status == 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        $.each(errors, function (key, value) {
                            errorMessage += value[0] + '\n';
                        });
                        toastr.error(errorMessage);
                    } else {
                        toastr.error(response.message, 'Error!');
                    }
                }
            });
        });
    });


  </script>


{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection