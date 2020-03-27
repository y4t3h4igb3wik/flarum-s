<?php

namespace FlarumS\Daemon\Service;

use FlarumS\Console\Color;

/**
 * Class statusComand
 * @package FlarumS\Daemon\Service
 * @author <trint.dev@gmail.com>
 */
class StatusCommand extends BaseCommand
{

    public function main()
    {
        $pid = $this->getServicePid();
        if (!$pid) {
            (new Color)->println(self::NOT_RUNNING);
            return;
        }
        (new Color)->println(sprintf(self::IS_RUNNING, $pid));
    }

}
