/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function SlidersStartAttributes(selektor, sliceNumber){
    $(selektor).slice(sliceNumber).each(function(){
        $(this).css({display: "none", opacity: 0, height: 0, transition: "opacity 1s ease-out"});
    });
}
function SliderOrder(){
    $(".div-slider > div").each(function(){
        $(this).attr("class", "div-slider-post");
        $(".div-slider-post > img").each(function(){
            $(this).attr("class", "slider-img");
        });
    });
    SlidersStartAttributes(".div-slider-post", 1);
    SlidersStartAttributes(".carousel-a", 2);
    SlidersStartAttributes(".editorials-a", 1);
    SlidersStartAttributes(".local-a", 1);
    SlidersStartAttributes(".slider-images", 1);
    SlidersStartAttributes("#full-picture > div", 1);
}

function ContentPosts(){
    $(".content-categorys > div").slice(1).each(function(){
        if($(this).hasClass("blog-post")){
            $(this).attr("class", "category-posts");
        }
        
    });
    $(".category-posts").each(function(){
        var listItems = $(this).children();
        $(this).append(listItems.get().reverse());
    });
    
    $(".content-categorys").slice(2).each(function(){
       $(this).addClass("content-business");
    });
   
    
}

function ResizeElements(element){
    var imgWidth = $(element).width();
    var height = imgWidth * (9/16);
    $(element).css("height", height);
    
}

var slideIndex = 1;
showDivs(slideIndex);
function plusDivs(n, el) {
    slideindex = 1;
    showDivs((slideIndex += n), el);
}
function showDivs(n, element) {
    var i;
    var post = $(element);
    
    if (n > post.length) {
        slideIndex = 1;
    }    
    if (n < 1) {
        slideIndex = post.length;
    }
    for (i = 0; i < post.length; i++) {
        if(element === ".div-slider-post"){
            $(element).eq(i).css({"position": "absolute", "top": 0});
            $(".div-slider-post li").eq(i).css("visibility", "hidden"); 
            $(element).eq(i).css({display: "block", opacity: 0, visibility: "hidden","z-index": 0, height: 0, transition: "opacity 1s ease-out"});
        }else if(element === ".slider-images" || element === "#full-picture > div"){
            $(element).eq(i).css({display: "block", opacity: 0, "z-index": 0, height: 0, transition: "opacity 1s ease-out"});  
        }
        else{
            $(element).eq(i).css({display: "block", opacity: 0, visibility: "hidden",position: "absolute", top: "24%", "z-index": 0, height: 0, transition: "opacity 1s ease-out"});  
        }
    }
    if(element === ".div-slider-post"){
        $(element).eq(slideIndex-1).css({opacity: 1, height: "auto", display: "block", position: "relative","z-index": 2, visibility: "visible"});  
        $(".div-slider-post li").eq(slideIndex-1).css({opacity: 1, visibility: "visible"}); 
    }else if(element === ".carousel-a"){
        $(".carousel-a").eq(slideIndex-1).css({opacity: 1, height: "auto", display: "block", position: "relative","z-index": 2, visibility: "visible"});  
        $(".carousel-a").eq(slideIndex).css({opacity: 1, height: "auto", display: "block",position: "relative","z-index": 2, visibility: "visible"});  
    }else if(element === ".slider-images"){
        $(element).eq(slideIndex-1).css({opacity: 1, height: "auto", display: "block", "z-index": 2, visibility: "visible"});  
    }
    else
    {

        $(element).eq(slideIndex-1).css({opacity: 1, height: "auto", display: "block", position: "relative","z-index": 2, visibility: "visible"});  
    }
    SliderHeight();
}

var objektBoja = {
        "news": "#00a6f6",
        "business": "#e17b30",
        "life": "#30e1d4",
        "sport": "#30e13c",
        "tech": "#e1da30",
        "travel": "#6d5631"
    };
    
function SetColors(element){
    $(element).each(function(){
        if($(this).is("div")){
            var name = $(this).children().first().attr("class");
            if(name === "news") ChangeCss($(this), "border-left", "10px solid " + objektBoja.news);
            else if(name === "business") ChangeCss($(this), "border-left","10px solid " + objektBoja.business);
            else if(name === "life") ChangeCss($(this), "border-left","10px solid " + objektBoja.life);
            else if(name === "sport") ChangeCss($(this), "border-left","10px solid " + objektBoja.sport);
            else if(name === "tech") ChangeCss($(this), "border-left","10px solid " + objektBoja.tech);
            else if(name === "travel") ChangeCss($(this), "border-left","10px solid " + objektBoja.travel);
        }else if($(this).is("li")){
            var name = $(this).children().text().toLowerCase();
            if(name === "news") ChangeCss($(this), "border-bottom", "3px solid"+objektBoja.news);
            else if(name === "business") ChangeCss($(this), "border-bottom", "3px solid"+objektBoja.business);
            else if(name === "life") ChangeCss($(this), "border-bottom", "3px solid"+objektBoja.life);
            else if(name === "sport") ChangeCss($(this), "border-bottom", "3px solid"+objektBoja.sport);
            else if(name === "tech") ChangeCss($(this), "border-bottom", "3px solid"+objektBoja.tech);
            else if(name === "travel") ChangeCss($(this), "border-bottom", "3px solid"+objektBoja.travel);
        }
        
    });
}


function ChangeCss(element, atribut, boja){
    var el = element;
    var at = atribut;
    var bo = boja;
    el.css(at, bo);
    
}
function SliderHeight(){
    var slider = $(".w3-btn-floating").height();
    $(".div-slider-post").css("height", slider);
}
function ContentWidth(){
    var content = $(".content-div").width();
    content-=30;
    $(".content-categorys").css("width", content);
    content-=10;
    $(".page-posts").css("width", content);
}

$(window).resize(function() {
    ResizeElements('.slider-img');
    ResizeElements(".div-slider-post");
    ResizeElements(".post-slika");
    var h = $(".div-slider").height();
    $(".w3-btn-floating").css("height", h);
    var banner2 = $(".banner2").width();
    $(".banner2").css("height", banner2/5.2);
    SliderHeight();
    ContentWidth();
});

$(document).ready(function(){
    $(function(){
        if($(".banner-img").attr("src") === ""){
            $(".banner-img").remove();
        }
    });
    $(".top-rated").css("display", "none");
    $(".comment-side").css("display", "none");
    SliderOrder();
    ResizeElements(".post-slika");
    ResizeElements('.slider-img');
    ResizeElements(".div-slider-post");
    var h = $(".div-slider").height();
    $(".w3-btn-floating").css("height", h);
    
    
    $(".w3-display-left").bind("click", function(){
        plusDivs(-1, ".div-slider-post");
    });
    $(".w3-display-right").bind("click", function(){
        plusDivs(1, ".div-slider-post");
    });
    $(".carousel-left").bind("click", function(){
        plusDivs(-2, ".carousel-a");
    });
    $(".carousel-right").bind("click", function(){
        plusDivs(2, ".carousel-a");
    });
    $(".editorials-left").bind("click", function(){
        plusDivs(-1, ".editorials-a");
    });
    $(".editorials-right").bind("click", function(){
        plusDivs(1, ".editorials-a");
    });
    $(".local-left").bind("click", function(){
        plusDivs(-1, ".local-a");
    });
    $(".local-right").bind("click", function(){
        plusDivs(1, ".local-a");
    });
    $(".slide-left").bind("click", function(){
        plusDivs(-1, ".slider-images");
    });
    $(".slide-right").bind("click", function(){
        plusDivs(1, ".slider-images");
    });
    $(".image-left").bind("click", function(){
        plusDivs(-1, "#full-picture > div");
    });
    $(".image-right").bind("click", function(){
        plusDivs(1, "#full-picture > div");
    });
    
    $("#top-rated").bind("click", function(){
        $(".top-rated").css("display", "block");
        $(".comment-side").css("display", "none");
        $(".sidebar-posts").css("display", "none");
    });
    $("#popular").bind("click", function(){
        $(".top-rated").css("display", "none");
        $(".comment-side").css("display", "none");
        $(".sidebar-posts").css("display", "block");
    });
    $("#comments").bind("click", function(){
        $(".top-rated").css("display", "none");
        $(".comment-side").css("display", "block");
        $(".sidebar-posts").css("display", "none");
    });
    $(".side-hover").hover(function(){
        $(this).children().css({color: "#E8B83D", "border-bottom": "1px solid #E8B83D"});
    }, function(){
        $(this).children().css({color: "white", "border-bottom": "1px solid white"});
    });
    $(".editorials-div").hover(function(){
        $(this).children("h2").last().css({color: "#0092BF"});
        }, function(){
        $(this).children("h2").last().css({color: "#151515"});
    });
    $(".local-div").hover(function(){
        $(this).children("h2").last().css({color: "#0092BF"});
        }, function(){
        $(this).children("h2").last().css({color: "#151515"});
    });
    $(".carousel-div").hover(function(){
        $(this).children("h2").last().css({color: "#0092BF"});
        }, function(){
        $(this).children("h2").last().css({color: "#151515"});
    });
    $(".footer-post-item").hover(function(){
        $(this).children("div").children("h2").css({color: "#0092BF"});
        }, function(){
        $(this).children("div").children("h2").css({color: "#999"});
    });
    $(".news-post").hover(function(){
        $(this).children("h2").css({color: "#0092BF"});
        }, function(){
        $(this).children("h2").css({color: "#151515"});
    });
    
    $("#navigation li").bind("click", function(){
        var odabrani = $(this).attr("name");
        $("#navigation li").each(function(i){
            if($(this).attr("name") === odabrani){
                $("#full-picture > div").eq(i).css({opacity: 1, height: "auto", display: "block",position: "relative","z-index": 2, visibility: "visible"});
            }else{
                $("#full-picture > div").eq(i).css({display: "block", opacity: 0, "z-index": 0, height: 0, transition: "opacity 1s ease-out"});  
            }
        });
    });
    
    var modal = $(".modal");
    var modalImg = $("#img01");
    $("#full-picture img").bind("click", function(){
        modal.css("display", "block");
        modalImg.attr("src", $(this).attr("src"));
    });
    $(".close").bind("click", function(){
        modal.css("display", "none");
    });
    ContentWidth();
    SetColors(".page_item");
    SetColors(".content-categorys");
    ContentPosts();
});
