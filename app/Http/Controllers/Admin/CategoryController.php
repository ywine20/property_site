<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|min:3|max:255'
        ]);

        Category::create([
            'category_name' => $request->category_name
        ]);

        return redirect('/admin/category')->with('status', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {
        $category = Category::where('id', $category_id)->first();
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        $category = Category::where('id', $category_id)->first();

        return $category;
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validator =  Validator::make($request->all(), [
            'category_name' => 'required|string|min:3|max:255'
        ]);

        if ($validator->fails()) {
            $errorText = $validator->messages()->getMessages();
            return redirect()->back()->with('error', 'Something Wrong');
        } else {
            $category = Category::where('id', $request->category_id)->update([
                'category_name' => $request->category_name,
            ]);
        }

        return redirect('/admin/category')->with('status', 'Category Updated Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        try {
            $category = Category::findOrFail($category_id);

            // Check if any projects are associated with the category
            $projects = Project::where('category_id', $category_id)->exists();
            if ($projects) {
                return response()->json([
                    "status" => 'error',
                    "info" => 'Cannot delete the category because it is associated with one or more projects.'
                ]);
            }

            $category->delete();

            return response()->json([
                "status" => 'status',
                "info" => 'Delete successful'
            ]);
        } catch (QueryException $e) {
            // Handle any database query exceptions
            return response()->json([
                "status" => 'error',
                "info" => 'An error occurred while deleting the category.'
            ]);
        }
    }

    public function multiDelCategory(Request $request)
    {
        $ids = $request->chk;

        // Check if any of the categories are associated with projects
        $associatedCategories = Project::whereIn('category_id', $ids)->pluck('category_id')->toArray();
        if (!empty($associatedCategories)) {
            return redirect()->back()->with('error', 'Cannot delete some categories because they are associated with one or more projects.');
        }

        Category::whereIn('id', $ids)->delete();

        return redirect()->back()->with('status', 'Multiple Delete Successful');
    }
}
