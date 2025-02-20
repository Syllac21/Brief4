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
                    <table id="usersTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>john@example.com</td>
                                <td>
                                <button class="btn btn-info" onclick=""> View</button>
                                    <button class="btn btn-danger" onclick=""> Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-success" data-toggle="modal" data-target="#addUserModal">Add User</button>
                </div>
        </div>
    </div>
</div>
