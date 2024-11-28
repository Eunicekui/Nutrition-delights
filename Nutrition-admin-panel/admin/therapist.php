<?php include('includes/header.php') ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Therapists List
                    <a href="therapist-create.php" class="btn btn-primary float-end">Add Therapist</a>
                </h4>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Specialization</th>
                            <th>Availability</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query to fetch all therapists
                        $query = "SELECT * FROM therapists";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($therapist = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td><?= $therapist['name'] ?></td>
                                    <td><?= $therapist['phone'] ?></td>
                                    <td><?= $therapist['email'] ?></td>
                                    <td><?= $therapist['specialization'] ?></td>
                                    <td><?= $therapist['availability'] ?></td>
                                    <td>
                                        <a href="therapist-edit.php?id=<?= $therapist['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                                        <a href="therapist-delete.php?id=<?= $therapist['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='6'>No therapists found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>