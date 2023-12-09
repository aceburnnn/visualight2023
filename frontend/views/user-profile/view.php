<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'User Profile';
$this->params['breadcrumbs'][] = $this->title;

// Generate the URL for the default image using the @web alias
$defaultImagePath = Yii::getAlias('@web') . '/images/user2.jpg';
?>

<div class="user-profile-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Update Profile', ['update'], ['class' => 'btn btn-primary']) ?>
    </p>
    <table class="table table-bordered">
        <tr>
            <th>Full Name:</th>
            <td><?= Html::encode($user->fullName) ?></td>
        </tr>
        <tr>
            <th>Username:</th>
            <td><?= Html::encode($user->username) ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?= Html::encode($user->email) ?></td>
        </tr>
        <tr>
            <th>Role:</th>
            <td>
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
            <th>Contact Number:</th>
            <td><?= Html::encode($user->contactNumber) ?></td>
        </tr>
        <tr>
            <th>Address:</th>
            <td><?= Html::encode($user->address) ?></td>
        </tr>
        <tr>
            <th>Profile Picture:</th>
            <td>
                <?php if ($user->profile_picture): ?>
                    <?= Html::img(Url::to(['user-profile/get-profile-picture', 'fileName' => $user->profile_picture]), ['class' => 'img-circle elevation-2', 'style' => 'height: 200px; width: 200px']) ?>
                <?php else: ?>
                    <!-- Display the custom default profile picture if no image is available -->
                    <?= Html::img($defaultImagePath, ['class' => 'img-circle elevation-2', 'style' => 'height: 200px; width: 200px']) ?>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</div>
