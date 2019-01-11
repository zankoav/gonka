<?php

	class Lang {

		const COOKIE_KEY = 'lang';
		const LANGUAGES = [ 'ru', 'en' ];
		const BASE_LANG = 'ru';
		const CONSTANTS = [
			'All rights reserved.'=>[
				'ru' => 'Все права защищены.',
				'en'=>'All rights reserved.'
			],
			'blog' => [
				'ru' => 'блог',
				'en' => 'blog'
			],
			'by' => [
				'ru' => ' ',
				'en' => 'by'
			],
			'Contacts'=>[
				'ru' => 'Контакты',
				'en' => 'Contacts'
			],
			'click'=>[
				'ru' => 'Кликни',
				'en' => 'Click'
			],
			'home' => [
				'ru' => 'главная',
				'en' => 'home'
			],
			'Links'       => [
				'ru' => 'Ссылки',
				'en' => 'Links'
			],
			'login'       => [
				'ru' => 'Вход / Регистрация',
				'en' => 'Login / Registration'
			],
			'map'       => [
				'ru' => 'Карта',
				'en' => 'Map'
			],
			'Menu'       => [
				'ru' => 'Меню',
				'en' => 'Menu'
			],
			'photo'       => [
				'ru' => 'Фото',
				'en' => 'Photo'
			],
			'read more' => [
				'ru' => 'подробнее',
				'en' => 'read more'
			],
			'REGULATION' => [
				'ru' => 'РЕГЛАМЕНТ',
				'en' => 'REGULATION'
			],
			'registration' => [
				'ru' => 'Зарегистрироваться',
				'en' => 'Registration'
			],
			'resent posts' => [
				'ru' => 'последние новости',
				'en' => 'recent news'
			],
			'results' => [
				'ru' => 'Результаты',
				'en' => 'Results'
			],
			'search'       => [
				'ru' => 'Поиск...',
				'en' => 'Search...'
			],
			'search-empty'=>[
				'ru' => 'Поиск не принес результатов',
				'en' => 'Search returned no results'
			],
			'search-empty-description' => [
				'ru' => 'По вашему запросу нет данных, попробуйте ввести другой запрос',
				'en' => 'No data available on your request, please try another request'
			],
			'shema_delivery' => [
				'ru' => 'Схема проезда',
				'en' => 'Location map'
			],
			'Socials' => [
				'ru' => 'Социальные сети',
				'en' => 'Socials'
			],
			'tags' => [
				'ru' => 'теги',
				'en' => 'tags'
			],
			'video' =>[
				'ru'=>'Видео',
				'en'=>'Video'
			]
		];

		public static function current() {
			return ( isset( $_COOKIE[ self::COOKIE_KEY ] ) and in_array( $_COOKIE[ self::COOKIE_KEY ], self::LANGUAGES ) ) ?
				$_COOKIE[ self::COOKIE_KEY ] :
				self::LANGUAGES[0];
		}

		public static function get( $name, $echo = false ) {
			$value = self::CONSTANTS[ $name ][ self::current() ];
			if ( $echo ) {
				echo $value;
			} else {
				return $value;
			}
		}

	}