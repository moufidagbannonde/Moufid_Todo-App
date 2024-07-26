@extends('\layouts.main')
@push('head')
<title>Update Todo</title>
@endpush

@section('main-section')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-5"> <!-- Margin 5-->
        <div class="h2">Modifier ma citation</div>
        <a href="{{route("todo.home")}}" class="btn btn-primary btn-lg">Back</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route("todo.updateData")}}" method="post">
                @csrf
                <label for="" class="form-label mt-4">Nom</label><!-- mt-4 = margin 4 -->
                <input type="text" name="name" class = "form-control" id="" value="{{$todo->name}}">
                <label for="" class="form-label mt-4">Description</label>
                <input type="text" name="description" class = "form-control" id="" value="{{$todo->description}}">
                <label for="author" class="form-label mt-4">Auteur</label>
                <input type="text" name="author" class = "form-control" id="" value="{{$todo->author}}">
                <label for="date" class="form-label mt-4">Date</label>
                <input type="date" name="date" class = "form-control" id="" value="{{$todo->date}}">
                <input type="number" name="id" value="{{$todo->id}}" hidden>
                <button class="btn btn-primary btn-lg mt-4">Sauvegarder mes modifications</button>
            </form>
        </div>
    </div>
</div>

@endsection