<?php
    session_start();

    $index = $_GET['index'];


    if (isset($_SESSION['tarefas'][$index])) {
        unset($_SESSION['tarefas'][$index]);
        $_SESSION['tarefas'] = array_values($_SESSION['tarefas']); 
        echo "<h3>Tarefa deletada com sucesso!</h3>";
    } else {
        echo "<h3>Tarefa não encontrada.</h3>";
    }

    echo '<a href="mostra.php">Voltar</a>';
?>
