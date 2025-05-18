<?php
$host = 'db.qmpellnictvsodhiufzq.supabase.co';
$port = '5432';
$dbname = 'postgres';
$user = 'postgres';
$password = 'vjE6Ak8DiEvlzpGc';

// Force IPv4 resolution
$ip = gethostbyname($host);  // resolves to IPv4
$dsn = "pgsql:host=$ip;port=5432;dbname=postgres";

try {
    $dsn = "pgsql:host=$ip;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Connected to Supabase PostgreSQL successfully!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
?>