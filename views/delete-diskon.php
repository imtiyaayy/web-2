<?php
require_once __DIR__ . '/../models/KartuDiskon.php';

use models\KartuDiskon;


if (!isset($_GET['id'])) {
    header("Location: list-diskon.php");
    exit;
}

$kartu_diskon = KartuDiskon::find($_GET['id']);

if(!$kartu_diskon) {
    header("Location: list-diskon.php");
    exit;
}

KartuDiskon::delete($_GET['id']);
header("Location: list-diskon.php");

?>