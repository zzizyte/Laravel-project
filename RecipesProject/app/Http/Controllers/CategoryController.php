<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index(): View
    {
        // select * from categories
        $categories = Category::all();

        return view('admin/category/index', [
            'categories' => $categories
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $request->validated();

        Category::create($request->all());

        return redirect('categories')
            ->with('success', 'Category created successfully!');
    }

    public function create(Request $request): View|RedirectResponse
    {
        return view('admin/category/create-new');
    }
    public function edit(int $id,Request $request)
    {
        $category = Category::find($id);
        if ($category === null) {
            abort(404);
        }

        if ($request->isMethod('post')) {
            $request->validate(
                ['name' =>'required|max:12']
            );

            $category->fill($request->all());
            $category->is_active = $request->post('is_active', false);
            $category->save();


            return redirect('categories')
            ->with('success', 'Category updated successfully!');
        }
        return view('admin/category/edit-form', [
            'category' => $category]);
    }

    public function delete(int $id)
    {

        $category = Category::find($id);
        if ($category === null) {
            abort(404);
        }
        $category->delete();
        return redirect('categories')->with('success', 'Category deleted successfully!');

    }
}
