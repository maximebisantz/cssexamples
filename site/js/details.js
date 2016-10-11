function enableDetails(){
	var allDetails = document.getElementsByTagName('details');
	
	for(var i = 0; i == allDetails.length -1; i++){
		var detail = allDetails[i];
		var div = detail.getElementsByClassName('detailsContent')[0];
		var summary = detail.getElementsByTagName('summary')[0];
		
		summary.style.cursor = 'pointer';
		
		// default is hidden;
		div.style.display = 'none';
		
		// add onclick event on the summary.
		summary.addEventListener('click', function(){
			if(div.style.display == 'none'){
				div.style.display = 'block'
			}else{
				div.style.display = 'none';
			}
		});
		
	}
	
}

//Enable the details at windows.load
window.addEventListener('load', function(){
	enableDetails();
}); 