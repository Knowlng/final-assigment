<?php
if(isset($_SESSION['rights'])) {
    $user = unserialize($_SESSION['rights']);
} else {
    return;
}
if ($user->canToggleRegister()){
    $settings=$firmDatabase->getSettings();
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
    <title>Admin Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="./main.css" rel="stylesheet">
</head>
<body>  
    <div class="container">
        <div class="main-card card">
            <div class="card-body"><h5 class="card-title">Settings</h5>
                <form method="POST" class="">
                    <?php foreach($settings as $setting) { ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?php echo $setting["TrueOrFalse"];?>" id="registerCheckbox" name="registerCheckbox" <?php if($setting["TrueOrFalse"]== 1){ echo "checked";} ?>>
                            <label class="form-check-label" for="registerCheckbox">
                                <?php echo $setting["aprasymas"];?>
                            </label>
                        </div>
                    <?php } 
                    // $firmDatabase->saveSettings(); for testing
                    ?>
                    <button class="mt-1 btn btn-primary float-right" type="submit" name="saveSettings">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
