<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Jadwal </legend>
  <table class="table table-striped">
    <thead>
        <th>Nama Dosen</th>
        <th>Mata Kuliah</th>
        <th>Waktu</th>
    </thead>
        <?php
 
		if(count($cari)>0)
		{
			foreach ($cari as $data) { ?>
            <tr>
                <td>
                <?php foreach ($dosen as $d)
                {
                if($d->id_dosen == $data->id_dosen)
                {
                    echo $d->nama_dosen;
                }
                }
                ?>
                </td>
                <td><?php echo $data->mata_kuliah; ?></td>
                <td><?php echo $data->waktu; ?></td>
                
            </tr>
            <?php } 
		}
 
		else
		{
			echo "Data tidak ditemukan";
		}
 
		?>
        </table>
        <a class="btn btn-info" href="<?php echo base_url('jadwal/') ?>">
                Kembali
        </a>
</div>