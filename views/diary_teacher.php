<div class="container">

    <h1 class="mb-3">Teacher Panel</h1>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <div class="card bg-dark text-light p-3 mb-3">

        <h5>Add grade</h5>

        <form method="POST">

            <select name="student_id" class="form-control mb-2" required>
                <option value="">Select student</option>
                <?php foreach ($students as $s): ?>
                    <option value="<?= $s['id'] ?>">
                        <?= htmlspecialchars($s['email']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select name="subject" class="form-control mb-2" required>
                <option value="">Select subject</option>
                <?php foreach ($subjects as $sub): ?>
                    <option value="<?= htmlspecialchars($sub['subject']) ?>">
                        <?= htmlspecialchars($sub['subject']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input
                name="grade"
                type="number"
                class="form-control mb-2"
                placeholder="Grade (1-5)"
                min="1"
                max="5"
                onfocus="this.select()"
                oninput="if (this.value > 5) this.value = 5; if (this.value < 1) this.value = 1;"
                required
            >

            <button class="btn btn-success">Save grade</button>

        </form>

    </div>

    <div class="card bg-dark text-light p-3">

        <h5>Your subjects</h5>

        <?php if (!empty($subjects)): ?>
            <?php foreach ($subjects as $sub): ?>
                <div>
                    • <?= htmlspecialchars($sub['subject']) ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-secondary">No subjects assigned</div>
        <?php endif; ?>

    </div>

</div>