<?php

namespace FlarumS\Daemon\Service;

use FlarumS\Console\Color;
use Swoole\Process;

/**
 * Class StopComand
 * @package FlarumS\Daemon\Service
 * @author <trint.dev@gmail.com>
 */
class StopCommand extends BaseCommand
{

    public function main()
    {
        $pid = $this->getServicePid();
        if (!$pid) {
            (new Color)->println(self::NOT_RUNNING);
            return;
        }
        Process::kill($pid);
        while (Process::kill($pid, 0)) {
            usleep(100000);
        }
        (new Color)->println(self::EXEC_SUCCESS);
    }

}
