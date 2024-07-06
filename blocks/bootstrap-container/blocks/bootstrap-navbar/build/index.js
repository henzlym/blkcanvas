(()=>{"use strict";var e,a={448:()=>{const e=window.wp.blocks,a=JSON.parse('{"UU":"create-block/bootstrap-navbar"}'),t=window.React,n=window.wp.blockEditor,r=window.wp.components,l=window.wp.coreData,o=window.wp.data;function s({attributes:e,setAttributes:a}){const{selectedMenu:s,enableSearch:c,searchLabel:i,searchPlaceholder:d,searchButtonText:u,navbarBrandMaxWidth:m,fullWidth:b,backgroundColor:h,linkColor:p}=e,g=(0,o.useSelect)((e=>e(l.store).getMenus()),[]),v=g?g.map((e=>({value:e.id,label:e.name}))):[];return(0,t.createElement)(n.InspectorControls,null,(0,t.createElement)(r.PanelBody,{title:"Navbar Settings",initialOpen:!0},(0,t.createElement)(r.SelectControl,{label:"Select Menu",value:s,options:[{value:"",label:"None"},...v],onChange:e=>a({selectedMenu:parseInt(e)})}),(0,t.createElement)(r.ToggleControl,{label:"Enable Search Form",checked:c,onChange:e=>a({enableSearch:e})}),c&&(0,t.createElement)(t.Fragment,null,(0,t.createElement)(r.TextControl,{label:"Search Input Label",value:i,onChange:e=>a({searchLabel:e})}),(0,t.createElement)(r.TextControl,{label:"Search Input Placeholder",value:d,onChange:e=>a({searchPlaceholder:e})}),(0,t.createElement)(r.TextControl,{label:"Search Button Text",value:u,onChange:e=>a({searchButtonText:e})})),(0,t.createElement)(r.RangeControl,{label:"Navbar Brand Max Width (px)",value:m,onChange:e=>a({navbarBrandMaxWidth:e}),min:0,max:300}),(0,t.createElement)(r.ToggleControl,{label:"Full Width",checked:b,onChange:e=>a({fullWidth:e})})),(0,t.createElement)(n.PanelColorSettings,{title:"Color Settings",initialOpen:!1,colorSettings:[{value:h,onChange:e=>a({backgroundColor:e}),label:"Background Color"},{value:p,onChange:e=>a({linkColor:e}),label:"Link Color"}]}))}(0,e.registerBlockType)(a.UU,{edit:function({attributes:e,setAttributes:a}){const{navbarBrand:c,selectedMenu:i,enableSearch:d,searchLabel:u,searchPlaceholder:m,searchButtonText:b,navbarBrandMaxWidth:h,fullWidth:p,backgroundColor:g,linkColor:v}=e,E=(0,n.useBlockProps)({className:"navbar navbar-expand-lg bg-body-tertiary",style:{backgroundColor:g,color:v}}),{title:C}=(0,o.useSelect)((e=>{const a=e(l.store).getEntityRecord("root","__unstableBase");return{title:a?.name}}),[]),{menuItems:w}=function(e){const{records:a,isResolving:t,hasResolved:n}=(0,l.useEntityRecords)("root","menu",{per_page:-1,context:"view"}),{records:r,isResolving:o,hasResolved:s}=(0,l.useEntityRecords)("postType","page",{parent:0,order:"asc",orderby:"id",per_page:-1,context:"view"}),{records:c,hasResolved:i}=(0,l.useEntityRecords)("root","menuItem",{menus:e,per_page:-1,context:"view"},{enabled:!!e});return{pages:r,isResolvingPages:o,hasResolvedPages:s,hasPages:!(!s||!r?.length),menus:a,isResolvingMenus:t,hasResolvedMenus:n,hasMenus:!(!n||!a?.length),menuItems:c,hasResolvedMenuItems:i}}(i),f=()=>{a({navbarBrand:""})},k=(e,a=0)=>e.filter((e=>e.parent===a)).map((a=>{const n=e.filter((e=>e.parent===a.id));return(0,t.createElement)("li",{key:a.id,className:"nav-item "+(n.length>0?"dropdown":"")},(0,t.createElement)("a",{className:"nav-link "+(n.length>0?"dropdown-toggle":""),href:a.url,...n.length>0?{"data-bs-toggle":"dropdown"}:{}},a.title.rendered),n.length>0&&(0,t.createElement)("ul",{className:"dropdown-menu"},k(e,a.id)))}));return(0,t.createElement)("nav",{...E},(0,t.createElement)("div",{className:p?"container-fluid":"container"},c?(0,t.createElement)("img",{src:c,alt:C,className:"navbar-brand",style:{maxWidth:`${h}px`}}):(0,t.createElement)("a",{className:"navbar-brand",href:"#"},C),(0,t.createElement)(n.MediaUploadCheck,null,(0,t.createElement)(n.MediaUpload,{onSelect:e=>{a({navbarBrand:e.url})},allowedTypes:["image"],value:c,render:({open:e})=>(0,t.createElement)("div",null,(0,t.createElement)(r.Button,{onClick:e,variant:"primary"},c?"Change Image":"Upload Image"),c&&(0,t.createElement)(r.Button,{onClick:f,variant:"secondary",className:"ml-2"},"Remove Image"))})),(0,t.createElement)(s,{attributes:e,setAttributes:a}),(0,t.createElement)("button",{className:"navbar-toggler",type:"button","data-bs-toggle":"collapse","data-bs-target":"#navbarSupportedContent","aria-controls":"navbarSupportedContent","aria-expanded":"false","aria-label":"Toggle navigation"},(0,t.createElement)("span",{className:"navbar-toggler-icon"})),(0,t.createElement)("div",{className:"collapse navbar-collapse",id:"navbarSupportedContent"},i&&w&&(0,t.createElement)("ul",{className:"navbar-nav me-auto mb-2 mb-lg-0"},k(w)),d&&(0,t.createElement)("form",{className:"d-flex",role:"search"},(0,t.createElement)("label",{htmlFor:"navbarSearch",className:"visually-hidden"},u),(0,t.createElement)("input",{className:"form-control me-2",type:"search",id:"navbarSearch",placeholder:m,"aria-label":u}),(0,t.createElement)("button",{className:"btn btn-outline-success",type:"submit"},b)))))}})}},t={};function n(e){var r=t[e];if(void 0!==r)return r.exports;var l=t[e]={exports:{}};return a[e](l,l.exports,n),l.exports}n.m=a,e=[],n.O=(a,t,r,l)=>{if(!t){var o=1/0;for(d=0;d<e.length;d++){for(var[t,r,l]=e[d],s=!0,c=0;c<t.length;c++)(!1&l||o>=l)&&Object.keys(n.O).every((e=>n.O[e](t[c])))?t.splice(c--,1):(s=!1,l<o&&(o=l));if(s){e.splice(d--,1);var i=r();void 0!==i&&(a=i)}}return a}l=l||0;for(var d=e.length;d>0&&e[d-1][2]>l;d--)e[d]=e[d-1];e[d]=[t,r,l]},n.o=(e,a)=>Object.prototype.hasOwnProperty.call(e,a),(()=>{var e={57:0,350:0};n.O.j=a=>0===e[a];var a=(a,t)=>{var r,l,[o,s,c]=t,i=0;if(o.some((a=>0!==e[a]))){for(r in s)n.o(s,r)&&(n.m[r]=s[r]);if(c)var d=c(n)}for(a&&a(t);i<o.length;i++)l=o[i],n.o(e,l)&&e[l]&&e[l][0](),e[l]=0;return n.O(d)},t=globalThis.webpackChunkbootstrap_container=globalThis.webpackChunkbootstrap_container||[];t.forEach(a.bind(null,0)),t.push=a.bind(null,t.push.bind(t))})();var r=n.O(void 0,[350],(()=>n(448)));r=n.O(r)})();