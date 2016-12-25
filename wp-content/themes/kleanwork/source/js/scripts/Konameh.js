var Konami = function(callback) {
	var konami = { 
		addEvent : function(obj,type,fn,ref_obj) {
			obj.addEventListener?obj.addEventListener(type,fn,!1):obj.attachEvent&&(obj["e"+type+fn]=fn,obj[type+fn] = function() {
				obj["e"+type+fn](window.event,ref_obj)
			}, obj.attachEvent("on"+type,obj[type+fn]))
		}, input:"", pattern:"38384040373937396665", load:function(link) {
			this.addEvent(document,"keydown",function(e,ref_obj) {
				return ref_obj&&(konami=ref_obj),
				konami.input+=e?e.keyCode:event.keyCode,
				konami.input.length>konami.pattern.length&&(konami.input=konami.input.substr(konami.input.length-konami.pattern.length)),
				konami.input==konami.pattern?(konami.code(link),konami.input="",e.preventDefault(),!1):void 0
			},
			this),this.iphone.load(link)
		},code:function(link){
			window.location=link
		},iphone:{
			start_x:0,
			start_y:0,
			stop_x:0,
			stop_y:0,
			tap:!1,
			capture:!1,
			orig_keys:"",
			keys:["UP","UP","DOWN","DOWN","LEFT","RIGHT","LEFT","RIGHT","TAP","TAP"],
			code:function(link){
				konami.code(link)
			},load:function(link){
				this.orig_keys=this.keys,
				konami.addEvent(document,"touchmove",function(e){
					if(1==e.touches.length&&1==konami.iphone.capture){
						var touch=e.touches[0];
						konami.iphone.stop_x=touch.pageX,
						konami.iphone.stop_y=touch.pageY,
						konami.iphone.tap=!1,
						konami.iphone.capture=!1,
						konami.iphone.check_direction()
					}
				}),
				konami.addEvent(document,"touchend",function(evt){
					1==konami.iphone.tap&&konami.iphone.check_direction(link)
				},!1),
				konami.addEvent(document,"touchstart",function(evt){
					konami.iphone.start_x=evt.changedTouches[0].pageX,
					konami.iphone.start_y=evt.changedTouches[0].pageY,
					konami.iphone.tap=!0,
					konami.iphone.capture=!0
				})
			},check_direction:function(link){
				x_magnitude=Math.abs(this.start_x-this.stop_x),
				y_magnitude=Math.abs(this.start_y-this.stop_y),
				x=this.start_x-this.stop_x<0?"RIGHT":"LEFT",
				y=this.start_y-this.stop_y<0?"DOWN":"UP",
				result=x_magnitude>y_magnitude?x:y,
				result=1==this.tap?"TAP":result,
				result==this.keys[0]&&(this.keys=this.keys.slice(1,this.keys.length)),
				0==this.keys.length&&(this.keys=this.orig_keys,this.code(link))
			}
		}
	};return"string"==typeof callback&&konami.load(callback),
	"function"==typeof callback&&(konami.code=callback,konami.load()),
	konami
};

jQuery(document).ready(function(){
	new Konami(function(){
		var duck=$('<div class="konami-duck"><img src="/soruce/img/rubber_duck.png" alt="The most magnificent duck" /></div>');
		$(".konami-container").append(duck),
		setTimeout(function(){
			$(".konami-duck").addClass("move-left")
		},200),setTimeout(function(){
			$(".konami-duck").remove()
		},4e3)
	})
}),