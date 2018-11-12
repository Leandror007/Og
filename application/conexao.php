<?php
try {
    $conexao = New PDO ("mysql:host=localhost;dbname=bdog","root","");
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
