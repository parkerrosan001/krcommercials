<div class="container-fluid">
    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>0</h3>
                    <p>Total Subscriptions</p>
                </div>
                <div class="icon">
                    <i class="fas fa-bookmark"></i>
                </div>
                <a href="<?php echo base_url() ?>admin/subscriptions" class="small-box-footer"><label>More info </label> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3 style="color: white;">0</h3>
                    <p style="color: white;">Total Customers</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="<?php echo base_url() . 'admin/users' ?>" class="small-box-footer"><label style="color: white;"> More info </label> <i class="fas fa-arrow-circle-right" style="color: white;"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>0</h3>
                    <p>Total Customer Subscriptions</p>
                </div>
                <div class="icon">
                    <i class="fas fa-bookmark"></i>
                </div>
                <a href="<?php echo base_url() ?>admin/users/customerSubscriptions" class="small-box-footer"><label>More info </label> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>0</h3>
                    <p>Total Customer Orders</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-shopping-basket"></i>
                </div>
                <a href="<?php echo base_url() ?>admin/users/customerSubscriptionOrders" class="small-box-footer"><label>More info </label> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
</div>