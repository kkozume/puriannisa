<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- import bootstrap  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    
    <body>
        <br>
        <!-- membuat container dengan lebar colomn col-lg-10  -->
        <div class="container col-lg-10">
            <!-- membuat tulisan alert berwarna hijau dengan tulisan di tengah  -->
            <h3 class="alert alert-success text-center" role="alert">
                Tutorial Modal Edit Data Dinamis
            </h3>
            <br>
            <!-- membuat card untuk membungkus tabel bootstrap  -->
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <!-- set table header  -->
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Deskripsi Barang</th>
                                <th scope="col">Jenis Barang</th>
                                <th scope="col">Harga Barang</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // membuat koneksi ke database 
                                $koneksi = mysqli_connect("localhost", "root", "", "latihan");
    
                                //membuat variabel angka
                                $no = 1;
    
                                //mengambil data dari tabel barang
                                $select         = mysqli_query($koneksi, "select * from barang");
    
                                //melooping(perulangan) dengan menggunakan while
                                while($data= mysqli_fetch_array($select)){
                            ?>
                            <tr>
    
                                <!-- menampilkan data dengan menggunakan array  -->
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama_barang']; ?></td>
                                <td><?php echo $data['deskripsi_barang']; ?></td>
                                <td><?php echo $data['jenis_barang']; ?></td>
                                <td><?php echo $data['harga_barang']; ?></td>
                                <td>
    
                                    <!-- tombol edit dan modal akan dibuat disini -->
                                    
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
    </body>
    
    </html>
    