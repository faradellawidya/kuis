<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Lihat Data Jadwal</legend>
  <div class="content">
  <div class="form-group">
      <label for="kategori">Nama Dosen</label>
      <p><?php foreach ($dosen as $d)
        {
          if($d->id_dosen == $data->id_dosen)
          {
            echo $d->nama_dosen;
          }
        }
        ?></p>
    </div>
    <div class="form-group">
      <label for="mata_kuliah">Mata Kuliah</label>
      <p><?php echo $data->mata_kuliah ?></p>
    </div><div class="form-group">
      <label for="waktu">Waktu</label>
      <p><?php echo $data->waktu ?></p>
    </div>
    <a class="btn btn-info" href="<?php echo base_url('jadwal/') ?>">Kembali</a>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>