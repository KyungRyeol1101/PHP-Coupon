<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ini_set("MEMORY","256M");
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
      $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      $group_sql = "SELECT group_coupon FROM coupons ORDER BY coupon_id DESC limit 1";
      $group_query = $this -> db -> query($group_sql);
      $group_result = $group_query -> result();

      $s = 0;
      while ($s < 100000){
        $str = "$arrays";

        for($i = 3; $i < 16; $i++){
          $str .= $chars[rand(0, strlen($chars)-1)];
        }
          // 해당 번호가 DB 있는 중복번호인가 체크

         $sql = "SELECT count(coupon_id) FROM coupons WHERE coupon_num='".$str."'";
         $query = $this-> db -> query($sql);
         $result = $query->num_rows();

         // 중복번호가 아니라면 DB 에 넣음
         if (true) {
           $insert_array = array(
                       'coupon_num' => $str,
                       'user' => '홍길동',
                       'created_on' => date("Y-m-d H:i:s"),
                       'use_date' => date("Y-m-d H:i:s"),
                       'group_coupon' => 'A',
                       'used' => '0'
            );
            $result = $this-> db -> insert('coupons', $insert_array);
            $s++;
         }
         // 중복번호라면 다시
         else{
           continue;
         }
       }
       return $result;
    }
}
