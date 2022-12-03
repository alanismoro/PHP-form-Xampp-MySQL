<?php 
require_once 'inicia.php'; 
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de veículos</title>
    
    <!--- css --->
    <link rel="stylesheet" href="styles.css" />
    
    <!--- fontes --->
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Raleway:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    </head>
    
    <body>
    <div class="form_inclui">    
    <h2>Cadastro de veículos - Inclusão</h2>
        <form action="incluir.php" method="post">
            <label for="placa">Placa do veículo:</label>
                <input type="text" name="placa" id="placa"><br><br>
            <label for="marca">Marca do veículo:</label>
                <input type="text" name="marca" id="marca"><br><br> 
            <label for="modelo">Modelo do veículo:</label>
                <input type="text" name="modelo" id="modelo"><br><br>
            <label for="ano">Ano do veículo:</label>
                <input type="text" name="ano" id="ano"><br><br>
            <br>
            <input type="submit" value="Incluir">
        </form>
        </div>
    </body>
</html>