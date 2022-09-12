<?php 
    if(isset($_SESSION['rights'])) {
        $user = unserialize($_SESSION['rights']);
    } else {
        return;
    }
    if ($user->canInspectUserLess()){
    } else {
        return;
    }
    if ($user->canDeleteUser()){
        $firmDatabase->deleteUsers();
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vartotojai</title>
</head>
<body>
    <div class="container">
        <div class="card-body"><h5 class="card-title">Vartotojai Main</h5>
        <?php 
            if ($user->canCreateUser()){
                echo "<a class='btn btn-primary mt-3 mb-3' href='index.php?page=userCreate'>Create</a>";
            } 
            if ($user->canInspectUserRights()){
                echo "<a class='btn btn-primary mt-3 mb-3 ml-3' href='index.php?page=userRights'>User Rights</a>";
            } 
        ?>
            <div class="table-responsive">
                <table class="mb-0 table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vardas</th>
                        <th>Pavardė</th>
                        <th>Slapyvardis</th>
                        <th>Teisės</th>
                        <th>Slaptažodis</th>
                        <th>Registracijos Data</th>
                        <th>Paskutinis Prisijungimas</th>
                        <th class="text-center">Veiksmai</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($user->canInspectUserFull()){
                            $firmDatabase->getUsers("1");
                        } else if($user->canInspectUserLess() && !($user->canDeleteUser())) {
                            $firmDatabase->getUsers("3");
                        } else if($user->canInspectUserLess() && $user->canDeleteUser()) {
                            $firmDatabase->getUsers("2");
                        } else {
                            return;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
    
</body>
</html>