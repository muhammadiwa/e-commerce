<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
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
        $validationMessage = [
            'icon.required' => 'Icon is required',
            'name.required' => 'Name is required',
            'name.unique' => 'Name already exists',
            'status.required' => 'Status is required',
        ];
        $request->validate([
            'icon' => 'required',
            'name' => 'required|max:200|unique:categories,name',
            'status' => 'required',
        ], $validationMessage);

        DB::beginTransaction();
        try {
            $category = new Category();
            $category->icon = $request->icon;
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->status = $request->status;
            $category->save();

            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Category created successfully.'
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 500,
                'message' => 'Failed to create category. Please try again.',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the category by ID
        try {
            $category = Category::findOrFail($id);

            // Return the category data as JSON
            return response()->json($category, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Category not found.'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the category by ID
        try {
            $category = Category::findOrFail($id);

            // Return the category data as JSON
            return response()->json($category, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Category not found.'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validationMessage = [
            'icon.required' => 'Icon is required',
            'name.required' => 'Name is required',
            'name.unique' => 'Name already exists',
            'status.required' => 'Status is required',
        ];
        $request->validate([
            'icon' => 'required',
            'name' => 'required|max:200|unique:categories,name,' . $id,
            'status' => 'required',
        ], $validationMessage);

        DB::beginTransaction();
        try {
            $category = Category::findOrFail($id);
            $category->icon = $request->icon;
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->status = $request->status;
            $category->save();

            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Category updated successfully.'
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => 'Failed to update category. Please try again.!',
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
            $category = Category::findOrFail($id);
            $subCategory = SubCategory::where('category_id', $category->id)->count();
            if ($subCategory > 0) {
                return response()->json([
                    'code' => 500,
                    'message' => 'Category has sub-category. Please delete sub-category first.'
                ], 500);
            } else {
                $category->delete();
                DB::commit();
                return response()->json([
                    'code' => 200,
                    'message' => 'Category deleted successfully.'
                ], 200);
            }
        } catch (\Exception $e) {
            // Handle the exception
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Failed to delete category. Please try again.'
            ], 500);
        }
    }

    /**
     * Change category status
     */
    public function changeStatus(Request $request)
    {
        DB::beginTransaction();
        try {
            $category = Category::findOrFail($request->id);
            $category->status = $request->status;
            $category->save();

            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Category status updated successfully.'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => 'Failed to update category status. Please try again.'
            ], 500);
        }
    } 
}
