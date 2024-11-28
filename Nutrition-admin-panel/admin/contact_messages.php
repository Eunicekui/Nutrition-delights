<?php include('includes/header.php') ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Enquiries List
                </h4>
            </div>
            <div class="card-body">

                <?php alertMessage(); ?>

                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contact_messages = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY id DESC");
                        if (mysqli_num_rows($contact_messages) > 0) {
                            foreach ($contact_messages as $userItem) {
                        ?>
                                <tr>
                                    <td><?= $userItem['id']; ?></td>
                                    <td><?= $userItem['name']; ?></td>
                                    <td><?= $userItem['email']; ?></td>
                                    <td><?= $userItem['message']; ?></td>
                                    <td><?= $userItem['status']; ?></td>

                                    <td>
                                        <a href="read-message.php?id=<?= $userItem['id']; ?>" class="btn btn-success btn-sm">Read</a>
                                        <a href="enquiry-delete.php?id=<?= $userItem['id']; ?>"
                                            class=" btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
                                    </td>

                                </tr>
                        <?php
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>