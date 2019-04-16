<article id="coupon_area">
    <header>
        <h1></h1>
    </header>
    <h1></h1>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">번호</th>
                <th scope="col">쿠폰 번호</th>
                <th scope="col">사용자</th>
                <th scope="col">생성일자</th>
                <th scope="col">사용일자</th>
                <th scope="col">그룹</th>
                <th scope="col">사용유무</th>
            </tr>
        </thead>
        <tbody>
            <?php
foreach($list as $lt)
{
           ?>
            <tr>
                <th scope="row"><?php echo $lt -> coupon_id;?></th>
                <td><?php echo $lt -> coupon_num;?></td>
                <td><?php echo $lt -> user;?></td>
                <td><?php echo $lt -> created_on;?></td>
                <td><?php echo $lt -> use_date;?></td>
                <td><?php echo $lt -> group_coupon;?></td>
                <td><?php echo $lt -> used;?></td>
                <td>
            </tr>
            <?php
            }
           ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="4">
              <a href="/coupon/index.php/coupon/create/page/"
                class="btn btn-success">발행</a>
            </th>
          </tr>
          </tfoot>
        <tfoot>
            <tr>
                <th colspan="5"><?php echo $pagination;?></th>
            </tr>
        </tfoot>
    </table>
    <div>
        <form id="bd_search" method="post">
            <input type="text" name="search_word" id="q" onkeypress="board_search_enter(document.q);" />
            <input type="button" value="검색" id="search_btn" />
        </form>
    </div>
</article>
