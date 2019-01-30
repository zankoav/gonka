<?php if (! is_user_logged_in()) :?>
    <div class="registration">
        <div class="container">
            <div class="registration__inner">
                <h1 class="title">Для регистрации на гонку необходимо <a href="/my-account">зарегистрироваться и войти</a> на сайт</h1>
            </div>
        </div>
    </div>
<?php else: ?>

<?php if (isset($_GET['step']) && $_GET['step'] == 'success') : ?>
    <div class="registration">
        <div class="container">
            <div class="registration__inner">
                <h1 class="title">Регистрация завершена</h1>
                <div class="registration__form">
                    <form class="registration-form" method="POST" action="<?= strtok($_SERVER["REQUEST_URI"], '?') ?>">
                        <div class="registration-form__group registration-form__group_center">
                            <button class="registration-form__group-submit" type="submit">Зарегестрировать ещё
                            </button>
                            <div style="margin-top:10px;">
                                <a href="/my-account/my-applies">Посмотреть список регистраций</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php elseif (isset($_GET['step']) && $_GET['step'] == 'failed') : ?>
    <div class="registration">
        <div class="container">
            <div class="registration__inner">
                <h1 class="title">Произошла ошибка оплаты</h1>
            </div>
        </div>
    </div>
<?php elseif (isset($_GET['step']) && $_GET['step'] == 'pay'): ?>
    <?php
    $competitor = betta_get_competitor($_GET['competitorId']);
    $coupon = betta_get_coupon($competitor['coupon']);
    $type = betta_get_type_by_id($competitor['event_id'], $competitor['event_type_id']);
    ?>
    <div class="registration">
        <div class="container">
            <div class="registration__inner">
                <h1 class="title">Оплата онлайн</h1>
                <div class="registration__form">
                    <form class="registration-form" method="POST" action="<?= betta_get_webpay_url() ?>">
                        <?= count($coupon) ? betta_generate_payment_fields($competitor['id'], $coupon[0]) : betta_generate_payment_fields($competitor['id']) ?>
                        <div class="registration-form__group">
                            <label class="registration-form__group-label">Формат: <span
                                        style="color: #e8471e"><?= $type['name'] ?></span></label>
                        </div>
                        <div class="registration-form__group">
                            <label class="registration-form__group-label">Имя: <span
                                        style="color: #e8471e"><?= $competitor['firstName'] . ' ' . $competitor['lastName'] ?></span></label>
                        </div>
                        <div class="registration-form__group">
                            <label class="registration-form__group-label">Цена: <span
                                        style="color: #e8471e"><?= $competitor['totalPrice'] ?> руб.</span></label>
                        </div>
                        <div class="registration-form__group registration-form__group_center">
                            <button class="registration-form__group-submit" type="submit">Приступить к оплате
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php else:

    $bettaUser = Betta\User::getCurrent();

    $events = get_betta_events();

    $validCoupon = false;

    if (isset($_GET['coupon'])) {
        $coupon = betta_get_coupon($_GET['coupon'])[0];
        if (!count($coupon)) {
            $couponErrors['invalid'] = 'Неверный купон';
        } else {
            if ($coupon['used'] == "1") {
                $couponErrors['invalid'] = 'Купон уже использован';
            } else {
                $validCoupon = $coupon;
            }
        }
    }

    $events = array_filter($events, function ($event) {
        if (betta_get_event_status($event['id']) != BETTA_EVENT_STATUS_REGISTRATION_OPEN) {
            return false;
        }

        if (!$event['categories']) {
            return false;
        }

        return true;
    });

    $kids = false;
    if (isset($_GET['kids'])) {
        $kids = $_GET['kids'] === "yes";
    }

    $kidsData = isset($_POST['kid-first-name']);

    if ($kidsData) {
        $firstName = $_POST['kid-first-name'];

        if (!trim($firstName)) {
            $kidsErrors['kid-first-name'] = 'Поле не может быть пустым';
        }
        if (!trim($firstName)) {
            $kidsErrors['kid-last-name'] = 'Поле не может быть пустым';
        }
        if (!trim($firstName)) {
            $kidsErrors['kid-b-date'] = 'Поле не может быть пустым';
        }
    }

    $competitor = new \Betta\Competitor($bettaUser);
    if (isset($_POST['kid-b-date']) && isset($_POST['kid-sex']) && !$kidsErrors) {
        $kidsFilter = [
            'sex' => $_POST['kid-sex'],
            'bdate' => $_POST['kid-b-date'],
        ];
    }

    foreach ($events as $event) {

        if (!$event['categories']) {
            continue;
        }

        $categoriesForEvent = $competitor->filterCategories($event['categories'], $event['id'], $kidsFilter);
        if ($validCoupon) {

            foreach ($categoriesForEvent as &$category) {
                foreach($category['types'] as &$type) {
                    $type['price'] = round(($type['price'] / 100) * (100 - $validCoupon['discount']), 2, PHP_ROUND_HALF_DOWN);
                }
            }
        }

        if ($categoriesForEvent) {
            $filteredCategories[$event['id']] = $categoriesForEvent;
        }
    }

    ?>

    <div class="registration">
        <div class="container">
            <div class="registration__inner">
                <h1 class="title">Регистрация на гонку</h1>
                <div class="registration__form">
                    <?php if(!$validCoupon) : ?>
                        <form clas="registration-form" method="get"?>
                            <div class="registration-form__group">
                                <label class="registration-form__group-label">Использовать купон</label>
                                <input style="width:59%" class="registration-form__group-input" type="text" name="coupon"
                                       placeholder="Купон" value="<?=isset($_GET['coupon']) ? $_GET['coupon'] : ''?>">
                                <?php if (isset($_GET['kids'])) : ?>
                                <input type="hidden" name="kids" value="<?=$_GET['kids']?>">
                                <?php endif; ?>
                                <button style="width:40%; padding: 0.62rem 2rem;" class="registration-form__group-submit" type="submit">Применить
                                </button>
                                <?php if ($couponErrors['invalid']): ?>
                                <div>
                                    <span style="color: #e8471e;font-size: 16px;display: block;margin-top:4px;"><?=$couponErrors['invalid']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                        </form>
                    <?php endif ?>
                    <div class="registration-form__group_is-group"><a
                                class="registration-form__group-submit registration-form__group-submit_tab<?php if (!isset($_GET['kids']) || $_GET['kids'] === "no"): ?> registration-form__group-submit_active<?php endif; ?>"
                                href="?kids=no<?=$validCoupon ? '&coupon=' . $validCoupon['code']:''?>">Взрослый</a><a
                                class="registration-form__group-submit registration-form__group-submit_tab<?php if (isset($_GET['kids']) && $_GET['kids'] === "yes"): ?> registration-form__group-submit_active<?php endif; ?>"
                                href="?kids=yes<?=$validCoupon ? '&coupon=' . $validCoupon['code']:''?>">Ребёнок</a>
                    </div>
                    <?php if ($kids && (!$kidsData || $kidsErrors)): ?>
                        <form class="registration-form" method="POST"
                              action="<?= strtok($_SERVER["REQUEST_URI"], '?') ?>?kids=yes<?=$validCoupon ? '&coupon=' . $validCoupon['code']:''?>">
                            <?php if ($validCoupon):?>
                                <input type="hidden" name="coupon" value="<?=$validCoupon['code']?>">
                                <div style="padding: 10px;margin: 10px 0 20px 0 ;border:1px dashed;font-size:16px;color: #aaa">Использован купон <?=$validCoupon['code'] ?> со скидкой <?=$validCoupon['discount'] ?>%</div>
                            <?php endif; ?>
                            <div class="registration-form__group">
                                <label class="registration-form__group-label">Имя</label>
                                <input class="registration-form__group-input" type="text" name="kid-first-name"
                                       placeholder="Имя">
                                <?php if ($kidsErrors['kid-first-name']): ?>
                                    <span style="color: #e8471e;font-size: 12px;display: block;margin-top:4px;">Ошибка: <?= $kidsErrors['kid-first-name'] ?></span>
                                <?php endif ?>
                            </div>
                            <div class="registration-form__group">
                                <label class="registration-form__group-label">Фамилия</label>
                                <input class="registration-form__group-input" type="text" name="kid-last-name"
                                       placeholder="Фамилия">
                                <?php if ($kidsErrors['kid-last-name']): ?>
                                    <span style="color: #e8471e;font-size: 12px;display: block;margin-top:4px;">Ошибка: <?= $kidsErrors['kid-last-name'] ?></span>
                                <?php endif ?>
                            </div>
                            <div class="registration-form__group-sex">
                                <div class="registration-form__group-sex-item">
                                    <label class="registration-form__group-label" for="user-male">Муж</label>
                                    <input class="registration-form__group-input" style="width: 20px" id="user-male"
                                           type="radio" name="kid-sex" value="male" checked="checked">
                                </div>
                                <div class="registration-form__group-sex-item">
                                    <label class="registration-form__group-label" for="user-female">Жен</label>
                                    <input class="registration-form__group-input" style="width: 20px" id="user-female"
                                           type="radio" name="kid-sex" value="female">
                                </div>
                            </div>
                            <div class="registration-form__group">
                                <label class="registration-form__group-label">Дата рождения</label>
                                <input class="registration-form__group-input" type="date" name="kid-b-date"
                                       placeholder="Дата рождения">
                                <?php if ($kidsErrors['kid-b-date']): ?>
                                    <span style="color: #e8471e;font-size: 12px;display: block;margin-top:4px;">Ошибка: <?= $kidsErrors['kid-b-date'] ?></span>
                                <?php endif ?>
                            </div>
                            <div id="price-container" style="font-size:16px;color: #e8471e">Нажимая "Продолжить", вы
                                подтверждаете, что является родителем/законным опекуном ребенка
                            </div>
                            <div class="registration-form__group registration-form__group_center">
                                <button class="registration-form__group-submit" type="submit">Продолжить
                                </button>
                            </div>
                        </form>
                    <?php else: ?>
                        <form class="registration-form" method="POST" action="/betta/register">
                            <?php if ($validCoupon):?>
                                <input type="hidden" name="coupon" value="<?=$validCoupon['code']?>">
                                <div style="padding: 10px;margin: 10px 0 20px 0 ;border:1px dashed;font-size:16px;color: #aaa">Использован купон <?=$validCoupon['code'] ?> со скидкой <?=$validCoupon['discount'] ?>%</div>
                            <?php endif; ?>
                            <a style="font-size: 20px;" target="_blank" href="<?=get_permalink(get_page_by_path('faq'))?>">Как правильно выбрать формат?</a>
                            <?php if ($kids && $kidsData): ?>
                                <div class="registration-form__group">
                                    <label class="registration-form__group-label">Имя</label>
                                    <input type="hidden" name="kid-first-name" value="<?= $_POST['kid-first-name'] ?>">
                                    <span style="color: #e8471e"><?= $_POST['kid-first-name'] ?></span>
                                </div>
                                <div class="registration-form__group">
                                    <label class="registration-form__group-label">Фамилия</label>
                                    <input type="hidden" name="kid-last-name" value="<?= $_POST['kid-last-name'] ?>">
                                    <span style="color: #e8471e"><?= $_POST['kid-last-name'] ?></span>
                                </div>
                                <div class="registration-form__group">
                                    <label class="registration-form__group-label">Пол</label>
                                    <input type="hidden" name="kid-sex" value="<?= $_POST['kid-sex'] ?>">
                                    <span style="color: #e8471e"><?= $_POST['kid-sex'] === "male" ? 'муж' : 'жен' ?></span>
                                </div>
                                <div class="registration-form__group">
                                    <label class="registration-form__group-label">Дата рождения</label>
                                    <input type="hidden" name="kid-b-date" value="<?= $_POST['kid-b-date'] ?>">
                                    <span style="color: #e8471e"><?= date('d.m.Y', strtotime($_POST['kid-b-date'])); ?></span>
                                </div>
                            <?php endif ?>
                            <div class="registration-form__group registration-form__group_select">
                                <label class="registration-form__group-label">Выбери гонку</label>
                                <select class="registration-form__group-input registration-form__group-select"
                                        name="events" id="events">
                                    <option disabled selected>Выберите</option>
                                </select>
                            </div>
                            <div class="registration-form__group registration-form__group_select"
                                 id="event-category-container">
                                <label class="registration-form__group-label">Формат участия</label>
                                <select class="registration-form__group-input registration-form__group-select"
                                        name="event-category" id="event-category">
                                    <option disabled selected>Выберите</option>
                                </select>
                            </div>
                            <div class="registration-form__group registration-form__group_select"
                                 id="event-type-container">
                                <label class="registration-form__group-label">Группа</label>
                                <select class="registration-form__group-input registration-form__group-select"
                                        name="event-type" id="event-type">
                                    <option disabled selected>Выберите</option>
                                </select>
                            </div>
                            <div class="registration-form__group" id="team-container">
                                <label class="registration-form__group-label">Команда</label>
                                <input class="registration-form__group-input" type="text"
                                       name="team-name" id="team-name" placeholder="Название команды">
                            </div>
                            <div class="registration-form__group">
                                <input style="margin: 0 10px 0 0;" type="checkbox" name="transfer" id="transfer-field"><label style="display: inline; cursor: pointer;font-size:14px;" class="registration-form__group-label" for="transfer-field">Нужен трансфер</label>
                            </div>
                            <div id="price-container" style="font-size:30px;color: #fff">Цена: <span
                                        style="color: #e8471e;" class="price-placeholder"></span></div>
                            <div class="registration-form__group registration-form__group_center">
                                <?php
                                /**
                                <button class="registration-form__group-submit" type="submit" disabled="disabled"
                                        id="pay-offline" name="pay-offline">Оплатить
                                    на месте
                                </button>
                                **/
                                ?>
                                <button class="registration-form__group-submit" type="submit" name="pay-online"
                                        id="pay-online" disabled="disabled">Оплатить
                                    онлайн
                                </button>
                            </div>
                        </form>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if (!$kids || ($kids && $kidsData && !$kidsErrors)): ?>
    <script language="JavaScript">

        let events = <?= json_encode($events, JSON_UNESCAPED_UNICODE) ?>;
        let filteredCategories = <?= json_encode($filteredCategories, JSON_UNESCAPED_UNICODE) ?>;

        let kidsForm = <?= $kids ? 'true' : 'false' ?>;

        let selectEvent = jQuery('#events');

        let categoryContainer = jQuery('#event-category-container');
        let typeContainer = jQuery('#event-type-container');
        let teamContainer = jQuery('#team-container');
        let teamName = jQuery('#team-name');
        let priceContainer = jQuery('#price-container');
        let pricePlaceholder = jQuery('.price-placeholder');
        <?php // let payOfflineButton = jQuery('#pay-offline'); ?>
        let payOnlineButton = jQuery('#pay-online');


        let selectCategory = jQuery('#event-category');
        let selectType = jQuery('#event-type');

        fillEvents(selectEvent, events);

        function fillEvents(select, data) {
            var options = select.prop('options');

            jQuery('option:enabled', selectEvent).remove();

            jQuery.each(data, function (key, event) {
                options[options.length] = new Option(event.name, event.id);
            });
        }

        function fillCategories(select, data) {
            var options = select.prop('options');

            jQuery('option:enabled', selectCategory).remove();
            jQuery('option:disabled', selectCategory).attr('selected', 'selected');

            jQuery.each(data, function (key, category) {
                options[options.length] = new Option(category.name, category.id);
            });
            return true;
        }

        function fillTypes(select, data, selectedCategoryId) {
            var options = select.prop('options');

            jQuery('option:enabled', selectType).remove();
            jQuery('option:disabled', selectType).attr('selected', 'selected');

            jQuery.each(data, function (key, category) {
                if (category.id === parseInt(selectedCategoryId)) {
                    jQuery.each(category.types, function (key, type) {
                        option = new Option(type.name, type.id);
                        jQuery(option).attr('data-price', type.price);
                        jQuery(option).attr('data-team', type.team);
                        options[options.length] = option;

                    });
                }
            });
        }

        selectEvent.on('change', onEventSelect);
        selectCategory.on('change', onCategorySelect);
        selectType.on('change', onTypeSelect);
        teamName.on('input', onTeamChange);

        function onEventSelect() {
            <?php // payOfflineButton.attr('disabled', 'disabled'); ?>
            payOnlineButton.attr('disabled', 'disabled');
            jQuery('option:enabled', selectType).remove();
            typeContainer.hide();
            categoryContainer.hide()
            pricePlaceholder.text('');
            priceContainer.hide();
            teamContainer.hide();

            fillCategories(selectCategory, filteredCategories[selectEvent.val()]);
            categoryContainer.show()
        }

        function onCategorySelect() {
            <?php // payOfflineButton.attr('disabled', 'disabled'); ?>
            payOnlineButton.attr('disabled', 'disabled');
            jQuery('option:enabled', selectType).remove();
            typeContainer.hide();
            pricePlaceholder.text('');
            priceContainer.hide();
            teamContainer.hide();

            fillTypes(selectType, filteredCategories[selectEvent.val()], selectCategory.val());
            typeContainer.show()
        }

        function onTypeSelect() {
            pricePlaceholder.text(jQuery("option:selected", selectType).data('price')+' руб.');
            priceContainer.show();

            if (jQuery("option:selected", selectType).data('team') !== true) {
                <?php //payOfflineButton.removeAttr('disabled'); ?>
                payOnlineButton.removeAttr('disabled');
                teamContainer.hide();
            } else {
                teamContainer.show();
            }
        }

        function onTeamChange() {
            pricePlaceholder.text(jQuery("option:selected", selectType).data('price')+' руб.');
            priceContainer.show();

            if (teamName.val().trim() !== '') {
                <?php // payOfflineButton.removeAttr('disabled'); ?>
                payOnlineButton.removeAttr('disabled');
            } else {
                <?php // payOfflineButton.attr('disabled', 'disabled'); ?>
                payOnlineButton.attr('disabled', 'disabled');
                teamName.val('');
            }
        }

        jQuery(function () {
            categoryContainer.hide();
            typeContainer.hide();
            teamContainer.hide();
            priceContainer.hide();
        });

    </script>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
