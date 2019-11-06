/**
 * Created by lenovo on 2016/10/26.
 */
$(window).on("resize", function () {
    location.reload();
});
$(function () {
    var mySwiper = new Swiper('.swiper-container',{
        loop : true,
        autoplay:true,
        effect : 'coverflow',
        slidesPerView: 1,
        centeredSlides: false,
        coverflowEffect: {
          rotate: 30,
          stretch: 0,
          depth: 200,
          modifier: 1,
          slideShadows : false
        },
      })

    /*返回顶部*/
    $(window).scroll(function () {
        if($(this).scrollTop()>200){
            $(".go_top").fadeIn();
        }else{
            $(".go_top").fadeOut();
        }
    });
    $(".top").click(function () {
        $("html,body").animate({
            "scrollTop":0
        },500)
    });
    /*banner轮播*/
    var timer=null,num=0;
    timer=setInterval(autoPlay,2000);
    var banner_li_width=$(".mach_banner ul li").width();
    function autoPlay() {
        num++;
        if(num==4){
            $(".mach_banner ol li").eq(0).addClass("current").siblings().removeClass("current");
        }
        if(num>4){
            $(".mach_banner ul").css("left","5%");
            num=1;
        }
        $(".mach_banner ul").animate({
            left:-banner_li_width*num
        })
        $(".mach_banner ol li").eq(num).addClass("current").siblings().removeClass("current");
    }
    $(".mach_banner").mouseenter(function () {
        clearInterval(timer);
    }).mouseleave(function () {
        timer=setInterval(autoPlay,2000);
    });
    /*手机版*/
    var startX,endX,offsetX=50,distance;
    $(".mach_banner ul").on("touchstart",function (e) {
        /*console.log(e);*/
        clearInterval(timer);
        startX=e.originalEvent.touches[0].clientX;
    })
    $(".mach_banner ul").on("touchmove",function (e) {
        /*console.log(e);*/
        endX=e.originalEvent.touches[0].clientX;
        distance=Math.abs(startX-endX);
        /* alert(distance);*/
    })
    $(".mach_banner ul").on("touchend",function () {
        if(distance>offsetX&&startX>endX){
            /*$(this).carousel(startX>endX?"next":"prev");*/
            num++;
            if(num>4){
                $(".mach_banner ul").css("left","5%");
                num=1;
            }
            $(".mach_banner ul").animate({
                left:-banner_li_width*num
            },500,function () {
                timer=setInterval(autoPlay,2000);
            });
            $(".mach_banner ol li").eq(num).addClass("current").siblings().removeClass("current")

        }else{
            num--;
            if(num<0){
                $(".mach_banner ul").css("left",banner_li_width*8);
                num=3;
            }
            $(".mach_banner ul").animate({
                left:-banner_li_width*num
            },500,function () {
                timer=setInterval(autoPlay,2000);
            });
            $(".mach_banner ol li").eq(num).addClass("current").siblings().removeClass("current")

        }
    })
    /*******掌上秒杀*****/
    var dtWidth=$(".second_slider dt").width();
    /*alert(dtWidth);*/
    var sX,eX,X=20,Y,count=0;
    $(".second_slider").on("touchstart",function (e) {
        /*console.log(e);*/
        sX=e.originalEvent.touches[0].clientX;
    })
    $(".second_slider").on("touchmove",function (e) {
        /*console.log(e);*/
        eX=e.originalEvent.touches[0].clientX;
        Y=Math.abs(sX-eX);
    })
    $(".second_slider").on("touchend",function () {
        if((Y>X)&&(sX>eX)){
            /*$(this).carousel(startX>endX?"next":"prev");*/
            count++;
            if(count>3){
                $(".second_slider").css("left","0");
                count=1;
            }
            $(".second_slider").animate({
                left:-dtWidth*count
            },300);

        }else{
            count--;
            if(count<0){
                $(".second_slider").css("left",dtWidth*3);
                count=3;
            }
            $(".second_slider").animate({
                left:-dtWidth*count
            },300);
        }
    })


})