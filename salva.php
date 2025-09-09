<?php
    session_start();

    $nome = $_GET['nome'];
    $data = $_GET['data'];

   
    $tarefa = ['nome' => $nome, 'data' => $data];

    if (!isset($_SESSION['tarefas'])) {
        $_SESSION['tarefas'] = [];
    }

    array_push($_SESSION['tarefas'], $tarefa);

    echo "<h3>Tarefa '$nome' para o dia $data salva com sucesso!</h3>";
    echo '<a href="mostra.php">Ver Tarefas</a>';
?>
