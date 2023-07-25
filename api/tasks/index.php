<?php
// Indirizzo database
$database = __DIR__ . '/../../database/tasks.json';

// Passo l'indirizzo del database (leggo conenuo JSON)
$json_data = file_get_contents($database);

// Trasformo in PHP (in array)
$tasks = json_decode($json_data, true);

// Leggo i dati JSON grezzi inviati tramite POST
$input_data = file_get_contents('php://input');
$input_data = json_decode($input_data, true); // Decodifica i dati JSON in un array

// Verifico se la chiave 'task' esiste nel JSON decodificato
if (isset($input_data['task'])) {
    // Aggiungo la nuova attività all'array tasks
    $tasks[] = $input_data['task'];

    // Converto l'array tasks aggiornato in JSON
    $json_tasks = json_encode($tasks);

    // Salvo i dati JSON aggiornati nel file
    file_put_contents($database, $json_tasks);
}

// Avviso che la risposta e' in Json
header('Content-Type: application/json');

// Converto in Json
echo json_encode($tasks);
