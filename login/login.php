<?php
$mensaje = "";
$tipo = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $usuarios = [
        ["usuario" => "admin",    "contrasena" => "1234", "nombre" => "Administrador"],
        ["usuario" => "maria",    "contrasena" => "5678", "nombre" => "María"],
        ["usuario" => "anika",    "contrasena" => "abcd", "nombre" => "Anika"],
    ];
    $encontrado = false;
    foreach ($usuarios as $u) {
        if ($u["usuario"] == $usuario && $u["contrasena"] == $contrasena) {
            $mensaje = "✅ Bienvenida/o, {$u['nombre']}! Acceso concedido.";
            $tipo = "exito";
            $encontrado = true;
            break;
        }
    }
    if (!$encontrado) {
        $mensaje = "❌ Usuario o contraseña incorrectos.";
        $tipo = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>🔐 Login - Librería</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f0f4f8; display: flex; flex-direction: column; min-height: 100vh; }
        header { background: #2c3e50; color: white; padding: 15px 30px; }
        header a { color: #bdc3c7; text-decoration: none; font-size: 14px; }
        .container { flex: 1; display: flex; align-items: center; justify-content: center; padding: 40px; }
        .card { background: white; padding: 50px 40px; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        .card h2 { text-align: center; color: #2c3e50; margin-bottom: 30px; font-size: 24px; }
        label { display: block; margin-bottom: 6px; color: #555; font-size: 14px; font-weight: bold; }
        input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 15px; margin-bottom: 20px; }
        input:focus { outline: none; border-color: #2c3e50; }
        button { width: 100%; padding: 13px; background: #2c3e50; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer; font-weight: bold; }
        button:hover { background: #1a252f; }
        .mensaje { padding: 12px; border-radius: 8px; text-align: center; margin-bottom: 20px; font-weight: bold; }
        .exito { background: #d5f5e3; color: #1e8449; }
        .error  { background: #fadbd8; color: #c0392b; }
        .hint { margin-top: 20px; background: #eaf4fb; padding: 12px; border-radius: 8px; font-size: 13px; color: #2980b9; }
    </style>
</head>
<body>
    <header><a href="/">⬅ Volver al inicio</a></header>
    <div class="container">
        <div class="card">
            <h2>🔐 Iniciar Sesión</h2>
            <?php if ($mensaje): ?>
                <div class="mensaje <?= $tipo ?>"><?= $mensaje ?></div>
            <?php endif; ?>
            <form method="POST">
                <label>Usuario</label>
                <input type="text" name="usuario" placeholder="Ej: admin" required>
                <label>Contraseña</label>
                <input type="password" name="contrasena" placeholder="••••••" required>
                <button type="submit">Entrar</button>
            </form>
            <div class="hint">
                💡 Usuarios de prueba:<br>
                admin / 1234 &nbsp;|&nbsp; maria / 5678 &nbsp;|&nbsp; anika / abcd
            </div>
        </div>
    </div>
</body>
</html>
