<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
        redirect('welcome');
        }
    }

    public function pertemuan1()
    {
        $this->load->model('m_materi');
        $this->load->library('disqus');
        $data['user'] = $this->db->get_where('el_siswa', ['email' =>
            $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->m_materi->pertemuan1()->result();
        $data['pertemuan'] = '1';
        $data['video'] = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Jw_PiXibSoo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

        $this->load->model('m_tugas');
        $data['tugas'] = $this->m_tugas->tampil_tugas('2');
        $data['disqus'] = $this->disqus->get_html();

        $this->load->view('template/navuser');
        $this->load->view('user/pertemuan1', $data);
        $this->load->view('template/footer');
    }

    public function pertemuan2()
    {
        $this->load->model('m_materi');
        $this->load->library('disqus');
        $data['user'] = $this->db->get_where('el_siswa', ['email' =>
            $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->m_materi->pertemuan2()->result();
        $data['pertemuan'] = '2';
        $data['video'] = '<iframe width="560" height="315" src="https://www.youtube.com/embed/5kiT3OQKbGY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

        $this->load->model('m_tugas');
        $data['tugas'] = $this->m_tugas->tampil_tugas('3');
        $data['disqus'] = $this->disqus->get_html();

        $this->load->view('template/navuser');
        $this->load->view('user/pertemuan2', $data);
        $this->load->view('template/footer');
    }

    public function pertemuan3()
    {
        $this->load->model('m_materi');
        $this->load->library('disqus');
        $data['user'] = $this->db->get_where('el_siswa', ['email' =>
            $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->m_materi->pertemuan3()->result();
        $data['pertemuan'] = '3';
        $data['video'] = '<iframe width="560" height="315" src="https://www.youtube.com/embed/gMPhIOAoTWE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

        $this->load->model('m_tugas');
        $data['tugas'] = $this->m_tugas->tampil_tugas('4');
        $data['disqus'] = $this->disqus->get_html();

        $this->load->view('template/navuser');
        $this->load->view('user/pertemuan3', $data);
        $this->load->view('template/footer');
    }

    public function pertemuan4()
    {
        $this->load->model('m_materi');
        $this->load->library('disqus');
        $data['user'] = $this->db->get_where('el_siswa', ['email' =>
            $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->m_materi->pertemuan4()->result();
        $data['pertemuan'] = '4';
        $data['video'] = '<iframe width="560" height="315" src="https://www.youtube.com/embed/ro2z83Xcl6E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

        $this->load->model('m_tugas');
        $data['tugas'] = $this->m_tugas->tampil_tugas('5');
        $data['disqus'] = $this->disqus->get_html();

        $this->load->view('template/navuser');
        $this->load->view('user/pertemuan4', $data);
        $this->load->view('template/footer');
    }

    public function pertemuan5()
    {
        $this->load->model('m_materi');
        $this->load->library('disqus');
        $data['user'] = $this->db->get_where('el_siswa', ['email' =>
            $this->session->userdata('email')])->row_array();
        $siswa_id = $data['user']['id'];
        $data['materi'] = $this->m_materi->pertemuan5()->result();
        $data['pertemuan'] = '5';

        $this->load->model('m_tugas');
        $data['tugas'] = $this->m_tugas->tampil_tugas('6');

        $this->load->model("m_angket");
        $data["angket"] = $this->m_angket->fetch_data();
        $data['disqus'] = $this->disqus->get_html();

        $this->load->view('template/navuser');
        $this->load->view('user/akhir', $data);
        $this->load->view('template/footer');
    }

    public function belajar($id)
    {
        $this->load->library('disqus');

        $this->load->model('m_materi');
        $where = array('id' => $id);
        $detail = $this->m_materi->belajar($id);
        $data['detail'] = $detail;
        $data['disqus'] = $this->disqus->get_html();
        $this->load->view('materi/belajar', $data);
    }

    public function upload()
    {
        $this->load->model('m_tugas');
        $this->load->model('m_siswa');
        $upload_jawaban = $_FILES['jawaban'];

        $user = $this->db->get_where('el_siswa', ['id' =>
            $this->input->post('user_id')])->row_array();

            if ($upload_jawaban) {
                $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
                $config['max_size'] = '1024000';
                $config['upload_path'] = './assets/jawaban';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('jawaban')) {
                    $jawaban = $this->upload->data('file_name');
                    $data = array(
                        'tugas_id'  => $this->input->post('tugas_id'),
                        'siswa_id' => $this->input->post('user_id'),
                        'jawaban' => $jawaban,
                        'status' => 'Sudah Mengumpulkan',
                        'catatan' => 'Belum Dinilai',
                    );
                    $this->m_tugas->insert_jawaban($data);


                    $profil = array(
                        'progres' => $user['progres']+1,
                    );
                    
                    $siswa_id = $this->input->post('user_id');
                    $this->m_siswa->update_data(array('id'=>$siswa_id), $profil, 'el_siswa');
                } else {
                    $this->upload->display_errors();
                }

            }
        $this->session->set_flashdata('success-upl', 'Berhasil!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function form_validation(){
        $this->load->model("m_angket");
        $siswa_id = $this->input->post("user_id");
        $angket_id = $this->input->post("angket_id");
        $banyak = count($_POST);

        for ($i = 1; $i < $banyak-1; $i++) { 
            $data = array(
            "siswa_id"              =>$siswa_id,
            "angket_id"             =>$angket_id,
            "nomor_id"              =>$this->input->post("nomor".$i)[0],
            "jawaban"               =>$this->input->post("nomor".$i)[1],
            );
            $this->m_angket->insert_jawaban_angket($data);
        }


        redirect(base_url() . 'materi/pertemuan5');
    }

    
    
}