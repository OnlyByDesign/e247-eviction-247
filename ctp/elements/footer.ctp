<?php
	$links = array(
    array(
        'title' => 'Home',
        'link' => array('controller' => 'pages', 'action' => 'display', 'home', 'admin' => false),
        'urls' => array('/index.php/'),
        'logged_in' => true,
        'logged_out' => true,
    )
	);
/*
	if (CakeSession::read('CurrentSite') != 'leases' && CakeSession::read('CurrentSite') != 'landing-page') {
			$links[] = array(
        'title' => 'About Us',
        'link' => array('controller' => 'pages', 'action' => 'display', 'about_us', 'admin' => false),
        'urls' => array('/index.php/pages/about_us'),
        'logged_in' => true,
        'logged_out' => true,
    );
	}
*/
	$links[] = array(
    'title' => 'Contact Us',
    'link' => array('controller' => 'forms', 'action' => 'contact', 'admin' => false),
    'urls' => array('/index.php/forms/contact'),
    'logged_in' => true,
    'logged_out' => true,
  );
	$links[] = array(
    'title' => 'Free Forms',
    'link' => array('controller' => 'pages', 'action' => 'forms', 'admin' => false),
    'urls' => array('/index.php/pages/forms'),
    'logged_in' => true,
    'logged_out' => true,
  );
/*
	$links[] = array(
    'title' => 'FAQ',
    'link' => array('controller' => 'pages', 'action' => 'display', 'faq', 'admin' => false),
    'urls' => array('/index.php/pages/faq'),
    'logged_in' => true,
    'logged_out' => true
  );
*/
/*	if (CakeSession::read('CurrentSite') != 'leases' && CakeSession::read('CurrentSite') != 'landing-page') {
		$links[] = array(
	      'title' => 'Learn More',
	      'link' => array('controller' => 'pages', 'action' => 'display', 'learn_more', 'admin' => false),
	      'urls' => array('/index.php/pages/learn_more'),
	      'logged_in' => true,
	      'logged_out' => true
	  );
	}*/
	$links[] = array(
    'title' => 'Terms of Use',
    'link' => array('controller' => 'pages', 'action' => 'terms_of_use', 'admin' => false),
    'urls' => array('/index.php/pages/terms_of_use'),
    'logged_in' => true,
    'logged_out' => true,
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