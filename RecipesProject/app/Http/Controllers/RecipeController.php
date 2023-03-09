<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeRequest;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class RecipeController extends Controller
{

    public function index(): View
    {
        $recipes = Recipe::all();
        return view('admin/recipe/index', ['recipes' => $recipes]);
    }
    public function show($id):View
    {
        $recipe = Recipe::find($id);
        return view('admin/recipe/show', ['recipe' => $recipe]);
    }
    public function home():View
    {
        $recipes = Recipe::paginate(10);
        return view('front/index', ['recipes' => $recipes]);
    }
    public function home_show($id):View
    {
        $recipe = Recipe::find($id);
        return view('front/show', ['recipe' => $recipe]);
    }

    public function create():View|RedirectResponse
    {
        $recipes = Recipe::all();
        $categories = Category::all();
        return view('admin/recipe/create-new', ['recipes' => $recipes, 'categories' => $categories]);
    }


    public function store(StoreRecipeRequest $request): RedirectResponse
    {
        $request->validated();

        Recipe::create($request->all());

        return redirect('recipes')
            ->with('success', 'Recipe created successfully!');
    }

    public function edit(int $id,Request $request)
    {
        $recipe = Recipe::find($id);
        if ($recipe === null) {
            abort(404);
        }

        if ($request->isMethod('post')) {
            $request->validate(
                ['name' =>'required|max:12']
            );

            $recipe->fill($request->all());
            $recipe->is_active = $request->post('is_active', false);
            $recipe->save();


            return redirect('recipes')
                ->with('success', 'Recipe updated successfully!');
        }
        return view('admin/recipe/edit-form', [
            'recipe' => $recipe]);
    }

    public function delete(int $id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();

        return redirect('recipes')->with('success', 'Recipe was removed successfully!');
    }

}
