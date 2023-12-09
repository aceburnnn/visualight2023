<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Send PDF';

$this->registerJsFile('https://code.jquery.com/jquery-3.6.0.min.js', ['position' => \yii\web\View::POS_HEAD]);

?>

<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 120vh;
        margin-top:-70px;
    }

    .card {
        max-width: 1000px;
        width: 100%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .card-header {
        background-color: #007bff;
        color: white;
        text-align: center;
        padding: 1.5rem;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        background-color: #f8f9fa;
        padding: 2rem;
        border-radius: 0 0 10px 10px;
    }

    .form-control-file {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 8px;
    }

    .btn-primary {
        background-color: #007bff;
        border: 1px solid #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border: 1px solid #0056b3;
    }

    .alert {
        border-radius: 5px;
    }

    .alert-danger, .help-block {
        color: white;
        background: red;
        border-radius: 5px;
    }

    .has-error .help-block {
        color: white; /* Font color for error messages */
        background-color: #ff0040; /* Background color for error messages */
        border: 1px solid #d9534f; /* Optional: Add a red border around error messages */
        padding: 8px; /* Optional: Add some padding around the error messages */
        border-radius: 4px; /* Optional: Add rounded corners to the error messages */
        margin-top: 5px;
        font-size: 14px; /* Optional: Adjust the font size for error messages */
        font-weight: bold; /* Optional: Make the error messages bold */
    }

    .has-error .help-block:before {
        content: '\f06a'; /* Optional: Add a Font Awesome icon (exclamation circle) before the error message */
        font-family: 'Font Awesome 5 Free'; /* Optional: Replace with the appropriate Font Awesome font-family */
        margin-right: 5px; /* Optional: Add some spacing between the icon and the error message */
        font-size: 16px; /* Optional: Adjust the icon size */
        font-weight: bold; /* Optional: Make the icon bold */
    }


    .checkboxes-container {
        display: flex;
        justify-content: space-between;
    }

    .role-selection-box, .email-selection-box {
        background-color: white;
        border-radius: 5px;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        flex: 1; /* Allows boxes to grow and take up equal space */
        margin: 10px; /* Adds some space between the two boxes */
    }

    .role-selection-header {
        background-color: #54af00; /* yellow-orange background */
        color: white; /* White text */
        padding: 10px;
        border-radius: 5px 5px 0 0;
        margin: -15px -15px 15px -15px;
    }

    .normal-checkbox-label {
        display: block;
        margin-bottom: 10px;
    }

    .scrollable-checkbox-list {
        height: 250px; /* Adjust the height as needed */
        overflow-y: auto;
        padding-right: 15px; /* Adjust the padding to avoid cutting the scrollbar */
    }
</style>

</style>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Send PDF to Email</h1>
        </div>

        <div class="card-body">
                <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success" id="success-flash">
                    <?= Yii::$app->session->getFlash('success') ?>
                </div>
            <?php elseif (Yii::$app->session->hasFlash('error')): ?>
                <div class="alert alert-danger">
                    <?= Yii::$app->session->getFlash('error') ?>
                </div>
            <?php elseif (Yii::$app->session->hasFlash('info')): ?>
                <div class="alert alert-info">
                    <?= Yii::$app->session->getFlash('info') ?>
                </div>
            <?php endif; ?>


            <div id="sending-email-message" class="alert alert-info hidden" style ="display:none;">
                <strong>PDF attachments are sending, please wait...</strong>
            </div>

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'class' => 'mt-1']]); ?>

            <?= $form->field($model, 'pdfFile[]')->fileInput(['id' => 'your-file-input-id', 'multiple' => true, 'class' => 'form-control-file', 'accept' => 'application/pdf'])->label('Select PDF Files') ?>
            <br>

            <div class="checkboxes-container">
                <div class="role-selection-box">
                    <div class="role-selection-header">
                        <strong>Select User Roles</strong>
                    </div>
                    <div class="scrollable-checkbox-list">
                    <?= $form->field($model, 'selectedRoles')->checkboxList(
                        ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name'),
                        [
                            'id' => 'role-checkboxes',
                            'class' => 'mt-3',
                            'itemOptions' => ['labelOptions' => ['class' => 'normal-checkbox-label']],
                        ]
                    )->label(false) ?>
                </div>
                </div>

                <div class="email-selection-box">
                    <div class="role-selection-header" style ="background: #FF007B">
                        <strong>Select User Emails</strong>
                    </div>
                    <div class="scrollable-checkbox-list">
                        <?= $form->field($model, 'selectedEmails')->checkboxList(
                            $model->getEmailsList(),
                            [
                                'id' => 'email-checkboxes',
                                'class' => 'mt-3',
                                'itemOptions' => ['labelOptions' => ['class' => 'normal-checkbox-label']],
                            ]
                        )->label(false) ?>
                    </div>
                </div>

            </div>

            <div class="form-group mt-4">
                <?= Html::submitButton('Send PDF', ['class' => 'btn btn-primary btn-block', 'id' => 'send-email-button', 'disabled' => true]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php
$js = <<< JS
$(document).ready(function() {
    // Existing click event listener
    $('#send-email-button').click(function() {
        var fileInput = $('#your-file-input-id');
        if (fileInput[0].files.length > 0) {
            $('#sending-email-message').hide();
            $('#sending-email-message').show();
        } else {
            $('#sending-email-message').hide();
        }
    });

    // New functionality to enable/disable the submit button
    function updateButtonState() {
        var filesSelected = $('#your-file-input-id')[0].files.length > 0;
        var rolesSelected = $('#role-checkboxes input:checked').length > 0;
        var emailSelected = $('#email-checkboxes input:checked').length > 0;

        $('#send-email-button').prop('disabled', !(filesSelected && rolesSelected || filesSelected && emailSelected));
    }

    $('#your-file-input-id, #role-checkboxes input, #email-checkboxes input' ).change(updateButtonState);

    updateButtonState(); // Call it once on page load
});
JS;
$this->registerJs($js, \yii\web\View::POS_READY);
?>


<?php
$this->registerJs("
    setTimeout(function() {
        $('#success-flash').fadeOut('slow');
    }, 3000); // 3000 milliseconds = 3 seconds
", \yii\web\View::POS_READY);

$this->registerJsFile('https://code.jquery.com/jquery-3.6.0.min.js', ['position' => \yii\web\View::POS_HEAD]);

?>
