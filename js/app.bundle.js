!function(e){function t(t){for(var r,a,i=t[0],l=t[1],f=t[2],d=0,s=[];d<i.length;d++)a=i[d],o[a]&&s.push(o[a][0]),o[a]=0;for(r in l)Object.prototype.hasOwnProperty.call(l,r)&&(e[r]=l[r]);for(c&&c(t);s.length;)s.shift()();return u.push.apply(u,f||[]),n()}function n(){for(var e,t=0;t<u.length;t++){for(var n=u[t],r=!0,i=1;i<n.length;i++){var l=n[i];0!==o[l]&&(r=!1)}r&&(u.splice(t--,1),e=a(a.s=n[0]))}return e}var r={},o={1:0},u=[];function a(t){if(r[t])return r[t].exports;var n=r[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,a),n.l=!0,n.exports}a.m=e,a.c=r,a.d=function(e,t,n){a.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},a.t=function(e,t){if(1&t&&(e=a(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(a.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)a.d(n,r,function(t){return e[t]}.bind(null,r));return n},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="";var i=window.webpackJsonp=window.webpackJsonp||[],l=i.push.bind(i);i.push=t,i=i.slice();for(var f=0;f<i.length;f++)t(i[f]);var c=l;u.push([5,0]),n()}([function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(){var e=$(".site-header").height();!function(t){t("body").on("click","[data-scrollto]",function(n){n.preventDefault(),function(n,r){var o=t(n).offset().top;t("html, body").animate({scrollTop:o-e},r,function(){history.pushState(null,null,n)})}(t(n.currentTarget).attr("href"),500)})}(jQuery)}},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(){var e=$(".gallery").find(".gallery-item");if(e.length>0){var t=[],n=0;e.each(function(e,r){$(r).attr("data-index",n),n+=1;var o=$(r).find("a"),u={src:o.attr("href"),w:o.data("width"),h:o.data("height")};t.push(u)}),e.click(function(e,n){event.preventDefault();var r=$("#pswp")[0],o={index:parseInt($(n).attr("data-index"),10),bgOpacity:.85,showHideOpacity:!0,history:!1};new PhotoSwipe(r,PhotoSwipeUI_Default,t,o).init()})}}},,function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var r=function(e){return e&&e.__esModule?e:{default:e}}(n(2));t.default=function(){(0,r.default)(".toggle-navigation").click(function(e){e.preventDefault(),(0,r.default)("body").toggleClass("navigation-visible")})}},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(){new LazyLoad}},function(e,t,n){"use strict";var r=i(n(4)),o=i(n(3)),u=i(n(1)),a=i(n(0));function i(e){return e&&e.__esModule?e:{default:e}}jQuery(document).ready(function(){(0,a.default)(),(0,r.default)(),(0,u.default)(),(0,o.default)()})}]);