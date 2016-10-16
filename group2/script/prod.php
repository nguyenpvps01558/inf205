<?php
    include'../sql.php';
    header("content-type: application/x-javascript");
    session_start();    
    echo'$(document).ready(function(){
     $("input[name=gui]").click(function(){
        if($("input[name=hoten]").val().length==0||$("input[name=diachi]").val().length==0||$("input[name=sdt]").val().length==0||$("input[name=email]").val().length==0)
            {
                $(".batbuoc").show();
                return false;
            }        
    });
    function kqua_giohang(){
        $.ajax({
          url: "js/js_giohang.php",
          success:function(dulieu){            
            $(".c_ct").text("");
            $(".c_ct").append(dulieu);
          }          
        });         
    }
    //xem gio hang 
    $(".c_tt").toggle(function(){
        kqua_giohang();
        $("#cart").animate({"right":"0px"},"slow");        
    },function(){
        kqua_mua("a");
        $("#cart").animate({"right":"-164px"},"slow");
    });
    //dien thogn tin in
    $(".thanhtoan").click(function(){';
        $r_cus_check=mysql_fetch_assoc(mysql_query("select * from custom where c_id='".$_SESSION["c_id"]."'"));
        if(empty($r_cus_check["c_hoten"]))
        echo'
           $("#custom").fadeIn("slow"); 
           $("#cust").animate({"margin":"200px auto"},"slow");
           return false;';       
    echo' });
    //dien thogn tin out
    $(".cust_tt").click(function(){
       $("#custom").fadeOut("slow"); 
       $("#cust").animate({"margin":"-277px auto"},"slow");
    });
    //click loai hang san xuat
    $(".l_ct ul li a").click(function(){
       $(".l_ct ul li a").removeClass("hover_loai");
       $(this).addClass("hover_loai");  
       $.ajax({
          url: "js/js_p.php",
          type: "get",
          data: {p : $(this).attr("kind")},
          dataType: "html",
          success:function(dulieu){
            kqua_loai(dulieu);
          }          
        });      
       return false;
    });
    function kqua_loai(dulieu){
        $("#right").text("");
        $("#right").append(dulieu);
    }
    //click dua vao gio hang
    $(".sp1_mua").click(function(){
         kqua_mua($(this).closest(".sp1").attr("prod"));
         kqua_giohang();
         return false;
    });
    $(".sp2_mua").click(function(){
         kqua_mua($(".sp1").attr("prod"));
         kqua_giohang();
         return false;
    });
    function kqua_mua(id_sp){
        $.ajax({
          url: "js/js_buy.php",
          type: "get",
          data: {b : id_sp},
          success:function(dulieu){
            $("#cart").show();
            $(".c_tt span b").text(dulieu);      
          }          
        });    
        $.ajax({
            url:"js/js_tongtien.php",
            success:function(data){
                $(".c_tongtien").text(data);
            }
        });            
    }
    //del gio hang
    $(".c_ct").click(function(){
       kqua_giohang();
       kqua_mua("a");
    });
    //search tim kiem
    $(".s_gui").click(function(){
       $.ajax({
          url: "js/js_p.php",
          type: "get",
          data: {p : $(".s_name").val()},
          dataType: "html",
          success:function(dulieu){
            kqua_loai(dulieu);
          }          
        });
        return false;
    });
    $(".phanloai_sp_ a:not(.sp1_mua)").click(function(){
       window.location.assign($(this).attr("href")); 
    });
        $(".c_tt span b").load("js/js_buy.php");
        $("#cart").show();
});';
?>
