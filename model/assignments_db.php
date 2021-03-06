<?php

    function get_assigment_by_course($course_id) {
        global $db;

        $assignments_by_course_query = "SELECT A.id, A.description, C.course_name FROM assignments A LEFT JOIN courses C ON A.courseID = C.courseID WHERE A.courseID = :course_id ORDER BY A.id";
        $all_assignments_query = "SELECT A.id, A.description, C.course_name FROM assignments A LEFT JOIN courses C ON A.courseID = C.courseID ORDER BY C.courseID";

        if ($course_id) {
            $statement = $db->prepare($assignments_by_course_query);
            $statement->bindValue(':course_id', $course_id);
        } else {
            $statement = $db->prepare($all_assignments_query);
        }

        $statement->execute();
        $assignments = $statement->fetchAll();
        $statement->closeCursor();

        return $assignments;
    };


    function delete_assignment($assignment_id) {
        global $db;

        $query = "DELETE FROM assignments WHERE id = :assign_id";

        $statement = $db->prepare($query);
        $statement->bindValue(':assign_id', $assignment_id);
        $statement->execute();
        $statement->closeCursor();
    }


    function add_assignment($course_id, $description) {
        global $db;

        $query = "INSERT INTO assignments (description, courseID) VALUES (:descr, :courseID)";

        $statement = $db->prepare($query);
        $statement->bindValue(':descr', $description);
        $statement->bindValue(':courseID', $course_id);
        $statement->execute();
        $statement->closeCursor();
    }