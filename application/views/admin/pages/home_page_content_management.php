<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Slider Content</h3>
                </div>
                <form enctype="multipart/form-data" action="#" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Slider Heading</label>
                            <input type="text" name="" id="" class="form-control" placeholder="enter slider heading" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Slider Sub-title Text</label>
                            <input type="text" name="" id="" class="form-control" placeholder="enter slider heading" value="" required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Slider Image</label>
                                    <!-- <input type="hidden" id="event_old_pic_field" name="event_old_pic_field"> -->
                                    <input type="file" name="" id="" class="form-control" id="file" accept="image/*" onchange="preview_image(event)">
                                </div>
                                <div class="col-md-5">
                                    <img src="" id="output_image" onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">

                    </div>
                </form>
            </div>

        </div>

        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Welcome Area Content</h3>
                </div>
                <form enctype="multipart/form-data" action="#" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Heading Text</label>
                            <input type="text" name="" id="" class="form-control" placeholder="enter slider heading" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Sub-title Text</label>
                            <input type="text" name="" id="" class="form-control" placeholder="enter slider heading" value="" required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Image</label>
                                    <!-- <input type="hidden" id="event_old_pic_field" name="event_old_pic_field"> -->
                                    <input type="file" name="" id="" class="form-control" id="file" accept="image/*" onchange="preview_image(event)">
                                </div>
                                <div class="col-md-5">
                                    <img src="" id="output_image" onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='<?php echo base_url() ?>assets/admin_assets/dist/img/camera.png';">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>