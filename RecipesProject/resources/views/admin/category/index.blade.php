@extends('components/adminlayout')

@section('title', 'Categories')
@section('content')
<h1>Categories:</h1>


<div class="row">
    <div class="col">
        <a href="{{ url('categories/create_new_category') }}" class="btn btn-primary">Create new category</a>
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
    @foreach($categories as $category)
        <tr>
            <td scope="row">{{ $category->id }}</td>
            <td scope="col">{{$category->name}}</td>
            <td>{{ $category->is_active ? 'Yes': 'No'}}</td>
            <td> <a href="{{route('category.edit', ['id'=> $category->id]) }}" class="btn btn-outline-primary">Edit</a></td>
            <td>
            <form action="{{route('category.delete', ['id'=> $category->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection
