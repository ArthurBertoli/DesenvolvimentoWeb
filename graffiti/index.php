<?php
// ======================================================
// LÓGICA DE SERVIDOR (PHP)
// ======================================================

// 1. Inicia a Sessão
session_start();

// 2. Configura fuso horário e pega Data/Hora
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = date('d/m/Y');
$hora_agora = date('H:i');
$texto_data = "Hoje é $data_hoje e agora são {$hora_agora}h";

// 3. Função com manipulação de Strings e Arrays
function formatarEstiloDestaque($texto) {
    $estilos = explode(",", $texto); 
    $sorteado = $estilos[array_rand($estilos)]; 
    return strtoupper(trim($sorteado));
}
$estilo_sugerido = formatarEstiloDestaque("Wildstyle, Tag, Bomb, Piece, Throw-up");

// 4. Contador de visitas via arquivo TXT
$arquivo_txt = "contador.txt";
if (!file_exists($arquivo_txt)) {
    file_put_contents($arquivo_txt, "0");
}
$total_visitas = (int)file_get_contents($arquivo_txt);
$total_visitas++;
file_put_contents($arquivo_txt, $total_visitas);

// 5. Cookie (Expira em 1 dia)
setcookie("visita_arthur", "ativo", time() + 86400, "/");

// 6. Lógica de saudação da sessão
if (!isset($_SESSION['usuario_nome'])) {
    $_SESSION['usuario_nome'] = "Escritor Anônimo";
    $status_sessao = "Nova sessão iniciada.";
} else {
    $status_sessao = "Sessão ativa para: " . $_SESSION['usuario_nome'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estilos de Graffiti</title>
    <!-- CSS na pasta css/ -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Favicon na pasta img/ -->
    <link rel="icon" type="image/x-icon" href="img/tinta-spray.png">
</head>
<body>

  <header>
    <div style="background: rgba(0,0,0,0.8); color: #0f0; padding: 10px; text-align: center; font-family: monospace; font-size: 0.9rem;">
        <span><?php echo $texto_data; ?></span> | 
        <span>🚀 <?php echo $status_sessao; ?></span>
    </div>

    <nav>
      <div class="theme-switch">
        <button id="btnTema">Ativar Modo Neon 💡</button>
      </div>

      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#imagens">Imagens</a></li>
        <li><a href="galeria.html">Galeria</a></li>
        <li><a href="#contato">Contato</a></li>
      </ul>
    </nav>

    <h1>Principais estilos de Graffiti (letras)</h1>

    <h2 class="intro-text"> 
      Este é um site que mostrará um pouco do graffiti e os estilos, focando mais nas 
      letras em si, pois existem diversos tipos de artes, mas focaremos nas letras. 
    </h2>

    <div style="text-align: center; margin: 20px 0; color: var(--accent-color);">
        <h3>🔥 Destaque do Servidor: Treine o estilo <u><?php echo $estilo_sugerido; ?></u> hoje!</h3>
    </div>
  </header>
  
  <hr/>

  <main>
    <section id="formatador-texto">
        <h2>Formatador de Tags 🖋️</h2>
        <div class="campos-container">
            <input type="text" class="input-tag" placeholder="Escreva sua primeira tag...">
            <input type="text" class="input-tag" placeholder="Segunda tag...">
            <input type="text" class="input-tag" placeholder="Terceira tag...">
        </div>
        <div class="checkbox-area">
            <input type="checkbox" id="checkMaiuscula">
            <label for="checkMaiuscula">ESTILO BOMB (Tudo em Maiúsculo)</label>
        </div>
    </section>

    <hr/>

    <section id="imagens">
      <div class="gallery">
        <!-- Caminhos corrigidos para a pasta img/ -->
        <img src="img/tag.jpg" alt="tag" />
        <img src="img/throwup.jpg" alt="throwup" />
        <img src="img/bomb.jpg" alt="bomb" />
        <img src="img/blockletters.jpg" alt="blockletters" />
        <img src="img/pieces.jpg" alt="pieces" />
        <img src="img/wildstyle.jpg" alt="wildstyle" /> 
      </div>
    </section>

    <section id="video">
      <h2>Assista a um vídeo de graffiti</h2>
      <div class="video-container">
        <iframe src="https://www.youtube.com/embed/A-_YjkAjE-M" 
            title="YouTube video player" frameborder="0" 
            allowfullscreen>
        </iframe>
      </div>
    </section>

    <section id="canvas-desenho">
      <h2>Teste seu graffiti aqui 🎨</h2>
      <canvas id="meuCanvas" width="600" height="400"></canvas>

      <div class="canvas-controls">
          <label for="fundoMuro">Superfície:</label>
          <select id="fundoMuro">
            <option value="none" selected>Parede Limpa (Cinza)</option>
            <!-- Caminhos dos fundos do Canvas corrigidos -->
            <option value="url('img/tijolo.jpg')">Muro de Tijolos</option>
            <option value="url('img/trem.jpg')">Vagão de Trem</option>
            <option value="url('img/metal.jpg')">Portão de Metal</option>
          </select>
          
          <label>Cor:</label>
          <input type="color" id="cor" value="#000000">
          <button type="button" id="btnLimpar" class="btn-danger">Limpar Muro 🧹</button>
      </div>
    </section>

    <hr/>

    <table>
      <thead>
        <tr>
          <th>Dificuldade/Estilo</th>
          <th>Tag</th>
          <th>Throw-up</th>
          <th>Bomb</th>
          <th>Block Letters</th>
          <th>Pieces</th>
          <th>Wildstyle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Muito Difícil</td>
          <td></td><td></td><td></td><td></td><td></td>
          <td>O estilo mais complexo de todos</td>
        </tr>
      </tbody>
    </table>

    <hr/>

    <section id="calculadora-spray">
      <h2>Calculadora de Latas 🧮</h2>
      <div class="calc-container">
          <input type="number" id="largura" placeholder="Largura (m)">
          <input type="number" id="altura" placeholder="Altura (m)">
          <button type="button" id="btnCalcular">Calcular Latas</button>
      </div>
      <div id="resultado-calc"></div>
    </section>

    <section id="contato">
      <form id="formContato">
          <h2>Mande um Salve! 🎨</h2>
          <input type="text" id="nome" placeholder="Seu nome">
          <input type="email" id="email" placeholder="E-mail">
          <textarea id="mensagem" rows="4" placeholder="Sua mensagem"></textarea>
          <button type="submit" id="btnEnviar">Enviar Graffiti</button>
      </form>
  </section>
  </main>

  <div style="text-align: center; margin: 20px;">
    <a href="galeria.html" class="link-galeria">Ir para galeria de imagens</a>
  </div>

  <footer>
    <div style="margin-bottom: 15px;">
        <p>📊 <strong>Visitas: <?php echo $total_visitas; ?></strong></p>
    </div>
    <p>© 2026 GraffitiSite | Desenvolvido por Arthur</p>
  </footer>

  <!-- JS na pasta js/ -->
  <script src="js/script.js"></script>

</body>
</html>