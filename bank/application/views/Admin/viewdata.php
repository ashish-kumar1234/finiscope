 

<?php $this->load->view('admin/common/sidebar'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="/DataTables/datatables.css" />

    <script src="/DataTables/datatables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
</head>

<body>

    <div class="container">
        <h3 class="text-center">User Detail</h3>
        <div class="row justify-content-end mb-3">

        </div>
        <table class="table table-striped" id="myTable">
            <thead>
                <tr class="text-center">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Date Of Birth</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Address</th>
                    <th>Pincode</th>
                    <th>Loan Amount</th>
                    <th>Loan Type</th>
                    <th>Kyc</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($details as $detail) : ?>
                    <?php
                     $isActive = false;
                    foreach ($kyc as $kycDetail) {
                        if ($kycDetail->user_id == $detail->id) {
                            $isActive = true;
                            break;
                        }
                    }
                    ?>
                    <tr>
                        <td><?php echo $detail->id; ?></td>
                        <td><?php echo $detail->name ?></td>
                        <td><?php echo $detail->dob ?></td>
                        <td><?php echo $detail->email ?></td>
                        <td><?php echo $detail->mobile_no ?></td>
                        <td><?php echo $detail->country ?></td>
                        <td><?php echo $detail->state ?></td>
                        <td><?php echo $detail->address ?></td>
                        <td><?php echo $detail->pin_code ?></td>
                        <td><?php echo $detail->loan_amount ?></td>
                        <td><?php echo $detail->loan_type ?></td>
                        <td>
                            <?php if ($isActive) : ?>
                              <button class="btn btn-success">success</button>
                               
                            <?php else : ?>
                              <button class="btn btn-danger">Pending</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

  

</body>

</html>
<?php $this->load->view('admin/common/footer'); ?>
