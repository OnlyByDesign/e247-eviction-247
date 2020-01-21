<?php
//debug($home_link);
			$links = array(
		    array(
		        'title' => 'Home',
		        'link' => array('controller' => 'pages', 'action' => 'display', 'home', 'admin' => false),
		        'urls' => array('/index.php/'),
		        /*'urls' => array($home_link),*/
		        'logged_in' => true,
		        'logged_out' => true
		    )
	       );
			$links[] = array(
	        'title' => 'Contact Us',
	        'link' => array('controller' => 'forms', 'action' => 'contact', 'admin' => false),
	        'urls' => array('/index.php/forms/contact'),
	        'logged_in' => true,
	        'logged_out' => true
	       );
			$links[] = array(
		    'title' => 'Free Forms',
		    'link' => array('controller' => 'pages', 'action' => 'forms', 'admin' => false),
		    'urls' => array('/index.php/pages/forms'),
		    'logged_in' => true,
		    'logged_out' => true,
		      );
			$links[] = array(
	        'title' => 'My Account',
	        'link' => array('controller' => 'users', 'action' => 'login'),
	        'urls' => array('/login'),
	        'logged_in' => false,
	        'logged_out' => true
	       );
			$links[] = array(
	        'title' => 'My Account',
	        'link' => array('controller' => 'users', 'action' => 'dashboard'),
	        'urls' => array('/index.php/users/dashboard'),
	        'logged_in' => true,
	        'logged_out' => false
	       );
			$links[] = array(
	        'title' => 'Log out',
	        'link' => array('controller' => 'users', 'action' => 'logout'),
	        'urls' => array('/logout'),
	        'logged_in' => true,
	        'logged_out' => false
	       );
	
	
	
	foreach ($links as $link) {
	    $match = false;
	    foreach ($link['urls'] as $url) {
	        if ($this->here == $url) {
	            $match = true;
	        } else if (strstr($url, '*')) {
	            $url = substr($url, 0, strlen($url) - 1);
	            if (strpos($this->here, $url) === 0) {
	                $match = true;
	            }
	        }
	    }
	
	    if ($match) {
	        $class = array('class' => 'current');
	    } else {
	        $class = array();
	    }
	
	
	    $show = false;
	    if ($logged_in && $link['logged_in']) {
	   		$show = true;
				if ($link['title'] == 'My Account') {
	     		if (AuthComponent::user('role') == 'admin' || AuthComponent::user('role') == 'superadmin') {
	     			$link['link'] = array('controller' => 'users', 'action' => 'dashboard', 'admin' => true);
		      }
		    }
	    } elseif (!$logged_in && $link['logged_out']) {
	        $show = true;
	    }
	
	    if ($show) {
	        echo $this->Html->link(
	            $link['title'],
	            $link['link'],
	            $class
	        );
	    }
	}
	
