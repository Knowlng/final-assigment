<?php 
    if(isset($_SESSION['rights'])) {
        $user = unserialize($_SESSION['rights']);
    } else {
        return;
    }
    if ($user->canInspectUserRights()){
        
    } else {
        return;
    }
    if ($user->canDeleteUserRights()){
        $firmDatabase->deleteRight();
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vartotojų teisės</title>
</head>
<body>
    <div class="container">
        <div class="card-body"><h5 class="card-title">Vartotojų Teisės Main</h5>
        <?php 
            if ($user->canCreateUserRights()){
                echo "<a class='btn btn-primary mt-3 mb-3' href='index.php?page=userCreateRights'>Create</a>";
            }
        ?>
            <div class="table-responsive">
                <table class="mb-0 table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pavadinimas</th>
                        <th>Aprašymas</th>
                        <th>Veiksmai</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $firmDatabase->getUsersRights(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
    
</body>
</html>

