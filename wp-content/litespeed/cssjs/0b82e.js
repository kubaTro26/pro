!function(){var e,t,i;!function(n){function o(e,t){return M.call(e,t)}function l(e,t){var i,n,o,l,r,s,c,f,d,u,a,h=t&&t.split("/"),m=v.map,g=m&&m["*"]||{};if(e&&"."===e.charAt(0))if(t){for(e=e.split("/"),r=e.length-1,v.nodeIdCompat&&b.test(e[r])&&(e[r]=e[r].replace(b,"")),e=h.slice(0,h.length-1).concat(e),d=0;d<e.length;d+=1)if("."===(a=e[d]))e.splice(d,1),d-=1;else if(".."===a){if(1===d&&(".."===e[2]||".."===e[0]))break;d>0&&(e.splice(d-1,2),d-=2)}e=e.join("/")}else 0===e.indexOf("./")&&(e=e.substring(2));if((h||g)&&m){for(i=e.split("/"),d=i.length;d>0;d-=1){if(n=i.slice(0,d).join("/"),h)for(u=h.length;u>0;u-=1)if((o=m[h.slice(0,u).join("/")])&&(o=o[n])){l=o,s=d;break}if(l)break;!c&&g&&g[n]&&(c=g[n],f=d)}!l&&c&&(l=c,s=f),l&&(i.splice(0,s,l),e=i.join("/"))}return e}function r(e,t){return function(){var i=y.call(arguments,0);return"string"!=typeof i[0]&&1===i.length&&i.push(null),h.apply(n,i.concat([e,t]))}}function s(e){return function(t){return l(t,e)}}function c(e){return function(t){p[e]=t}}function f(e){if(o(w,e)){var t=w[e];delete w[e],C[e]=!0,a.apply(n,t)}if(!o(p,e)&&!o(C,e))throw new Error("No "+e);return p[e]}function d(e){var t,i=e?e.indexOf("!"):-1;return i>-1&&(t=e.substring(0,i),e=e.substring(i+1,e.length)),[t,e]}function u(e){return function(){return v&&v.config&&v.config[e]||{}}}var a,h,m,g,p={},w={},v={},C={},M=Object.prototype.hasOwnProperty,y=[].slice,b=/\.js$/;m=function(e,t){var i,n=d(e),o=n[0];return e=n[1],o&&(o=l(o,t),i=f(o)),o?e=i&&i.normalize?i.normalize(e,s(t)):l(e,t):(e=l(e,t),n=d(e),o=n[0],e=n[1],o&&(i=f(o))),{f:o?o+"!"+e:e,n:e,pr:o,p:i}},g={require:function(e){return r(e)},exports:function(e){var t=p[e];return void 0!==t?t:p[e]={}},module:function(e){return{id:e,uri:"",exports:p[e],config:u(e)}}},a=function(e,t,i,l){var s,d,u,a,h,v,M=[],y=typeof i;if(l=l||e,"undefined"===y||"function"===y){for(t=!t.length&&i.length?["require","exports","module"]:t,h=0;h<t.length;h+=1)if(a=m(t[h],l),"require"===(d=a.f))M[h]=g.require(e);else if("exports"===d)M[h]=g.exports(e),v=!0;else if("module"===d)s=M[h]=g.module(e);else if(o(p,d)||o(w,d)||o(C,d))M[h]=f(d);else{if(!a.p)throw new Error(e+" missing "+d);a.p.load(a.n,r(l,!0),c(d),{}),M[h]=p[d]}u=i?i.apply(p[e],M):void 0,e&&(s&&s.exports!==n&&s.exports!==p[e]?p[e]=s.exports:u===n&&v||(p[e]=u))}else e&&(p[e]=i)},e=t=h=function(e,t,i,o,l){if("string"==typeof e)return g[e]?g[e](t):f(m(e,t).f);if(!e.splice){if(v=e,v.deps&&h(v.deps,v.callback),!t)return;t.splice?(e=t,t=i,i=null):e=n}return t=t||function(){},"function"==typeof i&&(i=o,o=l),o?a(n,e,t,i):setTimeout(function(){a(n,e,t,i)},4),h},h.config=function(e){return h(e)},e._defined=p,i=function(e,t,i){if("string"!=typeof e)throw new Error("See almond README: incorrect module build, no module name");t.splice||(i=t,t=[]),o(p,e)||o(w,e)||(w[e]=[e,t,i])},i.amd={jQuery:!0}}(),i("../lib/almond",function(){}),i("views/cellComposite",[],function(){return Marionette.CompositeView.extend({template:"#nf-tmpl-cell",className:"nf-cell",getChildView:function(){return n.channel("views").request("get:fieldLayout")},initialize:function(){this.collection=this.model.get("fields"),jQuery(this.el).css("width",this.model.get("width")+"%")},onRender:function(){0==this.collection.length&&jQuery(this.el).html("&nbsp;")},attachHtml:function(e,t){jQuery(e.el).find("nf-fields").append(t.el)}})}),i("views/rowComposite",["views/cellComposite"],function(e){return Marionette.CompositeView.extend({template:"#nf-tmpl-row",childView:e,className:"nf-row",initialize:function(){this.collection=this.model.get("cells")},onAttach:function(){1<this.collection.length&&jQuery(this.el).closest(".nf-form-wrap").addClass("nf-multi-cell")},attachHtml:function(e,t){jQuery(e.el).find("nf-cells").append(t.el)}})}),i("views/rowCollection",["views/rowComposite"],function(e){return Marionette.CollectionView.extend({tagName:"nf-rows-wrap",childView:e})}),i("models/cellFieldCollection",[],function(){return Backbone.Collection.extend({comparator:"order",initialize:function(e,t){this.cellModel=t.cellModel,_.each(e,function(e){e.set("cellcid",this.cellModel.cid,{silent:!0})},this),this.listenTo(this.cellModel.collection.rowModel.collection,"validate:fields",this.validateFields),this.listenTo(this.cellModel.collection.rowModel.collection,"show:fields",this.showFields),this.listenTo(this.cellModel.collection.rowModel.collection,"hide:fields",this.hideFields),this.cellModel.collection.formModel.get("fields").on("reset",this.resetCollection,this)},validateFields:function(){_.each(this.models,function(e){e.set("clean",!1),n.channel("submit").trigger("validate:field",e)},this)},showFields:function(){this.invoke("set",{visible:!0}),this.invoke(function(){this.trigger("change:value",this)})},hideFields:function(){this.invoke("set",{visible:!1}),this.invoke(function(){this.trigger("change:value",this)})},resetCollection:function(e){var t=[];_.each(this.models,function(i){"submit"!=i.get("type")?t.push(e.findWhere({key:i.get("key")})):t.push(i)}),this.reset(t)}})}),i("models/cellModel",["models/cellFieldCollection"],function(e){return Backbone.Model.extend({initialize:function(){var t=this.collection.formModel.get("fields"),i=[];_.each(this.get("fields"),function(e){if(void 0===t.get(e)){var n=t.findWhere({key:e});void 0!==n&&i.push(n)}else i.push(t.get(e))}),this.set("fields",new e(i,{cellModel:this})),this.set("order",Number(this.get("order"))),this.listenTo(this.get("fields"),"change:errors",this.triggerErrors)},triggerErrors:function(e){this.collection.trigger("change:errors",e)}})}),i("models/cellCollection",["models/cellModel"],function(e){return Backbone.Collection.extend({model:e,comparator:"order",initialize:function(e,t){this.rowModel=t.rowModel,this.formModel=t.formModel}})}),i("models/rowModel",["models/cellCollection"],function(e){return Backbone.Model.extend({initialize:function(){this.set("cells",new e(this.get("cells"),{rowModel:this,formModel:this.collection.formModel})),this.set("order",Number(this.get("order"))),this.listenTo(this.get("cells"),"change:errors",this.triggerErrors)},triggerErrors:function(e){this.collection.trigger("change:errors",e)}})}),i("models/rowCollection",["models/rowModel"],function(e){return Backbone.Collection.extend({model:e,comparator:"order",initialize:function(e,t){this.formModel=t.formModel},validateFields:function(){this.trigger("validate:fields",this)},showFields:function(){this.trigger("show:fields",this)},hideFields:function(){this.trigger("hide:fields",this)}})}),i("controllers/formContentFilters",["views/rowCollection","models/rowCollection"],function(e,t){return Marionette.Object.extend({initialize:function(){n.channel("formContent").request("add:viewFilter",this.getFormContentView,4),n.channel("formContent").request("add:loadFilter",this.formContentLoad,4),n.channel("fieldContents").request("add:viewFilter",this.getFormContentView,4),n.channel("fieldContents").request("add:loadFilter",this.formContentLoad,4)},getFormContentView:function(t){return e},formContentLoad:function(e,i,o,l){if(!0==e instanceof t)return e;var r=n.channel("formContent").request("get:loadFilters"),s=void 0!==r[1];!s&&_.isArray(e)&&0!=_.isArray(e).length&&void 0!==_.first(e)&&"part"==_.first(e).type&&(e=_.flatten(_.pluck(e,"formContentData"))),o=o||!1,l=l||!1;var c=[];return _.isArray(e)&&0!=e.length&&void 0===e[0].cells?_.each(e,function(e,t){c.push({order:t,cells:[{order:0,fields:[e],width:"100"}]})}):c=_.isEmpty(c)&&"undefined"!=typeof nfLayouts&&!s?nfLayouts.rows:e,new t(c,{formModel:i})}})}),i("controllers/loadControllers",["controllers/formContentFilters"],function(e){return Marionette.Object.extend({initialize:function(){new e}})});var n=Backbone.Radio;t(["controllers/loadControllers"],function(e){(new(Marionette.Application.extend({initialize:function(e){this.listenTo(n.channel("form"),"before:filterData",this.loadControllers)},loadControllers:function(t){new e}}))).start()}),i("main",function(){})}();
;