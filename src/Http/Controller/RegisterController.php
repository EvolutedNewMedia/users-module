<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class RegisterController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller
 */
class RegisterController extends PublicController
{

    /**
     * Return the register view.
     *
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function register()
    {
        return $this->view->make('anomaly.module.users::register');
    }
}
