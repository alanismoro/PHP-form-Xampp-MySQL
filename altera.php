<?php 
require_once 'inicia.php';

/* Coleta infos cadastradas no formulário de alteração de dados */
$cod_veiculo = isset ($_POST['cod_veiculo']) ? $_POST['cod_veiculo']: null;
$placa = isset ($_POST['placa']) ? $_POST['placa']: null;
$marca = isset ($_POST['marca']) ? $_POST['marca']: null;
$modelo = isset ($_POST['modelo']) ? $_POST['modelo']: null;
$ano = isset ($_POST['ano']) ? $_POST['ano']: null;

/* Verifica se todos os campos foram preenchidos */
if (empty($placa) || empty($marca) || empty($modelo) || empty($ano)) {
    echo "Por favor preencha todos os campos do formulário";
    exit;
}

/* Altera infos na tabela veiculos */
$PDO = conecta_bd();
$stmt = $PDO->prepare("UPDATE veiculos SET 
placa=:placa,marca=:marca,modelo=:modelo,ano=:ano WHERE cod_veiculo=:cod_veiculo");
$stmt->bindParam(':cod_veiculo', $cod_veiculo, PDO::PARAM_INT);
$stmt->bindParam(':placa', $placa);
$stmt->bindParam(':marca', $marca);
$stmt->bindParam(':modelo', $modelo);
$stmt->bindParam(':ano', $ano);
if ($stmt->execute()) {
    header('Location: index.php');
}
else {
    echo "Ocorreu um erro na alteração dos dados";
    print_r ($stmt->errorInfo());
}
?>