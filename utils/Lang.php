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
			'Menu'       => [
				'ru' => 'Меню',
				'en' => 'Menu'
			],
			'read more' => [
				'ru' => 'подробнее',
				'en' => 'read more'
			],
			'resent posts' => [
				'ru' => 'последние новости',
				'en' => 'recent news'
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
			'Socials' => [
				'ru' => 'Социальные сети',
				'en' => 'Socials'
			],
			'tags' => [
				'ru' => 'теги',
				'en' => 'tags'
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