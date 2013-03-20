<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav">
            <li>
                <a href="#">Home</a>
            </li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span5 offset3">
        <form action="index.php?action=login" method="post" class="form-horizontal">
            <legend>Login</legend>
            <div class="control-group">
                <label class="control-label">Username: </label>
                <div class="controls">
                    <input type="text" placeholder="Enter Your Username" name = "username" autofocus required>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Password: </label>
                <div class="controls">
                    <input type="password" placeholder="Enter Your Password" name = "password" required>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-primary" type="submit"><i class="icon-check icon-white"></i>  Login</button>
                </div>
            </div>    
        </form>
    </div>
</div>

