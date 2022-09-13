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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
</head>
<body>  
    <div class="container">
        <div class="main-card card">
            <div class="card-body"><h5 class="card-title">Settings</h5>
                <form method="POST" class="">
                    <?php foreach($settings as $setting) { ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="<?php echo $setting["ID"]; ?>" <?php if($setting["TrueOrFalse"]== 1){ echo "checked";} ?>>
                            <label class="form-check-label" for="registerCheckbox">
                                <?php echo $setting["aprasymas"];?>
                            </label>
                        </div>
                    <?php } ?>
                    <button class="mt-1 btn btn-primary float-right" type="submit" name="saveSettings">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
