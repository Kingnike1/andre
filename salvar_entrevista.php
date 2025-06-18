<?php
require_once 'conexao.php';


$titulo = $_POST['titulo'];
$resumo = $_POST['resumo'];
$entrevistador = $_POST['entrevistador'];
$entrevistado = $_POST['entrevistado'];


$sql = "INSERT INTO tb_entrevista (titulo, resumo, id_pessoa_entrevistador, id_pessoa_entrevistada) 
        VALUES (?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, 'ssii', $titulo, $resumo, $entrevistador, $entrevistado);

$ok = mysqli_stmt_execute($comando);
mysqli_stmt_close($comando);
mysqli_close($conexao);

if ($ok) {
  echo "Entrevista cadastrada com sucesso!";
} else {
  echo "Erro ao salvar entrevista.";
}
