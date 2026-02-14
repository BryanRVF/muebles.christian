<?php
// guardar_tiempo.php
session_start();

if(isset($_POST['tiempo'])) {
    $tiempo = intval($_POST['tiempo']);
    
    if(!isset($_SESSION['mejor_tiempo']) || $tiempo < $_SESSION['mejor_tiempo']) {
        $_SESSION['mejor_tiempo'] = $tiempo;
        echo json_encode(['success' => true, 'record' => $tiempo]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>