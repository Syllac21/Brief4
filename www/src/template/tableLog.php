<?php
require_once(dirname(__DIR__,1).'/model/Log.php');
require_once(dirname(__DIR__,1).'/model/Personnel.php');

$objLog = new Log;
$objPersonnel = new Personnel;

$allLog = $objLog->getAllLogs();
$allPersonnel = $objPersonnel->getAllPersonnel();
?>

<body>

<div class="container mt-5 mb-8">
    <h2>Log Table</h2>
    <?php
    echo '<pre>';
    var_dump($allLog[0]['action']);
    echo '</pre>';?>
    <table class="table table-bordered mt-5">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Action</th>
                <th>date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($allLog as $log) :?>
                <tr>
                    <td><?=$allPersonnel[$log['id_personnel']]['nom'] ?></td>
                    <td><?=$log['action']?></td>
                    <td><?=$log['date_log']?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
