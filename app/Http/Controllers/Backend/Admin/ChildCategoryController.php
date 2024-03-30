<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\ChildCategoryDataTable;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $dataTable)
    {
        $categories = Category::all();
        return $dataTable->render('admin.child-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->id)->where('status', 1)->get();
        return response()->json($subCategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $msg = [
            'name.required' => 'Name is required',
            'category_id.required' => 'Category is required',
            'subcategory_id.required' => 'Sub Category is required',
            'status.required' => 'Status is required',
            'name.unique' => 'Name already exists',
        ];
        $request->validate([
            'name' => 'required|max:200|unique:child_categories,name',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'status' => 'required',
        ], $msg);

        DB::beginTransaction();
        try {
            $childCategory = new ChildCategory();
            $childCategory->name = $request->name;
            $childCategory->category_id = $request->category_id;
            $childCategory->sub_category_id = $request->subcategory_id;
            $childCategory->slug = Str::slug($request->name);
            $childCategory->status = $request->status;
            $childCategory->save();
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Child Category created successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => 'Failed to create child category. Please try again.',
            ]);
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
        DB::beginTransaction();
        try {
            $childCategory = ChildCategory::with('category', 'subCategory')->findOrFail($id);
            // $categories = Category::all();
            // $subCategories = SubCategory::where('category_id', $childCategory->category_id)->where('status', 1)->get();
            DB::commit();
            return response()->json($childCategory);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Child Category not found. Please try again.'
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $msg = [
            'name.required' => 'Name is required',
            'category_id.required' => 'Category is required',
            'subcategory_id.required' => 'Sub Category is required',
            'status.required' => 'Status is required',
            'name.unique' => 'Name already exists',
        ];
        $request->validate([
            'name' => 'required|max:200|unique:child_categories,name,' . $id,
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'status' => 'required',
        ], $msg);

        DB::beginTransaction();
        try {
            $childCategory = ChildCategory::findOrFail($id);
            $childCategory->category_id = $request->category_id;
            $childCategory->sub_category_id = $request->subcategory_id;
            $childCategory->name = $request->name;
            $childCategory->slug = Str::slug($request->name);
            $childCategory->status = $request->status;
            $childCategory->save();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Child Category updated successfully.'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Failed to update child category. Please try again.'
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
            $childCategory = ChildCategory::findOrFail($id);
            $childCategory->delete();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Child Category deleted successfully.'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Failed to delete child category. Please try again.'
            ], 500);
        }
    }

    public function changeStatus(Request $request)
    {
        DB::beginTransaction();
        try {
            $childCategory = ChildCategory::findOrFail($request->id);
            // Toggle status: 1 to 0, 0 to 1
            $childCategory->status = $childCategory->status ? 0 : 1;
            $childCategory->save();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Child Category status changed successfully.'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Failed to change child category status. Please try again.'
            ], 500);
        }
    }
}
