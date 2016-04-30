@extends('layout')

@section('content')

<h2>Registro Empresas</h2>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Datos</h3>
  </div>
  <div class="panel-body">
    {!! Form::open(array('id'=>'formStorage','route' => ['upload-file'],'method'=>'POST','files' => true, 'enctype'=>'multipart/form-data')) !!}
    <div class="row">
  		<h4>
  		  {!! Form::label('file', 'Nombre',array('class' => 'label label-default col-md-2')); !!}
  	      {!! Form::file('file',null,array('id'=>'file','class'=>'col-md-2 campoIngreso')); !!}
  	      {!! Form::submit('Click Me!') !!}
  	  </h4>
    </div>
	{!! Form::close() !!}
  </div>
</div>

@endsection