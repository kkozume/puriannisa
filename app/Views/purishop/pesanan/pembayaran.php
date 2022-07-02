<?= $this->extend('purishop/webpuri') ?>

<?= $this->section('content') ?>
<title>Shop || Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<!-- Slider -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
	 <br> <br>
	<div class="container-fluid">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?=base_url('web')?>" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Pesanan Saya
			</span>
		</div>
	</div>
	 <br> <br>	
        <!-- lanjut bayar/ tombol proses checkout -->
		<!-- flash data masuk database -->
		<div id="flashshop" data-flashshop="<?=session()->getFlashdata('success')?>"></div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">	
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-order-tab" data-bs-toggle="tab" data-bs-target="#nav-order" type="button" role="tab" aria-controls="nav-order" aria-selected="true">Order</button>
                <button class="nav-link" id="nav-diproses-tab" data-bs-toggle="tab" data-bs-target="#nav-diproses" type="button" role="tab" aria-controls="nav-diproses" aria-selected="false">Diproses</button>
                <button class="nav-link" id="nav-dikirim-tab" data-bs-toggle="tab" data-bs-target="#nav-dikirim" type="button" role="tab" aria-controls="nav-dikirim" aria-selected="false">Dikirim</button>
                <button class="nav-link" id="nav-selesai-tab" data-bs-toggle="tab" data-bs-target="#nav-selesai" type="button" role="tab" aria-controls="nav-selesai" aria-selected="false">Selesai</button>
            </div>
        </nav>
            <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Expedisi</th>
                            <th>Estimasi</th>
                            <th>Paket</th>
                            <th>Ongkir</th>
                            <th>Subtotal</th>
                            <th>Total Bayar</th>
                            <th>Status Transaksi</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     
                    <tbody>
                        <?php
                          foreach($payment as $row):
                        ?>
                            <?php if ($row['id_pelanggan']==pelangganlogin()->id_pelanggan) { ?>
                            <tr>
                                <td><?= $row['id_transaksi'];?></td>
                                <td><?= date("d-m-Y",strtotime($row['waktu']));?></td>
                                <td><?= $row['expedisi'];?></td>
                                <td><?= $row['estimasi'];?></td>
                                <td><?= $row['paket'];?></td>
                                <td><?= rupiah($row['ongkir']);?></td>
                                <td><?= rupiah($row['subtotal']);?></td>
                                <td><?= rupiah($row['total_bayar']);?>

                                    <?php if ($row['transaction_status']== NULL) { ?>
                                        <span class="badge badge-warning">Belum Bayar</span>
                                    <?php }else if($row['transaction_status']== 'pending'){ ?>
                                         <span class="badge badge-warning">Belum Bayar</span>
                                    <?php }else if($row['transaction_status']== 'settlement'){ ?>
                                        <br><span class="badge badge-success">Sudah Bayar</span><br>
                                        <span class="badge badge-primary">Menunggu Diproses</span>
                                    <?php }?>
                                </td>

                                <td>
                                    <?php if ($row['transaction_status']=='pending') { ?>
                                        <span class="badge badge-secondary">Pending</span>
                                    <?php }else if($row['transaction_status']=='settlement') { ?>
                                        <span class="badge badge-success">Pembayaran Sukses</span>
                                    <?php }?>
                                </td>

                                <td>                                    
                                    <?php if ($row['transaction_status']== NULL) { ?>
                                        <a href="<?= base_url('Penjualan/paymentgateway/'.$row['id_transaksi']) ?>" class="btn btn-sm btn-primary" id="pay-button" name="pay-button" role="button"> Bayar</a>

                                    <?php }else {?>
                                        <a href="<?= base_url('Penjualan/detailpenjualan/'.$row['id_transaksi']) ?>" class="btn btn-sm btn-info" role="button"> <i class="fa fa-eye"></i></a>
                                        <?php if ($row['order_id']== NULL) { ?>
                                    
                                        <?php }else {?>
                                                <a href="<?= base_url('Penjualan/detailpayment/'.$row['id_transaksi']) ?>" class="btn btn-sm btn-secondary" role="button"> <i class="zmdi zmdi-eye"></i></a>
                                        <?php }?>  
                                <?php }?>
                                </td>
                            </tr>
                        <?php }?>     
                        <?php 
                          endforeach;    
                        ?>                                              
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-diproses" role="tabpanel" aria-labelledby="nav-diproses-tab">
                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Expedisi</th>
                            <th>Estimasi</th>
                            <th>Paket</th>
                            <th>Ongkir</th>
                            <th>Subtotal</th>
                            <th>Total Bayar</th>
                            <th>Status Transaksi</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                    <tbody>
                        <?php
                          foreach($getdiproses as $row):
                        ?>
                            <?php if ($row['id_pelanggan']==pelangganlogin()->id_pelanggan) { ?>
                            <tr>
                                <td><?= $row['id_transaksi'];?></td>
                                <td><?= date("d-m-Y",strtotime($row['waktu']));?></td>
                                <td><?= $row['expedisi'];?></td>
                                <td><?= $row['estimasi'];?></td>
                                <td><?= $row['paket'];?></td>
                                <td><?= rupiah($row['ongkir']);?></td>
                                <td><?= rupiah($row['subtotal']);?></td>
                                <td><?= rupiah($row['total_bayar']);?>
                              
                                    <br><span class="badge badge-success">Sudah Bayar</span><br>
                                    <span class="badge badge-primary">Sedang dikemas</span>
                               
                                </td>
                                 <td>
                                    <?php if ($row['transaction_status']=='pending') { ?>
                                        <span class="badge badge-secondary">Pending</span>
                                    <?php }else if($row['transaction_status']=='settlement') { ?>
                                        <span class="badge badge-success">Pembayaran Sukses</span>
                                    <?php }?>
                                </td>

                                <td>                                    
                                    <?php if ($row['transaction_status']== NULL) { ?>

                                    <?php }else {?>
                                        <a href="<?= base_url('Penjualan/detailpenjualan/'.$row['id_transaksi']) ?>" class="btn btn-sm btn-info" role="button"> <i class="fa fa-eye"></i></a>
                                <?php }?>
                                </td>
                            </tr>

                             <?php }?>
                        <?php
                          endforeach;    
                        ?>                                              
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-dikirim" role="tabpanel" aria-labelledby="nav-dikirim-tab">
                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Expedisi</th>
                            <th>Estimasi</th>
                            <th>Paket</th>
                            <th>Ongkir</th>
                            <th>Subtotal</th>
                            <th>Total Bayar</th>
                            <th>Status Transaksi</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                    <tbody>
                        <?php
                          foreach($getdikirim as $row):
                        ?>
                            <?php if ($row['id_pelanggan']==pelangganlogin()->id_pelanggan) { ?>
                            <tr>
                                <td><?= $row['id_transaksi'];?></td>
                                <td><?= date("d-m-Y",strtotime($row['waktu']));?></td>
                                <td><?= $row['expedisi'];?></td>
                                <td><?= $row['estimasi'];?></td>
                                <td><?= $row['paket'];?></td>
                                <td><?= rupiah($row['ongkir']);?></td>
                                <td><?= rupiah($row['subtotal']);?></td>
                                <td><?= rupiah($row['total_bayar']);?>
                              
                                    <br><span class="badge badge-success">Sudah Bayar</span><br>
                                    <span class="badge badge-primary">Sudah dikirim</span>
                               
                                </td>
                                <td>
                                    <?php if ($row['transaction_status']=='pending') { ?>
                                        <span class="badge badge-secondary">Pending</span>
                                    <?php }else if($row['transaction_status']=='settlement') { ?>
                                        <span class="badge badge-success">Pembayaran Sukses</span>
                                    <?php }?>
                                </td>

                                <td>                                    
                                    <?php if ($row['transaction_status']== NULL) { ?>

                                    <?php }else {?>
                                        <a href="<?= base_url('Penjualan/detailpenjualan/'.$row['id_transaksi']) ?>" class="btn btn-sm btn-info" role="button"> <i class="fa fa-eye"></i></a>
                                        <a href="<?= base_url('Penjualan/terimapenjualan/'.$row['id_transaksi']) ?>" class="btn btn-sm btn-primary" id="tmbh"> Diterima</a>
                                    <?php }?>
                                </td>
                            </tr>

                             <?php }?>
                        <?php
                          endforeach;    
                        ?>                                              
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-selesai" role="tabpanel" aria-labelledby="nav-selesai-tab">
               <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Expedisi</th>
                            <th>Estimasi</th>
                            <th>Paket</th>
                            <th>Ongkir</th>
                            <th>Subtotal</th>
                            <th>Total Bayar</th>
                            <th>Status Transaksi</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                    <tbody>
                        <?php
                          foreach($getditerima as $row):
                        ?>
                            <?php if ($row['id_pelanggan']==pelangganlogin()->id_pelanggan) { ?>
                            <tr>
                                <td><?= $row['id_transaksi'];?></td>
                                <td><?= date("d-m-Y",strtotime($row['waktu']));?></td>
                                <td><?= $row['expedisi'];?></td>
                                <td><?= $row['estimasi'];?></td>
                                <td><?= $row['paket'];?></td>
                                <td><?= rupiah($row['ongkir']);?></td>
                                <td><?= rupiah($row['subtotal']);?></td>
                                <td><?= rupiah($row['total_bayar']);?>
                              
                                    <br><span class="badge badge-success">Sudah Bayar</span><br>
                                    <span class="badge badge-primary">Sudah diterima</span>
                               
                                </td>
                                <td>
                                    <?php if ($row['transaction_status']=='pending') { ?>
                                        <span class="badge badge-secondary">Pending</span>
                                    <?php }else if($row['transaction_status']=='settlement') { ?>
                                        <span class="badge badge-success">Pembayaran Sukses</span>
                                    <?php }?>
                                </td>

                                <td>                                    
                                    <?php if ($row['transaction_status']== NULL) { ?>

                                    <?php }else {?>
                                        <a href="<?= base_url('Penjualan/detailpenjualan/'.$row['id_transaksi']) ?>" class="btn btn-sm btn-info" role="button"> <i class="fa fa-eye"></i></a>
                                    <?php }?>
                                </td>
                            </tr>

                             <?php }?>
                        <?php
                          endforeach;    
                        ?>                                              
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
	<br> <br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<?= $this->endSection() ?>



