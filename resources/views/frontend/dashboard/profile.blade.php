@extends('admin.layouts.master')
@push('css')
    <!-- Choices Css -->
    <link rel="stylesheet" href="{{ asset('back/dist/assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

    <!-- Flatpickr Css -->
    <link rel="stylesheet" href="{{ asset('back/dist/assets/libs/flatpickr/flatpickr.min.css') }}">
@endpush

@section('content')
    <!-- Page Header -->
    <div class="block justify-between page-header md:flex">
        <div>
            <h3 class="text-gray-700 hover:text-gray-900 text-2xl font-medium"> Profile Settings</h3>
        </div>
        <ol class="flex items-center whitespace-nowrap min-w-0">
            <li class="text-sm">
                <a class="flex items-center font-semibold text-primary hover:text-primary truncate" href="javascript:void(0);">
                Pages
                <i class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-gray-300 rtl:rotate-180"></i>
                </a>
            </li>
            <li class="text-sm text-gray-500 hover:text-primary " aria-current="page">
                Profile Settings
            </li>
        </ol>
    </div>
    <!-- Page Header Close -->

    <!-- Start::row-1 -->
    
    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12 xl:col-span-3">
            <div class="box">
                <form action="{{ route('user.profile.updatePhoto', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body relative">
                        <div class="flex relative before:bg-black/50 before:absolute before:w-full before:h-full before:rounded-sm">
                            <img src="{{ asset('storage/'.Auth::user()->background) }}" alt="" class="h-[200px] w-full rounded-sm" id="profile-img2">
                            <span class="absolute top-5 ltr:right-5 rtl:left-5 flex p-2 rounded-sm ring-1 ring-black/10 text-white bg-black/10 leading-none">
                                <i class="ri ri-pencil-line"></i>
                                <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" name="background" id="profile-change2" onchange="previewImage(this, 'profile-img2')">
                            </span>
                        </div>
                        <div class="absolute top-[4.5rem] inset-x-0 text-center space-y-3">
                            <div class="flex justify-center w-full">
                                <div class="relative">
                                    <img src="{{ asset('storage/'.Auth::user()->image) }}" class="w-24 h-24 rounded-full ring-4 ring-white/10 mx-auto" id="profile-img" alt="profile-img">
                                    <span class="absolute bottom-0 ltr:right-0 rtl:left-0 block p-1 rounded-full ring-2 ring-white/10 text-white bg-white/10 leading-none">
                                        <i class="ri ri-pencil-line"></i>
                                        <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" name="image" id="profile-change" onchange="previewImage(this, 'profile-img')">
                                    </span>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="absolute">
                                    <button type="submit" class="ti-btn m-0 ti-btn-soft-primary w-full max-w-[5.625rem]"><i class="ri ri-refresh-line"></i> Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="box-body pt-0">
                    <nav class="flex flex-col space-y-2" aria-label="Tabs" role="tablist" data-hs-tabs-vertical="true">
                        <button type="button" class="hs-tab-active:bg-primary hs-tab-active:border-primary hs-tab-active:text-white -mr-px py-3 px-3 inline-flex items-center gap-2 bg-gray-50 text-sm font-medium text-center border text-gray-500 rounded-sm hover:text-gray-700 active" id="profile-settings-item-1" data-hs-tab="#profile-settings-1" aria-controls="profile-settings-1" role="tab">
                        <i class="ri ri-shield-user-line"></i> Personal Settings
                        </button>
                        <button type="button" class="hs-tab-active:bg-primary hs-tab-active:border-primary hs-tab-active:text-white -mr-px py-3 px-3 inline-flex items-center gap-2 bg-gray-50 text-sm font-medium text-center border text-gray-500 rounded-sm hover:text-gray-700" id="profile-settings-item-3" data-hs-tab="#profile-settings-3" aria-controls="profile-settings-3" role="tab">
                        <i class="ri ri-lock-line"></i> Password Settings
                        </button>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-span-12 xl:col-span-9">
            <div class="box">
                <div class="box-body p-0">
                    <div id="profile-settings-1" role="tabpanel" aria-labelledby="profile-settings-item-1">
                        <form action="{{ route('user.profile.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="box border-0 shadow-none mb-0">
                                <div class="box-header">
                                    <h5 class="box-title leading-none flex"><i class="ri ri-shield-user-line ltr:mr-2 rtl:ml-2"></i> Personal Settings</h5>
                                </div>
                                <div class="box-body">
                                    <div>
                                        <div class="grid lg:grid-cols-2 gap-6">
                                            <div class="space-y-2">
                                                <label class="ti-form-label mb-0">Full Name</label>
                                                <input type="text" class="my-auto ti-form-input" name="name" value="{{ Auth::user()->name }}">
                                            </div>
                                            <div class="space-y-2">
                                                <label class="ti-form-label mb-0">Phone Number</label>
                                                <input type="number" class="my-auto ti-form-input" name="phone" value="{{ Auth::user()->phone }}">
                                            </div>
                                            <div class="space-y-2">
                                                <label class="ti-form-label mb-0">Email Address</label>
                                                <input type="email" class="my-auto ti-form-input" name="email" value="{{ Auth::user()->email }}">
                                            </div>
                                            <div class="space-y-2">
                                                <label class="ti-form-label mb-0">Date Of Birth</label>
                                                <input type="text" class="ti-form-input flatpickr-input date" name="dob" value="{{ Auth::user()->dob }}">
                                            </div>
                                            <div class="space-y-2">
                                                <label class="ti-form-label mb-0">Gender</label>
                                                <ul class="flex flex-col sm:flex-row">
                                                    <li class="ti-list-group gap-x-2.5 bg-white border text-gray-800 ltr:sm:-ml-px rtl:sm:-mr-px sm:mt-0 ltr:sm:first:rounded-tr-none rtl:sm:first:rounded-tl-none ltr:sm:first:rounded-bl-sm rtl:sm:first:rounded-br-sm ltr:sm:last:rounded-bl-none rtl:sm:last:rounded-br-none ltr:sm:last:rounded-tr-sm rtl:sm:last:rounded-tl-sm">
                                                        <div class="relative flex items-start w-full">
                                                            <div class="flex items-center h-5">
                                                                <input id="female" name="gender" type="radio" class="ti-form-radio" value="female" @if (Auth::user()->gender == 'female')
                                                                    checked
                                                                @endif>
                                                            </div>
                                                            <label for="female" class="ltr:ml-3 rtl:mr-3 block w-full text-sm text-gray-600">
                                                                Female
                                                            </label>
                                                        </div>
                                                    </li>

                                                    <li class="ti-list-group gap-x-2.5 bg-white border text-gray-800 ltr:sm:-ml-px rtl:sm:-mr-px sm:mt-0 ltr:sm:first:rounded-tr-none rtl:sm:first:rounded-tl-none ltr:sm:first:rounded-bl-sm rtl:sm:first:rounded-br-sm ltr:sm:last:rounded-bl-none rtl:sm:last:rounded-br-none ltr:sm:last:rounded-tr-sm rtl:sm:last:rounded-tl-sm">
                                                        <div class="relative flex items-start w-full">
                                                            <div class="flex items-center h-5">
                                                                <input id="male" name="gender" type="radio" class="ti-form-radio" value="male" @if (Auth::user()->gender == 'male')
                                                                    checked
                                                                @endif>
                                                            </div>
                                                            <label for="male" class="ltr:ml-3 rtl:mr-3 block w-full text-sm text-gray-600">
                                                                Male
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="my-5">
                                            <div class="space-y-2">
                                                <label class="ti-form-label mb-0">Address</label>
                                                <input type="text" class="my-auto ti-form-input" name="address" value="{{ Auth::user()->address }}">
                                            </div>
                                        </div>
                                        <div class="grid lg:grid-cols-2 gap-6">
                                            <div class="space-y-2">
                                                <label class="ti-form-label mb-0">City</label>
                                                <input type="text" class="my-auto ti-form-input" name="city" value="{{ Auth::user()->city }}" placeholder="city">
                                            </div>
                                            <div class="space-y-2">
                                                <label class="ti-form-label mb-0">Country</label>
                                                <input type="text" class="my-auto ti-form-input" name="country" value="{{ Auth::user()->country }}" placeholder="country">
                                            </div>
                                            <div class="space-y-2">
                                                <label class="ti-form-label mb-0">Province</label>
                                                <input type="text" class="my-auto ti-form-input" name="province" value="{{ Auth::user()->province }}" placeholder="province">
                                            </div>
                                            <div class="space-y-2">
                                                <label class="ti-form-label mb-0">Postal Code</label>
                                                <input type="number" class="my-auto ti-form-input" name="zip" value="{{ Auth::user()->zip }}" placeholder="postal code">
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <div class="space-y-2">
                                                <label class="ti-form-label mb-0">Bio</label>
                                                <textarea class="ti-form-input" rows="3" name="about" placeholder="Add Your Bio">{{ Auth::user()->about }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer text-end space-x-3 rtl:space-x-reverse">
                                    <button type="submit" class="ti-btn m-0 ti-btn-soft-primary"><i class="ri ri-refresh-line"></i> Update</button>
                                    <button type="reset" class="ti-btn m-0 ti-btn-soft-secondary"><i class="ri ri-close-circle-line"></i> Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="profile-settings-3" class="hidden" role="tabpanel" aria-labelledby="profile-settings-item-3">
                        <form action="{{ route('user.profile.updatePassword', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="box border-0 shadow-none mb-0">
                                <div class="box-header">
                                    <h5 class="box-title leading-none flex"><i class="ri ri-lock-line ltr:mr-2 rtl:ml-2"></i> Password Settings</h5>
                                </div>
                                <div class="box-body p-0">
                                    <div class="grid grid-cols-12">
                                        <div class="col-span-12 xl:col-span-6 xl:ltr:border-r xl:rtl:border-l xl:border-b-0 border-b p-6 border-gray-200">
                                            <div class="space-y-4">
                                                <div class="space-y-2">
                                                <label class="ti-form-label mb-0">Current Password<sup class="text-danger">*</sup></label>
                                                <input type="password" class="my-auto ti-form-input" name="current_password" autocomplete="off" placeholder="Current Password" required>
                                                </div>
                                                <div class="space-y-2">
                                                <label class="ti-form-label mb-0">New Password<sup class="text-danger">*</sup></label>
                                                <input type="password" class="my-auto ti-form-input" name="password" autocomplete="off" placeholder="New Password" required>
                                                </div>
                                                <div class="space-y-2">
                                                <label class="ti-form-label mb-0">Confirm Password<sup class="text-danger">*</sup></label>
                                                <input type="password" class="my-auto ti-form-input" name="password_confirmation" autocomplete="off" placeholder="Confirm Password" required>
                                                </div>
                                                <p class="text-xs text-gray-500">Password should be min of <b class="text-success">8 characters <sup>*</sup> </b> (and up to 100 characters),<b class="text-success">One Upper Case Character<sup>*</sup></b> and <b class="text-success">One Special Character<sup>*</sup></b>   e.g., ! @ # ? included.</p>
                                            </div>
                                        </div>
                                        <div class="col-span-12 xl:col-span-6">
                                            <div class="box border-0 shadow-none">
                                                <div class="box-header">
                                                <div class="sm:flex space-y-4">
                                                    <h5 class="box-title my-auto">Web Linked Devices</h5>
                                                    <button type="button" class="py-1 px-3 ti-btn ti-btn-primary text-sm m-0">Log out From All Devices </button>
                                                </div>
                                                </div>
                                                <div class="box-body">
                                                    <ul class="flex flex-col">
                                                        <li class="ti-list-group bg-white text-gray-800">
                                                        <div class="sm:flex w-full space-y-2">
                                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <div class="avatar rounded-sm avatar-sm bg-gray-100 p-2.5">
                                                                <i class="ri ri-smartphone-line text-xl leading-none text-gray-500"></i>
                                                            </div>
                                                            <div class="">
                                                                <p class="mb-0 text-sm">Mobile-Poco-M2-Pro</p>
                                                                <p class="mb-0 text-gray-500 text-xs">Manchester, UK-Nov 30, 04:45PM</p>
                                                            </div>
                                                            </div>
                                                            <div class="ltr:ml-auto rtl:mr-auto my-auto text-end">
                                                            <button type="button" class="px-2 py-1 ti-btn ti-btn-soft-info text-xs">ReWoke</button>
                                                            <button type="button" class="px-2 py-1 ti-btn ti-btn-soft-danger text-xs">Logout</button>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li class="ti-list-group bg-white text-gray-800">
                                                        <div class="sm:flex w-full space-y-2">
                                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <div class="avatar rounded-sm avatar-sm bg-gray-100 p-2.5">
                                                                <i class="ri ri-tablet-line text-xl leading-none text-gray-500"></i>
                                                            </div>
                                                            <div class="">
                                                                <p class="mb-0 text-sm">Apple Tablet</p>
                                                                <p class="mb-0 text-gray-500 text-xs">Manchester, UK-Nov 30, 02:45PM</p>
                                                            </div>
                                                            </div>
                                                            <div class="ltr:ml-auto rtl:mr-auto my-auto text-end">
                                                            <button type="button" class="px-2 py-1 ti-btn ti-btn-soft-info text-xs">ReWoke</button>
                                                            <button type="button" class="px-2 py-1 ti-btn ti-btn-soft-danger text-xs">Logout</button>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li class="ti-list-group bg-white text-gray-800">
                                                        <div class="sm:flex w-full space-y-2">
                                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <div class="avatar rounded-sm avatar-sm bg-gray-100 p-2.5">
                                                                <i class="ri ri-airplay-line text-xl leading-none text-gray-500"></i>
                                                            </div>
                                                            <div class="">
                                                                <p class="mb-0 text-sm">Dell Desktop</p>
                                                                <p class="mb-0 text-gray-500 text-xs">Manchester, UK-Nov 30, 02:45PM</p>
                                                            </div>
                                                            </div>
                                                            <div class="ltr:ml-auto rtl:mr-auto my-auto text-end">
                                                            <button type="button" class="px-2 py-1 ti-btn ti-btn-soft-info text-xs">ReWoke</button>
                                                            <button type="button" class="px-2 py-1 ti-btn ti-btn-soft-danger text-xs">Logout</button>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li class="ti-list-group bg-white text-gray-800">
                                                        <div class="sm:flex w-full space-y-2">
                                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <div class="avatar rounded-sm avatar-sm bg-gray-100 p-2.5">
                                                                <i class="ri ri-macbook-line text-xl leading-none text-gray-500"></i>
                                                            </div>
                                                            <div class="">
                                                                <p class="mb-0 text-sm">Lenovo Laptop</p>
                                                                <p class="mb-0 text-gray-500 text-xs">Manchester, UK-Nov 30, 02:45PM</p>
                                                            </div>
                                                            </div>
                                                            <div class="ltr:ml-auto rtl:mr-auto my-auto text-end">
                                                            <button type="button" class="px-2 py-1 ti-btn ti-btn-soft-info text-xs">ReWoke</button>
                                                            <button type="button" class="px-2 py-1 ti-btn ti-btn-soft-danger text-xs">Logout</button>
                                                            </div>
                                                        </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="my-5 px-6">
                                                <div class="sm:space-x-6 rtl:space-x-reverse sm:flex space-y-4">
                                                <label class="ti-form-label my-auto">Account :</label>
                                                    <button type="button" class="ti-btn ti-btn-danger">
                                                    Deactivate Account
                                                    </button>
                                                    <button type="button" class="ti-btn-disabled ti-btn ti-btn-success">
                                                    Activate Account
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer text-end space-x-3 rtl:space-x-reverse">
                                    <button type="submit" class="ti-btn m-0 ti-btn-soft-primary"><i class="ri ri-refresh-line"></i> Update</button>
                                    <button type="reset" class="ti-btn m-0 ti-btn-soft-secondary"><i class="ri ri-close-circle-line"></i> Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

    <!-- End::row-1 -->
@endSection

@push('js')
    <!-- Flatpickr JS -->
    <script src="{{ asset('back/dist/assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Choices JS -->
    <script src="{{ asset('back/dist/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- Form-layout JS -->
    <script src="{{ asset('back/dist/assets/js/profile-settings.js') }}"></script>



@endpush