<?php
#add user in the data base `users`
function createUser(array $userData ,string $imageName = ''):bool{
    global $pdo ;
    $name = $userData['name'] ;
    $email = $userData['email'] ;
    $phone = $userData['phone'] ;
    $pass = $userData['pass'] ;
    $bio = $userData['bio'];
    $sql = "INSERT INTO users (name,email,phone,password,bio,image) VALUES(:name,:email,:phone,:password,:bio,:image_name)";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute([':name'=>$name,':email'=>$email,':phone'=>$phone,':password'=>$pass,':bio' => $bio,':image_name'=>$imageName]) ;
    return $stmt -> rowCount() ? true : false ;
}
#user exist by phone
function isUserExists(string $phone):bool{
    global $pdo ;
    $sql = "SELECT * FROM users WHERE  phone = :phone" ;
    $stmt = $pdo->prepare($sql) ;
    $stmt -> execute([':phone' => $phone]) ;
    return $stmt->rowCount() ? true : false ;
}

#find user by email
function findUserDataByPhone(string $phone):object|bool{
    global $pdo ;
    $sql = 'SELECT * FROM users WHERE phone = :phone' ;
    $stmt = $pdo->prepare($sql) ;
    $stmt->execute(['phone' => $phone]) ;
    return $stmt->fetch(PDO::FETCH_OBJ) ;
}

#table query
function findUsersDataAndLeftJoinUserInRole(){
    global $pdo ;
    $sql = "SELECT * FROM `users` LEFT JOIN rols ON users.user_id = rols.id WHERE users.user_id!=2" ;
    $stmt = $pdo->prepare($sql);
    $stmt->execute() ;
    return $stmt->fetchAll() ;
}

#data base role
function findDataRole(){
    global $pdo ;
    $sql = 'SELECT title FROM rols' ;
    $stmt = $pdo->prepare($sql) ;
    $stmt->execute() ;
    return $stmt->fetchAll() ;
}

function deleteUserByPhone(string $phone){
    global $pdo ;
    $sql = 'DELETE FROM users WHERE phone=:phone' ;
    $stmt = $pdo->prepare($sql) ;
    $stmt->execute([':phone' => $phone]);
    $stmt->rowCount()? true : false ;
}


function deleteAllUsers(){
    global $pdo ;
    $sql = 'DELETE FROM users' ;
    $stmt = $pdo->prepare($sql) ;
    $stmt->execute();
    $stmt->rowCount()? true : false ;
}


function updateUserByPhone( $data, $phone){
    global $pdo ;
    var_dump($data) ;
    $sql = "UPDATE users SET name=:name,email=:email,password=:password,bio=:bio,user_id=:user_id WHERE phone=:phone;" ;
    $stmt = $pdo->prepare($sql) ;
    $stmt -> execute([':name'=>$data['nameUpdate'],':email'=>$data['emailUpdate'],':password'=>$data['passUpdate'],':bio'=>$data['bioUpdate'],':user_id'=>$data['roleUpdate'],':phone'=>$phone]) ;
    $stmt -> rowCount() ? true : false ;
}