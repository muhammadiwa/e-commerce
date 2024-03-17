@extends('admin.layout.master')

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h3>Sub Category</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Manage Categories</li>
                    <li class="breadcrumb-item active">Sub Category</li>
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
                            <h4>Sub Category Table</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn btn-primary float-end" id="addCategory" onclick="openModal()"><i class="fa fa-plus"></i> Add Sub Category</a>
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
    <!-- <div class="modal fade bd-example-modal-lg" id="AddCategoryModal" tabindex="-1" role="dialog"
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
                        <button class="btn btn-secondary" id="SaveCategory">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

    {{-- Edit Category Modal --}}
    <div class="modal fade bd-example-modal-lg" id="subCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="subCategoryForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel"></h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Category</label>
                                            <select name="category" id="category" class="form-select select2">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Sub Category Name" required>
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
                        <button class="btn btn-secondary" type="button" id="saveSubCategory">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function openModal(){
        $('#subCategoryModal .modal-title').text('Add Sub Category');
        $('#subCategoryModal').modal('show');
    }

    $(document).ready(function() {
        $('#saveSubCategory').click(function(e) {
            e.preventDefault();

            var formData = new FormData($('#subCategoryForm')[0]);

            $.ajax({
                type: 'POST',
                url: "{{ route('admin.sub-category.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 200) {
                        $('#subCategoryModal').modal('hide');
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
            url: '/admin/sub-category/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                // Fill in data in the edit form
                $('#subCategoryForm select[name="category"]').val(response.category_id);
                $('#subCategoryForm input[name="name"]').val(response.name);
                $('#subCategoryForm select[name="status"]').val(response.status);
                
                // Set the data-id attribute to the category id
                $('#subCategoryForm').attr('data-id', id);
                
                // Show the edit modal
                $('#subCategoryModal').modal('show');
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
    $('#saveSubCategory').click(function() {
        var id = $('#subCategoryForm').data('id'); // Get category id from data-id attribute
        var formData = $('#subCategoryForm').serialize(); // Serialize form data

        // AJAX request to update category
        $.ajax({
            url: '/admin/sub-category/' + id,
            type: 'PUT',
            data: formData, // Send serialized form data
            success: function(response) {
                if (response.status == 200) {
                    $('#subCategoryModal').modal('hide');
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
                url: "{{ route('admin.sub-category.change-status') }}",
                type: 'PUT',
                data: {
                    status: isChecked,
                    id: id
                },
                success: function (response) {
                    toastr.success(response.message, 'Success!');
                    // if (response.status == 200) {
                    // } else {
                    //     toastr.error(response.message, 'Error!');
                    // }
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