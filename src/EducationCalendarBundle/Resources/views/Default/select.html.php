<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 16.11.2015
 * Time: 11:18
 */

$slotsHelper = $view['slots'];
$routerHelper = $view['router'];
$formHelper = $view['form'];

$view->extend('::base.html.php');

?>

<?php $slotsHelper->start('title'); ?>
    Klasse auswaehlen
<?php $slotsHelper->stop(); ?>

<?php $slotsHelper->start('header'); ?>
    <div class="col-xs-6">
        <a href=""><h1 class="text-center">Kalender</h1></a>
    </div>
    <div class="col-xs-6">
        <a href="/in/select"><h1 class="text-center">Benotung</h1></a>
    </div>
<?php $slotsHelper->stop(); ?>

<?php $slotsHelper->start('content'); ?>

<style>
    .margin-top-30 {
        margin-top: 30px;
    }
</style>

<div class="container">
    <button type="button">Klasse hinzufügen --> durch Panel zu ersetzen</button>
</div>

<div class="container margin-top-30">
    <div class="list-group">
        <a href="#" class="list-group-item">FIA32 - ANW</a>
        <a href="#" class="list-group-item">FIA32 - ITK</a>
    </div>
</div>


<?php $slotsHelper->stop(); ?>

