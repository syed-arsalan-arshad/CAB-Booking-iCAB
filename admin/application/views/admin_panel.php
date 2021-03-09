<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-4">
            <div class="list-group">
                <a href="<?php echo base_url('index.php/admin/index'); ?>" class="list-group-item active list-group-item-action text-white bg-info">Admin Profile</a>
                <a href="<?php echo base_url('index.php/admin/loadUser'); ?>" class="list-group-item list-group-item-action text-danger bg-warning">User Details</a>
                <a href="<?php echo base_url('index.php/admin/confirmBook'); ?>" class="list-group-item list-group-item-action text-white bg-info">Confirm Booking Details</a>
                <a href="<?php echo base_url('index.php/admin/failedBook'); ?>" class="list-group-item list-group-item-action text-danger bg-warning">Failed Booking Details</a>
                <a href="<?php echo base_url('index.php/admin/logout'); ?>" class="list-group-item list-group-item-action text-white bg-info">Logout</a>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Admin Details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-stripped table-hover">
                        <tr><th>Name: </th><td><?php echo  $this->session->userdata('name'); ?></td></tr>
                        <tr><th>Email Id: </th><td><?php echo  $this->session->userdata('email'); ?></td></tr>
                        <tr><th>Mobile No: </th><td><?php echo  $this->session->userdata('mobile'); ?></td></tr>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>