
<?php
    session_start(); 

    @$ds_data_in = ($_POST["ds_data_in"]);
    @$ds_data_fim = ($_POST["ds_data_fim"]);

    $_SESSION['ds_data_in'] = $ds_data_in;
    $_SESSION['ds_data_fim'] = $ds_data_fim;
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title>Registro Ti</title>
</head>

<?php  if($_SESSION['nivel'] == 'Sup') { ?>

	<FRAMESET border="0" COLS=33%,33%,33%>

	<FRAMESET ROWS=40%,40%>
		<FRAME SRC='graficoBusca/topo_esquerda.php'>
		<FRAME SRC='graficoBusca/baixo_esquerda.php'>
				
	</FRAMESET>
	<FRAMESET border="0" ROWS=40%,40%>
		<FRAME SRC='graficoBusca/topo_meio.php'>
		<FRAME SRC='graficoBusca/baixo_meio.php'>

				
	</FRAMESET>

	<FRAMESET  border="0" ROWS=40%,40%>
		<FRAME SRC='graficoBusca/topo_direita.php'>
		<FRAME SRC='graficoBusca/baixo_direita.php'>
				
	</FRAMESET>

	</FRAMESET>

<?php  }else{ echo "<script>window.setTimeout('history.back(-2)', 5);</script> ";}  ?>

</HTML>

