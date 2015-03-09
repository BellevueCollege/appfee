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
    <link rel="stylesheet" href="<? echo $globals_url ?>c/g.css">
    <link rel="stylesheet" media="print" href="<? echo $globals_url ?>c/p.css">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
    <script type="text/javascript" src="<? echo $globals_url ?>j/ghead.js"></script>
    <!--[if lt IE 9]><script type="text/javascript" src="/<? echo $globals_url ?>j/respond.js"></script><![endif]-->
	<link rel='stylesheet' id='open-sans-css'  href='//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.0.1' type='text/css' media='all' />

	<? require($globals_path."h/gabranded.html"); ?>
	  
	<!-- parentid= 0-->
</head>

<body class="nav-enrollment">

	<? require($globals_path."h/bhead.html"); ?>         
	
		<div id="main-wrap" class="globals-branded">
			<div id="main" class="container no-padding">
				<div class="content-padding">
					<div id="site-header">
					
						<h1 class="site-title">Application Fee Payment</h1>
					
					</div><!-- container header --> 
				</div><!-- content-padding -->
				<div class="row">
					<div class="col-md-12">
						<div id="content"  class="box-shadow">
							<div class="row row-padding">
								<div class="content-padding">
								
				            </div><!--.content-padding-->
		                	<div class="content-padding">
		                	<p class="lead">Please enter your name and date of birth below. Required Fields marked with *.</p>
		                	
		                	<!--	Begin Form	-->
		                	
								<form class="form-horizontal" id="paymentForm">
                                    <input type="hidden" name="reference_number" id="reference_number" />
									<div class="form-group">
										<label for="merchant_defined_data1" class="col-sm-3 control-label">First Name:*</label>
										<div class="col-sm-8">
											<input type="text" maxlength="32" class="form-control" id="merchant_defined_data1" name="merchant_defined_data1" aria-required="true" required />
										</div>
									</div>
									<div class="form-group">
										<label for="merchant_defined_data3" class="col-sm-3 control-label">Middle Name:</label>
										<div class="col-sm-8">
											<input type="text" maxlength="16" class="form-control" id="merchant_defined_data3" name="merchant_defined_data3" />
										</div>
									</div>
									<div class="form-group">
										<label for="merchant_defined_data2" class="col-sm-3 control-label">Last Name:*</label>
										<div class="col-sm-8">
											<input type="text" maxlength="32" class="form-control" id="merchant_defined_data2"  name="merchant_defined_data2" aria-required="true" required />
										</div>
									</div>
									<div class="form-group">
										<label for="merchant_secure_data1" class="col-sm-3 control-label">Date of Birth:*</label>
										<div class="col-sm-4">
											<input type="text" maxlength="10" class="form-control" id="merchant_secure_data1" name="merchant_secure_data1" placeholder="mm/dd/yyyy" aria-required="true" aria-describedby="dobHelpBlock" required />
											<span id="dobHelpBlock" class="help-block">Enter your Date of Birth in MM/DD/YYYY format</span>
										</div>
									</div>
									<div class="form-group">
									    <div class="col-sm-offset-3 col-sm-8">
									      <button type="submit" class="btn btn-primary">Continue</button>
									    </div>
									  </div>
								</form>
								<script>
								
								</script>
							
							<!--	End Form	-->
							
			                </div> <!--.content-padding-->
						</div><!--.row-padding-->
					</div><!-- #content-->
				</div><!-- row -->
			</div><!-- col-md-12 -->
		</div><!-- #main .container -->
	</div><!-- #main-wrap -->

	<? require($globals_path."h/bfoot.html"); ?> 
	<? require($globals_path."h/legal.html"); ?>  

	 
	<script src="<? echo $globals_url ?>j/bootstrap.min.js"></script>
	<script src="<? echo $globals_url ?>j/g.js"></script>
    <!-- jQuery Validate -->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
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
        $.validator.addMethod("dateME", function(value, element) {
            var check = false,
            re = /^\d{1,2}\/\d{1,2}\/\d{4}$/,
            adata, mm, gg, aaaa, xdata;
            if ( re.test(value)) {
                adata = value.split("/");
                mm = parseInt(adata[0], 10);
                gg = parseInt(adata[1], 10);
                aaaa = parseInt(adata[2], 10);
                xdata = new Date(aaaa, mm - 1, gg, 12, 0, 0, 0);
                if ( ( xdata.getUTCFullYear() === aaaa ) && ( xdata.getUTCMonth () === mm - 1 ) && ( xdata.getUTCDate() === gg ) ) {
                    check = true;
                } else {
                    check = false;
                }
            } else {
                check = false;
            }
            return this.optional(element) || check;
        }, "Please enter a correct date in MM/DD/YYYY format");
        
        $.validator.addMethod("letterswithbasicpunc", function(value, element) {
            return this.optional(element) || /^[a-z\-.,()'"\s]+$/i.test(value);
        }, "Letters or punctuation only please");
        
        /*  Validate Form   */
        $("#paymentForm").validate({								
            rules: {
                merchant_defined_data1: {
                    required: true,
                    letterswithbasicpunc: true
                },
                
                merchant_defined_data2: {
                    required: true,
                    letterswithbasicpunc: true
                },
                merchant_defined_data3: {
                    letterswithbasicpunc: true
                },
                merchant_secure_data1: {
                    letterswithbasicpunc: true,
                    required: true,
                    dateME: true
                }
              },
              messages: {
                merchant_defined_data1: "First Name is Required",
                merchant_defined_data2: "Last Name is Required",
                merchant_secure_data1: {
                  required: "Date of Birth is Required",
                  dateME: "Date of Birth must be in MM/DD/YYYY format"
                }
              },
            
            /* Apply bootstrap 3 error display classes  */
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
            
         });
     });

    </script

</body>
</html>