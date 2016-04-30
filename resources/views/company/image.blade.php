@extends('layout')

@section('content')

<h2>Imagen de Fondo</h2>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Subir Imagen</h3>
  </div>
  <div class="panel-body">
    {!! Form::open(array('id'=>'formStorage','route' => ['upload-image',$company->id],'method'=>'POST','files' => true, 'enctype'=>'multipart/form-data')) !!}
    <div class="row">
  		<h4>
  		  {!! Form::label('file', 'Nombre',array('class' => 'label label-default col-md-2')); !!}
  	      {!! Form::file('file',null,array('id'=>'file','class'=>'col-md-2 campoIngreso')); !!}
  	      {!! Form::submit('Subir') !!}
  	  </h4>
    </div>
	{!! Form::close() !!}
  </div>
</div>
@if($img)
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Imagen Actual</h3>
  </div>
  <div class="panel-body">
    <img src="{{route('show-background',$company->id)}}" alt="Background">
  </div>
</div>
@endif
@endsection