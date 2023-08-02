<?php
require 'bootstrap/init.php' ;

$userData = findUserDataByPhone($_GET['edit']) ;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submitEdit'])) {
        if (!updateUserByPhone($_POST,$_GET['edit'])) {
           redirect('http://localhost/git%20hub/2project/register.php') ;
            die() ;
        }
     }
}

require 'tpl/edite_tpl.php' ;