<?php $this->load->view('i/header'); ?>
<?php 
    if (isset($status)) {
        echo "<div class='$status'><p>{$message}</p></div>";
    }
?> 
<form id="createform" action="/index.php/account/updatePassword" method="post" enctype="multipart/form-data">
    <h2>Change Your Password</h2>
    <input id="oldPassword" type="text" name="oldPassword" placeholder="oldPassword" required>
    <input id='pass1' class='middle' type="password" name="newPassword" placeholder="newPassword" required>
    <input id='pass2' class='middle' type="password" name="passconf" placeholder="Confirmation Password" required>
    <button id="create" type="submit" name="Submit" value="Submit">Submit</button>
</form>
<?php $this->load->view('i/footer'); ?>