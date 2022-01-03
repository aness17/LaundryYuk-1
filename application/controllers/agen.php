<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agen extends CI_Controller
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
        $this->load->model('Transaksi_model');
    }
    public function index()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin") {
            redirect('index.php/superadmin/');
        } elseif ($ci->session->userdata('id_role') == "4") {
            $where = [
                'fk_role' => '1',
                'catatan' => 'input by agen ' . $this->session->userdata('id')
            ];
            $datacs = $this->User_model->sumcs();
            $datacsagen = $this->User_model->sumcsagen($where);
            $pendapatantotal = $this->Transaksi_model->sumhargatotalagen()[0]->harga;
            $pendapatanagen = $this->Transaksi_model->sumpendapatanagen()[0]->harga;
            $datajemput = $this->Transaksi_model->selectransaksiagen('Menunggu Penjemputan');
            $dataselesai = $this->Transaksi_model->selectransaksiagen('selesai');
            $diproses = $this->Transaksi_model->selectransaksiagen('Pesanan Diproses');
            $diantar = $this->Transaksi_model->selectransaksiagen('Pesanan Diantar');
            $belumbayar = $this->Transaksi_model->sumhargabelumbayaragen()[0]->harga;
            $tabel = $this->Transaksi_model->selectagenstatus();
            $data = [
                'datacs' => $datacs,
                'datacsagen' => $datacsagen,
                'pendapatantotal' => $pendapatantotal,
                'datajemput' => $datajemput,
                'pendapatanagen' => $pendapatanagen / 10,
                'dataselesai' => $dataselesai,
                'diproses' => $diproses,
                'diantar' => $diantar,
                'belumbayar' => $belumbayar,
                'tabel' => $tabel
            ];
            $this->load->view('templates/agen/header');
            $this->load->view('templates/agen/sidebar');
            $this->load->view('templates/agen/navbar');
            $this->load->view('agen/index', $data);
            $this->load->view('templates/agen/footer');
        } elseif ($ci->session->userdata('nama') == 'outlet') {
            redirect('index.php/outlet/');
        } else {
            redirect('index.php/auth/login');
        }
    }
    public function datacs()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '4' || $ci->session->userdata('id_role') == '2') {
            echo ("Akses diblok");
        } else {
            $user = $this->User_model->selectadm(1);
            $data = [
                'user' => $user
            ];
            $this->load->view('templates/agen/header');
            $this->load->view('agen/datacustomer', $data);
            $this->load->view('templates/agen/footer');
        }
    }

    public function datacsagen()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '4' || $ci->session->userdata('id_role') == '2') {
            echo ("Akses diblok");
        } else {

            $where = [
                'fk_role' => '1',
                'catatan' => 'input by agen ' . $this->session->userdata('id')
            ];
            $user = $this->User_model->selectcs($where);

            $data = [
                'user' => $user
            ];
            $this->load->view('templates/agen/header');
            $this->load->view('agen/cs/datacsagen', $data);
            $this->load->view('templates/agen/footer');
        }
    }

    public function datapemesanan()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '4' || $ci->session->userdata('id_role') == '2') {
            echo ("Akses diblok");
        } else {
            $this->load->view('templates/agen/header');
            $this->load->view('agen/datapemesanan');
            $this->load->view('templates/agen/footer');
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

    // public function breadcomb()
    // {
    //     $crumbs = explode("/", $_SERVER["REQUEST_URI"]);
    //     $roti = [];

    //     for ($i = 0; $i < count($crumbs); $i++) {
    //         $roti[$i] = ucfirst(str_replace(array(".php", "_"), array("", " "), $crumbs[$i]) . ' ');
    //     }

    //     return array_slice($roti, 3);
    // }
    public function addcs()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '4' || $ci->session->userdata('id_role') == '2') {
            echo ("Akses diblok");
        } else {
            $this->load->view('templates/agen/header');
            $this->load->view('agen/cs/add');
            $this->load->view('templates/agen/footer');
        }
    }
    public function addpemesanan()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '4' || $ci->session->userdata('id_role') == '2') {
            echo ("Akses diblok");
        } else {
            $this->load->view('templates/agen/header');
            $this->load->view('agen/cs/pesan');
            $this->load->view('templates/agen/footer');
        }
    }
    public function getAlamatByNama()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '4' || $ci->session->userdata('id_role') == '2') {
            echo ("Akses diblok");
        } else {
            $nama = $this->input->post('nama');
            $query = $this->db->query("SELECT id_cs , alamat_cs FROM user WHERE nama_cs = '$nama'")->result_array();
            $out = $query;
            echo json_encode($out);
        }
    }
    public function adduser()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '4' || $ci->session->userdata('id_role') == '2') {
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
                        'catatan' => 'input by agen ' . $this->session->userdata('id'),
                        'fk_role' => '1'
                    ];

                    // var_dump($db);

                    if ($this->User_model->createUser($db) > 0) {
                        $this->session->set_flashdata('message_login', $this->flasher('success', 'User has been registered!'));
                    } else {
                        $this->session->set_flashdata('message_login', $this->flasher('danger', 'Failed to create User'));
                    }

                    if ($db['fk_role' == '1']) {
                        redirect('index.php/agen/datacs');
                    } else {
                        redirect('index.php/agen/datacsagen');
                    }
                }
                redirect('index.php/agen/add');
            } else {
                $this->load->view('templates/agen/header');
                //$this->load->view('templates/outlet/sidebar');
                //$this->load->view('templates/outlet/navbar');
                $this->load->view('agen/cs/add');
                $this->load->view('templates/agen/footer');
            }
        }
    }
    public function add()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '4' || $ci->session->userdata('id_role') == '2') {
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

                    if ($this->Transaksi_model->pesananAgen($db) > 0) {
                        $this->session->set_flashdata('message_login', $this->flasher('success', 'User has been registered!'));
                    } else {
                        $this->session->set_flashdata('message_login', $this->flasher('danger', 'Failed to create User'));
                    }
                    redirect('index.php/agen/datapemesanan');
                }
            } else {
                $this->load->view('templates/agen/header');
                // $this->load->view('templates/agen/sidebar');
                // $this->load->view('templates/agen/navbar');
                $this->load->view('agen/cs/pesan');
                $this->load->view('templates/agen/footer');
            }
        }
    }
    public function pendapatan()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '4' || $ci->session->userdata('id_role') == '2') {
            echo ("Akses diblok");
        } else {
            $this->load->view('templates/agen/header');
            $this->load->view('templates/agen/sidebar');
            $this->load->view('templates/agen/navbar');
            $this->load->view('agen/pendapatan');
            $this->load->view('templates/agen/footer');
        }
    }

    public function edit($id)
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '4' || $ci->session->userdata('id_role') == '2') {
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
                redirect('index.php/agen/datacsagen');
            } else {
                $this->load->view('templates/agen/header');
                $this->load->view('templates/agen/sidebar');
                $this->load->view('templates/agen/navbar');
                $this->load->view('agen/cs/edit', $data);
                $this->load->view('templates/agen/footer');
            }
        }
    }

    public function delete($id)
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '4' || $ci->session->userdata('id_role') == '2') {
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
            redirect('index.php/agen/datacsagen');
        }
    }
    public function getlayanan()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '4' || $ci->session->userdata('id_role') == '2') {
            echo ("Akses diblok");
        } else {
            $laundry = $this->input->post('jenislaundry');
            $query = $this->db->query("SELECT nama_jenis FROM jenisld WHERE satuan_jenis = '$laundry'")->result_array();
            $out = $query;
            echo json_encode($out);
        }
    }
    public function history()
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '4' || $ci->session->userdata('id_role') == '2') {
            echo ("Akses diblok");
        } else {
            $where = 'input by agen ' . $this->session->userdata('id');
            $pemesanan = $this->Transaksi_model->selecttransaksiagen($where);
            $data = [
                'pemesanan' => $pemesanan
            ];
            $this->load->view('templates/agen/header');
            $this->load->view('agen/history', $data);
            $this->load->view('templates/agen/footer');
        }
    }
    public function editpesan($id)
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '4' || $ci->session->userdata('id_role') == '2') {
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
                redirect('index.php/agen/datapemesanan');
            } else {
                $this->load->view('templates/agen/header');
                $this->load->view('templates/agen/sidebar');
                $this->load->view('templates/agen/navbar');
                $this->load->view('agen/editpesan', $data);
                $this->load->view('templates/agen/footer');
            }
        }
    }
    public function updatepemesanan($id, $ubah)
    {
        $ci = get_instance();
        if ($ci->session->userdata('nama') == "admin" || $ci->session->userdata('id_role') != '4' || $ci->session->userdata('id_role') == '2') {
            echo ("Akses diblok");
        } else {
            $d = date("Y-m-d");
            $status = '';
            if ($ubah == '1') {
                $status = 'Pesanan Diproses';
            } elseif ($ubah == '2') {
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
            redirect('index.php/agen/datapemesanan');
        }
    }
}
