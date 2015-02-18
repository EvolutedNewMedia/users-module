<?php namespace Anomaly\UsersModule\User\Command\Handler;

use Anomaly\UsersModule\User\Command\CreateUser;
use Anomaly\UsersModule\User\Contract\UserRepository;

/**
 * Class CreateUserHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command\Handler
 */
class CreateUserHandler
{

    /**
     * The user repository.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new CreateUserHandler instance.
     *
     * @param UserRepository $users
     */
    function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Handle the command.
     *
     * @param CreateUser $command
     */
    public function handle(CreateUser $command)
    {
        return $this->users->create($command->getUsername(), $command->getEmail(), $command->getPassword());
    }
}
