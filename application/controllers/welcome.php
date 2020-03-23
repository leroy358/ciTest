
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Knp\Snappy\Pdf;

class Welcome extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
//		$this->load->view('welcome_message');

        $path = 'D:/'.time().'.pdf';
        $cmd = 'D:\wkhtmltopdf\bin\wkhtmltopdf.exe -q  -B 0 -L 0 -R 0 -T 0 -s A4 --no-background --disable-smart-shrinking http://citest.com/welcome/chart '.$path;
        echo $cmd;
//        exit();
        exec($cmd, $array, $status);
        var_dump($status);
	}

    public function test()
    {
        $this->load->view("index.html");
	}

	public function getData()
    {
        header('Content-type: application/json');
        echo json_encode([5, 20, 36, 10, 10, 20]);
        exit();
    }

    public function chart()
    {
        $this->load->view("chart");
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */