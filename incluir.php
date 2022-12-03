<?php 
require_once 'inicia.php';

/* Coleta as infos cadastradas no form_inclui.php */
$placa = isset($_POST['placa']) ? $_POST['placa']: null;
$marca = isset($_POST['marca']) ? $_POST['marca']: null;
$modelo = isset($_POST['modelo']) ? $_POST['modelo']: null;
$ano = isset($_POST['ano']) ? $_POST['ano']: null;

/* Verifica se todos os campos foram preenchidos */
if (empty($placa) || empty($marca) || empty($modelo) || empty($ano)) {
    echo "Por favor preencha todos os campos do formulário";
    exit;
}

/* Insere as infos cadastradas na tabela veiculos */
$PDO = conecta_bd();
$sql = "INSERT INTO
veiculos(placa,marca,modelo,ano)
VALUES(:placa,:marca,:modelo,:ano)";

$stmt = $PDO->prepare($sql);
$stmt->bindParam(':placa', $placa);
$stmt->bindParam(':marca', $marca);
$stmt->bindParam(':modelo', $modelo);
$stmt->bindParam(':ano', $ano);

if ($stmt->execute()) {
    header('Location: form_inclui.php');
}
else {
    echo "Ocorreu um erro na inclusão dos dados";
    print_r ($stmt->errorInfo());
}
?>