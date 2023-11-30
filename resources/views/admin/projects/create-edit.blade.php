@extends("layouts.admin")

@section("content")

    <h1 class="mb-4">{{ $name }}</h1>
    <form action="{{ $route }}" method="POST" >
        @csrf
        @method($method)
        <div class="mb-3">
            <label for="name" class="form-label">Titolo</label>
            <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ old("name", $project?->name) }}">
            @error("name")
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control @error("description") is-invalid @enderror" id="description" rows="3" name="description">{{ old("description",$project?->description)  }}</textarea>
            @error("description")
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="creation_date" class="form-label">Data di creazione</label>
            <input type="text" class="form-control @error("creation_date") is-invalid @enderror" id="creation_date" name="creation_date"value="{{ old("creation_date", $project?->creation_date) }}">
            @error("creation_date")
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Invia</button>
        <button type="reset" class="btn btn-secondary">Annulla</button>
    </form>

@endsection
