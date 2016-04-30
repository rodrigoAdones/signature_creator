@extends('layout')

@section('content')

<h2>Registro Empresas</h2>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Datos</h3>
  </div>
  <div class="panel-body">
    {!! Form::open(array('id'=>'formCompany','route' => ['save-company'],'method'=>'POST')) !!}
    <div class="row">
  		<h4>
  		    {!! Form::label('name', 'Nombre',array('class' => 'label label-default col-md-2')); !!}
  	      {!! Form::text('name',null,array('id'=>'name','class'=>'col-md-2 campoIngreso')); !!}
  	  </h4>
    </div>
	  {!! Form::close() !!}
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Empresas</h3>
  </div>
  <div class="panel-body">
    <table class="table table-hover">
      <thead>
        <th>Nombre</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($companies as $company)
        <tr>
          <th>{{$company->name}}</th>
          <th>
            <a href="{{ route('list-of-employees',[$company->alias,$company->id])}}" class="btn btn-primary">Empleados</a>
            <a href="{{ route('list-of-branches',[$company->alias,$company->id])}}" class="btn btn-warning">Sucursales</a>
            <a href="{{ route('image',[$company->alias,$company->id])}}" class="btn btn-success">Imagen</a>
          </th>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection