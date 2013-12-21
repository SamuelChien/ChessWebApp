<?php $this->load->view('i/header'); ?>
<?php 
    if (isset($status)) {
        echo "<div class='$status'><p>{$message}</p></div>";
    }
    echo "<div id='messageList'></div>";
?> 
<form id="loginform" action="/index.php/account/login" method="post" enctype="multipart/form-data">
    <h2>Enter your Credentials</h2>
    <input id="username" type="text" name="username" placeholder="Username" required>
    <input id="password" type="password" name="password" placeholder="Password" required>
    <button id="login" type="submit" name="login" value="login">Login</button>
</form>
<div id="loginbutton">
    <?php
        $this->load->helper('captcha');
        $vals = array(
            'img_path'   => './captcha/',
            'img_url'    => base_url().'captcha/',
            'img_width'  => '400',
            'img_height' => '80'
            );

        $cap = create_captcha($vals);
        echo $cap['image'];
        echo '<input type="hidden" id="captcha_secret" value="'.$cap['word'].'">';
        echo '<br><input id="captcha" type="text" name="captcha" placeholder="Enter Captcha" value="" >';
    ?>

    <button id="createAccount">Create Account</button>
    <button id="resetPassword">Reset Password</button>
</div>
<?php $this->load->view('i/footer'); ?>