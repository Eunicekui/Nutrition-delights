<?php

require '../config/function.php';

$paramResult = checkParamId('id');
if(is_numeric($paramResult)) {

    $userId = validate($paramResult);

    $user = getById('users', $userId);
    if($user['status'] == 200 ) {

        $userDeleteRes = deleteQuery('users', $userId);

        if($userDeleteRes) {
            redirect('users.php','User Deleted Successfully!');
        }
        else {
            redirect('users.php', 'Something Went Wrong');
        }
    }
    else
    {
        redirect('users.php', $users['message']);
    }
} else {
    redirect('users.php',$paramResult);
}


?>

