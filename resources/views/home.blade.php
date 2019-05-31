@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
          <div class="col-md-6 col-xs-12">
            <div class="">
              <label for="">Cicuito - <i>8</i></label><br>
              <label for="">Municipio - <i>Garupa</i></label>
            </div>
          </div>
          <div class="col-md-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Votantes</span>
                <span class="info-box-number">{{ $result }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        <div class="col-md-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>900 - FRENTE RENOVADOR DE LA CONCORDIA</strong></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif



                    @foreach ($sublemas as $sublema)
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-red"><i class="fa">{{ $sublema['letra'] }}</i></span>
                          <div class="info-box-content">
                            <span class="info-box-text text-blue"><strong>{{ $sublema['nombre'] }}</strong></span>
                            <span class="info-box-number">{{ $sublema['votos'] }} ({{ $sublema['porc'] }}) </span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>

                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
