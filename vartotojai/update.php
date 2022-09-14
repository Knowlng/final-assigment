<?php
if(isset($_SESSION['rights'])) {
    $user = unserialize($_SESSION['rights']);
} else {
    return;
}
if ($user->canEditUser()){
    $users=$firmDatabase->selectOneUser();
    $firmDatabase->editUsers(); 
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
    <title>Edit User</title>
</head>
<body>
<div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="main-card mb-3 card w-100">
                <div class="card-body"><h5 class="card-title">Update</h5>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                        <label>Vardas</label>
                        <input class="form-control" name="vardas" value="<?php echo $users[0]["vardas"]; ?>" placeholder="Vardas">
                        <label>Pavardė</label>
                        <input class="form-control" name="pavarde" value="<?php echo $users[0]["pavarde"]; ?>" placeholder="Pavardė">
                        <label>Slapyvardis</label>
                        <input class="form-control" name="slapyvardis" value="<?php echo $users[0]["slapyvardis"]; ?>"  placeholder="Slapyvardis">
                        <label>Teisės</label>
                        <select class="form-control" name="teises_ID">
                            <?php foreach($firmDatabase->getRights() as $right) { ?>
                                <?php if($users[0]["teises_ID"] == $right["ID"]) { ?>
                                    <option value="<?php echo $right['ID']; ?>" selected><?php echo $right['aprasymas']; ?></option>
                                <?php }  else {?>
                                    <option value="<?php echo $right['ID']; ?>"><?php echo $right['aprasymas']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <label>Slaptažodis</label>
                        <input class="form-control" name="slaptazodis" value="<?php echo $users[0]["slaptazodis"]; ?>"  placeholder="Slaptažodis">
                        <button class="btn btn-primary mt-3 float-right" type="submit" name="edit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
