<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sistema de cadastro de usuários com funcionalidades de listagem, edição e criação.">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Cadastro de Usuários</title>
</head>

<body>
  <!-- Navbar -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#" lang="pt-BR">Cadastro</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php" lang="pt-BR">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=novo" lang="pt-BR">Novo Usuário</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=listar" lang="pt-BR">Listar Usuários</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Conteúdo Principal -->
  <main class="container mt-5">
    <div class="row">
      <div class="col">
        <?php
          include("config.php");
          switch (@$_REQUEST["page"]){
            case "novo":
              include("novo-usuario.php");
              break;

            case "listar":
              include("listar-usuario.php");
              break;

            case "salvar":
              include("salvar-usuario.php");
              break;

            case "editar":
              include("editar-usuario.php");
              break;

            default:
              print "<h1 class='text-center'>Bem-vindo ao sistema de cadastro de usuários!</h1>";
              print "<p class='text-center'>Utilize o menu acima para navegar pelo sistema.</p>";
          }
        ?>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-light text-center py-3 mt-5">
    <div class="container">
      <small>&copy; 2024 - Sistema de Cadastro de Usuários</small>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
