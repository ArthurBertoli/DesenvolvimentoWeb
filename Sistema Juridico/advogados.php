<?php
require_once __DIR__ . '/data.php';

$titulo_pagina = 'Advogados | JusDigital';
$pagina_ativa = 'advogados';
require __DIR__ . '/header.php';
?>

    <main class="content-section container">
        <div class="page-header">
            <h2>Corpo Técnico de Advogados</h2>
            <p>Profissionais vinculados e habilitados para a representação jurídica e acompanhamento processual.</p>
        </div>

        <div class="advogados-grid">
            <?php
            foreach ($advogados as $adv) {
                echo "<div class='adv-card'>";
                echo "<div class='adv-avatar'>⚖️</div>";
                echo "<h3>" . e($adv['nome']) . "</h3>";
                echo "<p class='adv-oab'>" . e($adv['oab']) . "</p>";
                echo "<p class='adv-spec'><strong>Especialidade:</strong> " . e($adv['especialidade']) . "</p>";
                echo "<p class='adv-email'>✉️ " . e($adv['email']) . "</p>";
                echo "<a href='mailto:" . e($adv['email']) . "' class='btn btn-outline btn-block'>Enviar e-mail</a>";
                echo "</div>";
            }
            ?>
        </div>
    </main>

<?php require __DIR__ . '/footer.php'; ?>
