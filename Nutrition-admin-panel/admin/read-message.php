<?php include('includes/header.php') ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>View Enquiries</h4>
                <a href="contact_messages.php" class="btn btn-danger btn-sm mb-0 float-end">Back</a>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>

                <?php
                $paramResult = checkParamId('id');
                if (!is_numeric($paramResult)) {
                    echo '<h5>' . $paramResult . '</h5>';
                    return false;
                }

                $contact_message = getById('contact_messages', checkParamId('id'));
                if ($contact_message['status'] == 200) {
                ?>

                    <table class="table table-bordered table-stripped">
                        <tbody>
                            <tr>
                                <td>Enquiry Id</td>
                                <td><?= $contact_message['data']['id']; ?></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><?= $contact_message['data']['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= $contact_message['data']['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td><?= $contact_message['data']['message']; ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><?= $contact_message['data']['status']; ?></td>
                            </tr>
                            <tr>
                                <td>Enquiry Date</td>
                                <td><?= $contact_message['data']['created_at']; ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-3">
                        <div class="card border card-body">

                            <form action="code.php" method="POST">
                                <input type="hidden" name="enquiryid" value="<?= $contact_message['data']['id']; ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Update Status</label>
                                        <select name="status" class="form-select">
                                            <option value="unread"
                                                <?= $contact_message['data']['status'] == 'unread' ? 'selected' : ''; ?>>
                                                Unread
                                            </option>
                                            <option value="read" <?= $contact_message['data']['status'] == 'read' ? 'selected' : ''; ?>>
                                                Read
                                            </option>
                                            <option value="cancelled" <?= $contact_message['data']['status'] == 'cancelled' ? 'selected' : ''; ?>>
                                                Cancelled
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <br>
                                        <button type="submit" name="updateEnquiryStatus" class="btn btn-primary">Update Status</button>
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