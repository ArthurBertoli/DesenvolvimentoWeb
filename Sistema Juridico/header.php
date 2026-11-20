<?php
/*
 * Cabeçalho comum a todas as páginas.
 * Antes de incluir, a página pode definir:
 *   $titulo_pagina - texto da tag <title>
 *   $pagina_ativa  - 'processos', 'jurisprudencia', 'advogados' ou 'busca'
 */
$titulo_pagina = isset($titulo_pagina) ? $titulo_pagina : 'JusDigital';
$pagina_ativa = isset($pagina_ativa) ? $pagina_ativa : '';

$links_menu = [
    'processos' => ['href' => 'processos.php', 'texto' => 'Processos'],
    'jurisprudencia' => ['href' => 'jurisprudencia.php', 'texto' => 'Jurisprudência'],
    'advogados' => ['href' => 'advogados.php', 'texto' => 'Advogados']
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($titulo_pagina); ?></title>
    <link rel="icon" href="assets/img/logo-sistema.svg" type="image/svg+xml">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <header class="top-header">
        <div class="container header-content">
            <a href="index.php" class="logo">
                <img src="assets/img/logo-sistema.svg" alt="Logo Sistema Jurídico" class="logo-img">
                <span class="logo-text">Jus<strong>Digital</strong></span>
            </a>
            <nav class="main-nav">
                <?php foreach ($links_menu as $chave => $link) { ?>
                <a href="<?php echo e($link['href']); ?>"<?php echo $chave === $pagina_ativa ? ' class="active"' : ''; ?>><?php echo e($link['texto']); ?></a>
                <?php } ?>
            </nav>
            <div class="user-actions">
                <a href="busca.php" class="btn btn-outline">Buscar</a>
            </div>
        </div>
    </header>
