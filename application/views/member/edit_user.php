<?php #echo form_open('member/register', array('class' => 'form-horizontal form-bordered', 'id' => 'submit_form')); ?>
<div class="form-group mb-lg">
   <label>Username</label>
   <input name="nama" id="nama" type="text" class="form-control" value="<?php echo $row_data['username']; ?>" required />
   <input type="hidden" id="user_id" value="<?php echo $row_data['user_id']; ?>">
</div>

<div class="form-group mb-none">
   <div class="row">
      <div class="col-sm-6 mb-lg">
         <label>Password</label>
         <input name="password" id="password" type="password" class="form-control" required />
      </div>
      <div class="col-sm-6 mb-lg">
         <label>Password Confirmation</label>
         <input name="pwd_confirm" id="pwd_confirm" type="password" class="form-control" required />
      </div>
   </div>
</div>

<div class="row">
   <div class="col-sm-2 pull-right">
      <button type="submit" class="btn btn-primary hidden-xs" onclick="save_edit()">Save</button>
      <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg" onclick="save_edit()">Save</button>
   </div>
</div>

<?php #echo form_close(); ?>