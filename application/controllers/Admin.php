<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) {
            redirect('welcome/admin');
        }
    }

    public function index()
    {

        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user']['email']) {
            $this->load->view('admin/template/header');
            $this->load->view('admin/index', $data);
            $this->load->view('admin/template/footer');
        } else {
            redirect('user');
        }

    }

    // Management Siswa

    public function add_siswa()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[2]', [
            'required' => 'Harap isi kolom username.',
            'min_length' => 'Nama terlalu pendek.',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Harap isi kolom email.',
            'valid_email' => 'Masukan email yang valid.',
        ]);
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim', [
            'required' => 'Harap isi kolom NIM.',
        ]);
        $this->form_validation->set_rules('password', 'password', 'required', [
            'required' => 'Harap isi kolom Password.',
        ]);
        $this->form_validation->set_rules('conf_pass', 'confirm password', 'required|matches[password]');

        if($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="error" style="font-color: red;">', '</div>');
            
            $this->load->view('admin/template/header');
            $this->load->view('admin/add_siswa');
            $this->load->view('admin/template/footer');
        }

        else {
            $pass = $this->input->post('password');

            $profil = array(
            'nama' => $this->input->post('nama'),
            'nis' => $this->input->post('nim'),
            'email' => $this->input->post('email'),
            'jenis_kelamin' => $this->input->post('jk'),
            'tahun_masuk' => $this->input->post('tahun'),
            'alamat' => $this->input->post('alamat'),
            'password' => password_hash($pass, PASSWORD_DEFAULT),
        );
            $this->db->insert('el_siswa', $profil);

            $this->session->set_flashdata('success-edit', 'berhasil');
            redirect('admin/data_siswa');
        }
    }

    public function data_siswa()
    {
        $this->load->model('m_siswa');

        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['user'] = $this->m_siswa->tampil_data()->result();
        $this->load->view('admin/template/header');
        $this->load->view('admin/data_siswa', $data);
        $this->load->view('admin/template/footer');

    }

    public function detail_siswa($id)
    {
        $this->load->model('m_siswa');
        $where = array('id' => $id);
        $detail = $this->m_siswa->detail_siswa($id);
        $data['detail'] = $detail;
        $this->load->view('admin/template/header');
        $this->load->view('admin/detail_siswa', $data);
        $this->load->view('admin/template/footer');
    }

    public function update_siswa($id)
    {
        $this->load->model('m_siswa');
        $where = array('id' => $id);
        $detail = $this->m_siswa->detail_siswa($id);
        $data['detail'] = $detail;
        
        $this->load->view('admin/template/header');
        $this->load->view('admin/update_siswa', $data);
        $this->load->view('admin/template/footer');
    }

    public function user_edit()
    {
        $this->load->model('m_siswa');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[2]', [
            'required' => 'Harap isi kolom username.',
            'min_length' => 'Nama terlalu pendek.',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Harap isi kolom email.',
            'valid_email' => 'Masukan email yang valid.',
        ]);
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim', [
            'required' => 'Harap isi kolom NIM.',
        ]);

        if($this->form_validation->run() == false) {
            $id = $this->input->post('id');
            $detail = $this->m_siswa->detail_siswa($id);
            $data['detail'] = $detail;
            $this->form_validation->set_error_delimiters('<div class="error" style="font-color: red;">', '</div>');
            
            $this->load->view('admin/template/header');
            $this->load->view('admin/update_siswa', $data);
            $this->load->view('admin/template/footer');
        }

        else {

            $profil = array(
            'nama' => $this->input->post('nama'),
            'nis' => $this->input->post('nim'),
            'email' => $this->input->post('email'),
            'jenis_kelamin' => $this->input->post('jk'),
            'tahun_masuk' => $this->input->post('tahun'),
            'alamat' => $this->input->post('alamat'),
        );
            $id = $this->input->post('id');
            $this->m_siswa->update_data(array('id'=>$id), $profil, 'el_siswa');

            $this->session->set_flashdata('success-edit', 'berhasil');
            redirect('admin/data_siswa');
        }


    }

    public function delete_siswa($id)
    {
        $this->load->model('m_siswa');
        $where = array('id' => $id);
        $this->m_siswa->delete_siswa($where, 'el_siswa');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('admin/data_siswa');
    }

    public function update_materi($id)
    {
        $this->load->model('m_materi');
        $where = array('id' => $id);
        $data['user'] = $this->m_materi->update_materi($where, 'el_materi')->result();

        $data2['mapel'] = $this->m_materi->tampil_mapel()->result();

        $this->load->view('admin/template/header');
        $this->load->view('admin/update_materi', $data, $data2);
        $this->load->view('admin/template/footer');
    }

    public function materi_edit()
    {
        $this->load->model('m_materi');

        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $mapel = $this->input->post('bagian');
        $konten = $this->input->post('konten');

        $data = array(
            'judul' => $judul,
            'mapel_id' => $mapel,
            'konten' => $konten,

        );

        $where = array(
            'id' => $id,
        );

        $this->m_materi->update_data($where, $data, 'el_materi');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('admin/data_materi');

    }

    //manajemen materi

    public function data_materi()
    {
        $this->load->model('m_materi');

        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['user'] = $this->m_materi->tampil_data()->result();
        $this->load->view('admin/template/header');
        $this->load->view('admin/data_materi', $data);
        $this->load->view('admin/template/footer');

    }

    public function delete_materi($id)
    {
        $this->load->model('m_materi');
        $where = array('id' => $id);
        $this->m_materi->delete_materi($where, 'el_materi');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('admin/data_materi');
    }

    public function tambah_materi() {
        $this->load->model('m_materi');

        $data['mapel'] = $this->m_materi->tampil_mapel()->result();

        $this->load->view('admin/template/header');
        $this->load->view('admin/add_materi', $data);
        $this->load->view('admin/template/footer');
    }

    public function input_materi()
    {

        $this->load->model('m_materi');

        $judul = $this->input->post('judul');
        $mapel = $this->input->post('bagian');
        $konten = $this->input->post('konten');

        $data = array(
            'judul' => $judul,
            'mapel_id' => $mapel,
            'konten' => $konten,

        );

        $this->db->insert('el_materi', $data);
        $this->session->set_flashdata('success-reg', 'Berhasil!');
        redirect(base_url('admin/data_materi'));
    }

    public function data_tugas()
    {
        $this->load->model('m_tugas');

        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['tugas'] = $this->m_tugas->tampil_data()->result();
        $this->load->view('admin/template/header');
        $this->load->view('admin/data_tugas', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah_tugas() {
        $this->load->model('m_materi');

        $data['mapel'] = $this->m_materi->tampil_mapel()->result();

        $this->load->view('admin/template/header');
        $this->load->view('admin/add_tugas', $data);
        $this->load->view('admin/template/footer');
    }

    public function input_tugas()
    {

        $this->load->model('m_tugas');

        $judul = $this->input->post('judul');
        $mapel = $this->input->post('bagian');
        $konten = $this->input->post('konten');
        $tipe = $this->input->post('tipe');

        $data = array(
            'judul' => $judul,
            'mapel_id' => $mapel,
            'info' => $konten,
            'type_id' => $tipe,

        );

        $this->db->insert('el_tugas', $data);
        $this->session->set_flashdata('success-reg', 'Berhasil!');
        redirect(base_url('admin/data_tugas'));
    }

    public function update_tugas($id)
    {
        $this->load->model('m_tugas');
        $where = array('id' => $id);
        $data['tugas'] = $this->m_tugas->update_tugas($where, 'el_tugas')->result();

        // $data['mapel'] = $this->m_tugas->tampil_mapel()->result();

        $this->load->view('admin/template/header');
        $this->load->view('admin/update_tugas', $data);
        $this->load->view('admin/template/footer');
    }

    public function cek_tugas()
    {
        $this->load->model('m_tugas');
        $this->load->model('m_siswa');

        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['jawaban'] = $this->m_tugas->tampil_jawaban()->result();
        $this->load->view('admin/template/header');
        $this->load->view('admin/data_jawaban', $data);
        $this->load->view('admin/template/footer');
    }

    public function nilai($id){

        $this->load->library('form_validation');
        $this->load->model("m_tugas");

        $where = array('id' => $id);

        $nilai = array(
            'nilai' => $this->input->post("nilai"),
            'catatan' => $this->input->post("catatan"),
            'status' => 'Sudah Dinilai'
        );
        $this->m_tugas->update_nilai($where, $nilai);
        $this->session->set_flashdata('success-reg', 'Berhasil!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function data_angket()
    {
        $this->load->model('m_angket');

        $data['angket'] = $this->m_angket->fetch_data();

        $this->load->view('admin/template/header');
        $this->load->view('admin/data_angket', $data);
        $this->load->view('admin/template/footer');
    }

    public function delete_angket($id)
    {
        $this->load->model('m_angket');
        $where = array('id' => $id);
        $this->m_angket->delete_angket($where);
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('admin/data_angket');
    }

    public function tambah_angket() {
        $this->load->model('m_angket');

        $this->load->view('admin/template/header');
        $this->load->view('admin/add_angket');
        $this->load->view('admin/template/footer');
    }

    public function input_angket()
    {

        $this->load->model('m_angket');
        
        $judul = $this->input->post('judul');
        
        $data = array(
            'judul' => $judul,
        );

        $this->db->insert('el_angket', $data);
        $this->session->set_flashdata('success-reg', 'Berhasil!');
        redirect(base_url('admin/data_angket'));
    }

    public function angket_edit()
    {
        $this->load->model('m_angket');

        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        
        $data = array(
            'judul' => $judul,
        );

        $where = array(
            'id' => $id,
        );

        $this->m_angket->update_data($where, $data, 'el_angket');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('admin/data_angket');

    }

    public function tambah_desk($id) {
        $this->load->model('m_angket');

        $data['angket'] = $this->m_angket->data_angket($id);
        $data['isi'] = $this->m_angket->ambil_data($id);

        $this->load->view('admin/template/header');
        $this->load->view('admin/tambah_desk', $data);
        $this->load->view('admin/template/footer');
    }

    public function input_desk()
    {

        $this->load->model('m_angket');

        $angket_id = $this->input->post('id');
        $konten = $this->input->post('konten');

        $data = array(
            
            'angket_id' => $angket_id,
            'nomor_id' => 0,
            'pertanyaan' => $konten,

        );

        $this->db->where(['angket_id' => $angket_id, 'nomor_id' => 0]);
        $q = $this->db->get('el_isi_angket');

        if ($q->num_rows() > 0) {
            $this->m_angket->update_data(['angket_id' => $angket_id, 'nomor_id' => 0], $data, 'el_isi_angket');    
        } else {
            $this->db->insert('el_isi_angket', $data);
        }
        $this->session->set_flashdata('success-reg', 'Berhasil!');
        redirect(base_url('admin/data_angket'));
    }

    public function list_pernyataan($id) {
        $this->load->model('m_angket');

        $data['angket'] = $this->m_angket->data_angket($id);
        $data['isi'] = $this->m_angket->ambil_data($id);

        $this->load->view('admin/template/header');
        $this->load->view('admin/data_pernyataan', $data);
        $this->load->view('admin/template/footer');
    }

    public function pernyataan_edit()
    {
        $this->load->model('m_angket');

        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        
        $data = array(
            'pertanyaan' => $judul,
        );

        $where = array(
            'id' => $id,
        );

        $this->m_angket->update_data($where, $data, 'el_isi_angket');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect($_SERVER['HTTP_REFERER']);

    }

    public function add_pernyataan()
    {

        $this->load->model('m_angket');
        
        $data = array(
            'angket_id'  => $this->input->post('id'),
            'nomor_id'   => $this->input->post('nomor'),
            'pertanyaan' => $this->input->post('judul'),
        );

        $this->db->insert('el_isi_angket', $data);
        $this->session->set_flashdata('success-reg', 'Berhasil!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete_pernyataan($id)
    {
        $this->load->model('m_angket');
        $where = array('id' => $id);
        $this->m_angket->delete_pernyataan($where);
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function angket_jawab($id)
    {
        $this->load->model('m_angket');
        $this->load->model('m_siswa');
        $data['angket'] = $this->m_angket->data_angket($id);
        $data['isi'] = $this->m_angket->ambil_data($id);
        $data['jawaban'] = $this->m_angket->ambil_jawaban($id);

        $this->load->view('admin/template/header');
        $this->load->view('admin/data_jawaban_angket', $data);
        $this->load->view('admin/template/footer');
    }

}