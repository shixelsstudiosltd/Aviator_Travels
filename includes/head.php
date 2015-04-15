<?php include_once 'db_set.php'; ?>
<base href="<?php echo APP_BASE_URL; ?>">
<title><?php echo $title; ?></title>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta name="keywords" content="Template, html, premium, themeforest" />
<meta name="description" content="Traveler - Premium template for travel companies">
<meta name="author" content="Tsoy">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- GOOGLE FONTS -->
<!--<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>-->
<!-- /GOOGLE FONTS -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/icomoon.css">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/mystyles.css">
<script src="js/modernizr.js"></script>
<script type= "text/javascript" src = "js/countries.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script type= "text/javascript" src = "js/countries.js"></script>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<script>
    $(document).ready(function() {
            if ($('#register-form').length) {//alert(0);
                $("#register-form").validationEngine();
                $('#forgetplink').click(function() {
                    $('#pass-reset-form').slideToggle();
                    return false;
                });
            }
             if ($('#close_info').length) {
                $('#close_info').click(function() {
                    $('#welcome_info_suc').slideUp(500);
                });
            }
            $('#create_acc_check').change(function(){
                if($(this).is(':checked')){
                   $('#reg_btn').removeClass('disabled');//.addClass('enabled');
                } else{
                     $('#reg_btn').addClass('disabled');//.addClass('enabled');
                }
                
            })
        });
</script>