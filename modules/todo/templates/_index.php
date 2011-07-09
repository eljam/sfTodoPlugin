<?php use_helper('I18N') ?>
<?php use_javascript('http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js') ?>
<?php use_javascript('../sfTodoPlugin/js/todo') ?>
<?php use_stylesheet('../sfTodoPlugin/css/todo') ?>
<?php if (sfConfig::get('app_sf_todo_plugin_formated')): ?>
    <?php use_stylesheet('../sfTodoPlugin/css/formated') ?>
<?php endif; ?>
<?php if ( !(sfConfig::get('app_sf_todo_plugin_use_sf_doctrine_guard')) or ($sf_user->isAuthenticated()) ): ?>
    <div id="todo_task_content">
        <h1><?php print __("Tasks") ?><span id="todo_loading"><?php print __("Loading...") ?></span></h1>
        <ul id="todo_tasks">
            <?php print include_partial('todo/list', array('tasks' => $tasks)) ?>
        </ul>
        <form onsubmit="jQuery.ajax({type:'POST',dataType:'html',data:jQuery(this).serialize(),success:function(data, textStatus){jQuery('#todo_tasks').html(data);},beforeSend:function(XMLHttpRequest){$(&quot;#todo_loading&quot;).show()},complete:function(XMLHttpRequest, textStatus){$(&quot;#todo_loading&quot;).hide();$(&quot;#tasks_name&quot;).val(&quot;&quot;);},url:'/frontend_dev.php/task/create'}); return false;" action="/task/create" method="post">
            <div id="todo_form"><?php print $form ?></div>
            <input id="todo_show" type="button" name="show" value="<?php print __('Add') ?>"/>
            <input id="todo_close" type="button" name="close" value="<?php print __('Close') ?>"/>
            <input id="todo_submit" type="submit" name="submit" value="<?php print __('Add') ?>"/>
        </form>
    </div>
<?php else: ?>
    <div id="todo_task_content">
        <h1><?php print __("Tasks") ?><span id="todo_loading"><?php print __("Loading...") ?></span></h1>
        <ul id="todo_tasks">
            <li><?php print __("Only authenticated user can use this.") ?></li>
        </ul>
    </div>
<?php endif;  ?>
