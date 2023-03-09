@extends('components/adminlayout')

@section('title', 'Recipes')
@section('content')

    <h1>Recipes</h1>
    <div class="row">
        <div class="col">
            <a href="{{ url('recipes/create_new_recipe') }}" class="btn btn-primary">Create new recipe</a>
        </div>
    </div>

    <table class="table">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Active?</th>
            <th scope="col">Ingredients</th>
            <th scope="col">Image</th>
            <th scope="col" width="100">Edit</th>
            <th scope="col" width="100">Delete</th>
            <th scope="col" width="100"></th>
        </tr>



        @foreach($recipes as $recipe)
            <tr>
                <td scope="col">
                <a href="{{ url('show',  ['id' => $recipe->id]) }}" style="text-decoration-color: black">
                    <p class="card-text" style="color: black">
                        {{$recipe->name}}
                    </p>
                </a></td>


                <td scope="col">{{$recipe->category->name}}</td>
                <td>{{ $recipe->is_active ? 'Yes': 'No'}}</td>
                <td>@foreach($recipe->ingredients as $ingredient)
                        <li> {{$ingredient->name}}</li>
                    @endforeach</td>
                <td> @if($recipe->image)
                        <img src="{{ $recipe->image }}" alt="{{ $recipe->name }}" style="max-width: 300px; max-height: 300px;">
                    @endif</td>
                <td> <a href="{{route('recipe.edit', ['id'=> $recipe->id]) }}" class="btn btn-outline-primary">Edit</a></td>
                <td scope="col"><form action="{{route('recipe.delete', ['id'=> $recipe->id]) }}" method="post" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form></td>
            </tr>
        @endforeach
    </table>

@endsection
