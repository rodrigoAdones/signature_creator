@extends('layout')

@section('content')

<h2>Sucursales de {{$company->name}}</h2>

<h3>
	<a href="" class="btn btn-success" id="btnAdd">+ Sucursal</a>
</h3>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Lista Sucursales</h3>
  </div>
  <div class="panel-body">
    <table class="table table-hover">
      <thead>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Direccion</th>
        <th>Ciudad</th>
        <th>Telefono 1</th>
        <th>Telefono 2</th>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modalEmployee">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection


@section('scripts')
<script src="{{ asset('js/employees.js')}}"></script>

@endsection