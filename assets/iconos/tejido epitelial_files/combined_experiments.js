!function(){var e={24898:function(){!function(e){var t=e.slideshare_object.utils;function n(e){this._groups=this._validateGroups(e)}n.prototype={isValid:function(){return this._groups.length>0},containsUser:function(){return this._groups.some((function(e){var t=this._getValidationMethod(e);return t&&t.call(this)}),this)},_validateGroups:function(e){return(e=t.isArray(e)?e:[e]).filter((function(e){return-1!==n.GROUPS.indexOf(e)}))},_getValidationMethod:function(e){return this["_userIs"+e.charAt(0).toUpperCase()+e.slice(1)]},_getUser:function(){return e.slideshare_object.user},_userIsSuperuser:function(){var e=this._getUser();return e&&e.su},_userIsCompany:function(){var e=this._getUser();return e&&e.li}},n.GROUPS=["superuser","company"],t.exports("Whitelist",n)}(window)},64219:function(){!function(e,t){var n=e.slideshare_object.utils,r=n.imports("Whitelist");function i(){var e=t[i.LS_NAMESPACE]&&JSON.parse(t[i.LS_NAMESPACE]);this._experiments=e||{}}i.prototype={is:function(e,t){return this.getBucket(e)===t},getExperiment:function(e){return this._experiments[e]},getBucket:function(e){var t=this.getExperiment(e);return t&&t.bucket},isOverride:function(e){var t=this.getExperiment(e);return t&&t.override},deleteExperiment:function(e){return this.isOverride(e)?null:(delete this._experiments[e],this._save())},addClass:function(e,t){var r=this.getBucket(t);return r&&n.addClass(e,"exp--"+n.sanitizeForCSS(t)+"--"+n.sanitizeForCSS(r)),this},register:function(e,t,n){var i=new r(n),s=this.getBucket(e);if(i.isValid()){if(i.containsUser()){if(!s)return this._save(e,this._assign(t))}else if(s)return this.deleteExperiment(e)}else if(!s)return this._save(e,this._assign(t));return s},override:function(e,t){return this._save(e,this._assign(t),!0)},ga:function(e,t,n,r,i,s){var o=this.getBucket(e);return o&&_gaq.push(["_trackEvent",t,n,o+"_"+r,i,!!s]),null},_assign:function(e){return n.isNumber(e)&&(e=[e]),n.isArray(e)?this._assignFromArray(e):n.isPlainObject(e)?this._assignFromObject(e):n.isString(e)?e:null},_assignFromArray:function(e,t){var n,r,s=Math.random();for(t=t||i.BUCKETS,100!==e[e.length-1]&&e.push(100),n=0,r=e.length;n<r;n++)if(s<=e[n]/100)return t[n]||i.BUCKETS[n];return null},_assignFromObject:function(e){var t,n=[],r=[];for(t in e)n.push(t),r.push(e[t]);return this._assignFromArray(r,n)},_save:function(e,n,r){var s=this._experiments;return n=n||null,e&&(s[e]={bucket:n},r&&(s[e].override=!0)),t[i.LS_NAMESPACE]=JSON.stringify(this._experiments),n}},i.BUCKETS="a b c d e f".split(" "),i.LS_NAMESPACE="slideshare.experiments",n.exports("Experiments",i)}(window,window.localStorage||{})},46707:function(){var e;(e=new(window.slideshare_object.utils.imports("Experiments"))).deleteExperiment("slideview-clickgen-cta"),e.register("slideview-clickgen-cta-2",{b:100})},23171:function(){var e;(e=new(window.slideshare_object.utils.imports("Experiments"))).deleteExperiment("slideview-clip-button"),e.deleteExperiment("slideview-clip-button-exp-2"),e.deleteExperiment("slideview-clip-button-exp-3")},28710:function(){!function(e){var t="slideshare_object",n=t+"._modules.",r=t+"._i18n.",i=!1,s=/[^a-zA-Z\d\-_]/g,o=Object.prototype.toString,u={},a={en:"en_US",fr:"fr_FR",es:"es_ES",pt:"pt_BR",de:"de_DE"};function c(e,t){return o.call(e)===t}function l(t,n){for(var r,i=t.split("."),s=i.length,o=e,u=0;u<s;u++){if(!o[r=i[u]]){if(!n)return null;o[r]=u+1===s?n:{}}o=o[r]}return o}u.i18n_locale=function(){if(!i){var e=document.documentElement.lang||"en";i=a[e]||a.en}return i},u.isString=function(e){return c(e,"[object String]")},u.isNumber=function(e){return c(e,"[object Number]")},u.isArray=function(e){return c(e,"[object Array]")},u.isPlainObject=function(e){return c(e,"[object Object]")},u.addClass=function(e,t){return(e=e&&1===e.nodeType?e:document.querySelector(e))?(e.className?new RegExp("\\b"+t+"\\b").test(e.className)||(e.className+=" "+t):e.className=t,e):null},u.sanitizeForCSS=function(e){return e.replace(s,"-")},u.isUserAuthenticated=function(){var n=e[t].user;return"non-member"!==n.member_type&&!1!==n.loggedin&&"guest"!==n.login},u.isResponsive=function(){return window.innerWidth<928},u.i18n=function(t,n){var s;if(l(r)||(s=e.document.querySelectorAll('meta[name="ss-i18n-translations"]'),u.i18n_locale(),Array.prototype.slice.call(s).forEach((function(e){var t=JSON.parse(e.content);Object.keys(t).forEach((function(e){l(r+e,t[e])}))}))),t){var o=l(r+t);if(o&&n&&window.xmessage){var a=window.xmessage.fromString(o,i);Array.isArray(n)||(n=[n]),o=a(n)}return o}return l(r.slice(0,-1))},u.exports=function(e,t){l(n+e,t)},u.imports=function(e){return l(n+e)},l(t+".utils",u)}(window)}},t={};function n(r){var i=t[r];if(void 0!==i)return i.exports;var s=t[r]={exports:{}};return e[r](s,s.exports,n),s.exports}n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,{a:t}),t},n.d=function(e,t){for(var r in t)n.o(t,r)&&!n.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},n.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},("undefined"!=typeof window?window:void 0!==n.g?n.g:"undefined"!=typeof self?self:{}).SENTRY_RELEASE={id:"cbe0b66ee2acc93337d9365f0dc76f4dd29ca056"},function(){"use strict";n(28710),n(24898),n(64219),n(23171),n(46707)}()}();
//# sourceMappingURL=combined_experiments.f67f4a033a1ea4eac65c.js.map