/*! modernizr 3.2.0 (Custom Build) | MIT *
 * http://modernizr.com/download/?-csstransforms-csstransforms3d-opacity-svg-touchevents-fnbind-load-testprop !*/
!function(e,n,t){function o(e,n){return typeof e===n}function r(){var e,n,t,r,s,i,a;for(var l in g)if(g.hasOwnProperty(l)){if(e=[],n=g[l],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(r=o(n.fn,"function")?n.fn():n.fn,s=0;s<e.length;s++)i=e[s],a=i.split("."),1===a.length?Modernizr[a[0]]=r:(!Modernizr[a[0]]||Modernizr[a[0]]instanceof Boolean||(Modernizr[a[0]]=new Boolean(Modernizr[a[0]])),Modernizr[a[0]][a[1]]=r),S.push((r?"":"no-")+a.join("-"))}}function s(e){var n=C.className,t=Modernizr._config.classPrefix||"";if(x&&(n=n.baseVal),Modernizr._config.enableJSClass){var o=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(o,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),x?C.className.baseVal=n:C.className=n)}function i(e,n){return!!~(""+e).indexOf(n)}function a(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):x?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function l(){var e=n.body;return e||(e=a(x?"svg":"body"),e.fake=!0),e}function u(e,t,o,r){var s,i,u,f,p="modernizr",c=a("div"),d=l();if(parseInt(o,10))for(;o--;)u=a("div"),u.id=r?r[o]:p+(o+1),c.appendChild(u);return s=a("style"),s.type="text/css",s.id="s"+p,(d.fake?d:c).appendChild(s),d.appendChild(c),s.styleSheet?s.styleSheet.cssText=e:s.appendChild(n.createTextNode(e)),c.id=p,d.fake&&(d.style.background="",d.style.overflow="hidden",f=C.style.overflow,C.style.overflow="hidden",C.appendChild(d)),i=t(c,e),d.fake?(d.parentNode.removeChild(d),C.style.overflow=f,C.offsetHeight):c.parentNode.removeChild(c),!!i}function f(e){return e.replace(/([A-Z])/g,function(e,n){return"-"+n.toLowerCase()}).replace(/^ms-/,"-ms-")}function p(n,o){var r=n.length;if("CSS"in e&&"supports"in e.CSS){for(;r--;)if(e.CSS.supports(f(n[r]),o))return!0;return!1}if("CSSSupportsRule"in e){for(var s=[];r--;)s.push("("+f(n[r])+":"+o+")");return s=s.join(" or "),u("@supports ("+s+") { #modernizr { position: absolute; } }",function(e){return"absolute"==getComputedStyle(e,null).position})}return t}function c(e){return e.replace(/([a-z])-([a-z])/g,function(e,n,t){return n+t.toUpperCase()}).replace(/^-/,"")}function d(e,n,r,s){function l(){f&&(delete T.style,delete T.modElem)}if(s=o(s,"undefined")?!1:s,!o(r,"undefined")){var u=p(e,r);if(!o(u,"undefined"))return u}for(var f,d,m,h,y,v=["modernizr","tspan"];!T.style;)f=!0,T.modElem=a(v.shift()),T.style=T.modElem.style;for(m=e.length,d=0;m>d;d++)if(h=e[d],y=T.style[h],i(h,"-")&&(h=c(h)),T.style[h]!==t){if(s||o(r,"undefined"))return l(),"pfx"==n?h:!0;try{T.style[h]=r}catch(g){}if(T.style[h]!=y)return l(),"pfx"==n?h:!0}return l(),!1}function m(e,n){return function(){return e.apply(n,arguments)}}function h(e,n,t){var r;for(var s in e)if(e[s]in n)return t===!1?e[s]:(r=n[e[s]],o(r,"function")?m(r,t||n):r);return!1}function y(e,n,t,r,s){var i=e.charAt(0).toUpperCase()+e.slice(1),a=(e+" "+k.join(i+" ")+i).split(" ");return o(n,"string")||o(n,"undefined")?d(a,n,r,s):(a=(e+" "+M.join(i+" ")+i).split(" "),h(a,n,t))}function v(e,n,o){return y(e,t,t,n,o)}var g=[],w={_version:"3.2.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){g.push({name:e,fn:n,options:t})},addAsyncTest:function(e){g.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=w,Modernizr=new Modernizr;var S=[],C=n.documentElement,x="svg"===C.nodeName.toLowerCase(),b=function(){},z=function(){};e.console&&(b=function(){var n=console.error?"error":"log";e.console[n].apply(e.console,Array.prototype.slice.call(arguments))},z=function(){var n=console.warn?"warn":"log";e.console[n].apply(e.console,Array.prototype.slice.call(arguments))}),w.load=function(){"yepnope"in e?(z("yepnope.js (aka Modernizr.load) is no longer included as part of Modernizr. yepnope appears to be available on the page, so we’ll use it to handle this call to Modernizr.load, but please update your code to use yepnope directly.\n See http://github.com/Modernizr/Modernizr/issues/1182 for more information."),e.yepnope.apply(e,[].slice.call(arguments,0))):b("yepnope.js (aka Modernizr.load) is no longer included as part of Modernizr. Get it from http://yepnopejs.com. See http://github.com/Modernizr/Modernizr/issues/1182 for more information.")};var _={elem:a("modernizr")};Modernizr._q.push(function(){delete _.elem});var T={style:_.elem.style};Modernizr._q.unshift(function(){delete T.style});var P=(w.testProp=function(e,n,o){return d([e],t,n,o)},w._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):[]);w._prefixes=P;var j=w.testStyles=u;Modernizr.addTest("touchevents",function(){var t;if("ontouchstart"in e||e.DocumentTouch&&n instanceof DocumentTouch)t=!0;else{var o=["@media (",P.join("touch-enabled),("),"heartz",")","{#modernizr{top:9px;position:absolute}}"].join("");j(o,function(e){t=9===e.offsetTop})}return t}),Modernizr.addTest("opacity",function(){var e=a("a").style;return e.cssText=P.join("opacity:.55;"),/^0.55$/.test(e.opacity)});var E="Moz O ms Webkit",k=w._config.usePrefixes?E.split(" "):[];w._cssomPrefixes=k;var M=w._config.usePrefixes?E.toLowerCase().split(" "):[];w._domPrefixes=M,w.testAllProps=y,w.testAllProps=v,Modernizr.addTest("csstransforms",function(){return-1===navigator.userAgent.indexOf("Android 2.")&&v("transform","scale(1)",!0)});var N="CSS"in e&&"supports"in e.CSS,A="supportsCSS"in e;Modernizr.addTest("supports",N||A),Modernizr.addTest("csstransforms3d",function(){var e=!!v("perspective","1px",!0),n=Modernizr._config.usePrefixes;if(e&&(!n||"webkitPerspective"in C.style)){var t,o="#modernizr{width:0;height:0}";Modernizr.supports?t="@supports (perspective: 1px)":(t="@media (transform-3d)",n&&(t+=",(-webkit-transform-3d)")),t+="{#modernizr{width:7px;height:18px;margin:0;padding:0;border:0}}",j(o+t,function(n){e=7===n.offsetWidth&&18===n.offsetHeight})}return e}),Modernizr.addTest("svg",!!n.createElementNS&&!!n.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect),r(),s(S),delete w.addTest,delete w.addAsyncTest;for(var q=0;q<Modernizr._q.length;q++)Modernizr._q[q]();e.Modernizr=Modernizr}(window,document);