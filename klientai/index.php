<?php 
    if(isset($_SESSION['rights'])) {
        $user = unserialize($_SESSION['rights']);
    } else {
        return;
    }
    if ($user->canInspectClients()){
    } else {
        return;
    }
    if ($user->canDeleteClients()){
        $firmDatabase->deleteClient();
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klientai</title>
</head>
<body>
    <div class="container">
        <div class="card-body"><h5 class="card-title">Klientai Main</h5>
        <?php 
            if ($user->canCreateClients()){
                echo "<a class='btn btn-primary mt-3 mb-3' href='index.php?page=clientsCreate'>Create</a>";
            } 
            if ($user->canInspectClientsRights()){
                echo "<a class='btn btn-primary mt-3 mb-3 ml-3' href='index.php?page=clientRights'>Client Rights</a>";
            } 
        ?>
            <div class="table-responsive">
                <table class="mb-0 table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vardas</th>
                        <th>Pavardė</th>
                        <th>Teises</th>
                        <th>aprasymas</th>
                        <th>Imone</th>
                        <th>Pridejimo Data</th>
                        <th class="text-center">Veiksmai</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($user->canInspectClients() && !($user->canDeleteClients()) && !($user->canEditClients())){
                            $firmDatabase->getClients("3");
                        } else if($user->canInspectClients()) {
                            $firmDatabase->getClients("1");
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