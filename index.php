<?php

require_once 'connect.php';

if (!isset($_GET['sayfa'])){
    $_GET['sayfa'] = 'index';

}

Switch ($_GET['sayfa']){

    case 'index':
        require_once 'homepage.php';
        break;

    case 'insert':
        require_once 'insert.php';
        break;

}