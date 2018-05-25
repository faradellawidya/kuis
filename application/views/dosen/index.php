<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Daftar Dosen</legend>

  <form class="form-inline" action="<?php echo base_url('dosen/cari')?>" action="GET">
				<div class="form-group">
					<label for="cari">*Search berdasarkan nama dosen*</label><br/>
					<input type="text" class="form-control" id="cari" name="cari" placeholder="Search...">
				
				<input class="btn btn-info" type="submit" value="Cari">
        </div>
			</form>

  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php if (isset($results)) { ?>
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Nama Dosen</th>
        <th>NIP</th>
        <th>Alamat</th>
        <th>
          <a class="btn btn-primary" href="<?php echo base_url('dosen/create') ?>">
            Tambah
          </a>
        </th>
      </thead>
      <tbody>
        <?php $number = 1; foreach($results as $data) { ?>
        <tr>
          <td>
            <a href="<?php echo base_url('dosen/show/'.$data->id_dosen) ?>">
              <?php echo $number++ ?>
            </a>
          </td>
          <td>
            <a href="<?php echo base_url('dosen/show/'.$data->id_dosen) ?>">
              <?php echo $data->nama_dosen ?>
            </a>
          </td>
          <td>
            <a href="<?php echo base_url('dosen/show/'.$data->id_dosen) ?>">
              <?php echo $data->nip ?>
            </a>
          </td>
          <td>
            <a href="<?php echo base_url('dosen/show/'.$data->id_dosen) ?>">
              <?php echo $data->alamat ?>
            </a>
          </td>
          <td>
            <?php echo form_open('dosen/destroy/'.$data->id_dosen)  ?>
            <a class="btn btn-info" href="<?php echo base_url('dosen/edit/'.$data->id_dosen) ?>">
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
</div>

  

<?php $this->load->view('layouts/base_end') ?>