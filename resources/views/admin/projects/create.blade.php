@extends("layouts.admin")

@section("content")

    <h1 class="mb-4">Crea un nuovo progetto</h1>
    <form action="{{ route("admin.projects.store") }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="creation_date" class="form-label">Data di creazione</label>
            <input type="text" class="form-control" id="creation_date" name="creation_date">
        </div>

        <button type="submit" class="btn btn-primary">Invia</button>
        <button type="reset" class="btn btn-secondary">Annulla</button>
    </form>

@endsection
