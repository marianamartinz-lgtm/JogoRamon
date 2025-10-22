<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batalha Épica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #a8d8ea, #f9d6c1, #ffaaa7);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(168, 216, 234, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 170, 167, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(249, 214, 193, 0.2) 0%, transparent 50%);
            z-index: -1;
        }
        
        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.2);
            width: 100%;
            max-width: 1400px;
            padding: 30px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .tech-grid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(168, 216, 234, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(168, 216, 234, 0.1) 1px, transparent 1px);
            background-size: 30px 30px;
            z-index: 0;
            opacity: 0.3;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }
        
        .logo {
            font-size: 28px;
            font-weight: 800;
            background: linear-gradient(135deg, #a8d8ea, #ffaaa7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .game-info {
            display: flex;
            gap: 20px;
            font-weight: 600;
            color: #5d5d5d;
        }
        
        .game-info span {
            background: rgba(168, 216, 234, 0.2);
            padding: 8px 16px;
            border-radius: 20px;
        }
        
        .battle-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 40px;
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
        }
        
        .player-card, .enemy-card {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: linear-gradient(135deg, #f8f9ff, #ffffff);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 
                0 10px 20px rgba(0, 0, 0, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.5);
            position: relative;
            overflow: hidden;
        }
        
        .player-card::before, .enemy-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
        }
        
        .player-card::before {
            background: linear-gradient(90deg, #a8d8ea, #ffaaa7);
        }
        
        .enemy-card::before {
            background: linear-gradient(90deg, #f9d6c1, #ffd3b6);
        }
        
        .character-photo {
            width: 180px;
            height: 180px;
            border-radius: 20px;
            background: linear-gradient(135deg, #a8d8ea, #ffaaa7);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 4px solid white;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        
        .enemy-photo {
            background: linear-gradient(135deg, #f9d6c1, #ffd3b6);
        }
        
        .character-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .character-name {
            font-size: 24px;
            font-weight: 800;
            color: #5d5d5d;
            margin-bottom: 5px;
        }
        
        .enemy-name {
            color: #8a8a8a;
        }
        
        .health-bar {
            width: 100%;
            height: 20px;
            background: #f0f0f0;
            border-radius: 10px;
            overflow: hidden;
            margin: 15px 0;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .health-fill {
            height: 100%;
            border-radius: 10px;
            transition: width 0.5s ease;
        }
        
        .player-health {
            background: linear-gradient(90deg, #a8d8ea, #ffaaa7);
        }
        
        .enemy-health {
            background: linear-gradient(90deg, #f9d6c1, #ffd3b6);
        }
        
        .health-text {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 10px;
            color: #5d5d5d;
        }
        
        .vs {
            font-size: 40px;
            font-weight: 900;
            color: #ffaaa7;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .main-content {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .actions-container {
            flex: 3;
            display: flex;
            flex-direction: column;
            gap: 20px;
            position: relative;
            z-index: 1;
        }
        
        .action-row {
            display: flex;
            gap: 20px;
        }
        
        .action-category {
            flex: 1;
            background: linear-gradient(135deg, #f8f9ff, #ffffff);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 
                0 10px 20px rgba(0, 0, 0, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.5);
            position: relative;
            overflow: hidden;
        }
        
        .action-category::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #a8d8ea, #ffaaa7);
        }
        
        .category-title {
            font-size: 20px;
            font-weight: 700;
            color: #5d5d5d;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .category-title i {
            font-size: 22px;
            background: linear-gradient(135deg, #a8d8ea, #ffaaa7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .actions-list {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
        }
        
        .action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 20px;
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
            text-align: center;
        }
        
        .action-btn:hover {
            background: #f8f9ff;
            border-color: rgba(168, 216, 234, 0.2);
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .action-btn:active {
            transform: translateY(-2px);
        }
        
        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            background: linear-gradient(135deg, #a8d8ea, #ffaaa7);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            color: white;
            box-shadow: 0 4px 8px rgba(168, 216, 234, 0.2);
        }
        
        .action-name {
            font-weight: 600;
            color: #5d5d5d;
            font-size: 16px;
        }
        
        .action-damage {
            font-size: 12px;
            color: #ffaaa7;
            font-weight: 600;
        }
        
        .side-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .battle-log {
            flex: 2;
            background: linear-gradient(135deg, #f8f9ff, #ffffff);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 
                0 10px 20px rgba(0, 0, 0, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.5);
            position: relative;
            z-index: 1;
            overflow-y: auto;
        }
        
        .battle-log::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #a8d8ea, #ffaaa7);
        }
        
        .log-title {
            font-size: 18px;
            font-weight: 700;
            color: #5d5d5d;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .log-messages {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-height: 200px;
            overflow-y: auto;
        }
        
        .log-message {
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 14px;
            animation: fadeIn 0.5s ease;
        }
        
        .player-message {
            background: rgba(168, 216, 234, 0.1);
            border-left: 4px solid #a8d8ea;
        }
        
        .enemy-message {
            background: rgba(255, 170, 167, 0.1);
            border-left: 4px solid #ffaaa7;
        }
        
        .system-message {
            background: rgba(249, 214, 193, 0.1);
            border-left: 4px solid #f9d6c1;
            text-align: center;
            font-weight: 600;
        }
        
        .action-buttons {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
            position: relative;
            z-index: 1;
        }
        
        .action-buttons button {
            flex: 1;
            padding: 16px 20px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-menu {
            background: linear-gradient(135deg, #f0f0f0, #e0e0e0);
            color: #5d5d5d;
        }
        
        .btn-menu:hover {
            background: linear-gradient(135deg, #e0e0e0, #d0d0d0);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        
        .btn-next {
            background: linear-gradient(135deg, #a8d8ea, #ffaaa7);
            color: white;
        }
        
        .btn-next:hover {
            background: linear-gradient(135deg, #97c7d9, #e89996);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(168, 216, 234, 0.3);
        }
        
        .btn-next:disabled {
            background: #cccccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .victory-overlay, .defeat-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 100;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s ease;
        }
        
        .victory-overlay.active, .defeat-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .result-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            transform: scale(0.8);
            transition: transform 0.5s ease;
        }
        
        .victory-overlay.active .result-card, .defeat-overlay.active .result-card {
            transform: scale(1);
        }
        
        .result-icon {
            font-size: 80px;
            margin-bottom: 20px;
        }
        
        .victory-icon {
            color: #a8d8ea;
        }
        
        .defeat-icon {
            color: #ffaaa7;
        }
        
        .result-title {
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 10px;
        }
        
        .victory-title {
            background: linear-gradient(135deg, #a8d8ea, #ffaaa7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .defeat-title {
            background: linear-gradient(135deg, #ffaaa7, #f9d6c1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .result-message {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-10px); }
            40%, 80% { transform: translateX(10px); }
        }
        
        .shake {
            animation: shake 0.5s ease;
        }
        
        .glow {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(168, 216, 234, 0.2) 0%, transparent 70%);
            filter: blur(20px);
            z-index: 0;
        }
        
        .glow-1 {
            top: -50px;
            right: -50px;
        }
        
        .glow-2 {
            bottom: -50px;
            left: -50px;
            background: radial-gradient(circle, rgba(255, 170, 167, 0.2) 0%, transparent 70%);
        }
        
        .monster-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
        }
        
        .player-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
        }
    </style>
</head>
<body>
    <div class="glow glow-1"></div>
    <div class="glow glow-2"></div>
    
    <!-- Overlay de Vitória -->
    <div class="victory-overlay" id="victory-overlay">
        <div class="result-card">
            <div class="result-icon victory-icon">
                <i class="fas fa-trophy"></i>
            </div>
            <h2 class="result-title victory-title">Vitória!</h2>
            <p class="result-message">Você derrotou o monstro e avançou para a próxima fase!</p>
            <button class="btn-next" id="next-phase-btn">
                <i class="fas fa-arrow-right"></i> Próxima Fase
            </button>
        </div>
    </div>
    
    <!-- Overlay de Derrota -->
    <div class="defeat-overlay" id="defeat-overlay">
        <div class="result-card">
            <div class="result-icon defeat-icon">
                <i class="fas fa-skull"></i>
            </div>
            <h2 class="result-title defeat-title">Derrota!</h2>
            <p class="result-message">Você foi derrotado. Tente novamente!</p>
            <button class="btn-next" id="retry-btn">
                <i class="fas fa-redo"></i> Tentar Novamente
            </button>
        </div>
    </div>
    
    <div class="container">
        <div class="tech-grid"></div>
        
        <div class="header">
            <div class="logo">Batalha Épica</div>
            <div class="game-info">
                <span>Fase: 1</span>
                <span>Inimigos: 1/3</span>
                <span>Pontuação: 0</span>
            </div>
        </div>
        
        <div class="battle-container">
            <div class="player-card">
                <div class="character-photo" id="player-photo">
                    <!-- Foto do jogador será carregada aqui -->
                    <div style="text-align: center; color: white; font-size: 14px; padding: 10px;">Seu Personagem</div>
                </div>
                <h2 class="character-name" id="player-name">Herói</h2>
                <div class="health-text">Vida: <span id="player-health-text">100</span>/100</div>
                <div class="health-bar">
                    <div class="health-fill player-health" id="player-health-bar" style="width: 100%"></div>
                </div>
                <div class="status">Pronto para lutar!</div>
            </div>
            
            <div class="vs">VS</div>
            
            <div class="enemy-card">
                <div class="character-photo enemy-photo">
                    <img src="mostro.gif" alt="Monstro Assustador" class="monster-image">
                </div>
                <h2 class="character-name enemy-name" id="enemy-name">Dragão das Sombras</h2>
                <div class="health-text">Vida: <span id="enemy-health-text">100</span>/100</div>
                <div class="health-bar">
                    <div class="health-fill enemy-health" id="enemy-health-bar" style="width: 100%"></div>
                </div>
                <div class="status">Aguardando ataque...</div>
            </div>
        </div>
        
        <div class="main-content">
            <div class="actions-container">
                <div class="action-row">
                    <div class="action-category">
                        <div class="category-title">
                            <i class="fas fa-bolt"></i> Poderes
                        </div>
                        <div class="actions-list">
                            <div class="action-btn" data-action="super-forca" data-damage="25">
                                <div class="action-icon">💪</div>
                                <div class="action-name">Super Força</div>
                                <div class="action-damage">25 de dano</div>
                            </div>
                            <div class="action-btn" data-action="invisibilidade" data-damage="15">
                                <div class="action-icon">👻</div>
                                <div class="action-name">Invisibilidade</div>
                                <div class="action-damage">15 de dano</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="action-category">
                        <div class="category-title">
                            <i class="fas fa-tools"></i> Equipamentos
                        </div>
                        <div class="actions-list">
                            <div class="action-btn" data-action="kit-medico" data-damage="heal">
                                <div class="action-icon">💊</div>
                                <div class="action-name">Kit Médico</div>
                                <div class="action-damage">Cura 20 HP</div>
                            </div>
                            <div class="action-btn" data-action="armadura" data-damage="shield">
                                <div class="action-icon">🛡️</div>
                                <div class="action-name">Armadura</div>
                                <div class="action-damage">Bloqueia 10 dano</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="action-row">
                    <div class="action-category">
                        <div class="category-title">
                            <i class="fas fa-fist-raised"></i> Ataques Básicos
                        </div>
                        <div class="actions-list">
                            <div class="action-btn" data-action="soco" data-damage="10">
                                <div class="action-icon">👊</div>
                                <div class="action-name">Soco</div>
                                <div class="action-damage">10 de dano</div>
                            </div>
                            <div class="action-btn" data-action="chute" data-damage="12">
                                <div class="action-icon">🦵</div>
                                <div class="action-name">Chute</div>
                                <div class="action-damage">12 de dano</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="action-category">
                        <div class="category-title">
                            <i class="fas fa-fire"></i> Ataques Especiais
                        </div>
                        <div class="actions-list">
                            <div class="action-btn" data-action="raio-laser" data-damage="30">
                                <div class="action-icon">🔫</div>
                                <div class="action-name">Raio Laser</div>
                                <div class="action-damage">30 de dano</div>
                            </div>
                            <div class="action-btn" data-action="explosao" data-damage="35">
                                <div class="action-icon">💥</div>
                                <div class="action-name">Explosão</div>
                                <div class="action-damage">35 de dano</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="side-panel">
                <div class="battle-log">
                    <div class="log-title">
                        <i class="fas fa-scroll"></i> Registro de Batalha
                    </div>
                    <div class="log-messages" id="battle-log">
                        <div class="log-message system-message">
                            A batalha começou! Escolha uma ação.
                        </div>
                    </div>
                </div>
                
                <div class="action-buttons">
                    <button class="btn-menu" id="menu-btn" onclick="goToMenu()">
                        <i class="fas fa-bars"></i> Menu
                    </button>
                    <button class="btn-next" id="next-turn-btn" disabled>
                        <i class="fas fa-forward"></i> Próximo Turno
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elementos do DOM
            const playerHealthBar = document.getElementById('player-health-bar');
            const playerHealthText = document.getElementById('player-health-text');
            const enemyHealthBar = document.getElementById('enemy-health-bar');
            const enemyHealthText = document.getElementById('enemy-health-text');
            const battleLog = document.getElementById('battle-log');
            const nextTurnBtn = document.getElementById('next-turn-btn');
            const victoryOverlay = document.getElementById('victory-overlay');
            const defeatOverlay = document.getElementById('defeat-overlay');
            const nextPhaseBtn = document.getElementById('next-phase-btn');
            const retryBtn = document.getElementById('retry-btn');
            const actionButtons = document.querySelectorAll('.action-btn');
            const playerPhoto = document.getElementById('player-photo');
            const playerNameElement = document.getElementById('player-name');
            
            // Estado do jogo
            let gameState = {
                playerHealth: 100,
                enemyHealth: 100,
                playerShield: 0,
                enemyShield: 0,
                turn: 0,
                gameOver: false,
                score: 0
            };
            
            // Carregar dados do jogador do localStorage
            try {
                const savedPhoto = localStorage.getItem('selectedCharacterPhoto');
                const savedName = localStorage.getItem('selectedCharacterName') || "Herói";
                const savedPlayerName = localStorage.getItem('playerName') || "Jogador";
                
                if (savedPhoto) {
                    playerPhoto.innerHTML = `<img src="${savedPhoto}" alt="Personagem" class="player-image">`;
                }
                
                playerNameElement.textContent = savedName;
            } catch (e) {
                console.log("Não foi possível carregar os dados do localStorage");
            }
            
            // Adicionar eventos aos botões de ação
            actionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (gameState.gameOver) return;
                    
                    const action = this.getAttribute('data-action');
                    const damage = this.getAttribute('data-damage');
                    
                    executePlayerAction(action, damage);
                });
            });
            
            // Executar ação do jogador
            function executePlayerAction(action, damage) {
                if (gameState.gameOver) return;
                
                let damageValue = 0;
                let logMessage = '';
                
                // Processar ação baseada no tipo
                switch(action) {
                    case 'super-forca':
                    case 'invisibilidade':
                    case 'soco':
                    case 'chute':
                    case 'raio-laser':
                    case 'explosao':
                        damageValue = parseInt(damage);
                        gameState.enemyHealth -= damageValue;
                        if (gameState.enemyHealth < 0) gameState.enemyHealth = 0;
                        
                        logMessage = `Você usou ${getActionName(action)} e causou ${damageValue} de dano!`;
                        addLogMessage(logMessage, 'player');
                        
                        // Efeito visual no inimigo
                        document.querySelector('.enemy-card').classList.add('shake');
                        setTimeout(() => {
                            document.querySelector('.enemy-card').classList.remove('shake');
                        }, 500);
                        break;
                        
                    case 'kit-medico':
                        gameState.playerHealth += 20;
                        if (gameState.playerHealth > 100) gameState.playerHealth = 100;
                        
                        logMessage = 'Você usou o Kit Médico e recuperou 20 de vida!';
                        addLogMessage(logMessage, 'player');
                        break;
                        
                    case 'armadura':
                        gameState.playerShield = 10;
                        
                        logMessage = 'Você ativou a Armadura Avançada! Próximo ataque será reduzido.';
                        addLogMessage(logMessage, 'player');
                        break;
                }
                
                // Atualizar interface
                updateHealthBars();
                
                // Verificar se o jogo acabou
                checkGameOver();
                
                // Habilitar próximo turno
                nextTurnBtn.disabled = false;
                
                // Desabilitar ações até o próximo turno
                actionButtons.forEach(btn => {
                    btn.style.pointerEvents = 'none';
                    btn.style.opacity = '0.6';
                });
            }
            
            // Executar turno do inimigo
            function executeEnemyTurn() {
                if (gameState.gameOver) return;
                
                // Ataque aleatório do inimigo
                const attacks = [
                    { name: 'Garra Afiada', damage: 15 },
                    { name: 'Sopro de Fogo', damage: 20 },
                    { name: 'Investida', damage: 12 }
                ];
                
                const attack = attacks[Math.floor(Math.random() * attacks.length)];
                let damage = attack.damage;
                
                // Aplicar escudo se existir
                if (gameState.playerShield > 0) {
                    const blocked = Math.min(damage, gameState.playerShield);
                    damage -= blocked;
                    gameState.playerShield = 0;
                    
                    addLogMessage(`Sua armadura bloqueou ${blocked} de dano!`, 'system');
                }
                
                gameState.playerHealth -= damage;
                if (gameState.playerHealth < 0) gameState.playerHealth = 0;
                
                addLogMessage(`O monstro usou ${attack.name} e causou ${damage} de dano!`, 'enemy');
                
                // Efeito visual no jogador
                document.querySelector('.player-card').classList.add('shake');
                setTimeout(() => {
                    document.querySelector('.player-card').classList.remove('shake');
                }, 500);
                
                // Atualizar interface
                updateHealthBars();
                
                // Verificar se o jogo acabou
                checkGameOver();
                
                // Reativar ações para o próximo turno
                actionButtons.forEach(btn => {
                    btn.style.pointerEvents = 'auto';
                    btn.style.opacity = '1';
                });
                
                // Desabilitar próximo turno até o jogador agir
                nextTurnBtn.disabled = true;
            }
            
            // Atualizar barras de saúde
            function updateHealthBars() {
                playerHealthBar.style.width = `${gameState.playerHealth}%`;
                playerHealthText.textContent = gameState.playerHealth;
                
                enemyHealthBar.style.width = `${gameState.enemyHealth}%`;
                enemyHealthText.textContent = gameState.enemyHealth;
            }
            
            // Verificar fim de jogo
            function checkGameOver() {
                if (gameState.playerHealth <= 0) {
                    gameState.gameOver = true;
                    setTimeout(() => {
                        defeatOverlay.classList.add('active');
                    }, 1000);
                } else if (gameState.enemyHealth <= 0) {
                    gameState.gameOver = true;
                    gameState.score += 100;
                    setTimeout(() => {
                        victoryOverlay.classList.add('active');
                    }, 1000);
                }
            }
            
            // Adicionar mensagem ao registro de batalha
            function addLogMessage(message, type) {
                const messageElement = document.createElement('div');
                messageElement.classList.add('log-message', `${type}-message`);
                messageElement.textContent = message;
                
                battleLog.appendChild(messageElement);
                battleLog.scrollTop = battleLog.scrollHeight;
            }
            
            // Obter nome da ação
            function getActionName(action) {
                const actionNames = {
                    'super-forca': 'Super Força',
                    'invisibilidade': 'Invisibilidade',
                    'soco': 'Soco',
                    'chute': 'Chute',
                    'raio-laser': 'Raio Laser',
                    'explosao': 'Explosão de Energia',
                    'kit-medico': 'Kit Médico',
                    'armadura': 'Armadura Avançada'
                };
                
                return actionNames[action] || action;
            }
            
            // Evento do botão próximo turno
            nextTurnBtn.addEventListener('click', function() {
                if (gameState.gameOver) return;
                
                this.disabled = true;
                executeEnemyTurn();
            });
            
            // Evento do botão próxima fase
            nextPhaseBtn.addEventListener('click', function() {
                alert('Indo para a próxima fase...');
                // Aqui você implementaria a lógica para a próxima fase
                // Por enquanto, apenas recarregamos a página
                location.reload();
            });
            
            // Evento do botão tentar novamente
            retryBtn.addEventListener('click', function() {
                location.reload();
            });
        });
        
        function goToMenu() {
            window.location.href = "index.html";
        }
    </script>
</body>
</html>
