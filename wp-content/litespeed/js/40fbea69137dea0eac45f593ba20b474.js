!function(a,b,c){function d(){a(".ult-content-box").each(function(c,d){var f=a(d).css("background-color")||"",i=a(d).data("border_color")||"transparent",j=a(d).css("box-shadow")||"",k=a(d).data("hover_bg_color")||a(d).css("background-color"),l=a(d).data("hover_border_color")||"transparent",m=a(d).data("hover_box_shadow")||a(d).css("box-shadow");a(d).hover(function(){a(d).css("background-color",k),a(d).css("border-color",l),a(d).css("box-shadow",m)},function(){a(d).css("background-color",f),a(d).css("border-color",i),a(d).css("box-shadow",j)});var n={},o=a(d).data("responsive_margins");void 0!==o&&null!=o&&(n=g(o));var p={},q=a(d).data("normal_margins");p=void 0!==q&&null!=q?g(q):e(d);var r=a(b).width()||"";""!=r&&(r>=768?h(p,d):h(n,d))})}function e(b){var c={};c["margin-left"]=f(a(b).css("margin-left")),c["margin-right"]=f(a(b).css("margin-right")),c["margin-top"]=f(a(b).css("margin-top")),c["margin-bottom"]=f(a(b).css("margin-bottom"));var d="";return a.each(c,function(a,b){void 0!==b&&null!=b&&(d+=a+":"+b+"px;")}),a(b).attr("data-normal_margins",d),c}function f(a){var b;return void 0!==a&&null!=a&&(b=a.split("px"),b=parseInt(b[0])),b}function g(b){var d={},e=b.split(";");return void 0!==e&&null!=e&&a.each(e,function(a,b){if(typeof b!=c&&null!=b){var e=b.split(":");if(typeof e[0]!=c&&null!=e[0]&&typeof e[1]!=c&&null!=e[1])switch(e[0]){case"margin":d.margin=e[1];break;case"margin-left":d["margin-left"]=e[1];break;case"margin-right":d["margin-right"]=e[1];break;case"margin-top":d["margin-top"]=e[1];break;case"margin-bottom":d["margin-bottom"]=e[1]}}}),d}function h(b,c){a.isEmptyObject(b)||a.each(b,function(b,d){void 0!==d&&null!=d&&a(c).css(b,d)})}jQuery(b).load(function(a){d()}),jQuery(b).resize(function(a){d()}),jQuery(document).ready(function(a){d()})}(jQuery,window)
;