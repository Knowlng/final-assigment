<?php
if(isset($_SESSION['rights'])) {
    $user = unserialize($_SESSION['rights']);
} else {
    return;
}
if ($user->canCreateClients()){
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
    <title>Create Client</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="./main.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="main-card mb-3 card w-100">
                <div class="card-body"><h5 class="card-title">Create Client</h5>
                    <form method="POST" class="">
                        <div class="position-relative form-group"><label for="name11" class="">Vardas</label><input required='required' name="vardas" id="name11" placeholder="Vardas" type="text" class="form-control"></div>
                        <div class="position-relative form-group"><label for="surname11" class="">Pavarde</label><input required='required' name="pavarde" id="surname11" placeholder="Pavarde" type="text" class="form-control"></div>
                        <label>Teisės</label>
                        <select class="form-control" name="teises_ID">
                            <?php foreach($firmDatabase->getClientRights() as $right) { ?>
                                <option value="<?php echo $right['ID']; ?>"><?php echo $right['pavadinimas']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="position-relative form-group mt-3"><label for="aprasymas" class="">Aprasymas</label><input required='required' name="aprasymas" id="aprasymas" placeholder="Aprasymas" type="text" class="form-control"></div>
                        <label>Imone</label>
                        <select class="form-control" name="imones_id">
                            <?php foreach($firmDatabase->getFirms() as $firm) { ?>
                                <option value="<?php echo $firm['ID']; ?>"><?php echo $firm['pavadinimas']; ?></option>
                            <?php } ?>
                        </select>
                        <button class="mt-3 btn btn-primary float-right" type="submit" name="createClient">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>