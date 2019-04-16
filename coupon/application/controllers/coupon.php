<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Coupon extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('coupon_m');
        $this->load->helper(array('url', 'date'));
    }

    public function index() {
        $this -> lists();
    }
    /**
         * 사이트 헤더, 푸터가 자동으로 추가된다.
    */
    public function _remap($method) {
      // 헤더 include
        $this -> load -> view('header_v');
        if (method_exists($this, $method)) {
              $this -> {"{$method}"}();
        }
        // 푸터 include
        $this -> load -> view('footer_v');
    }

    /**
     * 목록 불러오기
     */
     public function lists() {
         $this -> load -> library('pagination');
         // 페이지 네이션 설정
         $config['base_url'] = '/coupon/index.php/coupon/lists/coupons/page';
         // 페이징 주소
         $config['total_rows'] = $this -> coupon_m -> get_list($this -> uri -> segment(3), 'count');
         // 전체 개수
         $config['per_page'] = 100;
         // 한 페이지에 표시할 수
         $config['uri_segment'] = 5;
         // 페이지 번호가 위치한 세그먼트

         // 페이지네이션 초기화
         $this -> pagination -> initialize($config);
         // 페이지 링크를 생성하여 view에서 사용하 변수에 할당
         $data['pagination'] = $this -> pagination -> create_links();
         // 목록을 불러오기 위한 offset, limit 값 가져오기
         $page = $this -> uri -> segment(5, 1);

         if ($page > 1) {
             $start = (($page / $config['per_page'])) * $config['per_page'];
         } else {
             $start = ($page - 1) * $config['per_page'];
         }

         $limit = $config['per_page'];

         $data['list'] = $this -> coupon_m -> get_list($this -> uri -> segment(3), '', $start, $limit);
         $this -> load -> view('coupon/list_v', $data);
     }

    public function create()
    {
      echo '<meta http-equiv="content-type" content="text/html; charset=utf-8" />';

      if ($_POST) {
          $this -> load -> helper('alert');

          $write_data =  $this -> input -> post('coupon_num', TRUE);

          $result = $this -> coupon_m -> insert_coupon($write_data);

          if ($result) {
              alert("입력되었습니다.",'/coupon/index.php/coupon/lists/'.$this->uri->segment(3).'/page/'.$pages);
              exit;
          } else {
              alert("다시 입력해주세요.",'/coupon/index.php/coupon/lists/'.$this->uri->segment(3).'/page/'.$pages);
              exit;
          }
      } else {
          // 생성 폼 view 호출
          $this->load->view('coupon/create_v');
      }
    }
}
