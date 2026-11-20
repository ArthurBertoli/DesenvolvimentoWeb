<?php
require_once __DIR__ . '/data.php';

$titulo_pagina = 'Sistema Jurídico | Consulta Rápida';
$pagina_ativa = '';
require __DIR__ . '/header.php';
?>

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
                ["titulo" => "Consultar Processo", "desc" => "Acompanhe o andamento e os trâmites do seu caso.", "icone" => "📄", "link" => "processos.php"],
                ["titulo" => "Jurisprudência", "desc" => "Consulte decisões e ementas recentes dos tribunais.", "icone" => "🏛️", "link" => "jurisprudencia.php"],
                ["titulo" => "Advogados", "desc" => "Conheça os profissionais habilitados e suas especialidades.", "icone" => "⚖️", "link" => "advogados.php"]
            ];

            foreach ($cards as $card) {
                echo "<a href='" . e($card['link']) . "' class='card card-link'>";
                echo "<div class='card-icon'>" . e($card['icone']) . "</div>";
                echo "<h3>" . e($card['titulo']) . "</h3>";
                echo "<p>" . e($card['desc']) . "</p>";
                echo "</a>";
            }
            ?>

        </div>
    </section>

<?php require __DIR__ . '/footer.php'; ?>
