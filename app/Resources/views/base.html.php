<?php
use Symfony\Component\Templating\Helper\SlotsHelper;
/* @var $view Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine  */
$slotsHelper = $view['slots']; /* @var $slotsHelper SlotsHelper */
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/moment.js"></script>
    <script src="/js/bootstrap-datetimepicker.js"></script>
    <script src="/js/chosen.js"></script>


    <title><?php $slotsHelper->output('title') ?> - Lehrerkalender</title>

    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="/css/chosen.css" rel="stylesheet">

    <link href="/css/override-bootstrap.css" rel="stylesheet">
    <link href="/css/helper.css" rel="stylesheet">
    <?php $slotsHelper->output('styles', ''); ?>

    <script type="text/javascript"></script>

    <style>
        #header a {
            text-decoration: none;
            color:           #337ab7;
            display:inline-block;
            width: 100%;
            height: 100%;
        }

        #header a:hover {
            background: #eee;
        }
    </style>
</head>
<body>
<div class="container" id="header">
    <div class="row" style="border-bottom: 1px solid #eee;margin-bottom:20px;">
        <?php $slotsHelper->output('header', ''); ?>
    </div>
</div>

<?php $slotsHelper->output('content', ''); ?>

<?php $slotsHelper->output('footer', ''); ?>


<script type="text/javascript">
    (function(document, $) {
        $( document ).ready(function() {
            <?php $slotsHelper->output('jQuery', ''); ?>
        });
    })(document, jQuery);
</script>
</body>
</html>