<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processos | JusDigital</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <header class="top-header">
        <div class="container header-content">
            <a href="index.php" class="logo">
                <img src="assets/img/logo-sistema.svg" alt="Logo Sistema Jurídico" class="logo-img" onerror="this.style.display='none';">
                <span class="logo-text">Jus<strong>Digital</strong></span>
            </a>
            <nav class="main-nav">
                <a href="processos.php" class="active">Processos</a>
                <a href="jurisprudencia.php">Jurisprudência</a>
                <a href="advogados.php">Advogados</a>
            </nav>
            <div class="user-actions">
                <a href="#login" class="btn btn-outline">Entrar</a>
            </div>
        </div>
    </header>

    <main class="content-section container">
        <div class="page-header">
            <h2>Consulta de Processos Judiciais</h2>
            <p>Gerenciamento e histórico cronológico dos trâmites ativos e arquivados.</p>
        </div>

        <div class="table-responsive shadow-sm">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nº do Processo</th>
                        <th>Autor (Requerente)</th>
                        <th>Réu (Requerido)</th>
                        <th>Magistrado</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Adicionamos um 'id' para cada processo para o botão funcionar
                    $processos = [
                        ["id" => 1, "num" => "5002314-82.2026.8.24.0038", "autor" => "Carlos Eduardo Souza", "reu" => "Banco Sul S/A", "juiz" => "Dr. Alexandre Morais", "status" => "Em Andamento", "classe" => "status-progress"],
                        ["id" => 2, "num" => "0312455-19.2025.8.24.0038", "autor" => "Mariana Alcantara", "reu" => "Estado de Santa Catarina", "juiz" => "Dra. Helena Rios", "status" => "Julgado", "classe" => "status-success"],
                        ["id" => 3, "num" => "5019842-11.2026.8.24.0038", "autor" => "Roberto Alencar", "reu" => "Tech Soluções Ltda", "juiz" => "Dr. Alexandre Morais", "status" => "Suspenso", "classe" => "status-warning"]
                    ];

                    foreach ($processos as $p) {
                        echo "<tr>";
                        echo "<td><strong>{$p['num']}</strong></td>";
                        echo "<td>{$p['autor']}</td>";
                        echo "<td>{$p['reu']}</td>";
                        echo "<td>{$p['juiz']}</td>";
                        echo "<td><span class='status-badge {$p['classe']}'>{$p['status']}</span></td>";
                        // Botão melhorado chamando a nova página com o ID
                        echo "<td><a href='visualizar_processo.php?id={$p['id']}' class='btn btn-primary btn-sm'>Visualizar</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="main-footer">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> JusDigital - Sistema Jurídico. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>