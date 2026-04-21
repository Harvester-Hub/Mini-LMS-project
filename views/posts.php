<div class="container">

    <h1>Posts</h1>

    <a href="?page=add" class="btn btn-success mb-3">Add post</a>

    <?php foreach ($posts as $p): ?>

        <div class="card bg-dark text-light p-2 mb-2">

            <h5><?= htmlspecialchars($p['title']) ?></h5>
            <p><?= htmlspecialchars($p['content']) ?></p>

            <small>
                <?= htmlspecialchars($p['email']) ?> |
                <?= $p['created_at'] ?>
            </small>

            <?php if (user() && user()['id'] == $p['user_id']): ?>
                <div class="mt-2">
                    <a href="?page=edit&id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="?page=delete&id=<?= $p['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </div>
            <?php endif; ?>

        </div>

    <?php endforeach; ?>

</div>