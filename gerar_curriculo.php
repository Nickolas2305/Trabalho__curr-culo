<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_nascimento = $_POST['data_nascimento'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

    $experiencias = $_POST['empresa'] ?? [];
    $cargos = $_POST['cargo'] ?? [];
    $periodos = $_POST['periodo'] ?? [];

    $referencias = $_POST['nome_referencia'] ?? [];
    $contatos_referencia = $_POST['contato_referencia'] ?? [];

    // Converte a data de nascimento para o formato brasileiro
    $data_nascimento_formatada = date("d/m/Y", strtotime($data_nascimento));

    echo "<div style='font-family: sans-serif; max-width: 800px; margin: auto;'>";
    echo "<h1>Currículo de $nome $sobrenome</h1>";
    echo "<p><strong>Data de Nascimento:</strong> $data_nascimento_formatada</p>";
    echo "<p><strong>Idade:</strong> $idade anos</p>";
    echo "<p><strong>E-mail:</strong> $email</p>";
    echo "<p><strong>Endereço:</strong> $endereco</p>";
    echo "<p><strong>Telefone:</strong> $telefone</p>";

    echo "<h2>Experiências Profissionais</h2>";
    if (!empty($experiencias)) {
        foreach ($experiencias as $index => $empresa) {
            echo "<p><strong>Empresa:</strong> $empresa</p>";
            echo "<p><strong>Cargo:</strong> " . $cargos[$index] . "</p>";
            echo "<p><strong>Período:</strong> " . $periodos[$index] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "<p>Sem experiências profissionais cadastradas.</p>";
    }

    echo "<h2>Referências Pessoais</h2>";
    if (!empty($referencias)) {
        foreach ($referencias as $index => $nome_referencia) {
            echo "<p><strong>Nome:</strong> $nome_referencia</p>";
            echo "<p><strong>Contato:</strong> " . $contatos_referencia[$index] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "<p>Sem referências pessoais cadastradas.</p>";
    }

    // Botão de Imprimir/Salvar como PDF
    echo "<button type='button' class='btn btn-info' onclick='window.print();' style='margin-top: 20px;'>Imprimir/Salvar como PDF</button>";

    echo "</div>";
}
?>
