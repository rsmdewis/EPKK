<html>
    <head>
        <style>
            table {
                font-family: arial, sans-serif;
                width: 100%;
                page-break-inside: auto;
            }

            thead {
                font-family: sans-serif;
                display: table-header-group;
            }

            td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            th {
                border: 1px solid #dddddd;
                text-align: center;
                padding: 8px;
            } 

            tr:nth-child(even) {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            tfoot {
                display: table-footer-group;
            }
        </style>
    </head>
    <h2 style="text-align: center; font-family: sans-serif">FORMULIR EVALUASI HASIL RENJA PERANGKAT DAERAH<br>KABUPATEN MALANG JAWA TIMUR<br>Tahun <?php echo date('Y'); ?></h2>
    <table class="table table-bordered">
        <thead style="background-color: #d0d2d0;">
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Sasaran</th>
                <th rowspan="2">Kode</th>
                <th rowspan="2">Program/Kegiatan/Sub Kegiatan</th>
                <th rowspan="2">Indikator Kinerja Program (Outcome) / Kegiatan (Output) / Sub Kegiatan</th>
                <th rowspan="2" colspan="3">Target kinerja dan anggaran Renja PD Tahun Berjalan yang dievaluasi Tahun <?php echo date('Y') ?></th>
                <th colspan="8">Realisasi Kinerja Pada Triwulanan</th>
                <th rowspan="2">Faktor Penghambat</th>
                <th rowspan="2">Faktor Pendorong</th>
				<th rowspan="2">Masalah</th>
				<th rowspan="2">Solusi</th>
            </tr>
            <tr>
                <th colspan="2">I</th><th colspan="2">II</th><th colspan="2">III</th><th colspan="2">IV</th>
            </tr>
            <tr>
                <th rowspan="2">1</th>
                <th rowspan="2">2</th>
                <th rowspan="2">3</th>
                <th rowspan="2">4</th>
                <th rowspan="2">5</th>
                <th colspan="3">6</th>
                <th colspan="2">7</th>
                <th colspan="2">8</th>
                <th colspan="2">9</th>
                <th colspan="2">10</th>
                <th rowspan="2">11</th>
                <th rowspan="2">12</th>
				<th rowspan="2">13</th>
				<th rowspan="2">14</th>
            </tr>
            <tr>
                <th>Rp</th><th>K</th><th>Rp</th>
                <th>K</th><th>Rp</th>
                <th>K</th><th>Rp</th>
                <th>K</th><th>Rp</th>
                <th>K</th><th>Rp</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($program as $program) {
                $no++;
                ?>
                <tr style="background-color: #f3f3f3;">
                    <td><b><?php echo $no; ?></b></td>
                    <td></td>
                    <td><b><?php echo $program->rek_program; ?></b></td>
                    <td><b><?php echo $program->nama_program; ?></b></td>
                    <td><b><?php echo $program->Indikator; ?></b></td>
                    <td><b>0</b></td>
                    <td><b><?php echo $program->Target; ?>&nbsp; <?php echo $program->Satuan; ?></b></td>
                    <td style="text-align: right"><b><?php echo number_format($program->Anggaran, 2, ",", "."); ?></b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
					<td></td>
                    <td></td>
                    <?php
                    $id = $program->rek_program;
                    $data = $this->M_kinerja->cetak_kegiatan($id);
                    foreach ($data as $kegiatan) {
                        ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><i><b><?php echo $kegiatan->rek_kegiatan; ?></b></i></td>
                        <td><i><b><?php echo $kegiatan->nama_kegiatan; ?></b></i></td>
                        <td><i><b><?php echo $kegiatan->Indikator; ?></b></i></td>
                        <td><i><b>0</b></i></td>
                        <td><i><b><?php echo $kegiatan->Target; ?>&nbsp; <?php echo $kegiatan->Satuan; ?></b></i></td>
                        <td style="text-align: right"><i><b><?php echo number_format($kegiatan->Anggaran, 2, ",", "."); ?></b></i></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
						<td></td>
                        <td></td>
                    </tr>

                    <?php
                    $id = $kegiatan->rek_kegiatan;
                    $sub = $this->M_kinerja->get_subkegiatan($id);
                    foreach ($sub as $subkegiatan) {
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?php echo $subkegiatan->rek_subkegiatan; ?></td>
                            <td><?php echo $subkegiatan->nama_subkegiatan; ?></td>
                            <td><?php echo $subkegiatan->outcome; ?></td>
                            <td>0</td>
                            <td><?php echo $subkegiatan->indikator; ?><o:p>&nbsp;</o:p><?php echo $subkegiatan->satuan; ?></td>
                <td style="text-align: right"><?php echo number_format($subkegiatan->pagu, 2, ",", "."); ?></td>
                <td><?php echo $subkegiatan->kinerja1; ?></td>
                <td style="text-align: right"><?php echo number_format($subkegiatan->anggaran1, 2, ",", "."); ?></td>
                <td><?php echo $subkegiatan->kinerja2; ?></td>
                <td style="text-align: right"><?php echo number_format($subkegiatan->anggaran2, 2, ",", "."); ?></td>
                <td><?php echo $subkegiatan->kinerja3; ?></td>
                <td style="text-align: right"><?php echo number_format($subkegiatan->anggaran3, 2, ",", "."); ?></td>
                <td><?php echo $subkegiatan->kinerja4; ?></td>
                <td style="text-align: right"><?php echo number_format($subkegiatan->anggaran4, 2, ",", "."); ?></td>
                <td><?php echo $subkegiatan->penghambat; ?></td>
                <td><?php echo $subkegiatan->pendorong; ?></td>
				<td><?php echo $subkegiatan->masalah; ?></td>
				<td><?php echo $subkegiatan->solusi; ?></td>
            </tr>
        <?php } ?>

    <?php } ?>

<?php } ?>
</tbody>

</table> 
</html>