@extends('components/adminlayout')

@section('title', 'Edit ingredient')
@section('content')
<h1>Ingredient "{{ $ingredient->name }}" edit form</h1>

<form action="{{route('ingredient.edit', ['id'=> $ingredient->id]) }}" method="post">


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
    <input type="text" name="name" placeholder="Ingredient name" value="{{ old("name", $ingredient->name) }}"><br>
    Enabled? <input type="checkbox" name="is_active" value="1"
                    @if($ingredient->is_active)checked = 'checked'@endif>
        <br>
    <button type="submit">Save</button>
        <a href="{{ url('ingredients') }}">Cancel</a>
</form>
@endsection
