<!-- del nha san xuat   -->
    <div id="right" >
        <form action="#" method="post">
            <label>Tên nhà sản xuất</label> : 
                <select name="nhasx">
                    <?php
                        $sql_delsx=mysql_query('select * from loai');
                        while($delsv_row=mysql_fetch_assoc($sql_delsx)){
                            echo'<option value="'.$delsv_row['p_loai'].'"';
                            if(isset($_GET['DelNhasx'])&&$_GET['DelNhasx']==$delsv_row['p_loai']) echo' selected ';
                            echo'>'.$delsv_row['l_name'].'</option>';
                            }
                    ?>
                </select>
            <br />
            <input class="del_nhasx" style="padding: 3px 10px;cursor:pointer;" type="submit" value="Xóa" name="subDelNhasx" />
        </form>
    </div>