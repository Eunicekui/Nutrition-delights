<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Doctor Bookings List
                </h4>
            </div>
            <div class="card-body">

                <?php alertMessage(); ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Appointment ID</th>
                            <th>User</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch all bookings from the database
                        $bookings = getAll('booking_doctor');
                        if (mysqli_num_rows($bookings) > 0) {
                            foreach ($bookings as $bookingItem) {
                        ?>
                                <tr>
                                    <td><?= $bookingItem['id']; ?></td>
                                    <td><?= $bookingItem['user_id']; ?></td>
                                    <td><?= $bookingItem['doctor_id']; ?></td>
                                    <td><?= $bookingItem['appointment_date']; ?></td>
                                    <td><?= $bookingItem['appointment_time']; ?></td>
                                    <td><?= $bookingItem['status']; ?></td>
                                    <td>
                                        <a href="doctor-approve.php?id=<?= $bookingItem['id']; ?>" class="btn btn-success btn-sm">Approve</a>
                                        <a href="booking-doctor-delete.php?id=<?= $bookingItem['id']; ?>"
                                            class=" btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo '<tr><td colspan="6" class="text-center">No bookings found.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>