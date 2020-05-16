
var langs = {
	"en_GB":{
		"login":"Login",
		"signup":"Signup"
	},
	"test":{
		"":""
	}
};

$(function(){
	$("translate").translate({
		default_lang:"en_GB", 
		langs:"#langs", 
		source: langs
	});
});