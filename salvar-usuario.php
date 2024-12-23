<?php
function redirecionar($mensagem, $pagina = 'listar') {
    echo "<script>alert('{$mensagem}');</script>";
    echo "<script>location.href='?page={$pagina}';</script>";
}

switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        // Obter os dados do formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Armazenar a senha de forma segura
        $data_nasc = $_POST["data_nasc"];

        // Preparar e executar a consulta
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, data_nasc) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $email, $senha, $data_nasc);
        $res = $stmt->execute();

        if ($res) {
            redirecionar("Cadastro realizado com sucesso!");
        } else {
            redirecionar("Erro ao cadastrar usuário.");
        }
        break;

    case 'editar':
        // Obter os dados do formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = !empty($_POST["senha"]) ? password_hash($_POST["senha"], PASSWORD_DEFAULT) : null; // Atualiza senha apenas se fornecida
        $data_nasc = $_POST["data_nasc"];
        $id = $_REQUEST["id"];

        // Construir a consulta de atualização
        if ($senha) {
            $sql = "UPDATE usuarios SET nome=?, email=?, senha=?, data_nasc=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $nome, $email, $senha, $data_nasc, $id);
        } else {
            $sql = "UPDATE usuarios SET nome=?, email=?, data_nasc=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $nome, $email, $data_nasc, $id);
        }

        $res = $stmt->execute();

        if ($res) {
            redirecionar("Usuário atualizado com sucesso!");
        } else {
            redirecionar("Erro ao atualizar usuário.");
        }
        break;

    case 'excluir':
        // Obter o ID do usuário
        $id = $_REQUEST["id"];

        // Preparar e executar a consulta
        $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $res = $stmt->execute();

        if ($res) {
            redirecionar("Usuário excluído com sucesso!");
        } else {
            redirecionar("Erro ao excluir usuário.");
        }
        break;

    default:
        redirecionar("Ação inválida.", "listar");
        break;
}
