<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Inclui o arquivo de conexão
    include 'conexao.php';

    // Prepara a declaração SQL
    $sql = "INSERT INTO formulariolocal (nome, email, mensagem) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind dos parâmetros
        $stmt->bind_param("sss", $nome, $email, $mensagem);

        // Executa a declaração
        if ($stmt->execute()) {
            echo "Obrigado, $nome! Sua mensagem foi enviada com sucesso.";
        } else {
            echo "Erro: " . $stmt->error;
        }

        // Fecha a declaração
        $stmt->close();
    } else {
        echo "Erro na preparação da declaração: " . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
}
?>

