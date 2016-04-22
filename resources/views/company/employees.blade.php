@extends('layout')

@section('content')

<h2>Empleados de {{$company->name}}</h2>

<h3>
	<a href="" class="btn btn-success" id="btnAdd">+ Empleado</a>
</h3>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Lista Empleados</h3>
  </div>
  <div class="panel-body">
  	<input type="hidden" id="rutaEdicion" value="{{ route('edit-employee',':ID')}}">
    <table class="table table-hover" id="allEmployees">
      <thead>
      	<tr>
	        <th>Nombre</th>
	        <th>Departamanto/Area</th>
	        <th>Cargo</th>
	        <th>Anexo</th>
	        <th>Email</th>
	        <th>Sucursal</th>
	        <th></th>
      	</tr>
      </thead>
      <tbody>
        @foreach($company->employees as $employee)
        <tr>
          <th>{{$employee->name}}</th>
          <th>{{$employee->department}}</th>
          <th>{{$employee->position}}</th>
          <th>{{$employee->annex}}</th>
          <th>{{$employee->email}}</th>
          <th>{{$employee->branch->name}}</th>
          <th>
          	<a href="" class="btn btn-success editEmployee" data-id="{{$employee->id}}">
        		Editar
        	</a>
          </th>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalEmployee">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar Empleado</h4>
      </div>
      <div class="modal-body">
      	<div class="panel panel-default">
      		<div class="panel-body">
	        {!! Form::open(array('id'=>'formEmployee','route' => ['save-employee'],'method'=>'POST')) !!}
	        	{!! Form::hidden('company_id',$company->id,array('id'=>'company_id')); !!}
	        <h4 class="row">
	        	{!! Form::label('name', 'Nombre',array('class' => 'label label-default col-md-4')); !!}
	        	{!! Form::text('name',null,array('id'=>'name','class'=>'col-md-4 campoIngreso')); !!}
	        </h4>
	        <h4 class="row">
	        	{!! Form::label('department', 'Area/Departamento',array('class' => 'label label-default col-md-4')); !!}
	        	{!! Form::text('department',null,array('id'=>'department','class'=>'col-md-4 campoIngreso')); !!}
	        </h4>
	        <h4 class="row">
	        	{!! Form::label('position', 'Cargo',array('class' => 'label label-default col-md-4')); !!}
	        	{!! Form::text('position',null,array('id'=>'position','class'=>'col-md-4 campoIngreso')); !!}
	        </h4>
	        <h4 class="row">
	        	{!! Form::label('annex', 'Anexo Telefonico',array('class' => 'label label-default col-md-4')); !!}
	        	{!! Form::text('annex',null,array('id'=>'annex','class'=>'col-md-4 campoIngreso')); !!}
	        </h4>
	        <h4 class="row">
	        	{!! Form::label('email', 'Email',array('class' => 'label label-default col-md-4')); !!}
	        	{!! Form::email('email',null,array('id'=>'email','class'=>'col-md-4 campoIngreso')); !!}
	        </h4>
	        <h4 class="row">
	        	{!! Form::label('branch_id', 'Sucursal',array('class' => 'label label-default col-md-4')); !!}
	        	<select name="branch_id" id="branch_id" class="col-md-4">
	        		<option value=""></option>
	        		@foreach($company->branches as $branch)
	        		<option value="{{$branch->id}}">{{$branch->name}}</option>
	        		@endforeach
	        	</select>
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

<template id="rowEmployee">
	<tr>
        <th>:NOMBRE</th>
        <th>:DEPARTMENT</th>
        <th>:POSITION</th>
        <th>:ANNEX</th>
        <th>:EMAIL</th>
        <th>:BRANCH</th>
        <th>
        	<a href="" data-id=":ID" class="btn btn-success editEmployee">
        		Editar
        	</a>
        </th>
  	</tr>
</template>

@endsection


@section('scripts')
<script src="{{ asset('js/employees.js')}}"></script>

@endsection