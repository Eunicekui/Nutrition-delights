<?php

require '../config/function.php';

$paramResult = checkParamId('id');
if (is_numeric($paramResult)) {

    $contact_messagesId = validate($paramResult);

    // Get the doctor details by ID
    $contact_messages = getById('contact_messages', $contact_messagesId);
    if ($contact_messages['status'] == 200) {

        // Delete the doctor record
        $contact_messagesDeleteRes = deleteQuery('contact_messages', $contact_messagesId);

        if ($contact_messagesDeleteRes) {
            redirect('contact_messages.php', 'Enquiry Deleted Successfully!');
        } else {
            redirect('contact_messages.php', 'Something Went Wrong');
        }
    } else {
        redirect('contact_messages.php', $contact_messages['message']);
    }
} else {
    redirect('contact_messages.php', $paramResult);
}
