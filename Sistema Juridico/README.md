# JusDigital — Sistema Jurídico

> Projeto da disciplina **Desenvolvimento Web** — Ciência da Computação, UDESC.

## Sobre

Site de consulta jurídica feito em PHP, com páginas de processos, jurisprudência e advogados. Os dados são fictícios e ficam em arrays PHP no arquivo `data.php`, simulando um banco de dados; as páginas incluem esse arquivo e percorrem os arrays para montar tabelas e cartões em HTML.

## Funcionalidades

- Página inicial com campo de busca e cartões de acesso rápido (links para processos, jurisprudência e advogados).
- Busca (`busca.php?q=...`) em processos, jurisprudência e advogados, sem diferenciar maiúsculas/minúsculas nem acentos; números de processo também são encontrados digitando só os dígitos.
- Lista de processos em tabela (número, autor, réu, magistrado e status com selo colorido).
- Página de detalhes do processo (`visualizar_processo.php?id=...`) com vara, data de autuação e histórico de trâmites, e mensagem de "processo não encontrado" para ids inexistentes.
- Lista de jurisprudência com tribunal, relator, data e ementa de cada decisão.
- Cartões dos advogados com OAB, especialidade e botão para enviar e-mail.
- Cabeçalho com logo, navegação e atalho para a busca, e rodapé com o ano atual gerado pelo PHP.
- Todo texto exibido (inclusive o termo buscado) passa por `htmlspecialchars`.

## Tecnologias

- PHP
- HTML5 e CSS3
- Fonte Inter (Google Fonts)

## Estrutura

| Arquivo | Descrição |
|---|---|
| `index.php` | Página inicial com busca e acesso rápido |
| `busca.php` | Resultados da busca em processos, jurisprudência e advogados |
| `processos.php` | Tabela de processos judiciais |
| `visualizar_processo.php` | Detalhes e histórico de um processo |
| `jurisprudencia.php` | Lista de decisões e ementas |
| `advogados.php` | Cartões dos advogados |
| `data.php` | Dados fictícios (arrays) e funções auxiliares de escape e busca |
| `header.php` / `footer.php` | Cabeçalho e rodapé comuns a todas as páginas |
| `assets/img/logo-sistema.svg` | Logo do sistema (balança) |
| `style.css` | Estilos de todas as páginas |

## Como executar

Com o PHP (7.4 ou superior) instalado, rode dentro desta pasta:

```bash
php -S localhost:8000
```

Depois acesse `http://localhost:8000` no navegador. Também funciona em qualquer servidor com PHP, como o XAMPP (copiando a pasta para `htdocs`).

## Autores

Arthur Bertoli
