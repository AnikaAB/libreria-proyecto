<?php

// Módulo Login - Librería
// Función: Iniciar sesión

function iniciarSesion($usuario, $contrasena) {
    // Usuarios de prueba
    $usuarios = [
        ["usuario" => "admin", "contrasena" => "1234"],
        ["usuario" => "compañera", "contrasena" => "5678"],
    ];

    foreach ($usuarios as $u) {
        if ($u["usuario"] == $usuario && $u["contrasena"] == $contrasena) {
            echo "✅ Bienvenido, $usuario!";
            return true;
        }
    }

    echo "❌ Usuario o contraseña incorrectos.";
    return false;
}

function cerrarSesion($usuario) {
    echo "👋 Sesión cerrada para: $usuario";
}

// Prueba
iniciarSesion("admin", "1234");
