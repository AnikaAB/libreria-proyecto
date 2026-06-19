<?php
$pagos = [
    ["cliente" => "Juan Pérez",    "libro" => "El Principito",   "monto" => 15.00, "fecha" => "2025-06-01", "estado" => "Pagado"],
    ["cliente" => "María López",   "libro" => "Harry Potter",    "monto" => 20.00, "fecha" => "2025-06-03", "estado" => "Pagado"],
    ["cliente" => "Carlos Ruiz",   "libro" => "Cien Años",       "monto" => 18.00, "fecha" => "2025-06-05", "estado" => "Pendiente"],
    ["cliente" => "Ana Torres",    "libro" => "El Alquimista",   "monto" => 12.00, "fecha" => "2025-06-07", "estado" => "Pagado"],
    ["cliente" => "Luis Mora",     "libro" => "Don Quijote",     "monto" => 25.00, "fecha" => "2025-06-10", "estado" => "Pendiente"],
];
$total = array_sum(array_column($pagos, "monto"));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>💳 Pagos - Librería</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f0f4f8; }
        header { background: #2c3e50; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        header a { color: #bdc3c7; text-decoration: none; font-size: 14px; }
        .container { padding: 40px; }
        h2 { color: #2c3e50; margin-bottom: 25px; font-size: 24px; }
        .resumen { display: flex; gap: 20px; margin-bottom: 30px; flex-wrap: wrap; }
        .stat { background: white; padding: 20px 30px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .stat h3 { color: #7f8c8d; font-size: 13px; margin-bottom: 5px; }
        .stat p { color: #2c3e50; font-size: 26px; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        th { background: #2c3e50; color: white; padding: 14px 18px; text-align: left; font-size: 14px; }
        td { padding: 13px 18px; border-bottom: 1px solid #f0f0f0; font-size: 14px; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #f8f9fa; }
        .badge { padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; }
        .Pagado   { background: #d5f5e3; color: #1e8449; }
        .Pendiente { background: #fdebd0; color: #d35400; }
    </style>
</head>
<body>
    <header>
        <span style="font-size:20px; font-weight:bold">💳 Gestión de Pagos</span>
        <a href="/">⬅ Volver al inicio</a>
    </header>
    <div class="container">
        <div class="resumen">
            <div class="stat"><h3>TOTAL TRANSACCIONES</h3><p><?= count($pagos) ?></p></div>
            <div class="stat"><h3>INGRESOS TOTALES</h3><p>$<?= number_format($total, 2) ?></p></div>
            <div class="stat"><h3>PAGOS COMPLETADOS</h3><p><?= count(array_filter($pagos, fn($p) => $p['estado'] == 'Pagado')) ?></p></div>
            <div class="stat"><h3>PENDIENTES</h3><p><?= count(array_filter($pagos, fn($p) => $p['estado'] == 'Pendiente')) ?></p></div>
        </div>
        <table>
            <tr><th>Cliente</th><th>Libro</th><th>Monto</th><th>Fecha</th><th>Estado</th></tr>
            <?php foreach ($pagos as $p): ?>
            <tr>
                <td><?= $p['cliente'] ?></td>
                <td><?= $p['libro'] ?></td>
                <td>$<?= number_format($p['monto'], 2) ?></td>
                <td><?= $p['fecha'] ?></td>
                <td><span class="badge <?= $p['estado'] ?>"><?= $p['estado'] ?></span></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
