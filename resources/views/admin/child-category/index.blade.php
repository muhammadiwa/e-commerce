@extends('admin.layout.master')

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h3>Child Category</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Manage Categories</li>
                    <li class="breadcrumb-item active">Child Category</li>
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
                            <h4>Child Category Table</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn btn-primary float-end" id="addChildCategory" onclick="openModal()"><i class="fa fa-plus"></i> Add Child Category</a>
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

    {{-- Add Modal --}}
    <div class="modal fade bd-example-modal-lg" id="childCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="childCategoryForm" method="POST" enctype="multipart/form-data">
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
                                            <select name="category_id" id="category" class="form-select select2 main-category">
                                                <option value="">-- Select Category --</option>   
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Sub Category</label>
                                            <select name="subcategory_id" id="subCategory" class="form-select select2">
                                                
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
                        <button class="btn btn-secondary" type="button" id="saveChildCategory">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('#childCategoryForm').on('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Menghentikan perilaku default formulir saat tombol "Enter" ditekan
        }
    });
    function openModal(){
        $('#childCategoryModal .modal-title').text('Add Child Category');
        $('#childCategoryModal').modal('show');
    }

    $(document).ready(function() {
        $('#saveChildCategory').click(function(e) {
            e.preventDefault();

            var formData = new FormData($('#childCategoryForm')[0]);

            $.ajax({
                type: 'POST',
                url: "{{ route('admin.child-category.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 200) {
                        $('#childCategoryModal').modal('hide');
                        // Refresh or update your page as needed
                        location.reload();
                        toastr.success(response.message, 'Success!');
                    } else {
                        toastr.error(response.message, 'Error!');
                    }
                },
                error: function(xhr, status, error) {
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
            url: '/admin/child-category/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                // Fill in data in the edit form
                $('#childCategoryForm select[name="category_id"]').val(response.category_id);
                // Clear previous sub-category options
                $('#childCategoryForm select[name="subcategory_id"]').empty();
                // Append selected sub-category option
                var option = $('<option value="' + response.sub_category_id + '">' + response.sub_category.name + '</option>'); // Mengambil nama dari subkategori
                $('#childCategoryForm select[name="subcategory_id"]').append(option);
                $('#childCategoryForm input[name="name"]').val(response.name);
                $('#childCategoryForm select[name="status"]').val(response.status);
                
                // Set the data-id attribute to the category id
                $('#childCategoryForm').attr('data-id', id);
                
                // Show the edit modal
                $('#childCategoryModal .modal-title').text('Edit Child Category');
                $('#childCategoryModal').modal('show');
            },
            error: function(xhr, status, error) {
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

    $('#saveChildCategory').click(function() {
        var id = $('#childCategoryForm').data('id'); // Get category id from data-id attribute
        var formData = $('#childCategoryForm').serialize(); // Serialize form data

        // AJAX request to update category
        $.ajax({
            url: '/admin/child-category/' + id,
            type: 'POST', // Perubahan menjadi POST karena laravel biasanya membutuhkan _method untuk mengetahui bahwa itu adalah request PUT
            data: formData + '&_method=PUT', // Send serialized form data with _method=PUT
            success: function(response) {
                if (response.code == 200) { // Perubahan dari response.status menjadi response.code
                    $('#childCategoryModal').modal('hide');
                    // Refresh or update your page as needed
                    location.reload();
                    toastr.success(response.message, 'Success!');
                } else {
                    toastr.error(response.message, 'Error!');
                }
            },
            error: function(xhr, status, error) {
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
                url: "{{ route('admin.child-category.change-status') }}", // Menggunakan route yang benar
                type: 'PUT', // Menggunakan metode PUT
                data: {
                    status: isChecked,
                    id: id
                },
                success: function (response) {
                    toastr.success(response.message, 'Success!');
                    // location.reload();
                },
                error: function (xhr, status, error) {
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


    $(document).ready(function () {
        $('#category').change(function (e) {
            e.preventDefault();
            var id = $(this).val();
            $.ajax({
                url: "{{ route('admin.get-sub-categories') }}",
                type: 'GET',
                data: {
                    id: id
                },
                success: function (response) {
                    $('#subCategory').html('<option value="">-- Select Sub Category --</option>');
                    $.each(response, function (key, value) {
                        $('#subCategory').append('<option value="' + value.id + '">' + value.name + '</option>');
                    })
                },
                error: function (xhr, status, error) {
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