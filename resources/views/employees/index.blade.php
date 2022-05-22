@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Nuevo empleado</a>

                    <table class="table table-bordered" id="user_table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <td>{{$employee->name}}</td>
                                <td>
                                    <a href="{{ asset('storage/app/employees/'.$employee->photo) }}">{{ $employee->photo }}</a>
                                    <br>
                                    <a href="{{ route('employees.download', $employee->uuid) }}">{{ $employee->photo }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
