@extends('layout')

@section('content')
<input type="hidden" name="edit-route" id="edit-route" value="{{route('edit-branch',[':SLUG',':ID'])}}">

<h2>Sucursales de {{$company->name}}</h2>

<h3>
	<a href="" class="btn btn-success" id="btnAdd">+ Sucursal</a>
</h3>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Lista Sucursales</h3>
  </div>
  <div class="panel-body">
    <table class="table table-hover" id="allBranches">
      <thead>
      	<tr>
	        <th>Nombre</th>
	        <th>Tipo</th>
	        <th>Direccion</th>
	        <th>Ciudad</th>
	        <th>Telefono 1</th>
	        <th>Telefono 2</th>
	        <th></th>
      	</tr>
      </thead>
      <tbody>
        @foreach($company->branches as $branch)
        <tr>
          <th>{{$branch->name}}</th>
          <th>{{$branch->type}}</th>
          <th>{{$branch->address}}</th>
          <th>{{$branch->city}}</th>
          <th>{{$branch->phone1}}</th>
          <th>{{$branch->phone2}}</th>
          <th>
						<a href="" class="btn btn-success editBranch" data-id="{{$branch->id}}" data-company-slug="{{$company->alias}}">
        		  Editar
        	  </a>
          </th>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalBranch">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar Sucursal</h4>
      </div>
      <div class="modal-body">
      	<div class="panel panel-default">
      		<div class="panel-body">
	        {!! Form::open(array('id'=>'formBranch','route' => ['save-branch'],'method'=>'POST')) !!}
	        	{!! Form::hidden('company_id',$company->id,array('id'=>'company_id')); !!}
	        <h4 class="row">
	        	{!! Form::label('name', 'Nombre',array('class' => 'label label-default col-md-2')); !!}
	        	{!! Form::text('name',null,array('id'=>'name','class'=>'col-md-4 campoIngreso')); !!}
	        </h4>
	        <h4 class="row">
	        	{!! Form::label('address', 'Direccion',array('class' => 'label label-default col-md-2')); !!}
	        	{!! Form::text('address',null,array('id'=>'address','class'=>'col-md-4 campoIngreso')); !!}
	        </h4>
	        <h4 class="row">
	        	{!! Form::label('city', 'Ciudad',array('class' => 'label label-default col-md-2')); !!}
	        	{!! Form::text('city',null,array('id'=>'city','class'=>'col-md-4 campoIngreso')); !!}
	        </h4>
	        <h4 class="row">
	        	{!! Form::label('phone1', 'Telefono 1',array('class' => 'label label-default col-md-2')); !!}
	        	{!! Form::text('phone1',null,array('id'=>'phone1','class'=>'col-md-4 campoIngreso')); !!}
	        </h4>
	        <h4 class="row">
	        	{!! Form::label('phone2', 'Telefono 2',array('class' => 'label label-default col-md-2')); !!}
	        	{!! Form::text('phone2',null,array('id'=>'phone2','class'=>'col-md-4 campoIngreso')); !!}
	        </h4>

      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnSave">Guardar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
      {!! Form::close() !!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<template id="rowBranch">
	<tr>
        <th>:NOMBRE</th>
        <th>:TIPO</th>
        <th>:DIRECCION</th>
        <th>:CIUDAD</th>
        <th>:TELEFONO1</th>
        <th>:TELEFONO2</th>
        <th></th>
  	</tr>
</template>

@endsection

@section('scripts')
<script src="{{ asset('js/branches.js')}}"></script>

@endsection
