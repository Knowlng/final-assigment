<?php
    $register=$firmDatabase->selectOneAction("settings", "1");
    if($register[0]["TrueOrFalse"]==0){
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
    <title>Final Assigment Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="./main.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php $firmDatabase->createUser("1");?>
        <div class="d-flex justify-content-center align-items-center">
            <div class="main-card mb-3 card w-100">
                <div class="card-body"><h5 class="card-title">Register</h5>
                    <form method="POST" class="">
                        <div class="position-relative form-group"><label for="name11" class="">Name</label><input required='required' name="name" id="name11" placeholder="name" type="text" class="form-control"></div>
                        <div class="position-relative form-group"><label for="surname11" class="">Surname</label><input required='required' name="surname" id="surname11" placeholder="surname" type="text" class="form-control"></div>
                        <div class="position-relative form-group"><label for="username11" class="">Username</label><input required='required' name="username" id="username11" placeholder="username" type="text" class="form-control"></div>
                        <div class="position-relative form-group"><label for="password11" class="">Password</label><input required='required' name="password" id="password11" placeholder="password" type="password" class="form-control"></div>
                        <a href="index.php?page=login">Login instead</a>
                        <button class="mt-1 btn btn-primary float-right" type="submit" name="register">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
