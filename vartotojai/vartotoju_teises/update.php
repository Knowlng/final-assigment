<?php 
    if(isset($_SESSION['rights'])) {
        $user = unserialize($_SESSION['rights']);
    } else {
        return;
    }
    if ($user->canEditUserRights()){
        $rights=$firmDatabase->selectOneRight();
        $firmDatabase->editUsersRights(); 
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
    <title>Edit User Rights</title>
</head>
<body>
<div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="main-card mb-3 card w-100">
                <div class="card-body"><h5 class="card-title">Edit User Rights</h5>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                        <label>Pavadinimas</label>
                        <input class="form-control" name="pavadinimas" value="<?php echo $rights[0]["pavadinimas"]; ?>" placeholder="Pavadinimas">
                        <label>Aprašymas</label>
                        <input class="form-control" name="aprasymas" value="<?php echo $rights[0]["aprasymas"]; ?>" placeholder="Aprašymas">
                        <button class="btn btn-primary mt-3 float-right" type="submit" name="editRight" onclick="return confirm('Are you sure?')">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
