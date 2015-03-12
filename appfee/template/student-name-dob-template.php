<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-US" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-US" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-US">
<!--<![endif]-->

<head>
    <title>Pay Application Fees @ Bellevue College</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $globals_url ?>c/g.css">
    <link rel="stylesheet" media="print" href="<?php echo $globals_url ?>c/p.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script type="text/javascript" src="<?php echo $globals_url ?>j/ghead.js"></script>
    <!--[if lt IE 9]><script type="text/javascript" src="/<?php echo $globals_url ?>j/respond.js"></script><![endif]-->
    <link rel='stylesheet' id='open-sans-css' href='//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.0.1' type='text/css' media='all' />
    <?php require($globals_path. "h/gabranded.html"); ?>
</head>

<body class="nav-enrollment">
    <?php require($globals_path. "h/bhead.html"); ?>
    <div id="main-wrap" class="globals-branded">
        <div id="main" class="container no-padding">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-shadow" id="content">
                        <div class="row row-padding">
                            <div class="content-padding">
                                <p class='entry-title'>&nbsp;</p>
                                <h1>Application Fee Payment Form</h1>
                                <p class="lead">Thank you for your application to Bellevue College! Please provide the information below so that we can link your payment to your application. Required fields marked with *</p>
                                <form class="form-horizontal" id="payment_confirmation" action="<?php echo $form_post_url ?>" method="post">

                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-3 control-label">Student First Name:*</label>
                                        <div class="col-sm-8">
                                            <input type="text" maxlength="32" class="form-control" id="first_name" name="first_name" aria-required="true" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle_name" class="col-sm-3 control-label">Student Middle Name:</label>
                                        <div class="col-sm-5">
                                            <input type="text" maxlength="16" class="form-control" id="middle_name" name="middle_name" />
                                        </div>
                                        <dir class="col-sm-3 checkbox">
                                            <label>
                                                <input id="no_middle_name" type="checkbox"> No Middle Name
                                            </label>
                                        </dir>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name" class="col-sm-3 control-label">Student Last Name:*</label>
                                        <div class="col-sm-8">
                                            <input type="text" maxlength="32" class="form-control" id="last_name" name="last_name" aria-required="true" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_of_birth" class="col-sm-3 control-label">Student Date of Birth:*</label>
                                        <div class="col-sm-4">
                                            <input type="text" maxlength="10" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="mm/dd/yyyy" aria-required="true" aria-describedby="dob_help_block" required />
                                            <p id="dob_help_block" class="sr-only help-block">Enter your Date of Birth in MM/DD/YYYY format</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-8">
                                            <button type="submit" id="submit" class="btn btn-primary">Continue</button>
                                        </div>
                                    </div>
                                </form>
                                <!--	End Form	-->

                            </div>
                            <!--.content-padding-->
                        </div>
                        <!--.row-padding-->
                    </div>
                    <!-- #content-->
                </div>
                <!-- row -->
            </div>
            <!-- col-md-12 -->
        </div>
        <!-- #main .container -->
    </div>
    <!-- #main-wrap -->

    <?php require($globals_path. "h/bfoot.html"); ?>
    <?php require($globals_path. "h/legal.html"); ?>


    <script src="<?php echo $globals_url ?>j/bootstrap.min.js"></script>
    <script src="<?php echo $globals_url ?>j/g.js"></script>
    <!-- jQuery Validate -->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            /**
             * Add Middle-Endian date format to jQuery Validation
             * (Based on dateITA format found in additional-methods.js)
             *
             * Return true, if the value is a valid date, also making this formal check mm/dd/yyyy.
             *
             * @example $.validator.methods.date("01/01/1900")
             * @result true
             *
             * @example $.validator.methods.date("13/01/1990")
             * @result false
             *
             * @example $.validator.methods.date("01.01.1900")
             * @result false
             *
             * @example <input name="pippo" class="{dateME:true}" />
             * @desc Declares an optional input element whose value must be a valid date.
             *
             * @name $.validator.methods.dateME
             * @type Boolean
             * @cat Plugins/Validate/Methods
             */
            $.validator.addMethod("dateME", function (value, element) {
                var check = false,
                    re = /^\d{1,2}\/\d{1,2}\/\d{4}$/,
                    adata, mm, gg, aaaa, xdata;
                if (re.test(value)) {
                    adata = value.split("/");
                    mm = parseInt(adata[0], 10);
                    gg = parseInt(adata[1], 10);
                    aaaa = parseInt(adata[2], 10);
                    xdata = new Date(aaaa, mm - 1, gg, 12, 0, 0, 0);
                    if ((xdata.getUTCFullYear() === aaaa) && (xdata.getUTCMonth() === mm - 1) && (xdata.getUTCDate() === gg)) {
                        check = true;
                    } else {
                        check = false;
                    }
                } else {
                    check = false;
                }
                return this.optional(element) || check;
            }, "Please enter a correct date in MM/DD/YYYY format");

            /* Add Letters + Basic Punctuation method from additional-methods.js */
            $.validator.addMethod("letterswithbasicpunc", function (value, element) {
                return this.optional(element) || /^[a-z\-.,()'"\s]+$/i.test(value);
            }, "Letters or punctuation only please");

            /*  Validate Form   */
            $("#payment_confirmation").validate({
                rules: {
                    first_name: {
                        required: true,
                        letterswithbasicpunc: true
                    },

                    last_name: {
                        required: true,
                        letterswithbasicpunc: true
                    },
                    middle_name: {
                        required: '#no_middle_name:unchecked',
                        letterswithbasicpunc: true
                    },
                    date_of_birth: {
                        required: true,
                        dateME: true
                    }
                },
                messages: {
                    first_name: "First Name is Required",
                    last_name: "Last Name is Required",
                    middle_name: "Please Provide your Middle Name or Check \"No Middle Name\"",
                    date_of_birth: {
                        required: "Date of Birth is Required",
                        dateME: "Date of Birth must be in MM/DD/YYYY format"
                    }
                },

                /* Apply bootstrap 3 error display classes  */
                highlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                },
                unhighlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function (error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }

            });

            //  Disable Middle Name field if No Middle Name is checked
            $('#no_middle_name').change(function () {
                if (!$("#middle_name").attr("disabled")) {
                    $("#middle_name").attr("disabled", true);
                } else {
                    $("#middle_name").attr("disabled", false);
                }
            });
            //  Hide checkbox if Middle Name field has content
            $('#middle_name').keyup(function () {
                if ($("#middle_name").val()) {
                    $("#no_middle_name").parent().hide();
                } else {
                    $("#no_middle_name").parent().show();
                }
            });
        });
    </script>
</body>

</html>
