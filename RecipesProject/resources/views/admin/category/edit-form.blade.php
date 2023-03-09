@extends('components/adminlayout')

@section('title', 'Edit category')
@section('content')

<h1>Category "{{ $category->name }}" edit form</h1>

<form action="{{route('category.edit', ['id'=> $category->id]) }}" method="post">


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
    <input type="text" name="name" placeholder="Category name" value="{{ old("name", $category->name) }}"><br>
    Enabled? <input type="checkbox" name="is_active" value="1"
                    @if($category->is_active)checked = 'checked'@endif>
        <br>
    <button type="submit">Save</button>
        <a href="{{ url('categories') }}">Cancel</a>
</form>
@endsection
