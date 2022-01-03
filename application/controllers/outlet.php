<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outlet extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();

        // if (empty($this->session->userdata('id'))) {
        //     redirect('index.php/auth/login');
        // }

        $this->load->model('User_model');
        $this->load->model('Jenis_model');
        $this->load->model('Layanan_model');
        $this->load->model('Transaksi_model');
        $this->load->library('Pdf');
        $this->load->library('Excel');
    }
    public function index()
    {
        $ci = get_instance();
        if ($ci->session->userdata('id_role') == '3') {
            redirect('index.php/superadmin/');
        } elseif ($ci->session->userdata('id_role') == '4') {

            redirect('index.php/agen/');
        } elseif ($ci->session->userdata('id_role') == '2') {


            $where = [
                'fk_role' => '1',
                'catatan' => 'input by outlet ' . $this->session->userdata('id')
            ];
            $datacs = $this->User_model->sumcs();
            $datacsoutlet = $this->User_model->sumcsoutlet($where);
            $datapemesanan = $this->User_model->sumpemesanan();
            $datajemput = $this->Transaksi_model->selectstatusoutlet('Menunggu Penjemputan');
            $dataproses = $this->Transaksi_model->selectstatusoutlet('Pesanan Diproses');
            $datadiantar = $this->Transaksi_model->selectstatusoutlet('Pesanan Diantar');
            $dataselesai = $this->Transaksi_model->selectstatusoutlet('selesai');
            $datatrans = $this->Transaksi_model->selecttransaksioutlet();
            $tabel = $this->Transaksi_model->selectoutletstatus();

            $data = [
                'datacs' => $datacs,
                'datacsoutlet' => $datacsoutlet,
                'datapemesanan' => $datapemesanan,
                'datajemput' => $datajemput,
                'dataproses' => $dataproses,
                'datadiantar' => $datadiantar,
                'dataselesai' => $dataselesai,
                'datatrans' => $datatrans,
                'tabel' => $tabel

            ];

            $this->load->view('templates/outlet/header');
            $this->load->view('templates/outlet/sidebar');
            $this->load->view('templates/outlet/navbar');
            $this->load->view('outlet/index', $data);
            $this->load->view('templates/outlet/footer');
        } else {
            redirect('index.php/auth/login');
        }
    }
    public function datacs()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '2' || $ci->session->userdata('id_role') == '4') {
            echo ("Akses diblok");
        } else {
            $user = $this->User_model->selectadm(1);
            $data = [
                'user' => $user
            ];
            $this->load->view('templates/outlet/header');
            $this->load->view('templates/outlet/sidebar');
            $this->load->view('templates/outlet/navbar');
            $this->load->view('outlet/datacustomer', $data);
            $this->load->view('templates/outlet/footer');
        }
    }
    public function datacsoutlet()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '2' || $ci->session->userdata('id_role') == '4') {
            echo ("Akses diblok");
        } else {
            $where = [
                'fk_role' => '1',
                'catatan' => 'input by outlet ' . $this->session->userdata('id')
            ];
            $user = $this->User_model->selectcs($where);

            $data = [
                'user' => $user
            ];
            $this->load->view('templates/outlet/header');
            $this->load->view('templates/outlet/sidebar');
            $this->load->view('templates/outlet/navbar');
            $this->load->view('outlet/datacsoutlet', $data);
            $this->load->view('templates/outlet/footer');
        }
    }

    public function datapemesanan()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '2' || $ci->session->userdata('id_role') == '4') {
            echo ("Akses diblok");
        } else {
            // $catatan = 'input by outlet ' . $this->session->userdata('id');
            // $pemesanan = $this->Transaksi_model->selectoutlet();
            // $data = [
            //     'pemesanan' => $pemesanan
            // ];
            // var_dump($pemesanan);
            // die;
            $this->load->view('templates/outlet/header');
            $this->load->view('templates/outlet/sidebar');
            $this->load->view('templates/outlet/navbar');
            $this->load->view('outlet/datapemesanan');
            $this->load->view('templates/outlet/footer');
        }
    }

    public function logout()
    {
        $this->session->set_flashdata('message_login', $this->flasher('success', 'User has been logged out'));
        $this->session->unset_userdata('id');
        redirect('index.php/auth/login');
    }

    public function flasher($class, $message)
    {
        return
            '<div class="alert alert-' . $class . ' alert-dismissible fade show" role="alert">
                ' . $message . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }
    public function laporan()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '2' || $ci->session->userdata('id_role') == '4') {
            echo ("Akses diblok");
        } else {
            if (isset($_POST['filter']) && !empty($_POST['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
                $filter = $_POST['filter']; // Ambil data filter yang dipilih user

                if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                    $tgl = $_POST['tanggal'];

                    $ket = 'Data Transaksi Tanggal ' . date('d-m-y', strtotime($tgl));
                    // $url_cetak = 'transaksi/cetak?filter=1&tanggal=' . $tgl;
                    $transaksi = $this->Transaksi_model->view_by_date_outlet($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
                } else if ($filter == '4') { // Jika filter nya 2 (per bulan)
                    $bulan = $_POST['bulan'];
                    $arr = explode('-', $bulan);
                    $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                    $ket = 'Data Transaksi Bulan ' . $nama_bulan[intval($arr[1])] . ' ' . $arr[0];
                    // $url_cetak = 'transaksi/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $arr[0];
                    $transaksi = $this->Transaksi_model->view_by_month_outlet($bulan); // Panggil fungsi view_by_month yang ada di TransaksiModel
                } else { // Jika filter nya 3 (per tahun)
                    $tahun = $_POST['tahun'];

                    $ket = 'Data Transaksi Tahun ' . $tahun;
                    // $url_cetak = 'transaksi/cetak?filter=3&tahun=' . $tahun;
                    $transaksi = $this->Transaksi_model->view_by_year_outlet($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
                }
            } else { // Jika user tidak mengklik tombol tampilkan
                $ket = 'Semua Data Transaksi';
                // $url_cetak = 'transaksi/cetak';
                $transaksi = $this->Transaksi_model->view_outlet(); // Panggil fungsi view_all yang ada di TransaksiModel
            }

            $data['ket'] = $ket;
            // $data['url_cetak'] = base_url('index.php/' . $url_cetak);
            $data['transaksi'] = $transaksi;
            $data['option_tahun'] = $this->Transaksi_model->option_tahun();
            $this->load->view('templates/outlet/header');
            $this->load->view('templates/outlet/sidebar');
            $this->load->view('templates/outlet/navbar');
            $this->load->view('outlet/laporan', $data);
            $this->load->view('templates/outlet/footer');
        }
    }
    public function getAlamatByNama()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '2' || $ci->session->userdata('id_role') == '4') {
            echo ("Akses diblok");
        } else {
            $nama = $this->input->post('nama');
            $query = $this->db->query("SELECT id_cs , alamat_cs FROM user WHERE nama_cs = '$nama'")->result_array();
            $out = $query;
            echo json_encode($out);
        }
    }
    public function breadcomb()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '2' || $ci->session->userdata('id_role') == '4') {
            echo ("Akses diblok");
        } else {
            $crumbs = explode("/", $_SERVER["REQUEST_URI"]);
            $roti = [];

            for ($i = 0; $i < count($crumbs); $i++) {
                $roti[$i] = ucfirst(str_replace(array(".php", "_"), array("", " "), $crumbs[$i]) . ' ');
            }

            return array_slice($roti, 3);
        }
    }

    public function addpemesananoutlet()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '2' || $ci->session->userdata('id_role') == '4') {
            echo ("Akses diblok");
        } else {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            // $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            // $this->form_validation->set_rules('jenislaundry', 'Jenis laundry', 'required');
            $this->form_validation->set_rules('jenislayanan', 'Jenis layanan', 'required');
            $this->form_validation->set_rules('tanggalorder', 'Tanggal order', 'required');
            $this->form_validation->set_rules('tanggaljemput', 'Tanggal jemput', 'required');
            $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

            if ($this->form_validation->run() == true) {
                // $data = [
                $nama = $this->input->post('nama');
                $jenis = $this->input->post('jenislaundry2');
                $layanan = $this->input->post('jenislayanan');
                // ];
                $t = $this->Transaksi_model->selectnama($nama)[0];
                $s = $this->Transaksi_model->selectjenis($jenis)[0];
                $u = $this->Transaksi_model->selectlayanan($layanan)[0];

                // var_dump($s);
                // die;
                $q = $this->Transaksi_model->selectAll();
                foreach ($q as $r) {
                    if ($r['satuan_jenis'] == "Kiloan") {
                        $db = [
                            'id_cs' => $t['id_cs'],
                            'id_jenis' => '4',
                            'id_layanan' => $u['id_layanan'],
                            'tgl_order' => $this->input->post('tanggalorder'),
                            'tgl_pickup' => $this->input->post('tanggaljemput'),
                            'ket_jumlah' => $this->input->post('jumlah'),
                            'harga' => $u['harga_layanan'] * $this->input->post('jumlah'),
                            'status' => "Menunggu Penjemputan"
                        ];
                    } else {
                        $db = [
                            'id_cs' => $t['id_cs'],
                            'id_jenis' => $s['id_jenis'],
                            'id_layanan' => '2',
                            'tgl_order' => $this->input->post('tanggalorder'),
                            'tgl_pickup' => $this->input->post('tanggaljemput'),
                            'ket_jumlah' => $this->input->post('jumlah'),
                            'harga' => $s['harga_jenis'] * $this->input->post('jumlah'),
                            'status' => "Menunggu Penjemputan"

                        ];
                    }

                    // var_dump($db);
                    // die;

                    if ($this->Transaksi_model->createPesanan($db) > 0) {
                        $this->session->set_flashdata('message_login', $this->flasher('success', 'User has been registered!'));
                    } else {
                        $this->session->set_flashdata('message_login', $this->flasher('danger', 'Failed to create User'));
                    }
                    redirect('index.php/outlet/datapemesanan');
                }
            } else {
                $this->load->view('templates/outlet/header');
                $this->load->view('templates/outlet/sidebar');
                $this->load->view('templates/outlet/navbar');
                $this->load->view('outlet/cs/pesan');
                $this->load->view('templates/outlet/footer');
            }
        }
    }
    public function add()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '2' || $ci->session->userdata('id_role') == '4') {
            echo ("Akses diblok");
        } else {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email_cs]');
            $this->form_validation->set_rules('passwd', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('nohp', 'No Handphone', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');

            if ($this->form_validation->run() == true) {
                $email = $this->input->post('email');
                $pos = strpos($email, "@gmail.com") ? "ada" : "tidak ada";
                if ($pos == "tidak ada") {
                    echo "<script>alert('harus gugel bund');history.go(-1);</script>";
                    $this->session->set_flashdata('message_login', $this->flasher('danger', 'HARUS AKUN GUGEL'));
                } else {
                    $db = [
                        'nama_cs' => $this->input->post('nama'),
                        'email_cs' => $this->input->post('email'),
                        'passwd_cs' => password_hash($this->input->post('passwd'), PASSWORD_DEFAULT),
                        'nohp_cs' => $this->input->post('nohp'),
                        'alamat_cs' => $this->input->post('alamat'),
                        'catatan' => 'input by outlet ' . $this->session->userdata('id'),
                        'fk_role' => '1'
                    ];

                    // var_dump($db);

                    if ($this->User_model->createUser($db) > 0) {
                        $this->session->set_flashdata('message_login', $this->flasher('success', 'User has been registered!'));
                    } else {
                        $this->session->set_flashdata('message_login', $this->flasher('danger', 'Failed to create User'));
                    }

                    redirect('index.php/outlet/datacsoutlet');
                }
                redirect('index.php/outlet/add');
            } else {
                $this->load->view('templates/outlet/header');
                $this->load->view('templates/outlet/sidebar');
                $this->load->view('templates/outlet/navbar');
                $this->load->view('outlet/cs/add');
                $this->load->view('templates/outlet/footer');
            }
        }
    }
    public function updatepemesanan($id, $ubah)
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '2' || $ci->session->userdata('id_role') == '4') {
            echo ("Akses diblok");
        } else {
            $d = date("Y-m-d");
            $status = '';
            if ($ubah == '1') {
                $status = 'Pesanan Diproses';
            } elseif ($ubah == '4') {
                $status = 'Pesanan Diantar';
                $tgl_antar = $d;
            } else {
                $status = 'selesai';
                $tgl_antar = $d;
            }

            $db = [
                'status' => $status,
                'tgl_antar' => $tgl_antar
            ];

            $this->Transaksi_model->update($db, $id);
            redirect('index.php/outlet/datapemesanan');
        }
    }
    public function history()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '2' || $ci->session->userdata('id_role') == '4') {
            echo ("Akses diblok");
        } else {
            $pemesanan = $this->Transaksi_model->selectoutlet();
            $data = [
                'pemesanan' => $pemesanan
            ];

            $this->load->view('templates/outlet/header');
            $this->load->view('templates/outlet/sidebar');
            $this->load->view('templates/outlet/navbar');
            $this->load->view('outlet/history', $data);
            $this->load->view('templates/outlet/footer');
        }
    }


    public function edit($id)
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '2' || $ci->session->userdata('id_role') == '4') {
            echo ("Akses diblok");
        } else {
            $this->form_validation->set_rules('nama', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('nohp', 'No Handphone', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('passwd', 'Password', 'required|min_length[6]');

            $users = $this->User_model->getUserById($id);
            $data = [
                'users' => $users
            ];

            if ($this->form_validation->run() == true) {
                $db = [
                    'id_cs' => $id,
                    'nama_cs' => $this->input->post('nama'),
                    'email_cs' => $this->input->post('email'),
                    'passwd_cs' => password_hash($this->input->post('passwd'), PASSWORD_DEFAULT),
                    'nohp_cs' => $this->input->post('nohp'),
                    'alamat_cs' => $this->input->post('alamat'),
                ];

                if ($this->User_model->updateUser($db) > 0) {
                    $this->session->set_flashdata('message', $this->flasher('success', 'Success To Edit Data'));
                } else {
                    $this->session->set_flashdata('message', $this->flasher('danger', 'Failed To Edit Data'));
                }
                redirect('index.php/outlet/datacsoutlet');
            } else {
                $this->load->view('templates/outlet/header');
                $this->load->view('templates/outlet/sidebar');
                $this->load->view('templates/outlet/navbar');
                $this->load->view('outlet/cs/edit', $data);
                $this->load->view('templates/outlet/footer');
            }
        }
    }
    public function editpesan($id)
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '2' || $ci->session->userdata('id_role') == '4') {
            echo ("Akses diblok");
        } else {
            $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

            $users = $this->Transaksi_model->getUserById($id);
            $data = [
                'users' => $users
            ];

            if ($this->form_validation->run() == true) {
                $q = $this->Transaksi_model->selectedit($id);
                foreach ($q as $r) {
                    if ($r['satuan_jenis'] == "Kiloan") {
                        $db = [
                            'id_transaksi' => $id,
                            'ket_jumlah' => $this->input->post('jumlah'),
                            'harga' => $r['harga_layanan'] * $this->input->post('jumlah')
                        ];
                    } else {
                        $db = [
                            'id_transaksi' => $id,
                            'ket_jumlah' => $this->input->post('jumlah'),
                            'harga' => $r['harga_jenis'] * $this->input->post('jumlah')
                        ];
                    }
                }
                // var_dump($q);die;
                if ($this->Transaksi_model->updatePesanan($db, $id) > 0) {
                    $this->session->set_flashdata('message', $this->flasher('success', 'Success To Edit Data'));
                } else {
                    $this->session->set_flashdata('message', $this->flasher('danger', 'Failed To Edit Data'));
                }
                redirect('index.php/outlet/datapemesanan');
            } else {
                $this->load->view('templates/outlet/header');
                $this->load->view('templates/outlet/sidebar');
                $this->load->view('templates/outlet/navbar');
                $this->load->view('outlet/editpesan', $data);
                $this->load->view('templates/outlet/footer');
            }
        }
    }

    public function delete($id)
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '2' || $ci->session->userdata('id_role') == '4') {
            echo ("Akses diblok");
        } else {
            if ($id) {
                if ($this->User_model->deleteUser($id) > 0) {
                    $this->session->set_flashdata('message', $this->flasher('success', 'Success To Add Data'));
                } else {
                    $this->session->set_flashdata('message', $this->flasher('danger', 'Failed To Add Data'));
                }
            } else {
                $this->session->set_flashdata('message', $this->flasher('danger', 'Id Is null'));
            }
            redirect('index.php/outlet/datacsoutlet');
        }
    }

    public function cetak($filter, $date)
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '2' || $ci->session->userdata('id_role') == '4') {
            echo ("Akses diblok");
        } else {
            $table = [
                "No",
                "Nama Customer",
                "Alamat",
                "Jenis Laundry",
                "Jenis Layanan",
                "Tgl Order",
                "Tgl Jemput",
                "Tgl Antar",
                "Jumlah",
                "Harga",
                "Status",
            ];

            $judul = "Laporan Transaksi Laundry";
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Laporan ' . $judul);
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->setPrintHeader(false);
            $pdf->SetAuthor('PCR');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $transaksi = $this->Transaksi_model->view_by_date_outlet($date); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '4') { // Jika filter nya 2 (per bulan)
                $transaksi = $this->Transaksi_model->view_by_month_outlet($date); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $transaksi = $this->Transaksi_model->view_by_year_outlet($date); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
            $html = "<h3>$judul</h3>";

            $html .= '<table cellpadding="5" border="0.5">
                        <tr>';
            foreach ($table as $col) {
                $html .= "<th align='center'><b>" . $col . "</b></th>";
            }
            $html .= '</tr>';
            // <th width="45%" align="center"><b>Nama Sampah</b></th>
            // <th width="15%" align="center"><b>Total Berat</b></th>
            // <th width="10%" align="center"><b>Satuan</b></th>
            // <th width="20%" align="center"><b>Total Harga</b></th>
            $no = 1;


            foreach ($transaksi as $data) {
                $html .= '<tr align="center">
                                <td>' . $no++ . '</td>
                                <td>' . $data->nama_cs . '</td>
                                <td>' . $data->alamat_cs . '</td>
                                <td>' . $data->nama_jenis . '</td>
                                <td>' . $data->nama_layanan . '</td>
                                <td>' . $data->tgl_order . '</td>
                                <td>' . $data->tgl_pickup . '</td>
                                <td>' . $data->tgl_antar . '</td>
                                <td>' . $data->ket_jumlah . '</td>
                                <td>' . $data->harga . '</td>
                                <td>' . $data->status . '</td>
                            </tr>';
            }
            $html .= '</table>';

            $pdf->writeHTML($html, true, 0, true, 0);
            $pdf->Output('Laporan Transaksi Laundry.pdf', 'I');
        }
    }

    public function cetakexcel($filter, $date)
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '2' || $ci->session->userdata('id_role') == '4') {
            echo ("Akses diblok");
        } else {
            $table = [
                ["alphabet" => "A", "column" => "No"],
                ["alphabet" => "B", "column" => "Nama Customer"],
                ["alphabet" => "C", "column" => "Alamat"],
                ["alphabet" => "D", "column" => "Jenis Laundry"],
                ["alphabet" => "E", "column" => "Jenis Layanan"],
                ["alphabet" => "F", "column" => "Tgl Order"],
                ["alphabet" => "G", "column" => "Tgl Jemput"],
                ["alphabet" => "H", "column" => "Tgl Antar"],
                ["alphabet" => "I", "column" => "Jumlah"],
                ["alphabet" => "J", "column" => "Harga"],
                ["alphabet" => "K", "column" => "Status"],
            ];

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $transaksi = $this->Transaksi_model->view_by_date_outlet($date); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '4') { // Jika filter nya 2 (per bulan)
                $transaksi = $this->Transaksi_model->view_by_month_outlet($date); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $transaksi = $this->Transaksi_model->view_by_year_outlet($date); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
            $excel = new PHPExcel();
            // Settingan awal fil excel
            $excel->getProperties()->setCreator('PCR')
                ->setTitle("Laporan Transaksi Laundry")
                ->setSubject("Transaksi")
                ->setDescription("Laporan Transaksi Laundry");
            // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
            $style_col = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );
            // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = array(
                'alignment' => array(
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );
            // $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
            // $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
            // $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
            // $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

            $numrow = 1;

            foreach ($table as $value) {
                $excel->setActiveSheetIndex(0)->setCellValue($value["alphabet"] . $numrow, $value["column"]);
                $excel->getActiveSheet()->getStyle($value["alphabet"] . $numrow)->applyFromArray($style_col);
            }
            $numrow++;
            $no = 1;

            foreach ($transaksi as $data) { // Lakukan looping pada variabel siswa
                $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
                $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->nama_cs);
                $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->alamat_cs);
                $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->nama_jenis);
                $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->nama_layanan);
                $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->tgl_order);
                $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->tgl_pickup);
                $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->tgl_antar);
                $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->ket_jumlah);
                $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->harga);
                $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->status);
                foreach ($table as $value) {
                    $excel->getActiveSheet()->getStyle($value["alphabet"] . $numrow)->applyFromArray($style_row);
                }
                $no++;
                $numrow++;

                // echo $numrow;

            }

            foreach ($table as $value) {
                $excel->getActiveSheet()->getColumnDimension($value['alphabet'])->setAutoSize(true);
            }

            // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
            // Set judul file excel nya
            $excel->getActiveSheet(0)->setTitle("Laporan Laundry");
            $excel->setActiveSheetIndex(0);
            // Proses file excel
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            // header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="Laporan Transaksi Laundry.xlsx"'); // Set nama file excel nya
            header('Cache-Control: max-age=0');
            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
            ob_end_clean();
            $write->save('php://output');
            // var_dump($transaksi);

            // echo "a", "b", "c", "d";
        }
    }
}
