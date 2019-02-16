<h1>Password reset</h1>
    <p>Please complete the information below ...</p>

    <form action="reset.php" method="post" class="needs-validation" novalidate>
      <div class="form-group">
        <label for="inputPassword1">Password</label>
        <input name="password1" type="password" class="form-control" id="inputPassword1" required>
      </div>

      <div class="form-group">
        <label for="inputPassword2">Confirm password</label>
        <input name="password2" type="password" class="form-control" id="inputPassword2" required>
      </div>

      <button type="submit" class="btn btn-primary" formmethod="post">Submit</button>
      <a href="index.php" class="btn btn-dark">Cancel</a>
    </form>