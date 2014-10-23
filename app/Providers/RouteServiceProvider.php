<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * The controllers to scan for route annotations.
	 *
	 * @var array
	 */
	protected $scan = [
//		'App\Http\Controllers\HomeController',
//		'App\Http\Controllers\Auth\AuthController',
//		'App\Http\Controllers\Auth\PasswordController',
	];

	/**
	 * All of the application's route middleware keys.
	 *
	 * @var array
	 */
	protected $middleware = [
		'auth' => 'App\Http\Middleware\Authenticated',
		'auth.basic' => 'App\Http\Middleware\AuthenticatedWithBasicAuth',
		'csrf' => 'App\Http\Middleware\CsrfTokenIsValid',
		'guest' => 'App\Http\Middleware\IsGuest',
	];

	/**
	 * Called before routes are registered.
	 *
	 * Register any model bindings or pattern based filters.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function before(Router $router)
	{
		//
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		// require app_path('Http/routes.php');
		$router->group(['namespace' => 'App\Http\Controllers\Auth'], function($router) {
			$router->group(['prefix' => 'auth'], function($router) {
				$router->group(['middleware' => ['guest']], function($router) {
					$router->get('register', ['as' => 'auth.register', 'uses' => 'AuthController@showRegistrationForm']);
					$router->post('register', ['as' => 'auth.register', 'uses' => 'AuthController@register']);

					$router->get('login', ['as' => 'auth.login', 'uses' => 'AuthController@showLoginForm']);
					$router->post('login', ['as' => 'auth.login', 'uses' => 'AuthController@login']);
				});

				$router->get('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);
			});

			$router->group(['prefix' => 'password', 'middleware' => ['guest']], function($router) {
				$router->get('email', ['as' => 'password.reset-request', 'uses' => 'PasswordController@showResetRequestForm']);
				$router->post('email', ['as' => 'password.reset-request', 'uses' => 'PasswordController@sendResetLink']);

				$router->get('reset/{token}', ['as' => 'password.reset', 'uses' => 'PasswordController@showResetForm']);
				$router->post('reset', ['as' => 'password.reset', 'uses' => 'PasswordController@resetPassword']);
			});

		});

	}

}
