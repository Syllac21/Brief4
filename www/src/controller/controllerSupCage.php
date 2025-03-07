<?php

require_once(dirname(__DIR__, 1) . '/model/Cage.php');
if (!empty($_GET['delete_id']) && !empty($_GET['confirm_delete'])) {
    $cageObj = new Cage;
    $result = $cageObj->removeCage($_GET['delete_id']);
    
    header('Location: /?page=dashboard&table=cage');
    exit();
}