@extends('\layouts.main') <!-- Extending layout\main -->

@push('head')
    <!—we have created a stack and pushing this header information-->
        <title>Moufid-App Citations </title>
@endpush

    @section('main-section')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-5">
            <!—flex-direction view with Margin 5-->
                <div class="h2">Liste de citations</div>
                <a href="{{route("todo.create")}}" class="btn btn-primary btn-lg">Ajouter une citation</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <!-- {{print_r($todos)}} -->
        <table class="table table-stripped table-dark">
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Auteur</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            @foreach($todos as $todo)
                <tr valign="middle">
                    <td>
                    {{$todo->name}}
                </td>
                    <td>
                        "{{$todo->description}}"
                    </td>
                    <td>
                    {{$todo->author}}
                </td>
                    <td>
                    {{$todo->date}}
                </td>
                    <td>
                        <a href="{{route("todo.edit", $todo->id)}}" class="btn btn-success btn-sm">Modifier</a>
                        <a href="{{route("todo.delete", $todo->id)}}" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
            @endforeach  
        </table>
    </div>

    @endsection