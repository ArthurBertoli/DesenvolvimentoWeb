<?php
require_once __DIR__ . '/data.php';

// Termo buscado (vem do formulário da página inicial: busca.php?q=...)
$termo = (isset($_GET['q']) && is_string($_GET['q'])) ? trim($_GET['q']) : '';
$buscou = ($termo !== '');

$res_processos = [];
$res_decisoes = [];
$res_advogados = [];

if ($buscou) {
    foreach ($processos as $p) {
        if (registro_corresponde($p, ['num', 'autor', 'reu', 'juiz', 'status', 'vara'], $termo)) {
            $res_processos[] = $p;
        }
    }

    foreach ($decisoes as $d) {
        if (registro_corresponde($d, ['titulo', 'tribunal', 'relator', 'ementa'], $termo)) {
            $res_decisoes[] = $d;
        }
    }

    foreach ($advogados as $adv) {
        if (registro_corresponde($adv, ['nome', 'oab', 'especialidade', 'email'], $termo)) {
            $res_advogados[] = $adv;
        }
    }
}

$total = count($res_processos) + count($res_decisoes) + count($res_advogados);

$titulo_pagina = $buscou ? 'Busca: ' . $termo . ' | JusDigital' : 'Busca | JusDigital';
$pagina_ativa = 'busca';
require __DIR__ . '/header.php';
?>

    <main class="content-section container">
        <div class="page-header">
            <h2>Busca</h2>
            <p>Pesquise por número do processo, nome das partes, magistrado, advogado, OAB ou termos da ementa.</p>
        </div>

        <form action="busca.php" method="GET" class="search-form search-form-page">
            <input type="text" name="q" class="search-input" value="<?php echo e($termo); ?>" placeholder="Digite o número do processo, nome da parte, advogado ou lei..." required>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <?php if (!$buscou) { ?>

            <div class="process-details-card empty-state">
                <p>Digite um termo no campo acima para buscar em processos, jurisprudência e advogados.</p>
            </div>

        <?php } elseif ($total === 0) { ?>

            <div class="process-details-card empty-state">
                <h3>Nenhum resultado encontrado</h3>
                <p>Não encontramos nada para &ldquo;<strong><?php echo e($termo); ?></strong>&rdquo;. Tente outro termo, como parte do número do processo ou o nome de uma das partes.</p>
            </div>

        <?php } else { ?>

            <p class="search-summary">
                <?php echo $total === 1 ? '1 resultado encontrado' : $total . ' resultados encontrados'; ?>
                para &ldquo;<strong><?php echo e($termo); ?></strong>&rdquo;.
            </p>

            <?php if (count($res_processos) > 0) { ?>
            <section class="result-group">
                <h3>Processos (<?php echo count($res_processos); ?>)</h3>
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
                            <?php foreach ($res_processos as $p) { ?>
                            <tr>
                                <td><strong><?php echo e($p['num']); ?></strong></td>
                                <td><?php echo e($p['autor']); ?></td>
                                <td><?php echo e($p['reu']); ?></td>
                                <td><?php echo e($p['juiz']); ?></td>
                                <td><span class="status-badge <?php echo e($p['classe']); ?>"><?php echo e($p['status']); ?></span></td>
                                <td><a href="visualizar_processo.php?id=<?php echo (int) $p['id']; ?>" class="btn btn-primary btn-sm">Visualizar</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
            <?php } ?>

            <?php if (count($res_decisoes) > 0) { ?>
            <section class="result-group">
                <h3>Jurisprudência (<?php echo count($res_decisoes); ?>)</h3>
                <div class="juris-list">
                    <?php foreach ($res_decisoes as $d) { ?>
                    <div class="juris-card">
                        <h3><?php echo e($d['titulo']); ?></h3>
                        <div class="juris-meta"><span><strong>Tribunal:</strong> <?php echo e($d['tribunal']); ?></span> | <span><strong>Relator:</strong> <?php echo e($d['relator']); ?></span> | <span><strong>Julgado em:</strong> <?php echo e($d['data']); ?></span></div>
                        <p class="juris-ementa"><strong>Ementa:</strong> <?php echo e($d['ementa']); ?></p>
                    </div>
                    <?php } ?>
                </div>
            </section>
            <?php } ?>

            <?php if (count($res_advogados) > 0) { ?>
            <section class="result-group">
                <h3>Advogados (<?php echo count($res_advogados); ?>)</h3>
                <div class="advogados-grid">
                    <?php foreach ($res_advogados as $adv) { ?>
                    <div class="adv-card">
                        <div class="adv-avatar">⚖️</div>
                        <h3><?php echo e($adv['nome']); ?></h3>
                        <p class="adv-oab"><?php echo e($adv['oab']); ?></p>
                        <p class="adv-spec"><strong>Especialidade:</strong> <?php echo e($adv['especialidade']); ?></p>
                        <p class="adv-email">✉️ <?php echo e($adv['email']); ?></p>
                        <a href="mailto:<?php echo e($adv['email']); ?>" class="btn btn-outline btn-block">Enviar e-mail</a>
                    </div>
                    <?php } ?>
                </div>
            </section>
            <?php } ?>

        <?php } ?>
    </main>

<?php require __DIR__ . '/footer.php'; ?>
