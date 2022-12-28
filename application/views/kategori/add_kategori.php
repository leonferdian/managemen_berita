<?php #echo form_open('member/register', array('class' => 'form-horizontal form-bordered', 'id' => 'submit_form')); ?>
<div class="form-group mb-lg">
   <label>Kategori</label>
   <input name="kategori" id="kategori" type="text" class="form-control" required />
</div>

<div class="row">
   <div class="col-sm-2 pull-right">
      <button type="submit" class="btn btn-primary hidden-xs" onclick="save_add()">Save</button>
      <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg" onclick="save_add()">Save</button>
   </div>
</div>

<?php #echo form_close(); ?>