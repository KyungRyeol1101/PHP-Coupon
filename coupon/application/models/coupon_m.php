<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 공통 게시판 모델
 */

class Coupon_m extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function get_list($table = 'coupons', $type = '', $offset = '', $limit = '') {
        $limit_query = '';

        if ($limit != '' OR $offset != '') {
            // 페이징이 있을 경우 처리
            $limit_query = ' LIMIT ' . $offset . ', ' . $limit;
        }

        $sql = "SELECT * FROM coupons ORDER BY coupon_id DESC " . $limit_query;
        $query = $this -> db -> query($sql);

        if ($type == 'count') {
            $result = $query -> num_rows();
        } else {
            $result = $query -> result();
        }

        return $result;
    }

    function insert_coupon($arrays) {
      $arr_no=array("1","2","3","4","5","6","7","8","9","0");
      $arr_alphabet=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

      $i = 0;
      while ($i <= 10){
        $str = "";

        for($i = 3; $i < 16; $i++){
          if(rand(0,1) == 0) {
            $str.=rand(0, count($arr_no));
          }else{
            $str.=rand(0, count($arr_alphabet));
          }
          // 해당 번호가 DB 있는 중복번호인가 체크

         $query = "select count(coupon_id) from coupons where coupon_num='".$str."'";
         //$result = mysql_query($query, $dbconn);
         $result = $this->db->select($arrays['table']), $query);
         $col = mysql_fetch_row($result);

         // 중복번호가 아니라면 DB 에 넣음
         if ($col[0]==0) {
           $insert_array = array(
                       'coupon_num' => $str,
                       'created_on' => date("Y-m-d H:i:s"),
                       'use_date' => date("Y-m-d H:i:s"),
                       'group_coupon' => 'A',
                       'used' => '1'
                   );

             $result = $this->db->insert($arrays['table'], $insert_array);

             return $result;
         }
         // 중복번호라면 다시
         else continue;
       }
    }
  }

}
