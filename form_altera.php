<?php 
require 'inicia.php';

/* Armazenamento do código do veículo que será alterado */
$cod_veiculo = isset ($_GET['cod_veiculo']) ? (int) $_GET['cod_veiculo']: null;
if (empty($cod_veiculo)) {
    echo "o Código do veículo para alteração não foi definido";
    exit;} 

/* Busca os dados que deverão ser alterados */
$PDO = conecta_bd();
$stmt = $PDO->prepare("SELECT
cod_veiculo, placa, marca, modelo, ano FROM veiculos WHERE cod_veiculo = :cod_veiculo");

$stmt->bindParam(':cod_veiculo', $cod_veiculo, PDO::PARAM_INT);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

/* Caso o fetch nao retorne um array preenchido, o cód não existe na tabela */
if (!is_array($resultado)) {
    echo "Nenhum veículo encontrado";
    exit;
}
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
        <div class="form_altera">
        <h2>Alteração de cadastro de veículo</h2>
        <form action="altera.php" method="POST">
            <label for="placa">Placa do veículo:</label>
                <input type="text" name="placa" id="placa" 
value="<?=$resultado['placa']?>"><br><br>
            <label for="marca">Marca do veículo:</label>
                <input type="text" name="marca" id="marca" 
value="<?=$resultado['marca']?>"><br><br>
            <label for="modelo">Modelo do veículo:</label>
                <input type="text" name="modelo" id="modelo" 
value="<?=$resultado['modelo']?>"><br><br>
            <label for="ano">Ano do veículo:</label>
                <input type="text" name="ano" id="ano" 
value="<?=$resultado['ano']?>"><br><br>
            <input type="hidden" name="cod_veiculo" value="<?=$cod_veiculo ?>">
            <input type="submit" value="Alterar">
        </form>
        </div>
    </body>
</html>