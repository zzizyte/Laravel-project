@extends('components/adminlayout')

@section('title',  $recipe->name)
@section('content')


<div class="col-md-12">
    <div class="mb-4 mt-4 ">
        <div class="card-body d-flex flex-column align-items-start">
            @if ($recipe->image)
                <img src="{{ asset($recipe->image) }}" alt="{{ $recipe->name }}">
            @endif
            <strong class="">{{ $recipe->category->name }}</strong>
            <h2 class="mb-0">
                {{ $recipe->name }}
            </h2>
            <div class="mb-1 text-muted"> Ingredients: @foreach($recipe->ingredients as $ingredient)
                    <li> {{$ingredient->name}}</li>
                @endforeach</div>
            <p class="card-text mb-auto">{{ $recipe->description }}</p>

        </div>

    </div>
</div>

@endsection
