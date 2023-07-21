<?php
// Indirizzo database
$database = __DIR__ . '/../../database/tasks.json';

// Passo l'indirizzo del database (leggo conenuo JSON)
$json_data = file_get_contents($database);

// Trasformo in PHP (in array)
$tasks = json_decode($json_data, true);


//  Controlliamo se abbiamo qualcosa in POST
$new_task = $_POST['task'] ?? null;
if ($new_task) {
    // Aggiungo new_task a tasks
    $tasks[]  = $new_task;

    // Converto in Json
    $json_tasks = json_encode($tasks);
    // Mando a file_put_contents convertito in Json
    file_put_contents($database, $json_tasks);
}

// Avviso che la risposta e' in Json
header('Content-Type: application/json');

// Converto in Json
echo json_encode($tasks);
