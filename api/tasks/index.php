<?php
// Indirizzo database
$database = __DIR__ . '/../../database/tasks.json';

// Passo l'indirizzo del database 
$json_data = file_get_contents($database);

// Trasformo in PHP
$tasks = json_decode($json_data, true);

// Avviso che la risposta e' in Json
header('Content-Type: application/json');

// Converto in Json
echo json_encode($tasks);
