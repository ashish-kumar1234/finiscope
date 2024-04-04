<?php
 
$this->load->view('admin/common/sidebar');
?>

<div class="container">
    <br>
    <h3 class="text-center">Loan KYC</h3>
    <br>
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
    <form method="post" enctype="multipart/form-data" id="loanForm" action="<?php echo base_url('admin_controller/insert_kyc'); ?>">
    <?php
 
            $user_id = isset($_GET['id']) ? $_GET['id'] : '';
            $user_id2 = htmlspecialchars($user_id);
        ?>
    <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id2;?>">

    <?php if (!$user_id2): ?>
        <div class="row">
            <div class="col-md-6">
                <label for="username">User Name</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option value="">Select Username</option>
                    <?php foreach ($userdetail as $userdetails) : ?>
                        <option value="<?php echo $userdetails->id; ?>" data-mobile="<?php echo $userdetails->mobile_no; ?>"><?php echo $userdetails->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label>Mobile No</label>
                <input type="text" class="form-control" name="mobile_no"  id="mobile_no" disabled>
            </div>
        </div>
        <br>
    <?php else: ?>
        <input type="hidden" class="form-control" name="username">
        <input type="hidden" class="form-control" name="mobile_no">
    <?php endif; ?>

    <div class="row">
        <div class="col-md-6">
            <label>Bank Passbook</label>
            <input type="file" class="form-control" name="bank_passbook">
        </div>
        <div class="col-md-6">
            <label>Aadhar</label>
            <input type="file" class="form-control" name="aadhar">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <label>PAN Card</label>
            <input type="file" class="form-control" name="pancard">
        </div>
        <div class="col-md-6">
            <label>Bank Transaction</label>
            <input type="file" class="form-control" name="bank_transaction">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <label>Salary Slip</label>
            <input type="file" class="form-control" name="salary_slip">
        </div>
        <div class="col-md-6">
            <label>Monthly Income</label>
            <input type="text" class="form-control" name="monthly_income">
        </div>
        <div class="col-md-6">
            <input type="hidden" class="form-control" name="hidden">
        </div>
    </div>
    <br>
    <button type="button" id="submitBtn" class="btn btn-primary">Save</button>
    </form>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
   $(document).ready(function() {
    $('#user_id').change(function() { // Change the selector to #user_id
        var selectedMobile = $(this).find('option:selected').data('mobile');
        $('#mobile_no').val(selectedMobile);
    });

    $('#submitBtn').click(function() {
        var formData = new FormData($('#loanForm')[0]); 
        $.ajax({
            url: '<?php echo base_url('admin_controller/insert_kyc'); ?>',
            type: 'POST',
            data: formData,
            processData: false,  
            contentType: false,  
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('<div class="alert alert-success">Data inserted successfully.</div>').appendTo('.container').delay(3000).fadeOut('slow');
                } else {
                    alert('Failed to insert data: ' + response.message);  
                }
            },
            error: function(xhr, status, error) {
                alert('Failed to insert data: ' + error);   
            }
        });
    });
});

</script>

<?php
$this->load->view('admin/common/footer');
?>
