@extends(Auth::check() ? 'components.adminlayout' : 'components.layout')

@section('title', 'Home Page')
@section('header')@endsection
@section('content')


    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach ($recipes as $recipe)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" src="{{ $recipe->image }}" alt="{{ $recipe->name }}">
                            <div class="card-body">
                                <a href="{{ url('show',  ['id' => $recipe->id]) }}" style="text-decoration: none">
                                    <h4 class="card-text" style="color: black; text-align: center;">
                                        {{$recipe->name}}
                                    </h4>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
@section('footer')@endsection
