<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class VendorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vendor.dashboard.profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
        ];
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
        ], $message);

        try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->dob = $request->dob;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->province = $request->province;
            $user->country = $request->country;
            $user->zip = $request->zip;
            $user->about = $request->about;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/profile'), $filename);

                $path = 'uploads/profile/' . $filename;
                $user->image = $path;
            }

            // Mengupdate informasi profil user
            $user->save();

            toastr()->success('Profile updated successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            toastr()->error('Profile update failed.');
            return redirect()->back();
        }
    }

    public function updatePhoto(Request $request, string $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'background' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $user = User::find($id);
            $fileFields = ['image', 'background'];

            foreach ($fileFields as $fieldName) {
                if ($request->hasFile($fieldName)) {
                    // Hapus file lama jika ada
                    if ($user->{$fieldName}) {
                        $filePath = storage_path('app/public/' . $user->{$fieldName});

                        // Verify the file exists before attempting to delete
                        if (file_exists($filePath)) {
                            unlink($filePath);
                        }
                    }
                    
                    $file = $request->file($fieldName);
                    if ($file->isValid()) {
                        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        $fileName = $originalName . '-' . date('YmdHis');
                        $uploadPath = storage_path('app/public/uploads/profile');
                        $file->move($uploadPath, $fileName . '.' . $file->getClientOriginalExtension());
        
                        $path = 'uploads/profile/' . $fileName . '.' . $file->getClientOriginalExtension();
        
                        $user->{$fieldName} = $path;
                    }
                }
            }

            // Mengupdate informasi profil user
            $user->save();

            toastr()->success('Profile updated successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            toastr()->error('Profile update failed.');
            return redirect()->back();
        }
    }

    public function updatePassword(Request $request)
    {
        $message = [
            'current_password.required' => 'The current password field is required.',
            'current_password.current_password' => 'The current password is incorrect.',
            'password.required' => 'The new password field is required.',
            'password.min' => 'The new password must be at least 8 characters.',
            'password.confirmed' => 'The new password confirmation does not match.',
        ];

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'min:8', 'confirmed'],
        ], $message);

        try {
            $request->user()->update([
                'password' => Hash::make($request->password)
            ]);

            // Set a success toast
            toastr()->success('Password updated successfully!', 'Success');

            return redirect()->back();
        } catch (\Exception $e) {
            // Other exceptions
            toastr()->error('An error occurred while updating the password.', 'Error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
