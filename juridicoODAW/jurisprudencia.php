<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurisprudência | JusDigital</title>
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
                <a href="jurisprudencia.php" class="active">Jurisprudência</a>
                <a href="advogados.php">Advogados</a>
            </nav>
            <div class="user-actions">
                <a href="#login" class="btn btn-outline">Entrar</a>
            </div>
        </div>
    </header>

    <main class="content-section container">
        <div class="page-header">
            <h2>Jurisprudência e Decisões</h2>
            <p>Repositório de acórdãos, ementas e súmulas dos tribunais parceiros.</p>
        </div>

        <div class="juris-list">
            <?php
            $decisoes = [
                [
                    "titulo" => "Apelação Cível nº 101239-44 - Direito do Consumidor", 
                    "tribunal" => "TJSC - Terceira Câmara de Direito Civil", 
                    "relator" => "Des. Ricardo Volpato",
                    "data" => "14/05/2026",
                    "ementa" => "RESPONSABILIDADE CÍVIL. INSTITUIÇÃO FINANCEIRA. NEGATIVAÇÃO INDEVIDA NOS ÓRGÃOS DE PROTEÇÃO AO CRÉDITO. DANO MORAL CONFIGURADO IN RE IPSA. QUANTUM INDENIZATÓRIO MANTIDO. RECURSO DESPROVIDO."
                ],
                [
                    "titulo" => "Recurso Inominado nº 500344-12 - Direito Digital", 
                    "tribunal" => "Turma Recursal dos Juizados Especiais", 
                    "relator" => "Dra. Cláudia Maria",
                    "data" => "02/06/2026",
                    "ementa" => "AÇÃO INDENIZATÓRIA. VAZAMENTO DE DADOS PESSOAIS. FALHA NA SEGURANÇA DA PLATAFORMA CONFIGURADA. INFRAÇÃO À LEI GERAL DE PROTEÇÃO DE DADOS (LGPD). DEVER DE REPARAR OS DANOS EXTRAPATRIMONIAIS."
                ]
            ];

            foreach ($decisoes as $d) {
                echo "<div class='juris-card'>";
                echo "<h3>{$d['titulo']}</h3>";
                echo "<div class='juris-meta'><span><strong>Tribunal:</strong> {$d['tribunal']}</span> | <span><strong>Relator:</strong> {$d['relator']}</span> | <span><strong>Julgado em:</strong> {$d['data']}</span></div>";
                echo "<p class='juris-ementa'><strong>Ementa:</strong> {$d['ementa']}</p>";
                echo "<a href='#' class='btn-link'>Ler acórdão na íntegra &rarr;</a>";
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