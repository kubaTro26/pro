!function(a){a.fn.bsf_appear=function(b,c){var d=a.extend({data:void 0,one:!0,accX:0,accY:0},c);return this.each(function(){var c=a(this);if(c.bsf_appeared=!1,!b)return void c.trigger("bsf_appear",d.data);var e=a(window),f=function(){if(!c.is(":visible"))return void(c.bsf_appeared=!1);var a=e.scrollLeft(),b=e.scrollTop(),f=c.offset(),g=f.left,h=f.top,i=d.accX,j=d.accY,k=c.height(),l=e.height(),m=c.width(),n=e.width();h+k+j>=b&&h<=b+l+j&&g+m+i>=a&&g<=a+n+i?c.bsf_appeared||c.trigger("bsf_appear",d.data):c.bsf_appeared=!1},g=function(){if(c.bsf_appeared=!0,d.one){e.unbind("scroll",f);var g=a.inArray(f,a.fn.bsf_appear.checks);g>=0&&a.fn.bsf_appear.checks.splice(g,1)}b.apply(this,arguments)};d.one?c.one("bsf_appear",d.data,g):c.bind("bsf_appear",d.data,g),e.scroll(f),a.fn.bsf_appear.checks.push(f),f()})},a.extend(a.fn.bsf_appear,{checks:[],timeout:null,checkAll:function(){var b=a.fn.bsf_appear.checks.length;if(b>0)for(;b--;)a.fn.bsf_appear.checks[b]()},run:function(){a.fn.bsf_appear.timeout?(clearTimeout(a.fn.bsf_appear.timeout),a.fn.bsf_appear.timeout=setTimeout(a.fn.bsf_appear.checkAll,20)):a.fn.bsf_appear.timeout=setTimeout(a.fn.bsf_appear.checkAll,20)}}),a.each(["append","prepend","after","before","attr","removeAttr","addClass","removeClass","toggleClass","remove","css","show","hide"],function(b,c){var d=a.fn[c];d&&(a.fn[c]=function(){var b=d.apply(this,arguments);return a.fn.bsf_appear.run(),b})})}(jQuery);
;