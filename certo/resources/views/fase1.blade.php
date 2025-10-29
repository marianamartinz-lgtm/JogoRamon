<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Escolha seu equipamento (Cores Clássicas)</title>
    <style>
        /* Importação e Estilos CSS */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        /* Definição de Cores - Retornando ao esquema claro */
        :root {
            --light-color: #5d5d5d; /* Cor de texto padrão (escuro) */
            --highlight-color: #a8d8ea; /* Azul claro para destaque tech */
            --dark-background: #ffffff; /* Fundo principal claro */
            --glow-effect: 0 0 8px rgba(255, 255, 255, 0.7); /* Efeito de brilho sutil */
            --main-gradient: linear-gradient(90deg, #a8d8ea, #ffaaa7); /* Gradiente original */
        }

        body {
            margin: 0;
            height: 100vh;
            /* Fundo Original */
            background: linear-gradient(135deg, #a8d8ea, #f9d6c1, #ffaaa7); 
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            color: var(--light-color);
        }

        .container {
            text-align: center;
            position: relative;
            z-index: 10;
            width: 90%;
            max-width: 1200px;
            max-height: 90vh;
            overflow-y: auto;
            padding-bottom: 30px;
            /* Fundo semi-transparente e claro */
            background: rgba(255, 255, 255, 0.85);
            border-radius: 10px;
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.2);
            padding-top: 20px;
            border: 1px solid rgba(255, 255, 255, 0.5); 
        }

        h2 {
            color: var(--light-color);
            font-size: 26px;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
        }

        .player-info {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            padding: 12px 25px;
            display: inline-flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            border-left: 3px solid #ffaaa7;
        }

        .player-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #ffaaa7;
            box-shadow: 0 0 8px #ffaaa7;
        }

        .player-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .player-name {
            font-size: 18px;
            font-weight: 600;
            color: var(--light-color);
        }

        .equipment-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
            padding: 0 10px;
        }

        .category {
            /* Fundo Claro para os cards */
            background: rgba(255, 255, 255, 0.9); 
            border-radius: 8px; /* Angular */
            padding: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(168, 216, 234, 0.3);
        }

        .category:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2), 0 0 10px #a8d8ea;
        }

        .category-title {
            color: var(--light-color);
            font-size: 18px;
            margin-bottom: 12px;
            padding-bottom: 6px;
            border-bottom: 2px solid var(--highlight-color);
            text-shadow: 0 0 5px rgba(168, 216, 234, 0.7);
        }

        /* --- ESTILO TECNOLÓGICO PARA OS BOTÕES DE ESCOLHA (.option) --- */
        .option {
            display: flex;
            align-items: center;
            /* Fundo da opção mais escuro */
            background: rgba(245, 245, 255, 0.7); 
            border-radius: 4px; /* Mais angular */
            padding: 12px;
            margin-bottom: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 1px solid transparent;
            position: relative;
            overflow: hidden; 
        }
        
        /* Linha sutil para o efeito de interface de dados */
        .option::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background: rgba(168, 216, 234, 0.5);
        }

        .option:hover {
            background: rgba(230, 230, 250, 0.9);
            transform: scale(1.02);
            border-color: rgba(168, 216, 234, 0.7);
        }

        .option.selected {
            border-color: #ffaaa7; /* Cor de borda de seleção mais quente */
            background: rgba(255, 170, 167, 0.2); /* Fundo de seleção suave */
            box-shadow: 0 0 8px #ffaaa7; /* Efeito neon de seleção */
        }
        
        .option.selected::after {
            background: #ffaaa7; /* Linha de destaque acesa */
            height: 2px;
            box-shadow: 0 0 5px #ffaaa7;
        }

        .option input[type="radio"] {
            opacity: 0;
            width: 0;
            height: 0;
            margin: 0;
            padding: 0;
        }

        .option-icon {
            /* Estilo Tech para o ícone */
            width: 35px;
            height: 35px;
            background: rgba(168, 216, 234, 0.2);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 18px;
            color: var(--light-color);
            border: 1px solid rgba(168, 216, 234, 0.5);
        }
        
        .option.selected .option-icon {
            background: #ffaaa7;
            color: white;
            box-shadow: 0 0 5px #ffaaa7;
        }

        .option-info {
            text-align: left;
            flex: 1;
        }

        .option-name {
            font-weight: 600;
            color: var(--light-color);
            font-size: 14px;
        }

        .option-desc {
            font-size: 11px;
            color: #777;
        }
        /* --- FIM ESTILO TECNOLÓGICO PARA BOTÕES DE ESCOLHA --- */

        /* AJUSTE BOTÕES FINAIS */
        .button-container {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn {
            /* Mantendo o gradiente original e o estilo compacto */
            background: var(--main-gradient); 
            border: none;
            border-radius: 4px; /* Angular */
            cursor: pointer;
            padding: 12px 25px;
            min-width: 200px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 0 15px rgba(168, 216, 234, 0.6); 
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px rgba(168, 216, 234, 0.9);
            filter: brightness(1.1);
        }

        .btn-secondary {
            /* Estilo para o VOLTAR */
            background: transparent;
            color: var(--light-color);
            border: 2px solid var(--light-color);
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .btn-secondary:hover {
            color: #ffaaa7;
            border-color: #ffaaa7;
            box-shadow: 0 0 10px rgba(255, 170, 167, 0.7);
        }

        /* --- Fundo animado (Cores originais) --- */
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

        /* CORREÇÃO RESPONSIVA */
        @media (max-width: 600px) {
            .btn {
                width: 100%; 
                margin-bottom: 5px;
                min-width: auto;
            }
            .button-container {
                gap: 10px;
                margin-top: 20px;
            }
            .container {
                padding-bottom: 20px;
            }
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
        <h2>Escolha seu equipamento</h2>
        
        <div class="player-info">
            <div class="player-avatar" id="player-avatar">
                </div>
            <div class="player-name" id="player-name">
                </div>
        </div>

        <div class="equipment-grid">
            <div class="category">
                <div class="category-title">Escudos</div>
                
                <div class="option" data-category="shield">
                    <input type="radio" name="shield" id="shield1">
                    <div class="option-icon">🛡️</div>
                    <div class="option-info">
                        <div class="option-name">Escudo de Plasma</div>
                        <div class="option-desc">Absorve 80% do dano recebido</div>
                    </div>
                </div>
                
                <div class="option" data-category="shield">
                    <input type="radio" name="shield" id="shield2">
                    <div class="option-icon">🔰</div>
                    <div class="option-info">
                        <div class="option-name">Escudo de Energia</div>
                        <div class="option-desc">Regenera 5% de vida por segundo</div>
                    </div>
                </div>
                
                <div class="option" data-category="shield">
                    <input type="radio" name="shield" id="shield3">
                    <div class="option-icon">🌀</div>
                    <div class="option-info">
                        <div class="option-name">Escudo de Deflexão</div>
                        <div class="option-desc">Reflete 30% do dano de volta</div>
                    </div>
                </div>
            </div>
            
            <div class="category">
                <div class="category-title">Armaduras</div>
                
                <div class="option" data-category="armor">
                    <input type="radio" name="armor" id="armor1">
                    <div class="option-icon">🥼</div>
                    <div class="option-info">
                        <div class="option-name">Armadura Leve</div>
                        <div class="option-desc">+15 agilidade, +10 defesa</div>
                    </div>
                </div>
                
                <div class="option" data-category="armor">
                    <input type="radio" name="armor" id="armor2">
                    <div class="option-icon">🦺</div>
                    <div class="option-info">
                        <div class="option-name">Armadura Média</div>
                        <div class="option-desc">+25 defesa, +5 agilidade</div>
                    </div>
                </div>
                
                <div class="option" data-category="armor">
                    <input type="radio" name="armor" id="armor3">
                    <div class="option-icon">🛡️</div>
                    <div class="option-info">
                        <div class="option-name">Armadura Pesada</div>
                        <div class="option-desc">+40 defesa, -10 agilidade</div>
                    </div>
                </div>
            </div>
            
            <div class="category">
                <div class="category-title">Equipamentos</div>
                
                <div class="option" data-category="equipment">
                    <input type="radio" name="equipment" id="equipment1">
                    <div class="option-icon">🔦</div>
                    <div class="option-info">
                        <div class="option-name">Lanterna Tática</div>
                        <div class="option-desc">Revela áreas escondidas</div>
                    </div>
                </div>
                
                <div class="option" data-category="equipment">
                    <input type="radio" name="equipment" id="equipment2">
                    <div class="option-icon">🧭</div>
                    <div class="option-info">
                        <div class="option-name">Navegador Quântico</div>
                        <div class="option-desc">+20% velocidade de movimento</div>
                    </div>
                </div>
                
                <div class="option" data-category="equipment">
                    <input type="radio" name="equipment" id="equipment3">
                    <div class="option-icon">🔋</div>
                    <div class="option-info">
                        <div class="option-name">Gerador de Campo</div>
                        <div class="option-desc">Habilidades recarregam 30% mais rápido</div>
                    </div>
                </div>
            </div>
            
            <div class="category">
                <div class="category-title">Ataques</div>
                
                <div class="option" data-category="attack">
                    <input type="radio" name="attack" id="attack1">
                    <div class="option-icon">⚡</div>
                    <div class="option-info">
                        <div class="option-name">Raio de Plasma</div>
                        <div class="option-desc">Dano: 50, Alcance: Médio</div>
                    </div>
                </div>
                
                <div class="option" data-category="attack">
                    <input type="radio" name="attack" id="attack2">
                    <div class="option-icon">💥</div>
                    <div class="option-info">
                        <div class="option-name">Explosão Sônica</div>
                        <div class="option-desc">Dano: 70 em área, Alcance: Curto</div>
                    </div>
                </div>
                
                <div class="option" data-category="attack">
                    <input type="radio" name="attack" id="attack3">
                    <div class="option-icon">❄️</div>
                    <div class="option-info">
                        <div class="option-name">Congelamento Criogênico</div>
                        <div class="option-desc">Dano: 30, Congela inimigos por 3s</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="button-container">
            <button class="btn" id="confirm-btn">CONFIRMAR ESCOLHAS</button>
            <button class="btn btn-secondary" onclick="goBack()">VOLTAR</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Recuperar dados da primeira fase
            const playerName = localStorage.getItem("playerName") || "Jogador";
            const characterPhoto = localStorage.getItem("selectedCharacterPhoto") || "";
            const characterName = localStorage.getItem("selectedCharacterName") || "Herói";
            
            // Exibir informações do jogador
            document.getElementById('player-name').textContent = `${playerName} - ${characterName}`;
            
            const playerAvatar = document.getElementById('player-avatar');
            if (characterPhoto) {
                const img = document.createElement('img');
                img.src = characterPhoto;
                img.alt = "Personagem selecionado";
                playerAvatar.appendChild(img);
            } else {
                playerAvatar.textContent = "👤";
                playerAvatar.style.display = 'flex';
                playerAvatar.style.alignItems = 'center';
                playerAvatar.style.justifyContent = 'center';
                playerAvatar.style.fontSize = '30px';
            }
            
            // Adicionar interatividade às opções
            const options = document.querySelectorAll('.option');
            options.forEach(option => {
                option.addEventListener('click', function() {
                    const category = this.getAttribute('data-category');
                    const radio = this.querySelector('input[type="radio"]');
                    
                    // Desselecionar outras opções da mesma categoria
                    document.querySelectorAll(`.option[data-category="${category}"]`).forEach(opt => {
                        opt.classList.remove('selected');
                        opt.querySelector('input[type="radio"]').checked = false;
                    });
                    
                    // Selecionar esta opção
                    this.classList.add('selected');
                    radio.checked = true;
                });
            });
            
            // Botão de confirmação
            document.getElementById('confirm-btn').addEventListener('click', function() {
                // Verificar se todas as categorias foram selecionadas
                const categories = ['shield', 'armor', 'equipment', 'attack'];
                let allSelected = true;
                
                categories.forEach(category => {
                    const selected = document.querySelector(`.option[data-category="${category}"] input:checked`);
                    if (!selected) {
                        allSelected = false;
                    }
                });
                
                if (allSelected) {
                    // Salvar seleções
                    const selections = {};
                    categories.forEach(category => {
                        const selectedOption = document.querySelector(`.option[data-category="${category}"] input:checked`).closest('.option');
                        selections[category] = {
                            name: selectedOption.querySelector('.option-name').textContent,
                            description: selectedOption.querySelector('.option-desc').textContent
                        };
                    });
                    
                    localStorage.setItem('equipmentSelections', JSON.stringify(selections));
                    
                    window.location.href = '/batalha'; 
                    
                } else {
                    alert('Por favor, selecione uma opção de cada categoria antes de continuar.');
                }
            });
        });

        function goBack() {
            window.location.href = "/batalha";
        }
       
    </script>
</body>
</html>