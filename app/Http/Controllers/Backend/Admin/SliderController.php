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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            'type' => 'string|max:200',
            'title' => 'required|max:200',
            'starting_price' => 'max:200',
            'btn_url' => 'url',
            'serial' => 'required|integer',
            'status' => 'required',
        ]);

        try {
            DB::beginTransaction();
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
            toastr()->success('Slider created successfully.', 'Success!');
            return redirect()->route('admin.sliders.index');
            // return response()->json([
            //     'code' => 201,
            //     'message' => 'Slider created successfully.'
            // ], 201);
        } catch (\Exception $e) {
            // Handle the exception
            DB::rollBack();
            toastr()->error('Failed to create slider. Please try again.', 'Error!');
            return redirect()->back();
            // Log::error($e->getMessage());
            // return response()->json([
            //     'code' => 500,
            //     'message' => 'Failed to create slider. Please try again.'
            // ], 500);
        }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
