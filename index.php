<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>BeeResponsive by BeeReal</title>

    <!-- Bootstrap core CSS -->
    <!-- link href="assets/css/bootstrap.min.css" rel="stylesheet" -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="assets/css/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>


    <?php

        // read URL from form
        $url = "";
        if (isset($_GET['url']) && ($_GET['url'] != ""))
            $url = $_GET['url'];

        // read screen resolutions from form
        $user_screens = NULL;
        $user_screens_get = "";
        if (isset($_GET['screens']) && ($_GET['screens'] != "")) {
            $user_screens_get = $_GET['screens'];
            $user_screens = explode("|", $user_screens_get);
        }

        // screens
        $screens = array();
        $screens[] = array("type" => "smartphone", "name" => "iPhone 5 portrait", "width_height" => "320x568", "checked" => true);
        $screens[] = array("type" => "smartphone", "name" => "iPhone 5 landscape", "width_height" => "568x320");
        $screens[] = array("type" => "smartphone", "name" => "iPhone 6 portrait", "width_height" => "375x667", "checked" => true);
        $screens[] = array("type" => "smartphone", "name" => "iPhone 6 landscape", "width_height" => "667x375");
        $screens[] = array("type" => "smartphone", "name" => "iPhone 6 Plump portrait", "width_height" => "414x736");
        $screens[] = array("type" => "smartphone", "name" => "iPhone 6 Plump landscape", "width_height" => "736x414");
        $screens[] = array("type" => "smartphone", "name" => "Crappy Android portrait", "width_height" => "240x320", "checked" => true);
        $screens[] = array("type" => "smartphone", "name" => "Crappy Android landscape", "width_height" => "320x240", "checked" => true);
        $screens[] = array("type" => "smartphone", "name" => "Android (Nexus 4) portrait", "width_height" => "384x600", "checked" => true);
        $screens[] = array("type" => "smartphone", "name" => "Android (Nexus 4) landscape", "width_height" => "600x384", "checked" => true);
        $screens[] = array("type" => "smartphone", "name" => "Mobile 1 portrait", "width_height" => "480x321", "checked" => true);
        $screens[] = array("type" => "smartphone", "name" => "Mobile 1 landscape", "width_height" => "321x480", "checked" => true);
        $screens[] = array("type" => "smartphone", "name" => "Mobile 2 portrait", "width_height" => "768x481", "checked" => true);
        $screens[] = array("type" => "smartphone", "name" => "Mobile 2 landscape", "width_height" => "481x768", "checked" => true);
        $screens[] = array("type" => "tablet", "name" => "iPad portrait", "width_height" => "768x1024", "checked" => true);
        $screens[] = array("type" => "tablet", "name" => "iPad landscape", "width_height" => "1024x768", "checked" => true);
        $screens[] = array("type" => "tablet", "name" => "Mobile 3 portrait", "width_height" => "1200x1024", "checked" => true);
        $screens[] = array("type" => "tablet", "name" => "Mobile 3 landscape", "width_height" => "1024x1200", "checked" => true);
    ?>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://beeresponsive.beerealit.com" alt="BeeResponsive"><img src="assets/images/beereal-logo.png"></a>
                <form class="navbar-form navbar-left" id="url-form" role="form" method="GET" action="">
                    <div class="form-group">
                        <input type="text" name="url" value="<?php echo $url ?>" placeholder="Which URL you want to responsive?" class="form-control form-url">
                    </div>
                    <input type="hidden" name="screens" value="<?php echo $user_screens_get ?>" ?>
                    <button type="submit" class="btn">Go</button>
                </form>

                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle icon-config" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cog"/></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-header">Smartphones</li>
                            <?php

                                // define if display checkbox as checked or not
                                foreach($screens as $screen):
                                    if ($screen['type'] == "smartphone"):
                                        $checked = false;

                                        // if user screens is empty AND screen is checked by default
                                        if (!is_null($user_screens)) {
                                            // verify if user screen is selected
                                            foreach($user_screens as $user_screen):
                                                if (strpos($user_screen, $screen['width_height']) > -1) {
                                                    $checked = true;
                                                    break;
                                                }
                                            endforeach;
                                        }
                                        else {
                                            if (isset($screen['checked']) && $screen['checked'])
                                                $checked = true;
                                        }
                            ?>
                                    <li><input type="checkbox" class="form-screen" name="screen" <?php if ($checked) { ?> checked="checked" <?php } ?> value="<?php echo $screen['width_height'] . "," . $screen['name'] ?>"> <?php echo $screen['name'] . " (" . $screen['width_height'] . ")" ?></li>
                            <?php
                                    endif;
                                endforeach;
                            ?>

                            <li class="divider"></li>

                            <li class="dropdown-header">Tablets</li>
                            <?php

                            // define if display checkbox as checked or not
                            foreach($screens as $screen):
                                if ($screen['type'] == "tablet"):
                                    $checked = false;

                                    // if user screens is empty AND screen is checked by default
                                    if (!is_null($user_screens)) {
                                        // verify if user screen is selected
                                        foreach($user_screens as $user_screen):
                                            if (strpos($user_screen, $screen['width_height']) > -1) {
                                                $checked = true;
                                                break;
                                            }
                                        endforeach;
                                    }
                                    else {
                                        if (isset($screen['checked']) && $screen['checked'])
                                            $checked = true;
                                    }
                                    ?>
                                    <li><input type="checkbox" class="form-screen" name="screen" <?php if ($checked) { ?> checked="checked" <?php } ?> value="<?php echo $screen['width_height'] . "," . $screen['name'] ?>"> <?php echo $screen['name'] . " (" . $screen['width_height'] . ")" ?></li>
                                <?php
                                endif;
                            endforeach;
                            ?>

                        </ul>
                    </li>
                </ul>

            </div>
            <div id="navbar" class="navbar-collapse collapse">
            </div><!--/.navbar-collapse -->
        </div>
    </nav>

    <div class="jumbotron">
        <div class="container">
            <?php if ($url): ?>
                <h2><?php echo $url ?></h2>
            <?php else: ?>
                <h2>Please, input an URL in the top form to start responsing!</h2>
            <?php endif; ?>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <?php
                if ($url):
                ?>
                    <h1>Smartphones</h1>
                    <?php
                        foreach($user_screens as $s_screen):
                            $s_screen = explode(",", $s_screen);
                            if ($s_screen[0] != ""):
                                $width_height = explode("x", $s_screen[0]);
                    ?>
                                <section class="container-fluid" id="section1">
                                    <h2 class="text-center v-center"><b><?php echo $s_screen[1] ?></b> (<?php echo $width_height[0] . ' x ' . $width_height[1] ?>)</h2>
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <div class="row">
                                            <iframe src="<?php echo $url ?>" width="<?php echo $width_height[0] ?>px" height="<?php echo $width_height[1] ?>px"></iframe>
                                        </div>
                                    </div>
                                </section>
                    <?php
                            endif;
                        endforeach;
                endif;
                ?>
            </div>
        </div>

        <?php if (($url != "") && is_array($user_screens) && (count($user_screens) > 0)): ?>
            <hr>
        <?php endif; ?>

        <footer>
            <p>Made with <span class="heart">❤</span> by <a href="http://www.beerealit.com" target="_blank">BeeReal</a></p>
        </footer>
    </div> <!-- /container -->


    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>


    <script>
    $(document).ready(function() {

        // save all screens in hidden input field
        $( "#url-form" ).submit(function( event ) {
            var screens = "";
            $('[name="screen"]').each(function(index) {
                if ($(this).is(":checked"))
                    screens = screens + $(this).val() + "|";
                $('[name="screens"]').val(screens);
            });
        });

        // prevent hide dropdown
        $('[name="screen"]').change(function( event ) {
            event.stopPropagation();
            event.preventDefault();
        });
    });

    </script>
</body>
</html>
