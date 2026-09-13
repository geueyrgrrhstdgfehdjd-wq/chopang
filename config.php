<?php
session_start();

$host = getenv("DB_HOST") ?: "localhost";
$port = getenv("DB_PORT") ?: "3306";
$db   = getenv("DB_NAME") ?: "shop";
$user = getenv("DB_USERNAME") ?: (getenv("DB_USER") ?: "root");
$pass = getenv("DB_PASSWORD") ?: (getenv("DB_PASS") ?: "");

try {
    $pdo = new PDO(
        "mysql:host={$host};port={$port};dbname={$db};charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (Throwable $e) {
    $pdo = null;
}

const SITE_NAME = "NEON SHOP";

// เก็บคีย์ไว้ใน Wasmer Environment Variables/Secrets
$TRUEWALLET_API_KEY = getenv("TRUEWALLET_API_KEY") ?: "";
