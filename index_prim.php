<html lang="en">
    <body>
        <h1>TO-Do List</h1>
        <form method="POST" action="save_task_prim.php">
            <input type="text" name="task" placeholders="Enter a new task" required>
            <button type="submit">Add Task</button>
            </form
        <h2>yourTasks:</h2>
        <ul>
            <?php
            $tasks=[];
            if (file_exists(filename: 'tasks_prim.json')){
                $json_data=file_get_contents(filename: 'tasks_prim.json');
                $tasks= json_decode(json: $json_data, associative: true);
            
            }
            foreach ($tasks as $task){
                echo '<li>' . htmlspecialchars(string: $task) . '</li>';
            }
            ?>
                    function scheduleTasks($tasks) {
            $current_time = time();
            foreach ($tasks as $index => $task) {
                if (isset($task['timestamp']) && ($current_time - $task['timestamp']) > 86400) { // 86400 seconds = 24 hours
                    unset($tasks[$index]);
                }
            }
            file_put_contents('tasks_prim.json', json_encode($tasks, JSON_PRETTY_PRINT));
        }
        scheduleTasks($tasks);
    </ul>
</body>
</html>