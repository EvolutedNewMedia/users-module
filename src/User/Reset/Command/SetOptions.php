<?php namespace Anomaly\UsersModule\User\Reset\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\UsersModule\User\Reset\ResetFormBuilder;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetDefaultOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Reset\Command
 */
class SetOptions implements SelfHandling
{

    /**
     * The reset form builder.
     *
     * @var ResetFormBuilder
     */
    protected $builder;

    /**
     * Create a new SetDefaultOptions instance.
     *
     * @param ResetFormBuilder $builder
     */
    public function __construct(ResetFormBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     */
    public function handle(SettingRepositoryInterface $settings)
    {
        if (!$this->builder->getOption('redirect')) {
            $this->builder->setOption('redirect', $settings->value('anomaly.module.users::reset_redirect', '/'));
        }

        if (!$this->builder->getOption('success_message')) {
            $this->builder->setOption(
                'success_message',
                $settings->value('anomaly.module.users::reset_message', 'You are now logged in.')
            );
        }

        if (!$this->builder->getOption('container_class')) {
            $this->builder->setOption('container_class', 'form-wrapper');
        }
    }

}
