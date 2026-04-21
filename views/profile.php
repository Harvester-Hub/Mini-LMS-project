<div class="container">

    <h1 class="mb-3">Profile</h1>

    <div class="card bg-dark text-light p-3">

        <h4>User info</h4>

        <p><b>ID:</b> <?= htmlspecialchars($profile['id']) ?></p>
        <p><b>Email:</b> <?= htmlspecialchars($profile['email']) ?></p>
        <p><b>Role:</b> <?= htmlspecialchars($profile['role']) ?></p>

        <p><b>Created:</b> <?= htmlspecialchars($profile['created_at'] ?? 'N/A') ?></p>

    </div>

    <div class="mt-3">
        <a href="?page=home" class="btn btn-secondary">Back</a>
        <a href="?page=logout" class="btn btn-danger">Logout</a>
    </div>

</div>