<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Final Assigment Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="./main.css" rel="stylesheet">
</head>
<body>  
    <div class="container">
        <?php $firmDatabase->displayLoginError();?>
        <div class="main-card card">
            <div class="card-body"><h5 class="card-title">Login</h5>
                <form method="POST" class="">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="username11" class="">Username</label><input required='required' name="username" id="username11" placeholder="username" type="text" class="form-control"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label for="password11" class="">Password</label><input required='required' name="password" id="password11" placeholder="password" type="password" class="form-control"></div>
                        </div>
                    </div>
                    <button class="mt-2 btn btn-primary float-right" type="submit" name="login">Sign in</button>
                    <a href="index.php?page=register">Register instead</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
