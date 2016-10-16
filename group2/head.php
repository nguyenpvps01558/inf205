<link rel="stylesheet" type="text/css" href="css/style_p.css" />
<script type="text/javascript" src="jquery/jquery.1.8.1.js"></script>
<link rel="stylesheet" type="text/css" href="css/login.css"/> 
<div id="head">
    <div id="head1">
        <a href="index.html"><div id="logo">group2</div></a>
        <div id="slogan">Đồ án website bán hàng</div>
        <div id="login">
        <?php
            if(!isset($_SESSION['login'])){
        ?>
            <div class="log_tt">Đăng nhập</div>
            <form action="admin.php" method="post">
                <div class="user">
                    <div><label for="u">User : </label><input id="u" name="u" type="text"/></div>
                    <div><label for="p">Pass : </label><input id="p" name="p" type="password"/></div>
                    <input style="visibility: hidden;" name="subAdmin" type="submit"/>
                </div>
            </form>
        <?php }else{?>
            <style>#login{height: 28px;border-bottom-left-radius: 4px;border-bottom-right-radius: 4px;}</style>
            <div class="log_tt"><a href="admin.php" style="color: pink;font-size:13px;">Admin</a> - <a href="logout.php" style="color: #fff;font-size:13px;">Logout</a></div>
        <?php }?>
        </div>
    </div>
</div>
