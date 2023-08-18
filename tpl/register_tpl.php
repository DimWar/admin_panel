<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
 
</head>
<body direction="ltr">
    <!--start error result message -->
    <div class="printErore">
        <?php 
        if (!empty($_SESSION['error'])) : ?>
            <h3 style="color: #646464; background-color: #bcbcbc; text-align: center;"><?= $_SESSION['error'] ?></h3>
        <?php unset($_SESSION['error']);
              endif; ?>
    </div>
    <!--end error result message -->
    <!--start section ajax result -->
    <div class="ajaxResult"></div>
    <!--end section ajax result -->
    <!--start section from  -->
    <section class="contener">
        <form action="register.php" method="post" class="login" id="form" enctype="multipart/form-data">
            <h1 class="h-1">Register</h1>
            <input type="text" class="name" name="name" placeholder="نام کاربری..." autofocus>
            <input type="email" class="email" name="email" placeholder="ایمیل...">
            <input type="tel" class="phone" name="phone"  placeholder="شماره تلفن همراه..." maxlength="11">
            <input type="password" class="password" name="pass" placeholder="رمز عبور..." minlength="6">
            <input type="text" class="bio" name="bio" placeholder="در باره من...">
            <input type="file" name="upload_image" class="custom-image-upload">
            <input type="submit" class="submit submitHover" name="sub" value="ثبت نام">
        </form>
    </section>
    <!--end section from  -->
    <!--start section table -->
    <section class="table_users">
        <!-- Tools Box -->
        <div class="tool_box">
            <h3>Tools</h3>
            <!-- Delete All Users -->
            <a href="?delete_user=all"><span class="material-symbols-outlined deleteAll"  onclick="return confirm('Are You Sure to delete this all users ?\n ');">delete_forever</span></a>
            <!-- Edite All Users -->
            <a ><span class="material-symbols-outlined iconEditeAll openEditeAll">edit</span></a>
        </div>
        <table>
            <tr>
                <th>number</th>
                <th>Image</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Bio</th>
                <th>role</th>
                <th>option</th>
            </tr>
            <?php if (!empty($userData)):?>
                <?php foreach($userData as $key => $values): ?>
                    <tr>
                        <td class="alinCenter"><?= $key+1; ?></td>
                        <td><a><img class="imageProfile" src="assets/img/<?= !empty($values['image']) ? $values['image'] : 'a_default.avif' ?>" ></a></td>
                        <td><?= $values['name'];?></td> 
                        <td class="phone"><?= $values['phone'];?></td> 
                        <td><?= $values['email'];?></td> 
                        <td>...<?= substr($values['bio'],0,15)?></td> 
                        <td>
                            <?php for ($i=0; $i < $countRole; $i++): ?>
                                <?php if($values['user_id'] == $i) : ?>
                                    <p selected value="<?= $a; ?>"><?= $roleData[$i][0]; ?><?php $a = $values['phone'];?></p>
                                <?php endif ?>
                            <?php endfor; ?>
                        </td> 
                        <td>
                            <!-- Delete User -->
                            <a href="?delete_user=<?= $values['phone'];?>" class="material-symbols-outlined icon iconDelete"  onclick="return confirm('Are You Sure to delete this Item <?= $values['name']?>?\n ');">delete</a>
                            <!-- Edite User -->
                            <a href="?edite_user=<?= $values['phone']; ?>"><span class="material-symbols-outlined iconEdite open" >edit</span></a>
                            <!-- Ediet Modal Box -->
                            
                        </td> 
                    </tr>
                    
                <?php endforeach; ?>
            <?php else: ?>
                <?= "<h2 class=emptyDb>Database is empty !!</h2>" ?>
            <?php endif ; ?>
        </table>
    </section>
    <!--end section table -->



    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

</body>
</html> 