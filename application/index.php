<?php
session_start();
include './include/links.php';
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png" />
  <link href="../css/style.css" rel="stylesheet" />
</head>

<body class="h-100">
  <div class="authincation h-100">
    <div class="container-fluid h-100">
      <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
          <div class="authincation-content">
            <div class="row no-gutters">
              <div class="col-xl-12">
                <div class="auth-form">
                  <div class="error-handler"></div>
                  <h4 class="text-center mb-4">Sign in your account</h4>
                  <form>


                    <div class="form-group">
                      <label><strong>Email</strong></label>
                      <input type="email" class="form-control email" placeholder="user@gmail.com" />
                    </div>
                    <div class="form-group">
                      <label><strong>Password</strong></label>
                      <input type="password" class="form-control password" placeholder="user@password" />
                    </div>
                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                      <div class="form-group">
                        <!-- <div class="form-check ml-2">
                                                    <input class="form-check-input" type="checkbox" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
                                                </div> -->
                      </div>
                      <div class="form-group forget">
                        <a href="#">Forgot Password?</a>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-block login">
                        Sign me in
                      </button>
                    </div>
                  </form>
                  <div class="new-account mt-3">
                    <p>
                      Don't have an account?
                      <a class="text-primary" href="./page-register.html">Sign up</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Verification Modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <p>Please fill below your Email to verify✔ </p>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control emailVerification" placeholder="email" id="recipient-name">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary emailSend">Send</button>
        </div>
      </div>
    </div>
  </div>
  <!-- the modal that allows the user to change the password -->

  <div class="modal fade newPasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Verification Model</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <p>Enter the verification code that we sent you in your Email </p>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control verCode" placeholder="Verificatio Code" id="recipient-name">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary code">save</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Password Changer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <input type="text" class="form-control newPassword" placeholder="new Password" id="recipient-name">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control confirmPassword" placeholder="Confirm" id="recipient-name">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary updatePass">Update</button>
        </div>
      </div>
    </div>
  </div>
  <!--**********************************
        Scripts
    ***********************************-->
  <!-- Required vendors -->
  <script src="./vendor/global/global.min.js"></script>
  <script src="./js/quixnav-init.js"></script>
  <script src="./js/custom.min.js"></script>
  <script src="./js/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
  <script src="../iziToast-master/dist/js/iziToast.js"></script>
  <script src="../iziToast-master/dist/js/iziToast.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src='../js/jquery-3.3.1.min.js'></script>

  <script>
    $(document).ready(() => {
      $(".login").click((e) => {
        e.preventDefault();
        if ($(".email").val() == "" || $(".password").val() == "") {
          $(".error-handler").html(`
                <div class="alert alert-danger">
                      <strong class='text-dark'>Provide, Email And Password To continue 👇..</strong>
                    </div>

            `);
          setTimeout(() => {
            $(".error-handler").html("");
          }, 3000);
        } else {
          $.ajax({
            method: "POST",
            dataType: "JSON",
            data: {
              email: $(".email").val(),
              pass: $(".password").val(),
              action: "validateAuth",
            },
            url: "./Api/auth.api.php",
            success: (res) => {
              const { isFound, data } = res;
              console.log(data)
              if (isFound) {
                sessionStorage.setItem('username', data.name);

                window.location.href = "./view/dashboard.php";
              } else {
                $(".error-handler").html(`
                <div class="alert alert-danger">
                      <strong class='text-dark'>Incorrect Email or Password 💁‍♂️</strong>
                    </div>

            `);
                setTimeout(() => {
                  $(".error-handler").html("");
                }, 3000);
              }
            },
            error: (err) => {
              console.log(err);
              $(".error-handler").html(`
                <div class="alert alert-danger">
                      <strong class='text-dark'>Internal Server Error Occurred 😢</strong>
                    </div>

            `);
            },
          });
        }
      });
    });
    $(".forget").click(function () {

      $(".loginModal").modal('show');
    });
    $(".emailSend").click(function () {
      email = $(".emailVerification").val();
      $.ajax({
        method: "POST",
        dataType: "JSON",
        data: { email: email, action: "emailVer", table: "admins" },
        url: './Api/auth.api.php',
        success: (res) => {
          var { data, isExist, code, message, error } = res
          if (isExist) {
            localStorage.setItem("code", code)
            // localStorage.setItem("table", $(".table select").val())

            $(".loginModal").modal('hide'); $(".newPasswordModal").modal('show');
          } else {
            alert(error)
          }
          console.log(res);


        },
        error: (err) => {
          console.log(err);
        }
      })
    });


    $(".code").click(function () {
      if ($('.verCode').val() == localStorage.getItem("code")) {
        alert('same code');
        $(".updateModal").modal('show');
      }
      else {
        alert('wrong code');

      }
    });

    $(".updatePass").click(() => {
      if ($(".newPassword").val() != $(".confirmPassword").val())

    {
      alert("Confirm Password must be same as new password")
      return;
    }
    data = {
      email: $(".emailVerification").val(),
      password: $(".newPassword").val(),
      action: "updateUser",
      table: "admins"
    };
    $.ajax({
      method: "POST",
      dataType: "JSON",
      data: data,
      url: './Api/auth.api.php',
      success: (res) => {
        console.log(res);
        $(".updateModal").modal('hide');
        window.location.href = "./login.php";
        localStorage.clear()
      },
      error: (err) => {
        console.log(err);
      }
    })
    })

  </script>
</body>

</html>