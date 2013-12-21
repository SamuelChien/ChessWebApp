<!DOCTYPE html>
<html lang="en-us ">
    <head>
        <title><?php echo $title?> &mdash; SmashBoard</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link id="mainstyle" rel="stylesheet" type="text/css" href="/css/global.css">
    </head>
    <body>
        <div id="container">
            <div id="header" class="hide">
                <a href="/"><h1>SmashBoard</h1></a>
                <div id="userinfo">
                    <?php if ($this->user->logged_in()): ?>
                        <p>Welcome, <?php echo $this->session->userdata('name'); ?> | <a href="/account/updatePasswordForm">Change Password</a> | <a href="/account/logout">Logout</a></p>
                    <?php else: ?>
                        <p><a href="/account/login">Login</a></p>
                    <?php endif; ?>
                </div>
            </div>
            <div id="content">

