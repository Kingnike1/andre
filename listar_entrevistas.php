<?php
require_once 'conexao.php';
// Consulta para listar entrevistas com nome e CPF/CNPJ do ENTREVISTADO
$sql = "
  SELECT 
    e.id_entrevista,
    e.titulo,
    e.resumo,
    p.nome AS nome_entrevistado,
    p.tipo,
    f.cpf,
    j.cnpj
  FROM tb_entrevista e
  JOIN tb_pessoa p ON p.id_pessoa = e.id_pessoa_entrevistada
  LEFT JOIN tb_fisica f ON f.id_pessoa = p.id_pessoa
  LEFT JOIN tb_juridica j ON j.id_pessoa = p.id_pessoa";

$resultado = mysqli_query($conexao, $sql);
$entrevistas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Listagem de Entrevistas</title>
</head>

<body>
  <h2>Entrevistas Cadastradas</h2>

  <table border="1" cellpadding="6">
    <thead>
      <tr>
        <?php foreach ($entrevistas as $e): ?>
          <th>ID</th>
          <th>Título</th>
          <th>Resumo</th>
          <th>Entrevistado</th>
          <th><?php
              if ($e['tipo'] === 'F') {
                echo "CPF";
              } elseif ($e['tipo'] === 'J') {
                echo "CNPJ";
              } else {
                echo 'CPF/CNPJ';
              }
              ?></th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td><?= $e['id_entrevista'] ?></td>
          <td><?= $e['titulo'] ?></td>
          <td><?= $e['resumo'] ?></td>
          <td><?= $e['nome_entrevistado'] ?></td>
          <td>
            <?php
            if ($e['tipo'] === 'F') {
              echo $e['cpf'];
            } elseif ($e['tipo'] === 'J') {
              echo $e['cnpj'];
            } else {
              echo '---';
            }
            ?>
          </td>
          <td>
            <form action="excluir_entrevista.php" method="post" style="display:inline;">
              <input type="hidden" name="id_entrevista" value="<?= $e['id_entrevista'] ?>">
              <button type="submit">Excluir</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>