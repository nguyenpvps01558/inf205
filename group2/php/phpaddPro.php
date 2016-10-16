<?php

/**
 * @author http://taphop.net
 * @copyright 2012
 */



?>
<style>
    fieldset{padding:6px 20px;border: #ccc solid 1px;}
    p{padding: 2px 0px;}
    p label{width:150px;float:left;}
    p input,p select{width:200px;}
    p input[type="submit"]{height: 26px;width: 82px;cursor:pointer;}
</style>
<div id="right" >
    <form action="#" method="post">
    <fieldset>
    <legend style="padding: 0px 6px;">Thêm sản phẩm</legend>
        <p><label>Tên sản phẩm: </label><input name="tenPro" /></p>
        <p><label>Nhà sản xuất: </label>
            <select name="sxPro">
                <?php
                  $sql_delsx=mysql_query('select * from loai');
                        while($delsv_row=mysql_fetch_assoc($sql_delsx))
                            echo'<option value="'.$delsv_row['p_loai'].'">'.$delsv_row['l_name'].'</option>'
                ?>
            </select>
        </p>
        <p><label>Cấu hình: </label><input name="cauhinhPro"/></p>
        <p><label>RAM: </label><input name="ramPro"/></p>
        <p><label>Ổ cứng (HDD): </label><input name="hddPro"/></p>
        <p><label>Card màn hình(VAG): </label><input name="vagPro"/></p>
        <p><label>Giá: </label><input name="giaPro"/></p>
        <p><label>Link ảnh minh họa: </label><input name="hinhanhPro"/></p>
        <p><input value="Thêm vào" type="submit" name="subAddPro"/></p>
    </form>
    </fieldset>
</div>