<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Dosen </legend>
  <table class="table table-striped">
    <thead>
        <th>Nama Dosen</th>
        <th>NIP</th>
        <th>Alamat</th>
    </thead>
        <?php
 
		if(count($cari)>0)
		{
			foreach ($cari as $data) { ?>
            <tr>
                <td><?php echo $data->nama_dosen; ?></td>
                <td><?php echo $data->nip; ?></td>
                <td><?php echo $data->alamat; ?></td>
            </tr>
            <?php } 
		}
 
		else
		{
			echo "Data tidak ditemukan";
		}
 
		?>
        </table>
        <a class="btn btn-info" href="<?php echo base_url('dosen/') ?>">
        Kembali
        </a>
</div>