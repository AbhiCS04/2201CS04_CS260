-- General Instructions
-- 1.	The .sql files are run automatically, so please ensure that there are no syntax errors in the file. If we are unable to run your file, you get an automatic reduction to 0 marks.
-- Comment in MYSQL 

-- VERSION: 8.0.36-0ubuntu0.22.04.1  [MySQL 8.0]  
-- 1. Create a procedure to calculate the average salary of employees in a given department.
DELIMITER //

CREATE PROCEDURE CalculateAverageSalary(IN department_id_param INT)
BEGIN
    DECLARE avg_salary DECIMAL(10, 2);

    SELECT AVG(salary) INTO avg_salary
    FROM employees
    WHERE department_id = department_id_param;

    SELECT avg_salary AS average_salary;
END //

DELIMITER ;
-- You can call this procedure by passing the department ID as an argument. For example:
CALL CalculateAverageSalary(1);


-- 2. Write a procedure to update the salary of an employee by a specified percentage.
DELIMITER //

CREATE PROCEDURE UpdateEmployeeSalaryByPercentage(
    IN emp_id_param INT,
    IN percentage DECIMAL(5, 2)
)
BEGIN
    DECLARE new_salary DECIMAL(10, 2);

    SELECT salary * (1 + percentage / 100) INTO new_salary
    FROM employees
    WHERE emp_id = emp_id_param;

    UPDATE employees
    SET salary = new_salary
    WHERE emp_id = emp_id_param;
END //

DELIMITER ;
-- You can call this procedure by passing the employee ID and the percentage as arguments. For example:
CALL UpdateEmployeeSalaryByPercentage(1, 10);


-- 3. Create a procedure to list all employees in a given department.
DELIMITER //

CREATE PROCEDURE ListEmployeesInDepartment(
    IN department_id_param INT
)
BEGIN
    SELECT *
    FROM employees
    WHERE department_id = department_id_param;
END //

DELIMITER ;
-- You can call this procedure by passing the department ID as an argument. For example:
CALL ListEmployeesInDepartment(1);


-- 4. Write a procedure to calculate the total budget allocated to a specific project.
DELIMITER //

CREATE PROCEDURE CalculateProjectTotalBudget(
    IN project_id_param INT
)
BEGIN
    DECLARE total_budget DECIMAL(15, 2);

    SELECT SUM(budget) INTO total_budget
    FROM projects
    WHERE project_id = project_id_param;

    SELECT total_budget AS total_budget_allocated;
END //

DELIMITER ;
-- You can call this procedure by passing the project ID as an argument. For example:
CALL CalculateProjectTotalBudget(101);


-- 5. Create a procedure to find the employee with the highest salary in a given department.
DELIMITER //

CREATE PROCEDURE FindEmployeeWithHighestSalaryInDepartment(
    IN department_id_param INT
)
BEGIN
    SELECT *
    FROM employees
    WHERE department_id = department_id_param
    ORDER BY salary DESC
    LIMIT 1;
END //

DELIMITER ;
-- You can call this procedure by passing the department ID as an argument. For example:
CALL FindEmployeeWithHighestSalaryInDepartment(1);


-- 6. Write a procedure to list all projects that are due to end within a specified number of days.
DELIMITER //

CREATE PROCEDURE ListProjectsDueWithinDays(
    IN num_days INT
)
BEGIN
    SELECT *
    FROM projects
    WHERE DATEDIFF(end_date, CURDATE()) <= num_days;
END //

DELIMITER ;
-- You can call this procedure by passing the number of days as an argument. For example:
CALL ListProjectsDueWithinDays(7);


-- 7. Create a procedure to calculate the total salary expenditure for a given department.
DELIMITER //

CREATE PROCEDURE CalculateTotalSalaryExpenditure(
    IN department_id_param INT
)
BEGIN
    DECLARE total_salary DECIMAL(15, 2);

    SELECT SUM(salary) INTO total_salary
    FROM employees
    WHERE department_id = department_id_param;

    SELECT total_salary AS total_salary_expenditure;
END //

DELIMITER ;
-- You can call this procedure by passing the department ID as an argument. For example:
CALL CalculateTotalSalaryExpenditure(1);


-- 8. Write a procedure to generate a report listing all employees along with their department and salary details.
DELIMITER //

CREATE PROCEDURE GenerateEmployeeReport()
BEGIN
    SELECT e.*, d.department_name
    FROM employees e
    JOIN departments d ON e.department_id = d.department_id;
END //

DELIMITER ;
-- You can call this procedure without any arguments. For example:
CALL GenerateEmployeeReport();


-- 9. Create a procedure to find the project with the highest budget.
DELIMITER //

CREATE PROCEDURE FindProjectWithHighestBudget()
BEGIN
    SELECT *
    FROM projects
    ORDER BY budget DESC
    LIMIT 1;
END //

DELIMITER ;
-- You can call this procedure without any arguments. For example:
CALL FindProjectWithHighestBudget();


-- 10. Write a procedure to calculate the average salary of employees across all departments.
DELIMITER //

CREATE PROCEDURE CalculateOverallAverageSalary()
BEGIN
    SELECT AVG(salary) AS average_salary
    FROM employees;
END //

DELIMITER ;
-- You can call this procedure without any arguments. For example:
CALL CalculateOverallAverageSalary();


-- 11. Create a procedure to assign a new manager to a department and update the manager_id in the departments table.
DELIMITER //

CREATE PROCEDURE AssignNewManager(
    IN department_id_param INT,
    IN new_manager_id_param INT
)
BEGIN
    UPDATE departments
    SET manager_id = new_manager_id_param
    WHERE department_id = department_id_param;
END //

DELIMITER ;
-- You can call this procedure by passing the department ID and the new manager's ID as arguments. For example:
CALL AssignNewManager(1, 5);


-- 12. Write a procedure to calculate the remaining budget for a specific project.
-- IMP... You need to have a table named expenses that stores the expenses incurred for each project.
-- The expenses table should have a column named amount_spent representing the amount spent for each expense, 
-- and a column named project_id representing the project to which the expense is related.

DELIMITER //

CREATE PROCEDURE CalculateRemainingBudget(
    IN project_id_param INT
)
BEGIN
    DECLARE remaining_budget DECIMAL(15, 2);

    SELECT budget - COALESCE(SUM(amount_spent), 0) INTO remaining_budget
    FROM projects
    LEFT JOIN expenses ON projects.project_id = expenses.project_id
    WHERE projects.project_id = project_id_param;

    SELECT remaining_budget AS remaining_budget;
END //

DELIMITER ;
-- You can call this procedure by passing the project ID as an argument. For example:
CALL CalculateRemainingBudget(101);


-- 13. Create a procedure to generate a report of employees who joined the company in a specific year.
-- IMP... You need to add a column in employee "join_date" so that It selects all columns from the employees 
-- table where the year extracted from the join_date column matches the provided parameter value.
DELIMITER //

CREATE PROCEDURE GenerateEmployeeJoinReport(
    IN join_year_param INT
)
BEGIN
    SELECT *
    FROM employees
    WHERE YEAR(join_date) = join_year_param;
END //

DELIMITER ;
-- You can call this procedure by passing the join year as an argument. For example:
CALL GenerateEmployeeJoinReport(2022);


-- 14. Write a procedure to update the end date of a project based on its start date and duration.
DELIMITER //

CREATE PROCEDURE UpdateProjectEndDate(
    IN project_id_param INT,
    IN duration_days INT
)
BEGIN
    DECLARE start_date DATE;
    DECLARE end_date DATE;

    SELECT start_date INTO start_date
    FROM projects
    WHERE project_id = project_id_param;

    SET end_date = DATE_ADD(start_date, INTERVAL duration_days DAY);

    UPDATE projects
    SET end_date = end_date
    WHERE project_id = project_id_param;
END //

DELIMITER ;
-- You can call this procedure by passing the project ID and the duration in days as arguments. For example:
CALL UpdateProjectEndDate(101, 180);


-- 15. Create a procedure to calculate the total number of employees in each department.
DELIMITER //

CREATE PROCEDURE CalculateEmployeeCountPerDepartment()
BEGIN
    SELECT department_id, COUNT(*) AS employee_count
    FROM employees
    GROUP BY department_id;
END //

DELIMITER ;
-- You can call this procedure without any arguments. For example:
CALL CalculateEmployeeCountPerDepartment();

