<?php
session_start();
include'sql.php';
if(!isset($_SESSION['c_id'])){
    mysql_query('insert into custom(c_date) value(now())');
    $c_id=mysql_fetch_assoc(mysql_query('select * from custom order by c_id desc'));
    //echo'<script>alert('.$c_id['c_id'].');</script>';
    $_SESSION['c_id']=$c_id['c_id'];
}
?>
<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Quản lý sản phẩm</title>
    
</head>
<body>
<div id="custom"></div>
<div id="custom1">
    <div id="cust">
        <div class="cust_tt">Thông tin khách hàng<a style="float: right;margin-top:-2px;">X</a></div>
        <div class="cust_ct">
          <form action="custom.php" method="post">
          <?php if(isset($_SESSION['c_id'])){
            $r_ci=mysql_fetch_assoc(mysql_query('select * from custom where c_id="'.$_SESSION['c_id'].'"'));
            ?>
            <p><label>Họ tên: </label><input id="hoten" value="<?php echo $r_ci['c_hoten'];?>" name="hoten" type="text"/></p>
            <p><label>Địa chỉ: </label><input value="<?php echo $r_ci['c_diachi'];?>" name="diachi" type="text"/></p>
            <p><label>Số điện thoại: </label><input value="<?php echo $r_ci['c_sodt'];?>" name="sdt" type="text"/></p>
            <p><label>Email: </label><input value="<?php echo $r_ci['c_email'];?>" name="email" type="text"/></p>
          <?php }else{?>            
            <p><label>Họ tên: </label><input id="hoten" name="hoten" type="text"/></p>
            <p><label>Địa chỉ: </label><input name="diachi" type="text"/></p>
            <p><label>Số điện thoại: </label><input name="sdt" type="text"/></p>
            <p><label>Email: </label><input name="email" type="text"/></p>
            <?php }?>
            <p><input name="gui" class="xacnhan" type="submit" value="Xác nhận" /></p>
            <p class="batbuoc" style="color: red;font-size: 11px;display:none;">Tất cả các trường đều bắt buộc</p>
          </form>
        </div>
    </div>
</div>
<?php include'head.php';?>
<script type="text/javascript" src="script/prod.php"></script>
<div id="cart">
    <div class="c_tt"><span>Giỏ hàng <b style="font-size: 18px;font-weight: normal;">0</b></span></div>
    <div class="c_ct">  
    </div>
    <div class="c_tien">
        <a href="custom.php" class="thanhtoan">Thanh toán</a> : <span class="c_tongtien">0</span>đ
    </div>
</div>
<div id="body">
<table>
    <tr>
    <td>
    <div id="left">
        <a href="product.php"><div class="l_tt">Phân loại</div></a>
        <div class="l_ct">
            <ul>
                <?php
                    $sql_loai=mysql_query('select * from loai');
                    while($r_loai=mysql_fetch_assoc($sql_loai)){
                        echo '<li><a kind="'.$r_loai['l_name'].'" href="#">'.$r_loai['l_name'].'</a></li>';
                    }
                ?>                
            </ul>
        </div>
		
        <div class="l_tt" style="border-top: #fff solid 1px;">
            <form>
                <input class="s_name" type="text" placeholder="" />
                <input class="s_gui" type="submit" value="Tìm kiếm"/>
            </form>
        </div>
		<br>
		<div class="l_tt">Hổ Trợ Trực Tuyến</div>
		<div id="hotro">
		<center>
		<p> <b>Hổ trợ kỹ thuật</b></p>
			<a href="ymsgr:sendim?lackyboy_luckyfor"><img border="0" src="http://opi.yahoo.com/online?u=lackyboy_luckyfor&amp;m=g&amp;t=14" align="absmiddle" title="Hỗ trợ trực tuyến" alt="Hỗ trợ trực tuyến"></a>
			<a href="ymsgr:sendim?contact_kdh"><img border="0" src="http://opi.yahoo.com/online?u=contact_kdh&amp;m=g&amp;t=14" align="absmiddle" title="Hỗ trợ trực tuyến" alt="Hỗ trợ trực tuyến"></a>
		<br><p><b>Hổ trợ nội dung</b></p>
		<a href="ymsgr:sendim?team_bqt"><img border="0" src="http://opi.yahoo.com/online?u=team_bqt&amp;m=g&amp;t=14" align="absmiddle" title="Hỗ trợ trực tuyến" alt="Hỗ trợ trực tuyến"></a>
		</center>
		</div>
    </div>
    <div id="right">
        <div class="sp">
        <style>
        .phanloai_sp_{margin-top:3px;}
            .phanloai_sp_ a{background:rgb(182, 182, 255);padding:2px 5px;border-radius:3px;color:#fff;margin-top:2px;}
            .phanloai_sp_ a:hover{box-shadow: 0px 1px 1px rgb(99, 112, 253);}
        </style>            
            <?php
                $sql_sp=mysql_query('select * from product join loai on product.p_loai=loai.p_loai order by loai.p_loai');
                $i=0;
                while($r_sp=mysql_fetch_assoc($sql_sp)){
                    $i++;
                    echo'
                    <div class="sp1" prod="'.$r_sp['p_id'].'" onclick="return false;">
                      <div>  
                        <div class="sp1_img"><img style="max-height:122px;" src="img/prod/'.$r_sp['p_img'].'"/></div>
                        <div class="sp1_nd" style="display:block;background:none;border-top:none;">
                            <p class="nd_tt" style="margin-top:-27px;"><b>'.$r_sp['p_name'].'</b></p>
                            <p class="phanloai_sp_" align="center"><a href="#" class="sp1_mua">Mua sản phẩm</a> <a href="details.php?p_id='.$r_sp['p_id'].'">Chi tiết</a></p>                            
                        </div>
                      </div>
                    </div>
                    ';
                    if($i%3==0) echo'</div><div class="sp">';
                }
            ?>             
            </div>       
</div>
</td>
    </tr>
</table>
</div>
<div id="end">DCT10A - Group2 © 2012</div>
</body>
</html>