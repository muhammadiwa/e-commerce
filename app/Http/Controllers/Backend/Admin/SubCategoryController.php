<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\SubCategoryDataTable;
use App\Models\ChildCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable)
    {
        $categories = Category::all();
        return $dataTable->render('admin.sub-category.index', compact('categories'));
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
        $msg = [
            'category.required' => 'Category is required',
            'name.required' => 'Name is required',
            'name.unique' => 'Name already exists',
            'status.required' => 'Status is required',
        ];

        $request->validate([
            'category' => 'required',
            'name' => 'required|max:200|unique:sub_categories,name',
            'status' => 'required',
        ], $msg);

        DB::beginTransaction();
        try {
            $subCategory = new SubCategory();
            $subCategory->category_id = $request->category;
            $subCategory->name = $request->name;
            $subCategory->slug = Str::slug($request->name);
            $subCategory->status = $request->status;
            $subCategory->save();

            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Sub Category created successfully.'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => 'Failed to create sub category. Please try again.'
            ], 500);
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
        try {
            $subCategory = SubCategory::findOrFail($id);
            return response()->json($subCategory, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Sub Category not found.'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $msg = [
            'category.required' => 'Category is required',
            'name.required' => 'Name is required',
            'name.unique' => 'Name already exists',
            'status.required' => 'Status is required',
        ];

        $request->validate([
            'category' => 'required',
            'name' => 'required|max:200|unique:sub_categories,name,' . $id,
            'status' => 'required',
        ], $msg);

        DB::beginTransaction();
        try {
            $subCategory = SubCategory::findOrFail($id);
            $subCategory->category_id = $request->category;
            $subCategory->name = $request->name;
            $subCategory->slug = Str::slug($request->name);
            $subCategory->status = $request->status;
            $subCategory->save();

            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Sub Category updated successfully.'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => 'Failed to update sub category. Please try again.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $subCategory = SubCategory::findOrFail($id);
            $childCategory = ChildCategory::where('sub_category_id', $subCategory->id)->count();
            if ($childCategory > 0) {
                return response()->json([
                    'code' => 500,
                    'message' => 'Sub Category has child category. Please delete child category first.'
                ], 500);
            } else {
                $subCategory->delete();
                DB::commit();
                return response()->json([
                    'code' => 200,
                    'message' => 'Sub Category deleted successfully.'
                ], 200);
            }
        } catch (\Exception $e) {
            // Handle the exception
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Failed to delete sub category. Please try again.'
            ], 500);
        }
    }

    public function changeStatus(Request $request)
    {
        DB::beginTransaction();
        try {
            $subCategory = SubCategory::findOrFail($request->id);
            $subCategory->status = $request->status;
            $subCategory->save();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Sub Category status changed successfully.'
            ], 200);
        } catch (\Exception $e) {
            // Handle the exception
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Failed to change sub category status. Please try again.'
            ], 500);
        }
    }
}
