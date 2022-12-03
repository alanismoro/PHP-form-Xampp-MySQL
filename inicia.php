<?php 
/* Infos para acesso ao banco de dados */
define ('DB_HOST', "localhost");
define ('DB_NAME', "concessionaria");
define ('DB_USER', "root");
define ('DB_PASS', null);

/* Mensagens de erro */
ini_set('display_errors', true);
error_reporting (E_ALL);

/* Inclusão do arquivo de funções */
require_once 'funcoes.php';
?>

<!doctype html>
<html>
<link rel="stylesheet" href="styles.css" />
</html>