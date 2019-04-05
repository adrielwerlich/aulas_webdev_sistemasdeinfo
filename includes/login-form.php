<style>
input{
    width: 100%;
}
</style>
<form action="#" method="post" id="login-form" style="margin-top:10%;">
        <h1> ¨¨LOGIN FORM¨¨ </h1>

    <div class="form-group">
        <label for="login">Login</label>
        <input id="login" name="login" type="text" placeholder="Insert your login" required>
    </div>

    <div class="form-group">
        <label for="passw">Password</label>
        <input id="passw" name="password" type="password" placeholder="Insert your password" required>
    </div>

    <button class="btn btn-success">Login</button>
    
</form>

<?php

    if ( (isset($_POST['login']) && $_POST['login'] == 'login') &&  
        (isset($_POST['password']) && $_POST['password'] == 'pass') ) 
    {
        echo 'login done';
        $_POST = array();
        $_POST['controls'] = 'set_controls';
        session_cache_expire(30);
        session_start();
        $_SESSION['user'] = 'login';
    } 
        
        $_POST = array();
        

?>