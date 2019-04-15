<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * todo 컨트롤러
 */

class Main extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('todo_m');
        $this->load->helper(array('url', 'date'));
    }

    public function index()
    {
        $this->lists();
    }

    /*
     * todo 목록
     */
    public function lists()
    {
        $data['list'] = $this->todo_m->get_list();

        $this->load->view('todo/list_v', $data);
    }
}
