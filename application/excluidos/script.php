<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

    include "../db_connect.php";  
   
    mysql_connect($servername, $username, $password);
    mysql_select_db($dbname);
    $sQuery ="SELECT * from  tbog where  id = ". $_GET["id"];
    $oUsers = mysql_query($sQuery);
    $reg = mysql_fetch_object($oUsers);


?>



<script>
function comando(param)
{
if (param=="paste") document.form1.campo.focus();
document.execCommand(param);

}
</script>
</head>

<body>


<form name="form1">
  <table>
    <tr>
    <td><input type="button" value="Copiar" onclick="javascript: comando('copy')">&nbsp;<input type="button" value="Colar" onclick="javascript: comando('paste')">&nbsp;
    <input type="button" value="Recortar" onclick="javascript: comando('cuty')">&nbsp;</td>
    <td>CTRL+A - para selecionar</td>
    </tr>
  </table>
<textarea cols="60" rows="20" name="campo">  
OGDD: <?php echo $reg->og; ?> | OS/MCI:      |SRV- [ATUALIZAÇÃO]

Problema: <?php echo $reg->assunto; ?>

Resolução: <?php echo $reg->obs; ?>.

Impacto: 


Início:  <?php echo date('d/m/Y',strtotime($reg->dtacionamento)) . ' às ' . $reg->hracionamento; ?>

Fim: <?php echo date('d/m/Y',strtotime($reg->dtfechamento)) . ' às ' . $reg->hrfechamento; ?>

Codigo encerramento: <?php echo $reg->codencerramento; ?>






</textarea>
</form>

</body>
</html>