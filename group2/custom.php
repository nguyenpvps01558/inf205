<?php
session_start();
include'sql.php';
//
if(isset($_POST['gui']))
    mysql_query('update custom set c_hoten="'.$_POST['hoten'].'",c_diachi="'.$_POST['diachi'].'",c_sodt="'.$_POST['sdt'].'",c_email="'.$_POST['email'].'"
                 where c_id="'.$_SESSION['c_id'].'"');
//
$r_cus=mysql_fetch_assoc(mysql_query('select * from custom where c_id="'.$_SESSION['c_id'].'"'));
?>
<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Mua hàng</title>
    <script type="text/javascript" src="jquery/jquery.1.8.1.js"></script>
    
</head>
<body>
<?php include'head.php';?>
<div id="body">
<table>
    <tr>
    <td>
    <div id="left">
        <div class="l_tt">Welcome <?php
            echo $r_cus['c_hoten'];
        ?></div>
        <div class="l_ct">
            <ul>                
                <li><a href="index.html">Trang chủ</a></li>
                <li><a href="product.php">Mua thêm</a></li>                
            </ul>
        </div>
    </div>
    <link href="css/custom.css" rel="stylesheet" type="text/css"/>
    <div id="right">
        <div class="cus_tt">Danh sách mặt hàng bạn đã chọn mua</div>
        <table class="c_table" border="0">
            <tr>
            <?php
                $sql_spcus=mysql_query('select *,count(*) as dem 
                                        from mua m join product p on m.p_id=p.p_id join custom c on m.c_id=c.c_id 
                                        where c.c_id="'.$_SESSION['c_id'].'"
                                        group by m.p_id
                                        ');
                $i=0;
                while($r_sc=mysql_fetch_assoc($sql_spcus)){
                    $i++;
                    echo'
                        <td align="center" valign="top">
                            <div class="c_sp">
                                <div class="c_img">
                                    <img src="img/prod/'.$r_sc['p_img'].'" />
                                </div>
                                <div class="c_info">
                                    <p class="c_i_name">'.$r_sc['p_name'].'</p>
                                    <span>Giá bán: '.number_format($r_sc['p_gia'],0,'','.').' đ</span><br />
                                    <span>Số lượng: '.$r_sc['dem'].'</span>
                                </div>
                            </div>
                        </td>';
                    if($i%2==0) echo'</tr><tr>';
                }
                $r_tongtien=mysql_fetch_assoc(mysql_query('select sum(p.p_gia) as tongtien from mua m join product p on m.p_id=p.p_id where m.c_id="'.$_SESSION['c_id'].'"'));                
            ?>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <b>Tổng tiền : <?php echo number_format($r_tongtien['tongtien'],0,'.','.');?> đ</b>
                </td>
            </tr>
        </table>
    </div>
</td>
    </tr>
</table>
</div>
<div id="end">DCT10A - Group2 © 2012</div>
</body>
</html>