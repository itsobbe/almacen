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
        $arraynumeros = $_SESSION["disponiblesPasillos"];
        ?>
    <optgroup label="Números disponibles">
        <?php
        foreach ($arraynumeros as $numero) {
            ?>
        
        <option value="<?php echo $numero ?>"> <?php echo $numero ?> </option> 
                                                
        <?php
    }// foreach
    ?>
        </optgroup>
    </body>
</html>
