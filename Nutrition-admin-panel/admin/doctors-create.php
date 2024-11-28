<?php include('includes/header.php') ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Add Doctor
                    <a href="doctors.php" class="btn btn-primary float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <?php alertMessage(); ?>

                <form action="code.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Specialization</label>
                                <input type="text" name="specialization" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Phone No.</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Availability</label>
                                <input type="text" name="availability" class="form-control" placeholder="e.g., Mon-Fri, 9 AM - 5 PM" required>
                            </div>
                            </d>
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
                                <button type="submit" name="saveDoctor" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>