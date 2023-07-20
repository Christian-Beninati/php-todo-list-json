<?php

$tasks = ["HTML", "CSS", "Responsive design", "Javascript", "PHP", "Laravel"];

// Avviso che la risposta e' in Json
header('Content-Type: application/json');

// Converto in Json
echo json_encode($tasks);
