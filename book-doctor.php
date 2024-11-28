<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Doctor</title>
    <link rel="stylesheet" href="src/styles.css">
</head>
<style>
       .print-button {
            font-size: 24px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .print-button:hover {
            background-color: #0056b3;
        }
    .doctor-booking {
        background-image: url(images/doctor.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        width: 100vw;
        height: 90vh;
    }

    .doctor-booking .container {
        width: 40vw;
        height: 80vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding-top: 40px;
        border: 1px solid black;
        border-radius: 20px;
        background-color: #d9fae8;
        margin-left: 400px;
    }

    .doctor-booking .container h2 {
        padding-bottom: 20px;
    }

    .doctor-booking .container form {
        display: flex;
        flex-direction: column;
        width: 95%;
        height: 100%;
        text-align: left;
        padding-left: 30px;
        gap: 20px;
        background-color: #d9fae8;
    }

    .doctor-booking .container form label {
        padding-bottom: 10px;
        font-size: 17px;
        font-weight: 800;
        color: black;
        text-align: left;
    }

    .doctor-booking .container form input {
        width: 90%;
        height: 5vh;
    }

    .doctor-booking .container form select {
        width: 90%;
        height: 5vh;
    }

    .doctor-booking .container form button {
        width: 10vw;
    }
</style>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="images/logo-png.png" alt="logo" />
            </div>
            <div class="nav-links">
                <a href="index.html">Home | </a>
                <a href="about_diabeties.html">About Diabeties | </a>
                <a href="food&nutrition.html">Food & Nutrition | </a>
                <a href="health&welnness.html">Health & Wellness | </a>
                <a href="contact.html">Contact Us | </a>
                <a href="log-in.php">Login</a>
            </div>
        </nav>
    </header>
     <button class="print-button" onclick="window.print()">
        <i class="fas fa-print"></i> Print Page
    </button>
    <section class="doctor-booking">
        <div class="container">
            <h2>Book an Appointment with a Doctor</h2>

            <!-- Booking Form -->
            <form action="Nutrition-admin-panel/admin/code.php" method="POST">
                <?php
                require 'Nutrition-admin-panel/config/function.php';
                ?>
                <?= alertMessage(); ?>

                <div class="mb-3">
                    <label for="doctor" class="form-label">Select Doctor</label>
                    <br>
                    <select name="doctor_id" class="form-select" required>
                        <option value="">Select Doctor</option>

                        <?php
                        // Include database connection
                        require_once 'Nutrition-admin-panel/config/dbconn.php';

                        // Fetch doctors from the database
                        $query = "SELECT id, name FROM doctors";
                        $result = mysqli_query($conn, $query);

                        // Check for query errors
                        if ($result) {
                            // Loop through each doctor and create an option for each
                            while ($doctor = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $doctor['id'] . "'>" . htmlspecialchars($doctor['name']) . "</option>";
                            }
                        } else {
                            // Handle query failure
                            echo "<option value=''>Error loading doctors</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="patient_name" class="form-label">Your Name</label> <br>
                    <select name="user_id" class="form-select" required>
                        <option value="">Your Name</option>

                        <?php
                        // Include database connection
                        require_once 'Nutrition-admin-panel/config/dbconn.php';


                        // Fetch doctors from the database
                        $query = "SELECT id, name FROM users";
                        $result = mysqli_query($conn, $query);

                        // Check for query errors
                        if ($result) {
                            // Loop through each doctor and create an option for each
                            while ($user = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $user['id'] . "'>" . htmlspecialchars($user['name']) . "</option>";
                            }
                        } else {
                            // Handle query failure
                            echo "<option value=''>Error loading users</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Your Phone</label>
                    <br>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="appointment_date" class="form-label">Appointment Date</label>
                    <br>
                    <input type="date" name="appointment_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="appointment_time" class="form-label">Appointment Time</label>
                    <br>
                    <input type="time" name="appointment_time" class="form-control" required>
                </div>

                <button type="submit" name="bookDoctor" class="btn btn-primary">Book Appointment</button>
            </form>
        </div>
    </section>
</body>

</html>