<?php include('view/header.php') ?>

<?php if ($courses) { ?>
    <section id="list" class="list">
        <header class="list__row list__header">
            <h1>Course List</h1>
        </header>

        <?php foreach ($courses as $course) : ?>
            <div class="list__row">
                <div class="list__item">
                    <p class="bold"><?= $course['course_name'] ?></p>
                </div>
                <div class="list_removeItem">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_course">
                        <input type="hidden" name="course_id" value="<?= $course['courseID'] ?>">
                        <button class="remove-button">❌</button>
                    </form> 
                </div>
            </div>
        <?php endforeach; ?>
    </section>

        
<?php } else { ?>
    <p>No courses yet.</p>
<?php } ?>

<?php include('view/footer.php') ?>