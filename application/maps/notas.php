<?php

    include "../config.php";
  
   
    mysql_connect($host, $user, $pwd);
    mysql_select_db($dbname);
    $sQuery ="SELECT * from tbog where  id = ". $_GET["id"];
    $oUsers = mysql_query($sQuery);
    $reg = mysql_fetch_object($oUsers);


?>

<style type="text/css">
  td, th {
  padding: .7em;
  margin: 0;
  /*border: 1px solid #ccc;*/
  text-align: center;
}

th{
  /*background-color: #EEE;*/
}
td{
  font-weight:bold;
  /*background-color: #EEE;*/
}

table{
  width: 100%;
  margin-bottom : .5em;
  table-layout: fixed;
  text-align: center;
}
</style>

<table border="1">
	<tr>
		<th> Descricao: </th><th>  <?php echo $reg->assunto; ?> </th>
	</tr>

  <tr>
    <th> OG: </th> <th> <?php echo $reg->og; ?> </th>
  </tr>

  <tr>
    <th> Notas: </th><th> <?php echo $reg->notas; ?> </th>
  </tr>

  <tr>
    <th> Regional: </th><th> <?php echo $reg->regional; ?> </th>
  </tr>

  <tr>
    <th> Acionado em: </th><th> <?php echo $reg->dtacionamento . ' ' . $reg->hracionamento; ?> </th>
  </tr>
  
  
</table>