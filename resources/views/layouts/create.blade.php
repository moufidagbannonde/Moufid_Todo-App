@extends('\layouts.main')
@push('head')
<title>Add Todo </title>
@endpush

@section('main-section')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-5"> <!-- Margin 5-->
        <div class="h2">Ajouter une tâche</div>
        <a href="{{route("todo.home")}}" class="btn btn-primary btn-lg">Retour</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route("todo.store")}}" method="post">
                @csrf
                <label for="name" class="form-label mt-4">Nom</label>
                <!-- mt-4 = margin 4 -->
                <input type="text" name="name" class = "form-control" id="">
                    <div class="text-danger">
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>
                <label for="description" class="form-label mt-4">Description</label>
                <input type="text" name="description" class = "form-control" id="">
                <div class="text-danger">
                        @error('description')
                            {{$message}}
                        @enderror
                    </div>
                <label for="author" class="form-label mt-4">Auteur</label>
                <input type="text" name="author" class = "form-control" id="">
                <div class="text-danger">
                        @error('author')
                            {{$message}}
                        @enderror
                    </div>
                <label for="date" class="form-label mt-4"> Date</label>
                <input type="date" name="date" class = "form-control" id="">
                <div class="text-danger">
                        @error('date')
                            {{$message}}
                        @enderror
                    </div>
                <button class="btn btn-primary btn-lg mt-4">Ajouter une tâche</button>
            </form>
        </div>
    </div>
</div>

@endsection