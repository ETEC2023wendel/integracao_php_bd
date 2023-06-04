<?php
// Dados de conexão ao banco de dados
$host = 'localhost';
$usuario = 'root';
$senha = '';
$bancoDados = 'corinthians';

// Criar conexão
$conexao = new mysqli($host, $usuario, $senha, $bancoDados);

// Verificar se a conexão foi estabelecida com sucesso
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// Executar uma consulta SELECT na tabela "jogadores"
$sql = "SELECT nomeJogador, NumCamisa, Posicao FROM jogadores";
$resultado = $conexao->query($sql);

// Verificar se ocorreu um erro na consulta
if (!$resultado) {
    die("Erro na consulta: " . $conexao->error);
}

// Verificar se a consulta retornou resultados
if ($resultado->num_rows > 0) {
    // Iterar sobre os resultados e exibi-los
    while ($row = $resultado->fetch_assoc()) {
        echo "<br><table><b>Nome do Jogador: </b>" . $row['nomeJogador'] . "<br><b>Nº Camisa: </b> " . $row['NumCamisa'] . "<br><b>Posição: </b> " . $row['Posicao'] . "<br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}

// Fechar a conexão
$conexao->close();
?>