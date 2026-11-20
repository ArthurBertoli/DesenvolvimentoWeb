<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Jurídico | Consulta Rápida</title>
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
                <a href="advogados.php">Advogados</a>
            </nav>
            <div class="user-actions">
                <a href="#login" class="btn btn-outline">Entrar</a>
            </div>
        </div>
    </header>

    <main class="hero-section">
        <div class="container hero-content">
            <h1>Encontre processos, leis e decisões</h1>
            <p>Acesse a informação jurídica de forma rápida, estruturada e confiável.</p>
            
            <form action="busca.php" method="GET" class="search-form">
                <input type="text" name="q" class="search-input" placeholder="Digite o número do processo, nome da parte, advogado ou lei..." required>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
    </main>

    <section class="quick-access container">
        <h2>Acesso Rápido</h2>
        <div class="cards-grid">
            
            <?php
            $cards = [
                ["titulo" => "Consultar Processo", "desc" => "Acompanhe o andamento e os trâmites do seu caso.", "icone" => "📄"],
                ["titulo" => "Diários Oficiais", "desc" => "Busque por publicações e decisões recentes.", "icone" => "🏛️"],
                ["titulo" => "Modelos de Documentos", "desc" => "Acesse petições e contratos baseados em leis.", "icone" => "✍️"]
            ];

            foreach ($cards as $card) {
                echo "<div class='card'>";
                echo "<div class='card-icon'>{$card['icone']}</div>";
                echo "<h3>{$card['titulo']}</h3>";
                echo "<p>{$card['desc']}</p>";
                echo "</div>";
            }
            ?>

        </div>
    </section>

    <footer class="main-footer">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> JusDigital - Sistema Jurídico. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>