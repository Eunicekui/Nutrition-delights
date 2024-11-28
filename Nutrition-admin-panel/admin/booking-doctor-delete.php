<?php

require '../config/function.php';  // Assuming the functions are in a separate file like 'function.php'

// Check if the 'id' parameter exists and is numeric
$paramResult = checkParamId('id');
if (is_numeric($paramResult)) {

    $bookingId = validate($paramResult);

    // Get the booking by its ID
    $booking = getById('booking_doctor', $bookingId);
    if ($booking['status'] == 200) {

        // Perform the delete operation on the bookings table
        $bookingDeleteRes = deleteQuery('booking_doctor', $bookingId);

        // Check if the deletion was successful
        if ($bookingDeleteRes) {
            redirect('booking_doctor.php', 'Booking Deleted Successfully!');
        } else {
            redirect('booking_doctor.php', 'Something Went Wrong');
        }
    } else {
        redirect('booking_doctor.php', $booking['message']);
    }
} else {
    redirect('booking_doctor.php', $paramResult);
}
