(()=>{"use strict";var e,t={736:()=>{const e=window.wp.blocks,t=window.React,n=window.wp.blockEditor;function r(e){var t,n,o="";if("string"==typeof e||"number"==typeof e)o+=e;else if("object"==typeof e)if(Array.isArray(e)){var l=e.length;for(t=0;t<l;t++)e[t]&&(n=r(e[t]))&&(o&&(o+=" "),o+=n)}else for(n in e)e[n]&&(o&&(o+=" "),o+=n);return o}const o=function(){for(var e,t,n=0,o="",l=arguments.length;n<l;n++)(e=arguments[n])&&(t=r(e))&&(o&&(o+=" "),o+=t);return o},l=window.wp.components;function a({value:e,callback:n}){return(0,t.createElement)(l.__experimentalToggleGroupControl,{__nextHasNoMarginBottom:!0,isBlock:!0,label:"Row alignment",onChange:n,value:e||"justify-content-start"},[{value:"justify-content-start",label:"Left"},{value:"justify-content-center",label:"Center"},{value:"justify-content-end",label:"Right"}].map((e=>{const n=e.label,r=e.value;return(0,t.createElement)(l.__experimentalToggleGroupControlOption,{label:n,value:r})})))}function s({attributes:e,setAttributes:r}){const{rowAlignment:o}=e;return(0,t.createElement)(n.InspectorControls,null,(0,t.createElement)(l.PanelBody,{title:"Settings",initialOpen:!0},(0,t.createElement)(a,{value:o,callback:e=>{r({rowAlignment:e})}})))}const i=JSON.parse('{"UU":"bca/bootstrap-row"}');(0,e.registerBlockType)(i.UU,{edit:function({attributes:e,setAttributes:r}){const{rowAlignment:l}=e,a=(0,n.useBlockProps)({className:o({row:!0,[l]:null!=l?l:""})}),i=(0,n.useInnerBlocksProps)(a);return(0,t.createElement)(t.Fragment,null,(0,t.createElement)(s,{attributes:e,setAttributes:r}),(0,t.createElement)("div",{...i}))},save:function({attributes:e}){const{rowAlignment:r}=e,l=n.useBlockProps.save({className:o({row:!0,[r]:null!=r?r:""})}),a=n.useInnerBlocksProps.save(l);return(0,t.createElement)("div",{...a})}})}},n={};function r(e){var o=n[e];if(void 0!==o)return o.exports;var l=n[e]={exports:{}};return t[e](l,l.exports,r),l.exports}r.m=t,e=[],r.O=(t,n,o,l)=>{if(!n){var a=1/0;for(u=0;u<e.length;u++){for(var[n,o,l]=e[u],s=!0,i=0;i<n.length;i++)(!1&l||a>=l)&&Object.keys(r.O).every((e=>r.O[e](n[i])))?n.splice(i--,1):(s=!1,l<a&&(a=l));if(s){e.splice(u--,1);var c=o();void 0!==c&&(t=c)}}return t}l=l||0;for(var u=e.length;u>0&&e[u-1][2]>l;u--)e[u]=e[u-1];e[u]=[n,o,l]},r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={57:0,350:0};r.O.j=t=>0===e[t];var t=(t,n)=>{var o,l,[a,s,i]=n,c=0;if(a.some((t=>0!==e[t]))){for(o in s)r.o(s,o)&&(r.m[o]=s[o]);if(i)var u=i(r)}for(t&&t(n);c<a.length;c++)l=a[c],r.o(e,l)&&e[l]&&e[l][0](),e[l]=0;return r.O(u)},n=globalThis.webpackChunkbootstrap_container=globalThis.webpackChunkbootstrap_container||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))})();var o=r.O(void 0,[350],(()=>r(736)));o=r.O(o)})();