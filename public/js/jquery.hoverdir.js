!function(r,e,t){"use strict";r.HoverDir=function(t,e){this.$el=r(e),this._init(t)},r.HoverDir.defaults={speed:300,easing:"ease",hoverDelay:0,inverse:!1},r.HoverDir.prototype={_init:function(t){this.options=r.extend(!0,{},r.HoverDir.defaults,t),this.transitionProp="all "+this.options.speed+"ms "+this.options.easing,this.support=Modernizr.csstransitions,this._loadEvents()},_loadEvents:function(){var s=this;this.$el.on("mouseenter.hoverdir, mouseleave.hoverdir",function(t){var e=r(this),i=e.find("div"),o=s._getDir(e,{x:t.pageX,y:t.pageY}),n=s._getStyle(o);"mouseenter"===t.type?(i.hide().css(n.from),clearTimeout(s.tmhover),s.tmhover=setTimeout(function(){i.show(0,function(){var t=r(this);s.support&&t.css("transition",s.transitionProp),s._applyAnimation(t,n.to,s.options.speed)})},s.options.hoverDelay)):(s.support&&i.css("transition",s.transitionProp),clearTimeout(s.tmhover),s._applyAnimation(i,n.from,s.options.speed))})},_getDir:function(t,e){var i=t.width(),o=t.height(),n=(e.x-t.offset().left-i/2)*(o<i?o/i:1),s=(e.y-t.offset().top-o/2)*(i<o?i/o:1);return Math.round((Math.atan2(s,n)*(180/Math.PI)+180)/90+3)%4},_getStyle:function(t){var e,i,o={left:"0px",top:"-100%"},n={left:"0px",top:"100%"},s={left:"-100%",top:"0px"},r={left:"100%",top:"0px"},a={top:"0px"},p={left:"0px"};switch(t){case 0:e=this.options.inverse?n:o,i=a;break;case 1:e=this.options.inverse?s:r,i=p;break;case 2:e=this.options.inverse?o:n,i=a;break;case 3:e=this.options.inverse?r:s,i=p}return{from:e,to:i}},_applyAnimation:function(t,e,i){r.fn.applyStyle=this.support?r.fn.css:r.fn.animate,t.stop().applyStyle(e,r.extend(!0,[],{duration:i+"ms"}))}};var o=function(t){e.console&&e.console.error(t)};r.fn.hoverdir=function(t){var e=r.data(this,"hoverdir");if("string"==typeof t){var i=Array.prototype.slice.call(arguments,1);this.each(function(){e?r.isFunction(e[t])&&"_"!==t.charAt(0)?e[t].apply(e,i):o("no such method '"+t+"' for hoverdir instance"):o("cannot call methods on hoverdir prior to initialization; attempted to call method '"+t+"'")})}else this.each(function(){e?e._init():e=r.data(this,"hoverdir",new r.HoverDir(t,this))});return e}}(jQuery,window);