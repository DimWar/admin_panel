<?php

require 'bootstrap/init.php' ;

#start verify form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $params = $_POST ;
    $phone = $_POST['phone'];
    $imageName = $_FILES['upload_image']['name'] ;
    

    #all inputs verify
    if (validateData($params)) {
        if(isUserExists($phone)){
            setErrorAndRedirect('Phone exist please try again .','') ;
            die();
        }
        if ($_FILES['upload_image']['name'] == '' && $_FILES['upload_image']['size'] == 0) {
            createUser($params);
            setErrorAndRedirect('.Created User','') ;
            die() ;
        }else{
            $imageName = $_FILES['upload_image']['name'] ;
            $imageType = $_FILES['upload_image']['type'] ;
            $imageError = $_FILES['upload_image']['error'] ;
            $imageSize = $_FILES['upload_image']['size'] ;
            $imageTmpName = $_FILES['upload_image']['tmp_name'] ;

            #uniq name for save and not overide
            $imageNamePartition = explode('.' , $imageName) ; #array test / .txt
            $imageNameformat = strtolower(end($imageNamePartition)) ; #TXT => txt
            $newImageName = md5(time().$imageName) . '.' . $imageNameformat ; #hash name file.txt

            #check file formt allowed
            $allwoedFileFormat = ['jpg' , 'png' , 'jpeg'] ;
            if (in_array($imageNameformat,$allwoedFileFormat)) {
                $upload_file_directory = BASE_PATH . 'assets/img/' ;
                $endPath = $upload_file_directory . $newImageName ;
                if (move_uploaded_file($imageTmpName,$endPath)) {
                }else{
                    setErrorAndRedirect('erore uploaded image please again','') ;
                    die();
                }
            }else{
                setErrorAndRedirect('please choose other file format(jpg,png,jpeg)','') ;
                die() ;
            }
            createUser($params,$newImageName);
            setErrorAndRedirect('.Created User','') ;
            die();
        }

    }
 }
#end verify form

#start delete user 
$actionDelete = $_GET['delete_user'] ?? null;
$actionEdite = $_GET['edite_user'] ?? null;
if (isset($actionDelete) && $actionDelete!='all') {
    deleteUserByPhone($actionDelete) ;
    setErrorAndRedirect('.User deleted ','') ;
    die() ;

}
if ($actionDelete == 'all') {
    deleteAllUsers() ;
    setErrorAndRedirect('.all users deleted ','') ;
    die();
}
#end edite user by action 
if (isset($actionEdite) == 'all') {
    redirect("edite.php?edit=$actionEdite ") ;  
}
#start result query left join all users
$userData = findUsersDataAndLeftJoinUserInRole();
$countUserData = count($userData) ;
#end result query left join all users

#start query role table
$roleData = findDataRole() ;
$countRole = count($roleData) ;
#end query role table

 


require 'tpl/register_tpl.php' ;