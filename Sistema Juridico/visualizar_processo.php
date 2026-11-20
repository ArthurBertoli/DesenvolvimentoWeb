<?php
require_once __DIR__ . '/data.php';

// Captura o ID da URL (convertido para inteiro)
$id_processo = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$p = isset($processos[$id_processo]) ? $processos[$id_processo] : null;

if ($p === null) {
    http_response_code(404);
}

$titulo_pagina = 'Detalhes do Processo | JusDigital';
$pagina_ativa = 'processos';
require __DIR__ . '/header.php';
?>

    <main class="content-section container">
        <a href="processos.php" class="btn btn-outline btn-sm mb-20">&larr; Voltar para Processos</a>

        <?php if ($p !== null) { ?>

        <div class="process-details-card">
            <div class="process-header-info">
                <div>
                    <h2>Processo Nº <?php echo e($p['num']); ?></h2>
                    <p class="text-muted"><?php echo e($p['vara']); ?> - Magistrado(a): <?php echo e($p['juiz']); ?></p>
                </div>
                <div>
                    <span class="status-badge <?php echo e($p['classe']); ?>"><?php echo e($p['status']); ?></span>
                </div>
            </div>

            <div class="process-parties">
                <p><strong>Autor (Requerente):</strong> <?php echo e($p['autor']); ?></p>
                <p><strong>Réu (Requerido):</strong> <?php echo e($p['reu']); ?></p>
                <p><strong>Data de Autuação:</strong> <?php echo e($p['data_inicio']); ?></p>
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
                    <span class="timeline-date"><?php echo e($p['data_inicio']); ?></span>
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

<?php require __DIR__ . '/footer.php'; ?>
