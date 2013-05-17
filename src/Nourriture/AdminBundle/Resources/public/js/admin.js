//alert('loaded');

console.firebug = true;

var print_r = function($var){
	var str = '';
	
	for(var i in $var){
		str += i + " => ";
		if(typeof($var[i])=='object'){
		   for(var j in $var[i]){
			str += j + " ==> " + $var[i][j]; 
		   }
		}else if(typeof($var[i]) =='array'){
		  var tmp = $var[i];
		  str += tmp.join(",") + "\n";
		}else{
		  str +=  $var[i] + "\n";
		}
	}
	
	alert(str);
}
