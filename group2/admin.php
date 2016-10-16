<?php
session_start();
    include'sql.php';
    //check admin login
    if(isset($_POST['subAdmin'])){
        $u=mysql_real_escape_string($_POST['u']);
        $p=mysql_real_escape_string($_POST['p']);
        $r=mysql_fetch_assoc(mysql_query("select * from admin where ad_name='$u'&&ad_pass='$p'"));
        if(!empty($r['ad_name']))
            $_SESSION['login']=0;    
    }
    //add nhasx
    if(isset($_POST['subAddNhasx'])&&mysql_query("insert into loai value('','{$_POST['nhasx']}')"))
        echo'<script>alert("Thêm nhà sản xuất thành công");</script>';
    //del nhasx
    if(isset($_POST['subDelNhasx'])&&mysql_query("delete from loai where p_loai='{$_POST['nhasx']}'"))
        echo'<script>alert("Xóa nhà sản xuất thành công");</script>';
    //edit nhasx
    if(isset($_POST['subEditNhasx'])&&mysql_query("update loai set l_name='{$_POST['tenNhasx']}' where p_loai='{$_GET['EditNhasx']}'"))
        echo'<script>alert("Sửa nhà sản xuất thành công");</script>';
    //add pro
    if(isset($_POST['subAddPro'])){
        if(!empty($_POST['tenPro'])&&!empty($_POST['cauhinhPro'])&&!empty($_POST['ramPro'])&&!empty($_POST['hddPro'])&&!empty($_POST['vagPro'])&&!empty($_POST['giaPro'])&&!empty($_POST['hinhanhPro']))
            if(mysql_query("insert into product value('','{$_POST['tenPro']}','{$_POST['sxPro']}','{$_POST['cauhinhPro']}','{$_POST['ramPro']}',
            '{$_POST['hddPro']}','{$_POST['vagPro']}','{$_POST['giaPro']}','{$_POST['hinhanhPro']}')"))
                echo'<script>alert("Thêm sản phẩm thành công");</script>';
            else echo'<script>alert("Lỗi thêm sản phẩm vào cơ sở dữ liệu");</script>';
        else
            echo'<script>alert("Tất cả các trường đều bắt buộc");</script>';        
    }
    //del pro
    if(isset($_POST['subDelPro'])&&mysql_query("delete from product where p_id='{$_POST['idPro']}'"))
        echo'<script>alert("Xóa nhà sản phẩm thành công");</script>';
    //edit pro
    if(isset($_POST['subEditPro'])){
        if(!empty($_POST['tenPro'])&&!empty($_POST['cauhinhPro'])&&!empty($_POST['ramPro'])&&!empty($_POST['hddPro'])&&!empty($_POST['vagPro'])&&!empty($_POST['giaPro'])&&!empty($_POST['hinhanhPro']))
            if(mysql_query("update product set p_name='{$_POST['tenPro']}',p_loai='{$_POST['sxPro']}',p_cauhinh='{$_POST['cauhinhPro']}',p_ram='{$_POST['ramPro']}'
                ,p_hdd='{$_POST['hddPro']}',p_vga='{$_POST['vagPro']}',p_gia='{$_POST['giaPro']}',p_img='{$_POST['hinhanhPro']}' where p_id='{$_GET['Edit']}'"))
                echo'<script>alert("Sửa sản phẩm thành công");</script>';
            else echo'<script>alert("Lỗi sửa sản phẩm trong cơ sở dữ liệu");</script>';
        else
            echo'<script>alert("Tất cả các trường đều bắt buộc");</script>';
    }
    //change pass admin
    if(isset($_POST['subChangeAdmin'])&& $_POST['newPass']==$_POST['confirmPass']&&
        mysql_query("update admin set ad_pass='{$_POST['newPass']}' where ad_pass='{$_POST['oldPass']}'"))
        echo'<script>alert("Đổi mật khẩu admin thành công");</script>';
    //redirect link
    if(!isset($_GET['page']))
        echo'<script>window.location.assign("admin.php?page");</script>';   
    //enable admin
    if(!isset($_SESSION['login'])){
        echo'<script>alert("Bạn không phải là admin");</script>';
        if(isset($_SERVER['HTTP_REFERER'])&&!preg_match('/admin/',$_SERVER['HTTP_REFERER']))echo'<script>window.location.assign("'.$_SERVER['HTTP_REFERER'].'");</script>';
        else echo'<script>window.location.assign("index.html");</script>';
        }   
?>
<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Admin - Quản lý </title>
    <script type="text/javascript" src="jquery/jquery.1.8.1.js"></script>
    <link rel="stylesheet" type="text/css" href="style_p.css" />
    <style>
        #login {height: 28px;border-bottom-left-radius: 3px;border-bottom-right-radius: 3px;}
        #right table{width:740px;text-align: center;border-collapse: collapse;border-spacing: 0;}
        #right table tr:first-child td{font-weight:bold;}      
        #right table td{border:#C9C9C9 solid 1px;}  
        .l_tt a{font-size:16px;}
		
    </style>
</head>
<body>
<?php include'head.php';?>
<script>
$(document).ready(function(){
    $('.xoa_sp').click(function(){
        $.ajax({
           url:'js/js_xoaUser.php',
           type:'get',
           data:{c_id:$(this).attr('href')}
        });        
        $(this).closest("tr").hide();
        return false;
    });   
});
</script>
<div id="body">
<table>
    <tr>
    <td>
    <div id="left">
        <div class="l_tt"><a href="admin.php?page">Quản lý</a></div>
        <div class="l_ct">
            <ul>
                <li><a href="admin.php?page=1" <?php if($_GET['page']==1) echo'class="hover_loai"';?>>Xem người mua</a></li>
                <li><a href="admin.php?page=2" <?php if($_GET['page']==2) echo'class="hover_loai"';?>>Thêm nhà sản xuất</a></li>
                <li><a href="admin.php?page=3" <?php if($_GET['page']==3) echo'class="hover_loai"';?>>Xóa nhà sản xuất</a></li>
                <li><a href="admin.php?page=8" <?php if($_GET['page']==8) echo'class="hover_loai"';?>>Sửa nhà sản xuất</a></li>
                <li><a href="admin.php?page=4" <?php if($_GET['page']==4) echo'class="hover_loai"';?>>Thêm sản phẩm mới</a></li>
                <li><a href="admin.php?page=5" <?php if($_GET['page']==5) echo'class="hover_loai"';?>>Xóa sản phẩm</a></li>  
                <li><a href="admin.php?page=6" <?php if($_GET['page']==6) echo'class="hover_loai"';?>>Sửa sản phẩm</a></li>    
                <li><a href="admin.php?page=7" <?php if($_GET['page']==7) echo'class="hover_loai"';?>>Thay đổi mật khẩu</a></li>                                              
            </ul>
        </div>
		<div class="l_tt">Hổ Trợ Trực Tuyến</div>
		<div id="hotro">
		<center>
		<p> <b>Hổ trợ kỹ thuật</b></p>
			<a href="ymsgr:sendim?lackyboy_luckyfor"><img border="0" width="139" src="http://opi.yahoo.com/online?u=lackyboy_luckyfor&amp;m=g&amp;t=14" align="absmiddle" title="Hỗ trợ trực tuyến" alt="Hỗ trợ trực tuyến"></a>
			<br><a href="ymsgr:sendim?contact_kdh"><img border="0" src="http://opi.yahoo.com/online?u=contact_kdh&amp;m=g&amp;t=14" align="absmiddle" title="Hỗ trợ trực tuyến" alt="Hỗ trợ trực tuyến"></a>
		<br><p><b>Hổ trợ nội dung</b></p>
		<a href="ymsgr:sendim?team_bqt"><img border="0" src="http://opi.yahoo.com/online?u=team_bqt&amp;m=g&amp;t=14" align="absmiddle" title="Hỗ trợ trực tuyến" alt="Hỗ trợ trực tuyến"></a>
		</center>
		</div>
    </div>
    <?php
        switch($_GET['page']){
            case 1:include('php/phpshowCustom.php');break;
            case 2:include('php/phpaddNhasx.php');break;
            case 3:include('php/phpdelNhasx.php');break;
            case 4:include'php/phpaddPro.php';break;
            case 5:include'php/phpdelPro.php';break;
            case 6:include'php/phpeditPro.php';break;
            case 7:include'php/changeAdmin.php';break;
            case 8:include'php/phpeditNhasx.php';break;
            default:include'default.php';break;
        }
    ?>    
    
</td>
    </tr>
</table>
</div>
<div id="end">DCT10A - Group2 © 2012</div>
</body>
</html>