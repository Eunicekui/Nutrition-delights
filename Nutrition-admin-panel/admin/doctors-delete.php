<?php

require '../config/function.php';

$paramResult = checkParamId('id');
if (is_numeric($paramResult)) {

    $doctorId = validate($paramResult);

    // Get the doctor details by ID
    $doctor = getById('doctors', $doctorId);
    if ($doctor['status'] == 200) {

        // Delete the doctor record
        $doctorDeleteRes = deleteQuery('doctors', $doctorId);

        if ($doctorDeleteRes) {
            redirect('doctors.php', 'Doctor Deleted Successfully!');
        } else {
            redirect('doctors.php', 'Something Went Wrong');
        }
    } else {
        redirect('doctors.php', $doctor['message']);
    }
} else {
    redirect('doctors.php', $paramResult);
}
