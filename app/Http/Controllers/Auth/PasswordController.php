<?php namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\PasswordBroker;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Middleware("guest")
 */
class PasswordController extends Controller {

	/**
	 * The password broker implementation.
	 *
	 * @var PasswordBroker
	 */
	protected $passwords;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(PasswordBroker $passwords)
	{
		$this->passwords = $passwords;
	}

	/**
	 * Display the form to request a password reset link.
	 *
	 * @Get("password/email")
	 *
	 * @return Response
	 */
	public function showResetRequestForm()
	{
		return view('password.email');
	}

	/**
	 * Send a reset link to the given user.
	 *
	 * @Post("password/email")
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function sendResetLink(Request $request)
	{
		switch ($response = $this->passwords->sendResetLink($request->only('email')))
		{
			case PasswordBroker::INVALID_USER:
				return redirect()->back()->with('error', trans($response));

			case PasswordBroker::RESET_LINK_SENT:
				return redirect()->back()->with('status', trans($response));
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @Get("password/reset/{token}")
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function showResetForm($token = null)
	{
		if (is_null($token))
		{
			throw new NotFoundHttpException;
		}

		return view('password.reset')->with('token', $token);
	}

	/**
	 * Reset the given user's password.
	 *
	 * @Post("password/reset")
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function resetPassword(Request $request)
	{
		$credentials = $request->only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = $this->passwords->reset($credentials, function($user, $password)
		{
			$user->password = $password;

			$user->save();
		});

		switch ($response)
		{
			case PasswordBroker::INVALID_PASSWORD:
			case PasswordBroker::INVALID_TOKEN:
			case PasswordBroker::INVALID_USER:
				return redirect()->back()->with('error', trans($response));

			case PasswordBroker::PASSWORD_RESET:
				return redirect()->to('/');
		}
	}

}
