<div class="container">
<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
<div class="card-body p-0">
  <!-- Nested Row within Card Body -->
  <div class="row">
      <div class="col-lg">
          <div class="p-5">
              <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Registrasi Akun</h1>
              </div>

              <form class="tbl_admin" method="post" action="<?= base_url('Auth/adminregistrasi'); ?>">

                  <div class="form-group row">
                  </div>
                  <div class="form-group">
                      <!--add set value to repopulating the form for user which input wrong format on form-->
                      <input type="text" class="form-control form-control-user" id="admin_nama" name="admin_nama" placeholder="Full Name" value="<?= set_value('admin_nama'); ?>">
                      <!--to set form error in midle position-->
                      <?= form_error('admin_nama','<small class="text-danger ml-3">','</small>'); ?>
                  </div>

                  <div class="form-group">
                      <!--add set value to repopulating the form for user which input wrong format on form-->
                      <input type="text" class="form-control form-control-user" id="admin_username" name="admin_username" placeholder="Username" value="<?= set_value('admin_username'); ?>">
                      <!--to set form error in midle position-->
                      <?= form_error('admin_username','<small class="text-danger ml-3">','</small>'); ?>
                  </div>

                  <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="admin_email" name="admin_email" placeholder="Email Address" value="<?= set_value('admin_email'); ?>">
                      <!--to set form error in midle position-->
                       <?= form_error('admin_email','<small class="text-danger ml-3">','</small>'); ?>
                  </div>

                  <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="password" class="form-control form-control-user" id="admin_password1" name="admin_password1" placeholder="Password">
                           <!--to set form error in midle position-->
                           <?= form_error('admin_password1','<small class="text-danger ml-3">','</small>'); ?>
                      </div>

                      <div class="col-sm-6">
                          <input type="password" class="form-control form-control-user" id="admin_password2" name="admin_password2" placeholder="Repeat Password">
                      </div>
                  </div>

                  <button type="submit" class="btn btn-primary btn-user btn-block">
                      Register Account
                  </button>
              </form>

              <hr>

              <div class="text-center">
                  <a class="small" href="<?= base_url('');?>">Forgot Password?</a>
              </div>
              <div class="text-center">
                  <a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun ? Login disini</a>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
</div>
