	function collapseExpand(element,jmlhElement){
		for(i=1;i<=jmlhElement;i++){	
			document.getElementById(element + i).style.display =(document.getElementById(element+i).style.display=="none")?"":"none";
		}	
	}
	function collapseExpan(element,jmlhElement,obj){
		if(obj.value==1){
			document.getElementById(element + 1).style.display ="none";
			document.getElementById(element + 2).style.display ="none";
		}
		if(obj.value==2){
			document.getElementById(element + 1).style.display ="block";
			document.getElementById(element + 2).style.display ="none";
		}
		if(obj.value==3){
			document.getElementById(element + 1).style.display ="block";
			document.getElementById(element + 2).style.display ="block";
		}
	}
	function expand(element,jmlhElement){
		for(i=1;i<=jmlhElement;i++){	
			document.getElementById(element + i).style.display ="";
		}
	}
	function doNothing(){
		return;
	}