<?php

namespace DependenCI\GHWebhooks;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DependenCI\GHWebhooks\GHWebhooksClass
 */
class GHWebhooksFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ghwebhooks';
    }
}
