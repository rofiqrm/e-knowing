<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
        redirect('welcome');
        }
    }

    public function tampil_tugas($id)
    {
        $this->load->model('m_tugas');
        $data['user'] = $this->db->get_where('el_siswa', ['email' =>
            $this->session->userdata('email')])->row_array();
        $data['tugas'] = $this->m_tugas->tampil_tugas($id)->result();
    }

    public function input_jawaban()
    {
        $this->load->model('m_tugas');
        $this->load->model('m_siswa');
        $soal1 = $this->input->post('soal1');
        $soal2 = $this->input->post('soal2');
        $soal3 = $this->input->post('soal3');
        $soal4 = $this->input->post('soal4');
        $soal5 = $this->input->post('soal5');
        
        $nilai = 0;
        if ($soal1 == 'D') {
            $nilai+=20;
        }
        if ($soal2 == 'D') {
            $nilai+=20;
        }
        if ($soal3 == 'D') {
            $nilai+=20;
        }
        if ($soal4 == 'D') {
            $nilai+=20;
        }
        if ($soal5 == 'C') {
            $nilai+=20;
        }

        $data = array(
            'tugas_id'  => $this->input->post('tugas_id'),
            'siswa_id' => $this->input->post('user_id'),
            'jawaban' => '#',
            'status' => 'Sudah Dinilai',
            'catatan' => 'Jawaban Anda: '.$soal1.$soal2.$soal3.$soal4.$soal5,
            'nilai'   => $nilai,
        );
        $this->m_tugas->insert_jawaban($data);

        $profil = array(
            'progres' => 2
        );
        
        $siswa_id = $this->input->post('user_id');
        $this->m_siswa->update_data(array('id'=>$siswa_id), $profil, 'el_siswa');
            
        $this->session->set_flashdata('success-jwb', 'Berhasil!');
        redirect($_SERVER['HTTP_REFERER']);
    }
}