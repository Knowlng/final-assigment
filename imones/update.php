<?php 
    if(isset($_SESSION['rights'])) {
        $user = unserialize($_SESSION['rights']);
    } else {
        return;
    }
    if ($user->canEditFirms()){
        $firm=$firmDatabase->selectOneFirm();
        $firmDatabase->editFirm();
    } else {
        return;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Firm</title>
</head>
<body>
<div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="main-card mb-3 card w-100">
                <div class="card-body"><h5 class="card-title">Edit Firm</h5>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                        <label>Pavadinimas</label>
                        <input class="form-control" name="pavadinimas" value="<?php echo $firm[0]["pavadinimas"]; ?>" placeholder="Pavadinimas">
                        <label>Tipas</label>
                        <select class="form-control" name="tipas_ID">
                            <?php foreach($firmDatabase->getFirmTypes() as $type) { ?>
                                <?php if($firm[0]["tipas_ID"] == $type["ID"]) { ?>
                                    <option value="<?php echo $type['ID']; ?>" selected><?php echo $type['pavadinimas']; ?></option>
                                <?php }  else {?>
                                    <option value="<?php echo $type['ID']; ?>"><?php echo $type['pavadinimas']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <label>Aprasymas</label>
                        <input class="form-control" name="aprasymas" value="<?php echo $firm[0]["aprasymas"]; ?>" placeholder="Aprasymas">
                        <button class="btn btn-primary mt-3 float-right" type="submit" name="editFirm">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
