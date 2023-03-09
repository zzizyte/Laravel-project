@extends('components/adminlayout')

@section('title', 'Edit recipe')
@section('content')
    <h1>Recipe {{ $recipe->name }} edit form</h1>

    <form action="{{route('recipe.edit', ['id'=> $recipe->id]) }}" method="post">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf
            <label for="name">Recipe name: </label>
            <input type="text" name="name" placeholder="Recipe name" value="{{ old("name", $recipe->name) }}">
            <br>
            <br>
            <label for="description">Description: </label>
            <textarea name="description" id="description" rows="10" cols="50">{{ $recipe->description }}</textarea>
            <br>
            Enabled? <input type="checkbox" name="is_active" value="1"
                            @if($recipe->is_active)checked = 'checked'@endif>
            <br>

             <button type="submit">Save</button>
            <a href="{{ url('recipes') }}">Cancel</a>
@endsection
