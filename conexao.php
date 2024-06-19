<?php
$user = 'root';
$password = ''; // Coloque a senha do usuário root se existir
$database = 'contato'; // Nome do banco de dados
$port = 3306; // Porta padrão

$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

// Exibir informações da conexão
echo '<p>A conexão com o Banco de Dados: está OK '. $mysqli->host_info.'</p>';
echo '<p>Server '.$mysqli->server_info.'</p>';
echo '<p>Initial charset: '.$mysqli->character_set_name().'</p>';

// Consulta para obter o nome do banco de dados atual
$result = $mysqli->query("SELECT DATABASE()");
if ($result) {
    $row = $result->fetch_row();
    echo '<p>Nome do banco de dados conectado: ' . $row[0] . '</p>';
} else {
    echo '<p>Não foi possível obter o nome do banco de dados.</p>';
}
?>
