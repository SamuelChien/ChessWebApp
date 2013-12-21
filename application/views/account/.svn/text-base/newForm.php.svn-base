<?php $this->load->view('i/header'); ?>
<?php 
    if (isset($status)) {
        echo "<div class='$status'><p>{$message}</p></div>";
    }
    echo "<div id='messageList'></div>";
?> 
<form id="createform" action="/index.php/account/createNew" method="post" enctype="multipart/form-data">
    <h2>Create New Account</h2>
    <input id="username" type="text" name="username" placeholder="Username" required>
    <input id='pass1' class='middle' type="password" name="password" placeholder="Password" required>
    <input id='pass2' class='middle' type="password" name="passf" placeholder="Confirmation Password" required>
	<input id="first" class='middle' type="text" name="first" placeholder="First Name" required>
	<input id="last"  class='middle' type="text" name="last" placeholder="LastName" required>
	<input id="email" class='middle' type="text" name="email" placeholder="Email" required>
    <button id="create" type="submit" name="Submit" value="Submit">Submit</button>
</form>
<div id="captchaDiv">
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
</div>
<?php $this->load->view('i/footer'); ?>

