<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PhpspreadsheetController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('spreadsheet');
	}

	public function export(){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Hello World !');
		$writer = new Xlsx($spreadsheet);
		$filename = 'name-of-the-generated-file';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output'); // download file
	}

	public function import(){
		$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		
		if(isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
			$arr_file = explode('.', $_FILES['upload_file']['name']);
			$extension = end($arr_file);
			
			if('csv' == $extension){
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
			$sheetData = $spreadsheet->getActiveSheet()->toArray();
			
			echo "<pre>";
			print_r($sheetData);
		}
	}

	public function import_siswa() {
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		
		if(isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
			$arr_file = explode('.', $_FILES['upload_file']['name']);
			$extension = end($arr_file);
			
			if('csv' == $extension){
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
			$sheetData = $spreadsheet->getActiveSheet()->toArray();
			
			for ($i = 1; $i < count($sheetData); $i++)
			{
				$nama = $sheetData[$i]['0'];
				$nim = $sheetData[$i]['1'];
				$email = $sheetData[$i]['2'];
				$password = $sheetData[$i]['3'];
				$data[] = array(
					'nama'  => $nama,
                    'nis'   => $nim,
                    'email'  => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
				);	
			}
			$this->load->model('m_siswa');
 			$insert = $this->m_siswa->insert($data);
 			if($insert){
                $this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
                redirect($_SERVER['HTTP_REFERER']);
            }
		}

        if (isset($_FILES["fileExcel"]["name"])) {
            $path = $_FILES["fileExcel"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();    
                for($row=2; $row<=$highestRow; $row++)
                {
                    $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $nim = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $pass = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $temp_data[] = array(
                        'nama'  => $nama,
                        'nis'   => $nim,
                        'email'  => $email,
                        'password' => password_hash($pass, PASSWORD_DEFAULT),
                    );  
                }
            }
            $this->load->model('m_siswa');
            $insert = $this->m_siswa->insert($temp_data);
            if($insert){
                $this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
            echo "Tidak ada file yang masuk";
        }
    }
}