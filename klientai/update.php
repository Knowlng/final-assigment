<?php
if(isset($_SESSION['rights'])) {
    $user = unserialize($_SESSION['rights']);
} else {
    return;
}
if ($user->canEditClients()){
    $client=$firmDatabase->selectOneClient();
    $firmDatabase->editClient();
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
    <title>Edit Client</title>
</head>
<body>
<div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="main-card mb-3 card w-100">
                <div class="card-body"><h5 class="card-title">Edit Client</h5>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                        <label>Vardas</label>
                        <input class="form-control" name="vardas" value="<?php echo $client[0]["vardas"]; ?>" placeholder="Vardas">
                        <label>Pavardė</label>
                        <input class="form-control" name="pavarde" value="<?php echo $client[0]["pavarde"]; ?>" placeholder="Pavardė">
                        <label>Teisės</label>
                        <select class="form-control" name="teises_ID">
                            <?php foreach($firmDatabase->getClientRights() as $right) { ?>
                                <?php if($client[0]["teises_ID"] == $right["ID"]) { ?>
                                    <option value="<?php echo $right['ID']; ?>" selected><?php echo $right['pavadinimas']; ?></option>
                                <?php }  else {?>
                                    <option value="<?php echo $right['ID']; ?>"><?php echo $right['pavadinimas']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <label>Aprasymas</label>
                        <input class="form-control" name="aprasymas" value="<?php echo $client[0]["aprasymas"]; ?>"  placeholder="Aprasymas">
                        <label>Imones</label>
                        <select class="form-control" name="imones_id">
                            <?php foreach($firmDatabase->getFirms() as $firm) { ?>
                                <?php if($client[0]["teises_ID"] == $firm["ID"]) { ?>
                                    <option value="<?php echo $firm['ID']; ?>" selected><?php echo $firm['pavadinimas']; ?></option>
                                <?php }  else {?>
                                    <option value="<?php echo $firm['ID']; ?>"><?php echo $firm['pavadinimas']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <button class="btn btn-primary mt-3 float-right" type="submit" name="editClient">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>