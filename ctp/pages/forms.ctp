<div id="wrapper" class="forms-main center top">
    
        <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="sub">free forms and notices</h1>
                <h1 class="main">download <span>anytime</span></h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/4.jpg"></div>
        </div>
        
        <div class="hero_sub col-xs-7 center">
            <p class="justify main col-xs-10 center">We provide these Forms and Notices as a courtesy to property managers and owners for their Florida properties. We recommend that you always seek the advice of your attorney when filling out these Forms and Notices. These Forms and Notices are not suitable for use in any state other than Florida.</p>
            <div class="hr_sb_over col-xs-12 center"></div>
            <img class="col-xs-12 center" src="/img/dev/pexels-photo.jpg" />
        </div>
    
        <div class="search center col-xs-8 push-b">
            
            <div class="fm_input col-xs-3 center inline">
                <i class="fa fa-caret-down" aria-hidden="true"></i>
                <select class="filter input col-xs-12">
                    <option value="volvo">State</option>
                </select>
            </div>
            
            <div class="fm_input col-xs-3 center inline">
                <input class="filter input col-xs-12 center inline" name="search" placeholder="Keywords">
            </div>
            
            <div class="fm_input col-xs-3 center inline">
                <i class="fa fa-caret-down" aria-hidden="true"></i>
                <select class="filter input col-xs-12">
                    <option value="volvo">Duration</option>
                    <option value="volvo">24 Hour</option>
                    <option value="saab">3 Day</option>
                    <option value="mercedes">7 Day</option>
                    <option value="audi">14 Day</option>
                    <option value="audi">21 Day</option>
                    <option value="audi">28 Day</option>
                </select>
            </div>
            
            <div class="fm_input fm_submit col-xs-2 last center inline">
                <input class="btn-orng input col-xs-12 center inline" type="submit" placeholder="Submit">
            </div>
            
        </div>
        
        <div class="content center col-xs-9 push-t">
            <!--
            <div id="formsTopFive" class="col-xs-12 center inline">
                
                <div class="fm_item col-xs-2 inline center">
                    <a href="#" download>
                        <i class="fa fa-calculator" aria-hidden="true"></i>
                        <p class="center">Top Five Item One</p>
                        <div class="fm_bot center"></div>
                    </a>
                </div>
                
                <div class="fm_item col-xs-2 inline center">
                    <a href="#" download>
                        <i class="fa fa-calculator" aria-hidden="true"></i>
                        <p class="center">Top Five Item Two</p>
                        <div class="fm_bot center"></div>
                    </a>
                </div>
                
                <div class="fm_item col-xs-2 inline center">
                    <a href="#" download>
                        <i class="fa fa-calculator" aria-hidden="true"></i>
                        <p class="center">Top Five Item Three</p>
                        <div class="fm_bot center"></div>
                    </a>
                </div>
                
                <div class="fm_item col-xs-2 inline center">
                    <a href="#" download>
                        <i class="fa fa-calculator" aria-hidden="true"></i>
                        <p class="center">Top Five Item Four</p>
                        <div class="fm_bot center"></div>
                    </a>
                </div>
                
                <div class="fm_item col-xs-2 inline center">
                    <a href="#" download>
                        <i class="fa fa-calculator" aria-hidden="true"></i>
                        <p class="center">Top Five Item Five</p>
                        <div class="fm_bot center"></div>
                    </a>
                </div>
                
            </div>
            -->
            <div class="col-xs-12 center inline">

				<?php
					$half_count = ceil(count($forms) / 2);
					$i = 0;
					foreach ($forms as $form) {
                    echo '<div class="col-xs-6 left center inline fnd_lst push-b">';
                        echo '<div class="col-xs-11 center">';
                            echo $this->Html->link('<p class="inline left">' . $form['Form']['title'] . '</p><i class="fa fa-caret-right inline right" aria-hidden="true"></i>', array(
                                'admin' => false,
                                'controller' => 'pages',
                                'action' => 'download',
                                $form['Form']['id']
                            ), array(
                                    'escape' => false
                                )
                            );
                        echo '</div></div>';
						$i++;
					}
				?>
            
            </div>
        
        </div>
    
</div>