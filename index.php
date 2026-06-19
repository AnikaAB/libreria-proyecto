<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>📚 Librería Sistema</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f0f4f8; }
        header { background: #2c3e50; color: white; padding: 20px 40px; display: flex; align-items: center; gap: 15px; }
        header h1 { font-size: 28px; }
        .cards { display: flex; gap: 30px; justify-content: center; padding: 60px 40px; flex-wrap: wrap; }
        .card { background: white; border-radius: 16px; padding: 40px 30px; width: 250px; text-align: center;
                box-shadow: 0 4px 20px rgba(0,0,0,0.1); transition: transform 0.2s; }
        .card:hover { transform: translateY(-8px); }
        .card .icon { font-size: 50px; margin-bottom: 15px; }
        .card h2 { color: #2c3e50; margin-bottom: 10px; }
        .card p { color: #7f8c8d; font-size: 14px; margin-bottom: 20px; }
        .card a { background: #2c3e50; color: white; padding: 10px 25px; border-radius: 8px;
                  text-decoration: none; font-weight: bold; }
        .card a:hover { background: #1a252f; }
        footer { text-align: center; padding: 20px; color: #95a5a6; font-size: 13px; }
    </style>
</head>
<body>
    <header>
        <span style="font-size:36px">📚</span>
        <div>
            <h1>Sistema de Librería</h1>
            <p style="font-size:13px; opacity:0.7">Ingeniería de Software 2</p>
        </div>
    </header>
    <div class="cards">
        <div class="card">
            <div class="icon">🔐</div>
            <h2>Acceso</h2>
            <p>Inicia sesión para acceder al sistema de gestión</p>
            <a href="/login/login.php">Entrar</a>
        </div>
        <div class="card">
            <div class="icon">💳</div>
            <h2>Pagos</h2>
            <p>Registra y consulta todos los pagos realizados</p>
            <a href="/pagos/pagos.php">Ver Pagos</a>
        </div>
        <div class="card">
            <div class="icon">📊</div>
            <h2>Reportes</h2>
            <p>Visualiza estadísticas y libros más vendidos</p>
            <a href="/reportes/reportes.php">Ver Reportes</a>
        </div>
    </div>
    <footer>© 2025 Librería Sistema — Desarrollado por AnikaAB & María</footer>
</body>
</html>
