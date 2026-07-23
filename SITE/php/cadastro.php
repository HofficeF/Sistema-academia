<?php
    require_once "../php/conexao.php";

    $mensagem = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $data = $_POST["data"];
        $telefone = $_POST["telefone"];
        $cpf = $_POST["cpf"];
        $peso = $_POST["peso"];
        $altura = $_POST["altura"];
        $tipo = "aluno";

        $sql = "insert into tb_users (nome_completo, nome_user, email, senha, data, telefone, cpf, peso, altura, tipo)
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "sssssssdds", $nome, $usuario, $email, $senha, $data, $telefone, $cpf, $peso, $altura, $tipo
        );

        if ($stmt->execute()) {
            $mensagem = "<span style='color:#00d92f;'>Cadastro realizado com sucesso!</span>";
        } else {
            $mensagem = "<span style='color:#f7070f;'>Erro ao cadastrar.</span>";
        }

        $stmt->close();
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Cadastro</title>
    <link rel="icon" href="../img/icone.png">
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body style="background: #524f4f;">
<center>
<form method="POST">
    <h1 class="titulo">Cadastro</h1>
    <br>
    <br>
    <br>
    <div id="fundo">
        <label class="t0">Nome Completo:</label>
        <br>
        <input type="text" name="nome" placeholder="Digite seu Nome" class="i" required>
        <br>
        <br>
        <br>
        <label class="t1">Usuário:</label>
        <br>
        <input type="text" name="usuario" placeholder="Digite seu Usuário" class="i" required>
        <br>
        <br>
        <br>
        <label class="t2">Email:</label>
        <br>
        <input type="email" name="email" placeholder="Digite seu Email" class="i" required>
        <br>
        <br>
        <br>
        <label class="t3">Senha:</label>
        <br>
        <input type="password" name="senha" placeholder="Digite sua Senha" class="i" maxlength="8" required>
        <br>
        <br>
        <br>
        <label class="t4">Data de Nascimento:</label>
        <br>
        <input type="date" name="data" class="i"  max="<?php echo date('Y-m-d'); ?>" min="1936-01-01"required>
        <br>
        <br>
        <br>
        <label class="t5">Telefone:</label>
        <br>
        <input type="tel" name="telefone" id="telefone" placeholder="(11) 99999-9999" class="i" maxlength="15" required>
        <br>
        <br>
        <br>
        <label class="t6">CPF:</label>
        <br>
        <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00" class="i" maxlength="14" required>
        <br>
        <br>
        <br>
        <label class="t7">Peso (kg):</label>
        <br>
        <input type="number" name="peso" id="peso" placeholder="Ex.: 72.5" min="20" max="500" step="0.1" class="i"  required>
        <br>
        <br>
        <br>
        <label class="t8">Altura (m):</label>
        <br>
        <input type="number" name="altura" id="altura" placeholder="Ex.: 1.75" min="0.50" max="2.50" step="0.01" class="i"  required>
        <br>
        <br>
        <label class="mensagem"><?php echo $mensagem; ?></label>
        <br>
        <input type="submit" value="Cadastrar" class="b">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <label>Já Criou sua Conta? Faça o <a href="index.php" style="color: blue;">Login!</a></label>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</form>
</center>

<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.9/dist/inputmask.min.js"></script>
<script>
const telefone = document.getElementById("telefone");
const cpf = document.getElementById("cpf");
Inputmask("(99) 99999-9999").mask(telefone);
Inputmask("999.999.999-99").mask(cpf);
</script>

</body>
</html>