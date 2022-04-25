<div class="container-fluid" style="font-size: 16px; color: black;">
    <h1 align="center">Form Ubah Password</h1>
    <div class="row justify-content-center">
        <div class="col-6">
            <?php echo form_open('User/ubahPass', array('id' => 'passwordForm'))?>
                <div class="form-group">
                    <input type="password" name="oldpass" id="oldpass" class="form-control" placeholder="Old Password" />
                    <?php echo form_error('oldpass', '<div class="error">', '</div>')?>
                </div>
                <div class="form-group">
                    <input type="password" name="newpass" id="newpass" class="form-control" placeholder="New Password" />
                    <?php echo form_error('newpass', '<div class="error">', '</div>')?>
                </div>
                <div class="form-group">
                    <input type="password" name="passconf" id="passconf" class="form-control" placeholder="Confirm Password" />
                    <?php echo form_error('passconf', '<div class="error">', '</div>')?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Change Password</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>