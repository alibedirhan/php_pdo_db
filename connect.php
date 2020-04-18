<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=dersler', 'root', 'root');
} catch (PDOException $exception) {
    echo $exception -> getMessage();
}