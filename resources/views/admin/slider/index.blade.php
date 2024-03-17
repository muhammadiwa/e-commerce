@extends('admin.layout.master')

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
                            <a href="#" class="btn btn-primary float-end" id="addSlider" onclick="openModal()"><i class="fa fa-plus"></i> Add Slider</a>
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

    {{-- Add Slider Modal --}}
    <div class="modal fade bd-example-modal-lg" id="AddSliderModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('admin.sliders.store') }}" id="AddSliderForm" method="POST" enctype="multipart/form-data">
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
                        <button class="btn btn-secondary" id="SaveSlider">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Slider Modal --}}
    <div class="modal fade bd-example-modal-lg" id="EditSliderModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" id="EditSliderForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Edit Slider</h4>
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
                                            <input class="form-control" type="text" id="title" name="title" placeholder="Title" required>
                                        </div>
                                        <div class="mb-3">
                                            <img id="previewBanner" class="img-fluid" alt="Banner Preview" style="width: 100px; height: 70px;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Banner</label>
                                            <input class="form-control" type="file" id="banner" name="banner" placeholder="Banner">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Type</label>
                                            <input class="form-control" type="text" id="type" name="type" placeholder="Type">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Starting Price</label>
                                            <input class="form-control" type="text" id="starting_price" name="starting_price" placeholder="Starting Price" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Link Url</label>
                                            <input class="form-control" type="text" id="btn_url" name="btn_url" placeholder="Link Url">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Serial</label>
                                            <input class="form-control" type="number" id="serial" name="serial" placeholder="Serial" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select class="form-select" name="status" id="status">
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
                        <button class="btn btn-secondary" type="button" id="updateSlider">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function openModal(){
        $('#AddSliderModal').modal('show');
    }

    $(document).ready(function () {
        $('#AddSliderForm').submit(function (e) {
            e.preventDefault();

            var form = $(this);
            var formData = new FormData(form[0]);

            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status === 200) {
                        $('#AddSliderModal').modal('hide');
                        // Optionally, you can update the slider list or perform any other action after success
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

    // Function to handle editing slider data
    function editModal(event, id) {
        // Prevent the default behavior of the link
        event.preventDefault();

        $.ajax({
            type: 'GET',
            url: '/admin/sliders/' + id + '/edit',
            success: function (data) {
                // Populate the edit modal with the retrieved data
                $('#EditSliderForm input[name="title"]').val(data.title);
                $('#EditSliderForm input[name="type"]').val(data.type);
                $('#EditSliderForm input[name="starting_price"]').val(data.starting_price);
                $('#EditSliderForm input[name="btn_url"]').val(data.btn_url);
                $('#EditSliderForm input[name="serial"]').val(data.serial);
                $('#EditSliderForm select[name="status"]').val(data.status);

                // Assuming data.banner contains the image path
                $('#EditSliderForm #previewBanner').attr('src', '/' + data.banner);

                // Set the data-id attribute to the slider id
                $('#EditSliderForm').attr('data-id', id);

                // Open the edit modal
                $('#EditSliderModal').modal('show');

            },
            error: function (error) {
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

    
    // Add a click event for the update button inside the modal
    $('#updateSlider').off('click').on('click', function () {
        // Get the updated data from the form

        var id = $('#EditSliderForm').data('id');
        var formData = $('#EditSliderForm').serialize();

        // Check if a new file is selected
        var newBanner = $('#EditSliderForm input[name="banner"]')[0].files[0];
        if (newBanner) {
            formData.append('banner', newBanner);
        }

        $.ajax({
            type: 'PUT',
            url: '/admin/sliders/' + id,
            data: formData,
            success: function (response) {
                if (response.status == 200) {
                    // Optionally, you can close the modal after a successful update
                    $('#EditSliderModal').modal('hide');
                    // You may also want to update your DataTable here or reload the page
                    location.reload();
                    // Handle success, e.g., show a success message
                    toastr.success(response.message, 'Success!');
                } else {
                    // Handle error, e.g., show an error message
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






</script>

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection