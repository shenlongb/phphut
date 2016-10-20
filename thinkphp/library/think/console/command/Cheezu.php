<?php
namespace think\console\command;

use think\console\command;
use think\console\Input;
use think\console\input\Option;
use think\console\Output;

class Cheezu extends Command
{
    protected function configure()
    {
        // 指令配置
        $this
            ->setName('cheezu')
            ->addOption('path', 'cez', Option::VALUE_OPTIONAL, 'path to clear', null)
            ->setDescription('Clear runtime file');
    }

    protected function execute(Input $input, Output $output)
    {

        $result = \think\Db::name('cyUser')
            ->where('userId', 390730)
            ->find();
        dump($result);

        
        $output->writeln("Clear Successed");
    }
}