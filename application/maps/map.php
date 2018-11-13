<?php

  include "../db_connect.php";

mysql_connect($servername, $username, $password);
mysql_select_db($dbname);

$conexao = mysqli_connect($servername, $username, $password);
$banco = mysqli_select_db($conexao,$dbname);
mysqli_set_charset($conexao,'utf8');

  ///////////////////////////////////////////////////////////////////////



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <!--  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?Key=false"></script> AIzaSyCWMfXoGEDtvoGUirAVzsIHKha-pPdMVG4 -->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI3z6A45aCbUrw4gGYfe8XRKl2XxTlboA"></script>
   
<style type="text/css"> 
  a:link 
  { 
  text-decoration:none; 
  } 
</style>

<script>
  function alterar(id){       
    window.open('notas.php?id='+id, 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=50, LEFT=170, WIDTH=480, HEIGHT=380')+id;
  }

</script>

  </head>
  <body>
    <div id="map-canvas">    </div>   
  </body>
</html>


<script type="text/javascript">
  
// Váriáveis necessárias
var map;
var infoWindow;

var markersData = [
<?php 

$localidades = array('ula','ari','spo','rjo','bsa','rpo', 'bsa','rpo','jai','vin', 'cas','soc','bet', 'pms', 'bhe', 'iua','axa','pau'); 

   foreach($localidades as $localidade) {  
      $sP = mysql_query("SELECT * FROM tbog INNER JOIN maps ON tbog.regional = maps.regiao WHERE regional LIKE '%$localidade%' and _status like 'Aberto'");

    while($dL = mysql_fetch_array($sP)){
        $rd  = $dL['regional'];

switch(substr($localidade, -4)){

     case $dL['regiao']:{

?>      
        {
              lat: <?php echo $dL['latitude_x']; ?>,
              lng: <?php echo $dL['longitude_y']; ?>,
              nome: "<?php echo $dL['cidade']; ?>",             
<?php  $sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE '$localidade' AND _status LIKE 'Aberto'") or die("Erro");  ?> 
              morada1: "<?php while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
      
    }
?>",        
              morada2: "",             
              codPostal: "" 
},


<?php
    break;
  } 

    default: { 
?>
             {
              lat: -2.895588,
              lng: -65.920311,
              nome: "Amazonas",
              morada1:"Apenas para posicionar o mapa",
              morada2: "",
              codPostal: "" 
            },
<?php 
    }
}////fim do swicth case////

   }
 }

?>   
   
];


function initialize() {
   var mapOptions = {
      center: new google.maps.LatLng(-13.9895528,-52.2264031),
      zoom: 9,
      mapTypeId: 'roadmap',
   };

   map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

   // cria a nova Info Window com referência à variável infowindow
   // o conteúdo da Info Window será atribuído mais tarde
   infoWindow = new google.maps.InfoWindow();

   // evento que fecha a infoWindow com click no mapa
   google.maps.event.addListener(map, 'click', function() {
      infoWindow.close();
   });

   // Chamada para a função que vai percorrer a informação
   // contida na variável markersData e criar os marcadores a mostrar no mapa
   displayMarkers();
}
google.maps.event.addDomListener(window, 'load', initialize);

// Esta função vai percorrer a informação contida na variável markersData
// e cria os marcadores através da função createMarker
function displayMarkers(){

   // esta variável vai definir a área de mapa a abranger e o nível do zoom
   // de acordo com as posições dos marcadores
   var bounds = new google.maps.LatLngBounds();
   
   // Loop que vai estruturar a informação contida em markersData
   // para que a função createMarker possa criar os marcadores 
   for (var i = 0; i < markersData.length; i++){

      var latlng = new google.maps.LatLng(markersData[i].lat, markersData[i].lng);
      var nome = markersData[i].nome;
      var morada1 = markersData[i].morada1;
      var morada2 = markersData[i].morada2;
      var codPostal = markersData[i].codPostal;

      createMarker(latlng, nome, morada1, morada2, codPostal);

      // Os valores de latitude e longitude do marcador são adicionados à
      // variável bounds
      bounds.extend(latlng);  
   }

   // Depois de criados todos os marcadores
   // a API através da sua função fitBounds vai redefinir o nível do zoom
   // e consequentemente a área do mapa abrangida.
   map.fitBounds(bounds);
}

// Função que cria os marcadores e define o conteúdo de cada Info Window.
function createMarker(latlng, nome, morada1, morada2, codPostal){
   var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      title: nome
   });

   // Evento que dá instrução à API para estar alerta ao click no marcador.
   // Define o conteúdo e abre a Info Window.
   google.maps.event.addListener(marker, 'click', function() {
      
      // Variável que define a estrutura do HTML a inserir na Info Window.
      var iwContent = '<div id="iw_container">' +
            '<div class="iw_title">' + nome + '</div>' +
         '<div class="iw_content">' + morada1 + '<br />' +
         morada2 + '<br />' +
         codPostal + '</div></div>';
      
      // O conteúdo da variável iwContent é inserido na Info Window.
      infoWindow.setContent(iwContent);

      // A Info Window é aberta.
      infoWindow.open(map, marker);
   });
}


</script>