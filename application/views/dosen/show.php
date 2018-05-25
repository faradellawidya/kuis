<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Lihat Data Dosen</legend>
  <div class="content">
    <div class="form-group">
      <label for="Nama">Nama Dosen</label>
      <p><?php echo $data->nama_dosen ?></p>
    </div>
    <div class="form-group">
      <label for="Nama">NIP</label>
      <p><?php echo $data->nip ?></p>
    </div><div class="form-group">
      <label for="Nama">Alamat</label>
      <p><?php echo $data->alamat ?></p>
    </div>
    <a class="btn btn-info" href="<?php echo base_url('dosen/') ?>">Kembali</a>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>