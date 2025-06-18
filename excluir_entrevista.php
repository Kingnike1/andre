<?php
require_once 'conexao.php';

$id = $_POST['id_entrevista'] ?? null;

if ($id) {
  $sql = "DELETE FROM tb_entrevista WHERE id_entrevista = ?";
  $stmt = mysqli_prepare($conexao, $sql);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

mysqli_close($conexao);

// Redirecionar de volta — deve ser antes de qualquer HTML
header("Location: listar_entrevistas.php");
exit;
