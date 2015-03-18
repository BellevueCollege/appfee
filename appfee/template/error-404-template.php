<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-US" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-US" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-US">
<!--<![endif]-->

<head>
    <title>Page not found :: Bellevue College</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $globals_url ?>c/g.css">
    <link rel="stylesheet" media="print" href="<?php echo $globals_url ?>c/p.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script type="text/javascript" src="<?php echo $globals_url ?>j/ghead.js"></script>
    <!--[if lt IE 9]><script type="text/javascript" src="/<?php echo $globals_url ?>j/respond.js"></script><![endif]-->
    <link rel='stylesheet' id='open-sans-css' href='//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.0.1' type='text/css' media='all' />
    <?php include( $globals_path . 'h/gabranded.html' ); ?>
</head>

<body class="nav-enrollment">
    <?php include( $globals_path . 'h/bhead.html' ); ?>
    <div id="main-wrap" class="globals-branded">
        <div id="main" class="container no-padding">
            <div class="row">
                <div class="col-md-12">
                    <div id="content" class="box-shadow">
                        <div class="row row-padding">
                            <p class='entry-title'>&nbsp;</p>
                            <div class="content-padding">
                                <h1>404 — Page not Found</h1>
                                <p class="lead">Below are a few things you can try to find it:</p>
                                <ol id="youcandoit" class="count">
                                    <li class="one">If you typed the web address, double-check if you typed it correctly.</li>
                                    <li class="two">Try searching for it.
                                        <form class="form-search" method="get" action="//www.bellevuecollege.edu/search/">
                                            <fieldset>
                                                <div class="input-group">
                                                    <label class="sr-only" for="college-search-field-x">Search</label>
                                                    <input type="text" name="txtQuery" class="form-control" id="college-search-field-x">
                                                    <span class="input-group-btn btn-default">
                                                        <button class="btn btn-default" type="submit">Search</button>
                                                    </span>
                                                    <!-- input-group-btn -->
                                                </div>
                                                <!-- /input-group -->
                                            </fieldset>
                                        </form>
                                    </li>
                                    <li class="three">Browse our <a href="//bellevuecollege.edu/directories/az/">A-Z directory</a>.</li>
                                    <li class="four">Use some of the links on this page.</li>
                                    <li class="five">Click the <a href="javascript:history.go(-1)">Back</a> button and try another link.</li>
                                </ol>
                                <small class="pull-right">Application Fee <?php echo VERSION_NUMBER ?></small>
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

    <?php include( $globals_path . 'h/bfoot.html' ); ?>
    <?php include( $globals_path . 'h/legal.html' ); ?>

    <script src="<?php echo $globals_url ?>j/bootstrap.min.js"></script>
    <script src="<?php echo $globals_url ?>j/g.js"></script>
</body>

</html>
