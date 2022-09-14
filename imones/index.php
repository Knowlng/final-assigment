<?php 
    if(isset($_SESSION['rights'])) {
        $user = unserialize($_SESSION['rights']);
    } else {
        return;
    }
    if ($user->canInspectFirms()){
    } else {
        return;
    }
    if ($user->canDeleteFirms()){
        $firmDatabase->deleteFirm();
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imones</title>
</head>
<body>
    <div class="container">
        <div class="main-card card">
            <div class="card-body"><h5 class="card-title">Imonės Main</h5>
                <?php
                    if ($user->canCreateFirms()){
                        echo "<a class='btn btn-primary mt-3 mb-3' href='index.php?page=firmCreate'>Create</a>";
                    }
                    if ($user->canInspectFirmTypes()){
                        echo "<a class='btn btn-primary mt-3 mb-3 ml-3' href='index.php?page=firmTypes'>Firm Types</a>";
                    }
                ?>
                <div class="table-responsive">
                    <table class="mb-0 table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pavadinimas</th>
                            <th class="text-center">Tipas</th>
                            <th>Aprasymas</th>
                            <th>Veiksmai</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if ($user->canInspectFirms() && !($user->canDeleteFirms()) && !($user->canEditFirms())){
                                $firmDatabase->displayFirms("3");
                                } else if($user->canInspectFirms()) {
                                    $firmDatabase->displayFirms("1");
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