<div class="container">

    <h1>Edit Post</h1>

    <form method="POST">

        <input name="title" class="form-control mb-2"
               value="<?= htmlspecialchars($post['title']) ?>">

        <textarea name="content" class="form-control mb-2"><?= htmlspecialchars($post['content']) ?></textarea>

        <button class="btn btn-warning">Update</button>

    </form>

</div>