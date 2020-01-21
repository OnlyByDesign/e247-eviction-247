$(document).ready(function ($) {
    var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
    var isFirefox = typeof InstallTrigger !== 'undefined';
    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    var isEdge = !isIE && !!window.StyleMedia;
    var isChrome = !!window.chrome && !!window.chrome.webstore;
    var isMac = (navigator.userAgent.indexOf('Mac OS X') != -1);
    if (isMac) {
      $("body").addClass("mac");
    } else {
      $("body").addClass("pc");
    }
    if (isOpera) {
      $("body").addClass("opera");
    }
    if (isFirefox) {
      $("body").addClass("firefox");
    }
    if (isSafari) {
      $("body").addClass("safari");
    }
    if (isIE) {
      $("body").addClass("ie");
    }
    if (isEdge) {
      $("body").addClass("edge");
    }
    if (isChrome) {
      $("body").addClass("chrome");
    }
});