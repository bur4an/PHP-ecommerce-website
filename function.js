   
function notEmpty(elem, helperMsg,ob){
	if(elem.value.length == 0){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
}


function maxLen(elem,len,objname){
	if(elem.value.length > len){
		alert(objname +": Max Length is " + len + " Char");
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
}

function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}



function isFloat(elem, helperMsg){
	var numericExpression = /^((\d+(\.\d*)?)|((\d*\.)?\d+))$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphabet(elem, helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphabet1(elem, helperMsg){ //allows alphabates with space
	var alphaExp = /^[a-zA-Z _-]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphanumeric(elem, helperMsg){
	var alphaExp = /^[0-9a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function lengthRestriction(elem, min, max){
	var uInput = elem.value;
	if(uInput.length >= min && uInput.length <= max){
		return true;
	}else{
		alert("Invalid Mobile or Phone number");
		elem.focus();
		return false;
	}
}


function madeSelection(elem, helperMsg){
	if(elem.value == "Please Choose"){
		alert(helperMsg);
		elem.focus();
		return false;
	}else{
		return true;
	}
}

function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}


function textCompare(elem,elemcompare,objname){ 
	
	if(elem.value != elemcompare.value){
		alert(objname +" does not mathch with Password ");
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
}


function rangeLimit(elem, min, max,objname){

	var uInput = elem.value;

	if(uInput >= min && uInput <= max){
		return true;
	}else{
		alert("Please enter " + objname +" between " +min+ " and " +max);
		elem.focus();
		return false;
	}
}


function dateCheck(input){
	var validformat=/^\d{2}\/\d{2}\/\d{4}$/;  //Basic check for format validity
	var returnval=false;
	
		if (!validformat.test(input.value))
		alert("Invalid Date Format. Please correct and submit again.");
		else{ //Detailed check for valid date ranges
		var dayfield=input.value.split("/")[0]
		var monthfield=input.value.split("/")[1]
		var yearfield=input.value.split("/")[2]
		
		var dayobj = new Date(yearfield,monthfield-1,dayfield);
		
		if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
		alert("Invalid Date");
		else
		returnval=true;
		}

	if (returnval==false) 
	input.select();

	return returnval;

}



