<h1 class="mb-4">Editar Usuário</h1>

<?php
// Prevenção contra SQL Injection com prepared statements
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $_REQUEST["id"]);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_object();

if (!$row) {
    echo "<p class='alert alert-danger'>Usuário não encontrado.</p>";
    exit;
}
?>

<form action="?page=salvar" method="POST">
    <!-- Campos ocultos para ação e ID -->
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row->id, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- Campo Nome -->
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input 
            type="text" 
            id="nome" 
            name="nome" 
            value="<?php echo htmlspecialchars($row->nome, ENT_QUOTES, 'UTF-8'); ?>" 
            class="form-control" 
            placeholder="Digite o nome completo" 
            required>
    </div>

    <!-- Campo E-mail -->
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input 
            type="email" 
            id="email" 
            name="email" 
            value="<?php echo htmlspecialchars($row->email, ENT_QUOTES, 'UTF-8'); ?>" 
            class="form-control" 
            placeholder="Digite o e-mail" 
            required>
    </div>

    <!-- Campo Senha -->
    <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input 
            type="password" 
            id="senha" 
            name="senha" 
            class="form-control" 
            placeholder="Digite uma nova senha ou deixe em branco para manter a atual" 
            minlength="6">
        <small class="text-muted">Se não quiser alterar a senha, deixe este campo em branco.</small>
    </div>

    <!-- Campo Data de Nascimento -->
    <div class="mb-3">
        <label for="data_nasc" class="form-label">Data de Nascimento</label>
        <input 
            type="date" 
            id="data_nasc" 
            name="data_nasc" 
            value="<?php echo htmlspecialchars($row->data_nasc, ENT_QUOTES, 'UTF-8'); ?>" 
            class="form-control" 
            required>
    </div>

    <!-- Botões -->
    <div class="mb-3 text-end">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="?page=listar" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
