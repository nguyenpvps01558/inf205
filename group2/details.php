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
<script type="text/javascript" src="script/prod.php"></script>
<body>
<div id="custom"></div>
<div id="custom1">
    <div id="cust">
        <div class="cust_tt">Thông tin khách hàng <a style="float: right;margin-top:-2px;">X</a></div>
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
<script type="text/javascript" src="script/prod.php"></script>
<script>
    
</script>
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
    <style>
        .nd_tt,.nd_ct{text-align:left!important;}
        .phanloai_sp_{margin-top:3px;}
        .phanloai_sp_ a{background:rgb(182, 182, 255);padding:2px 5px;border-radius:3px;color:#fff;margin-top:2px;}
        .phanloai_sp_ a:hover{box-shadow: 0px 1px 1px rgb(99, 112, 253);}
        .sp1,.sp2{border-radius:3px;}
        .sp1:hover,.sp2:hover{box-shadow: 1px 1px 2px rgb(165, 165, 165);}
    </style>
        
        <?php
                $sql_sp=mysql_query('select * from product p join loai l on p.p_loai=l.p_loai where p_id="'.$_GET['p_id'].'"');
                $r_sp=mysql_fetch_assoc($sql_sp);
                    echo'
                    <div class="sp1" prod="'.$r_sp['p_id'].'" style="border:none;float:left;height:159px;">
                      <div>  
                        <div class="sp1_img" style="margin-top:15px;"><img src="img/prod/'.$r_sp['p_img'].'"/></div>                        
                      </div>
                    </div>
                    <div class="sp2" style="margin-left: 245px;background: #fff;padding: 0px 10px 0px;margin-top: 5px;height: 159px;">
                            <p class="nd_tt"><b>THÔNG TIN CHI TIẾT SẢN PHẨM</b></p>
                            <p class="nd_tt"><b>Tên máy : '.$r_sp['p_name'].'</b></p>
                            <p class="nd_ct">
                                <b>Cấu hình</b> : '.$r_sp['p_cauhinh'].'<br />
                                <b>Bộ nhớ</b> : '.$r_sp['p_ram'].'<br />
                                <b>HDD</b> : '.$r_sp['p_hdd'].'<br />
                                <b>VAG</b> : '.$r_sp['p_vga'].'<br />
                                <b>Nhà sản xuất</b> : '.$r_sp['l_name'].'<br />
                                <b>Giá</b> : '.number_format($r_sp['p_gia'],0,'','.').' đ
                            </p>
                            <p class="phanloai_sp_"><a href="javascript:void();" class="sp2_mua">Mua sản phẩm</a></p>
                        </div>
                    ';
            ?>    
    </div>
</td>
    </tr>
</table>
</div>
<div id="end">DCT10A - Group2 © 2012</div>
</body>
</html>