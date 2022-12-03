<?php
   require_once 'inicia.php';
   $PDO = conecta_bd();
?>

<!doctype html>
<html lang="pt_br">
 <head>
    <meta charset="UTF-8">
    <title>Concessionária</title>
    
    <!--- css --->
    <link rel="stylesheet" href="styles.css" />
    
    <!--- fontes --->
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Raleway:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
 </head>

 <body>
   <header>
      
   </header>
   <div class="form_index">
    <h2>Bem-vindo(a) a Concessionária!</h2>
    <h3>Por favor cadastre seu veículo aqui:</h3>
    <button id="button_inclui"><a href="form_inclui.php">Adicionar veículo</a></button>
    <h3>Lista de veículos cadastrados</h3>

<?php
   $stmt_count = $PDO->prepare ("SELECT COUNT(*) AS total FROM veiculos");
   $stmt_count->execute();
   $stmt = $PDO->prepare ("SELECT cod_veiculo, placa, marca, modelo, ano 
FROM veiculos ORDER BY cod_veiculo");
   $stmt->execute();
   $total = $stmt_count->fetchColumn();

   if ($total > 0): ?>
   <table border="1">
   <thead>
      <tr>
         <th>Código do veículo</th>
         <th>Placa</th>
         <th>Marca</th>
         <th>Modelo</th>
         <th>Ano</th>
         <th>Opções para o veículo</th>
      </tr>
   </thead>

   <tbody>
      <?php while ($resultado = $stmt->fetch (PDO::FETCH_ASSOC)): ?>
      <tr>
         <td><?php echo $resultado['cod_veiculo'] ?></td>
         <td><?php echo $resultado['placa'] ?></td>
         <td><?php echo $resultado['marca'] ?></td>
         <td><?php echo $resultado['modelo'] ?></td>
         <td><?php echo $resultado['ano'] ?></td>
         <td>
            <a href="form_altera.php?cod_veiculo=<?php echo $resultado['cod_veiculo']?>">Alterar</a>
            <a href="exclui.php?cod_veiculo=<?php echo $resultado['cod_veiculo']?>" 
            onclick="return confirm ('Tem certeza de que deseja excluir o registro?');">Excluir</a>
         </td>
      </tr>
      <?php endwhile; ?>
   </tbody>
   </table>
   <p>Total de veículos cadastrados: <?php echo $total ?></p>
   <?php else: ?>
   <p>Não há veículos cadastrados</p>
   <?php endif; ?>
   </div>
</body>
</html>