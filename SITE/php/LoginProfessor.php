<?php
    require_once "../php/conexao.php";

        $mensagem = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

    $sql = "select * from tb_users where nome_user = ? and senha = ? and tipo = 'professor'";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();

    $resultado = $stmt->get_result();
    if ($resultado->num_rows > 0){
        header("location: TelaProfessor.php");
    } else {
        $mensagem = "<span style='color:#f7070f;'>Usuário ou Senha incorretos!</span>";
    }

        $stmt->close();
        $conn->close();

    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Professor</title>
    <link rel="icon" href="../img/icone.png">
    <link rel="stylesheet" href="../css/LoginProfessor.css">
</head>
<body style="background: #524f4f;">
<center>

<a href="index.php" class="bp">
    Voltar
</a>

<form method="POST">
    <h1 class="titulo">Professor</h1>
    <br>
    <br>
    <br>
    <div id="fundo">
        <label class="t1">Usuário:</label>
        <br>
        <input type="text" name="usuario" placeholder="Digite seu Usuário" class="i">
        <br>
        <br>
        <br>
        <label class="t2">Senha:</label>
        <br>
        <input type="password" name="senha" placeholder="Digite sua Senha" class="i">
        <br>
        <br>
        <label class="mensagem"><?php echo $mensagem  ?></label>
        <br>
        <input type="submit" value="Entrar" class="b">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</form>
</center>
</body>
</html>