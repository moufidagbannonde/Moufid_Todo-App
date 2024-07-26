<div class="mt-3">
    The whole future lies in uncertainty: live immediately. - Seneca
</div>

@extends('layouts.main')
@section('title', 'Register')
@section('login')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h3 class="text-center">Se connecter</h3>
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{old('email')}}" required>
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                    value="{{old('password')}}" required>
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Me connecter</button>
        </form>
        <p class="mt-3">
            Vous n'aviez pas de compte ?
            <a href="{{route('register')}}"> S'inscrire </a>
        </p>
    </div>
</div>

@endsection
