<?php

require '../config/function.php';

if(isset($_SESSION['auth']))
{
    logoutSession();
    redirect('../../log-in.php', 'Logged Out Successfully');
}
?>