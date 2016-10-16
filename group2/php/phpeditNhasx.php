   <style>
    fieldset{padding:6px 20px;border: #ccc solid 1px;}
    p{padding: 2px 0px;}
    p label{width:150px;float:left;}
    p input,p select{width:200px;}
    p input[type="submit"]{height: 26px;width: 82px;cursor:pointer;}
    </style>
   <div id="right" >   
     <?php if(!isset($_GET['EditNhasx'])){?>
    <script>
        $(document).ready(function(){
           $('select').change(function(){
                window.location.assign('admin.php?page=8&EditNhasx='+$(this).val());
           }); 
        });
    </script>
    <label>Sửa nhà sản xuất</label> : 
    <select name="idPro">
        <option value="0">--------------- Chọn nhà sản xuất ---------------</option>
        <?php
            $sql_delsx=mysql_query('select * from loai');
            while($delsv_row=mysql_fetch_assoc($sql_delsx))
                echo'<option value="'.$delsv_row['p_loai'].'">'.$delsv_row['l_name'].'</option>';
        ?>
    </select>
        <?php }else{
        $r_edit=mysql_fetch_assoc(mysql_query("select * from loai where p_loai='{$_GET['EditNhasx']}'"));    
        ?> <form action="#" method="post">
            <fieldset>
            <legend style="padding: 0px 6px;">Sửa nhà sản xuất</legend>
                <p><label>Nhà sản xuất: </label><input value="<?php echo $r_edit['l_name'];?>" readonly="readonly"/></p>
                <p><label>Sửa thành: </label><input name="tenNhasx" /></p>                               
                <p><input value="Sửa" type="submit" name="subEditNhasx"/></p>            
            </fieldset>
            </form>
        <?php }?>
    </div>