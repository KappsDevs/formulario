<?php
require_once "config.php";

$senha = "123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha_input = $_POST['senha'];
    if ($senha_input === $senha) {
        $sql = "SELECT * FROM mensagens";
        $result = $conn->query($sql);
    } else {
        echo "<h3>Senha incorreta!</h3>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver mensagens</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body{
            background-color: #57A6A1;
            display: flex;
            flex-flow: column ;
        }
        
        h2 {
            text-align: center; 
            color: whitesmoke;
        }
        
        p{
            text-align: center; 
            margin: 20px;
        }

        
    </style>
</head>
<body >

    <form action="" method="post">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" placeholder="Digite sua senha" required>
        <button type="submit">Enviar</button>
    </form>

    <div id="mensagem"> 
        <?php if(isset($result) && $result->num_rows > 0): ?>
            <h2>Mensagens</h2>
            <ul>
                <?php while($row = $result->fetch_assoc()):?>
                    <li style="color: whitesmoke;">
                        <strong>Nome: </strong> <?php echo $row["nome"]; ?> <br>
                        <strong>Email: </strong> <?php echo $row["email"]; ?> <br>
                        <strong>Mensagem: </strong> <?php echo $row["mensagem"]; ?> <br>
                        <strong>Data e Hora: </strong> <?php echo $row["data"]. " às " . $row["hora"]; ?> <br> <br>
                    </li>
                    <?php endwhile; ?>
            </ul>
            <?php else : ?>
                <p>Nenhuma mensagem.</p>
            <?php endif; ?>
    </div>
</body>
</html>
