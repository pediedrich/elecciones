<form class="form-horizontal" action="{{ route('saveVotes') }}" method="POST">
  {{ csrf_field() }}
  <div class="box-body">
    <table class="table table-striped">
      <tbody>
        @foreach ($lemas as $lema)
          <tr style="background:lightblue">
            <td></td>
            @foreach ($charges as $charge)
              @if ($charge->level == 1)
                <td><strong>{{ $charge->name }}</strong></td>
              @endif
            @endforeach
          </tr>
          <tr>
            <td><strong>{{ $lema->number }} - {{ $lema->name }}</strong></td>
            @foreach ($charges as $charge)
              @if ($charge->level == 1)
                <td> <input class="form-control" type="text" name="lemas[{{$lema->id}}][{{$charge->id}}]" value=""> </td>
              @endif
            @endforeach
          </tr>
          <tr style="background:lightblue">
            <td></td>
            @foreach ($charges as $charge)
              @if ($charge->level == 2)
                <td><strong>{{ $charge->name }}</strong></td>
              @endif
            @endforeach
          </tr>
          @foreach ($lema->sublemas() as $sublema)
            <tr>
              <td>{{ $sublema->letter }} - {{ $sublema->name }}</td>
              @foreach ($charges as $charge)
                @if ($charge->level == 2)
                  <td> <input class="form-control" type="text" name="sublemas[{{$sublema->id}}][{{$charge->id}}]" id="cargo_id_{{$lema->id}}_{{$charge->id}}" value=""> </td>
                @endif
              @endforeach
            </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>

    <table class="table table-striped">
      <tbody>
        <tr>
          <td>
            <label for="">Votos en Blanco</label>
          </td>
          <td>
            <input type="text" name="blank_votes" value="">
          </td>
        </tr>
        <tr>
          <td>
            <label for="">Votos Nulos</label>
          </td>
          <td>
            <input type="text" name="null_votes" value="">
          </td>
        </tr>
        <tr>
          <td>
            <label for="">Votos Totales</label>
          </td>
          <td>
            <input type="text" name="total_votes" value="">
            <input type="hidden" name="table_id" value="{{ $table_id }}">
          </td>
        </tr>
      </tbody>
    </table>

  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" onclick= "return confirm('CONTROLE BIEN LOS DATOS \n SI CONFIRMA SE CIERRA LA MESA .-?')" class="btn btn-block btn-info pull-right">Cargar</button>
  </div>
  <!-- /.box-footer -->
</form>
