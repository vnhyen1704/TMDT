(()=>{"use strict";var e={875:(e,t,o)=>{var r=o(196),s=Symbol.for("react.element"),n=Symbol.for("react.fragment"),i=Object.prototype.hasOwnProperty,a=r.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner,l={key:!0,ref:!0,__self:!0,__source:!0};function d(e,t,o){var r,n={},d=null,c=null;for(r in void 0!==o&&(d=""+o),void 0!==t.key&&(d=""+t.key),void 0!==t.ref&&(c=t.ref),t)i.call(t,r)&&!l.hasOwnProperty(r)&&(n[r]=t[r]);if(e&&e.defaultProps)for(r in t=e.defaultProps)void 0===n[r]&&(n[r]=t[r]);return{$$typeof:s,type:e,key:d,ref:c,props:n,_owner:a.current}}t.Fragment=n,t.jsx=d,t.jsxs=d},250:(e,t,o)=>{e.exports=o(875)},196:e=>{e.exports=window.React}},t={};function o(r){var s=t[r];if(void 0!==s)return s.exports;var n=t[r]={exports:{}};return e[r](n,n.exports,o),n.exports}(()=>{const e=window.wp.plugins,t=window.wp.data,r=window.wp.coreData,s=window.wp.editor,n=window.wp.element;var i=o(250);function a(e){let{children:t}=e;const[o]=(0,n.useState)(document.createElement("div"));return(0,n.useEffect)((()=>{const e=document.getElementsByClassName("editor-post-publish-button__button")[0];e.parentNode.insertBefore(o,e)}),[o]),(0,n.createPortal)((0,i.jsx)(i.Fragment,{children:t}),o)}function l(){const{emailData:e}=(0,t.useSelect)((e=>({emailData:e(s.store).getEditedPostAttribute("email_data")??null}))),o=`\n    .edit-post-visual-editor__content-area {\n        max-width: ${e.layout_styles.width}px;\n    }\n    .edit-post-visual-editor {\n    background: ${e.layout_styles.background};\n  }`;return(0,i.jsx)("style",{children:o})}const d=window.wp.editPost,c=window.wp.i18n,u=window.wp.components;function p(e){let{newsletterId:o}=e;const[r,a]=(0,n.useState)(!1);return(0,i.jsx)(u.Button,{variant:"primary",disabled:!o,isBusy:r,onClick:()=>{a(!0);const e=(0,t.select)(s.store).isEditedPostDirty(),r=`admin.php?page=mailpoet-newsletters#/send/${o}`;if(!e)return void(window.location.href=r);(0,t.dispatch)(s.store).savePost();const n=(0,t.subscribe)((()=>{const e=(0,t.select)(s.store).isEditedPostDirty(),o=(0,t.select)(s.store).isSavingPost(),i=(0,t.select)(s.store).didPostSaveRequestSucceed(),l=(0,t.select)(s.store).didPostSaveRequestFail();o||!i||e||(n(),window.location.href=r),!o&&l&&a(!0)}))},children:(0,c.__)("Next","mailpoet")})}(0,t.select)(r.store).getBlockPatterns=()=>[],(0,t.select)(r.store).getBlockPatternCategories=()=>[],(0,e.registerPlugin)("mailpoet-email-editor",{render:function(){const{mailpoetData:e}=(0,t.useSelect)((e=>({mailpoetData:e(s.store).getEditedPostAttribute("mailpoet_data")??null})));return function(){const{isWelcomeGuideActive:e}=(0,t.useSelect)((e=>({isWelcomeGuideActive:e(d.store).isFeatureActive("welcomeGuide")})));(0,n.useEffect)((()=>{e&&(0,t.dispatch)(d.store).toggleFeature("welcomeGuide")}),[e])}(),(0,i.jsxs)(i.Fragment,{children:[(0,i.jsx)(l,{}),(0,i.jsx)(a,{children:(0,i.jsx)(p,{newsletterId:(null==e?void 0:e.id)??null})})]})}})})()})();