<?php $this->load->view('i/header'); ?>
<?php 
    if (isset($status)) {
        echo "<div class='$status'><p>{$message}</p></div>";
    }
?> 
<form id="recoveryform" action="/index.php/account/recoverPassword" method="post" enctype="multipart/form-data">
    <h2>Forgot Your Password?</h2>
	<input id="email" class='top' type="text" name="email" placeholder="Email" required>
    <button id="login" type="submit" name="Submit" value="Submit">Submit</button>
</form>
<?php $this->load->view('i/footer'); ?>
