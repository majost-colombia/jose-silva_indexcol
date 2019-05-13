@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Error</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-success" href="/create_user">Crear usuario</a>
                            <a class="btn btn-success" href="/home">Ver usuarios</a>
                        </div>
                        <div class="alert alert-danger">No ha sido posible editar/elimninar al usuario. @foreach ($errors as $error) {{ $error }} @endforeach</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
