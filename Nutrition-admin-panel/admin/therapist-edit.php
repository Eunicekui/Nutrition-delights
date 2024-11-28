<?php include('includes/header.php') ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Therapist
                    <a href="therapist.php" class="btn btn-primary float-end">Back</a>
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

                    $therapist = getById('therapists', checkParamId('id'));
                    if ($therapist['status'] == 200) {
                    ?>

                        <input type="hidden" name="therapistId" value="<?= $therapist['data']['id']; ?>" required />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" value="<?= $therapist['data']['name']; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Phone No.</label>
                                    <input type="text" name="phone" value="<?= $therapist['data']['phone']; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?= $therapist['data']['email']; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Specialization</label>
                                    <input type="text" name="specialization" value="<?= $therapist['data']['specialization']; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Availability</label>
                                    <input type="text" name="availability" value="<?= $therapist['data']['availability']; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 text-end">
                                    <button type="submit" name="updateTherapist" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    <?php
                    } else {
                        echo '<h5>' . $therapist['message'] . '</h5>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>