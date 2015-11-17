<?php
/**
 * User: Daniel
 * Date: 16.11.2015
 * Time: 11:18
 */

/**
 * @var $app            Symfony\Bundle\FrameworkBundle\Templating\GlobalVariables
 * @var $view           Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine
 * @var $slotsHelper    Symfony\Component\Templating\Helper\SlotsHelper
 * @var $routerHelper   Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper
 */

$slotsHelper = $view['slots'];
$routerHelper = $view['router'];
$formHelper = $view['form'];

$view->extend('::loggedIn.html.php');

?>

<?php $slotsHelper->start('title'); ?>
Klasse auswaehlen
<?php $slotsHelper->stop(); ?>

<?php $slotsHelper->start('content'); ?>

<div class="container">
    <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
        <?php
        $allClasses = [
            'title' => 'Klasse anlegen',
            'content' => [
                'classes' => [
                    'FIA30',
                    'FIA31',
                    'FIA32',
                    'FIA33',
                    'FIA34',
                    'FIA35',
                    'FIA36'
                ],
                'subjects' => [
                    'ITK',
                    'ANW (WO)',
                    'ANW (NL)',
                    'Sport',
                    'Religion',
                    'Mathe',
                    'Deu',
                    'Eng'
                ]
            ],
        ];
        ?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingNew>">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNew"
                   aria-expanded="false" aria-controls="collapseNew">
                    <h4 class="panel-title">Klasse anlegen</h4>
                </a>
            </div>
            <div id="collapseNew" class="panel-collapse collapse" role="tabpanel"
                 aria-labelledby="headingNew">
                <div class="panel-body">
                            <form id="newClassForm" action="#" class="form-horizontal">
                                <div class="col-xs-4">
                                    <select id="educationClass" name="education_class" class="form-control chosen"
                                            autocomplete="off">
                                        <?php
                                        foreach ($allClasses['content']['classes'] as $key => $class) {
                                            echo sprintf('<option value="%s">%s</option>', $key, $class);
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <select id="educationSubject" name="education_subject" class="form-control chosen"
                                            autocomplete="off">
                                        <?php
                                        foreach ($allClasses['content']['subjects'] as $key => $subject) {
                                            echo sprintf('<option value="%s">%s</option>', $key, $subject);
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <button type="submit" class="btn btn-default">Anlegen</button>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container margin-top-30">
    <div class="list-group">
        <?php foreach ($subjectEntities as $entity): /** @var $entity \SubjectBundle\Entity\SubjectEntity */?>
            <a href="<?php echo $routerHelper->generate('mark_overview', [ 'subject' => $entity->getId() ]); ?>"
               class="list-group-item">
                <?php echo sprintf('%s - %s', $entity->getEducationClass()->getName(), $entity->getName()); ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?php $slotsHelper->stop(); ?>

<script>
    <?php $slotsHelper->start('jQuery'); ?>
        $('#newClassForm').submit(function()
        {
            var $edClassOption = $('#educationClass').find('option:selected'),
                $subjectOption = $('#educationSubject').find('option:selected'),
                data;

            data = {
                'education_class': {
                    'key': $edClassOption.text(),
                    'val': $edClassOption.val()
                },
                'education_subject': {
                    'key': $subjectOption.text(),
                    'val': $subjectOption.val()
                }
            };

            $.ajax({
                'url': '<?php echo $routerHelper->generate('subject_class_new'); ?>',
                'data': data,
                success: function(response) {
                    if(response.success) {
                        console.log(response.data);
                    }
                },
                error: function(response) {
                    alert(response.error)
                }
            });

            return false;
        });
    <?php $slotsHelper->stop(); ?>
</script>

