<style>
    .btn{
        margin-top: 20px;
        background: green;
    }

    .sidebar {
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        background-color: #343a40;
        padding-top: 20px;
    }
    .sidebar .btn {
        width: 100%;
        margin-bottom: 15px;
    }

    .content-wrapper {
        margin-left: 250px;
        padding: 20px;
    }

    nav{
        color: white;
    }
    /* .bts-danger:{
    } */

</style>



<aside class="sidebar">
    <button class="btn btn-outline-light mt-5">Gestion des Cages</button>
    <button class="btn btn-outline-light">Gestion des Animaux</button>
    <button class="btn btn-outline-light">Gestion des Personnes</button>
</aside>


<div class="content-wrapper">
            <div class="content-header">
                <h1 class="mt-5 text-center">Gestion des Animaux</h1>
            </div>
            <div class="content">
            <div class="container mt-4">
                <!-- Users Table -->
                <div class="container mt-4">
                    <?php
                    include "tableanimal.php"
                    ?>
                    <button class="btn btn-success" data-toggle="modal" data-target="#addUserModal">Add User</button>
                </div>
        </div>
    </div>
</div>
