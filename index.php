<?php
// Só processa se o formulário foi enviado com o campo 'tipo' definido
if (isset($_GET['tipo'])) {
    $tipo = $_GET['tipo'] ?? '';
    if ($tipo === 'F') {
        $nome = $_GET['nome'] ?? '';
        $senha = $_GET['senha'] ?? '';
        $email = $_GET['email'] ?? '';
        header("Location: fisico.php?nome=$nome&email=$email&senha=$senha");
        exit;
    } elseif ($tipo === 'J') {
        $nome = $_GET['nome'] ?? '';
        $senha = $_GET['senha'] ?? '';
        $email = $_GET['email'] ?? '';
        header("Location: juridico.php?nome=$nome&email=$email&senha=$senha");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Tipo</title>
</head>
<body>
    <form action="" method="get">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" id="nome"><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email"><br>
        
        <label for="senha">Senha:</label><br>
        <input type="password" name="senha" id="senha"><br>

        <label for="tipo">Tipo:</label><br>
        <select name="tipo" id="tipo" required>
            <option value="" selected disabled>Selecione uma opção</option>
            <option value="F">F (Pessoa Física)</option>
            <option value="J">J (Pessoa Jurídica)</option>
        </select><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
