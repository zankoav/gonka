<?php
	// задаем нужные нам критерии выборки данных из БД
	$gonkas = fresh_gonka_list();


?>

<div class="registration">
    <div class="container">
        <div class="registration__inner">
            <h1 class="title">Регистрация на гонку</h1>
            <div class="registration__form">
                <form class="registration-form" method="POST" action="/">
                    <div class="registration-form__group registration-form__group_select">
                        <label class="registration-form__group-label">Выбери гонку</label>
                        <select class="registration-form__group-input registration-form__group-select"
                                name="user-gonka">
                            <option disabled selected>Гонка</option>
							<?php foreach ( $gonkas as $gonkaKey=>$gonkaValue ): ?>
                                <option value="<?=$gonkaKey?>"><?=$gonkaValue;?></option>
							<?php endforeach; ?>
                        </select>
                    </div>
                    <div class="registration-form__group registration-form__group_select">
                        <label class="registration-form__group-label">Формат участия</label>
                        <select class="registration-form__group-input registration-form__group-select"
                                name="user-gonka-type">
                            <option value="Elite" selected>BettaCup Elite</option>
                            <option value="Age">BettaCup Age</option>
                            <option value="Kids">BettaCup Kids</option>
                            <option value="Trail_5">BettaCup Trail 5</option>
                            <option value="Trail_10">BettaCup Trail 10</option>
                            <option value="TEAM_RELAY">TEAM RELAY</option>
                            <option value="TEAM_RACE">TEAM RACE</option>
                        </select>
                    </div>
                    <div class="registration-form__group">
                        <label class="registration-form__group-label">Имя</label>
                        <input class="registration-form__group-input" type="text" name="user-name" placeholder="Имя">
                    </div>
                    <div class="registration-form__group">
                        <label class="registration-form__group-label">Email</label>
                        <input class="registration-form__group-input" type="email" name="user-email"
                               placeholder="Email">
                    </div>
                    <div class="registration-form__group">
                        <label class="registration-form__group-label">Возраст</label>
                        <input class="registration-form__group-input" type="number" name="user-age" placeholder="18">
                    </div>
                    <div class="registration-form__group">
                        <div class="registration-form__group-sex">
                            <div class="registration-form__group-sex-item">
                                <label class="registration-form__group-label" for="user-male">Муж</label>
                                <input class="registration-form__group-input" id="user-male" type="radio"
                                       name="user-sex" value="male" checked="checked">
                            </div>
                            <div class="registration-form__group-sex-item">
                                <label class="registration-form__group-label" for="user-female">Жен</label>
                                <input class="registration-form__group-input" id="user-female" type="radio"
                                       name="user-sex" value="female">
                            </div>
                        </div>
                    </div>
                    <div class="registration-form__group registration-form__group_select">
                        <label class="registration-form__group-label">Группа</label>
                        <select class="registration-form__group-input registration-form__group-select"
                                name="user-group-type">
                            <option disabled selected>Группа</option>
                            <option value="Ниньзя">Ниньзя</option>
                            <option value="М + Ж">М + Ж</option>
                            <option value="M">M</option>
                            <option value="Ж">Ж</option>
                        </select>
                    </div>
                    <div class="registration-form__group">
                        <div class="registration-form__group_is-group"><a
                                    class="registration-form__group-submit registration-form__group-submit-js-1 registration-form__group-submit_tab registration-form__group-submit_active"
                                    href="#">Один</a><a
                                    class="registration-form__group-submit registration-form__group-submit-js-1 registration-form__group-submit_tab"
                                    href="#" command>Команда</a>
                            <div class="registration-form__command"><a
                                        class="registration-form__group-submit registration-form__group-submit-js-2 registration-form__group-submit_tab registration-form__group-submit_active"
                                        href="#">Хочу в команду</a><a
                                        class="registration-form__group-submit registration-form__group-submit-js-2 registration-form__group-submit_tab"
                                        href="#">Создать свою команду</a>
                                <div class="registration-form__command-select-wrapp">
                                    <div class="registration-form__group registration-form__group_select registration-form__command-select registration-form__command-select_active">
                                        <label class="registration-form__group-label">Хочу в команду</label>
                                        <select class="registration-form__group-input registration-form__group-select"
                                                name="user-group-command">
                                            <option disabled selected>Команда</option>
                                            <option value="mtbank">mtbank</option>
                                            <option value="69pixels">69pixels</option>
                                            <option value="teslasuit">teslasuit</option>
                                            <option value="oops">oops</option>
                                        </select>
                                    </div>
                                    <div class="registration-form__group registration-form__command-select">
                                        <label class="registration-form__group-label">Создать свою команду</label>
                                        <input class="registration-form__group-input" type="text"
                                               name="user-new-command" placeholder="Название команды">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="registration-form__group registration-form__group_center">
                        <button class="registration-form__group-submit" type="submit" disabled="disabled">Оплатить
                            билет
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
