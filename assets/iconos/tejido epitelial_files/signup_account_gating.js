!function(){var e={86544:function(e,t){"use strict";let n;t.Z=e=>{const t={from_source:e.from_source||"/",initial_view:e.initial_view||"join",slideshow_id:e.slideshow_id,slideshow_key:e.slideshow_key,device_id:"undefined"!=typeof amplitude&&amplitude.getInstance()&&amplitude.getInstance().options?amplitude.getInstance().options.deviceId:"",download:e.isDownload},o=new FormData;for(let[e,n]of Object.entries(t))n&&o.append(e,n);(n=n||new Promise(((e,t)=>{const n=document.querySelector('meta[name="csrf-token"]');if(n)return e(n.getAttribute("content"));fetch("/csrf_token",{credentials:"same-origin",method:"GET"}).then((e=>{if(e.ok)return e.json();t(`http error: ${e.status}`)})).then((t=>e(t.csrf_token)))})),n).then((e=>fetch("/scribd/authorize",{credentials:"same-origin",headers:{"X-CSRF-Token":e},method:"POST",body:o}).then((e=>e.json())).then((e=>{const t=document.createElement("form");t.setAttribute("action",e.url),t.setAttribute("method","POST");for(let[n,o]of Object.entries(e.params)){const e=document.createElement("input");e.setAttribute("type","hidden"),e.setAttribute("name",n),e.value=o,t.appendChild(e)}document.body.appendChild(t),t.submit()}))))}}},t={};function n(o){var i=t[o];if(void 0!==i)return i.exports;var r=t[o]={exports:{}};return e[o](r,r.exports,n),r.exports}n.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),("undefined"!=typeof window?window:void 0!==n.g?n.g:"undefined"!=typeof self?self:{}).SENTRY_RELEASE={id:"cbe0b66ee2acc93337d9365f0dc76f4dd29ca056"},function(){"use strict";var e=n(86544);$((function(){$(".signup-account-gating").click((function(t){t.preventDefault(),t.stopPropagation();const n=$(this).data("return-to")||location.href;(0,e.Z)({from_source:n})}))}))}()}();
//# sourceMappingURL=signup_account_gating.fdb14cc9317798bb6ece.js.map