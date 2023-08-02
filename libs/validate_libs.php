<?php



function validateData(array $params):bool{
    #user form data
    // $name = $params['data'][0] ;
    // $email = $params['data'][1] ;
    // $phone = $params['data'][2] ;
    // $pass = $params['data'][3] ;
    // $bio = $params['data'][4] ;
    $name = $params['name'] ;
    $email = $params['email'] ;
    $phone = $params['phone'] ;
    $pass = $params['pass'] ;
    $bio = $params['bio'] ;
    #check not empty fileds
    if (empty($name) || empty($email) || empty($pass) ||  empty($phone)) {
        setErrorAndRedirect('all inputs empty','') ;
        return false ;
    }
    #email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setErrorAndRedirect('email invalid','') ;
        return false ;
    
    }
    #name vlidation
    if (!preg_match ("/^[a-zA-z]*$/", $name)) {
        setErrorAndRedirect('name invalid','') ;
        return false ;
     
    }

    #file validation
 
    #phone validation
    

    #text box validate

   return true ;
}







