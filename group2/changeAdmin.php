<!-- del nha san xuat   -->
<style>
    p{padding:2px 0px;}
    p label{float:left;width:150px;}
    sub{color:red;font-size:11px;font-weight:bold;display:none;}
</style>
<script>
    $(document).ready(function(){
       $('input[name=confirmPass]').change(function(){
           if($(this).val()!=$('input[name=newPass]').val())
                $('sub').show();
           else $('sub').hide();
       }); 
    });
</script>
    <div id="right" >
        <form action="#" method="post">
            <p><label>Mật khẩu cũ :</label><input type="password" name="oldPass" /></p>
            <p><label>Mật khẩu mới :</label><input type="password" name="newPass" /></p>
            <p><label>Xác nhận :</label><input type="password" name="confirmPass"/></p>
            <input class="del_nhasx" style="padding: 3px 10px;cursor:pointer;" type="submit" value="Thay đổi" name="subChangeAdmin" />
        </form>
        <sub>Mật khẩu xác nhận không chính xác</sub>
    </div>