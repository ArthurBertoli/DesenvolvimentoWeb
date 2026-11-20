<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Processo | JusDigital</title>
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
        <a href="processos.php" class="btn btn-outline btn-sm mb-20">&larr; Voltar para Processos</a>

        <?php
        // Captura o ID da URL
        $id_processo = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        // Simulando banco de dados com detalhes extras
        $banco_processos = [
            1 => ["num" => "5002314-82.2026.8.24.0038", "autor" => "Carlos Eduardo Souza", "reu" => "Banco Sul S/A", "juiz" => "Dr. Alexandre Morais", "status" => "Em Andamento", "classe" => "status-progress", "vara" => "3ª Vara Cível", "data_inicio" => "10/01/2026"],
            2 => ["num" => "0312455-19.2025.8.24.0038", "autor" => "Mariana Alcantara", "reu" => "Estado de Santa Catarina", "juiz" => "Dra. Helena Rios", "status" => "Julgado", "classe" => "status-success", "vara" => "1ª Vara da Fazenda Pública", "data_inicio" => "15/03/2025"],
            3 => ["num" => "5019842-11.2026.8.24.0038", "autor" => "Roberto Alencar", "reu" => "Tech Soluções Ltda", "juiz" => "Dr. Alexandre Morais", "status" => "Suspenso", "classe" => "status-warning", "vara" => "3ª Vara Cível", "data_inicio" => "05/02/2026"]
        ];

        // Se o processo existir, mostra. Se não, exibe erro.
        if (array_key_exists($id_processo, $banco_processos)) {
            $p = $banco_processos[$id_processo];
        ?>

        <div class="process-details-card">
            <div class="process-header-info">
                <div>
                    <h2>Processo Nº <?php echo $p['num']; ?></h2>
                    <p class="text-muted"><?php echo $p['vara']; ?> - Magistrado(a): <?php echo $p['juiz']; ?></p>
                </div>
                <div>
                    <span class="status-badge <?php echo $p['classe']; ?>"><?php echo $p['status']; ?></span>
                </div>
            </div>

            <div class="process-parties">
                <p><strong>Autor (Requerente):</strong> <?php echo $p['autor']; ?></p>
                <p><strong>Réu (Requerido):</strong> <?php echo $p['reu']; ?></p>
                <p><strong>Data de Autuação:</strong> <?php echo $p['data_inicio']; ?></p>
            </div>

            <hr class="divider">

            <h3>Histórico de Trâmites</h3>
            <div class="timeline">
                <div class="timeline-item">
                    <span class="timeline-date">Hoje</span>
                    <p>Conclusos para Despacho ao Juiz.</p>
                </div>
                <div class="timeline-item">
                    <span class="timeline-date">Há 5 dias</span>
                    <p>Juntada de Petição de Manifestação da Parte Autora.</p>
                </div>
                <div class="timeline-item">
                    <span class="timeline-date"><?php echo $p['data_inicio']; ?></span>
                    <p>Distribuição do processo por Sorteio.</p>
                </div>
            </div>
        </div>

        <?php } else { ?>
            <div class="process-details-card">
                <h2>Processo não encontrado.</h2>
                <p>O número de processo solicitado não existe no nosso sistema.</p>
            </div>
        <?php } ?>

    </main>

    <footer class="main-footer">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> JusDigital - Sistema Jurídico. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>