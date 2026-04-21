
<div class="container">

    <h1>Add Post</h1>

    <form method="POST">

        <input type="hidden" name="csrf" value="<?= csrf_token() ?>">

        <input name="title" class="form-control mb-2" placeholder="Title">

        <textarea name="content" class="form-control mb-2" placeholder="Content"></textarea>

        <select name="visibility" class="form-control mb-2">
            <option value="all">All</option>
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
        </select>

        <button class="btn btn-primary">Create</button>

    </form>

</div>