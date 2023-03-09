@extends('components/adminlayout')

@section('title', 'Ingredients')
@section('content')
<h1>Ingredients:</h1>

<div class="row">
    <div class="col">
        <a href="{{ url('ingredients/create_new_ingredient') }}" class="btn btn-primary">Create new ingredient</a>
    </div>
</div>
    <table class="table">
        <tr>
            <th scope="col" width="100">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Active?</th>
            <th scope="col" width="100">Edit</th>
            <th scope="col" width="100">Delete</th>
        </tr>
    @foreach($ingredients as $ingredient)
            <tr>
                <td scope="row">{{ $ingredient->id }}</td>
                <td scope="col">{{$ingredient->name}}</td>
                <td>{{ $ingredient->is_active ? 'Yes': 'No'}}</td>
                <td><a href="{{route('ingredient.edit', ['id'=> $ingredient->id]) }}" class="btn btn-outline-primary">Edit</a></td>
                <td>
                    <form action="{{route('ingredient.delete', ['id'=> $ingredient->id]) }} " method="post" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                   </form>
                </td>
            </tr>
    @endforeach
    </table>
@endsection

