@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12">
            <a class="btn btn-primary pull-right" href="">Nuevo<span class=""></span></a>
        </div>
        <hr>
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Cargos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tbody>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre</th>
                    <th style="width: 40px">Acciones</th>
                  </tr>
                  @foreach ($charges as $charge)
                  <tr>
                    <td>{{ $charge->id }}</td>
                    <td>{{ $charge->name }}</td>
                    <td>Editar</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              {{ $charges->links() }}
      </div>
  </div>

@endsection
