<?php #echo form_open('member/register', array('class' => 'form-horizontal form-bordered', 'id' => 'submit_form')); 
?>
<div class="form-group mb-lg">
   <label>Judul Berita</label>
   <input name="judul_berita" id="judul_berita" type="text" class="form-control" required />
</div>
<div class="form-group mb-lg">
   <label>Kategori Berita</label>
   <select data-plugin-selectTwo id="kategori_id" class="form-control populate">
   <?php
   $qs = $this->db->query("SELECT * FROM kategori order by kategori");
   foreach ($qs->result_array() as $row) {
      echo '<option value="' . $row['kategori_id'] . '">' . $row['kategori'] . '</option>';
   }
   ?>
   </select>
</div>
<div class="form-group mb-lg">
   <label>Isi Berita</label>
   <br>
   <textarea class="form-control summernote" id="isi_berita" rows="3" data-plugin-maxlength maxlength=""></textarea>
</div>
<div class="row">
   <div class="col-sm-2 pull-right">
      <button type="submit" class="btn btn-primary hidden-xs" onclick="save_add()">Save</button>
      <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg" onclick="save_add()">Save</button>
   </div>
</div>

<?php #echo form_close(); 
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>