<?php

	class Lang {

		const COOKIE_KEY = 'lang';
		const LANGUAGES = [ 'ru', 'en' ];
		const BASE_LANG = 'ru';
		const CONSTANTS = [
			'login'       => [
				'ru' => 'Вход / Регистрация',
				'en' => 'Login / Registration'
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
			'by' => [
				'ru' => ' ',
				'en' => 'by'
			],
			'read more' => [
				'ru' => 'читать больше',
				'en' => 'read more'
			],
			'blog' => [
				'ru' => 'блог',
				'en' => 'blog'
			],
			'home' => [
				'ru' => 'главная',
				'en' => 'home'
			],
			'resent posts' => [
				'ru' => 'последние посты',
				'en' => 'resent posts'
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