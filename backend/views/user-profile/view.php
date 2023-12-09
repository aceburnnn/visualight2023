<?php

use yii\helpers\Html;
use yii\helpers\Url;

$defaultImagePath = Yii::getAlias('@web') . '/images/user2.jpg';
?>

<div class="user-profile-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('Edit Profile', ['update'], ['class' => 'btn btn-primary']) ?>

    <div class="profile-banner" style="background-image: url('/images/back_pic.png');">
        <div class="profile-picture">
            <?php if ($user->profile_picture) : ?>
                <?= Html::img(Url::to(['user-profile/get-profile-picture', 'fileName' => $user->profile_picture]), ['class' => 'pf img-circle elevation-2', 'style' => 'height: 200px; width: 200px']) ?>
            <?php else : ?>
                <?= Html::img($defaultImagePath, ['class' => 'pf img-circle elevation-2', 'style' => 'height: 200px; width: 200px']) ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="user-info">
        <span class="user-role">
            <?php
            $roles = Yii::$app->authManager->getRolesByUser($user->id);
            $roleNames = [];
            foreach ($roles as $role) {
                $roleNames[] = $role->name;
            }
            echo Html::encode(empty($roleNames) ? 'GUEST' : implode(', ', $roleNames));
            ?>
        </span>
        <br>
        <span class="user-name"><?= Html::encode($user->fullName) ?></span>
    </div>

    <div class="user-details">
        <table class="table table-bordered">
            <tr>
                <td style="border-style: hidden;"><strong>Email: </strong><?= Html::encode($user->email) ?></td>
            </tr>
            <tr>
                <td style="border-style: hidden;"><strong>Position: </strong>
                    <?php
                    $roles = Yii::$app->authManager->getRolesByUser($user->id);
                    $roleNames = [];
                    foreach ($roles as $role) {
                        $roleNames[] = $role->name;
                    }
                    echo Html::encode(empty($roleNames) ? 'GUEST' : implode(', ', $roleNames));
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-style: hidden;"><strong>Contact Number: </strong><?= Html::encode($user->contactNumber) ?></td>
            </tr>
            <tr>
                <td style="border-style: hidden;"><strong>Address: </strong><?= Html::encode($user->address) ?></td>
            </tr>
        </table>
    </div>
</div>

<style>
    .profile-banner {
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        height: 350px;
        margin-bottom: 1rem;
        /* Add some spacing between sections */
    }

    .profile-picture {
        position: relative;
        top: 13em;
        text-align: center;
        margin: auto;
    }
    .pf{
        object-fit: cover;
    }

    .user-info {
        text-align: center;
        margin-top: 1rem;
        margin-bottom: 1rem;
        margin-top: 4rem;
        /* Add some spacing between sections */
    }

    .user-role {
        color: #0362BA;
        font-family: Poppins;
        font-size: 15px;
        font-weight: 300;
        line-height: normal;
        letter-spacing: 3px;
    }

    .user-name {
        color: black;
        font-weight: 300;
        font-size: 40px;
    }

    .user-details {
        margin: 2rem auto;
        border-top: 2px solid #000;
        width: 90%;
        overflow-x: auto;
        text-align: left;

        /* Center text on larger screens */
    }

    .user-details table {
        width: 100%;
        /* Set a fixed width for the table */
        margin: 0 auto;
        /* Center the table horizontally */
    }

    .user-details td {
        padding: 10px;
        /* Adjust cell padding as needed */
        vertical-align: top;
        /* Align cell content to the top */
    }

    .btn-primary {
        position: absolute;
        bottom: 35px; /* Adjust this value as needed */
        right: 5%;
        width: 180px;
        max-height: 2000px;

    }


    @media (max-width: 700px) {
        .profile-picture {
            top: 12.5rem;
            margin-top: -100px;
            /* Adjust as needed for better alignment */
        }

        .user-info {
            margin-top: 4rem;
        }

        .user-name {
            font-size: 32px;
        }

        .user-details {
            text-align: center;
            /* Center text on smaller screens like iPhone SE */
            margin: 1rem auto;
            /* Adjust spacing */
        }

        .user-details table {
            text-align: left;
            /* Align table content to the left */
            width: auto;
            overflow-x: auto;
        }

        .user-details td {
            text-align: left;
            /* Align cell content to the left */
            padding: 5px 10px;
            /* Adjust cell padding for smaller screens */
        }

        .btn-primary {
            position:absolute;
            bottom: 5px;
            right: 25%;
            max-width: 180px;
            
        }
        
    }
    
    

</style>