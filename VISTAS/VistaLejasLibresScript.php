<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        $arraylejas = $_SESSION["lejasDisponiblesScript"];
         ?>
        <optgroup label="Lejas disponibles">
        <?php
        foreach ($arraylejas as $fila) {
            ?>
        <option value="<?php echo $fila ?>"> <?php echo $fila ?> </option> 
        <?php
    }// foreach
    ?>
        </optgroup>
</body>
</html>