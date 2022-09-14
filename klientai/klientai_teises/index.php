<?php 
    if(isset($_SESSION['rights'])) {
        $user = unserialize($_SESSION['rights']);
    } else {
        return;
    }
    if ($user->canInspectClientsRights()){
    } else {
        return;
    }
    if ($user->canDeleteClientsRights()){
        $firmDatabase->deleteClientRight();
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klientu teises</title>
</head>
<body>
    <div class="container">
        <div class="main-card card">
            <div class="card-body"><h5 class="card-title">Klientų Teisės Main</h5>
                <?php
                    if ($user->canCreateClientsRights()){
                        echo "<a class='btn btn-primary mt-3 mb-3' href='index.php?page=clientCreateRights'>Create</a>";
                    }
                ?>
                <div class="table-responsive">
                    <table class="mb-0 table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pavadinimas</th>
                            <th>Reiksme</th>
                            <th>Veiksmai</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if ($user->canInspectClientsRights() && !($user->canDeleteClientsRights()) && !($user->canEditClientsRights())){
                                $firmDatabase->displayClientRights("3");
                                } else if($user->canInspectClientsRights()) {
                                    $firmDatabase->displayClientRights("1");
                                } else {
                                    return;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
         </div>
    </div>
</body>
</html>