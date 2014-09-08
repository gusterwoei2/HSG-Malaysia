<?php

class facebookapi {

	/*
		Facebook api initialization function.
		NOTE: Always call this function first before any other
	*/
	private function fbcall($func) {
		return "
			window.fbAsyncInit = function() {
					FB.init({
		          		appId      : '342742715885722',
		         		xfbml      : true,
			        	version    : 'v2.0'
			    	});".
			"};
		";
	}

	/*
		Facebook initialization on page load, called once only
	*/
	public function init() {
		echo "
		<script type='text/javascript'>"
			.$this->fbcall('').
	      	"(function(d, s, id) {
		      		var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) {
						return;
					}
			        js = d.createElement(s); 
			        js.id = id;
			        js.src = '//connect.facebook.net/en_US/sdk/debug.js';
			        fjs.parentNode.insertBefore(js, fjs);} (
			        	document, 'script', 'facebook-jssdk'
					)
	       	);
		</script>
		";
		return $this;
	}

	public function showPostDialog($url) {
		echo "
			<script type='text/javascript'>".
			$this->fbcall(
				"FB.ui({
					  method: 'share',
					  href: '".$url."'
					}, function(response){
						// handle response
					}
				);"
			)
			."</script>
		";
	}

	/*
		Show a Facebook Like and Share button
		NOTE: this won't work on localhost, you'll be prompted an error message: 
		Message Failed: This message contains content that has been blocked by our security systems.
	*/
	public function showShareLikeButtons($url) {
		echo "
			<div
			  class='fb-like'
			  data-send='true'
			  data-width='450'
			  data-href='".$url."'
			  data-share='true'
			  data-show-faces='true'>
			</div>
		";
	}
}

?>