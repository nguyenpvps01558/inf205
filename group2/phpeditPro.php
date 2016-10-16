   <style>
    fieldset{padding:6px 20px;border: #ccc solid 1px;}
    p{padding: 2px 0px;}
    p label{width:150px;float:left;}
    p input,p select{width:200px;}
    p input[type="submit"]{height: 26px;width: 82px;cursor:pointer;}
    </style>
   <div id="right" >   
     <?php if(!isset($_GET['Edit'])){?>
    <script>
        $(document).ready(function(){
           $('select').change(function(){
                window.location.assign('admin.php?page=6&Edit='+$(this).val());
           }); 
        });
    </script>
    <label>Tên sản phẩm</label> : 
    <select name="idPro">
        <option value="0">--------- Chọn sản phẩm cần sửa ---------</option>
        <?php
            $sql_delsx=mysql_query('select * from product');
            while($delsv_row=mysql_fetch_assoc($sql_delsx))
                echo'<option value="'.$delsv_row['p_id'].'">'.$delsv_row['p_name'].'</option>'
        ?>
    </select>
        <?php }else{
        $r_edit=mysql_fetch_assoc(mysql_query("select * from product where p_id='{$_GET['Edit']}'"));    
        ?> <form action="#" method="post">
            <fieldset>
            <legend style="padding: 0px 6px;">Sửa sản phẩm</legend>
                <p><label>Tên sản phẩm: </label><input name="tenPro" value="<?php echo $r_edit['p_name'];?>" /></p>
                <p><label>Nhà sản xuất: </label>
                    <select name="sxPro">
                        <?php
                          $sql_delsx=mysql_query('select * from loai');
                                while($delsv_row=mysql_fetch_assoc($sql_delsx)){
                                    echo'<option value="'.$delsv_row['p_loai'].'"';
                                    if($delsv_row['p_loai']==$r_edit['p_loai']) echo'selected';
                                    echo' >'.$delsv_row['l_name'].'</option>';
                                    }
                        ?>
                    </select>
                </p>
                <p><label>Cấu hình: </label><input name="cauhinhPro" value="<?php echo $r_edit['p_cauhinh'];?>"/></p>
                <p><label>RAM: </label><input name="ramPro" value="<?php echo $r_edit['p_ram'];?>"/></p>
                <p><label>Ổ cứng (HDD): </label><input name="hddPro" value="<?php echo $r_edit['p_hdd'];?>"/></p>
                <p><label>Card màn hình(VAG): </label><input name="vagPro" value="<?php echo $r_edit['p_vga'];?>"/></p>
                <p><label>Giá: </label><input name="giaPro" value="<?php echo $r_edit['p_gia'];?>"/></p>
                <p><label>Link ảnh minh họa: </label><input name="hinhanhPro" value="<?php echo $r_edit['p_img'];?>"/></p>
                <p><input value="Sửa" type="submit" name="subEditPro"/></p>            
            </fieldset>
            </form>
        <?php }?>
    </div>