<?php include('includes/header.php') ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Doctor Lists
                    <a href="doctors-create.php" class="btn btn-danger float-end">Add Doctor</a>
                </h4>
            </div>
            <div class="card-body">

                <?php alertMessage(); ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Specialization</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Availability</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch all doctors from the database
                        $doctors = getAll('doctors');
                        if (mysqli_num_rows($doctors) > 0) {
                            foreach ($doctors as $doctorItem) {
                        ?>
                                <tr>
                                    <td><?= $doctorItem['id']; ?></td>
                                    <td><?= $doctorItem['name']; ?></td>
                                    <td><?= $doctorItem['specialization']; ?></td>
                                    <td><?= $doctorItem['email']; ?></td>
                                    <td><?= $doctorItem['phone']; ?></td>
                                    <td><?= $doctorItem['availability']; ?></td>
                                    <td>
                                        <a href="doctors-edit.php?id=<?= $doctorItem['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                        <a href="doctors-delete.php?id=<?= $doctorItem['id']; ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>No doctors found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>