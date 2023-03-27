var kadisifre = $(window).width();

if(kadisifre > 1000){
    $('.container').empty();
    $('.container').append('<h1 style="color:white;text-align:center;">Yetkiniz Bulunmuyor.</h1>');
    setTimeout(
        function()
        {

            $.redirect("https://ozdogrulogistics.com/");
        }, 5000);
}