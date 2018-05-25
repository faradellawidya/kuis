<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Jadwal </legend>

      <form class="form-inline" action="<?php echo base_url('jadwal/cari')?>" action="GET">
				<div class="form-group">
					<label for="cari">*Search berdasarkan mata kuliah*</label><br/>
					<input type="text" class="form-control" id="cari" name="cari" placeholder="Search...">
			
				<input class="btn btn-info" type="submit" value="Cari">
        </div>
			</form>
  

  <?php if (isset($results)) { ?>
  <table class="table table-striped">
    <thead>
        <th>Nama Dosen</th>
        <th>Mata Kuliah</th>
        <th>Waktu</th>
        <th width="15%"><a class="btn btn-primary" href="<?php echo base_url('jadwal/create') ?>">
            Tambah
          </a>
        </th>
    </thead>
    <tbody>
    <?php foreach ($results as $data) { ?>
    <tr>
      <td>
      <a href="<?php echo base_url('jadwal/show/'.$data->id_jadwal) ?>">
        <?php foreach ($dosen as $d)
        {
          if($d->id_dosen == $data->id_dosen)
          {
            echo $d->nama_dosen;
          }
        }
        ?>
      </td>
      <td>
      <a href="<?php echo base_url('jadwal/show/'.$data->id_jadwal) ?>">
      <?php echo $data->mata_kuliah ?>
      </td>
      <td>
      <a href="<?php echo base_url('jadwal/show/'.$data->id_jadwal) ?>">
      <?php echo $data->waktu ?>
      </td>
        <td>
            <?php echo form_open('jadwal/destroy/'.$data->id_jadwal)  ?>
            <a class="btn btn-info" href="<?php echo base_url('jadwal/edit/'.$data->id_jadwal) ?>">
                Ubah
            </a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
            <?php echo form_close() ?>
        </td>
    </tr>
    <?php } ?>
    </tbody>
  </table>
  <?php echo $links ?>
  <?php } else { ?>
  <div>Tidak ada data</div>
  <?php } ?>
</div>

<?php //$this->load->view('layouts/base_end') ?>
