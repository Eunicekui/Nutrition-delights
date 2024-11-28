<?php

require '../config/function.php';

$paramResult = checkParamId('id');
if (is_numeric($paramResult)) {

    $therapistId = validate($paramResult);

    $therapist = getById('therapists', $therapistId);
    if ($therapist['status'] == 200) {

        $therapistDeleteRes = deleteQuery('therapists', $therapistId);

        if ($therapistDeleteRes) {
            redirect('therapist.php', 'Therapist Deleted Successfully!');
        } else {
            redirect('therapist.php', 'Something Went Wrong');
        }
    } else {
        redirect('therapist.php', $therapist['message']);
    }
} else {
    redirect('therapist.php', $paramResult);
}
