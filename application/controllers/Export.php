<?php

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	
	class Export extends CI_Controller{

		public function angket($id)
		{
			$this->load->model('m_angket');
	        $this->load->model('m_siswa');
	        $angket = $this->m_angket->data_angket($id);
	        $isi = $this->m_angket->ambil_data($id);
	        $jawaban = $this->m_angket->ambil_jawaban($id);

	        $key = array_search(0, array_column($isi, 'nomor_id'));
            if ($key === false) {
                $banyak = count($isi);
            } else {
                $banyak = count($isi)-1;
            }

			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();

			$sheet->setCellValue('A1', 'No');
			$sheet->setCellValue('B1', 'Nama');
			$sheet->setCellValue('C1', 'Kelas');
			$sheet->setCellValue('D1', 'Jenis Kelamin');
			$sheet->setCellValue('E1', 'Alamat');
			
			$siswa = $this->siswa_model->getAll();
			$no = 1;
			$x = 2;
			foreach($siswa as $row)
			{
				$sheet->setCellValue('A'.$x, $no++);
				$sheet->setCellValue('B'.$x, $row->nama);
				$sheet->setCellValue('C'.$x, $row->kelas);
				$sheet->setCellValue('D'.$x, $row->jenis_kelamin);
				$sheet->setCellValue('E'.$x, $row->alamat);
				$x++;
			}
			$writer = new Xlsx($spreadsheet);
			$filename = 'laporan-angket'.$angket->judul;
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
	
			$writer->save('php://output');
		}
	}
?>