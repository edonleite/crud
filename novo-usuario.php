<h1 class="mb-4">Novo Usuário</h1>
<form action="?page=salvar" method="POST">
    <!-- Campo oculto para ação -->
    <input type="hidden" name="acao" value="cadastrar">

    <!-- Campo Nome -->
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input 
            type="text" 
            id="nome" 
            name="nome" 
            class="form-control" 
            placeholder="Digite seu nome completo" 
            required 
            minlength="3">
    </div>

    <!-- Campo E-mail -->
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input 
            type="email" 
            id="email" 
            name="email" 
            class="form-control" 
            placeholder="Digite seu e-mail" 
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
            placeholder="Digite sua senha" 
            required 
            minlength="6">
    </div>

    <!-- Campo Data de Nascimento -->
    <div class="mb-3">
        <label for="data_nasc" class="form-label">Data de Nascimento</label>
        <input 
            type="date" 
            id="data_nasc" 
            name="data_nasc" 
            class="form-control" 
            required>
    </div>

    <!-- Botão de envio -->
    <div class="mb-3 text-end">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <button type="reset" class="btn btn-secondary">Limpar</button>
    </div>
</form>
