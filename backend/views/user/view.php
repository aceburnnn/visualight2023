<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

use yii\helpers\Html;

$this->title = 'View User: ' . $user->username;
$this->params['breadcrumbs'][] = ['label' => 'User List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-view user-view">
    <div class="float-left">
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-info']) ?>
    </div>
    <div class="d-flex justify-content-end">
        <?= Html::a('Update', ['update', 'id' => $user->id], ['class' => 'btn btn-primary ml-2']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $user->id], [
            'class' => 'btn btn-danger ml-2',
            'data' => [
                'confirm' => 'Are you sure you want to delete this user?',
                'method' => 'post',
            ],
        ]) ?>
    </div>

    <br>

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <td><?= Html::encode($user->id) ?></td>
        </tr>
        <tr>
            <th>Full Name</th>
            <td><?= Html::encode($user->fullName) ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?= Html::encode($user->address) ?></td>
        </tr>
        <tr>
            <th>Contact Number</th>
            <td><?= Html::encode($user->contactNumber) ?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><?= Html::encode($user->username) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= Html::encode($user->email) ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= Html::encode($user->getStatusLabel()) ?></td>
        </tr>
        <!-- Add more user attributes to display here -->
    </table>

    <br>
</div>
