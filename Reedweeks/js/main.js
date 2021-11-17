$(".button__item").click(function (){
    $(".button__item").removeClass("active")
    $(this).addClass("active");
})
const accordion = document.getElementsByClassName('question__item')
for(var i = 0; i < accordion.length; i++){
    accordion[i].addEventListener('click', function(){
        this.classList.toggle('ans__active')
    })
}
function categoriiOpen(){
    changeMenuImg()
    $(".categori__block").toggleClass("open")
    $("body").toggleClass("overflow")
}
function changeMenuImg(){
    if ($('.imgimg').attr('src') == "img/menu.png"){
        $('.imgimg').prop('src', 'img/close.png')
        $('.imgimg').css({'width': "21px", 'height':'21px'})
    } else{
        $('.imgimg').prop('src', 'img/menu.png')
        $('.imgimg').css({'width': "", 'height':''})
    }
}
function menuOpen2(){
    
    changeMenuImg()
    //Закрывать или открывать окно в зависимости от того, открыто ли меню категорий
    if ($("div.categori__block").hasClass("open")){
        categoriiOpen()
        changeMenuImg()
        //$('.imgimg').prop('src', 'img/menu.png')
        document.ontouchmove = function (e) {
            return true;
        }
    } else{
        $(".tovar__buttons").toggleClass("open")
        $("body").toggleClass("overflow")
        $("html").toggleClass("overflow")
        document.ontouchmove = function (e) {
            e.preventDefault();
        }
    }
}
if ($(window).width() > '0'){
    $(".addbutton__text").html('Добавить в корзину');
}
$(".search-btn").on("click", function(){
    $(".search-txt").toggleClass("search-txt-active")
})


