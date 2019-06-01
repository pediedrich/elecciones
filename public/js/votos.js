function loadCertificate(t){
  var table_id = t.value;
  $.get('/mesas/votos/cargar/certificado?table_id='+table_id,function(data){
    $("#certificate").html(data);
    //alert('hola');
  });
}
