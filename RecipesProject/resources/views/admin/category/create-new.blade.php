@extends('components/adminlayout')

@section('title', 'Create new category')
@section('content')
<h1>Create new category</h1>

@if ($message = Session::get('success'))
    <div>{{$message}}</div>
@endif
<form action="{{url('categories/create_new_category')}}" method="post">
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
    <input type="text" name="name" placeholder="Category name">
    @error('name')
    <div style="color: #b41616">{{$message}}</div>
    @enderror
    <br>
    Enabled? <input type="checkbox" name="is_active" value="1">
        <br>
    <button type="submit">Save</button>
        <a href="{{ url('categories') }}">Cancel</a>
</form>
@endsection
