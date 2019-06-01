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
                <span class="info-box-number">2856</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-12 col-xs-12">
          {{-- por cada lema armo un panel --}}
          @foreach ($d_lemas as $key => $lema)

            <div class="panel panel-primary">
                <div class="panel-heading">
                  <strong>{{ $lema['number'] }} - {{ $lema['name'] }}</strong>
                  @foreach ($lema['charges'] as $lc_key => $l_charge)
                    <span class=" pull-right info-box-label "> <b>{{ strtoupper($l_charge['name']) }}</b> - {{ $l_charge['votes'] }} ({{ $l_charge['porc'] }}) </span><br>
                  @endforeach
                </div>

                <div class="panel-body">

                    @foreach ($lema['sublemas'] as $s_key => $sublema)

                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-red"><i class="fa">{{ $sublema['letter'] }}</i></span>
                          <div class="info-box-content">
                            <span class="info-box-text text-blue"><strong>{{ $sublema['name'] }}</strong> </span>
                            @foreach ($sublema['charges'] as $c_key => $charge)
                              @if (strtolower($charge['name']) == 'intendente')
                                <span class="info-box-label"> <b>{{ strtoupper($charge['name']) }} - {{ $charge['votes'] }} ({{ $charge['porc'] }}) </b></span><br>
                              @else
                                <span class="info-box-label"> {{ $charge['name'] }} - {{ $charge['votes'] }} ({{ $charge['porc'] }}) </span><br>
                              @endif
                            @endforeach
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>

                  @endforeach
                </div>

                {{-- finaliza el body --}}
              </div>
              {{-- finaliza el recorrido de lemas --}}
              @endforeach

        </div>
    </div>
</div>

@endsection
