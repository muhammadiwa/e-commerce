@extends('admin.layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
@endsection

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Edit Profile</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">                                       <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active"> Edit Profile</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="edit-profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header pb-0">
              <h4 class="card-title mb-0">My Profile</h4>
              <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
            </div>
            <div class="card-body">
              <form>
                <div class="row mb-2">
                  <div class="profile-title">
                    <div class="d-lg-flex d-block align-items-center"><img class="img-70 rounded-circle" alt="photo-profile" src="{{ asset('storage/'. $user->image) }}">
                      <div class="flex-grow-1">
                        <h3 class="mb-1 f-20 txt-primary"> <a href="#">{{ strtoupper(Auth::user()->name) }}</a></h3>
                        <p class="f-12 mb-0">DESIGNER</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <h6 class="form-label">Bio</h6>
                  <textarea class="form-control" rows="5">On the other hand, we denounce with righteous indignation</textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label f-w-500">Email-Address</label>
                  <input class="form-control" placeholder="your-email@domain.com">
                </div>
                <div class="mb-3">
                  <label class="form-label f-w-500">Password</label>
                  <input class="form-control" type="password" value="password">
                </div>
                <div class="mb-3">
                  <label class="form-label f-w-500">Website</label>
                  <input class="form-control" placeholder="http://Uplor .com">
                </div>
                <div class="form-footer">
                  <button class="btn btn-primary btn-block">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <form class="card" method="POST" action="{{ route('admin.profile.update', Auth::user()->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-header pb-0">
              <h4 class="card-title mb-0">Edit Profile</h4>
              <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-5">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Full Name</label>
                    <input class="form-control" type="text" name="name" value="{{old('name', Auth::user()->name)}}" placeholder="Full Name">
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Username</label>
                    <input class="form-control" type="text" name="username" value="{{old('username', Auth::user()->username)}}" placeholder="Username">
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Email address</label>
                    <input class="form-control" type="email" name="email" value="{{old('email', Auth::user()->email)}}" placeholder="Email">
                  </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Phone</label>
                    <input class="form-control" type="text" name="phone" value="{{old('phone', Auth::user()->phone)}}" placeholder="Exp: 1234567890">
                  </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Date of Birth</label>
                    <input class="datepicker-here form-control digits" type="text" name="dob" value="{{old('dob', Auth::user()->dob)}}" data-language="en" data-multiple-dates-separator=", " data-position="top left" placeholder="Date of Birth">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Address</label>
                    <input class="form-control" type="text" name="address" value="{{old('address', Auth::user()->address)}}" placeholder="Home Address">
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="mb-3">
                    <label class="form-label f-w-500">City</label>
                    <input class="form-control" type="text" name="city" value="{{old('city', Auth::user()->city)}}" placeholder="City">
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Province</label>
                    <input class="form-control" type="text" name="province" value="{{old('province', Auth::user()->province)}}" placeholder="Province">
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Postal Code</label>
                    <input class="form-control" type="number" name="zip" value="{{old('zip', Auth::user()->zip)}}" placeholder="ZIP Code">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Country</label>
                    <select class="form-control btn-square">
                      <option value="0">Indonesia</option>
                      <option value="1">Germany</option>
                      <option value="2">Canada</option>
                      <option value="3">Usa</option>
                      <option value="4">Aus</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div>
                    <label class="form-label f-w-500">About Me</label>
                    <textarea class="form-control" rows="5" name="about" placeholder="Enter About your description">{{old('about', Auth::user()->about)}}</textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label f-w-500">Upload Profile</label>
                    <input class="form-control" type="file" name="profile">
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <button class="btn btn-primary" type="submit">
                Update Profile
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>   
@endsection

@section('scripts')
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>   
@endsection