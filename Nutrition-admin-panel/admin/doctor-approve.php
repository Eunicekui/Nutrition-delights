<?php include('includes/header.php') ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Approve Bookings</h4>
                <a href="booking_doctor.php" class="btn btn-danger btn-sm mb-0 float-end">Back</a>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>

                <?php
                $paramResult = checkParamId('id');
                if (!is_numeric($paramResult)) {
                    echo '<h5>' . $paramResult . '</h5>';
                    return false;
                }

                $booking_doctor = getById('booking_doctor', checkParamId('id'));
                if ($booking_doctor['status'] == 200) {
                ?>

                    <table class="table table-bordered table-stripped">
                        <tbody>
                            <tr>
                                <td>Appointment Id</td>
                                <td><?= $booking_doctor['data']['id']; ?></td>
                            </tr>
                            <tr>
                                <td>User</td>
                                <td><?= $booking_doctor['data']['user_id']; ?></td>
                            </tr>
                            <tr>
                                <td>Doctor</td>
                                <td><?= $booking_doctor['data']['doctor_id']; ?></td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td><?= $booking_doctor['data']['appointment_date']; ?></td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td><?= $booking_doctor['data']['appointment_time']; ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><?= $booking_doctor['data']['status']; ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-3">
                        <div class="card border card-body">

                            <form action="code.php" method="POST">
                                <input type="hidden" name="appointmentid" value="<?= $booking_doctor['data']['id']; ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Update Status</label>
                                        <select name="status" class="form-select">
                                            <option value="approved"
                                                <?= $booking_doctor['data']['status'] == 'approved' ? 'selected' : ''; ?>>
                                                Approved
                                            </option>
                                            <option value="pending" <?= $booking_doctor['data']['status'] == 'pending' ? 'selected' : ''; ?>>
                                                Pending
                                            </option>
                                            <option value="cancelled" <?= $booking_doctor['data']['status'] == 'cancelled' ? 'selected' : ''; ?>>
                                                Cancelled
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <br>
                                        <button type="submit" name="updateDoctorBook" class="btn btn-primary">Update Status</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php
                } else {
                    echo "<h5>No Records Found</h5>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>