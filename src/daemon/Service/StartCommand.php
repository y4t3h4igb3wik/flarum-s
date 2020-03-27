<?php

namespace FlarumS\Daemon\Service;

use FlarumS\Console\Flag;
use FlarumS\Console\Color;

/**
 * Class StartComand
 * @package FlarumS\Daemon\Service
 * @author <trint.dev@gmail.com>
 */
class StartCommand extends BaseCommand
{

    /**
     * @var bool
     */
    public $update;

    /**
     * @var bool
     */
    public $daemon;

    public function main()
    {
        if ($pid = $this->getServicePid()) {
            (new Color)->println(sprintf(self::IS_RUNNING, $pid));
            return;
        }

        $this->update = Flag::bool(['u', 'update'], false);
        $this->daemon = Flag::bool(['d', 'daemon'], false);

        $server = new \FlarumS\Server\Httpd($this->path, $this->setting);

        if ($this->update) {
            $server->setting['max_request'] = 1;
        }
        $server->setting['daemonize'] = $this->daemon;
        $server->start();
    }

}
