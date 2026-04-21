
<div class="container">

    <h1 class="mb-3">Home</h1>

    <div class="card bg-dark text-light p-3 mb-3">
        <h4>Welcome</h4>

        <?php if (user()): ?>
            <p>
                You are logged in as:
                <b><?= htmlspecialchars(user()['email']) ?></b>
                (<?= htmlspecialchars(user()['role']) ?>)
            </p>
        <?php else: ?>
            <p>You are viewing as guest</p>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <a href="?page=posts" class="btn btn-primary">Posts</a>
        <a href="?page=diary" class="btn btn-success">Diary</a>
        <a href="?page=profile" class="btn btn-warning">Profile</a>
    </div>

    <div class="card bg-secondary text-light p-3">
        <h5>Project info</h5>
        <p>
            Mini LMS system with roles, posts, diary and API.
        </p>
    </div>

</div>