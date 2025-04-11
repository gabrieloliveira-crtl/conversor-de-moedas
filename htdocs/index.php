<?php
// Conexão com banco de dados
$host = "localhost";
$user = "root";
$pass = ""; // padrão do XAMPP é senha vazia
$dbname = "tarefasdb";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Adiciona nova tarefa
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['titulo'])) {
    $titulo = $conn->real_escape_string($_POST['titulo']);
    $conn->query("INSERT INTO tarefas (titulo) VALUES ('$titulo')");
}

// Apaga tarefa
if (isset($_GET['apagar'])) {
    $id = (int)$_GET['apagar'];
    $conn->query("DELETE FROM tarefas WHERE id = $id");
    header("Location: index.php"); // Redireciona pra evitar reenvio
    exit;
}

// Buscar tarefas salvas
$tarefas = $conn->query("SELECT * FROM tarefas");
?>

<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Lista de Tarefas</title>
</head>
<body>
<header>
        <img src="task.png" alt="imagem principal">
        <h1>Lista de Tarefa</h1>
    </header>

<section>

    <div id="container">
        
        <h1>Minhas Tarefas</h1>
        
        <form method="POST">
            <input type="text" name="titulo" placeholder="Digite a tarefa" required>
            <button type="submit">Adicionar</button>
        </form>
        
        <ul>
            <?php while($tarefa = $tarefas->fetch_assoc()): ?>
                <li>
                    <?php echo htmlspecialchars($tarefa['titulo']); ?>
                    <a href="?apagar=<?php echo $tarefa['id']; ?>" onclick="return confirm('Tem certeza que deseja apagar?');">
                        🗑️ Apagar
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</section>
</body>
</html>
