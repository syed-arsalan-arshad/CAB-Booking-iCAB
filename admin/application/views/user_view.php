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
                    <h3>User Details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-stripped table-hover">
                        
                        <tr><th>S.No</th><th>Name</th><th>Email Id</th><th>Status</th><th>Action</th></tr>
                        <?php 
                        $i = 1;
                        foreach($rs as $d){ ?>
                        
                        <tr><td><?php echo $i; ?></td><td><?php echo $d->name; ?></td><td><?php echo $d->email; ?></td><td><?php echo $d->status; ?></td><td><a href="<?php echo base_url('index.php/admin/removeUser/'.$d->id); ?>">Remove User</a></td></tr>
                        
                        
                        <?php $i++; } ?>
                        
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>