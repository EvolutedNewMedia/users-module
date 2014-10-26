<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Anomaly\Streams\Addon\Module\Users\Login\LoginService;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Addon\Module\Users\Exception\UserNotFoundException;
use Anomaly\Streams\Addon\Module\Users\Authentication\AuthenticationService;

class LoginController extends AdminController
{
    public function login()
    {
        return view('module.users::admin/login');
    }

    public function attempt(
        Request $request,
        Redirector $redirect,
        LoginService $login,
        AuthenticationService $authentication
    ) {
        try {

            if ($user = $authentication->authenticate($request->all())) {

                $login->login($user->getResource(), ($request->get('remember') == 'on'));

                return $redirect->intended(preference('module.users::home_page', 'admin/dashboard'));

            }

        } catch (UserNotFoundException $e) {

            app('streams.messages')->add('error', 'module.users::error.user_not_found');

        }

        app('streams.messages')->flash();

        return $redirect->to('admin/login');
    }
}
 