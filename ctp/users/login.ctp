<div id="wrapper" class="lg-wrap center">
        
    <div class="hero hr_alt lg col-xs-12 center">
            <div class="hr_sp hr_sp_1"></div>
            <div class="hr_sp hr_sp_2"></div>
            <img class="hr_split" src="/img/dev/pexels-photo.jpg" width="100%" />
        </div>
        
    <div class="login col-xs-7 center">
        <div class="ct_ov col-xs-12 center"></div>
        <h1 class="ct col-xs-12 center"><span>Login</span> to Your Account</h1>
        <div class="col-xs-6 center inline">				
            <?php
                echo $this->Session->flash();
                echo $this->Session->flash('auth');
                echo $this->Form->create('User', array('action' => 'login'));
                echo $this->Form->input('username', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 center last'),
                    'class' => 'input col-xs-12 center',
                    'after' => '<a href="#"><p notab="notab">Forgot your Username?</p></a>',
                    'placeholder' =>  'Username',
                    'label' => false
                ]);
                echo $this->Form->input('password', [
                    'div' => array('class' => 'fm_input fm_text col-xs-12 center last'),
                    'class' => 'input col-xs-12 center',
                    'after' => '<a href="#"><p notab="notab">Forgot your Username?</p></a>',
                    'type' => 'password',
                    'placeholder' =>  'Password',
                    'label' => false
                ]);
            ?>
            <div class="col-xs-12 center">
                <a href="/index.php/register"><div id="createAcc" class="btn-blue col-xs-5-2 center left">
                    <p>Create an Account</p>
                </div></a>
                <?php
                    echo $this->Form->submit('submit', [
                            'class' => 'btn-orng input center col-xs-5-2 right',
                            'type' => 'submit',
                            'name' => 'Submit',
                            'value' => 'Submit',
                            'label' => false
                        ]);                
                    echo $this->Form->end();
                    include '/app/webroot/files/alert_popup.inc';
                ?>
            </div>
        </div>
    </div>
</div>