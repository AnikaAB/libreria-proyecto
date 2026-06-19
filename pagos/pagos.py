<?php

// Módulo Pagos - Librería
// Función: Registrar y consultar pagos

$pagos = [];

function registrarPago($cliente, $monto, $libro) {
    global $pagos;
    $pago = [
        "cliente" => $cliente,
        "monto"   => $monto,
        "libro"   => $libro,
        "fecha"   => date("Y-m-d")
    ];
    $pagos[] = $pago;
    echo "✅ Pago registrado: $cliente pagó $$monto por '$libro'\n";
}

function verPagos() {
    global $pagos;
    echo "\n📋 Lista de Pagos:\n";
    foreach ($pagos as $p) {
        echo "- {$p['cliente']} | {$p['libro']} | \${$p['monto']} | {$p['fecha']}\n";
    }
}

// Prueba
registrarPago("Juan", 15.00, "El Principito");
registrarPago("Maria", 20.00, "Harry Potter");
verPagos();
