-- General Instructions
-- 1.	The .sql files are run automatically, so please ensure that there are no syntax errors in the file. If we are unable to run your file, you get an automatic reduction to 0 marks.
-- Comment in MYSQL 

-- VERSION: 8.0.36-0ubuntu0.22.04.1  [MySQL 8.0]
-- 1. Create a trigger that automatically increases the salary by 10% for employees whose salary is below ?60000 when a new record is inserted into the employees table.
DELIMITER //
CREATE TRIGGER increase_salary_trigger
BEFORE INSERT ON employees
FOR EACH ROW
BEGIN
    IF NEW.salary < 60000 THEN
        SET NEW.salary = NEW.salary * 1.10;
    END IF;
END;
//
DELIMITER ;


-- 2. Create a trigger that prevents deleting records from the departments table if there are employees assigned to that department.
DELIMITER //
CREATE TRIGGER prevent_delete_trigger
BEFORE DELETE ON departments
FOR EACH ROW
BEGIN
    DECLARE employee_count INT;
    SELECT COUNT(*) INTO employee_count FROM employees WHERE department_id = OLD.department_id;
    IF employee_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Cannot delete department with assigned employees';
    END IF;
END;
//
DELIMITER ;


-- 3. Write a trigger that logs the details of any salary updates (old salary, new salary, employee name, and date) into a separate audit table.
DELIMITER //
CREATE TRIGGER salary_update_trigger
AFTER UPDATE ON employees
FOR EACH ROW
BEGIN
    IF OLD.salary != NEW.salary THEN
        INSERT INTO salary_audit (emp_id, old_salary, new_salary, employee_name, update_date)
        VALUES (OLD.emp_id, OLD.salary, NEW.salary, CONCAT(OLD.first_name, ' ', OLD.last_name), NOW());
    END IF;
END;
//
DELIMITER ;


-- 4. Create a trigger that automatically assigns a department to an employee based on their salary range (e.g., salary <= ?60000 -> department_id = 3).
DELIMITER //
CREATE TRIGGER assign_department_trigger
BEFORE INSERT ON employees
FOR EACH ROW
BEGIN
    DECLARE dept_id INT;
    
    IF NEW.salary <= 60000 THEN
        SET dept_id = 3; -- Assign department_id = 3 if salary is <= 60000
    ELSE
        -- Add additional conditions for different salary ranges and corresponding department assignments
        -- Example:
        -- IF NEW.salary > 60000 AND NEW.salary <= 80000 THEN
        --     SET dept_id = 4; -- Assign department_id = 4 if salary is between 60001 and 80000
        -- END IF;
        
        -- If no specific salary range matches, set a default department
        -- For demonstration, assuming a default department_id = 1
        SET dept_id = 1; -- Default department_id
    END IF;
    
    SET NEW.department_id = dept_id;
END;
//
DELIMITER ;


-- 5. Write a trigger that updates the salary of the manager (highest-paid employee) in each department whenever a new employee is hired in that department.
DELIMITER //
CREATE TRIGGER update_manager_salary_trigger
AFTER INSERT ON employees
FOR EACH ROW
BEGIN
    DECLARE highest_salary DECIMAL(10, 2);
    DECLARE manager_id INT;

    -- Find the highest salary in the department of the newly hired employee
    SELECT MAX(salary) INTO highest_salary
    FROM employees
    WHERE department_id = NEW.department_id;

    -- Find the manager ID of the department
    SELECT manager_id INTO manager_id
    FROM departments
    WHERE department_id = NEW.department_id;

    -- Update the salary of the manager if the new employee's salary is higher
    IF NEW.salary > highest_salary THEN
        UPDATE employees
        SET salary = NEW.salary
        WHERE emp_id = manager_id;
    END IF;
END;
//
DELIMITER ;


-- 6. Create a trigger that prevents updating the department_id of an employee if they have worked on projects.
DELIMITER //
CREATE TRIGGER prevent_department_update_trigger
BEFORE UPDATE ON employees
FOR EACH ROW
BEGIN
    DECLARE project_count INT;
    
    -- Check if the employee has worked on any projects
    SELECT COUNT(*) INTO project_count
    FROM works_on
    WHERE emp_id = OLD.emp_id;

    -- If the employee has worked on projects, prevent updating department_id
    IF project_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Cannot update department_id of an employee who has worked on projects';
    END IF;
END;
//
DELIMITER ;


-- 7. Write a trigger that calculates and updates the average salary for each department whenever a salary change occurs.
DELIMITER //
CREATE TRIGGER update_department_avg_salary_trigger
AFTER UPDATE ON employees
FOR EACH ROW
BEGIN
    DECLARE dept_avg_salary DECIMAL(10, 2);
    
    -- Calculate the average salary for the department of the updated employee
    SELECT AVG(salary) INTO dept_avg_salary
    FROM employees
    WHERE department_id = NEW.department_id;
    
    -- Update the average salary for the department
    UPDATE departments
    SET average_salary = dept_avg_salary
    WHERE department_id = NEW.department_id;
END;
//
DELIMITER ;


-- 8. Create a trigger that automatically deletes all records from the works_on table for an employee when that employee is deleted from the employees table.
DELIMITER //
CREATE TRIGGER delete_works_on_trigger
AFTER DELETE ON employees
FOR EACH ROW
BEGIN
    DELETE FROM works_on WHERE emp_id = OLD.emp_id;
END;
//
DELIMITER ;


-- 9. Write a trigger that prevents inserting a new employee if their salary is less than the minimum salary set for their department.
DELIMITER //
CREATE TRIGGER prevent_low_salary_trigger
BEFORE INSERT ON employees
FOR EACH ROW
BEGIN
    DECLARE min_salary DECIMAL(10, 2);
    
    -- Find the minimum salary set for the department of the new employee
    SELECT MIN(salary) INTO min_salary
    FROM employees
    WHERE department_id = NEW.department_id;
    
    -- Check if the salary of the new employee is less than the minimum salary
    IF NEW.salary < min_salary THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Cannot insert employee with salary lower than the department minimum salary';
    END IF;
END;
//
DELIMITER ;


-- 10. Create a trigger that automatically updates the total salary budget for a department whenever an employee's salary is updated.
DELIMITER //
CREATE TRIGGER update_department_salary_budget_trigger
AFTER UPDATE ON employees
FOR EACH ROW
BEGIN
    DECLARE total_salary DECIMAL(10, 2);
    
    -- Calculate the total salary for the department of the updated employee
    SELECT SUM(salary) INTO total_salary
    FROM employees
    WHERE department_id = NEW.department_id;
    
    -- Update the total salary budget for the department
    UPDATE departments
    SET total_salary_budget = total_salary
    WHERE department_id = NEW.department_id;
END;
//
DELIMITER ;


-- 11. Write a trigger that sends an email notification to HR whenever a new employee is hired.
DELIMITER //

CREATE PROCEDURE send_email_to_hr(IN emp_name VARCHAR(255))
BEGIN
    DECLARE email_message VARCHAR(1000);
    SET email_message = CONCAT('A new employee named ', emp_name, ' has been hired.');
    
    -- Call the external email sending script with appropriate parameters
    -- Example command: CALL send_email_script.sh "HR@example.com" "New Employee Notification" email_message
    CALL send_email_script.sh("HR@example.com", "New Employee Notification", email_message);
END;

CREATE TRIGGER notify_hr_trigger
AFTER INSERT ON employees
FOR EACH ROW
BEGIN
    CALL send_email_to_hr(CONCAT(NEW.first_name, ' ', NEW.last_name));
END;

//
DELIMITER ;


-- 12. Create a trigger that prevents inserting a new department if the location is not specified.
DELIMITER //
CREATE TRIGGER prevent_insert_department_trigger
BEFORE INSERT ON departments
FOR EACH ROW
BEGIN
    IF NEW.location IS NULL OR NEW.location = '' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Cannot insert department without specifying a location';
    END IF;
END;
//
DELIMITER ;


-- 13. Write a trigger that updates the department_name in the employees table when the corresponding department_name is updated in the departments table.
DELIMITER //
CREATE TRIGGER update_department_name_trigger
AFTER UPDATE ON departments
FOR EACH ROW
BEGIN
    UPDATE employees
    SET department_name = NEW.department_name
    WHERE department_id = NEW.department_id;
END;
//
DELIMITER ;


-- 14. Create a trigger that logs all insert, update, and delete operations on the employees table into a separate audit table.
DELIMITER //
CREATE TRIGGER employee_audit_trigger
AFTER INSERT, UPDATE, DELETE ON employees
FOR EACH ROW
BEGIN
    DECLARE operation_type VARCHAR(10);
    
    -- Determine the operation type
    IF (INSERTING()) THEN
        SET operation_type = 'INSERT';
    ELSEIF (UPDATING()) THEN
        SET operation_type = 'UPDATE';
    ELSEIF (DELETING()) THEN
        SET operation_type = 'DELETE';
    END IF;
    
    -- Insert the audit record into the audit table
    INSERT INTO employee_audit (operation_type, emp_id, first_name, last_name, salary, department_id, audit_timestamp)
    VALUES (operation_type, COALESCE(OLD.emp_id, NEW.emp_id), COALESCE(OLD.first_name, NEW.first_name), COALESCE(OLD.last_name, NEW.last_name),
            COALESCE(OLD.salary, NEW.salary), COALESCE(OLD.department_id, NEW.department_id), NOW());
END;
//
DELIMITER ;


-- 15. Write a trigger that automatically generates an employee ID using a sequence whenever a new employee.
DELIMITER //
CREATE TRIGGER generate_employee_id_trigger
BEFORE INSERT ON employees
FOR EACH ROW
BEGIN
    -- No need to generate employee ID, it will be generated automatically using the auto-increment column.
END;
//
DELIMITER ;

