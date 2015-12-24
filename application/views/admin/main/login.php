<form action="<?=$adminBaseUrl?>login" method="POST" class="form-signin">
    <h2 class="form-signin-heading">Faça o login</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
    </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>