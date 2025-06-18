<?php
require_once 'conexao.php';

// Consulta única para pegar todas as pessoas
$sql = "SELECT id_pessoa, nome FROM tb_pessoa";
$resultado = mysqli_query($conexao, $sql);

// Armazenar todas as pessoas num array
$pessoas = [];
while ($linha = mysqli_fetch_assoc($resultado)) {
  $pessoas[] = $linha;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Cadastrar Entrevista</title>
</head>
<body>
  <h2>Nova Entrevista</h2>

  <form action="salvar_entrevista.php" method="post">
    <label for="titulo">Título:</label><br>
    <input type="text" name="titulo" id="titulo" required /><br>

    <label for="resumo">Resumo:</label><br>
    <textarea name="resumo" id="resumo" required></textarea><br>

    <label for="entrevistador">Entrevistador:</label><br>
    <select name="entrevistador" id="entrevistador" required>
      <option value="" disabled selected>Selecione</option>
      <?php foreach ($pessoas as $p): ?>
        <option value="<? echo $p['id_pessoa'] ?>"><? echo ($p['nome']) ?></option>
      <?php endforeach; ?>
    </select><br><br>

    <label for="entrevistado">Entrevistado:</label><br>
    <select name="entrevistado" id="entrevistado" required>
      <option value="" disabled selected>Selecione</option>
      <?php foreach ($pessoas as $p): ?>
        <option value="<? echo $p['id_pessoa'] ?>"><? echo ($p['nome']) ?></option>
      <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Salvar Entrevista" />
  </form>
</body>
</html>
