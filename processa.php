<?php
// Conexão com o banco
require_once 'conexao.php';

// Pegando os dados do formulário (pode vir via POST ou GET)
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$tipo = $_POST['tipo'] ?? '';
$cpf = $_POST['cpf'] ?? null;
$data_nascimento = $_POST['data_nascimento'] ?? null;
$cnpj = $_POST['cnpj'] ?? null;
$razao_social = $_POST['razao'] ?? null;
$nome_fantasia = $_POST['nomefantasia'] ?? null;

// Protege a senha
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// Inserir na tabela tb_pessoa
$sql = "INSERT INTO tb_pessoa (nome, email, senha, tipo) VALUES (?, ?, ?, ?)";
$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, 'ssss', $nome, $email, $senhaHash, $tipo);

$okPessoa = mysqli_stmt_execute($comando);
$id_pessoa = mysqli_insert_id($conexao);
mysqli_stmt_close($comando);

// Inserir na tabela específica
if ($tipo === 'F') {
  $sql_fisica = "INSERT INTO tb_fisica (cpf, data_nascimento, id_pessoa) VALUES (?, ?, ?)";
  $comando_fisica = mysqli_prepare($conexao, $sql_fisica);
  mysqli_stmt_bind_param($comando_fisica, 'ssi', $cpf, $data_nascimento, $id_pessoa);
  $fisica = mysqli_stmt_execute($comando_fisica);
  mysqli_stmt_close($comando_fisica);

  echo $fisica ? "Pessoa física salva com sucesso!" : "Erro ao salvar pessoa física.";

} elseif ($tipo === 'J') {
  $sql_juridica = "INSERT INTO tb_juridica (cnpj, razao_social, nome_fantasia, id_pessoa) VALUES (?, ?, ?, ?)";
  $comando_juridico = mysqli_prepare($conexao, $sql_juridica);
  mysqli_stmt_bind_param($comando_juridico, 'sssi', $cnpj, $razao_social, $nome_fantasia, $id_pessoa);
  $juridico = mysqli_stmt_execute($comando_juridico);
  mysqli_stmt_close($comando_juridico);

  echo $juridico ? "Pessoa jurídica salva com sucesso!" : "Erro ao salvar pessoa jurídica.";
}

mysqli_close($conexao);
?>
