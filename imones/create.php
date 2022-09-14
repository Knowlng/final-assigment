<?php 
    if(isset($_SESSION['rights'])) {
        $user = unserialize($_SESSION['rights']);
    } else {
        return;
    }
    if ($user->canCreateFirms()){
        $firmDatabase->createFirm();
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
    <title>Create Firm</title>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="main-card mb-3 card w-100">
                <div class="card-body"><h5 class="card-title">Create Firm</h5>
                    <form method="POST" class="">
                        <div class="position-relative form-group"><label for="pavadinimas" class="">Pavadinimas</label><input required='required' name="pavadinimas" id="pavadinimas" placeholder="Pavadinimas" type="text" class="form-control"></div>
                        <label>Tipas</label>
                        <select class="form-control" name="tipas_ID">
                            <?php foreach($firmDatabase->getFirmTypes() as $type) { ?>
                                <option value="<?php echo $type['ID']; ?>"><?php echo $type['pavadinimas']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="position-relative form-group"><label for="aprasymas" class="mt-3">Aprasymas</label><input required='required' name="aprasymas" id="aprasymas" placeholder="Aprasymas" type="text" class="form-control"></div>
                        <button class="mt-1 btn btn-primary float-right" type="submit" name="createFirm">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>