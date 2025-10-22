<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Escolha seu equipamento</title>
    <style>
        /* Importação e Estilos CSS, sem alterações, foram mantidos aqui */
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
            width: 90%;
            max-width: 1200px;
        }

        h2 {
            color: #5d5d5d;
            font-size: 28px;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
        }

        .player-info {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 25px;
            padding: 15px 30px;
            display: inline-flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .player-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #ffaaa7;
            box-shadow: 0 0 15px rgba(255, 170, 167, 0.7);
        }

        .player-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .player-name {
            font-size: 22px;
            font-weight: 600;
            color: #5d5d5d;
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.7);
        }

        .equipment-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .category {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.9), rgba(240, 245, 255, 0.8));
            border-radius: 25px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .category:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .category-title {
            color: #5d5d5d;
            font-size: 20px;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid #ffaaa7;
            padding-bottom: 8px;
        }

        .option {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 15px;
            padding: 12px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 2px solid transparent;
        }

        .option:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: scale(1.02);
        }

        .option.selected {
            border-color: #ffaaa7;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 15px rgba(255, 170, 167, 0.5);
        }

        .option input {
            margin-right: 10px;
            transform: scale(1.2);
        }

        .option-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #a8d8ea, #ffaaa7);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 18px;
            color: white;
        }

        .option-info {
            text-align: left;
            flex: 1;
        }

        .option-name {
            font-weight: 600;
            color: #5d5d5d;
            margin-bottom: 3px;
        }

        .option-desc {
            font-size: 12px;
            color: #8a8a8a;
        }

        .button-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            background: linear-gradient(90deg, #a8d8ea, #ffaaa7);
            border: none;
            border-radius: 50px;
            cursor: pointer;
            padding: 18px 50px;
            font-size: 20px;
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
                playerAvatar.style.fontSize = '40px';
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
                    
                    // CORREÇÃO CRÍTICA: Vai para a ROTA /batalha (não o nome do arquivo!)
                    window.location.href = '/batalha'; 
                    
                } else {
                    alert('Por favor, selecione uma opção de cada categoria antes de continuar.');
                }
            });
        });

        // CORREÇÃO CRÍTICA: Volta para a ROTA / (página inicial), não um nome de arquivo
        function goBack() {
            window.location.href = "/";
        }
    </script>
</body>
</html>