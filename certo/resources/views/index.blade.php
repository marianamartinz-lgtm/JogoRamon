<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Escolha seu personagem</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
      margin: 0;
      height: 100vh;
      background: linear-gradient(135deg, #a8d8ea, #f9d6c1, #ffaaa7);
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }

    .container {
      text-align: center;
      position: relative;
      z-index: 10;
    }

    h2 {
      color: #5d5d5d;
      font-size: 28px;
      margin-bottom: 40px;
      text-transform: uppercase;
      letter-spacing: 2px;
      text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
    }

    .characters {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 40px;
      flex-wrap: wrap;
      margin-bottom: 50px;
    }

    .character {
      position: relative;
      background: linear-gradient(145deg, #ffffff, #f0f5ff);
      border-radius: 25px;
      padding: 15px;
      width: 180px;
      height: 260px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      transition: all 0.3s ease;
      overflow: hidden;
    }

    .character img {
      width: 170px;
      height: auto;
      filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.2));
      transition: transform 0.3s ease;
    }

    .character:hover img {
      transform: scale(1.08);
    }

    .character:hover {
      box-shadow: 0 0 30px rgba(168, 216, 234, 0.7);
      transform: translateY(-5px);
    }

    .character.selected {
      border: 3px solid #ffaaa7;
      box-shadow: 0 0 35px #ffaaa7;
      transform: scale(1.05);
    }

    .input-box {
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 50px;
      padding: 10px 25px;
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.4);
      width: 400px;
      margin: 0 auto 50px auto;
      backdrop-filter: blur(10px);
      transition: 0.3s;
    }

    .input-box input {
      border: none;
      outline: none;
      flex: 1;
      font-size: 16px;
      background: transparent;
      color: #5d5d5d;
    }

    .input-box input::placeholder {
      color: #a8a8a8;
    }

    .input-box i {
      color: #a8a8a8;
      font-size: 18px;
      margin-right: 10px;
    }

    .button-container {
      display: flex;
      gap: 20px;
      justify-content: center;
    }

    .btn {
      background: linear-gradient(90deg, #a8d8ea, #ffaaa7);
      border: none;
      border-radius: 50px;
      cursor: pointer;
      padding: 15px 40px;
      font-size: 18px;
      font-weight: 600;
      color: white;
      transition: all 0.3s ease;
      box-shadow: 0 0 30px rgba(168, 216, 234, 0.6);
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .btn:hover {
      transform: scale(1.05);
      box-shadow: 0 0 40px rgba(168, 216, 234, 0.9);
    }

    .btn-secondary {
      background: linear-gradient(90deg, #f9d6c1, #ffd3b6);
      color: #5d5d5d;
    }

    /* Fundo colorido animado */
    .bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 1;
    }

    .circle {
      position: absolute;
      border-radius: 50%;
      filter: blur(70px);
      animation: float 8s infinite ease-in-out alternate;
    }

    .circle:nth-child(1) { background: rgba(168, 216, 234, 0.5); width: 300px; height: 300px; top: 10%; left: 10%; animation-delay: 0s; }
    .circle:nth-child(2) { background: rgba(249, 214, 193, 0.5); width: 250px; height: 250px; top: 50%; right: 10%; animation-delay: 2s; }
    .circle:nth-child(3) { background: rgba(255, 170, 167, 0.5); width: 200px; height: 200px; bottom: 10%; left: 20%; animation-delay: 4s; }
    .circle:nth-child(4) { background: rgba(168, 216, 234, 0.3); width: 180px; height: 180px; bottom: 20%; right: 30%; animation-delay: 6s; }

    @keyframes float {
      0% { transform: translateY(0) translateX(0); }
      100% { transform: translateY(-30px) translateX(30px); }
    }
  </style>
</head>
<body>

  <div class="bg">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
  </div>

  <div class="container">
    <h2>Escolha seu personagem</h2>

    <div class="characters">
      <div class="character" onclick="selectCharacter(this, 'brancoo.png', 'Cavaleiro da Luz')">
        <img src="brancoo.png" alt="Personagem 1">
      </div>
      <div class="character" onclick="selectCharacter(this, 'negroo.png', 'Guerreiro das Sombras')">
        <img src="negroo.png" alt="Personagem 2">
      </div>
      <div class="character" onclick="selectCharacter(this, 'brancaaa.png', 'Arqueira Celestial')">
        <img src="brancaaa.png" alt="Personagem 3">
      </div>
      <div class="character" onclick="selectCharacter(this, 'negraa.png', 'Feiticeira da Noite')">
        <img src="negraa.png" alt="Personagem 4">
      </div>
    </div>

    <div class="input-box">
      <i>🔍</i>
      <input type="text" id="nome" placeholder="Digite seu nome..." />
    </div>

    <div class="button-container">
      <button class="btn" onclick="goNext()">
        Iniciar Aventura ➜
      </button>
      <button class="btn btn-secondary" onclick="showInstructions()">
        Instruções
      </button>
    </div>
  </div>

  <script>
    let selectedCharacter = null;
    let selectedCharacterName = null;

    function selectCharacter(element, imageSrc, characterName) {
      document.querySelectorAll('.character').forEach(c => c.classList.remove('selected'));
      element.classList.add('selected');
      selectedCharacter = imageSrc;
      selectedCharacterName = characterName;
    }

    function goNext() {
      const nome = document.getElementById('nome').value.trim();
      if (!nome) {
        alert("Por favor, digite seu nome!");
        return;
      }
      
      if (!selectedCharacter) {
        alert("Por favor, escolha um personagem!");
        return;
      }

      // Salvar dados no localStorage para usar nas outras páginas
      localStorage.setItem("playerName", nome);
      localStorage.setItem("selectedCharacterPhoto", selectedCharacter);
      localStorage.setItem("selectedCharacterName", selectedCharacterName);
      
      // *** CORREÇÃO AQUI ***
      // Redireciona para a ROTA /fase1, conforme definido no Laravel web.php
      window.location.href = "/fase1";
    }

    function showInstructions() {
      alert("Instruções do Jogo:\n\n1. Escolha seu personagem\n2. Digite seu nome\n3. Selecione equipamentos na próxima tela\n4. Enfrente monstros em batalhas épicas!");
    }
  </script>

</body>
</html>