$(function(){

    var articleAdmin = $(".article-admin");
    var btnHideAdmin = $("#btn-admin-hide");
    var btnShowAdmin = $("#btn-admin-show");
    var btnsArticleEdit = $(".btn-admin-edit");
    var btnsArticleDelete = $(".btn-admin-delete");

    btnsArticleEdit.click(function(){
            articleAdmin.children().hide(1000);
            btnHideAdmin.hide(1000);
        });

    $(".btn-admin-cancel").click(function(){
            articleAdmin.children().show(1000);
            btnHideAdmin.show(1000);
        });

    btnHideAdmin.click(function(){
            articleAdmin.children().hide(1000);
            btnHideAdmin.hide(500, function(){
            btnShowAdmin.show(500);
        });

    });

    btnShowAdmin.click(function(){
            articleAdmin.children().show(1000);
            btnShowAdmin.hide(500, function(){
            btnHideAdmin.show(500);
        });


    });

});
