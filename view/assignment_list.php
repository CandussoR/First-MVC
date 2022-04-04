<?php include('view/header.php'); ?>

<section id="list" class="list">
    <!-- block element modifier with two underscores -->
    <header class="list__row list__header">

        <h1>Assignments</h1>

        <form action="." method="get" id="list_header_select" class="list_header_select">

            <input type="hidden" name="action" value="list_assignments">
            <select name="course_id" required>
                <option value="0">View All</option>
                <?php foreach ($courses as $course) :
                if ($course_id == $course['courseID']) { ?>
                <option value="<?= $course['courseID'] ?>" selected> 
                    <?php } else { ?>
                <option value="<?= $course['courseID'] ?>">
                    <?php } ?>
                    <?= $course['course_name'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <button class="add-button bold">Submit</button>

        </form>

    </header>

    <?php if ($assignments) { ?>
        <?php foreach ($assignments as $assignment) : ?>
        <div class="list__row">
            <div class="list__item">
                <p class="bold"><?= $assignment['course_name'] ?></p>
                <p><?= assignment['description'] ?></p>
            </div>
            <div class="list__removeItem">
                <form action="." method="post">
                <input type="hidden" name="action" value="delete_assignment">
                <input type="hidden" name="assignment_id" value="<?= $assignment['ID'] ?>">
                <button class="remove-button">❌</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
    <?php } else { ?>
        <br>
        <?php if ($course_id) { ?>
            <p>No assignments for this course.</p>
        <?php } else { ?>
            <p>No assignments exists yet.</p>
        <?php } ?>
        <br>
    <?php } ?>
</section>

<section id="add" class="add">
    <h2>Add an assignment</h2>

    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_assignment">
        <div class="add__inputs">
            <label>Courses :</label>
            <select name="course_id" required>
                <option value="">Select</option>
                <?php foreach ($courses as $course) : ?>
                <option value="<?= $course['courseID']; ?>">
                    <?= $course['course_name']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            
            <label>Description :</label>
            <input type="text" name="description" max_length="120" placeholder="Description" required>
        </div>

        <div class="add__addItem">
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>
<br>
<p><a href=".?action=list_courses">View/Edit Courses</a></p> 
<?php include('view/footer.php'); ?>