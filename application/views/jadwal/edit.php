<!-- jadwal/edit.php -->

<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Ubah Data Jadwal</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('jadwal/update/'.$data->id_jadwal); ?>
    <?php echo form_hidden('id_jadwal', $data->id_jadwal) ?>
    <div class="form-group">
    <label> Nama Dosen </label>
          <select class="form-control" name ="id_dosen" id="id_dosen"> 
          <option selected>
          <?php
            foreach ($dosen as $d) {
              if($d->id_dosen == $data->id_dosen)
              {
                echo $d->nama_dosen;
              }
            }
          ?>
          </option>
          <?php foreach ($dosen as $d) { ?>
          <option value="<?php echo $d->id_dosen?>"><?php echo $d->nama_dosen?></option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
      <label for="Nama">Mata Kuliah</label>
      <input type="text" class="form-control" id="mata_kuliah" name="mata_kuliah" placeholder="Masukkan Mata Kuliah" value="<?php echo $data->mata_kuliah ?>">
    </div>
    <div class="form-group">
      <label for="Nama">Waktu</label>
      <input type="text" class="form-control" id="waktu" name="waktu" placeholder="Masukkan Waktu" value="<?php echo $data->waktu ?>">
    </div>

    <a class="btn btn-info" href="<?php echo base_url('jadwal/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close(); ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>