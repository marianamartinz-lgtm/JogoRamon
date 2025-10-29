<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batalha Final - Fase 2</title>
    <!-- Link para Font Awesome (ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Cores Base: #2c1a4d (Roxo Escuro), #1a1a2e (Azul Meia-Noite), #8a2be2 (Azul Violeta), #ff416c (Vermelho Elétrico) */
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #2c1a4d, #1a1a2e, #0a0a1a);
            color: #e0e0e0;
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
                radial-gradient(circle at 20% 80%, rgba(138, 43, 226, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 65, 108, 0.2) 0%, transparent 50%);
            z-index: -1;
        }
        
        .container {
            background: rgba(10, 10, 20, 0.85); /* Fundo de vidro escuro */
            backdrop-filter: blur(10px);
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(138, 43, 226, 0.2);
            width: 100%;
            max-width: 1400px;
            padding: 30px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(138, 43, 226, 0.3);
            /* MUDANÇA: Permitir scroll se a tela for pequena */
            max-height: 95vh;
            overflow-y: auto;
        }

        .tech-grid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(138, 43, 226, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(138, 43, 226, 0.1) 1px, transparent 1px);
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
            border-bottom: 1px solid rgba(138, 43, 226, 0.2);
            position: relative;
            z-index: 1;
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            background: linear-gradient(135deg, #8a2be2, #4169e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .game-info {
            display: flex;
            gap: 20px;
            font-weight: 600;
            color: #c0c0c0;
        }

        .game-info span {
            background: rgba(138, 43, 226, 0.2);
            padding: 8px 16px;
            border-radius: 20px;
        }

        .main-layout {
            display: flex;
            gap: 30px;
            /* MUDANÇA: Removido margin-bottom para os créditos ficarem no final */
        }

        .left-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
            position: relative;
            z-index: 1;
        }

        .right-panel {
            flex: 3;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .battle-log {
            flex: 2;
            background: linear-gradient(135deg, rgba(20, 20, 30, 0.9), rgba(30, 30, 40, 0.9));
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), inset 0 1px 0 rgba(138, 43, 226, 0.2);
            border: 1px solid rgba(138, 43, 226, 0.3);
            position: relative;
            z-index: 1;
            overflow-y: auto;
            max-height: 350px;
            min-height: 350px; /* MUDANÇA: Altura mínima para não encolher */
        }
        
        .battle-log::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #8a2be2, #ff416c);
        }

        .log-title {
            font-size: 18px;
            font-weight: 700;
            color: #e0e0e0;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .log-messages {
            display: flex;
            flex-direction: column;
            gap: 10px;
            color: #ccc; /* Cor de texto padrão do log */
        }

        .log-message {
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 14px;
            animation: fadeIn 0.5s ease;
        }

        .player-message {
            background: rgba(65, 105, 225, 0.1);
            border-left: 4px solid #4169e1;
        }

        .enemy-message {
            background: rgba(255, 65, 108, 0.1);
            border-left: 4px solid #ff416c;
        }

        .system-message {
            background: rgba(138, 43, 226, 0.1);
            border-left: 4px solid #8a2be2;
            text-align: center;
            font-weight: 600;
        }
        
        .critical-message {
            background: rgba(255, 107, 107, 0.2); /* Vermelho Crítico */
            border: 2px solid #ff6b6b;
            color: #ffc1c1;
            font-weight: 700;
            text-align: center;
            animation: flashCrit 0.3s ease-in-out;
        }
        
        @keyframes flashCrit {
            0% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.05); opacity: 1; box-shadow: 0 0 20px #ff6b6b; }
            100% { transform: scale(1); opacity: 0.8; }
        }
        
        .action-buttons {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-menu {
            background: linear-gradient(135deg, #444, #222);
            color: #e0e0e0;
        }

        .btn-menu:hover {
            background: linear-gradient(135deg, #555, #333);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-next {
            background: linear-gradient(135deg, #8a2be2, #4169e1);
            color: white;
        }

        .btn-next:hover {
            background: linear-gradient(135deg, #9a3be2, #5179e1);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(138, 43, 226, 0.3);
        }

        .btn-next:disabled {
            background: #555;
            color: #888;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .battle-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 40px;
            position: relative;
            z-index: 1;
            padding: 20px 0;
            border-bottom: 1px solid rgba(138, 43, 226, 0.2);
        }

        .player-card, .enemy-card {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: linear-gradient(135deg, rgba(20, 20, 30, 0.9), rgba(30, 30, 40, 0.9));
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), inset 0 1px 0 rgba(138, 43, 226, 0.2);
            border: 1px solid rgba(138, 43, 226, 0.3);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
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
            background: linear-gradient(90deg, #4169e1, #8a2be2);
        }

        .enemy-card::before {
            background: linear-gradient(90deg, #ff416c, #ffaf4c);
        }
        
        @keyframes pulse {
            0% { transform: scale(1); box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); }
            50% { transform: scale(1.02); box-shadow: 0 0 30px rgba(65, 105, 225, 0.8); }
            100% { transform: scale(1); box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); }
        }

        .pulse-heal {
            animation: pulse 0.5s ease-in-out;
        }

        .character-photo {
            width: 180px;
            height: 180px;
            border-radius: 20px;
            background: linear-gradient(135deg, #4169e1, #8a2be2);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 4px solid #1a1a2e;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }
        
        .enemy-photo {
            background: linear-gradient(135deg, #ff416c, #ffaf4c);
        }
        
        .player-image, .monster-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
        }

        .character-name {
            font-size: 24px;
            font-weight: 800;
            color: #e0e0e0;
            margin-bottom: 5px;
        }

        .health-bar {
            width: 100%;
            height: 20px;
            background: #1a1a2e;
            border-radius: 10px;
            overflow: hidden;
            margin: 15px 0;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .health-fill {
            height: 100%;
            border-radius: 10px;
            transition: width 0.5s ease;
        }

        .player-health {
            background: linear-gradient(90deg, #4169e1, #8a2be2);
        }

        .enemy-health {
            background: linear-gradient(90deg, #ff416c, #ffaf4c);
        }

        .health-text {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 10px;
            color: #c0c0c0;
        }

        .vs {
            font-size: 40px;
            font-weight: 900;
            color: #ff416c;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .actions-container {
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
            background: linear-gradient(135deg, rgba(20, 20, 30, 0.9), rgba(30, 30, 40, 0.9));
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), inset 0 1px 0 rgba(138, 43, 226, 0.2);
            border: 1px solid rgba(138, 43, 226, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .action-category.category-powers::before {
             background: linear-gradient(90deg, #8a2be2, #ff416c);
        }
        
        .action-category.category-utility::before {
             background: linear-gradient(90deg, #4169e1, #8a2be2);
        }

        .action-category::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
        }

        .category-title {
            font-size: 20px;
            font-weight: 700;
            color: #e0e0e0;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .category-title i {
            font-size: 22px;
            background: linear-gradient(135deg, #8a2be2, #4169e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .actions-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 20px 10px;
            border: 1px solid rgba(138, 43, 226, 0.2);
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s;
            background: #1a1a2e;
            text-align: center;
        }

        .action-btn:hover {
            background: #2a2a3e;
            border-color: rgba(138, 43, 226, 0.4);
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .action-btn:active {
            transform: translateY(-2px);
        }

        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            background: linear-gradient(135deg, #8a2be2, #4169e1);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            color: white;
            box-shadow: 0 4px 8px rgba(138, 43, 226, 0.2);
        }
        
        /* Ícone de Habilidade Ultimate */
        .action-btn[data-action="supernova"] .action-icon {
             background: linear-gradient(135deg, #ff416c, #ffaf4c);
             box-shadow: 0 4px 8px rgba(255, 65, 108, 0.2);
        }
        
        .action-name {
            font-weight: 600;
            color: #e0e0e0;
            font-size: 14px;
        }

        .action-damage {
            font-size: 12px;
            color: #ffaf4c;
            font-weight: 600;
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
            background: #1a1a2e;
            color: #e0e0e0;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            transform: scale(0.8);
            transition: transform 0.5s ease;
            border: 1px solid rgba(138, 43, 226, 0.3);
        }

        .victory-overlay.active .result-card, .defeat-overlay.active .result-card {
            transform: scale(1);
        }

        .result-icon {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .victory-icon {
            color: #4169e1;
        }

        .defeat-icon {
            color: #ff416c;
        }

        .result-title {
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .victory-title {
            background: linear-gradient(135deg, #8a2be2, #4169e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .defeat-title {
            background: linear-gradient(135deg, #ff416c, #ffaf4c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .result-message {
            font-size: 18px;
            color: #c0c0c0;
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
            filter: blur(20px);
            z-index: 0;
        }

        .glow-1 {
            top: -50px;
            right: -50px;
            background: radial-gradient(circle, rgba(138, 43, 226, 0.2) 0%, transparent 70%);
        }

        .glow-2 {
            bottom: -50px;
            left: -50px;
            background: radial-gradient(circle, rgba(255, 65, 108, 0.2) 0%, transparent 70%);
        }
        
        /* MUDANÇA: Estilo para os créditos */
        .credits {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid rgba(138, 43, 226, 0.2);
            font-size: 12px;
            color: #888;
            text-align: center;
            position: relative; /* Para ficar acima do tech-grid */
            z-index: 1;
        }
        
    </style>
</head>
<body>
    <!-- Efeitos de Brilho de Fundo -->
    <div class="glow glow-1"></div>
    <div class="glow glow-2"></div>
    
    <!-- Painel de Vitória -->
    <div class="victory-overlay" id="victory-overlay">
        <div class="result-card">
            <div class="result-icon victory-icon">
                <i class="fas fa-crown"></i>
            </div>
            <h2 class="result-title victory-title">Vitória Final!</h2>
            <p class="result-message">Você salvou o mundo! O Lorde do Caos foi derrotado.</p>
            <button class="btn-next" id="next-phase-btn">
                <i class="fas fa-scroll"></i> Ver Créditos
            </button>
        </div>
    </div>
    
    <!-- Painel de Derrota -->
    <div class="defeat-overlay" id="defeat-overlay">
        <div class="result-card">
            <div class="result-icon defeat-icon">
                <i class="fas fa-skull-crossbones"></i>
            </div>
            <h2 class="result-title defeat-title">Fim de Jogo</h2>
            <p class="result-message">O Lorde do Caos venceu. Tente novamente.</p>
            <button class="btn-next" id="retry-btn">
                <i class="fas fa-redo"></i> Tentar Novamente
            </button>
        </div>
    </div>
    
    <!-- Container Principal do Jogo -->
    <div class="container">
        <div class="tech-grid"></div>
        
        <div class="header">
            <div class="logo">Batalha Final</div>
            <div class="game-info">
                <span>Fase: 2 (Final)</span>
                <span>Inimigos: 1/1</span>
                <span>Pontuação: <span id="score-text">0</span></span>
            </div>
        </div>
        
        <div class="main-layout">
            <!-- Painel Esquerdo (Log e Menu) -->
            <div class="left-panel">
                <div class="battle-log">
                    <div class="log-title">
                        <i class="fas fa-book-dead"></i> Registro de Batalha
                    </div>
                    <div class="log-messages" id="battle-log">
                        <div class="log-message system-message">
                            O Lorde do Caos apareceu! Esta é a batalha final.
                        </div>
                    </div>
                </div>
                
                <div class="action-buttons">
                    <button class="btn-menu" id="menu-btn" onclick="goToMenu()">
                        <i class="fas fa-bars"></i> Menu Principal
                    </button>
                    <!-- MUDANÇA: Botão escondido para turno automático -->
                    <button class="btn-next" id="next-turn-btn" disabled style="display: none;">
                        <i class="fas fa-forward"></i> Próximo Turno
                    </button>
                </div>
            </div>
            
            <!-- Painel Direito (Batalha e Ações) -->
            <div class="right-panel">
                
                <div class="battle-container">
                    <div class="player-card" id="player-card">
                        <div class="character-photo" id="player-photo">
                            <!-- A imagem do personagem será carregada pelo JS -->
                            <div style="text-align: center; color: white; font-size: 14px; padding: 10px;">Seu Personagem</div>
                        </div>
                        <h2 class="character-name" id="player-name">Herói</h2>
                        <div class="health-text">Vida: <span id="player-health-text">100/100</span></div>
                        <div class="health-bar">
                            <div class="health-fill player-health" id="player-health-bar" style="width: 100%"></div>
                        </div>
                        <div class="status">Pronto para a batalha final!</div>
                    </div>
                    
                    <div class="vs">VS</div>
                    
                    <div class="enemy-card" id="enemy-card">
                        <div class="character-photo enemy-photo">
                            <img src="https://placehold.co/180x180/8a2be2/ffffff?text=Lorde+do+Caos" alt="Lorde do Caos" class="monster-image">
                        </div>
                        <h2 class="character-name enemy-name" id="enemy-name">Lorde do Caos</h2>
                        <div class="health-text">Vida: <span id="enemy-health-text">200/200</span></div>
                        <div class="health-bar">
                            <div class="health-fill enemy-health" id="enemy-health-bar" style="width: 100%"></div>
                        </div>
                        <div class="status">O fim está próximo...</div>
                    </div>
                </div>
                
                <div class="actions-container">
                    <div class="action-row">
                        <div class="action-category category-powers">
                            <div class="category-title">
                                <i class="fas fa-bolt"></i> Ataques Ofensivos
                            </div>
                            <div class="actions-list">
                                <div class="action-btn" data-action="soco" data-damage="10">
                                    <div class="action-icon">👊</div>
                                    <div class="action-name">Soco</div>
                                    <div class="action-damage">10 Dano</div>
                                </div>
                                <!-- HABILIDADE MELHORADA -->
                                <div class="action-btn" data-action="raio-prismatico" data-damage="40">
                                    <div class="action-icon">✨</div>
                                    <div class="action-name">Raio Prismático</div>
                                    <div class="action-damage">40 Dano</div>
                                </div>
                                <!-- HABILIDADE ULTIMATE NOVA -->
                                <div class="action-btn" data-action="supernova" data-damage="80">
                                    <div class="action-icon">💥</div>
                                    <div class="action-name">Supernova</div>
                                    <div class="action-damage">80 Dano (Cooldown)</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="action-category category-utility">
                            <div class="category-title">
                                <i class="fas fa-tools"></i> Utilidades
                            </div>
                            <div class="actions-list" style="grid-template-columns: repeat(2, 1fr);">
                                <div class="action-btn" data-action="kit-medico" data-damage="heal">
                                    <div class="action-icon">💊</div>
                                    <div class="action-name">Kit Médico</div>
                                    <div class="action-damage">Cura 20 HP</div>
                                </div>
                                <div class="action-btn" data-action="armadura" data-damage="shield">
                                    <div class="action-icon">🛡️</div>
                                    <div class="action-name">Armadura</div>
                                    <div class="action-damage">Bloqueia 10 Dano</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MUDANÇA: Créditos adicionados -->
        <div class="credits">
            Jogo desenvolvido por Mariana
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Seleção de Elementos do DOM ---
            const playerHealthBar = document.getElementById('player-health-bar');
            const playerHealthText = document.getElementById('player-health-text');
            const enemyHealthBar = document.getElementById('enemy-health-bar');
            const enemyHealthText = document.getElementById('enemy-health-text');
            const battleLogElement = document.getElementById('battle-log');
            // const nextTurnBtn = document.getElementById('next-turn-btn'); // MUDANÇA: Não é mais usado
            
            const victoryOverlay = document.getElementById('victory-overlay');
            const defeatOverlay = document.getElementById('defeat-overlay');
            const nextPhaseBtn = document.getElementById('next-phase-btn'); // Botão de vitória (créditos)
            const retryBtn = document.getElementById('retry-btn');       // Botão de derrota (tentar de novo)
            
            const actionButtons = document.querySelectorAll('.action-btn');
            const playerPhoto = document.getElementById('player-photo');
            const playerNameElement = document.getElementById('player-name');
            const scoreText = document.getElementById('score-text');
            const playerCard = document.getElementById('player-card');
            const enemyCard = document.getElementById('enemy-card');
            
            // MUDANÇA: Constantes de vida definidas no topo
            const maxPlayerHealth = 100;
            const maxEnemyHealth = 200; // Mais vida para o chefe final

            // --- Estado do Jogo (Fase Final) ---
            let gameState = {
                playerHealth: maxPlayerHealth,
                enemyHealth: maxEnemyHealth, 
                playerShield: 0,
                playerUltimateCooldown: 0, // Cooldown da nova habilidade
                turn: 0,
                gameOver: false,
                score: parseInt(localStorage.getItem('scoreFase1') || '0'), // Tenta carregar score
                isPlayerTurn: true // MUDANÇA: Controle de turno automático
            };
            
            // --- Carregar Dados do Jogador (LocalStorage) ---
            try {
                const savedPhoto = localStorage.getItem('selectedCharacterPhoto');
                const savedName = localStorage.getItem('selectedCharacterName') || "Herói";
                
                if (savedPhoto) {
                    playerPhoto.innerHTML = `<img src="${savedPhoto}" alt="Personagem" class="player-image">`;
                }
                
                playerNameElement.textContent = savedName;
            } catch (e) {
                console.warn("Não foi possível carregar os dados do localStorage.");
            }
            
            // --- Funções do Jogo ---

            // Mapeamento de nomes de ações para o log
            function getActionName(action) {
                switch(action) {
                    case 'soco': return 'Soco';
                    case 'raio-prismatico': return 'Raio Prismático';
                    case 'supernova': return 'Supernova';
                    case 'kit-medico': return 'Kit Médico';
                    case 'armadura': return 'Armadura';
                    default: return action;
                }
            }
            
            // Adiciona mensagem ao log de batalha
            function addLogMessage(message, type) {
                const messageElement = document.createElement('div');
                messageElement.classList.add('log-message', `${type}-message`);
                messageElement.innerHTML = message.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
                battleLogElement.appendChild(messageElement);
                battleLogElement.scrollTop = battleLogElement.scrollHeight; 
            }
            
            // Atualiza barras de vida e texto
            function updateHealthBars() {
                // MUDANÇA: Garante que o HP não ultrapasse o máximo ao curar
                gameState.playerHealth = Math.max(0, Math.min(maxPlayerHealth, gameState.playerHealth));
                gameState.enemyHealth = Math.max(0, Math.min(maxEnemyHealth, gameState.enemyHealth));

                // Jogador
                playerHealthBar.style.width = `${(gameState.playerHealth / maxPlayerHealth) * 100}%`;
                playerHealthText.textContent = `${gameState.playerHealth}/${maxPlayerHealth}`;
                playerHealthBar.parentElement.style.backgroundColor = gameState.playerHealth <= 20 ? '#ff416c' : '#1a1a2e'; // Cor de perigo
                
                // Inimigo
                enemyHealthBar.style.width = `${(gameState.enemyHealth / maxEnemyHealth) * 100}%`;
                enemyHealthText.textContent = `${gameState.enemyHealth}/${maxEnemyHealth}`;
                enemyHealthBar.parentElement.style.backgroundColor = gameState.enemyHealth <= 40 ? '#ff416c' : '#1a1a2e'; // Cor de perigo
                
                scoreText.textContent = gameState.score;
            }
            
            // Verifica fim de jogo
            function checkGameOver() {
                if (gameState.gameOver) return true; // Evita verificação duplicada

                if (gameState.enemyHealth <= 0) {
                    gameState.gameOver = true;
                    addLogMessage("Vitória Final! O Lorde do Caos foi banido!", 'system');
                    victoryOverlay.classList.add('active');
                    disableActions();
                } else if (gameState.playerHealth <= 0) {
                    gameState.gameOver = true;
                    addLogMessage("Fim de Jogo. A escuridão venceu.", 'system');
                    defeatOverlay.classList.add('active');
                    disableActions();
                }
                return gameState.gameOver;
            }
            
            // Desabilita botões de ação
            function disableActions() {
                actionButtons.forEach(btn => {
                    btn.style.pointerEvents = 'none';
                    btn.style.opacity = '0.6';
                    btn.disabled = true;
                });
            }
            
            // Habilita botões de ação e atualiza cooldown
            function enableActions() {
                if (gameState.gameOver) return; 

                actionButtons.forEach(btn => {
                    btn.style.pointerEvents = 'auto';
                    btn.style.opacity = '1';
                    btn.disabled = false;
                    
                    // Lógica de Cooldown para Supernova
                    if (btn.getAttribute('data-action') === 'supernova') {
                        const nameEl = btn.querySelector('.action-name');
                        if (gameState.playerUltimateCooldown > 0) {
                            nameEl.textContent = `Supernova (${gameState.playerUltimateCooldown}t)`;
                            btn.style.pointerEvents = 'none';
                            btn.style.opacity = '0.6';
                            btn.disabled = true;
                        } else {
                            nameEl.textContent = 'Supernova';
                        }
                    }
                });
            }
            
            // Lógica do ataque inimigo (Chefe Final)
            function executeEnemyTurn() {
                if (gameState.gameOver) return;
                
                // Ataques mais fortes para o chefe final
                const attacks = [
                    { name: 'Golpe Sombrio', damage: 20, heal: 0 },
                    { name: 'Tempestade Arcana', damage: 30, heal: 0 },
                    { name: 'Absorver Vida', damage: 15, heal: 15 } // Ataque com cura
                ];
                
                const attack = attacks[Math.floor(Math.random() * attacks.length)];
                let damage = attack.damage;
                let logType = 'enemy';
                
                // Aplicar escudo
                if (gameState.playerShield > 0) {
                    const blocked = Math.min(damage, gameState.playerShield);
                    damage -= blocked;
                    gameState.playerShield = 0; 
                    addLogMessage(`Sua armadura bloqueou **${blocked}** de dano!`, 'system');
                }
                
                gameState.playerHealth -= damage;
                addLogMessage(`Lorde do Caos usou **${attack.name}** e causou **${damage}** de dano!`, logType);

                // Aplicar cura do chefe
                if (attack.heal > 0) {
                    gameState.enemyHealth += attack.heal;
                    addLogMessage(`O Lorde do Caos absorveu **${attack.heal} de vida**!`, 'enemy');
                }
                
                // Reduzir cooldown do jogador
                if (gameState.playerUltimateCooldown > 0) {
                    gameState.playerUltimateCooldown--;
                }

                // Efeito visual no jogador (Shake)
                playerCard.classList.add('shake');
                setTimeout(() => {
                    playerCard.classList.remove('shake');
                }, 500);
                
                updateHealthBars();
                
                // MUDANÇA: Verifica se o jogo acabou *antes* de passar o turno
                if (!checkGameOver()) {
                    enableActions(); // Reabilita botões e atualiza UI do cooldown
                    gameState.isPlayerTurn = true; // MUDANÇA: Libera o turno do jogador
                    addLogMessage("É a sua vez. Ataque!", 'system');
                }
            }
            
            // Executar ação do jogador
            function executePlayerAction(action, damage) {
                // MUDANÇA: Verifica se é o turno do jogador
                if (gameState.gameOver || !gameState.isPlayerTurn) return;
                
                gameState.isPlayerTurn = false; // MUDANÇA: Trava o turno do jogador
                
                let damageValue = 0;
                let logMessage = '';
                
                disableActions();
                
                switch(action) {
                    case 'soco':
                        damageValue = parseInt(damage);
                        break;
                    
                    case 'raio-prismatico': // Habilidade melhorada
                        damageValue = parseInt(damage);
                        break;

                    case 'supernova': // Habilidade ultimate
                        if (gameState.playerUltimateCooldown > 0) {
                            addLogMessage("Habilidade em cooldown!", 'system');
                            enableActions(); // Reabilita, pois a ação falhou
                            gameState.isPlayerTurn = true; // MUDANÇA: Devolve o turno
                            return;
                        }
                        damageValue = parseInt(damage);
                        gameState.playerUltimateCooldown = 3; // Define cooldown de 3 turnos
                        logMessage = `**SUPERNOVA!** Você libera uma explosão cósmica causando **${damageValue}** de dano!`;
                        addLogMessage(logMessage, 'critical'); // Mensagem especial
                        break;
                        
                    case 'kit-medico':
                        const healAmount = 20;
                        gameState.playerHealth += healAmount;
                        logMessage = `Você usou o **Kit Médico** e recuperou **${healAmount} de vida**!`;
                        addLogMessage(logMessage, 'player');
                        
                        playerCard.classList.add('pulse-heal');
                        setTimeout(() => {
                            playerCard.classList.remove('pulse-heal');
                        }, 500);
                        break;
                        
                    case 'armadura':
                        gameState.playerShield = 10;
                        logMessage = 'Você ativou a **Armadura**! Próximo ataque inimigo será **reduzido em 10**.';
                        addLogMessage(logMessage, 'system');
                        break;
                }
                
                if (damageValue > 0 && action !== 'supernova') { // Supernova já tem log
                    gameState.enemyHealth -= damageValue;
                    gameState.score += damageValue;
                    logMessage = `Você usou **${getActionName(action)}** e causou **${damageValue}** de dano!`;
                    addLogMessage(logMessage, 'player');
                } else if (damageValue > 0 && action === 'supernova') {
                    // Dano da supernova
                    gameState.enemyHealth -= damageValue;
                    gameState.score += damageValue;
                }

                if (damageValue > 0) {
                    enemyCard.classList.add('shake');
                    setTimeout(() => {
                        enemyCard.classList.remove('shake');
                    }, 500);
                }
                
                updateHealthBars();
                
                // MUDANÇA: Inicia o turno do inimigo automaticamente
                if (!checkGameOver()) {
                    addLogMessage("Sua ação concluída. Aguarde o Lorde do Caos...", 'system');
                    setTimeout(() => {
                        addLogMessage("--- Turno do Lorde do Caos ---", 'system');
                        executeEnemyTurn();
                    }, 1500); // 1.5s de atraso
                }
            }
            
            // --- Adicionar Eventos aos Botões ---
            
            actionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // MUDANÇA: Verifica pela flag de turno
                    if (gameState.gameOver || !gameState.isPlayerTurn) return;
                    
                    const action = this.getAttribute('data-action');
                    const damage = this.getAttribute('data-damage');
                    
                    executePlayerAction(action, damage);
                });
            });
            
            // MUDANÇA: Event listener do 'nextTurnBtn' removido
            
            // Botão "Menu Principal"
            window.goToMenu = function() {
                console.log("Redirecionando para o Menu Principal...");
                window.location.href = 'index'; // Altere para o link do seu menu
            }

            // Botão "Ver Créditos" (Tela de Vitória)
            nextPhaseBtn.addEventListener('click', function() {
                console.log("Redirecionando para os créditos...");
                window.location.href = 'creditos'; // Altere para sua página de créditos
            });

            // Botão "Tentar Novamente" (Tela de Derrota)
            retryBtn.addEventListener('click', function() {
                // Recarrega a página da fase final para tentar de novo
                window.location.reload(); 
            });

            // --- Inicialização ---
            updateHealthBars(); // Garante que a vida inicial esteja correta
            // MUDANÇA: Mensagem de log corrigida
            addLogMessage(`Pontuação da Fase 1 carregada: ${gameState.score}`, 'system');
        });
    </script>

</body>
</html>