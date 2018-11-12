<?php

include "../config.php";
// include "../valida_user.inc";

//mysql_connect($host, $user, $pwd);
//mysql_select_db($dbname);


$banco = mysqli_select_db($conexao,'bdog');
mysqli_set_charset($conexao,'utf8');

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
      $sP = mysql_query("SELECT * from tbog where regional like '$localidade' and _status like 'Aberto'");
    while($dL = mysql_fetch_array($sP)){
        $rd  = $dL['regional'];

   
switch(substr($localidade, -4)) {
    case 'ula':{
    ?>      
        {
              lat: -18.956505,
              lng: -48.258109,
              nome: "Uberlandia",               

<?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'ula' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
      
    }
?>",       //echo $dados['og'].'<br>';   

//////////////////////////final//////////////////////////////////////////////////
  morada2: "",             
  codPostal: "" 

 },

<?php
     break;
    }

    case 'ari': {
?>      {
              lat: -18.649588,
              lng: -48.126101,
              nome: "Araguari",
             <?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'ari' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
    }
?>",

//////////////////////////final//////////////////////////////////////////////////
  morada2: "",             
  codPostal: "" 

 },

<?php
        break;
    }

 case 'spo': {
?> {
              lat: -23.767283,
              lng: -46.657220,
              nome: "Sao Paulo",
             <?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'spo' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
    }
?>",

//////////////////////////final//////////////////////////////////////////////////
  morada2: "",             
  codPostal: "" 

 },

<?php
        break;
    }
    case 'rjo':{
?> {
              lat: -22.901480,
              lng: -43.256735,
              nome: "Rio de Janeiro",
             <?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'rjo' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
    }
?>",

//////////////////////////final//////////////////////////////////////////////////
  morada2: "",             
  codPostal: "" 

 },

<?php
        break;
    }
    case 'bsa':{
?> {
              lat: -15.963677,
              lng: -47.802936,
              nome: "Brasilia",
             <?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'bsa' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
    }
?>",

//////////////////////////final//////////////////////////////////////////////////
  morada2: "",             
  codPostal: "" 

 },

<?php
        break;
    }
    case 'rpo':{
?> {
              lat: -21.272188,
              lng: -47.774538,
              nome: "Ribeirão Preto",
             <?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'rpo' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
    }
?>",

//////////////////////////final//////////////////////////////////////////////////
  morada2: "",             
  codPostal: "" 

 },

<?php
        break;
    }

case 'jai':{
?> {
              lat: -23.3316205,
              lng: -48.3671983,
              nome: "Jundiai",
            <?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'jai' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
    }
?>",

//////////////////////////final//////////////////////////////////////////////////
  morada2: "",             
  codPostal: "" 

 },

<?php
        break;
    }

  case 'vin':{
?> {
              lat: -23.0373573,
              lng: -47.5001287,
              nome: "Vinhedo",
             <?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'vin' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
    }
?>",

//////////////////////////final//////////////////////////////////////////////////
  morada2: "",             
  codPostal: "" 

 },

<?php
        break;
    } 

     case 'cas':{
?> {
              lat: -22.907347, 
              lng: -46.980092,
              nome: "Campinas",
           <?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'cas' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
    }
?>",

//////////////////////////final//////////////////////////////////////////////////
  morada2: "",             
  codPostal: "" 

 },

<?php
        break;
    } case 'soc':{
?> {
              lat: -21.272188,
              lng: -47.774538,
              nome: "Sorocaba",
           <?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'soc' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
    }
?>",

//////////////////////////final//////////////////////////////////////////////////
  morada2: "",             
  codPostal: "" 

 },

<?php
        break;
    }

     case 'bet':{
?> {
              lat: -19.963802,
              lng: -44.152356,
              nome: "Betim",
            <?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'bet' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
    }
?>",

//////////////////////////final//////////////////////////////////////////////////
  morada2: "",             
  codPostal: "" 

 },

<?php
        break;
    }
    case 'pms':{
?> {
              lat: -18.592590,
              lng: -46.475139,
              nome: "Patos de Minas",
            <?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'pms' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
    }
?>",

//////////////////////////final//////////////////////////////////////////////////
  morada2: "",             
  codPostal: "" 

 },

<?php
        break;
    }

    case 'itui':{
?> {
              lat: -18.975037,
              lng: -49.419403,
              nome: "Ituiutaba",
             <?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'itui' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
    }
?>",

//////////////////////////final//////////////////////////////////////////////////
  morada2: "",             
  codPostal: "" 

 },

<?php
        break;
    }

case 'bhe':{ 
?> {
              lat: -19.907826,
              lng: -43.981975,
              nome: "Belo Horizonte",
             <?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'bhe' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
    }
?>",

//////////////////////////final//////////////////////////////////////////////////
  morada2: "",             
  codPostal: "" 

 },

<?php
        break;
    }
  case 'axa':{
?> {
              lat: -19.583659,
              lng: -46.910176,
              nome: "Araxa",
             <?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'axa' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
    }
?>",

//////////////////////////final//////////////////////////////////////////////////
  morada2: "",             
  codPostal: "" 

 },

<?php
        break;
    }  
 
  case 'pau':{
?> {
              lat: -22.747435,
              lng: -47.153621,
              nome: "Paulinia",
             <?PHP
///////////////////////////inicio/////////////////////////////////////////////////////
$sql = mysqli_query($conexao,"SELECT * FROM tbog WHERE regional LIKE 'pau' AND _status LIKE 'Aberto'") or die("Erro");

?> 
morada1: "<?PHP
while($dados = mysqli_fetch_assoc($sql))
    {
      echo '<a href=\'#\' onClick=\"alterar('.$dados['id'].')\">* '.$dados['assunto'].'</a>.<br/>';
    }
?>",

//////////////////////////final//////////////////////////////////////////////////
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
              morada1:"",
              morada2: "",
              codPostal: "" 
            },
<?php 
    }
}
////fim do swicth case////

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