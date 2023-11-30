@extends("layouts.admin")

@section("content")

        <h1>{{ $project->name }}</h1>
        <div class="card my-4" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $project->name }}</h5>
                <p class="card-text">{{ $project->description }}</p>
            </div>
            <ul class="list-group list-group-flush">
                @php
                    $date = date_create($project->creation_date);
                @endphp
                <li class="list-group-item"><b>Creato il:</b> {{ date_format($date, "d/m/Y") }}</li>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">X</a>
            </div>
        </div>

@endsection
