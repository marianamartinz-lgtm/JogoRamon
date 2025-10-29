<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créditos - Batalha Final</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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
            overflow: hidden;
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

        .credits-container {
            background: rgba(10, 10, 20, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(138, 43, 226, 0.2);
            width: 100%;
            max-width: 600px;
            padding: 40px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(138, 43, 226, 0.3);
            text-align: center;
            animation: fadeInContainer 1s ease-out;
        }

        @keyframes fadeInContainer {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .logo {
            font-size: 36px;
            font-weight: 800;
            background: linear-gradient(135deg, #8a2be2, #4169e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
        }

        .credits-section {
            margin-bottom: 25px;
            opacity: 0;
            animation: fadeInItem 0.5s ease-out forwards;
        }

        .credits-section:nth-child(2) { animation-delay: 0.5s; }
        .credits-section:nth-child(3) { animation-delay: 1.0s; }
        .button-container { animation-delay: 1.5s; opacity: 0; animation: fadeInItem 0.5s ease-out forwards;}


        @keyframes fadeInItem {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-title {
            font-size: 16px;
            color: #ffaf4c;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .section-content {
            font-size: 22px;
            color: #e0e0e0;
            font-weight: 500;
        }

        .btn-menu {
            padding: 16px 20px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            background: linear-gradient(135deg, #8a2be2, #4169e1);
            color: white;
            text-decoration: none; /* Para o caso de usar <a> */
            min-width: 250px;
            margin-top: 20px;
        }

        .btn-menu:hover {
            background: linear-gradient(135deg, #9a3be2, #5179e1);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(138, 43, 226, 0.3);
        }

    </style>
</head>
<body>

    <div class="credits-container">
        <div class="logo">Créditos</div>

        <div class="credits-section">
            <div class="section-title">Desenvolvimento</div>
            <div class="section-content">
                Mariana<br>
                Maria Isabel
            </div>
        </div>

        <div class="credits-section">
            <div class="section-title">Projeto</div>
            <div class="section-content">
                Programação Backend
            </div>
        </div>

        <div class="button-container">
            <a href="/" class="btn-menu">
                <i class="fas fa-bars"></i> Menu Principal
            </a>
        </div>
    </div>

</body>
</html>