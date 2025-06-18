<?php
// Evita os warnings verificando se os valores existem
$nome = $_GET['nome'] ?? '';
$senha = $_GET['senha'] ?? '';
$email = $_GET['email'] ?? '';

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Pessoa Física</title>
</head>

<body>
    <form action="processa.php" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" id="nome" value="<? echo $nome ?>"><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="<? echo $email ?>"><br>

        <label for="senha">Senha:</label><br>
        <input type="password" name="senha" id="senha" value="<? echo $senha ?>"><br>

        <input type="hidden" name="tipo" value="F">

        <label for="cpf">CPF:</label><br>
        <input type="text" name="cpf" id="cpf"><br>

        <label for="datanascimento">Data de Nascimento:</label><br>
        <input type="date" name="data_nascimento" id="datanascimento"><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>