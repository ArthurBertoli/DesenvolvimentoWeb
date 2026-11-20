<?php
/*
 * Dados fictícios do sistema (simulam um banco de dados) e funções auxiliares.
 * Incluído por todas as páginas para que os mesmos arrays sejam usados nas
 * listagens, na página de detalhes e na busca.
 */

date_default_timezone_set('America/Sao_Paulo');

// Processos, indexados pelo id usado em visualizar_processo.php?id=...
$processos = [
    1 => ["id" => 1, "num" => "5002314-82.2026.8.24.0038", "autor" => "Carlos Eduardo Souza", "reu" => "Banco Sul S/A", "juiz" => "Dr. Alexandre Morais", "status" => "Em Andamento", "classe" => "status-progress", "vara" => "3ª Vara Cível", "data_inicio" => "10/01/2026"],
    2 => ["id" => 2, "num" => "0312455-19.2025.8.24.0038", "autor" => "Mariana Alcantara", "reu" => "Estado de Santa Catarina", "juiz" => "Dra. Helena Rios", "status" => "Julgado", "classe" => "status-success", "vara" => "1ª Vara da Fazenda Pública", "data_inicio" => "15/03/2025"],
    3 => ["id" => 3, "num" => "5019842-11.2026.8.24.0038", "autor" => "Roberto Alencar", "reu" => "Tech Soluções Ltda", "juiz" => "Dr. Alexandre Morais", "status" => "Suspenso", "classe" => "status-warning", "vara" => "3ª Vara Cível", "data_inicio" => "05/02/2026"]
];

// Decisões (jurisprudência)
$decisoes = [
    [
        "titulo" => "Apelação Cível nº 101239-44 - Direito do Consumidor",
        "tribunal" => "TJSC - Terceira Câmara de Direito Civil",
        "relator" => "Des. Ricardo Volpato",
        "data" => "14/05/2026",
        "ementa" => "RESPONSABILIDADE CIVIL. INSTITUIÇÃO FINANCEIRA. NEGATIVAÇÃO INDEVIDA NOS ÓRGÃOS DE PROTEÇÃO AO CRÉDITO. DANO MORAL CONFIGURADO IN RE IPSA. QUANTUM INDENIZATÓRIO MANTIDO. RECURSO DESPROVIDO."
    ],
    [
        "titulo" => "Recurso Inominado nº 500344-12 - Direito Digital",
        "tribunal" => "Turma Recursal dos Juizados Especiais",
        "relator" => "Dra. Cláudia Maria",
        "data" => "02/06/2026",
        "ementa" => "AÇÃO INDENIZATÓRIA. VAZAMENTO DE DADOS PESSOAIS. FALHA NA SEGURANÇA DA PLATAFORMA CONFIGURADA. INFRAÇÃO À LEI GERAL DE PROTEÇÃO DE DADOS (LGPD). DEVER DE REPARAR OS DANOS EXTRAPATRIMONIAIS."
    ]
];

// Advogados
$advogados = [
    ["nome" => "Dr. Adriano Silva", "oab" => "OAB/SC 45.123", "especialidade" => "Direito Civil e Contratos", "email" => "adriano@jusdigital.adv.br"],
    ["nome" => "Dra. Júlia Llorente", "oab" => "OAB/SC 51.984", "especialidade" => "Direito Digital e LGPD", "email" => "julia@jusdigital.adv.br"],
    ["nome" => "Dr. Herton Silveira", "oab" => "OAB/SC 38.741", "especialidade" => "Direito Público e Administrativo", "email" => "herton@jusdigital.adv.br"]
];

/**
 * Escapa um valor para saída segura em HTML (texto e atributos).
 */
function e($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}

/**
 * Normaliza um texto para comparação na busca: minúsculas e sem acentos.
 * Funciona mesmo sem a extensão mbstring habilitada.
 */
function normalizar_texto($texto)
{
    $texto = (string) $texto;
    $texto = function_exists('mb_strtolower') ? mb_strtolower($texto, 'UTF-8') : strtolower($texto);

    $mapa = [
        'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
        'Á' => 'a', 'À' => 'a', 'Â' => 'a', 'Ã' => 'a', 'Ä' => 'a',
        'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e',
        'É' => 'e', 'È' => 'e', 'Ê' => 'e', 'Ë' => 'e',
        'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i',
        'Í' => 'i', 'Ì' => 'i', 'Î' => 'i', 'Ï' => 'i',
        'ó' => 'o', 'ò' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o',
        'Ó' => 'o', 'Ò' => 'o', 'Ô' => 'o', 'Õ' => 'o', 'Ö' => 'o',
        'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u',
        'Ú' => 'u', 'Ù' => 'u', 'Û' => 'u', 'Ü' => 'u',
        'ç' => 'c', 'Ç' => 'c', 'ñ' => 'n', 'Ñ' => 'n',
        'ª' => 'a', 'º' => 'o'
    ];

    return strtr($texto, $mapa);
}

/**
 * Verifica se o termo buscado aparece em algum dos campos informados do registro.
 * Para números de processo, também compara apenas os dígitos
 * (ex.: "50023148220268240038" encontra "5002314-82.2026.8.24.0038").
 */
function registro_corresponde($registro, $campos, $termo)
{
    $termo_normalizado = normalizar_texto(trim($termo));
    if ($termo_normalizado === '') {
        return false;
    }
    $termo_digitos = preg_replace('/\D/', '', $termo);

    foreach ($campos as $campo) {
        if (!isset($registro[$campo])) {
            continue;
        }
        $valor = (string) $registro[$campo];

        if (strpos(normalizar_texto($valor), $termo_normalizado) !== false) {
            return true;
        }

        if (strlen($termo_digitos) >= 4 && strpos(preg_replace('/\D/', '', $valor), $termo_digitos) !== false) {
            return true;
        }
    }

    return false;
}
