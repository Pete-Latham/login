<h1>Please feel free to log in ...</h1>

    <form action="index.php" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Enter email" <? echo "value=$rememberedUser"?>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else (if you're lucky).</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="inputPassword">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="remember" id="remember">
        <label class="form-check-label" for="remember">Remember me</label>
      </div>
      <button type="submit" class="btn btn-primary" formmethod="post">Submit</button>
      <a href="sign_up.php" class="btn btn-dark">Sign Up</a>
      <a href="forgot.php" class="font-weight-light forgot">I've forgotten my password</a>
    </form>