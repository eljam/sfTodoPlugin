<?php foreach ($tasks as $task): ?>
    <li class="todo_task">
        <span class="todo_priority todo_<?php print $task->getPriority() ?>"></span>
            <div class="todo_task_name <?php print $task->getStatus() ? 'todo_active' : 'todo_inactive' ?>" onclick="jQuery.ajax({type:'POST',dataType:'html',success:function(data, textStatus){jQuery('#todo_tasks').html(data);},beforeSend:function(XMLHttpRequest){$(&quot;#todo_loading&quot;).show()},complete:function(XMLHttpRequest, textStatus){$(&quot;#todo_loading&quot;).hide()},url:'/task/changeStatus/'+<?php print $task->getId() ?>}); return false;">
            <?php print $task->getName() ?>
            <span class="todo_remove">
                <a href="#" onclick="jQuery.ajax({type:'POST',dataType:'html',success:function(data, textStatus){jQuery('#todo_tasks').html(data);},beforeSend:function(XMLHttpRequest){$(&quot;#todo_loading&quot;).show()},complete:function(XMLHttpRequest, textStatus){$(&quot;#todo_loading&quot;).hide()},url:'/task/delete/'+<?php print $task->getId() ?>}); return false;"><?php print image_tag("../sfTodoPlugin/images/close",array('alt' => 'X')) ?></a>
            </span>
        </div>
    </li>
<?php endforeach; ?>
