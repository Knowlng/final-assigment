<?php
if(isset($_SESSION['rights'])) {
    $user = unserialize($_SESSION['rights']);
} else {
    return;
}
if ($user->canCreateUser()){
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
    <title>Create</title>
</head>
<body>
    <div class="container">
        <?php $firmDatabase->createUser("0");?>
        <div class="d-flex justify-content-center align-items-center">
            <div class="main-card mb-3 card w-100">
                <div class="card-body"><h5 class="card-title">Create User</h5>
                    <form method="POST" class="">
                        <div class="position-relative form-group"><label for="name11" class="">Name</label><input required='required' name="name" id="name11" placeholder="name" type="text" class="form-control"></div>
                        <div class="position-relative form-group"><label for="surname11" class="">Surname</label><input required='required' name="surname" id="surname11" placeholder="surname" type="text" class="form-control"></div>
                        <div class="position-relative form-group"><label for="username11" class="">Username</label><input required='required' name="username" id="username11" placeholder="username" type="text" class="form-control"></div>
                        <label>Teisės</label>
                        <select class="form-control" name="teises_ID">
                            <?php foreach($firmDatabase->getRights() as $right) { ?>
                                <option value="<?php echo $right['ID']; ?>"><?php echo $right['aprasymas']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="position-relative form-group"><label for="password11" class="">Password</label><input required='required' name="password" id="password11" placeholder="password" type="password" class="form-control"></div>
                        <button class="mt-1 btn btn-primary float-right" type="submit" name="register">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>