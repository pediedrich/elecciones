@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="row">
        {{-- <div class="col-md-12 col-xs-12">
            <a class="btn btn-primary pull-right" href="">Nuevo<span class=""></span></a>
        </div>
        <hr> --}}
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Carga de Votos</h3>
            </div>

            <div class="box-body">
              <label class="col-sm-2 control-label">Seleccionar Mesa</label>
              <div class="col-xs-12 col-sm-6 col-md-3">
                <select class="form-control" id="table_id" name="table_id">
                  @foreach ($schools as $school)
                    <optgroup label="{{ $school->name }}">
                      @foreach ($school->tables as $table)
                        <option value="{{ $table->id }}">{{ $table->number }}</option>
                      @endforeach
                    </optgroup>
                  @endforeach
                </select>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="certificado-carga"></div>

            <form class="form-horizontal" action="" method="POST">
              {{ csrf_field() }}
              <div class="box-body">


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Cargar</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

      </div>
  </div>

@endsection
