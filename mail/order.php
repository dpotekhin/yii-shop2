<div class="table-responsive">
    <table class="table table-hover table-stripped">
        <thead>
        <tr>
            <th>Наименование</th>
            <th>Цена</th>
            <th>Кол-во</th>
            <th>Сумма</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($session['cart'] as $id => $item ): ?>
            <tr>
                <td><?= $item['name'] ?></td>
                <td><?= $item['price'] ?></td>
                <td><?= $item['qty'] ?></td>
                <td><?= $item['qty'] * $item['price'] ?></td>
            </tr>
        <?php endforeach ?>

        <tr>
            <td colspan="3">Итого:</td>
            <td><?= $session['cart.qty'] ?></td>
        </tr>

        <tr>
            <td colspan="3">Сумма:</td>
            <td><?= $session['cart.sum'] ?></td>
        </tr>

        </tbody>
    </table>
</div>
