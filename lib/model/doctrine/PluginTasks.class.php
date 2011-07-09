<?php

/**
 * PluginTasks
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginTasks extends BaseTasks
{
    public static function getTasks()
    {
        $nextDay = new DateTime();
        $nextDay->modify("-1 day");

        $tasks = Doctrine::getTable('Tasks')
            ->createQuery('t')
            ->addWhere('status = ? or updated_at > ? ', array(true, $nextDay->format('Y-m-d H:i:s')))
            ->orderBy('priority_id, created_at DESC');
        if (sfConfig::get('app_sf_todo_plugin_use_sf_doctrine_guard'))
            $tasks->addWhere('sf_guard_user_id = ?', sfContext::getInstance()->getUser()->getGuardUser()->getId());
        
        return $tasks->execute();;
    }
}
