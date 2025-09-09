<?php
    session_start();

    $tarefas = isset($_SESSION['tarefas']) ? $_SESSION['tarefas'] : [];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas as Tarefas</title>
    <!-- Link do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1>Todas as Tarefas (<?php echo count($tarefas); ?>)</h1>

        <a href="recebe.php" class="btn btn-primary">Cadastrar Nova Tarefa</a>
        <a href="mostra.php" class="btn btn-secondary">Ver Tarefas de Hoje</a>
        <br><br>

        <?php if (count($tarefas) > 0): ?>
            <ul class="list-group">
                <?php foreach ($tarefas as $index => $tarefa): ?>
                    <li class="list-group-item">
                        <strong><?php echo $tarefa['nome']; ?></strong> - <?php echo $tarefa['data']; ?>
                        <a href="deletar.php?index=<?php echo array_search($tarefa, $tarefas); ?>" class="btn btn-danger btn-sm float-end">Apagar</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Nenhuma tarefa cadastrada.</p>
        <?php endif; ?>
    </div>

    <!-- Link do Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
