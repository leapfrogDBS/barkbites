/*! For license information please see checkout-paylater-block.js.LICENSE.txt */
(()=>{"use strict";var e={n:t=>{var r=t&&t.__esModule?()=>t.default:()=>t;return e.d(r,{a:r}),r},d:(t,r)=>{for(var n in r)e.o(r,n)&&!e.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:r[n]})},o:(e,t)=>Object.prototype.hasOwnProperty.call(e,t)};const t=window.wp.blocks,r=window.wp.i18n,n=window.wp.element,a=window.wp.blockEditor,o=window.wp.components,c=window.React;var i,l,s,u=e.n(c);!function(e){e.INITIAL="initial",e.PENDING="pending",e.REJECTED="rejected",e.RESOLVED="resolved"}(i||(i={})),function(e){e.LOADING_STATUS="setLoadingStatus",e.RESET_OPTIONS="resetOptions",e.SET_BRAINTREE_INSTANCE="braintreeInstance"}(l||(l={})),function(e){e.NUMBER="number",e.CVV="cvv",e.EXPIRATION_DATE="expirationDate",e.EXPIRATION_MONTH="expirationMonth",e.EXPIRATION_YEAR="expirationYear",e.POSTAL_CODE="postalCode"}(s||(s={}));var p=function(){return p=Object.assign||function(e){for(var t,r=1,n=arguments.length;r<n;r++)for(var a in t=arguments[r])Object.prototype.hasOwnProperty.call(t,a)&&(e[a]=t[a]);return e},p.apply(this,arguments)};function f(e,t){var r={};for(var n in e)Object.prototype.hasOwnProperty.call(e,n)&&t.indexOf(n)<0&&(r[n]=e[n]);if(null!=e&&"function"==typeof Object.getOwnPropertySymbols){var a=0;for(n=Object.getOwnPropertySymbols(e);a<n.length;a++)t.indexOf(n[a])<0&&Object.prototype.propertyIsEnumerable.call(e,n[a])&&(r[n[a]]=e[n[a]])}return r}function d(e,t,r){if(r||2===arguments.length)for(var n,a=0,o=t.length;a<o;a++)!n&&a in t||(n||(n=Array.prototype.slice.call(t,0,a)),n[a]=t[a]);return e.concat(n||Array.prototype.slice.call(t))}var y="data-react-paypal-script-id",m="react-paypal-js",h="dataNamespace",v="dataSdkIntegrationSource",g="3.84.0",b=("https://js.braintreegateway.com/web/".concat(g,"/js/client.min.js"),"https://js.braintreegateway.com/web/".concat(g,"/js/paypal-checkout.min.js"),"paypal"),w="usePayPalScriptReducer must be used within a PayPalScriptProvider";function E(e){return void 0===e&&(e=b),window[e]}function P(e){var t=e.reactComponentName,r=e.sdkComponentKey,n=e.sdkRequestedComponents,a=void 0===n?"":n,o=e.sdkDataNamespace,c=void 0===o?b:o,i=r.charAt(0).toUpperCase().concat(r.substring(1)),l="Unable to render <".concat(t," /> because window.").concat(c,".").concat(i," is undefined."),s="string"==typeof a?a:a.join(",");if(!s.includes(r)){var u=[s,r].filter(Boolean).join();l+="\nTo fix the issue, add '".concat(r,"' to the list of components passed to the parent PayPalScriptProvider:")+"\n`<PayPalScriptProvider options={{ components: '".concat(u,"'}}>`.")}return l}function S(e){var t=e,r=y;t[r];var n=f(t,[r+""]);return"react-paypal-js-".concat(function(e){for(var t="",r=0;r<e.length;r++){var n=e[r].charCodeAt(0)*r;e[r+1]&&(n+=e[r+1].charCodeAt(0)*(r-1)),t+=String.fromCharCode(97+Math.abs(n)%26)}return t}(JSON.stringify(n)))}function k(e,t){var r,n,a,o;switch(t.type){case l.LOADING_STATUS:return"object"==typeof t.value?p(p({},e),{loadingStatus:t.value.state,loadingStatusErrorMessage:t.value.message}):p(p({},e),{loadingStatus:t.value});case l.RESET_OPTIONS:return a=e.options[y],(null==(o=self.document.querySelector("script[".concat(y,'="').concat(a,'"]')))?void 0:o.parentNode)&&o.parentNode.removeChild(o),p(p({},e),{loadingStatus:i.PENDING,options:p(p((r={},r[v]=m,r),t.value),(n={},n[y]="".concat(S(t.value)),n))});case l.SET_BRAINTREE_INSTANCE:return p(p({},e),{braintreePayPalCheckoutInstance:t.value});default:return e}}var N=(0,c.createContext)(null);function O(){var e=function(e){if("function"==typeof(null==e?void 0:e.dispatch)&&0!==e.dispatch.length)return e;throw new Error(w)}((0,c.useContext)(N));return[p(p({},e),{isInitial:e.loadingStatus===i.INITIAL,isPending:e.loadingStatus===i.PENDING,isResolved:e.loadingStatus===i.RESOLVED,isRejected:e.loadingStatus===i.REJECTED}),e.dispatch]}(0,c.createContext)({});var R=function(e){var t=e.className,r=void 0===t?"":t,n=e.disabled,a=void 0!==n&&n,o=e.children,i=e.forceReRender,l=void 0===i?[]:i,s=f(e,["className","disabled","children","forceReRender"]),y=a?{opacity:.38}:{},m="".concat(r," ").concat(a?"paypal-buttons-disabled":"").trim(),v=(0,c.useRef)(null),g=(0,c.useRef)(null),b=O()[0],w=b.isResolved,S=b.options,k=(0,c.useState)(null),N=k[0],j=k[1],_=(0,c.useState)(!0),L=_[0],I=_[1],C=(0,c.useState)(null)[1];function x(){null!==g.current&&g.current.close().catch((function(){}))}return(0,c.useEffect)((function(){if(!1===w)return x;var e=E(S.dataNamespace);if(void 0===e||void 0===e.Buttons)return C((function(){throw new Error(P({reactComponentName:R.displayName,sdkComponentKey:"buttons",sdkRequestedComponents:S.components,sdkDataNamespace:S[h]}))})),x;try{g.current=e.Buttons(p(p({},s),{onInit:function(e,t){j(t),"function"==typeof s.onInit&&s.onInit(e,t)}}))}catch(e){return C((function(){throw new Error("Failed to render <PayPalButtons /> component. Failed to initialize:  ".concat(e))}))}return!1===g.current.isEligible()?(I(!1),x):v.current?(g.current.render(v.current).catch((function(e){null!==v.current&&0!==v.current.children.length&&C((function(){throw new Error("Failed to render <PayPalButtons /> component. ".concat(e))}))})),x):x}),d(d([w],l,!0),[s.fundingSource],!1)),(0,c.useEffect)((function(){null!==N&&(!0===a?N.disable().catch((function(){})):N.enable().catch((function(){})))}),[a,N]),u().createElement(u().Fragment,null,L?u().createElement("div",{ref:v,style:y,className:m}):o)};function j(e,t){void 0===t&&(t={});var r=document.createElement("script");return r.src=e,Object.keys(t).forEach((function(e){r.setAttribute(e,t[e]),"data-csp-nonce"===e&&r.setAttribute("nonce",t["data-csp-nonce"])})),r}function _(e,t){if(void 0===t&&(t=Promise),I(e,t),"undefined"==typeof document)return t.resolve(null);var r=function(e){var t="https://www.paypal.com/sdk/js";e.sdkBaseUrl&&(t=e.sdkBaseUrl,delete e.sdkBaseUrl);var r,n,a=e,o=Object.keys(a).filter((function(e){return void 0!==a[e]&&null!==a[e]&&""!==a[e]})).reduce((function(e,t){var r,n=a[t].toString();return r=function(e,t){return(t?"-":"")+e.toLowerCase()},"data"===(t=t.replace(/[A-Z]+(?![a-z])|[A-Z]/g,r)).substring(0,4)||"crossorigin"===t?e.attributes[t]=n:e.queryParams[t]=n,e}),{queryParams:{},attributes:{}}),c=o.queryParams,i=o.attributes;return c["merchant-id"]&&-1!==c["merchant-id"].indexOf(",")&&(i["data-merchant-id"]=c["merchant-id"],c["merchant-id"]="*"),{url:"".concat(t,"?").concat((r=c,n="",Object.keys(r).forEach((function(e){0!==n.length&&(n+="&"),n+=e+"="+r[e]})),n)),attributes:i}}(e),n=r.url,a=r.attributes,o=a["data-namespace"]||"paypal",c=L(o);return a["data-js-sdk-library"]||(a["data-js-sdk-library"]="paypal-js"),function(e,t){var r=document.querySelector('script[src="'.concat(e,'"]'));if(null===r)return null;var n=j(e,t),a=r.cloneNode();if(delete a.dataset.uidAuto,Object.keys(a.dataset).length!==Object.keys(n.dataset).length)return null;var o=!0;return Object.keys(a.dataset).forEach((function(e){a.dataset[e]!==n.dataset[e]&&(o=!1)})),o?r:null}(n,a)&&c?t.resolve(c):function(e,t){void 0===t&&(t=Promise),I(e,t);var r=e.url,n=e.attributes;if("string"!=typeof r||0===r.length)throw new Error("Invalid url.");if(void 0!==n&&"object"!=typeof n)throw new Error("Expected attributes to be an object.");return new t((function(e,t){if("undefined"==typeof document)return e();!function(e){var t=e.url,r=e.attributes,n=e.onSuccess,a=e.onError,o=j(t,r);o.onerror=a,o.onload=n,document.head.insertBefore(o,document.head.firstElementChild)}({url:r,attributes:n,onSuccess:function(){return e()},onError:function(){var e=new Error('The script "'.concat(r,'" failed to load. Check the HTTP status code and response body in DevTools to learn more.'));return t(e)}})}))}({url:n,attributes:a},t).then((function(){var e=L(o);if(e)return e;throw new Error("The window.".concat(o," global variable is not available."))}))}function L(e){return window[e]}function I(e,t){if("object"!=typeof e||null===e)throw new Error("Expected an options object.");if(void 0!==t&&"function"!=typeof t)throw new Error("Expected PromisePonyfill to be a function.")}R.displayName="PayPalButtons";var C=function(e){var t=e.className,r=void 0===t?"":t,n=e.children,a=f(e,["className","children"]),o=O()[0],i=o.isResolved,l=o.options,s=(0,c.useRef)(null),d=(0,c.useState)(!0),y=d[0],m=d[1],v=(0,c.useState)(null)[1];return(0,c.useEffect)((function(){if(!1!==i){var e=E(l[h]);if(void 0===e||void 0===e.Marks)return v((function(){throw new Error(P({reactComponentName:C.displayName,sdkComponentKey:"marks",sdkRequestedComponents:l.components,sdkDataNamespace:l[h]}))}));!function(e){var t=s.current;if(!t||!e.isEligible())return m(!1);t.firstChild&&t.removeChild(t.firstChild),e.render(t).catch((function(e){null!==t&&0!==t.children.length&&v((function(){throw new Error("Failed to render <PayPalMarks /> component. ".concat(e))}))}))}(e.Marks(p({},a)))}}),[i,a.fundingSource]),u().createElement(u().Fragment,null,y?u().createElement("div",{ref:s,className:r}):n)};C.displayName="PayPalMarks";var x=function(e){var t=e.className,r=void 0===t?"":t,n=e.forceReRender,a=void 0===n?[]:n,o=f(e,["className","forceReRender"]),i=O()[0],l=i.isResolved,s=i.options,y=(0,c.useRef)(null),m=(0,c.useRef)(null),v=(0,c.useState)(null)[1];return(0,c.useEffect)((function(){if(!1!==l){var e=E(s[h]);if(void 0===e||void 0===e.Messages)return v((function(){throw new Error(P({reactComponentName:x.displayName,sdkComponentKey:"messages",sdkRequestedComponents:s.components,sdkDataNamespace:s[h]}))}));m.current=e.Messages(p({},o)),m.current.render(y.current).catch((function(e){null!==y.current&&0!==y.current.children.length&&v((function(){throw new Error("Failed to render <PayPalMessages /> component. ".concat(e))}))}))}}),d([l],a,!0)),u().createElement("div",{ref:y,className:r})};x.displayName="PayPalMessages";var A=function(e){var t,r=e.options,n=void 0===r?{clientId:"test"}:r,a=e.children,o=e.deferLoading,s=void 0!==o&&o,f=(0,c.useReducer)(k,{options:p(p({},n),(t={},t.dataJsSdkLibrary=m,t[v]=m,t[y]="".concat(S(n)),t)),loadingStatus:s?i.INITIAL:i.PENDING}),d=f[0],h=f[1];return(0,c.useEffect)((function(){if(!1===s&&d.loadingStatus===i.INITIAL)return h({type:l.LOADING_STATUS,value:i.PENDING});if(d.loadingStatus===i.PENDING){var e=!0;return _(d.options).then((function(){e&&h({type:l.LOADING_STATUS,value:i.RESOLVED})})).catch((function(t){console.error("".concat("Failed to load the PayPal JS SDK script."," ").concat(t)),e&&h({type:l.LOADING_STATUS,value:{state:i.REJECTED,message:String(t)}})})),function(){e=!1}}}),[d.options,s,d.loadingStatus]),u().createElement(N.Provider,{value:p(p({},d),{dispatch:h})},a)};function T(e){return T="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},T(e)}function D(){D=function(){return t};var e,t={},r=Object.prototype,n=r.hasOwnProperty,a=Object.defineProperty||function(e,t,r){e[t]=r.value},o="function"==typeof Symbol?Symbol:{},c=o.iterator||"@@iterator",i=o.asyncIterator||"@@asyncIterator",l=o.toStringTag||"@@toStringTag";function s(e,t,r){return Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}),e[t]}try{s({},"")}catch(e){s=function(e,t,r){return e[t]=r}}function u(e,t,r,n){var o=t&&t.prototype instanceof v?t:v,c=Object.create(o.prototype),i=new L(n||[]);return a(c,"_invoke",{value:O(e,r,i)}),c}function p(e,t,r){try{return{type:"normal",arg:e.call(t,r)}}catch(e){return{type:"throw",arg:e}}}t.wrap=u;var f="suspendedStart",d="suspendedYield",y="executing",m="completed",h={};function v(){}function g(){}function b(){}var w={};s(w,c,(function(){return this}));var E=Object.getPrototypeOf,P=E&&E(E(I([])));P&&P!==r&&n.call(P,c)&&(w=P);var S=b.prototype=v.prototype=Object.create(w);function k(e){["next","throw","return"].forEach((function(t){s(e,t,(function(e){return this._invoke(t,e)}))}))}function N(e,t){function r(a,o,c,i){var l=p(e[a],e,o);if("throw"!==l.type){var s=l.arg,u=s.value;return u&&"object"==T(u)&&n.call(u,"__await")?t.resolve(u.__await).then((function(e){r("next",e,c,i)}),(function(e){r("throw",e,c,i)})):t.resolve(u).then((function(e){s.value=e,c(s)}),(function(e){return r("throw",e,c,i)}))}i(l.arg)}var o;a(this,"_invoke",{value:function(e,n){function a(){return new t((function(t,a){r(e,n,t,a)}))}return o=o?o.then(a,a):a()}})}function O(t,r,n){var a=f;return function(o,c){if(a===y)throw Error("Generator is already running");if(a===m){if("throw"===o)throw c;return{value:e,done:!0}}for(n.method=o,n.arg=c;;){var i=n.delegate;if(i){var l=R(i,n);if(l){if(l===h)continue;return l}}if("next"===n.method)n.sent=n._sent=n.arg;else if("throw"===n.method){if(a===f)throw a=m,n.arg;n.dispatchException(n.arg)}else"return"===n.method&&n.abrupt("return",n.arg);a=y;var s=p(t,r,n);if("normal"===s.type){if(a=n.done?m:d,s.arg===h)continue;return{value:s.arg,done:n.done}}"throw"===s.type&&(a=m,n.method="throw",n.arg=s.arg)}}}function R(t,r){var n=r.method,a=t.iterator[n];if(a===e)return r.delegate=null,"throw"===n&&t.iterator.return&&(r.method="return",r.arg=e,R(t,r),"throw"===r.method)||"return"!==n&&(r.method="throw",r.arg=new TypeError("The iterator does not provide a '"+n+"' method")),h;var o=p(a,t.iterator,r.arg);if("throw"===o.type)return r.method="throw",r.arg=o.arg,r.delegate=null,h;var c=o.arg;return c?c.done?(r[t.resultName]=c.value,r.next=t.nextLoc,"return"!==r.method&&(r.method="next",r.arg=e),r.delegate=null,h):c:(r.method="throw",r.arg=new TypeError("iterator result is not an object"),r.delegate=null,h)}function j(e){var t={tryLoc:e[0]};1 in e&&(t.catchLoc=e[1]),2 in e&&(t.finallyLoc=e[2],t.afterLoc=e[3]),this.tryEntries.push(t)}function _(e){var t=e.completion||{};t.type="normal",delete t.arg,e.completion=t}function L(e){this.tryEntries=[{tryLoc:"root"}],e.forEach(j,this),this.reset(!0)}function I(t){if(t||""===t){var r=t[c];if(r)return r.call(t);if("function"==typeof t.next)return t;if(!isNaN(t.length)){var a=-1,o=function r(){for(;++a<t.length;)if(n.call(t,a))return r.value=t[a],r.done=!1,r;return r.value=e,r.done=!0,r};return o.next=o}}throw new TypeError(T(t)+" is not iterable")}return g.prototype=b,a(S,"constructor",{value:b,configurable:!0}),a(b,"constructor",{value:g,configurable:!0}),g.displayName=s(b,l,"GeneratorFunction"),t.isGeneratorFunction=function(e){var t="function"==typeof e&&e.constructor;return!!t&&(t===g||"GeneratorFunction"===(t.displayName||t.name))},t.mark=function(e){return Object.setPrototypeOf?Object.setPrototypeOf(e,b):(e.__proto__=b,s(e,l,"GeneratorFunction")),e.prototype=Object.create(S),e},t.awrap=function(e){return{__await:e}},k(N.prototype),s(N.prototype,i,(function(){return this})),t.AsyncIterator=N,t.async=function(e,r,n,a,o){void 0===o&&(o=Promise);var c=new N(u(e,r,n,a),o);return t.isGeneratorFunction(r)?c:c.next().then((function(e){return e.done?e.value:c.next()}))},k(S),s(S,l,"Generator"),s(S,c,(function(){return this})),s(S,"toString",(function(){return"[object Generator]"})),t.keys=function(e){var t=Object(e),r=[];for(var n in t)r.push(n);return r.reverse(),function e(){for(;r.length;){var n=r.pop();if(n in t)return e.value=n,e.done=!1,e}return e.done=!0,e}},t.values=I,L.prototype={constructor:L,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=e,this.done=!1,this.delegate=null,this.method="next",this.arg=e,this.tryEntries.forEach(_),!t)for(var r in this)"t"===r.charAt(0)&&n.call(this,r)&&!isNaN(+r.slice(1))&&(this[r]=e)},stop:function(){this.done=!0;var e=this.tryEntries[0].completion;if("throw"===e.type)throw e.arg;return this.rval},dispatchException:function(t){if(this.done)throw t;var r=this;function a(n,a){return i.type="throw",i.arg=t,r.next=n,a&&(r.method="next",r.arg=e),!!a}for(var o=this.tryEntries.length-1;o>=0;--o){var c=this.tryEntries[o],i=c.completion;if("root"===c.tryLoc)return a("end");if(c.tryLoc<=this.prev){var l=n.call(c,"catchLoc"),s=n.call(c,"finallyLoc");if(l&&s){if(this.prev<c.catchLoc)return a(c.catchLoc,!0);if(this.prev<c.finallyLoc)return a(c.finallyLoc)}else if(l){if(this.prev<c.catchLoc)return a(c.catchLoc,!0)}else{if(!s)throw Error("try statement without catch or finally");if(this.prev<c.finallyLoc)return a(c.finallyLoc)}}}},abrupt:function(e,t){for(var r=this.tryEntries.length-1;r>=0;--r){var a=this.tryEntries[r];if(a.tryLoc<=this.prev&&n.call(a,"finallyLoc")&&this.prev<a.finallyLoc){var o=a;break}}o&&("break"===e||"continue"===e)&&o.tryLoc<=t&&t<=o.finallyLoc&&(o=null);var c=o?o.completion:{};return c.type=e,c.arg=t,o?(this.method="next",this.next=o.finallyLoc,h):this.complete(c)},complete:function(e,t){if("throw"===e.type)throw e.arg;return"break"===e.type||"continue"===e.type?this.next=e.arg:"return"===e.type?(this.rval=this.arg=e.arg,this.method="return",this.next="end"):"normal"===e.type&&t&&(this.next=t),h},finish:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var r=this.tryEntries[t];if(r.finallyLoc===e)return this.complete(r.completion,r.afterLoc),_(r),h}},catch:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var r=this.tryEntries[t];if(r.tryLoc===e){var n=r.completion;if("throw"===n.type){var a=n.arg;_(r)}return a}}throw Error("illegal catch attempt")},delegateYield:function(t,r,n){return this.delegate={iterator:I(t),resultName:r,nextLoc:n},"next"===this.method&&(this.arg=e),h}},t}function B(e,t,r,n,a,o,c){try{var i=e[o](c),l=i.value}catch(e){return void r(e)}i.done?t(l):Promise.resolve(l).then(n,a)}function M(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}var G=function(e){var t,r,a=(t=(0,n.useState)(null),r=2,function(e){if(Array.isArray(e))return e}(t)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,a,o,c,i=[],l=!0,s=!1;try{if(o=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;l=!1}else for(;!(l=(n=o.call(r)).done)&&(i.push(n.value),i.length!==t);l=!0);}catch(e){s=!0,a=e}finally{try{if(!l&&null!=r.return&&(c=r.return(),Object(c)!==c))return}finally{if(s)throw a}}return i}}(t,r)||function(e,t){if(e){if("string"==typeof e)return M(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?M(e,t):void 0}}(t,r)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),o=a[0],c=a[1];return(0,n.useEffect)((function(){var t;(t=D().mark((function t(){var r,n,a;return D().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.prev=0,t.next=3,fetch(e.endpoint);case 3:return n=t.sent,t.next=6,n.json();case 6:(a=t.sent).success&&null!=a&&null!==(r=a.data)&&void 0!==r&&r.url_params?c(a.data):c(!1),t.next=14;break;case 10:t.prev=10,t.t0=t.catch(0),console.error(t.t0),c(!1);case 14:case"end":return t.stop()}}),t,null,[[0,10]])})),function(){var e=this,r=arguments;return new Promise((function(n,a){var o=t.apply(e,r);function c(e){B(o,n,a,c,i,"next",e)}function i(e){B(o,n,a,c,i,"throw",e)}c(void 0)}))})()}),[e]),o};function U(e){return U="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},U(e)}function F(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function q(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?F(Object(r),!0).forEach((function(t){var n,a,o,c;n=e,a=t,o=r[t],c=function(e,t){if("object"!=U(e)||!e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,"string");if("object"!=U(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return String(e)}(a),(a="symbol"==U(c)?c:c+"")in n?Object.defineProperty(n,a,{value:o,enumerable:!0,configurable:!0,writable:!0}):n[a]=o})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):F(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function z(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}const V=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"woocommerce-paypal-payments/checkout-paylater-messages","title":"Checkout - PayPal Pay Later messaging","category":"woocommerce-paypal-payments","description":"PayPal Pay Later messaging will be displayed for eligible customers. Customers automatically see the most relevant Pay Later offering.","example":{},"parent":["woocommerce/checkout-totals-block"],"attributes":{"blockId":{"type":"string","default":"woocommerce-paypal-payments/checkout-paylater-messages"},"ppcpId":{"type":"string"},"lock":{"type":"object","default":{"remove":true,"move":false}}},"supports":{"html":false,"inserter":false,"multiple":false},"textdomain":"woocommerce-paypal-payments","editorScript":"ppcp-checkout-paylater-block"}');var J=React.createElement("svg",{width:"584.798",height:"720",viewBox:"0 0 154.728 190.5"},React.createElement("g",{transform:"translate(898.192 276.071)"},React.createElement("path",{clipPath:"none",d:"M-837.663-237.968a5.49 5.49 0 0 0-5.423 4.633l-9.013 57.15-8.281 52.514-.005.044.01-.044 8.281-52.514c.421-2.669 2.719-4.633 5.42-4.633h26.404c26.573 0 49.127-19.387 53.246-45.658.314-1.996.482-3.973.52-5.924v-.003h-.003c-6.753-3.543-14.683-5.565-23.372-5.565z",fill:"#001c64"}),React.createElement("path",{clipPath:"none",d:"M-766.506-232.402c-.037 1.951-.207 3.93-.52 5.926-4.119 26.271-26.673 45.658-53.246 45.658h-26.404c-2.701 0-4.999 1.964-5.42 4.633l-8.281 52.514-5.197 32.947a4.46 4.46 0 0 0 4.405 5.153h28.66a5.49 5.49 0 0 0 5.423-4.633l7.55-47.881c.423-2.669 2.722-4.636 5.423-4.636h16.876c26.573 0 49.124-19.386 53.243-45.655 2.924-18.649-6.46-35.614-22.511-44.026z",fill:"#0070e0"}),React.createElement("path",{clipPath:"none",d:"M-870.225-276.071a5.49 5.49 0 0 0-5.423 4.636l-22.489 142.608a4.46 4.46 0 0 0 4.405 5.156h33.351l8.281-52.514 9.013-57.15a5.49 5.49 0 0 1 5.423-4.633h47.782c8.691 0 16.621 2.025 23.375 5.563.46-23.917-19.275-43.666-46.412-43.666z",fill:"#003087"})));(0,t.registerBlockType)(V,{icon:J,edit:function(e){var t,c,i,l=e.attributes,s=e.clientId,u=e.setAttributes,p=l.ppcpId,f=(c=(0,n.useState)(!1),i=2,function(e){if(Array.isArray(e))return e}(c)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,a,o,c,i=[],l=!0,s=!1;try{if(o=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;l=!1}else for(;!(l=(n=o.call(r)).done)&&(i.push(n.value),i.length!==t);l=!0);}catch(e){s=!0,a=e}finally{try{if(!l&&null!=r.return&&(c=r.return(),Object(c)!==c))return}finally{if(s)throw a}}return i}}(c,i)||function(e,t){if(e){if("string"==typeof e)return z(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?z(e,t):void 0}}(c,i)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),d=f[0],y=f[1],m=void 0,h=String(null===(t=wp.data.select("core/editor"))||void 0===t?void 0:t.getEditedPostContent());(h.includes("woocommerce/checkout")||h.includes("woocommerce/cart"))&&(m=50);var v,g=PcpCheckoutPayLaterBlock.config.checkout;v="flex"===g.layout?{layout:g.layout,color:g.color,ratio:g.ratio}:{layout:g.layout,logo:{position:g["logo-position"],type:g["logo-type"]},text:{color:g["text-color"],size:g["text-size"]}};var b=["ppcp-paylater-block-preview","ppcp-overlay-parent"];!PcpCheckoutPayLaterBlock.vaultingEnabled&&PcpCheckoutPayLaterBlock.placementEnabled||(b=["ppcp-paylater-block-preview","ppcp-paylater-unavailable","block-editor-warning"]);var w=(0,a.useBlockProps)({className:b});if((0,n.useEffect)((function(){p||u({ppcpId:"ppcp-"+s})}),[p,s]),PcpCheckoutPayLaterBlock.vaultingEnabled)return React.createElement("div",w,React.createElement("div",{className:"block-editor-warning__contents"},React.createElement("p",{className:"block-editor-warning__message"},(0,r.__)("Checkout - Pay Later Messaging cannot be used while PayPal Vaulting is active. Disable PayPal Vaulting in the PayPal Payment settings to reactivate this block","woocommerce-paypal-payments")),React.createElement("div",{className:"block-editor-warning__actions"},React.createElement("span",{className:"block-editor-warning__action"},React.createElement("a",{href:PcpCheckoutPayLaterBlock.settingsUrl},React.createElement("button",{type:"button",className:"components-button is-primary"},(0,r.__)("PayPal Payments Settings","woocommerce-paypal-payments")))))));if(!PcpCheckoutPayLaterBlock.placementEnabled)return React.createElement("div",w,React.createElement("div",{className:"block-editor-warning__contents"},React.createElement("p",{className:"block-editor-warning__message"},(0,r.__)("Checkout - Pay Later Messaging cannot be used while the “Checkout” messaging placement is disabled. Enable the placement in the PayPal Payments Pay Later settings to reactivate this block.","woocommerce-paypal-payments")),React.createElement("div",{className:"block-editor-warning__actions"},React.createElement("span",{className:"block-editor-warning__action"},React.createElement("a",{href:PcpCheckoutPayLaterBlock.payLaterSettingsUrl},React.createElement("button",{type:"button",className:"components-button is-primary"},(0,r.__)("PayPal Payments Settings","woocommerce-paypal-payments")))))));var E=G(PcpCheckoutPayLaterBlock.ajax.cart_script_params);if(null===E)return React.createElement("div",w,React.createElement(o.Spinner,null));var P=q(q({},E.url_params),{},{components:"messages",dataNamespace:"ppcp-block-editor-checkout-paylater-message"});return React.createElement(React.Fragment,null,React.createElement(a.InspectorControls,null,React.createElement(o.PanelBody,{title:(0,r.__)("Customize your messaging","woocommerce-paypal-payments")},React.createElement("p",null,(0,r.__)("Choose the layout and color of your messaging in the PayPal Payments Pay Later settings for the “Checkout” messaging placement.","woocommerce-paypal-payments")),React.createElement("a",{href:PcpCheckoutPayLaterBlock.payLaterSettingsUrl},React.createElement("button",{type:"button",className:"components-button is-primary"},(0,r.__)("PayPal Payments Settings","woocommerce-paypal-payments"))))),React.createElement("div",w,React.createElement("div",{className:"ppcp-overlay-child"},React.createElement(A,{options:P},React.createElement(x,{style:v,onRender:function(){return y(!0)},amount:m}))),React.createElement("div",{className:"ppcp-overlay-child ppcp-unclicable-overlay"}," ",!d&&React.createElement(o.Spinner,null))))},save:function(){return null}})})();
//# sourceMappingURL=checkout-paylater-block.js.map