<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advogados | JusDigital</title>
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
                <a href="processos.php">Processos</a>
                <a href="jurisprudencia.php">Jurisprudência</a>
                <a href="advogados.php" class="active">Advogados</a>
            </nav>
            <div class="user-actions">
                <a href="#login" class="btn btn-outline">Entrar</a>
            </div>
        </div>
    </header>

    <main class="content-section container">
        <div class="page-header">
            <h2>Corpo Técnico de Advogados</h2>
            <p>Profissionais vinculados e habilitados para a representação jurídica e acompanhamento processual.</p>
        </div>

        <div class="advogados-grid">
            <?php
            $advogados = [
                ["nome" => "Dr. Adriano Silva", "oab" => "OAB/SC 45.123", "especialidade" => "Direito Civil e Contratos", "email" => "adriano@jusdigital.adv.br"],
                ["nome" => "Dra. Júlia Llorente", "oab" => "OAB/SC 51.984", "especialidade" => "Direito Digital e LGPD", "email" => "julia@jusdigital.adv.br"],
                ["nome" => "Dr. Herton Silveira", "oab" => "OAB/SC 38.741", "especialidade" => "Direito Público e Administrativo", "email" => "herton@jusdigital.adv.br"]
            ];

            foreach ($advogados as $adv) {
                echo "<div class='adv-card'>";
                echo "<div class='adv-avatar'>⚖️</div>";
                echo "<h3>{$adv['nome']}</h3>";
                echo "<p class='adv-oab'>{$adv['oab']}</p>";
                echo "<p class='adv-spec'><strong>Especialidade:</strong> {$adv['especialidade']}</p>";
                echo "<p class='adv-email'>✉️ {$adv['email']}</p>";
                echo "<a href='#' class='btn btn-outline' style='margin-top: 15px; display: inline-block; width: 100%; text-align: center;'>Ver Perfil</a>";
                echo "</div>";
            }
            ?>
        </div>
    </main>

    <footer class="main-footer">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> JusDigital - Sistema Jurídico. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>