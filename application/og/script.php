<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

    include "../config.php";
  
   
    mysql_connect($host, $user, $pwd);
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
    </tr>
  </table>
<textarea cols="60" rows="20" name="campo">  
OGDD: <?php echo $reg->og; ?> | OS:      |

Problema: <?php echo $reg->assunto; ?>

Ação: <?php echo $reg->notas; ?>.

Impacto: 

Previsão: 

Início:  <?php echo date('d/m/Y',strtotime($reg->dtacionamento)) . ' às ' . $reg->hracionamento; ?>


</textarea>
</form>

</body>
</html>