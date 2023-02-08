<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

<div class="text-center" style="width:500px;margin:auto;margin-top:150px">
  <main class="form-signin w-100 m-auto">
    <form action="<?php echo base_url("LoginAdmin/check"); ?>" method="POST">
      <img class="mb-4" src="<?php echo base_url('assets/img/troc.png') ?>" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">WELCOME ADMIN</h1>

      <div class="form-floating mt-5">
        <input name="email" nametype="email" class="form-control" id="floatingInput" placeholder="name@example.com" required value="Zo@gmail.mg">
      </div>
      <div class="form-floating mt-4">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required value="1234">
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
    </form>
  </main>
</div>