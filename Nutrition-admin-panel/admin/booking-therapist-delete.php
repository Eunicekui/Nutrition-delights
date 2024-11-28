<?php

require '../config/function.php';  // Assuming the functions are in a separate file like 'function.php'

// Check if the 'id' parameter exists and is numeric
$paramResult = checkParamId('id');
if (is_numeric($paramResult)) {

    $bookingId = validate($paramResult);

    // Get the booking by its ID
    $booking = getById('booking_therapist', $bookingId);
    if ($booking['status'] == 200) {

        // Perform the delete operation on the bookings table
        $bookingDeleteRes = deleteQuery('booking_therapist', $bookingId);

        // Check if the deletion was successful
        if ($bookingDeleteRes) {
            redirect('booking_therapist.php', 'Booking Deleted Successfully!');
        } else {
            redirect('booking_therapist.php', 'Something Went Wrong');
        }
    } else {
        redirect('booking_therapist.php', $booking['message']);
    }
} else {
    redirect('booking_therapist.php', $paramResult);
}
