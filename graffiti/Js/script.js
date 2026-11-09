// ======================================================
// 1. SAUDAÇÃO INICIAL (PROMPT E DATA)
// ======================================================
function saudacaoInicial() {
    const nomeUsuario = prompt("Bem-vindo ao GraffitiSite! Qual é o seu nome (ou vulgo)?");
    const nomeFinal = (nomeUsuario === null || nomeUsuario.trim() === "") ? "Artista" : nomeUsuario;

    const agora = new Date();
    const hora = agora.getHours();
    let saudacao = (hora >= 5 && hora < 12) ? "Bom dia" : (hora >= 12 && hora < 18) ? "Boa tarde" : "Boa noite";

    const diaSemana = agora.toLocaleDateString('pt-BR', { weekday: 'long' });
    const dataFormatada = agora.toLocaleDateString('pt-BR');

    alert(`${saudacao}, ${nomeFinal}, hoje é ${diaSemana}, ${dataFormatada}.`);
}
saudacaoInicial();

// ======================================================
// 2. MODO NEON (TROCA DE TEMA)
// ======================================================
const btnTema = document.getElementById('btnTema');
if (btnTema) {
    btnTema.addEventListener('click', function() {
        document.body.classList.toggle('neon-mode');
        btnTema.innerText = document.body.classList.contains('neon-mode') ? "Modo Normal 🌙" : "Ativar Modo Neon 💡";
    });
}

// ======================================================
// 3. FORMATADOR DE TAGS (MAIÚSCULAS)
// ======================================================
const checkbox = document.getElementById('checkMaiuscula');
const camposTexto = document.querySelectorAll('.input-tag');
if (checkbox) {
    checkbox.addEventListener('change', function() {
        camposTexto.forEach(campo => {
            campo.value = checkbox.checked ? campo.value.toUpperCase() : campo.value.toLowerCase();
        });
    });
}

// ======================================================
// 4. LÓGICA DO CANVAS (DESENHO + CAPS + RESET)
// ======================================================
const canvas = document.getElementById("meuCanvas");
const selectCap = document.getElementById('tipoCap');
const inputCor = document.getElementById('cor');
const btnLimpar = document.getElementById('btnLimpar');

if (canvas) {
    const ctx = canvas.getContext("2d");
    let desenhando = false;

    // Inicia o desenho
    canvas.addEventListener("mousedown", (e) => {
        desenhando = true;
        desenhar(e); 
    });

    // Para o desenho
    canvas.addEventListener("mouseup", () => {
        desenhando = false;
        ctx.beginPath(); // Reseta o caminho para não ligar linhas distantes
    });

    // Movimentação do mouse
    canvas.addEventListener("mousemove", desenhar);

    function desenhar(e) {
        if (!desenhando) return;

        // Pega o tamanho direto do SELECT de Caps
        ctx.lineWidth = selectCap.value;
        ctx.lineCap = "round";
        ctx.strokeStyle = inputCor.value;

        // Ajusta a posição do mouse em relação ao canvas
        const rect = canvas.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        ctx.lineTo(x, y);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(x, y);
    }

    // Botão de Limpar (Reset)
    if (btnLimpar) {
        btnLimpar.addEventListener('click', function() {
            if (confirm("Limpar o muro todo?")) {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
            }
        });
    }
}

// ======================================================
// 5. CALCULADORA DE LATAS
// ======================================================
const btnCalcular = document.getElementById('btnCalcular');
if (btnCalcular) {
    btnCalcular.addEventListener('click', function() {
        const largura = parseFloat(document.getElementById('largura').value);
        const altura = parseFloat(document.getElementById('altura').value);
        const areaResultado = document.getElementById('resultado-calc');

        if (isNaN(largura) || isNaN(altura) || largura <= 0 || altura <= 0) {
            areaResultado.innerHTML = "❌ Insira valores válidos.";
            return;
        }

        const areaTotal = largura * altura;
        const latas = Math.ceil(areaTotal / 2);
        areaResultado.innerHTML = `📊 Área: ${areaTotal.toFixed(2)}m² | 🎨 Latas: ${latas}`;
    });
}

// ======================================================
// 6. VALIDAÇÃO DO FORMULÁRIO
// ======================================================
const form = document.getElementById('formContato');
if (form) {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const nome = document.getElementById('nome').value.trim();
        const email = document.getElementById('email').value.trim();
        const estilo = document.getElementById('estilo').value.trim();
        const mensagem = document.getElementById('mensagem').value.trim();

        if (nome === '' || email === '' || estilo === '' || mensagem === '') {
            alert('Erro: Preencha todos os campos!');
        } else {
            alert('Sucesso! Salve enviado.');
            form.reset();
        }
    });
}

// ======================================================
// 7. MOSTRUÁRIO DE VIBES (FUNDO DO CANVAS)
// ======================================================
const selectFundo = document.getElementById('fundoMuro');

// Verificamos se o seletor e o canvas existem na página
if (selectFundo && canvas) {
    // Evento 'change' dispara sempre que o usuário troca a opção
    selectFundo.addEventListener('change', function() {
        // Pegamos o valor da opção (ex: "url('tijolo.jpg')")
        const novaTextura = selectFundo.value;
        
        // Aplicamos a imagem direto no estilo (CSS) do canvas
        canvas.style.backgroundImage = novaTextura;
        
        console.log("Superfície alterada para: " + novaTextura);
    });
}

// ======================================================
// 9. DICIONÁRIO DE GÍRIAS (ARRAY DE OBJETOS)
// ======================================================

const listaGirias = [
    { termo: "Toy", def: "Iniciante sem habilidade ou que desrespeita as regras da cultura." },
    { termo: "Bite", def: "Copiar o estilo, letras ou cores de outro artista." },
    { termo: "Crew", def: "Grupo de grafiteiros que se organizam para pintar juntos." },
    { termo: "Cap", def: "O bico da lata de spray que define a espessura do traço." },
    { termo: "Tag", def: "A assinatura básica do artista, a base de tudo." },
    { termo: "Bomb", def: "Graffiti rápido, feito geralmente com duas cores (contorno e preenchimento)." },
    { termo: "Piece", def: "Obra complexa, colorida e detalhada (abreviação de 'masterpiece')." },
    { termo: "Wildstyle", def: "Estilo de letras entrelaçadas, difícil de ler." },
    { termo: "Buff", def: "O ato das autoridades ou proprietários apagarem um graffiti." },
    { termo: "Blackbook", def: "Caderno de rascunhos onde o artista treina seus estilos." }
    // Adicione quantas quiser aqui...
];

const select = document.getElementById('selectGirias');
const painel = document.getElementById('painel-definicao');
const titulo = document.getElementById('termoSelecionado');
const texto = document.getElementById('textoDefinicao');

if (select) {
    // Populando o Select dinamicamente usando um Loop (Pág. 10 do PDF)
    listaGirias.forEach(item => {
        let option = document.createElement('option');
        option.value = item.termo;
        option.textContent = item.termo;
        select.appendChild(option);
    });

    // Evento onchange (Pág. 21 do PDF)
    select.addEventListener('change', function() {
        const valor = select.value;
        const achado = listaGirias.find(g => g.termo === valor);

        if (achado) {
            titulo.innerText = achado.termo;
            texto.innerText = achado.def;
            painel.classList.remove('escondido');
        } else {
            painel.classList.add('escondido');
        }
    });
}