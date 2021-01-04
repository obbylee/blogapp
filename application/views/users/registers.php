<?php echo form_open('users/register');?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        <h2 class="text-center"><?= $title;?></h2>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo set_value('name');?>" placeholder="Your Name Here . . .">
                <span style="color:red;"><?php echo form_error('name');?></span>
            </div>
            <div class="form-group">
                <label>Zipcode</label>
                <input type="text" class="form-control" name="zipcode" value="<?php echo set_value('zipcode');?>"placeholder="My Zipcode . . .">
                <?php echo form_error('zipcode');?>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo set_value('email');?>" placeholder="My Email . . .">
                <?php echo form_error('email');?>
            </div>
            <div class="form-group">
                <label>username</label>
                <input type="text" class="form-control" name="username" value="<?php echo set_value('username');?>" placeholder="My Favourite Alias . . .">
                <?php echo form_error('username');?>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="user_pass" value="<?php echo set_value('user_pass');?>" placeholder="Secret Code . . .">
                <?php echo form_error('user_pass');?>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="user_pass2" placeholder="Must be Match . . .">
                <?php echo form_error('user_pass2');?>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
    </div>
<?php echo form_close();?>
