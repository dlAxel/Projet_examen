<?php

/*
 * If user is not connected, redirect.
 * If connection older that 30s, redirect
 */

$maxTimeInSeconds = 3600;

session_start();
require_once 'config.php';
global $bdd;

if (!empty($_SESSION['token'])) {
    $query = 'SELECT `id` FROM `compte` WHERE token=' . $bdd->quote($_SESSION['token']);
    $sth = $bdd->query($query);
    $data = $sth->fetchAll();

    if (count($data)) {
        // check time !
        $start = base64_decode($_SESSION['token']);
        $elapsed = time() - $start;
        if ($elapsed > $maxTimeInSeconds) {
            session_destroy();
        }
    }
}

if (empty($_SESSION['token'])) {
    // redirect
    if (file_exists('../index.html')) {
        header('Location: ../index.html');
    }
}