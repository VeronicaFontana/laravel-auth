@extends("layouts.admin")

@section("content")

    <div class="container my-3">
        <h1>Lista Progetti</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Data di Creazione</th>
                    <th scope="col">Azioni</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->creation_date }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route("admin.projects.show", $project) }}"><i class="fa-solid fa-circle-info"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>



@endsection
