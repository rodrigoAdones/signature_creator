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

@endsection