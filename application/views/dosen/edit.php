<!-- dosen/edit.php -->

<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Ubah Data Dosen</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('dosen/update/'.$data->id_dosen); ?>
    <?php echo form_hidden('id_dosen', $data->id_dosen) ?>
    <div class="form-group">
      <label for="Nama">Nama Dosen</label>
      <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" placeholder="Masukkan Nama Dosen" value="<?php echo $data->nama_dosen ?>">
    </div>
    <div class="form-group">
      <label for="Nama">NIP</label>
      <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" value="<?php echo $data->nip ?>">
    </div>
    <div class="form-group">
      <label for="Nama">Alamat</label>
      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?php echo $data->alamat ?>">
    </div>

    <a class="btn btn-info" href="<?php echo base_url('dosen/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close(); ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>