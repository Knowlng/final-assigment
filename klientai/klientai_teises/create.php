<?php 
    if(isset($_SESSION['rights'])) {
        $user = unserialize($_SESSION['rights']);
    } else {
        return;
    }
    if ($user->canCreateClientsRights()){
        $firmDatabase->createClientRight();
    } else {
        return;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Client Rights</title>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="main-card mb-3 card w-100">
                <div class="card-body"><h5 class="card-title">Create Client Rights</h5>
                    <form method="POST" class="">
                        <div class="position-relative form-group"><label for="pavadinimas" class="">Pavadinimas</label><input required='required' name="pavadinimas" id="pavadinimas" placeholder="Pavadinimas" type="text" class="form-control"></div>
                        <div class="position-relative form-group"><label for="reiksme" class="">Reiksme</label><input required='required' name="reiksme" id="reiksme" placeholder="Reiksme" type="text" class="form-control"></div>
                        <button class="mt-1 btn btn-primary float-right" type="submit" name="createClientRight">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>