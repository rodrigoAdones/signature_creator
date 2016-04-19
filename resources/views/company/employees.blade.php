@extends('layout')

@section('content')

<h2>Empleados de {{$company->name}}</h2>

<h3>
	<a href="" class="btn btn-success">+ Empleado</a>
</h3>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Lista Empleados</h3>
  </div>
  <div class="panel-body">
    <table class="table table-hover">
      <thead>
        <th>Nombre</th>
        <th>Departamanto/Area</th>
        <th>Cargo</th>
        <th>Anexo</th>
        <th>Email</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($company->employees as $employee)
        <tr>
          <th>{{$employee->name}}</th>
          <th>{{$employee->deparment}}</th>
          <th>{{$employee->position}}</th>
          <th>{{$employee->annex}}</th>
          <th>{{$employee->email}}</th>
          <th></th>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection