@extends(Auth::check() ? 'components.adminlayout' : 'components.layout')

@section('title', $recipe->name)
@section('content')

    <div class="col-md-12">
        <div class="card flex-md-row mb-4 mt-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-primary">{{ $recipe->category->name }}</strong>
                <h2 class="mb-0">
                    {{ $recipe->name }}
                </h2>
                <div class="mb-1 text-muted"> Ingredients: @foreach($recipe->ingredients as $ingredient)
                        <li> {{$ingredient->name}}</li>
                    @endforeach</div>
                <p class="card-text mb-auto">{{ $recipe->description }}</p>

            </div>
            @if ($recipe->image)
                <img src="{{ asset($recipe->image) }}" alt="{{ $recipe->name }}">
            @endif
        </div>
    </div>

@endsection
