<?php
/**
 * @author Marcio Toze <marcio.toze@gmail.com>
 */
class todoActions extends sfActions
{
    public function executeCreate(sfWebRequest $request)
    {
        $post = $request->getParameter('tasks');
        if ($post['name']) {
            $task = new Tasks();
            $task->setName($post['name']);
            $task->setPriority(Doctrine::getTable('Priority')->findOneById($post['priority_id']));
            $task->save();
        }
        $tasks = Tasks::getTasks();;
        return $this->renderPartial('list', array('tasks' => $tasks));
    }

    public function executeDelete(sfWebRequest $request)
    {
        $task = Doctrine::getTable('Tasks')->findOneById($request->getParameter('id'));
        $task->delete();
        $tasks = Tasks::getTasks();;
        return $this->renderPartial('list', array('tasks' => $tasks));
    }

    public function executeChangeStatus(sfWebRequest $request)
    {
        $task = Doctrine::getTable('Tasks')->findOneById($request->getParameter('id'));
        if ($task->getStatus())
            $task->setStatus(false);
        else
            $task->setStatus(true);
        $task->save();
        $tasks = Tasks::getTasks();;
        return $this->renderPartial('list', array('tasks' => $tasks));
    }
}
?>
