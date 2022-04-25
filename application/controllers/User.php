<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
        redirect('welcome');
        }
        $this->load->model('m_siswa');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('el_siswa', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('template/navuser');
        $this->load->view('user/index');
        $this->load->view('template/footer');
    }

    public function pendahuluan()
    {
        $this->load->model('m_materi');
        $data['user'] = $this->db->get_where('el_siswa', ['email' =>
            $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->m_materi->pendahuluan()->result();

        $this->load->view('template/navuser');
        $this->load->view('user/pendahuluan', $data);
        $this->load->view('template/footer');
    }

    public function penyajian()
    {
        $data['user'] = $this->db->get_where('el_siswa', ['email' =>
            $this->session->userdata('email')])->row_array();
        $this->load->view('template/navuser');
        $this->load->view('user/penyajian');
        $this->load->view('template/footer');
    }

    public function penutup()
    {
        $data['user'] = $this->db->get_where('el_siswa', ['email' =>
            $this->session->userdata('email')])->row_array();
        $user_id = $data['user']['id'];

        $this->load->model('m_tugas');
        $data['tugas'] = $this->m_tugas->tampil_data()->result();

        $this->load->model("m_angket");
        $data["angket"] = $this->m_angket->fetch_data();

        $this->load->view('template/navuser');
        $this->load->view('user/penutup', $data);
        $this->load->view('template/footer');
    }

    public function registration()
    {
        $this->load->view('user/registration');
        $this->load->view('template/footer');
    }

    public function registration_act()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom username.',
            'min_length' => 'Nama terlalu pendek.',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[el_siswa.email]', [
            'is_unique' => 'Email ini telah digunakan!',
            'required' => 'Harap isi kolom email.',
            'valid_email' => 'Masukan email yang valid.',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[retype_password]', [
            'required' => 'Harap isi kolom Password.',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek',
        ]);
        $this->form_validation->set_rules('retype_password', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Password tidak sama!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/nav');
            $this->load->view('user/registration');
            $this->load->view('template/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'status_id' => 1,
                'date_created' => time(),
            ];

            //siapkan token

            // $token = base64_encode(random_bytes(32));
            // $user_token = [
            //     'email' => $email,
            //     'token' => $token,
            //     'date_created' => time(),
            // ];

            $this->db->insert('el_siswa', $data);
            // $this->db->insert('token', $user_token);

            // $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('welcome'));
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ini email disini',
            'smtp_pass' => 'Isi Password gmail disini',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->email->initialize($config);

        $data = array(
            'name' => 'syauqi',
            'link' => ' ' . base_url() . 'welcome/verify?email=' . $this->input->post('email') . '& token' . urlencode($token) . '"',
        );

        $this->email->from('alrasyidjauhari@gmail.com', 'E-Module Statistika');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $link =
            $this->email->subject('Verifikasi Akun');
            $body = $this->load->view('template/email-template.php', $data, true);
            $this->email->message($body);
        } else {
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }


    public function profil() {
        $this->load->model('m_siswa');

        $data['sis'] = $this->db->get_where('el_siswa', ['email' => $this->session->userdata('email')])->row_array();
        $id = $data['sis']['id'];
        $detail = $this->m_siswa->detail_siswa($id);
        $data['detail'] = $detail;

        $this->load->view('template/navuser'); 
        $this->load->view('user/profil', $data);
        $this->load->view('template/footer');
    }

    public function ubahPass() {
        $this->load->library('form_validation');
        $sis = $this->db->get_where('el_siswa', ['email' => $this->session->userdata('email')])->row_array();
        $id = $sis['id'];

        $this->form_validation->set_rules('oldpass', 'old password', 'callback_password_check');
        $this->form_validation->set_rules('newpass', 'new password', 'required');
        $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[newpass]');


        if($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->load->view('template/navuser');
            $this->load->view('user/change_password');
        }
        else {

            $newpass = $this->input->post('newpass');

            $this->m_siswa->update_data(array('id'=>$id), array('password' => password_hash($newpass, PASSWORD_DEFAULT)), 'el_siswa');

            redirect('user/profil');
        }
    }

    public function password_check($oldpass)
    {
        $sis = $this->db->get_where('el_siswa', ['email' => $this->session->userdata('email')])->row_array();
        $id = $sis['id'];
        $user = $this->m_siswa->detail_siswa($id);
        $pass = $user->password;

        if(!password_verify($oldpass, $pass)) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }

        return true;
    }

    public function ubahProfil()
    {
        $this->load->library('form_validation');
        $sis = $this->db->get_where('el_siswa', ['email' => $this->session->userdata('email')])->row_array();
        $id = $sis['id'];
        $detail = $this->m_siswa->detail_siswa($id);
        $data['detail'] = $detail;

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
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->load->view('template/navuser');
            $this->load->view('user/change_profile', $data);
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

            $this->m_siswa->update_data(array('id'=>$id), $profil, 'el_siswa');

            redirect('user/profil');
        }
    }
}
