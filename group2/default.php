<!-- show custom    -->
<style>
table tr td{padding:0px 0px;}
table tr td img{max-width:93px;}
b{text-decoration: underline;margin:2px 0px;}
.l_name{padding:2px 0px;}
#header-quanly {width: 740px;padding-bottom: 4px;font-size: 155%;}
.title-table {background-color: #DDDCDC;height: 25px;}
</style>
    <div id="right">
    <div id="header-quanly">Quản lý nhà sản xuất</div>
	<div class="sep"><br></div>
    <table>
            <tr class="title-table">
                <td>STT</td>
                <td>Tên nhà sản xuất</td>    
                <td>Sửa</td>
                <td>Xóa</td>            
            </tr>
            <?php
                $sql_nsx=mysql_query("select * from loai");
                while($r_nsx=mysql_fetch_assoc($sql_nsx))
                    echo'<tr><td>'.$r_nsx['p_loai'].'</td>
                         <td class="l_name">'.$r_nsx['l_name'].'</td>
                         <td><a href="admin.php?page=8&EditNhasx='.$r_nsx['p_loai'].'"><img src="img/edit.png" height="12"/></a></td>
                         <td><a href="admin.php?page=3&DelNhasx='.$r_nsx['p_loai'].'"><img src="img/del.png" height="12"/></a></td>
                    </tr>';
            ?>
    </table><br>
    <div id="header-quanly">Quản lý sản phẩm</div>
	<div class="sep"><br></div>
        <table>
            <tr class="title-table">
                <td>STT</td>
                <td>Tên sản phẩm</td>
                <td>Nhà sản xuất</td>
                <td>Cấu hình</td>
                <td>RAM</td>
                <td>HDD</td>                
                <td>VGA</td>
                <td>Giá</td>
                <td>Link ảnh</td>
                <td>Sửa</td>
                <td>Xóa</td>
            </tr>
            <?php
                $sql_cus=mysql_query('select * from product p join loai l on p.p_loai=l.p_loai');
                while($r_cus=mysql_fetch_assoc($sql_cus)){                    
                    echo'
                    <tr><td>'.$r_cus['p_id'].'</td>
                        <td>'.$r_cus['p_name'].'</td>
                        <td>'.$r_cus['l_name'].'</td>
                        <td>'.$r_cus['p_cauhinh'].'</td>
                        <td>'.$r_cus['p_ram'].'</td>
                        <td>'.$r_cus['p_hdd'].'</td>
                        <td>'.$r_cus['p_vga'].'</td>
                        <td>'.number_format($r_cus['p_gia'],0,".",".").'đ</td>
                        <td><img src="img/prod/'.$r_cus['p_img'].'"></td>
                        <td><a href="admin.php?page=6&Edit='.$r_cus['p_id'].'"><img src="img/edit.png" height="12"/></a></td>
                        <td><a href="admin.php?page=5&del='.$r_cus['p_id'].'"><img src="img/del.png" height="12"/></a></td>                        
                    </tr>';
                }
            ?>
        </table>
    </div>