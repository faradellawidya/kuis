<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Tambah Data Jadwal</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('jadwal/store'); ?>

    <div class="form-group">
    <label> Nama Dosen </label>
          <select class="form-control" name ="id_dosen" id="id_dosen"> 
          <option selected> --Pilih Dosen-- </option>
          <?php foreach ($dataDosen as $d) { ?>
          <option value="<?php echo $d->id_dosen?>"><?php echo $d->nama_dosen?></option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
      <label for="Nama">Mata Kuliah</label>
      <input type="text" class="form-control" id="mata_kuliah" name="mata_kuliah" placeholder="Masukkan Mata Kuliah">
    </div>
    <div class="form-group">
      <label for="Nama">Waktu</label>
      <input type="text" class="form-control" id="waktu" name="waktu" placeholder="Masukkan Waktu">
    </div>

    <a class="btn btn-info" href="<?php echo base_url('jadwal/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>