<?php
require '../config/function.php';

if (isset($_POST["saveUser"])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;


    if ($name != '' || $phone != '' || $email != '' || $password != '') {
        $query = "INSERT INTO users (name, phone, email, password, is_ban, role)
                    VALUES('$name','$phone', '$email', '$password', '$is_ban','$role')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('users.php', 'User/Admin Added Successfully!');
        } else {
            redirect('users-create.php', 'Something Went Wrong');
        }
    } else {
        redirect('users-create.php', 'Please fill all the input fields');
    }
}
if (isset($_POST['updateUser'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;

    $userId = validate($_POST['userId']);

    $user = getById('users', $userId);
    if ($user['status'] != 200) {
        redirect('users-edit.php?id=' . $userId, 'No such Id found');
    }


    if ($name != '' || $phone != '' || $email != '' || $password != '') {
        $query = " UPDATE users SET
        name= '$name', 
        phone= '$phone', 
        email= '$email', 
        password= '$password', 
        is_ban= '$is_ban', 
        role= '$role'
        WHERE id='$userId' ";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('users.php', 'User/Admin Updated Successfully!');
        } else {
            redirect('users-create.php', 'Something Went Wrong');
        }
    } else {
        redirect('users-create.php', 'Please fill all the input fields');
    }
}
if (isset($_POST["saveDoctor"])) {

    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $specialization = validate($_POST['specialization']);
    $availability = validate($_POST['availability']);

    if ($name != '' && $phone != '' && $email != '' && $specialization != '' && $availability != '') {

        $query = "INSERT INTO doctors (name, phone, email, specialization, availability)
                    VALUES ('$name', '$phone', '$email','$specialization', '$availability')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('doctors.php', 'Doctor Added Successfully!');
        } else {
            redirect('doctors-create.php', 'Something Went Wrong');
        }
    } else {
        redirect('doctors-create.php', 'Please fill all the input fields');
    }
}
if (isset($_POST['updateDoctor'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $specialization = validate($_POST['specialization']);
    $availability = validate($_POST['availability']);

    $doctorId = validate($_POST['doctorId']);

    $doctor = getById('doctors', $doctorId);
    if ($doctor['status'] != 200) {
        redirect('doctors-edit.php?id=' . $doctorId, 'No such Id found');
    }

    // Ensure that all fields are provided
    if ($name != '' && $phone != '' && $email != '' && $specialization != '' && $availability != '') {

        // Corrected query without the semicolon before WHERE
        $query = "UPDATE doctors SET
                    name = '$name',
                    phone = '$phone',
                    email = '$email',
                    specialization = '$specialization',
                    availability = '$availability'
                  WHERE id = '$doctorId'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('doctors.php', 'Doctor Updated Successfully!');
        } else {
            redirect('doctors-edit.php', 'Something Went Wrong');
        }
    } else {
        redirect('doctors-edit.php', 'Please fill all the input fields');
    }
}
if (isset($_POST['saveTherapist'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $specialization = validate($_POST['specialization']);
    $availability = validate($_POST['availability']);

    if ($name != '' || $phone != '' || $email != '' || $specialization != '' || $availability != '') {
        $query = "INSERT INTO therapists (name, phone, email, specialization, availability)
                  VALUES ('$name', '$phone', '$email', '$specialization', '$availability')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('therapist.php', 'Therapist Added Successfully!');
        } else {
            redirect('therapist-create.php', 'Something Went Wrong');
        }
    } else {
        redirect('therapist-create.php', 'Please fill all the input fields');
    }
}

if (isset($_POST['updateTherapist'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $specialization = validate($_POST['specialization']);
    $availability = validate($_POST['availability']);

    $therapistId = validate($_POST['therapistId']);

    $therapist = getById('therapists', $therapistId);
    if ($therapist['status'] != 200) {
        redirect('therapist-edit.php?id=' . $therapistId, 'No such Id found');
    }

    if ($name != '' || $phone != '' || $email != '' || $specialization != '' || $availability != '') {
        $query = "UPDATE therapists SET
                    name = '$name',
                    phone = '$phone',
                    email = '$email',
                    specialization = '$specialization',
                    availability = '$availability'
                  WHERE id = '$therapistId'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('therapist.php', 'Therapist Updated Successfully!');
        } else {
            redirect('therapist-edit.php', 'Something Went Wrong');
        }
    } else {
        redirect('therapist-edit.php', 'Please fill all the input fields');
    }
}

if (isset($_POST['saveSetting'])) {
    $title = validate($_POST['title']);
    $slug = validate($_POST['slug']);
    $small_description = validate($_POST['small_description']);

    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);

    $email1 = validate($_POST['email1']);
    $email2 = validate($_POST['email2']);
    $phone1 = validate($_POST['phone1']);
    $phone2 = validate($_POST['phone2']);
    $address = validate($_POST['address']);

    $settingId = validate($_POST['settingId']);

    if ($settingId == 'insert') {
        $query = "INSERT INTO settings(title,slug,small_description,meta_description,meta_keyword,email1,email2,phone1,phone2,address)
                  VALUES('$title','$slug','$small_description','$meta_description','$meta_keyword','$email1','$email2','$phone1','$phone2','$address')";
        $result = mysqli_query($conn, $query);
    }

    if (is_numeric($settingId)) {
        $query = "UPDATE settings SET
                    title='$title',
                    slug='$slug',
                    small_description='$small_description',
                    meta_description='$meta_description',
                    meta_keyword='$meta_keyword',
                    email1='$email1',
                    email2='$email2',
                    phone1='$phone1',
                    phone2='$phone2',
                    address= '$address'
                    WHERE id= '$settingId'
                 ";

        $result = mysqli_query($conn, $query);
    }

    if ($result) {
        redirect('settings.php', 'Settings Saved');
    } else {
        redirect('settings.php', 'Something Went Wrong');
    }
}
if(isset($_POST['updateEnquiryStatus']))
{
    $enquiryid = validate($_POST['enquiryid']);
    $status = validate($_POST['status']);

    $query = "UPDATE contact_messages SET status='$status' WHERE id = '$enquiryid' ";
    $result =mysqli_query($conn, $query);

    if($result) 
    {
        redirect('contact_messages.php?id='.$enquiryid,'Enquiry Status Updated.');
    } else 
    {
        redirect('read-message.php?id=' . $enquiryid, 'Something Went Wrong.');

    }
}
if (isset($_POST['bookDoctor'])) {
    $doctor_id = validate($_POST['doctor_id']);
    $user_id = validate($_POST['user_id']);
    $phone = validate($_POST['phone']);
    $appointment_date = validate($_POST['appointment_date']);
    $appointment_time = validate($_POST['appointment_time']);

    if ($doctor_id != '' && $user_id != '' && $phone != '' && $appointment_date != '' && $appointment_time != '') {
        $query = "INSERT INTO booking_doctor (doctor_id, user_id, phone, appointment_date, appointment_time)
                  VALUES ('$doctor_id', '$user_id', '$phone', '$appointment_date', '$appointment_time')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('../../index.html', 'Doctor appointment booked successfully!');
        } else {
            redirect('../../book_doctor.php', 'Something went wrong!');
        }
    } else {
        redirect('../../book_doctor.php', 'Please fill all the fields!');
    }
}
if (isset($_POST['bookTherapist'])) {
    $therapist_id = validate($_POST['therapist_id']);
    $user_id = validate($_POST['user_id']);
    $phone = validate($_POST['phone']);
    $appointment_date = validate($_POST['appointment_date']);
    $appointment_time = validate($_POST['appointment_time']);

    if ($therapist_id != '' && $user_id != '' && $phone != '' && $appointment_date != '' && $appointment_time != '') {
        $query = "INSERT INTO booking_therapist (therapist_id, user_id, phone, appointment_date, appointment_time)
                  VALUES ('$therapist_id', '$user_id', '$phone', '$appointment_date', '$appointment_time')";

        $result = mysqli_query($conn, $query);

        if ($result) 
        {
            redirect('../../index.html', 'Therapist appointment booked successfully!');
        } else {
            redirect('booking-therapist.php', 'Something went wrong!');
        }
    } else {
        redirect('booking-therapist.php', 'Please fill all the fields!');
    }
}

if (isset($_POST['signIn'])) {
    // Get form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    // Check if the email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Email exists, set a session message and redirect to the sign-up page
        $_SESSION['email_exists'] = "An account with this email already exists.";
        header("Location: ../../index.html");  // Adjust the path if needed
        exit();
    } else {
        // Hash the password before storing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO users (name, phone, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $phone, $email, $hashed_password);

        if ($stmt->execute()) {
            redirect('../../index.html', 'Registration was successful!');
        } else {
            redirect('../../index.html', 'Something went wrong!');
        }
    }
    $stmt->close();
    $conn->close();
}
if (isset($_POST['sendMessage'])) 
{
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $message = validate($_POST['message']);

    if ($name != '' && $email != '' && $message != '' ) {
        $query = "INSERT INTO contact_messages (name, email, message )
                  VALUES ('$name', '$email', '$message')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('../../index.html', 'Message Sent successfully!');
        } else {
            redirect('../../contact.html', 'Something went wrong!');
        }
    } else {
        redirect('../../contact.html', 'Please fill all the fields!');
    }
}
if (isset($_POST['doctorBookings'])) {
    $user_id = validate($_POST['user_id']);
    $doctor_id = validate($_POST['doctor_id']);
    $appointment_date = validate($_POST['appointment_date']);
    $appointment_time = validate($_POST['appointment_time']);

    $appointmentId = validate($_POST['appointmentId']);

    $appointment = getById('booking_doctor', $appointmentId);
    if ($appointment['status'] != 200) {
        redirect('doctors-approve-booking.php?id=' . $appointmentId, 'No such Id found');
    }

    // Ensure that all fields are provided
    if ($user_id != '' && $doctor_id != '' && $appointment_date != '' && $appointment_time != '') {
        $query = "UPDATE booking_doctor SET
                    user_id = '$user_id',
                    doctor_id = '$doctor_id',
                    appointment_date = '$appointment_date',
                    appointment_time = '$appointment_time'
                    WHERE id ='$appointmentId' ";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('booking_doctor.php', 'Doctor Appointment Updated Successfully!');
        } else {
            redirect('doctors-approve-booking.php', 'Something Went Wrong');
        }
    } else {
        redirect('doctors-approve-booking.php', 'Please fill all the input fields');
    }
}
if (isset($_POST['therapistBookings'])) {
    $user_id = validate($_POST['user_id']);
    $therapist_id = validate($_POST['therapist_id']);
    $appointment_date = validate($_POST['appointment_date']);
    $appointment_time = validate($_POST['appointment_time']);

    $appointmentId = validate($_POST['appointmentId']);

    $appointment = getById('booking_therapist', $appointmentId);
    if ($appointment['status'] != 200) {
        redirect('therapists-approve-booking.php?id=' . $appointmentId, 'No such Id found');
    }

    // Ensure that all fields are provided
    if ($user_id != '' && $therapist_id != '' && $appointment_date != '' && $appointment_time != '') {
        $query = "UPDATE therapists SET
                    user_id = '$user_id',
                    therapist_id = '$therapist_id',
                    appointment_date = '$appointment_date',
                    appointment_time = '$appointment_time',
                  WHERE id = '$appointmentId'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('booking_therapist.php', 'therapist Updated Successfully!');
        } else {
            redirect('therapist-approve-booking.php', 'Something Went Wrong');
        }
    } else {
        redirect('therapist-approve-booking.php', 'Please fill all the input fields');
    }
}
if (isset($_POST['updateDoctorBook'])) {
    $appointmentid = validate($_POST['appointmentid']);
    $status = validate($_POST['status']);

    $query = "UPDATE booking_doctor SET status='$status' WHERE id = '$appointmentid' ";
    $result = mysqli_query($conn, $query);

    if ($result) {
        redirect('booking_doctor.php?id=' . $appointmentid, 'Enquiry Status Updated.');
    } else {
        redirect('doctor_approve.php?id=' . $appointmentid, 'Something Went Wrong.');
    }
}
if (isset($_POST['updateTherapistBook'])) {
    $appointmentid = validate($_POST['appointmentid']);
    $status = validate($_POST['status']);

    $query = "UPDATE booking_therapist SET status='$status' WHERE id = '$appointmentid' ";
    $result = mysqli_query($conn, $query);

    if ($result) {
        redirect('booking_therapist.php?id=' . $appointmentid, 'Enquiry Status Updated.');
    } else {
        redirect('therapist_approve.php?id=' . $appointmentid, 'Something Went Wrong.');
    }
}