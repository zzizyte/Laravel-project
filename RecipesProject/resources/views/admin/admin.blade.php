@extends('components.adminlayout')

@section('title', 'Admin')
@section('header')@endsection
@section('content')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top"
                             src="https://wellseek.co/wp-content/uploads/2019/06/eating-1000x600.jpg" alt="Recipes">
                        <div class="card-body">
                            <a href="{{ url('recipes') }}" style="text-decoration: none">
                                <h4 style="color: black; text-align: center;">
                                    Recipes
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top"
                             src="https://cdn.sanity.io/images/0vv8moc6/physpractice/1c651ef0bbbc9d0c9168c9591f09d8dd758335ae-1000x600.png?fit=crop&auto=format"
                             alt="Ingredients">
                        <div class="card-body">
                            <a href="{{ url('ingredients') }}" style="text-decoration: none">
                                <h4 style="color: black; text-align: center;">
                                    Ingredients
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top"
                             src="https://www.diabetes.co.uk/wp-content/uploads/2019/01/Food-4-1000x600.jpg"
                             alt="Categories">
                        <div class="card-body">
                            <a href="{{ url('categories') }}" style="text-decoration: none">
                                <h4 style="color: black; text-align: center;">
                                    Categories
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer')@endsection
