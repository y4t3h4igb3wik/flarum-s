<?php

namespace FlarumS\Server;

/**
 * Class SwooleEvent
 * @package FlarumS\Server
 * @author <trint.dev@gmail.com>
 */
class SwooleEvent
{
    const START         = 'start';
    const MANAGER_START = 'managerStart';
    const WORKER_START  = 'workerStart';
    const REQUEST       = 'request';
}
