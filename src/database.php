<?php
$host = 'db.qmpellnictvsodhiufzq.supabase.co';
$port = '5432';
$dbname = 'postgres';
$user = 'postgres';
$password = 'vjE6Ak8DiEvlzpGc';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Connected to Supabase PostgreSQL successfully!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
?>