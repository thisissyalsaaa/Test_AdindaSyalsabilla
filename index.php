<!DOCTYPE html>
<html lang="en">

<head>


    <title>Sign In</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
    .auth-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        min-width: 100%;
        min-height: 100vh;
        background: #1abc9c;
        background-image: url("assets/images/bg1.jpg");
        background-color: antiquewhite;
        background-size: cover;
        background-attachment: fixed;
        background-position: center;

    }
    </style>




</head>


<div class="auth-wrapper">
    <div class="auth-content text-center">
        <img src="../assets" alt="" class="img-fluid mb-4">
        <div class="card borderless">
            <form action="proses_login.php" method="POST">
                <div class="row align-items-center ">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h4 class="mb-3 f-w-400">Login</h4>
                            <hr>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="username" id="Email"
                                    placeholder="username">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control" name="password" id="Password"
                                    placeholder="Password">
                            </div>

                            <button class="btn btn-block btn-primary mb-4" type="submit">Signin</button>
                            <hr>

                            <!-- <p class="mb-0 text-muted">Don’t have an account? <a href="../signup/index.php"
                                    class="f-w-400">Signup</a></p> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="../assets/js/vendor-all.min.js"></script>
<script src="../assets/js/plugins/bootstrap.min.js"></script>

<script src="../assets/js/pcoded.min.js"></script>



</body>

</html>