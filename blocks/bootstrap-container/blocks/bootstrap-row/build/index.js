(()=>{"use strict";var r,e={901:()=>{const r=window.wp.blocks,e=window.React,t=window.wp.blockEditor;function o(r){var e,t,n="";if("string"==typeof r||"number"==typeof r)n+=r;else if("object"==typeof r)if(Array.isArray(r)){var s=r.length;for(e=0;e<s;e++)r[e]&&(t=o(r[e]))&&(n&&(n+=" "),n+=t)}else for(t in r)r[t]&&(n&&(n+=" "),n+=t);return n}const n=function(){for(var r,e,t=0,n="",s=arguments.length;t<s;t++)(r=arguments[t])&&(e=o(r))&&(n&&(n+=" "),n+=e);return n},s=JSON.parse('{"UU":"bca/bootstrap-row"}');(0,r.registerBlockType)(s.UU,{edit:function({attributes:r,setAttributes:o}){const s=(0,t.useBlockProps)({className:n({row:!0})}),a=(0,t.useInnerBlocksProps)(s);return(0,e.createElement)("div",{...a})},save:function({attributes:r}){const o=t.useBlockProps.save({className:n({row:!0})}),s=t.useInnerBlocksProps.save(o);return(0,e.createElement)("div",{...s})}})}},t={};function o(r){var n=t[r];if(void 0!==n)return n.exports;var s=t[r]={exports:{}};return e[r](s,s.exports,o),s.exports}o.m=e,r=[],o.O=(e,t,n,s)=>{if(!t){var a=1/0;for(u=0;u<r.length;u++){for(var[t,n,s]=r[u],i=!0,c=0;c<t.length;c++)(!1&s||a>=s)&&Object.keys(o.O).every((r=>o.O[r](t[c])))?t.splice(c--,1):(i=!1,s<a&&(a=s));if(i){r.splice(u--,1);var l=n();void 0!==l&&(e=l)}}return e}s=s||0;for(var u=r.length;u>0&&r[u-1][2]>s;u--)r[u]=r[u-1];r[u]=[t,n,s]},o.o=(r,e)=>Object.prototype.hasOwnProperty.call(r,e),(()=>{var r={57:0,350:0};o.O.j=e=>0===r[e];var e=(e,t)=>{var n,s,[a,i,c]=t,l=0;if(a.some((e=>0!==r[e]))){for(n in i)o.o(i,n)&&(o.m[n]=i[n]);if(c)var u=c(o)}for(e&&e(t);l<a.length;l++)s=a[l],o.o(r,s)&&r[s]&&r[s][0](),r[s]=0;return o.O(u)},t=globalThis.webpackChunkbootstrap_container=globalThis.webpackChunkbootstrap_container||[];t.forEach(e.bind(null,0)),t.push=e.bind(null,t.push.bind(t))})();var n=o.O(void 0,[350],(()=>o(901)));n=o.O(n)})();