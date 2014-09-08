<?php

class twitterapi {
	const DIALOG_WIDTH = 575;
	const DIALOG_HEIGHT = 400;

	public function tweet($message, $hashtags, $includeRefUrl) {
		if($hashtags == null) {
			$hashtags = array();
		}

		echo 
		"<script>".
	    	"!function tweet(message, hashtags, includeRefUrl) {
		    	var width  = ".self::DIALOG_WIDTH.",
		        height = ".self::DIALOG_HEIGHT.",
		        left   = (window.innerWidth  - width)  / 2,
		        top    = (window.innerHeight - height) / 2,
		        url    = 'https://twitter.com/share',
		        opts   = 'status=1' +
		                 ',width='  + width  +
		                 ',height=' + height +
		                 ',top='    + top    +
		                 ',left='   + left;

		        var paramset = false;
		        // set tweet message
		        if(message && message != '') {
		        	url += '?text=' + encodeURIComponent(message);
		        	paramset = true;
		        }
		        // set hash tags
		        if(hashtags && Array.isArray(hashtags) && hashtags.length > 0) {
		        	url += (paramset)? ';' : '?';
		        	url += 'hashtags=';

		        	// push each hashtag into the text
		        	for(var i=0; i<hashtags.length; i++) {
		        		url += encodeURIComponent(hashtags[i]);
		        		if(i < hashtags.length - 1) url += ',';
		        	}
		        }
		        // check if it needs to include the referred URL
		        if(!includeRefUrl) {
		        	url += (paramset)? '&' : '?';
		        	url += 'url=/';
		        	paramset = true;	
		        }

		    	window.open(url, 'twitter', opts);
				return false;
		    } ('".$message."',".$this->phpArrayToJsArray($hashtags).",".$includeRefUrl.");".
		"</script>";
    }

    private function phpArrayToJsArray($arr) {
    	$jsarr = '[';
    	for($i = 0; $arr!=null && $i<sizeof($arr); $i++) {
    		$jsarr = $jsarr . "'".$arr[$i]."'";
    		if($i < sizeof($arr)) {
    			$jsarr = $jsarr . ',';
    		}
    	}

    	$jsarr = $jsarr . ']';
    	return $jsarr;
    }

    public function showTweetButton() {
    	echo "
    		<div>
				<a id='custom-tweet-button' href=#>Tweet</a>
			</div>
    	";
    }
}

?>