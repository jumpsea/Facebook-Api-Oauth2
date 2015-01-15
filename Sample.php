<?php

		define ('FB_PATH' , '/facebook/Facebook_v3');

		include ('Facebook_v3.php');

		$fb_param['app_id']='Your-App-ID';
		$fb_param['app_skey']='Your-App-SecretKey';
		$fb_param['app_name']='Your-App-Name';
		$fb_param['app_redirect']="https://apps.facebook.com/{$fb_param['app_name']}/"; //Canvas, Website or PageTab Url
		$fb_param['app_permission']=array('email', 'user_friends','public_profile','user_likes','user_photos','publish_actions'); // Scope 
		$fb_param['app_javascriptpermissions']='public_profile,email,user_friends,'; // experimental , no function
		$fb_param['app_method']='canvas'; //canvas, redirect
		//$fb_param['app_cancel_uri']='https://www.facebook.com/jumpsea.development'; //Redirect Url for prevent Cancel Button Unlimited Loop

		$fb = new Facebook_v3();
		
		$fb->_init($fb_param);
		
		//User Profile
		$userdata = $fb->getGraphObject()->asArray();
		print_r($userdata);
		
		//Mapping Apps under same Business ID require
		$bid = $fb->BusinessId();
		
		if (!empty($bid))
		{
			foreach ($bid as $j)
			{
				echo 'FB User ID : ',@$j['id'],'<BR>';
				echo 'APP ID : ' , @$j['app']['id'],'<BR>';
				echo 'APP Name : ' , @$j['app']['name'],'<BR>';
				echo 'APP NameSpace : ' , @$j['app']['namespace'],'<BR><BR>';
			}
		}
		
?>