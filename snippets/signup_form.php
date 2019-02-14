<h1>So, you want to sign up, eh?</h1>
    <h3>Please complete the information below ...</h3>

    <form action="sign_up.php" method="post" class="needs-validation" novalidate>
      <div class="form-group">
        <label for="inputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Enter email" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else (if you're lucky).</small>
      </div>

      <div class="form-group">
        <label for="name">First name</label>
        <input name="name" type="text" class="form-control" id="name" required>
      </div>

      <div class="form-group">
        <label for="surname">Surname</label>
        <input name="surname" type="text" class="form-control" id="surname" required>
      </div>

      <div class="form-group">
        <label for="inputPassword1">Password</label>
        <input name="password1" type="password" class="form-control" id="inputPassword1" required>
      </div>

      <div class="form-group">
        <label for="inputPassword2">Confirm password</label>
        <input name="password2" type="password" class="form-control" id="inputPassword2" required>
      </div>

      <button type="submit" class="btn btn-primary" formmethod="post">Submit</button>
    </form>