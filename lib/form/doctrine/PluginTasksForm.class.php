<?php

/**
 * PluginTasks form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginTasksForm extends BaseTasksForm
{
    public function setup()
    {
        parent::setup();
        unset($this['status'], $this['sf_guard_user_id'], $this['created_at'], $this['updated_at']);
    }
}
