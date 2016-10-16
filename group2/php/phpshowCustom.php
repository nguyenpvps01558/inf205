<!-- show custom    -->
<style>
table tr td{padding: 4px 0px 1px;}
</style>
    <div id="right">
        <table>
            <tr>
                <td>STT</td>
                <td>Họ Tên</td>
                <td>Địa Chỉ</td>
                <td>Số ĐT</td>
                <td>Email</td>
                <td>Ngày Mua</td>                
                <td>Sản Phẩm</td>
                <td>Tổng Tiền</td>
                <td>X</td>
            </tr>
            <?php
                $sql_cus=mysql_query('select *,date_format(c_date,"%H:%m %d/%m/%Y") as c_date from custom');
                while($r_cus=mysql_fetch_assoc($sql_cus)){                    
                    echo'
                    <tr><td>'.$r_cus['c_id'].'</td>
                        <td>'.$r_cus['c_hoten'].'</td>
                        <td>'.$r_cus['c_diachi'].'</td>
                        <td>'.$r_cus['c_sodt'].'</td>
                        <td>'.$r_cus['c_email'].'</td>
                        <td>'.$r_cus['c_date'].'</td>
                        <td width="170">';
                        $sql_buy=mysql_query('SELECT *,count(*) as demsp 
                                    FROM mua m join custom c on m.c_id=c.c_id join product p on m.p_id=p.p_id 
                                    WHERE m.c_id="'.$r_cus['c_id'].'" 
                                    GROUP BY m.p_id');
                        while($r_buy=mysql_fetch_assoc($sql_buy)){
                            echo $r_buy['p_name'].'[<b>'.$r_buy['demsp'].'</b>]<br/>';
                        }
                        $r_tongtien=mysql_fetch_assoc(mysql_query('select sum(p.p_gia) as tongtien from mua m join product p on m.p_id=p.p_id where m.c_id="'.$r_cus['c_id'].'"'));
                        echo'<td>'.number_format($r_tongtien['tongtien'],0,'.','.').' đ</td>';                        
                        echo'</td>
                        <td><a class="xoa_sp" href="'.$r_cus['c_id'].'"><img src="img/del.png" height="12"/></a></td>
                    </tr>';
                }
            ?>
        </table>
    </div>