<table class="table table-sm table-striped table-hover">
    <thead>
        <tr>
            <th> #id</th>
            <th>Nama Bahan Baku</th>
            <th>Pemakaian Maksimal</th>
            <th>Pemakaian Minimal</th>
            <th>Lead Time(Satuan Hari)</th>
            <th>Aksi</th>
        </tr>
    </thead>
</table>
<tbody>
    <?php
    foreach ($safety_stock as $row) :
    ?>
        <tr>
            <td><?= $row->id_safety; ?></td>
            <td><?= $row->nama_bahanbaku; ?></td>
            <td><?= $row->pemakaiana_max; ?></td>
            <td><?= $row->pemakaian_min; ?></td>
            <td><?= $row->lead_time; ?></td>


        </tr>
    <?php
    endforeach;
    ?>
</tbody>