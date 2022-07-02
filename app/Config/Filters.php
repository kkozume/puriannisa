<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use \App\Filters\FilterUser;
use \App\Filters\FilterLogin;
use \App\Filters\FilterPelangganLogin;
// use \App\Filters\FilterPelangganRegis;
//use \App\Filters\FilterPelangganLogout;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'filterUser'   => FilterUser::class,
		'filterLogin'   => FilterLogin::class,
		'filterPelangganLogin'   => FilterPelangganLogin::class,
		'filterPelangganLogout'   => FilterPelangganLogout::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			// 'honeypot',
			// 'csrf',
		],
		'after'  => [
			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [
		'filterUser' => ['before' =>
			[
				'home', 
				'akun',
				'akun/*',
				'kategori',
				'kategori/*',
				'kategori_beban',
				'kategori_beban/*',
				'produk',
				'produk/*',
				'pelanggan',
				'pelanggan/*',
				'pembebanan',
				'pembebanan/*',
				'Penjualan_admin',
				'Penjualan_admin/*',
				'laporan',
				'laporan/*',
				// 'setting',
				// 'setting/*',
				'setting_puri',
				'setting_puri/*',

			]
		],

		//'filterPelangganLogout' => ['before' =>
		//	[
		//		'web',
		//		'pesanan',
		//		'pesanan/*',
		//		'penjualan',
		//		'penjualan/*',

		//	]
		//]
	];
}
