<?php 
    if(isset($_SESSION['rights'])) {
        $user = unserialize($_SESSION['rights']);
    } else {
        return;
    }
    if ($user->canInspectFirmTypes()){
    } else {
        return;
    }
    if ($user->canDeleteFirmTypes()){
        $firmDatabase->deleteFirmType();
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imoniu Tipai</title>
</head>
<body>
    <div class="container">
        <div class="main-card card">
            <div class="card-body"><h5 class="card-title">Imonių Tipai Main</h5>
                <?php
                    if ($user->canCreateFirmTypes()){
                        echo "<a class='btn btn-primary mt-3 mb-3' href='index.php?page=createFirmTypes'>Create</a>";
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
                            <?php if ($user->canInspectFirmTypes() && !($user->canDeleteFirmTypes()) && !($user->canEditFirmTypes())){
                                $firmDatabase->displayFirmTypes("3");
                                } else if($user->canInspectFirmTypes()) {
                                    $firmDatabase->displayFirmTypes("1");
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