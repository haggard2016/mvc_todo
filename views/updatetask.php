 <h1>Edit task</h1>
    <div class="row">
        <div class="col-sm-6">
            <form method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">User</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?=$task['user_name']?>">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?=$task['email']?>">
                    <label for="description" class="form-label">Task description</label>
                    <textarea class="form-control" id="description" rows="3" name="description"><?=$task['description']?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
