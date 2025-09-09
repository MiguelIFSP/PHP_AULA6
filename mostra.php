<?php
    session_start();
    date_default_timezone_set("America/Sao_Paulo"); // Definindo fuso horário

    // Obtém as tarefas salvas
    $tarefas = isset($_SESSION['tarefas']) ? $_SESSION['tarefas'] : [];

    // Filtra as tarefas de hoje
    $hoje = date('Y-m-d');
    $tarefas_hoje = array_filter($tarefas, function($tarefa) use ($hoje) {
        return $tarefa['data'] == $hoje;
    });
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas Cadastradas</title>
    <!-- Link do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1>Tarefas Cadastradas</h1>

        <!-- Menu de navegação -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="mostra.php">Hoje</a></li>
                <li class="nav-item"><a class="nav-link" href="recebe.php">Nova</a></li>
                <li class="nav-item"><a class="nav-link" href="todas.php">Todas</a></li>
                <li class="nav-item"><span class="navbar-text">Total: <?php echo count($tarefas); ?></span></li>
            </ul>
        </nav>

        <h2>Tarefas de Hoje (<?php echo count($tarefas_hoje); ?>)</h2>
        <?php if (count($tarefas_hoje) > 0): ?>
            <ul class="list-group">
                <?php foreach ($tarefas_hoje as $tarefa): ?>
                    <li class="list-group-item">
                        <strong><?php echo $tarefa['nome']; ?></strong> - <?php echo $tarefa['data']; ?>
                        <a href="deletar.php?index=<?php echo array_search($tarefa, $tarefas); ?>" class="btn btn-danger btn-sm float-end">Apagar</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Nenhuma tarefa cadastrada para hoje.</p>
        <?php endif; ?>
    </div>

    <!-- Link do Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>