<?php 
    if(isset($_SESSION['rights'])) {
        $user = unserialize($_SESSION['rights']);
    } else {
        return;
    }
    if ($user->canEditFirmTypes()){
        $fType=$firmDatabase->selectOneFirmType();
        $firmDatabase->editFirmTypes();
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
    <title>Edit Firm Type</title>
</head>
<body>
<div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="main-card mb-3 card w-100">
                <div class="card-body"><h5 class="card-title">Edit Firm Type</h5>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                        <label>Pavadinimas</label>
                        <input class="form-control" name="pavadinimas" value="<?php echo $fType[0]["pavadinimas"]; ?>" placeholder="Pavadinimas">
                        <label>Aprasymas</label>
                        <input class="form-control" name="aprasymas" value="<?php echo $fType[0]["aprasymas"]; ?>" placeholder="Aprasymas">
                        <button class="btn btn-primary mt-3 float-right" type="submit" name="editFirmType">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>