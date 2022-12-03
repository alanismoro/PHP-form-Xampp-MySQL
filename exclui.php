<?php 
require_once 'inicia.php';

/* Armazena o código do veículo que será excluído */
$cod_veiculo = isset ($_GET['cod_veiculo']) ? $_GET['cod_veiculo']: null;

/* Verifica se o código do veículo existe na tabela */
if (empty($cod_veiculo)) {
    echo "O código do veículo para exclusão não foi definido";
    exit;
}

/* Exclui o registro da tabela */
$PDO = conecta_bd();
$sql = "DELETE FROM veiculos WHERE cod_veiculo = :cod_veiculo";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':cod_veiculo', $cod_veiculo, PDO::PARAM_INT);
if ($stmt->execute()) {
    header('Location: index.php');
}
else {
    echo "Ocorreu um erro ao excluir o veículo";
    print_r($stmt->errorInfo());
}
?>