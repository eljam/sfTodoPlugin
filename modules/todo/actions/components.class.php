<?php
/**
 * @author Marcio Toze <marcio.toze@gmail.com>
 */

class todoComponents extends sfComponents
{
    public function executeIndex(sfWebRequest $request)
    {
        $nextDay = new DateTime();
        $nextDay->modify("-1 day");

        $this->tasks = Tasks::getTasks();
        $this->form = new TasksForm();
    }
}
?>
