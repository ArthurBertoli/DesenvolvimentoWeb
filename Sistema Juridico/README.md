# JusDigital — Sistema Jurídico

> Projeto da disciplina **Desenvolvimento Web** — Ciência da Computação, UDESC.

## Sobre

Site de consulta jurídica feito em PHP, com páginas de processos, jurisprudência e advogados. Os dados são fictícios e ficam em arrays PHP dentro de cada página, simulando um banco de dados; o PHP percorre esses arrays para montar tabelas e cartões em HTML.

## Funcionalidades

- Página inicial com campo de busca e cartões de acesso rápido.
- Lista de processos em tabela (número, autor, réu, magistrado e status com selo colorido).
- Página de detalhes do processo (`visualizar_processo.php?id=...`) com vara, data de autuação e histórico de trâmites, e mensagem de "processo não encontrado" para ids inexistentes.
- Lista de jurisprudência com tribunal, relator, data e ementa de cada decisão.
- Cartões dos advogados com OAB, especialidade e e-mail.
- Cabeçalho com navegação e rodapé com o ano atual gerado pelo PHP.

Observações: o formulário de busca envia para `busca.php`, que não faz parte do projeto, e os botões "Entrar", "Ver Perfil" e "Ler acórdão na íntegra" ainda não levam a nenhuma página. O logo (`assets/img/logo-sistema.svg`) também não está incluído e fica oculto quando não é encontrado.

## Tecnologias

- PHP
- HTML5 e CSS3
- Fonte Inter (Google Fonts)

## Estrutura

| Arquivo | Descrição |
|---|---|
| `index.php` | Página inicial com busca e acesso rápido |
| `processos.php` | Tabela de processos judiciais |
| `visualizar_processo.php` | Detalhes e histórico de um processo |
| `jurisprudencia.php` | Lista de decisões e ementas |
| `advogados.php` | Cartões dos advogados |
| `style.css` | Estilos de todas as páginas |

## Como executar

Com o PHP instalado, rode dentro desta pasta:

```bash
php -S localhost:8000
```

Depois acesse `http://localhost:8000` no navegador. Também funciona em qualquer servidor com PHP, como o XAMPP (copiando a pasta para `htdocs`).

## Autores

Arthur Bertoli
