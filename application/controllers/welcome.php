
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
//        $cmd = 'D:\wkhtmltopdf\bin\wkhtmltopdf.exe -q  -B 0 -L 0 -R 0 -T 0 -s A4 --no-background --disable-smart-shrinking http://citest.com/welcome/chart '.$path;
        $cmd = 'D:\wkhtmltopdf\bin\wkhtmltopdf.exe -q  -B 0 -L 0 -R 0 -T 0 -s A4 --no-stop-slow-scripts  --disable-smart-shrinking http://citest.com/welcome/chart '.$path;
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
        $start = '2018-08-21';
        $end = '2018-09-20';
        $start = strtotime($start);
        $end = strtotime($end);

        $date = [];
        for($t = $start; $t <= $end; $t += 86400){
            $this_day = date('Y-m-d', $t);
            $next_day = date('Y-m-d', $t + 86400);
            // 获取当天最早的一条记录
//            $earliest =；
            // 获取当天最晚的一条记录
//            $latest = ;
            // 获取最早一条数据在内的10分钟后的3条数据
//            $morning = ;
            // 获取最晚一条数据在内的10分钟前的3条数据
//            $evening = ;
        }
        var_dump($date);
//        $this->load->view("chart");
    }

    public function TestDb()
    {
        $this->load->model('C_app_bp_model', 'cabm');
        $this->cabm->GetEarliestBp(300912, '2020-02-03');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */