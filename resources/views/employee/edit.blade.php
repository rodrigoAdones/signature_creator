@extends('layout')

@section('content')

<h2>Editar datos de {{$employee->name}}</h2>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Datos</h3>
  </div>
  <div class="panel-body">
  	{!! Form::open(array('id'=>'formEmployee','route' => ['update-employee',$employee->id],'method'=>'POST')) !!}
    	{!! Form::hidden('company_id',$employee->company->id,array('id'=>'company_id')); !!}
    <h4 class="row">
    	{!! Form::label('name', 'Nombre',array('class' => 'label label-default col-md-4')); !!}
    	{!! Form::text('name',$employee->name,array('id'=>'name','class'=>'col-md-4 campoIngreso')); !!}
    </h4>
    <h4 class="row">
    	{!! Form::label('department', 'Area/Departamento',array('class' => 'label label-default col-md-4')); !!}
    	{!! Form::text('department',$employee->department,array('id'=>'department','class'=>'col-md-4 campoIngreso')); !!}
    </h4>
    <h4 class="row">
    	{!! Form::label('position', 'Cargo',array('class' => 'label label-default col-md-4')); !!}
    	{!! Form::text('position',$employee->position,array('id'=>'position','class'=>'col-md-4 campoIngreso')); !!}
    </h4>
    <h4 class="row">
    	{!! Form::label('annex', 'Anexo Telefonico',array('class' => 'label label-default col-md-4')); !!}
    	{!! Form::text('annex',$employee->annex,array('id'=>'annex','class'=>'col-md-4 campoIngreso')); !!}
    </h4>
    <h4 class="row">
    	{!! Form::label('email', 'Email',array('class' => 'label label-default col-md-4')); !!}
    	{!! Form::email('email',$employee->email,array('id'=>'email','class'=>'col-md-4 campoIngreso')); !!}
    </h4>
    <h4 class="row">
    	{!! Form::label('branch_id', 'Sucursal',array('class' => 'label label-default col-md-4')); !!}
    	<select name="branch_id" id="branch_id" class="col-md-4">
    		<option value=""></option>
    		@foreach($employee->company->branches as $branch)
    			@if($branch->id == $employee->branch->id)
    		<option value="{{$branch->id}}" selected>
    			{{$branch->name}}
    		</option>
    			@else
    		<option value="{{$branch->id}}">
    			{{$branch->name}}
    		</option>
    			@endif
    		@endforeach
    	</select>
    </h4>
    <button type="button" class="btn btn-primary" id="btnSave">Guardar</button>
    <button type="button" class="btn btn-default" id="btnback">Volver</button>
	{!! Form::close() !!}
  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/editEmployee.js')}}"></script>

@endsection