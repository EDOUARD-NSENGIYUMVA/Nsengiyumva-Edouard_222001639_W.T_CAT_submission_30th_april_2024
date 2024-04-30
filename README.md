
Employment Management System Documentation
The Employment Management System is a database-driven application designed to streamline human resource management processes within an organization. It manages information related to employers, employees, banks, departments, and insurance registrations.

Project Structure

 Database Schema

-Employer: Stores information about employers.
- Employee: Stores information about employees.
- Bank: Stores information about banks.
- Department: Stores information about departments.
- RegisterInsurance: Stores information about insurance registrations.
 Functionality 
- Add, update, and delete employers, employees, banks, departments, and insurance registrations.
- Search for specific information within each table.
- Establish relationships between employers, employees, departments, and insurance registrations.

Tables

1. Employer
   - employer_id: Unique identifier for employers.
   - Other attributes: Name, address, contact information, etc.

2. Employee
   - employee_id: Unique identifier for employees.
   -  attributes: Name, position, salary, department_id, etc.

3. Bank
 _  bank_id: Unique identifier for banks.
   - attributes: Name, address, contact information, etc.

4. Department
   - department_id: Unique identifier for departments.
   - attributes: Name, description, etc.

5. RegisterInsurance
   - insurance_id: Unique identifier for insurance registrations.
   - Other attributes: employee_id, insurance_type, start_date, end_date, etc.
 Usage
Database Setup

1. Create the required tables using the provided schema.
2. Populate the tables with initial data if necessary.

CRUD Operations

- Create: Insert new records into the tables.
- Read: Retrieve information from the tables.
- Update: Modify existing records in the tables.
- Delete: Remove records from the tables.

  user:edouardnsengiyumva51@gmail.com
  password:0780000120
