@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar usuario</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-success" href="create_user">Crear usuario</a>
                        </div>
                    </div>
                        <form action="/save_user/{{ $user->id}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{  $user->name }}" required pattern="[a-zA-Z\s]+">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Apellido</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" value="{{  $user->lastname }}" required pattern="[a-zA-Z\s]+">
                            </div>
                            <div class="form-group">
                                <label for="tel">Teléfono</label>
                                <input type="number" class="form-control" name="tel" id="tel" value="{{  $user->tel }}" maxlength="10" pattern="[0-9]{10}">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{  $user->email }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Guardar">
                            </div>
                            @csrf
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
