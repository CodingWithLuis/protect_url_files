@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        Nombre:
                        <br>
                        <input type="text" name="name" class="form-control">

                        <br>

                        Foto:
                        <br>
                        <input type="file" name="photo">

                        <br><br>

                        <input type="submit" value="Guardar" class="btn btn-primary">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
