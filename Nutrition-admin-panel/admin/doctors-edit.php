<?php include('includes/header.php') ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Edit Doctor
                    <a href="doctors.php" class="btn btn-primary float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="code.php" method="POST">

                    <?php
                    $paramResult = checkParamId('id');
                    if (!is_numeric($paramResult)) {
                        echo '<h5>' . $paramResult . '</h5>';
                        return false;
                    }

                    // Get the doctor details by ID
                    $doctor = getById('doctors', checkParamId('id'));
                    if ($doctor['status'] == 200) {
                    ?>

                        <input type="hidden" name="doctorId" value="<?= $doctor['data']['id']; ?>" required />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" value="<?= $doctor['data']['name']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Specialization</label>
                                    <input type="text" name="specialization" value="<?= $doctor['data']['specialization']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?= $doctor['data']['email']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Phone No.</label>
                                    <input type="text" name="phone" value="<?= $doctor['data']['phone']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Availability</label>
                                    <input type="text" name="availability" value="<?= $doctor['data']['availability']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Select Role</label>
                                    <select name="role" class="form-select" required>
                                        <option value="">Select Role</option>
                                        <option value="doctor">Admin</option>
                                        <option value="admin">User</option>
                                        <option value="admin">Doctor</option>
                                        <option value="admin">Therapist</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 text-end">
                                    <br>
                                    <button type="submit" name="updateDoctor" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    <?php
                    } else {
                        echo '<h5>' . $doctor['message'] . '</h5>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>