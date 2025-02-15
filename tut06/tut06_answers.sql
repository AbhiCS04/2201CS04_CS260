-- General Instructions
-- 1.	The .sql files are run automatically, so please ensure that there are no syntax errors in the file. If we are unable to run your file, you get an automatic reduction to 0 marks.
-- Comment in MYSQL 

-- 1. Write a query to display the first name and last name of all students along with their enrolled courses.
SELECT s.first_name, s.last_name, c.course_name
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
JOIN courses c ON e.course_id = c.course_id;

-- 2. List the course names along with the grades of students who have enrolled in them.
SELECT e.student_id, c.course_name, e.grade
FROM enrollments e
JOIN courses c ON e.course_id = c.course_id;

-- 3. Display the first name, last name, and course name of all students along with their instructors.
SELECT s.first_name, s.last_name, c.course_name, CONCAT(i.first_name, ' ', i.last_name) AS instructor_name
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
JOIN courses c ON e.course_id = c.course_id
JOIN instructors i ON c.instructor_id = i.instructor_id;

-- 4. Show the first name, last name, age, and city of all students who are enrolled in the 'Mathematics' course.
SELECT s.first_name, s.last_name, s.age, s.city
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
JOIN courses c ON e.course_id = c.course_id
WHERE c.course_name = 'Mathematics';

-- 5. List the course names along with the names of instructors teaching those courses.
SELECT c.course_name, CONCAT(i.first_name, ' ', i.last_name) AS instructor_name
FROM courses c
JOIN instructors i ON c.instructor_id = i.instructor_id;

-- 6. Display the first name, last name, and grade of all students along with their enrolled courses.
SELECT s.first_name, s.last_name, e.grade, c.course_name
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
JOIN courses c ON e.course_id = c.course_id;

-- 7. Show the first name, last name, and age of all students who are enrolled in more than one course.
SELECT s.first_name, s.last_name, s.age
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
GROUP BY s.student_id
HAVING COUNT(*) > 1;

-- 8. Write a query to display the course names and the number of students enrolled in each course.
SELECT c.course_name, COUNT(*) AS num_students
FROM enrollments e
JOIN courses c ON e.course_id = c.course_id
GROUP BY c.course_name;

-- 9. Display the first name, last name, and age of students who have not enrolled in any courses.
SELECT first_name, last_name, age
FROM students
WHERE student_id NOT IN (SELECT DISTINCT student_id FROM enrollments);

-- 10. List the course names along with the average grades obtained by students in each course.
SELECT c.course_name, AVG(e.grade) AS average_grade
FROM enrollments e
JOIN courses c ON e.course_id = c.course_id
GROUP BY c.course_name;

-- 11. Show the first name, last name, and course name of all students who have received grades above 'B'.
SELECT s.first_name, s.last_name, c.course_name
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
JOIN courses c ON e.course_id = c.course_id
WHERE e.grade < 'B';

-- 12. Write a query to display the course names and the names of instructors with a last name starting with 'S'.
SELECT c.course_name, CONCAT(i.first_name, ' ', i.last_name) AS instructor_name
FROM courses c
JOIN instructors i ON c.instructor_id = i.instructor_id
WHERE i.last_name LIKE 'S%';

-- 13. Display the first name, last name, and age of students who are enrolled in courses taught by 'Dr. Akhil'.
SELECT s.first_name, s.last_name, s.age
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
JOIN courses c ON e.course_id = c.course_id
JOIN instructors i ON c.instructor_id = i.instructor_id
WHERE i.first_name = 'Dr. Akhil';

-- 14. Show the course names and the maximum grade obtained in each course.
SELECT c.course_name, MAX(e.grade) AS max_grade
FROM enrollments e
JOIN courses c ON e.course_id = c.course_id
GROUP BY c.course_name;

-- 15. Write a query to display the first name, last name, and age of students along with the course names they have enrolled in, sorted by course name in ascending order.

SELECT s.first_name, s.last_name, s.age, c.course_name
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
JOIN courses c ON e.course_id = c.course_id
ORDER BY c.course_name ASC;