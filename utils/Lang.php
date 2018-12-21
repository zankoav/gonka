<?php

	class Lang {

		const COOKIE_KEY = 'lang';
		const LANGUAGES = [ 'ru', 'en' ];
		const BASE_LANG = 'ru';
		const CONSTANTS = [
			'404_title'       => [
				'ru' => 'Ошибка 404',
				'en' => 'Error 404'
			],
			'404_description' => [
				'ru' => 'Страница не найдена',
				'en' => 'Page not found'
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