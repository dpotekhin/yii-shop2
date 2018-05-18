
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="container">

    <h1>Корзина</h1>

    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <?php if( Yii::$app->session->hasFlash('error') ): ?>
        <div class="alert alert-error alert-dismissible" role="alert">
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>

    <?php if( !empty($session['cart'])): ?>
        <div class="table-responsive">
            <table class="table table-hover table-stripped">
                <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Цена</th>
                    <th>Кол-во</th>
                    <th>Сумма</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($session['cart'] as $id => $item ): ?>
                    <tr>
                        <td><?= \yii\helpers\Html::img( '@web/images/products/'.$item['img'], ['alt' => $item['name'], 'height' => 50 ]) ?></td>
                        <td><a href="<?= Url::to(['product/view', 'id' => $id ] ) ?>"><?= $item['name'] ?></a></td>
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['qty'] ?></td>
                        <td><?= $item['qty'] * $item['price'] ?></td>
                        <td><span class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true" data-id="<?= $id ?>"></span></td>
                    </tr>
                <?php endforeach ?>

                <tr>
                    <td colspan="3">Итого:</td>
                    <td><?= $session['cart.qty'] ?></td>
                    <td  colspan="2" ></td>
                </tr>

                <tr>
                    <td colspan="4">Сумма:</td>
                    <td><?= $session['cart.sum'] ?></td>
                    <td  colspan="1" ></td>
                </tr>

                </tbody>
            </table>
        </div>

        <hr/>

        <?php $form = ActiveForm::begin() ?>
            <?= $form->field($order, 'name') ?>
            <?= $form->field($order, 'email') ?>
            <?= $form->field($order, 'phone') ?>
            <?= $form->field($order, 'address') ?>
            <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
        <?php $form = ActiveForm::end() ?>

    <?php else: ?>
        <h3>Корзина пуста</h3>
    <?php endif; ?>

</div>
