<?php

namespace FlarumS\Daemon\Service;

use FlarumS\Console\Color;

/**
 * Class ReloadComand
 * @package FlarumS\Daemon\Service
 * @author <trint.dev@gmail.com>
 */
class ReloadCommand extends BaseCommand
{

    public function main()
    {
        $pid = $this->getServicePid();
        if (!$pid) {
            (new Color)->println(self::NOT_RUNNING);
            return;
        }
        \Swoole\Process::kill($pid, SIGUSR1);
        (new Color)->println(self::EXEC_SUCCESS);
    }

}
