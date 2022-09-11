<?php 
    $firmDatabase = new FirmDatabase();
    $firmDatabase->deleteUsers();
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
                    <?php $firmDatabase->getUsers(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
    
</body>
</html>