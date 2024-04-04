<?php 
$this->load->view('admin/common/sidebar');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Application Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center">User Details</h1>
<?php
$success_message = $this->session->flashdata('success');
$error_message = $this->session->flashdata('error');
if ($success_message) {
    echo '<div class="alert alert-success">' . $success_message . '</div>';
}
if ($error_message) {
    echo '<div class="alert alert-danger">' . $error_message . '</div>';
}
?>

    <form method="post" enctype="multipart/form-data" id="loanForm" action="<?php echo base_url().'admin_controller/insert_details' ;?>">
        <br>
        <div class="row">
            <div class="col-md-6">
                <label>Name</label>   
                <input type="text" class="form-control" name="name" >  
            </div>
            <div class="col-md-6">
                <label>Date of Birth</label>  
                <input type="date" class="form-control" name="dob">  
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <label>Email</label>   
                <input type="email" class="form-control" name="email">  
            </div>
            <div class="col-md-6">
                <label>Mobile No</label>  
                <input type="text" class="form-control" name="mobile_no">  
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <label>Country</label>   
                <input type="text" class="form-control" name="country" value="India" disabled>  
            </div>
            <div class="col-md-6">
                <label>State</label>   
                <input type="text" class="form-control" name="state" >  
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <label>Address</label>   
                <textarea class="form-control" name="address" placeholder="Street Address"></textarea>
            </div>
            <div class="col-md-6">
                <label>PIN Code</label>   
                <input type="text" class="form-control" name="pin_code" >  
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <label>Loan Amount</label>   
                <input type="number" class="form-control" name="loan_amount" >  
            </div>
            <div class="col-md-6">
                <label>Loan Type</label>  
                <select class="form-control" name="loan_type">
                    <option value="personal">Personal Loan</option>
                    <option value="home">Home Loan</option>
                    <option value="car">Car Loan</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
        </div>
        <br>
         
        <br>
        <div class="text-left">
        <button type="button" id="submitBtn" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>


<script>
    $(document).ready(function() {
        $('#submitBtn').click(function() {
            $.ajax({
                url: '<?php echo base_url().'admin_controller/insert_details' ?>',
                type: 'POST',
                data: $('#loanForm').serialize(),
                success: function(response) {
                    if (confirm('Data inserted successfully. Do you want to proceed to KYC page?')) {
                        window.location.href = '<?php echo base_url("loan_kyc") ?>?id=' + response;  
                    } else {
                        $('<div class="alert alert-success">Data inserted successfully.</div>').appendTo('.container').delay(3000).fadeOut('slow');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Failed to insert data.');
                }
            });
        });
    });
</script>


</body>
</html>
<?php 
$this->load->view('admin/common/footer');
?>
