<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite User</title>
    <link rel="stylesheet" href="assets/css/edite.css">
</head>
<body>
        <!--start error result message -->
        <div class="printErore">
        <?php 
        if (!empty($_SESSION['error'])) : ?>
            <h3 style="color: #646464; background-color: #bcbcbc; text-align: center;"><?= $_SESSION['error'] ?></h3>
        <?php unset($_SESSION['error']);
              endif; ?>
    </div>
    <!--end error result message -->
    <div class="modal_editeAll">
        <div class="modal">
            <h2 class="editetitleh2" style="color: black;">Edite Page</h2>
            <h4>Edite User : <?php print_r($_GET['edit']) ;?></h4>
            <div class="content_edit_box" style="direction: ltr;">
                <form action="edite.php?edit=<?php print_r($_GET['edit']) ;?>" method="post">
                    <label for="">name</label><input type="text" name="nameUpdate" value="<?= $userData->name ;?>">
                    <input type="email" name="emailUpdate" value="<?= $userData->email ;?>">
                    <input type="text" name="passUpdate" value="<?= $userData->password ;?>">
                    <input type="text" name="bioUpdate" value="<?= $userData->bio ;?>">
                    <input type="text" name="roleUpdate" value="<?= $userData->user_id ;?>" maxlength="1">
                    <input type="submit" name="submitEdit" class="submitUpdate submitHoverUpdate"  onclick="return confirm('Are You Sure to Update this All Item?\n ');">
                </form>
            </div>
        </div> 
    </div>
</body>
</html>