<div class="container">

    <h1>My Grades</h1>

    <?php if (!empty($grades)): ?>
        <?php foreach ($grades as $g): ?>
            <div class="card bg-dark text-light p-2 mb-2">
                <b>Subject:</b> <?= htmlspecialchars($g['subject']) ?><br>
                <b>Grade:</b> <?= htmlspecialchars($g['grade']) ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No grades yet</p>
    <?php endif; ?>

</div>