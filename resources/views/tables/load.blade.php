@extends('layouts.app')

@section('content')
  <script src="{{asset('js/votos.js')}}"></script>
  <div class="container">
      <div class="row">
        {{-- <div class="col-md-12 col-xs-12">
            <a class="btn btn-primary pull-right" href="">Nuevo<span class=""></span></a>
        </div>
        <hr> --}}
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title text-blue">Carga de Votos</h3>
            </div>

            <div class="box-body">
              <label class="col-sm-2 control-label">Seleccionar Mesa</label>
                <select class="form-control" onchange="loadCertificate(this)" id="table_id" name="table_id">
                  @foreach ($schools as $school)
                    <optgroup label="{{ $school->name }}">
                      @foreach ($school->tables as $table)
                        @if (is_null($table->state))
                          <option value="{{ $table->id }}">{{ $table->number }} </option>
                        @endif
                      @endforeach
                    </optgroup>
                  @endforeach
                </select>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <hr style="border:2px solid #00c0ef;border-radius: 35px;">
            <label class="col-md-6 control-label ">Lemas y Sublemas</label>
            <label class="col-md-6 control-label ">Cargos</label>

            <div class="" id="certificate"></div>

          </div>

      </div>
  </div>

@endsection
