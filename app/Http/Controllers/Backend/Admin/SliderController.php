<?php

namespace App\Http\Controllers\Backend\Admin;

use App\DataTables\SliderDataTable;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $msg = [
            'banner.required' => 'Banner is required',
            'type.required' => 'Type is required',
            'title.required' => 'Title is required',
            'status.required' => 'Status is required',
            'starting_price.max' => 'Starting Price is too long',
            'btn_url.url' => 'Button URL is not valid URL',
            'serial.integer' => 'Serial is not valid integer',
        ];
        
        $request->validate([
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            'type' => 'string|max:200',
            'title' => 'required|max:200',
            'starting_price' => 'max:200',
            'btn_url' => 'nullable|url',
            'serial' => 'required|integer',
            'status' => 'required',
        ], $msg);

        DB::beginTransaction();
        try {
            $slider = new Slider();

            /** Handle File Upload */
            $fileData = $this->uploadImage($request, 'banner', 'app/public/uploads'); // Updated method call

            $fileName = $fileData['fileName'];
            $imagePath = 'storage/uploads/' . $fileName;

            $slider->banner = $imagePath;
            $slider->type = $request->input('type');
            $slider->title = $request->input('title');
            $slider->starting_price = $request->input('starting_price');
            $slider->btn_url = $request->input('btn_url');
            $slider->serial = $request->input('serial');
            $slider->status = $request->input('status');

            $slider->save();
            DB::commit();
            // toastr()->success('Slider created successfully.', 'Success!');
            return response()->json([
                'status' => 200,
                'message' => 'Slider created successfully.'
            ], 200);
        } catch (\Exception $e) {
            // Handle the exception
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Failed to create slider. Please try again.'
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the slider by ID
        try {
            $slider = Slider::findOrFail($id);

            // Return the slider data as JSON
            return response()->json($slider, 200);
        } catch (\Exception $e) {
            // Handle the exception, return an error response
            return response()->json(['error' => 'Slider not found.'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the slider by ID
        try {
            $slider = Slider::findOrFail($id);
    
            // Return the slider data as JSON
            return response()->json($slider, 200);
        } catch (\Exception $e) {
            // Handle the exception, return an error response
            return response()->json(['error' => 'Slider not found.'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $msg = [
            'type.required' => 'Type is required',
            'title.required' => 'Title is required',
            'status.required' => 'Status is required',
            'starting_price.max' => 'Starting Price is too long',
            'btn_url.url' => 'Button URL is not valid URL',
            'serial.integer' => 'Serial is not valid integer',
        ];
        $request->validate([
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'type' => 'string|max:200',
            'title' => 'required|max:200',
            'starting_price' => 'max:200',
            'btn_url' => 'url',
            'serial' => 'required|integer',
            'status' => 'required',
        ], $msg);
        
        DB::beginTransaction();
        try {
            $slider = Slider::findOrFail($id);

            /** Handle File Upload */
            $fileData = $this->updateImage($request, 'banner', 'app/public/uploads', $slider->banner); // Updated method call

            $fileName = $fileData['fileName'];
            $imagePath = 'storage/uploads/' . $fileName;

            $slider->banner = empty(!$fileData) ? $imagePath : $slider->banner;
            $slider->type = $request->input('type');
            $slider->title = $request->input('title');
            $slider->starting_price = $request->input('starting_price');
            $slider->btn_url = $request->input('btn_url');
            $slider->serial = $request->input('serial');
            $slider->status = $request->input('status');

            $slider->save();
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Slider updated successfully.'
            ], 201);
        } catch (\Exception $e) {
            // Handle the exception
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => 'Failed to update slider. Please try again.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $slider = Slider::findOrFail($id);
            $this->deleteImage($slider->banner);
            $slider->delete();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Slider deleted successfully.'
            ], 200);
        } catch (\Exception $e) {
            // Handle the exception
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json([
                'code' => 500,
                'message' => 'Failed to delete slider. Please try again.'
            ], 500);
        }
    }
}
