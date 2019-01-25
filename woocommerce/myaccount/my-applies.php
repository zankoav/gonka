<style>
    .payment-type-success {
        color: green
    }

    .payment-type-failed {
        color: red;
    }

    .payment-type-cancelled {
        color: red;
    }

    .payment-type-created {
        color: yellow;
    }

    .payments-table {
        width: 100%;
    }

    .payment-code {
        white-space: nowrap;
    }

    .event-card {
        width: 100%;
        border: 1px solid #cbcbcb;
        padding: 20px;
        margin: 10px;
        display: block;
        color: white;
        text-align: left;
    }

    .event-card h5 {
        margin: 0 0 10px 0;
    }

    .event-card h5 .type {
        color: #e8471e;
    }

    .events-container {
        flex-direction: column;
        width: 100%;
    }

    .event-card-row {
        font-size: 16px;
    }

    .event-card-row label {
        color: #777;
    }

    .kid {
        color: #e8471e;
    }

    .event-card img {
        float: left;
        margin-right: 20px;
    }
</style>


<div class="events-container">
    <?php $competitions = betta_get_user_competitions_with_orders(); ?>
    <?php foreach ($competitions as $competition): ?>
    <div class="event-card">
        <img src="<?=betta_get_event_by_id($competition['event_id'])['image']?>">
        <h4><?= betta_get_event_by_id($competition['event_id'])['name'] ?> (<span
                    class="type"><?= betta_get_type_by_id($competition['event_id'], $competition['event_type_id'])['name'] ?></span>)</h4>
        <h5><?=betta_get_event_status_name(betta_get_event_status($competition['event_id']))?></h5>
        <?php if ($competition['isKid'] == 1): ?><h5 class="kid">Ребёнок</h5><?php endif ?>
        <div class="event-card-row"><label>Участник: </label><?= $competition['firstName'] . ' ' . $competition['lastName'] ?></div>

        <?php if ($competition['team_name']): ?>
        <div class="event-card-row"><label>Команда: </label><?= $competition['team_name'] ?></div>
        <?php endif; ?>

        <div class="event-card-row"><label>Возраст в году проеведения: </label> <?= (int)date('Y', strtotime($competition['eventDate'])) - date('Y', strtotime($competition['bDate'])) ?>
        </div>
        <div class="event-card-row"><label>Дата участия: </label> <?= date('d.m.Y', strtotime($competition['eventDate'])) ?></div>
        <div class="event-card-row"><label>Дата регистрации: </label> <?= date('d.m.Y', strtotime($competition['registeredAt'])) ?></div>
        <div class="event-card-row"><label>Способ оплаты: </label> <?= $competition['payment_type'] == 'online' ? 'Через интернет' : 'На месте' ?></div>
        <?php if ($competition['payment_type'] == 'online'): ?>
            <div class="event-card-row payment-type-<?=$competition['status']?>"><label>Статус оплаты: </label> <?= betta_get_user_payment_status_name($competition['status']) ?>

                <?php if ($competition['status'] == BETTA_ORDER_STATUS_FAILED): ?>
                    <a href="<?= add_query_arg('competitorId', $competition['id'], add_query_arg('step', 'pay', betta_get_registration_url())) ?>">Оплатить</a>
                <?php endif; ?>
            </div>
            <div class="event-card-row payment-code"><label>Код платежа: </label> <?= $competition['order_id'] ?></div>
        <?php endif; ?>
        <div class="event-card-row"><label>Стоимость: </label> <?= $competition['price'] . ' руб.' ?></div>
    </div>
    <?php endforeach; ?>
</div>
