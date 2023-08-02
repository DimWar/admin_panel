<?php

require 'bootstrap/init.php' ;

//  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $params = $_POST ;
//     $phone = $params['data'][2] ;

//     if (validateData($params)) {
//         if(isUserExists($phone)){
//             echo "phone exist try again" ;
//             die();
//         }
//         if(createUser($params)){
//             echo ".user created " ;
//             die() ;
//         }
//     }
//  }

//  if (isset($_GET)) {
//     var_dump($_POST) ;
//     die();
//     if (deleteUserByPhone($phone)) {
//         echo '. user deleted' ;
//     }else{
//         echo 'erore please again !' ;
//     }
//  }

//---------------------------------------------------------------------------------------ajax 

 //     //start ajax register user to database
        //     var ajaxResult = $('.ajaxResult');
        //     var form = $('#form');
        //     var name = $('.name');
        //     var phone = $('.phone');
        //     var email = $('.email');
        //     var pass = $('.password');
        //     var bio = $('.bio');
        //     // var delete = $('.iconDelete') ;
        //     form.submit(function (event) {
        //         event.preventDefault();
        //         $.ajax({
        //             url: form.attr('action'),
        //             method: form.attr('method'),
        //             data: { data: [name.val(), email.val(), phone.val(), pass.val(), bio.val()] },
        //             success: function (response) {
        //                 ajaxResult.html(response);
        //             },
        //             error: function (response) {
        //                 ajaxResult.html(response);
        //             }
        //         });
        //     });
        //     //end ajax register user to database

