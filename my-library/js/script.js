var default_content="";

$(document).ready(function(){
	
	checkURL();
	$('ul li a').click(function (e){

			checkURL(this.hash);

	});
	
	//filling in the default content
	default_content = $('#LoadContent').html();
	
	
	setInterval("checkURL()",250);
	
});

var lasturl="";

function checkURL(hash)
{
	if(!hash) hash=window.location.hash;
	
	if(hash != lasturl)
	{
		lasturl=hash;
		
		// FIX - if we've used the history buttons to return to the homepage,
		// fill the pageContent with the default_content
		
		if(hash=="")
		$('#LoadContent').html(default_content);
		
		else
		loadPage(hash);
	}
}


function loadPage(url)
{
 //var act ='';
 
	var getURL = url.split("#"); 
	mod = getURL[1]; //get modul
	act = getURL[2]; //get act
	getID = getURL[3]; //get id konten
	sid = getURL[4];
	
	//mod=mod.replace('#',''); 
	
if (act && getID) {
	if (sid) {
		ShowURL = 'modul='+mod+'&act='+act+'&id='+getID+'&sid='+sid;
	} else {
		ShowURL = 'modul='+mod+'&act='+act+'&errno=1024';
	}
} else if (act) {
	ShowURL = 'modul='+mod+'&act='+act;
} else {
	ShowURL = 'modul='+mod;
}
	
	
	$('#loading').css('visibility','visible').fadeOut("slow");;
	
	$.ajax({
		type: "POST",
		url: "load.php",
		data: ShowURL, //'modul='+mod,
		dataType: "html",
		success: function(msg){
			
			if(parseInt(msg)!=0)
			{
				$('#LoadContent').html(msg);
				$('#loading').css('visibility','hidden').fadeOut("slow");;
			}
		}
		
	});

}