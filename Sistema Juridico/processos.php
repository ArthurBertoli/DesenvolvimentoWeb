<?php
require_once __DIR__ . '/data.php';

$titulo_pagina = 'Processos | JusDigital';
$pagina_ativa = 'processos';
require __DIR__ . '/header.php';
?>

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
                    // Cada processo tem um 'id' usado pelo botão "Visualizar"
                    foreach ($processos as $p) {
                        echo "<tr>";
                        echo "<td><strong>" . e($p['num']) . "</strong></td>";
                        echo "<td>" . e($p['autor']) . "</td>";
                        echo "<td>" . e($p['reu']) . "</td>";
                        echo "<td>" . e($p['juiz']) . "</td>";
                        echo "<td><span class='status-badge " . e($p['classe']) . "'>" . e($p['status']) . "</span></td>";
                        echo "<td><a href='visualizar_processo.php?id=" . (int) $p['id'] . "' class='btn btn-primary btn-sm'>Visualizar</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

<?php require __DIR__ . '/footer.php'; ?>
