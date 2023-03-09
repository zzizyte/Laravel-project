<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngredientRequest;
use App\Models\Ingredient;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index(): View
    {

        $ingredients = Ingredient::all();

        return view('admin/ingredient/index', [
            'ingredients' => $ingredients
        ]);
    }

    public function store(StoreIngredientRequest $request)
    {
        $request->validated();

        Ingredient::create($request->all());

        return redirect('ingredients')
            ->with('success', 'Ingredient created successfully!');
    }

    public function create(Request $request): View|RedirectResponse
    {
        return view('admin/ingredient/create-new');
    }
    public function edit(int $id,Request $request)
    {
        $ingredient = Ingredient::find($id);
        if ($ingredient === null) {
            abort(404);
        }

        if ($request->isMethod('post')) {
            $request->validate(
                ['name' =>'required|max:12']
            );

            $ingredient->fill($request->all());
            $ingredient->is_active = $request->post('is_active', false);
            $ingredient->save();


            return redirect('ingredients')
                ->with('success', 'Ingredient updated successfully!');
        }
        return view('admin/ingredient/edit-form', [
            'ingredient' => $ingredient]);
    }

    public function delete(int $id)
    {

        $ingredient = Ingredient::find($id);
        if ($ingredient === null) {
            abort(404);
        }
        $ingredient->delete();
        return redirect('ingredients')->with('success', 'Ingredient deleted successfully!');

    }
}
