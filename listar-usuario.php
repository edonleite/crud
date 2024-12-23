<h1 class="mb-4">Listar Usuários</h1>
<?php
    // Consulta para buscar usuários
    $sql = "SELECT * FROM usuarios";
    $res = $conn->query($sql);

    if ($res) {
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            echo "<table class='table table-hover table-striped table-bordered'>";
            echo "<thead class='table-light'>";
            echo "<tr>";
            echo "<th>#</th>";
            echo "<th>Nome</th>";
            echo "<th>E-mail</th>";
            echo "<th>Data de Nascimento</th>";
            echo "<th>Ações</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = $res->fetch_object()) {
                echo "<tr>";
                echo "<td>{$row->id}</td>";
                echo "<td>{$row->nome}</td>";
                echo "<td>{$row->email}</td>";
                echo "<td>" . date('d/m/Y', strtotime($row->data_nasc)) . "</td>";
                echo "<td>";
                echo "<button onclick=\"location.href='?page=editar&id={$row->id}';\" class='btn btn-success btn-sm'>Editar</button> ";
                echo "<button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id={$row->id}';}\" class='btn btn-danger btn-sm'>Excluir</button>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='alert alert-warning text-center'>Nenhum usuário encontrado.</p>";
        }
    } else {
        echo "<p class='alert alert-danger text-center'>Erro ao executar a consulta.</p>";
    }
?>
