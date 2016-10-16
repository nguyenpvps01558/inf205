    <div id="right" >
        <form action="#" method="post">
            <label>Tên sản phẩm</label> : 
                <select name="idPro">
                    <?php
                        $sql_delsx=mysql_query('select * from product');
                        while($delsv_row=mysql_fetch_assoc($sql_delsx)){
                            echo'<option value="'.$delsv_row['p_id'].'"';
                            if(isset($_GET['del'])&&$delsv_row['p_id']==$_GET['del'])   echo 'selected';
                            echo'>'.$delsv_row['p_name'].'</option>';
                            }
                    ?>
                </select>
            <br />
            <input class="del_nhasx" style="padding: 3px 10px;cursor:pointer;" type="submit" value="Xóa" name="subDelPro" />
        </form>
    </div>