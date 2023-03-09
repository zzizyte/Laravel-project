@extends('components/adminlayout')

@section('title', 'Create new ingredient')
@section('content')
<h1>Create new ingredient</h1>

@if ($message = Session::get('success'))
    <div>{{$message}}</div>
@endif
<form action="{{url('ingredients/create_new_ingredient')}}" method="post">
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
    <input type="text" name="name" placeholder="Ingredient name">
    @error('name')
    <div style="color: #b41616">{{$message}}</div>
    @enderror
        <br>
        Enabled? <input type="checkbox" name="is_active" value="1">
        <br>
        <button type="submit">Save</button>
        <a href="{{ url('ingredients') }}">Cancel</a>
</form>
@endsection
