<h1>Tasks list</h1>
<div class="row">
    <div class="col-lg">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Task</th>
                <th scope="col">Status</th>
                <?php if($user) {?><th scope="col">Action</th><?}?>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach($tasks as $task) {
                ?>
            <tr>
                <th scope="row"><?=$i?></th>
                <td><?=$task['user_name']?></td>
                <td><?=$task['email']?></td>
                <td class="desc"><?=substr($task['description'], null, 100)?></td>
                <td>
                    <?=$task['status'] ? '<span class="badge bg-success">Done</span></h4>' : '<span class="badge bg-secondary">New</span></h4>'?>
                    <?=$task['updated_at'] > $task['created_at'] ? '<span class="badge bg-warning">Updated</span></h4>' : ''?>
                </td>
                <?php if($user) {?>
                <td class="actions">
                    <div class="btn-group" role="group" aria-label="Actions">
                        <a role="button" class="btn btn-outline-primary" href="/task/edit/<?=$task['id']?>">Edit</a>
                        <a role="button" class="btn btn-outline-primary" href="/task/delete/<?=$task['id']?>">Delete</a>
                        <a role="button" class="btn btn-outline-primary" href="/task/status/<?=$task['id']?>">Status</a>
                    </div>
                </td>
                <?}?>
            </tr>
            <?php
            $i++;
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<div class="toast d-flex align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body">
        Operation was finished successful.
    </div>
    <button type="button" class="btn-close btn-close-white ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
</div>