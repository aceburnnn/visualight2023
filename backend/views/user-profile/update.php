<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->registerCssFile(Url::to(['/css/custom.css']));
$defaultImagePath = Yii::getAlias('@web') . '/images/user2.jpg';

$profilePicturePath = $model->profile_picture
    ? Url::to(['/user-profile/get-profile-picture', 'fileName' => $model->profile_picture])
    : $defaultImagePath;

$this->title = '';
?>

<h4 style="color: #0362BA; font-family: Poppins; font-size: 24px; font-style: normal; font-weight: 600; line-height: normal; letter-spacing: 2.5px;">Edit Profile:</h4>

<div class="user-profile-update">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="profile-container">

        <!-- Left column start -->
        <?php if ($model->profile_picture) : ?>
            <?php echo Html::img($profilePicturePath, ['class' => 'profile-picture img-circle elevation-2', 'id' => 'current-image', 'style' => 'height: 250px; width: 320px' ]); ?>
        <?php else : ?>
            <?php echo Html::img($defaultImagePath, ['class' => 'profile-picture img-circle elevation-2', 'id' => 'current-image', 'style' => 'height: 250px; width: 320px']); ?>
        <?php endif; ?>

        <img id="image-preview" src="#" alt="Image Preview" class="profile-picture" style="display: none; height: 250px; width: 320px">

        <div class="upload-btn-wrapper">
            <?= $form->field($model, 'imageFile')->fileInput(['accept' => 'image/*', 'class' => 'upload-btn', 'label' => false])->label('Upload Picture') ?>
        </div>

        <!-- End of left column -->

        <div class="divider"></div>

        <!-- Right column -->
        <div class="form-group right-column" style="margin-top: 15px;">
            <?= $form->field($model, 'username')->textInput() ?>
            <?= $form->field($model, 'email')->textInput() ?>
            <?= $form->field($model, 'contactNumber')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'existingPassword')->passwordInput()->hint($model->hasErrors('existingPassword') ? '' : '*Leave it blank if you dont want to change the password', ['style' => 'color: black']) ?>
            <?= $form->field($model, 'newPassword')->passwordInput()->hint($model->hasErrors('newPassword') ? '' : '*Leave it blank if you dont want to change the password', ['style' => 'color: black']) ?>
            <?= Html::submitButton('Update Details', ['class' => 'btn btn-success', 'style' => 'background-color: green;']) ?>
            <?= Html::a('Back', ['view'], ['class' => 'btn btn-warning', 'style' => ' width: 31.77%;  right: 1.5%; position: absolute;']) ?>
        </div>
        <!-- End of right column -->
    </div>
    <?php ActiveForm::end(); ?>
</div>
<style>
    .profile-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 3%;
        background-color:  #e6eeff;
        border-radius: 10px;
        height: 80vh;
        box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.15);
        /* Use viewport height unit */
    }

    .profile-picture {
        width: 40%;
        /* Use percentage */
        max-width: 260px;
        /* Add max-width for responsiveness */
        margin-top: 7%;
        /* Use percentage */
        margin-right: 65%;
        /* Use percentage */
        border-radius: 50%;
        object-fit: cover;
    }

    .upload-btn-wrapper {
        width: 18%;
        /* Use percentage */
        height: 6vh;
        padding-top: 6px;
        /* Use viewport height unit */
        background-color: #038EBA;
        color: #FFF;
        font-family: Poppins;
        font-size: 1.5vw;
        /* Use viewport width unit */
        font-style: normal;
        font-weight: 300;
        line-height: normal;
        display: block;
        text-align: center;
        overflow: hidden;
        margin-right: 65%;
        /* Use percentage */
        margin-top: 2%;

        border-radius: 10px;
        /* Use percentage */

    }

    .upload-btn {
        display: none;
    }

    .divider {
        border-left: 2px solid #03101C;
        height: 58.07%;
        /* Use percentage */
        position: absolute;
        left: 50%;
        top: 50%;
        /* Use percentage */
        transform: translate(-50%, -50%);
    }

    .right-column {
        width: 100%;
        max-width: 30%;
        /* Use percentage */
        position: absolute;
        top: 44%;
        /* Use percentage */
        right: 10%;
        /* Use percentage */
        transform: translate(0, -50%);
        height: 55%;
    }

    /* Responsive styles for iPhone SE */
    @media (max-width: 600px) {
        .profile-container {
            padding: 10px;
            height: 1020px;

        }

        .profile-picture {
            width: 200px;
            height: 200px;
            margin-top: 20%;
            margin-left: 66%;
        }

        .upload-btn-wrapper {
            margin-top: 2rem;
            margin-left: 66%;
            font-size: 4.5vw;
            height: 5vh;
            width: 45%;
            text-align: center;

        }

        .divider {
            display: none;
        }

        .right-column {
            width: 100%;
            max-width: 250px;
            position: absolute;
            top: 74%;
            right: 15%;
            transform: translate(0, -50%);

        }

    }

    @media (max-width: 300px) {
        .profile-container {
            padding: 10px;
            height: 890px;

        }

        .profile-picture {
            width: 200px;
            height: 200px;
            margin-top: 10%;
            margin-left: 66%;
        }

        .upload-btn-wrapper {
            margin-top: 1rem;
            margin-left: 66%;
            font-size: 4.5vw;
            height: 5vh;
            width: 45%;
            text-align: center;

        }

        .divider {
            display: none;
        }

        .right-column {
            width: 100%;
            max-width: 250px;
            position: absolute;
            top: 74%;
            right: 15%;
            transform: translate(0, -50%);
            left:5%;
        }

    }
</style>

<?php
$this->registerJs("
$(document).ready(function() {
    $('#" . Html::getInputId($model, 'imageFile') . "').change(function() {
        $('#current-image').hide();
        var file = $(this)[0].files[0];
        if (file && file.type.startsWith('image/')) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#current-image').hide();
                $('#image-preview').attr('src', e.target.result);
                $('#image-preview').show();
            }
            reader.readAsDataURL(file);
        }
    });
});");
?>