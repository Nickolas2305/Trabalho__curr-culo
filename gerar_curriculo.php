<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_nascimento = date('d/m/Y', strtotime($_POST['data_nascimento']));
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $escolaridade = $_POST['escolaridade'];
    $estado_civil = $_POST['estado_civil'];

    $experiencias = $_POST['empresa'] ?? [];
    $cargos = $_POST['cargo'] ?? [];
    $periodos = $_POST['periodo'] ?? [];

    echo "<div style='font-family: sans-serif; max-width: 800px; margin: auto;'>";
    echo "<h1>Currículo de $nome $sobrenome</h1>";
    echo "<p><strong>Data de Nascimento:</strong> $data_nascimento</p>";
    echo "<p><strong>Idade:</strong> $idade anos</p>";
    echo "<p><strong>E-mail:</strong> $email</p>";
    echo "<p><strong>Endereço:</strong> $endereco</p>";
    echo "<p><strong>Telefone:</strong> $telefone</p>";
    echo "<p><strong>Escolaridade:</strong> $escolaridade</p>";
    echo "<p><strong>Estado Civil:</strong> $estado_civil</p>";

    echo "<h2>Experiências Profissionais</h2>";
    if (!empty($experiencias)) {
        foreach ($experiencias as $index => $empresa) {
            $cargo = $cargos[$index];
            $periodo = $periodos[$index];
            echo "<p><strong>Empresa:</strong> $empresa</p>";
            echo "<p><strong>Cargo:</strong> $cargo</p>";
            echo "<p><strong>Período:</strong> $periodo</p>";
            echo "<hr>";
        }
    } else {
        echo "<p>Nenhuma experiência profissional informada.</p>";
    }

    // Botão de Imprimir/Salvar como PDF
    echo "<button type='button' class='btn btn-info' onclick='window.print();' style='margin-top: 20px;'>Imprimir/Salvar como PDF</button>";

    echo "</div>";
}
?>
