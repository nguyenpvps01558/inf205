<?php
session_start();
include'sql.php';
$thanhtien=0;
$sql_demsp=mysql_query('SELECT *,count(*) as demsp 
                        FROM mua m join custom c on m.c_id=c.c_id join product p on m.p_id=p.p_id 
                        WHERE m.c_id="'.$_SESSION['c_id'].'" 
                        GROUP BY m.p_id');
while($r_gh=mysql_fetch_assoc($sql_demsp)){
    echo'
        <div class="c_ct1">
            <div class="c_ct_name">'.$r_gh['p_name'].'</div>
            <div class="c_ct_sl">'.$r_gh['demsp'].'</div>
            <div buy="'.$r_gh['p_id'].'" title="Hủy sản phẩm này" class="c_close"></div>
        </div>
    ';
    $thanhtien+=$r_gh['p_gia']*$r_gh['demsp'];
} 
?>
<script>
$(document).ready(function(){
    $('.c_close').click(function(){
       $.ajax({
            url: 'js_giohang_del.php',
            type:'get',
            data: {p_id:$(this).attr('buy')}               
       });
       $(this).parent().fadeOut('slow');
    });
});
</script>