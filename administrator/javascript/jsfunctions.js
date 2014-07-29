	function verifyandsavebanner(){
		var errorstr="";
		var intRegex = /^\d+$/;
		if(title.value ==	"")
			errorstr = errorstr + "* Please Enter the Title<br/>";	
		if(!intRegex.test(position.value))
			errorstr = errorstr + "* Please Enter the Correct Position<br/>";	
		if(image.value == "")
			errorstr = errorstr + "* Please Select the Image<br/>";
		if(errorstr !="")
			errormsg.innerHTML = errorstr;
		else
			submitdata.click();			
	}
	
	function verifyandsaverecentupdates(){
		var errorstr="";
		if(message.value ==	"")
			errorstr = errorstr + "* Please Enter the Message<br/>";				
		if(errorstr !="")
			errormsg.innerHTML = errorstr;
		else
			submitdata.click();
		}


	function verifyandsavehomecontent(){
		var errorstr="";
		if(title.value ==	"")
			errorstr = errorstr + "* Please Enter the Title<br/>";	
				
		if(errorstr !="")
			errormsg.innerHTML = errorstr;
		else
			submitdata.click();
	}
	
	function verifyandsavesubmenu(){
		var errorstr="";
		var intRegex = /^\d+$/;
		if(title.value ==	"")
			errorstr = errorstr + "* Please Enter the Title<br/>";	
		if(!intRegex.test(position.value))
			errorstr = errorstr + "* Please Enter the Correct Position<br/>";				
		if(errorstr !="")
			errormsg.innerHTML = errorstr;
		else
			submitdata.click();
		}

	function verifyandsaveevent(){
		var errorstr="";
		
		if(title.value == "")
			errorstr = errorstr + "* Please Enter the Title<br/>";			
		if(summary.value == "")
			errorstr = errorstr + "* Please Enter the Summary<br/>";						
		if(image.value == "")
			errorstr = errorstr + "* Please Select the Image<br/>";			
		if(venue.value == "")
			errorstr = errorstr + "* Please Enter the Venue<br/>";				
		if(errorstr !="")
			errormsg.innerHTML = errorstr;
		else
			submitdata.click();
	}
	
	function verifyandsavemiracles(){
		var errorstr="";
		
		if(date.value == "")
			errorstr = errorstr + "* Please Enter the Date<br/>";						
		if(title.value == "")
			errorstr = errorstr + "* Please Enter the Title<br/>";			
		if(author.value == "")
			errorstr = errorstr + "* Please Enter the Author<br/>";						
		if(summary.value == "")		
			errorstr = errorstr + "* Please Enter the Summary<br/>";						
		if(image.value == "")
			errorstr = errorstr + "* Please Select the Image<br/>";			
		if(errorstr !="")
			errormsg.innerHTML = errorstr;
		else
			submitdata.click();
	}

	
	function filltext(imagename){
		image.value = imagename;
	}


	function verifyandsavehomesmallads(){
		var errorstr="";
		var intRegex = /^\d+$/;
		
		if(title.value == "")
			errorstr = errorstr + "* Please Enter the Title<br/>";	
		if(introline.value == "")
			errorstr = errorstr + "* Please Enter the Intro Line<br/>";	
		if(!intRegex.test(position.value))
			errorstr = errorstr + "* Please Enter the Correct Position<br/>";	
		if(image.value == "")
			errorstr = errorstr + "* Please Select a Banner Image<br/>";
		if(errorstr !="")
			errormsg.innerHTML = errorstr;
		else
			submitdata.click();
	}
	
	
	$(document).ready(function() {
		$("#image").focus(function(e) { // Button which will activate our modal												
			$("#modal").reveal({ // The item which will be opened with reveal
				animation: "fadeAndPop",                   // fade, fadeAndPop, none
				animationspeed: 600,                       // how fast animtions are
				closeonbackgroundclick: true,              // if you click background will modal close?
				dismissmodalclass: "bannerimage"    // the class of a button or element that will close an open modal
			});
		return false;
		});		
	});
	

	
		
	function deletedata(source, table, id){
		var retVal = confirm("Are you sure that you want to permanently delete this item?");
		
		if( retVal == true ){
			
			$.post("library/deletedata.php", { 
			   postsource: source,
			   posttable: table, 
			   postid: id
			   }, function(result) {
					if(result == 1)
						window.location.reload();
					else if(result == "onlyonemaster")
						alert("User Removal Failed! At least one Master Administrator account must be retained.");
					else	
						alert("Error D01: Query execution failed!");
			});	
			return true;
		}else return false;
		
	}
	
	function resetpassword(id){
		var retVal = confirm("Are you sure that you want to reset the password for this user?");
			if( retVal == true ){			
				var button = document.getElementById('submitreset'+id);
					button.click();		
			}else return false;
	}