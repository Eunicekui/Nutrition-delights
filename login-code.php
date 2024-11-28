<?php 

require 'nutrition-admin-panel/config/function.php';

if(isset($_POST['loginBtn'])) 
{
    $emailInput = validate($_POST['email']);
    $passwordInput = validate($_POST['password']);

    $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
    $password = filter_var($passwordInput, FILTER_SANITIZE_STRING);

    if($email != '' && $password != '')
    {
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            if(mysqli_num_rows($result) ==1)
            {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if($row['role'] == 'admin' && 'therapist' && 'doctor')
                 {

                    if($row['is_ban'] ==1 )
                    {
                        redirect('log-in.php', 'Your Account Has Been Banned.');
                    }

                    $_SESSION['auth'] = true;
                    $_SESSION['loggedInUserRole'] = $row['role'];
                    $_SESSION['loggedInUser'] = [
                        'name' => $row['name'],
                        'email' => $row['email'],
                    ];


                    redirect('nutrition-admin-panel/admin/index.php', 'Logged In Successfully');

                 }
                 else
                 {

                    if ($row['is_ban'] == 1) {
                        redirect('log-in.php', 'Your Account Has Been Banned.');
                    }

                    $_SESSION['auth'] = true;
                    $_SESSION['loggedInUserRole'] = $row['role'];
                    $_SESSION['loggedInUser'] = [
                        'name' => $row['name'],
                        'email' => $row['email'],
                    ];

                    redirect('index.html', 'Logged In Successfully');
                 }
            }
        else 
        {
                redirect('log-in.php', 'Invalid Email or Password');
            
        }

        }
        else 
        {
            redirect('log-in.php','Something Went Wrong');

        }
    }
    else{
        redirect('log-in.php', 'All Fields are Mandatory');
    }
}


?>