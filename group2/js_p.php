<?php
include'sql.php';
if(isset($_GET['p'])){?>
<script>
$(document).ready(function(){
    //xem thong tin san pham
    $('.sp1').hover(function(){
       $(this).find('div:eq(0)').addClass('sp_hover'); 
       $(this).find('.sp1_nd').show('slow').queue($(this).find('.sp_hover').css('height','auto')).dequeue();
    },function(){        
        $('.sp1').find('.sp_hover').css('height','204px').removeClass('sp_hover');
        $('.sp1').find('.sp1_nd').hide('slow');                
    });
    //click dua vao gio hang
    $('.sp1').click(function(){
         kqua_mua($(this).attr('prod'));
         kqua_giohang();
    });
    function kqua_mua(id_sp){
        $.ajax({
          url: "js_buy.php",
          type: "get",
          data: {b : id_sp},
          success:function(dulieu){
            $('#cart').show();
            $('.c_tt span b').text(dulieu);      
          }          
        });    
        $.ajax({
            url:"js_tongtien.php",
            success:function(data){
                $('.c_tongtien').text(data);
            }
        });            
    }
     function kqua_giohang(){
        $.ajax({
          url: "js_giohang.php",
          success:function(dulieu){            
            $('.c_ct').text('');
            $('.c_ct').append(dulieu);
          }          
        });         
    }
});
</script>
    <div class="sp">            
            <?php
                $sql_sp=mysql_query('select * from product p join loai l on p.p_loai=l.p_loai where l_name="'.$_GET['p'].'" || p_name like "%'.$_GET['p'].'%" ');
                $i=0;
                while($r_sp=mysql_fetch_assoc($sql_sp)){
                    $i++;
                    echo'
                    <div class="sp1" prod="'.$r_sp['p_id'].'" >
                      <div>  
                        <div class="sp1_img"><img src="img/prod/'.$r_sp['p_img'].'"/></div>
                        <div class="sp1_nd">
                            <p class="nd_tt"><b>'.$r_sp['p_name'].'</b></p>
                            <p class="nd_ct">
                                <b>Cấu hình</b> : '.$r_sp['p_cauhinh'].'<br />
                                <b>Bộ nhớ</b> : '.$r_sp['p_ram'].'<br />
                                <b>HDD</b> : '.$r_sp['p_hdd'].'<br />
                                <b>VAG</b> : '.$r_sp['p_vga'].'<br />
                                <b>Nhà sản xuất</b> : '.$r_sp['l_name'].'<br />
                                <b>Giá</b> : '.number_format($r_sp['p_gia'],0,'','.').' đ
                            </p>
                        </div>
                      </div>
                    </div>
                    ';
                    if($i%3==0) echo'</div><div class="sp">';
                }
            ?>             
            </div>
<?php }?>  
