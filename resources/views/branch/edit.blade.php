@extends('layout')

@section('content')

<h2>Editar datos sucursal {{$branch->name}} de la empresa {{$branch->company->name}}</h2>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Datos</h3>
  </div>
  <div class="panel-body">
  	{!! Form::open(array('id'=>'formBranch','route' => ['update-branch',$branch->id],'method'=>'POST')) !!}
    	{!! Form::hidden('company_id',$branch->company->id,array('id'=>'company_id')); !!}
    <h4 class="row">
    	{!! Form::label('name', 'Nombre',array('class' => 'label label-default col-md-4')); !!}
    	{!! Form::text('name',$branch->name,array('id'=>'name','class'=>'col-md-4 campoIngreso')); !!}
    </h4>
    <h4 class="row">
    	{!! Form::label('address', 'Direccion',array('class' => 'label label-default col-md-4')); !!}
    	{!! Form::text('address',$branch->address,array('id'=>'address','class'=>'col-md-4 campoIngreso')); !!}
    </h4>
    <h4 class="row">
    	{!! Form::label('city', 'Ciudad',array('class' => 'label label-default col-md-4')); !!}
    	{!! Form::text('city',$branch->city,array('id'=>'city','class'=>'col-md-4 campoIngreso')); !!}
    </h4>
    <h4 class="row">
    	{!! Form::label('phone1', 'Telefono 1',array('class' => 'label label-default col-md-4')); !!}
    	{!! Form::text('phone1',$branch->phone1,array('id'=>'phone1','class'=>'col-md-4 campoIngreso')); !!}
    </h4>
    <h4 class="row">
    	{!! Form::label('phone2', 'Telefono 2',array('class' => 'label label-default col-md-4')); !!}
    	{!! Form::text('phone2',$branch->phone2,array('id'=>'phone2','class'=>'col-md-4 campoIngreso')); !!}
    </h4>

    <button type="button" class="btn btn-primary" id="btnSave">Guardar</button>
    <button type="button" class="btn btn-default" id="btnback">Volver</button>
	{!! Form::close() !!}
  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/editBranch.js')}}"></script>

@endsection
