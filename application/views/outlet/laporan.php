<!-- <?php phpinfo(); ?> -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800">Laporan</h1>
        </div>
        <form method="post" action="">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label>Filter Berdasarkan</label><br>
                    <select name="filter" id="filter">
                        <option value="1">Tanggal</option>
                        <option value="2">Bulan</option>
                        <option value="3">Tahun</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <div id="form-tanggal">
                            <label>Tanggal</label><br>
                            <input type="date" name="tanggal" id="tanggal" class="input-tanggal" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <div id="form-bulan">
                            <label>Bulan</label><br>
                            <input type="month" name="bulan" id="bulan" class="input-bulan" />

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <div id="form-tahun">
                            <label>Tahun</label><br>
                            <select name="tahun" id="tahun">
                                <option value="">Pilih</option>
                                <?php
                                foreach ($option_tahun as $data) { // Ambil data tahun dari model yang dikirim dari controller
                                    echo '<option value="' . $data->tahun . '">' . $data->tahun . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-lg-4 mb-4 ">
                <button type="submit" id="tombol" disabled>Tampilkan</button>
            </div>
        </form>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800"><?php echo $ket; ?></h1>
        </div>
        <br />
        <div class="col-lg">
            <button type="submit" class="h4 mb-2 text-gray-800" id="cetak">CETAK PDF</button>
            <button type="submit" class="h4 mb-2 text-gray-800" id="cetakexcel">CETAK EXCEL</button>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" cellspacing="0">
                    <thead>
                        <tr style="text-align: center;">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Laundry</th>
                            <th>Jenis Layanan</th>
                            <th>Tgl Order</th>
                            <th>Tgl Jemput</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php
                    if (!empty($transaksi)) {
                        $no = 1;


                        foreach ($transaksi as $data) {
                            $keterangan = "";
                            if ($data->status == 'Menunggu Penjemputan') {
                                $keterangan = "warning";
                            } elseif ($data->status == 'Pesanan Diproses') {
                                $keterangan = "secondary";
                            } elseif ($data->status == 'Pesanan Diantar') {
                                $keterangan = "primary";
                            } else {
                                $keterangan = "success";
                            }
                            $tgl_order = date('d-m-Y', strtotime($data->tgl_order));

                            echo "<tr style='text-align: center;'>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $data->nama_cs . "</td>";
                            echo "<td>" . $data->alamat_cs . "</td>";
                            echo "<td>" . $data->nama_jenis . "</td>";
                            echo "<td>" . $data->nama_layanan . "</td>";
                            echo "<td>" . $tgl_order . "</td>";
                            echo "<td>" . $data->tgl_pickup . "</td>";
                            echo "<td>" . $data->ket_jumlah . "</td>";
                            echo "<td>Rp" . number_format($data->harga, 0, ",", ".") . "</td>";
                            echo "<td class='alert alert-$keterangan'>" . $data->status . "</td>";
                            echo "</tr>";
                            $no++;
                        }
                    }
                    ?>

                    <script>
                        const formtanggal = document.getElementById("form-tanggal")
                        const formbulan = document.getElementById("form-bulan")
                        const formtahun = document.getElementById("form-tahun")
                        const filter = document.getElementById("filter")
                        const tombol = document.getElementById("tombol")
                        const cetak = document.getElementById("cetak")
                        const cetakexcel = document.getElementById("cetakexcel")
                        const tanggal = document.getElementById("tanggal")
                        const bulan = document.getElementById("bulan")
                        const tahun = document.getElementById("tahun")

                        formtanggal.addEventListener("change", (e) => {
                            e.preventDefault()
                            tombol.disabled = (e.target.value == null)
                        })
                        formbulan.addEventListener("change", (e) => {
                            e.preventDefault()
                            tombol.disabled = (e.target.value == null)
                        })
                        formtahun.addEventListener("change", (e) => {
                            e.preventDefault()
                            tombol.disabled = (e.target.value == "")
                        })

                        cetak.addEventListener("click", (e) => {
                            console.log(`<?= base_url() ?>index.php/outlet/cetak/${sessionStorage.getItem('filter')}/${sessionStorage.getItem('date')}`)
                            location.href = `<?= base_url() ?>index.php/outlet/cetak/${sessionStorage.getItem('filter')}/${sessionStorage.getItem('date')}`
                        })
                        cetakexcel.addEventListener("click", (e) => {
                            console.log(`<?= base_url() ?>index.php/outlet/cetakexcel/${sessionStorage.getItem('filter')}/${sessionStorage.getItem('date')}`)
                            location.href = `<?= base_url() ?>index.php/outlet/cetakexcel/${sessionStorage.getItem('filter')}/${sessionStorage.getItem('date')}`
                        })
                        tombol.addEventListener("click", (e) => {
                            const a = filter.value
                            let date = ''

                            if (a == '1') { // Jika filter nya 1 (per tanggal)
                                date = tanggal.value
                            } else if (a == '2') { // Jika filter nya 2 (per bulan)
                                date = bulan.value
                            } else if (a == '3') { // Jika filternya 3 (per tahun)
                                date = tahun.value
                            }
                            sessionStorage.setItem('date', date)
                            sessionStorage.setItem('filter', a)

                        })

                        formbulan.style.display = "none"
                        formtahun.style.display = "none"

                        // sessionStorage.setItem('filter', '1')

                        filter.addEventListener("change", (e) => {
                            e.preventDefault()
                            const q = e.target.value
                            formtanggal.style.display = "none"
                            formbulan.style.display = "none"
                            formtahun.style.display = "none"
                            sessionStorage.setItem('filter', q)


                            if (q == '1') { // Jika filter nya 1 (per tanggal)
                                formtanggal.style.display = "block"
                            } else if (q == '2') { // Jika filter nya 2 (per bulan)
                                formbulan.style.display = "block"
                            } else if (q == '3') { // Jika filternya 3 (per tahun)
                                formtahun.style.display = "block"
                            }
                        })
                    </script>
                    <!-- <script>
                        $(document).ready(function() { // Ketika halaman selesai di load
                            $('.input-tanggal').datepicker({
                                dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
                            });

                            $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

                            $('#filter').change(function() { // Ketika user memilih filter
                                if (q == '1') { // Jika filter nya 1 (per tanggal)
                                    $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                                    $('#form-tanggal').show(); // Tampilkan form tanggal
                                } else if (q == '2') { // Jika filter nya 2 (per bulan)
                                    $('#form-tanggal').hide(); // Sembunyikan form tanggal
                                    $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
                                } else { // Jika filternya 3 (per tahun)
                                    $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                                    $('#form-tahun').show(); // Tampilkan form tahun
                                }

                                $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
                            })
                        })
                    </script> -->
                </table>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>