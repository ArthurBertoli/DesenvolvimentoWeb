<?php
require_once __DIR__ . '/data.php';

$titulo_pagina = 'Jurisprudência | JusDigital';
$pagina_ativa = 'jurisprudencia';
require __DIR__ . '/header.php';
?>

    <main class="content-section container">
        <div class="page-header">
            <h2>Jurisprudência e Decisões</h2>
            <p>Repositório de acórdãos, ementas e súmulas dos tribunais parceiros.</p>
        </div>

        <div class="juris-list">
            <?php
            foreach ($decisoes as $d) {
                echo "<div class='juris-card'>";
                echo "<h3>" . e($d['titulo']) . "</h3>";
                echo "<div class='juris-meta'><span><strong>Tribunal:</strong> " . e($d['tribunal']) . "</span> | <span><strong>Relator:</strong> " . e($d['relator']) . "</span> | <span><strong>Julgado em:</strong> " . e($d['data']) . "</span></div>";
                echo "<p class='juris-ementa'><strong>Ementa:</strong> " . e($d['ementa']) . "</p>";
                echo "</div>";
            }
            ?>
        </div>
    </main>

<?php require __DIR__ . '/footer.php'; ?>
