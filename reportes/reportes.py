<?php

// Módulo Reportes - Librería
// Función: Generar reportes de libros y ventas

$libros = [
    ["titulo" => "El Principito",  "autor" => "Saint-Exupéry", "vendidos" => 5],
    ["titulo" => "Harry Potter",   "autor" => "J.K. Rowling",  "vendidos" => 8],
    ["titulo" => "Cien Años",      "autor" => "García Márquez","vendidos" => 3],
];

function reporteLibros($libros) {
    echo "📚 Reporte de Libros Disponibles:\n";
    foreach ($libros as $libro) {
        echo "- {$libro['titulo']} | Autor: {$libro['autor']} | Vendidos: {$libro['vendidos']}\n";
    }
}

function libroMasVendido($libros) {
    $mejor = $libros[0];
    foreach ($libros as $libro) {
        if ($libro["vendidos"] > $mejor["vendidos"]) {
            $mejor = $libro;
        }
    }
    echo "\n🏆 Libro más vendido: {$mejor['titulo']} con {$mejor['vendidos']} ventas\n";
}

// Prueba
reporteLibros($libros);
libroMasVendido($libros);
