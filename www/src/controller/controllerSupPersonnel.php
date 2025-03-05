<?php

require_once(dirname(__DIR__, 1) . '/model/personnel.php');
if (!empty($_GET['delete_id']) && !empty($_GET['confirm_delete'])) {
    $personne = new Personnel;
    $result = $personne->archivePersonnel($_GET['delete_id']);
        header('Location: /?page=dashboard&table=personnel');
    exit();
}