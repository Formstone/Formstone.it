/*! 
 * Formstone v1.0.0 [2016-03-06] 
 * Formstone website. 
 * Ben Plum 
 */

var _self="undefined"!=typeof window?window:"undefined"!=typeof WorkerGlobalScope&&self instanceof WorkerGlobalScope?self:{},Prism=function(){var a=/\blang(?:uage)?-(?!\*)(\w+)\b/i,b=_self.Prism={util:{encode:function(a){return a instanceof c?new c(a.type,b.util.encode(a.content),a.alias):"Array"===b.util.type(a)?a.map(b.util.encode):a.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/\u00a0/g," ")},type:function(a){return Object.prototype.toString.call(a).match(/\[object (\w+)\]/)[1]},clone:function(a){var c=b.util.type(a);switch(c){case"Object":var d={};for(var e in a)a.hasOwnProperty(e)&&(d[e]=b.util.clone(a[e]));return d;case"Array":return a.map&&a.map(function(a){return b.util.clone(a)})}return a}},languages:{extend:function(a,c){var d=b.util.clone(b.languages[a]);for(var e in c)d[e]=c[e];return d},insertBefore:function(a,c,d,e){e=e||b.languages;var f=e[a];if(2==arguments.length){d=arguments[1];for(var g in d)d.hasOwnProperty(g)&&(f[g]=d[g]);return f}var h={};for(var i in f)if(f.hasOwnProperty(i)){if(i==c)for(var g in d)d.hasOwnProperty(g)&&(h[g]=d[g]);h[i]=f[i]}return b.languages.DFS(b.languages,function(b,c){c===e[a]&&b!=a&&(this[b]=h)}),e[a]=h},DFS:function(a,c,d){for(var e in a)a.hasOwnProperty(e)&&(c.call(a,e,a[e],d||e),"Object"===b.util.type(a[e])?b.languages.DFS(a[e],c):"Array"===b.util.type(a[e])&&b.languages.DFS(a[e],c,e))}},plugins:{},highlightAll:function(a,c){for(var d,e=document.querySelectorAll('code[class*="language-"], [class*="language-"] code, code[class*="lang-"], [class*="lang-"] code'),f=0;d=e[f++];)b.highlightElement(d,a===!0,c)},highlightElement:function(c,d,e){for(var f,g,h=c;h&&!a.test(h.className);)h=h.parentNode;h&&(f=(h.className.match(a)||[,""])[1],g=b.languages[f]),c.className=c.className.replace(a,"").replace(/\s+/g," ")+" language-"+f,h=c.parentNode,/pre/i.test(h.nodeName)&&(h.className=h.className.replace(a,"").replace(/\s+/g," ")+" language-"+f);var i=c.textContent,j={element:c,language:f,grammar:g,code:i};if(!i||!g)return void b.hooks.run("complete",j);if(b.hooks.run("before-highlight",j),d&&_self.Worker){var k=new Worker(b.filename);k.onmessage=function(a){j.highlightedCode=a.data,b.hooks.run("before-insert",j),j.element.innerHTML=j.highlightedCode,e&&e.call(j.element),b.hooks.run("after-highlight",j),b.hooks.run("complete",j)},k.postMessage(JSON.stringify({language:j.language,code:j.code,immediateClose:!0}))}else j.highlightedCode=b.highlight(j.code,j.grammar,j.language),b.hooks.run("before-insert",j),j.element.innerHTML=j.highlightedCode,e&&e.call(c),b.hooks.run("after-highlight",j),b.hooks.run("complete",j)},highlight:function(a,d,e){var f=b.tokenize(a,d);return c.stringify(b.util.encode(f),e)},tokenize:function(a,c,d){var e=b.Token,f=[a],g=c.rest;if(g){for(var h in g)c[h]=g[h];delete c.rest}a:for(var h in c)if(c.hasOwnProperty(h)&&c[h]){var i=c[h];i="Array"===b.util.type(i)?i:[i];for(var j=0;j<i.length;++j){var k=i[j],l=k.inside,m=!!k.lookbehind,n=0,o=k.alias;k=k.pattern||k;for(var p=0;p<f.length;p++){var q=f[p];if(f.length>a.length)break a;if(!(q instanceof e)){k.lastIndex=0;var r=k.exec(q);if(r){m&&(n=r[1].length);var s=r.index-1+n,r=r[0].slice(n),t=r.length,u=s+t,v=q.slice(0,s+1),w=q.slice(u+1),x=[p,1];v&&x.push(v);var y=new e(h,l?b.tokenize(r,l):r,o);x.push(y),w&&x.push(w),Array.prototype.splice.apply(f,x)}}}}}return f},hooks:{all:{},add:function(a,c){var d=b.hooks.all;d[a]=d[a]||[],d[a].push(c)},run:function(a,c){var d=b.hooks.all[a];if(d&&d.length)for(var e,f=0;e=d[f++];)e(c)}}},c=b.Token=function(a,b,c){this.type=a,this.content=b,this.alias=c};if(c.stringify=function(a,d,e){if("string"==typeof a)return a;if("Array"===b.util.type(a))return a.map(function(b){return c.stringify(b,d,a)}).join("");var f={type:a.type,content:c.stringify(a.content,d,e),tag:"span",classes:["token",a.type],attributes:{},language:d,parent:e};if("comment"==f.type&&(f.attributes.spellcheck="true"),a.alias){var g="Array"===b.util.type(a.alias)?a.alias:[a.alias];Array.prototype.push.apply(f.classes,g)}b.hooks.run("wrap",f);var h="";for(var i in f.attributes)h+=(h?" ":"")+i+'="'+(f.attributes[i]||"")+'"';return"<"+f.tag+' class="'+f.classes.join(" ")+'" '+h+">"+f.content+"</"+f.tag+">"},!_self.document)return _self.addEventListener?(_self.addEventListener("message",function(a){var c=JSON.parse(a.data),d=c.language,e=c.code,f=c.immediateClose;_self.postMessage(b.highlight(e,b.languages[d],d)),f&&_self.close()},!1),_self.Prism):_self.Prism;var d=document.getElementsByTagName("script");return d=d[d.length-1],d&&(b.filename=d.src,document.addEventListener&&!d.hasAttribute("data-manual")&&document.addEventListener("DOMContentLoaded",b.highlightAll)),_self.Prism}();"undefined"!=typeof module&&module.exports&&(module.exports=Prism),"undefined"!=typeof global&&(global.Prism=Prism),Prism.languages.markup={comment:/<!--[\w\W]*?-->/,prolog:/<\?[\w\W]+?\?>/,doctype:/<!DOCTYPE[\w\W]+?>/,cdata:/<!\[CDATA\[[\w\W]*?]]>/i,tag:{pattern:/<\/?(?!\d)[^\s>\/=.$<]+(?:\s+[^\s>\/=]+(?:=(?:("|')(?:\\\1|\\?(?!\1)[\w\W])*\1|[^\s'">=]+))?)*\s*\/?>/i,inside:{tag:{pattern:/^<\/?[^\s>\/]+/i,inside:{punctuation:/^<\/?/,namespace:/^[^\s>\/:]+:/}},"attr-value":{pattern:/=(?:('|")[\w\W]*?(\1)|[^\s>]+)/i,inside:{punctuation:/[=>"']/}},punctuation:/\/?>/,"attr-name":{pattern:/[^\s>\/]+/,inside:{namespace:/^[^\s>\/:]+:/}}}},entity:/&#?[\da-z]{1,8};/i},Prism.hooks.add("wrap",function(a){"entity"===a.type&&(a.attributes.title=a.content.replace(/&amp;/,"&"))}),Prism.languages.xml=Prism.languages.markup,Prism.languages.html=Prism.languages.markup,Prism.languages.mathml=Prism.languages.markup,Prism.languages.svg=Prism.languages.markup,Prism.languages.css={comment:/\/\*[\w\W]*?\*\//,atrule:{pattern:/@[\w-]+?.*?(;|(?=\s*\{))/i,inside:{rule:/@[\w-]+/}},url:/url\((?:(["'])(\\(?:\r\n|[\w\W])|(?!\1)[^\\\r\n])*\1|.*?)\)/i,selector:/[^\{\}\s][^\{\};]*?(?=\s*\{)/,string:/("|')(\\(?:\r\n|[\w\W])|(?!\1)[^\\\r\n])*\1/,property:/(\b|\B)[\w-]+(?=\s*:)/i,important:/\B!important\b/i,"function":/[-a-z0-9]+(?=\()/i,punctuation:/[(){};:]/},Prism.languages.css.atrule.inside.rest=Prism.util.clone(Prism.languages.css),Prism.languages.markup&&(Prism.languages.insertBefore("markup","tag",{style:{pattern:/(<style[\w\W]*?>)[\w\W]*?(?=<\/style>)/i,lookbehind:!0,inside:Prism.languages.css,alias:"language-css"}}),Prism.languages.insertBefore("inside","attr-value",{"style-attr":{pattern:/\s*style=("|').*?\1/i,inside:{"attr-name":{pattern:/^\s*style/i,inside:Prism.languages.markup.tag.inside},punctuation:/^\s*=\s*['"]|['"]\s*$/,"attr-value":{pattern:/.+/i,inside:Prism.languages.css}},alias:"language-css"}},Prism.languages.markup.tag)),Prism.languages.clike={comment:[{pattern:/(^|[^\\])\/\*[\w\W]*?\*\//,lookbehind:!0},{pattern:/(^|[^\\:])\/\/.*/,lookbehind:!0}],string:/(["'])(\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/,"class-name":{pattern:/((?:\b(?:class|interface|extends|implements|trait|instanceof|new)\s+)|(?:catch\s+\())[a-z0-9_\.\\]+/i,lookbehind:!0,inside:{punctuation:/(\.|\\)/}},keyword:/\b(if|else|while|do|for|return|in|instanceof|function|new|try|throw|catch|finally|null|break|continue)\b/,"boolean":/\b(true|false)\b/,"function":/[a-z0-9_]+(?=\()/i,number:/\b-?(?:0x[\da-f]+|\d*\.?\d+(?:e[+-]?\d+)?)\b/i,operator:/--?|\+\+?|!=?=?|<=?|>=?|==?=?|&&?|\|\|?|\?|\*|\/|~|\^|%/,punctuation:/[{}[\];(),.:]/},Prism.languages.javascript=Prism.languages.extend("clike",{keyword:/\b(as|async|await|break|case|catch|class|const|continue|debugger|default|delete|do|else|enum|export|extends|finally|for|from|function|get|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|set|static|super|switch|this|throw|try|typeof|var|void|while|with|yield)\b/,number:/\b-?(0x[\dA-Fa-f]+|0b[01]+|0o[0-7]+|\d*\.?\d+([Ee][+-]?\d+)?|NaN|Infinity)\b/,"function":/[_$a-zA-Z\xA0-\uFFFF][_$a-zA-Z0-9\xA0-\uFFFF]*(?=\()/i}),Prism.languages.insertBefore("javascript","keyword",{regex:{pattern:/(^|[^/])\/(?!\/)(\[.+?]|\\.|[^/\\\r\n])+\/[gimyu]{0,5}(?=\s*($|[\r\n,.;})]))/,lookbehind:!0}}),Prism.languages.insertBefore("javascript","class-name",{"template-string":{pattern:/`(?:\\`|\\?[^`])*`/,inside:{interpolation:{pattern:/\$\{[^}]+\}/,inside:{"interpolation-punctuation":{pattern:/^\$\{|\}$/,alias:"punctuation"},rest:Prism.languages.javascript}},string:/[\s\S]+/}}}),Prism.languages.markup&&Prism.languages.insertBefore("markup","tag",{script:{pattern:/(<script[\w\W]*?>)[\w\W]*?(?=<\/script>)/i,lookbehind:!0,inside:Prism.languages.javascript,alias:"language-javascript"}}),Prism.languages.js=Prism.languages.javascript,function(){"undefined"!=typeof self&&self.Prism&&self.document&&document.querySelector&&(self.Prism.fileHighlight=function(){var a={js:"javascript",html:"markup",svg:"markup",xml:"markup",py:"python",rb:"ruby",ps1:"powershell",psm1:"powershell"};Array.prototype.forEach&&Array.prototype.slice.call(document.querySelectorAll("pre[data-src]")).forEach(function(b){for(var c,d=b.getAttribute("data-src"),e=b,f=/\blang(?:uage)?-(?!\*)(\w+)\b/i;e&&!f.test(e.className);)e=e.parentNode;if(e&&(c=(b.className.match(f)||[,""])[1]),!c){var g=(d.match(/\.(\w+)$/)||[,""])[1];c=a[g]||g}var h=document.createElement("code");h.className="language-"+c,b.textContent="",h.textContent="Loading…",b.appendChild(h);var i=new XMLHttpRequest;i.open("GET",d,!0),i.onreadystatechange=function(){4==i.readyState&&(i.status<400&&i.responseText?(h.textContent=i.responseText,Prism.highlightElement(h)):i.status>=400?h.textContent="✖ Error "+i.status+" while fetching file: "+i.statusText:h.textContent="✖ Error: File does not exist or is empty")},i.send(null)})},self.Prism.fileHighlight())}();
//# sourceMappingURL=site-prism.js.map