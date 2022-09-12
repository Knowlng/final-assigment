<?php 
    if(isset($_SESSION['rights'])) {
        $user = unserialize($_SESSION['rights']);
    } else {
        return;
    }
    if ($user->canCreateUserRights()){
    } else {
        return;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Create User Rights</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="./main.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="main-card mb-3 card w-100">
                <div class="card-body"><h5 class="card-title">Create User Rights</h5>
                    <form method="POST" class="">
                        <div class="position-relative form-group"><label for="name11" class="">Pavadinimas</label><input required='required' name="pavadinimas" id="name11" placeholder="Pavadinimas" type="text" class="form-control"></div>
                        <div class="position-relative form-group"><label for="surname11" class="">Aprasymas</label><input required='required' name="aprasymas" id="surname11" placeholder="Aprasymas" type="text" class="form-control"></div>
                        <button class="mt-1 btn btn-primary float-right" type="submit" name="createRight">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>