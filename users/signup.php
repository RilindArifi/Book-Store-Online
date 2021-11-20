<?php require_once 'header1.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 mb-5 pr-5 pl-5 pb-5" style="background-color: gainsboro;">
                <span id="help"></span>
                <h1 class="title-1 m-0 mb-4 mt-4" style="text-align: center">Sign up </h1>
                <form action="" class="" action="" method="POST">
                    <div class="form-group">
                        <i class="fa fa-envelope"></i> <label for="">Email</label>
                        <input type="email" name="email" id="email" value="" class="form-control" placeholder="Email@net.com" required>
                        <span id="email-help"></span>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-key"></i> <label for="">Password</label>
                        <input type="password" name="Password" id="password" value="" class="form-control" placeholder="*******" required>
                        <span id="pass-help"></span>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-key"></i> <label for="">Confirmim Password</label>
                        <input type="password" name="cpassword" id="cpassword" value="" class="form-control" placeholder="********" required>
                        <span id="cpass-help"></span>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-user"></i> <label for="">Full Name</label>
                        <input type="text" name="name" id="name" value="" class="form-control" placeholder="" required>
                        <span id="name-help"></span>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-mobile"></i> <label for="">Mobile</label>
                        <input type="text" name="mobile" id="mobile" value="" class="form-control" placeholder="" required>
                        <span id="mobile-help"></span>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" id="submit" name="submit" value="Let me Join" class="btn btn-success" style=" width: 100%;">Let me Join</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"> </div>
        </div>

    </div>
</body>

</html>

<?php  require_once '../admin/footer.php'?>





<script type="text/javascript">
    $(document).ready(function() {

        var validname = false;
        var validpass = false;
        var validcpass = false;
        var validemail = false;
        var validmobile = false;
        var email = "";
        var password = "";
        var cpassword = "";
        var name = "";
        var mobile = "";



        $('#email').blur(function() {

            email = $(this).val();
            var regex = /^\w+[\w\.]*@\w+((-w+)|(\w*))\.[a-z]{2,3}$/;

            if (email == "" || email == null) {
                $('#email-help').html('<img src="200.gif" height="50" width="50">');
                window.setTimeout(function() {
                    $('#email-help').css("color", "red");
                    $('#email-help').html('&#10005; Please enter your email');

                }, 500);
                validemail = false;

            } else {



                if (!regex.test(email)) {
                    $('#email-help').html('<img src="200.gif" height="50" width="50">');
                    window.setTimeout(function() {
                        $('#email-help').css("color", "red");
                        $('#email-help').html('&#10005; Email is not valid');

                    }, 500);
                    validemail = false;
                } else {
                    $.ajax({

                        url: 'email_check.php',
                        method: 'POST',
                        data: {
                            email: email
                        },
                        dataType: "text",
                        success: function(data) {

                            if (data == 1) {
                                $('#email-help').html('<img src="200.gif" height="50" width="50">');
                                window.setTimeout(function() {
                                    $('#email-help').css("color", "red");
                                    $('#email-help').html('&#10005; Email already registered');

                                }, 500);
                                validemail = false;
                            } else {
                                $('#email-help').html('<img src="200.gif" height="50" width="50">');
                                window.setTimeout(function() {
                                    $('#email-help').css("color", "green");
                                    $('#email-help').html('&#10003; Email is correct');

                                }, 500);
                                validemail = true;
                            }
                        }
                    });



                    $('#email-help').html('<img src="200.gif" height="50" width="50">');
                    window.setTimeout(function() {
                        $('#email-help').css("color", "green");
                        $('#email-help').html('&#10003; Email is correct');

                    }, 500);
                    validemail = true;
                }
            }
        });

        $('#password').blur(function() {

            password = $(this).val();

            if (password == "" || password == null) {

                $('#pass-help').html('<img src="200.gif" height="50" width="50">');
                window.setTimeout(function() {
                    $('#pass-help').css("color", "red");
                    $('#pass-help').html('&#10005; Please enter your password');

                }, 500);
                validpass = false;


            } else if (password.length < 5) {
                $('#pass-help').html('<img src="200.gif" height="50" width="50">');
                window.setTimeout(function() {
                    $('#pass-help').css("color", "red");
                    $('#pass-help').html('&#10005; Password must be of 5 characters');

                }, 500);
                validpass = false;

            } else {
                $('#pass-help').html('<img src="200.gif" height="50" width="50">');
                window.setTimeout(function() {
                    $('#pass-help').css("color", "green");
                    $('#pass-help').html('&#10003; Password is correct');

                }, 500);
                validpass = true;
            }
        });


        $('#cpassword').blur(function() {

            cpassword = $(this).val();


            if (cpassword == "" || cpassword == null) {

                $('#cpass-help').html('<img src="200.gif" height="50" width="50">');
                window.setTimeout(function() {
                    $('#cpass-help').css("color", "red");
                    $('#cpass-help').html('&#10005; Please confirm your password');

                }, 500);
                validcpass = false;




            } else if ((password != cpassword) || (cpassword.length < 5)) {
                $('#cpass-help').html('<img src="200.gif" height="50" width="50">');
                window.setTimeout(function() {
                    $('#cpass-help').css("color", "red");
                    $('#cpass-help').html('&#10005; Password did not matched');

                }, 500);
                validcpass = false;

            } else {
                $('#cpass-help').html('<img src="200.gif" height="50" width="50">');
                window.setTimeout(function() {
                    $('#cpass-help').css("color", "green");
                    $('#cpass-help').html('&#10003; Password matched');

                }, 500);
                validcpass = true;
            }
        });




        $('#name').blur(function() {

            name = $(this).val();
            var regex = /^[a-zA-Z ]+$/;

            if (name == "" || name == null) {

                $('#name-help').html('<img src="200.gif" height="50" width="50">');
                window.setTimeout(function() {
                    $('#name-help').css("color", "red");
                    $('#name-help').html('&#10005; Please enter your name');

                }, 500);
                validname = false;
            } else if (!regex.test(name)) {
                $('#name-help').html('<img src="200.gif" height="50" width="50">');
                window.setTimeout(function() {
                    $('#name-help').css("color", "red");
                    $('#name-help').html('&#10005; Just words and space');

                }, 500);
                validname = false;

            } else {
                $('#name-help').html('<img src="200.gif" height="50" width="50">');
                window.setTimeout(function() {
                    $('#name-help').css("color", "green");
                    $('#name-help').html('&#10003; Name is correct');

                }, 500);
                validname = true;
            }
        });


        $('#mobile').blur(function() {

            mobile = $(this).val();
            var regex = /^[0-9]\d{8}$/;

            if (mobile == "" || mobile == null) {

                $('#mobile-help').html('<img src="200.gif" height="50" width="50">');
                window.setTimeout(function() {
                    $('#mobile-help').css("color", "red");
                    $('#mobile-help').html('&#10005; Please enter your number');

                }, 500);
                validmobile = false;
            } else if (!regex.test(mobile)) {
                $('#mobile-help').html('<img src="200.gif" height="50" width="50">');
                window.setTimeout(function() {
                    $('#mobile-help').css("color", "red");
                    $('#mobile-help').html('&#10005;Number is full of 9 characters');

                }, 500);
                validmobile = false;

            } else {
                $.ajax({

                    url: 'mobile_check.php',
                    method: 'POST',
                    data: {
                        mobile: mobile
                    },
                    dataType: "text",
                    success: function(data) {

                        if (data == 1) {
                            $('#mobile-help').html('<img src="200.gif" height="50" width="50">');
                            window.setTimeout(function() {
                                $('#mobile-help').css("color", "red");
                                $('#mobile-help').html('&#10005; Mobile already registered');

                            }, 500);
                            validemail = false;
                        } else {
                            $('#mobile-help').html('<img src="200.gif" height="50" width="50">');
                            window.setTimeout(function() {
                                $('#mobile-help').css("color", "green");
                                $('#mobile-help').html('&#10003; Mobile is correct');

                            }, 500);
                            validemail = true;
                        }
                    }
                });
            }
        });

        $('#submit').click(function() {
            if (validmobile == false || validname == false || validpass == false || validcpass == false || validemail == false) {
                $('#help').html('<div class="alert alert-danger">Fill in all the fields correctly</div>');

                window.setTimeout(function() {
                    $('.alert').fadeTo(500, 0).slideUp(500, function() {
                        $(this).remove();
                    });

                }, 1000);
            } else {

                $.ajax({

                    url: 'signuphandler.php',
                    method: 'POST',
                    data: {
                        email: email,
                        password: password,
                        name: name,
                        mobile: mobile
                    },
                    dataType: "text",
                    success: function(data) {
                        $('#help').html(data);
                        window.setTimeout(function() {
                            window.location.href = window.location.href;
                        }, 2000);
                    }
                });
            }
        });

    });
</script>
<script src="bootstrap-4.5.3-dist/jquery-3.5.1.min.js"></script>
<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>