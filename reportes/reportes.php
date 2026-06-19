<?php
$libros = [
    ["titulo" => "El Principito",  "autor" => "Saint-Exupéry", "categoria" => "Clásico",  "vendidos" => 5,  "precio" => 15.00],
    ["titulo" => "Harry Potter",   "autor" => "J.K. Rowling",  "categoria" => "Fantasía", "vendidos" => 8,  "precio" => 20.00],
    ["titulo" => "Cien Años",      "autor" => "García Márquez","categoria" => "Clásico",  "vendidos" => 3,  "precio" => 18.00],
    ["titulo" => "El Alquimista",  "autor" => "Paulo Coelho",  "categoria" => "Novela",   "vendidos" => 6,  "precio" => 12.00],
    ["titulo" => "Don Quijote",    "autor" => "Cervantes",     "categoria" => "Clásico",  "vendidos" => 2,  "precio" => 25.00],
];
$mejor = array_reduce($libros, fn($c, $i) => (!$c || $i['vendidos'] > $c['vendidos']) ? $i : $c);
$totalVentas = array_sum(array_column($libros, 'vendidos'));
$totalIngresos = array_sum(array_map(fn($l) => $l['vendidos'] * $l['precio'], $libros));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>📊 Reportes - Librería</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f0f4f8; }
        header { background: #2c3e50; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        header a { color: #bdc3c7; text-decoration: none; font-size: 14px; }
        .container { padding: 40px; }
        .resumen { display: flex; gap: 20px; margin-bottom: 30px; flex-wrap: wrap; }
        .stat { background: white; padding: 20px 30px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .stat h3 { color: #7f8c8d; font-size: 13px; margin-bottom: 5px; }
        .stat p { color: #2c3e50; font-size: 26px; font-weight: bold; }
        .mejor { background: #2c3e50; color: white; padding: 20px 30px; border-radius: 12px; margin-bottom: 30px; }
        .mejor h3 { font-size: 13px; opacity: 0.7; margin-bottom: 5px; }
        .mejor p { font-size: 22px; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        th { background: #2c3e50; color: white; padding: 14px 18px; text-align: left; font-size: 14px; }
        td { padding: 13px 18px; border-bottom: 1px solid #f0f0f0; font-size: 14px; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #f8f9fa; }
        .bar-bg { background: #eee; border-radius: 10px; height: 10px; width: 150px; }
        .bar { background: #2c3e50; height: 10px; border-radius: 10px; }
    </style>
</head>
<body>
    <header>
        <span style="font-size:20px; font-weight:bold">📊 Reportes de Librería</span>
        <a href="/">⬅ Volver al inicio</a>
    </header>
    <div class="container">
        <div class="resumen">
            <div class="stat"><h3>TOTAL LIBROS</h3><p><?= count($libros) ?></p></div>
            <div class="stat"><h3>UNIDADES VENDIDAS</h3><p><?= $totalVentas ?></p></div>
            <div class="stat"><h3>INGRESOS TOTALES</h3><p>$<?= number_format($totalIngresos, 2) ?></p></div>
        </div>
        <div class="mejor">
            <h3>🏆 LIBRO MÁS VENDIDO</h3>
            <p><?= $mejor['titulo'] ?> — <?= $mejor['vendidos'] ?> unidades vendidas</p>
        </div>
        <table>
            <tr><th>Título</th><th>Autor</th><th>Categoría</th><th>Precio</th><th>Vendidos</th><th>Popularidad</th></tr>
            <?php $max = max(array_column($libros, 'vendidos')); ?>
            <?php foreach ($libros as $l): ?>
            <tr>
                <td><strong><?= $l['titulo'] ?></strong></td>
                <td><?= $l['autor'] ?></td>
                <td><?= $l['categoria'] ?></td>
                <td>$<?= number_format($l['precio'], 2) ?></td>
                <td><?= $l['vendidos'] ?></td>
                <td>
                    <div class="bar-bg">
                        <div class="bar" style="width:<?= ($l['vendidos']/$max)*100 ?>%"></div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
