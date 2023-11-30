@extends("layouts.admin")

@section("content")

    <div class="container my-3">
        <h1>Lista Tecnologie</h1>
        <div class="w-50 my-3">

            @if(session("error"))
                <div class="alert alert-danger" role="alert">
                    {{session("error")}}
                </div>
            @endif

            @if(session("success"))
                <div class="alert alert-success" role="alert">
                    {{session("success")}}
                </div>
            @endif

            <form action="{{ route("admin.tecnologies.store") }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nuova tecnologia" name="name">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Crea</button>
                </div>
            </form>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tecnologies as $tecnology)
                        <tr>
                            <td>{{ $tecnology->id }}</td>
                            <td>{{ $tecnology->name }}</td>
                            <td>
                                @include("admin.partials.form-delete",[
                                    "route" => route("admin.tecnologies.destroy", $tecnology),
                                    "message" => "Sei sicuro di voler eliminare questa tecnologia?"
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection
