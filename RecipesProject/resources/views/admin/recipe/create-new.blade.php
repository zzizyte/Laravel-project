@extends('components/adminlayout')

@section('title', 'Create new recipe')
@section('content')
<h1>Create new recipe</h1>

@if ($message = Session::get('success'))
    <div>{{$message}}</div>
@endif
<form action="{{url('recipes/create_new_recipe')}}" method="post">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @csrf
        <label for="name">Recipe name: </label>
        <input type="text" name="name" placeholder="Recipe name">
    @error('name')
    <div style="color: #b41616">{{$message}}</div>
    @enderror
        <br>
        <label for="description">Description: </label>
        <textarea name="description" id="description"></textarea>
        <br>
        Enabled? <input type="checkbox" name="is_active" value="1">
        <br>

        <label for="image">Image</label>
        <input type="text" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">
        @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>

        <label for="category_id">Choose a category: </label>
        <select name="category_id" id="category_id" class="form-control @error('ingredients') is-invalid @enderror">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('ingredients')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>

    <button type="submit">Save</button>
        <a href="{{ url('recipes') }}">Cancel</a>
</form>
@endsection
