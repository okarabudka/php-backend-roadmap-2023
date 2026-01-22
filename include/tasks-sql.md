# SQL Tasks

#### Links

<hr />

- [Interactive SQL trainer - Stepik](https://stepik.org/course/63054/syllabus)
- [SQL reference - Stepik](https://stepik.org/media/attachments/course/63054/SQL.pdf)

<hr />

- [How to learn SQL in 2023](https://habr.com/ru/articles/725166/)
- [SQLZOO - SQL Tutorial](https://sqlzoo.net/wiki/SQL_Tutorial)

<hr />

- [https://habr.com/ru/companies/otus/articles/461067/](https://habr.com/ru/companies/otus/articles/461067/)
- [27 common SQL interview questions](https://tproger.ru/articles/sql-interview-questions/)
- [5 SQL tasks from real interviews](https://tproger.ru/articles/5-zadanij-po-sql-s-realnyh-sobesedovanij/)
- [Best mid-level SQL interview questions for data analysts](https://habr.com/ru/company/dcmiran/blog/500360/)

<hr />

- [SQL cheat sheet](https://habr.com/ru/post/564390/)
- [SQL CHEAT SHEET](https://www.sqltutorial.org/wp-content/uploads/2016/04/SQL-cheat-sheet.pdf)
- [SQL-Cheat-Sheet-Summary-Full](https://websitesetup.org/wp-content/uploads/2020/08/SQL-Cheat-Sheet-Summary-Full.png)
- [MySQL Cheat Sheet](https://overapi.com/mysql)

<hr />

### 1

Task: I want to store my library in a DB. I only care about book titles and authors. Propose a table structure.
Half of candidates do not know what many-to-many is and cannot decide whether to store author_id in books or book_id in
authors.
If the structure is OK, I ask for a list of books written by 3 co-authors. That is, a report "book - number of
co-authors" filtered to books with at least 3 co-authors.

```sql
CREATE TABLE book (
    book_id INT PRIMARY KEY AUTO_INCREMENT,
    book_name VARCHAR(255) DEFAULT NULL
);

CREATE TABLE author (
    author_id INT PRIMARY KEY AUTO_INCREMENT,
    author_name VARCHAR(255) DEFAULT NULL
);

CREATE TABLE book_author (
    id INT PRIMARY KEY AUTO_INCREMENT,
    book_id INT(11) NOT NULL,
    author_id INT(11) NOT NULL,
    FOREIGN KEY (book_id) REFERENCES book (book_id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (author_id) REFERENCES author (author_id) ON DELETE RESTRICT ON UPDATE CASCADE
);

INSERT INTO book (book_name)
VALUES('Book 1'),('Book 2'),('Book 3'),('Book 4'),('Book 5');

INSERT INTO author (author_name)
VALUES('Author 1'),('Author 2'),('Author 3'),('Author 4'),('Author 5');

SELECT book.book_name, COUNT(*) cnt
FROM book_author
JOIN book USING (book_id)
GROUP BY book_id
HAVING cnt >= 3;
```

### 2

What if we have a huge table and the query must run every 3 minutes? What can you do?

Quick ideas:
- caching
- database denormalization
- NoSQL

### 3

Task 1:
There is a table with 9 unique numbers from 1 to 10. Write a script that returns the missing number.
Hint: you can solve it by creating a table (what to create, with what data, and how to write the final select).

```sql
CREATE TABLE test (
  id INT NOT NULL PRIMARY KEY
);

INSERT INTO test (id) VALUES (1), (2), (3), (6), (8), (9), (12);

SELECT id1 AS 'FROM', id3 AS 'TO'
FROM (
  SELECT
    t1.id AS id1,
    t2.id AS id2,
    (
      SELECT id FROM test t3
      WHERE t3.id > t1.id
      ORDER BY id
      LIMIT 1
    ) AS id3 FROM test t1
  LEFT JOIN test t2 ON t2.id = t1.id + 1
) query_in
WHERE id1 IS NOT NULL AND id2 IS NULL AND id3 IS NOT NULL
```

### 5

We have a table employees (name_employee, department_id, salary)

1 query: list employees with the highest salary in their department.

```sql
SELECT name_employee
FROM employees
GROUP BY department_id
HAVING salary = MAX(salary);
```

2 query: list departments with at least 5 employees.

```sql
SELECT department_id
FROM employees
GROUP BY department_id
HAVING COUNT(name_employee) >= 5;
```

3 query: list duplicate salary values and their count.

```sql
SELECT salary,
COUNT(*) AS count
FROM employees
GROUP BY salary
HAVING COUNT(*) > 1
```

### 6

Two tables:

users (user_id, name)
orders (order_id, user_id, status)

- select all users from users whose ALL records in orders have status = 0

```sql
SELECT name
FROM users
INNER JOIN orders ON orders.user_id = users.user_id
WHERE status = 0;
```

- select all users from users with more than 5 records in orders with status = 1

```sql
SELECT name
FROM users
INNER JOIN oreders USING(user_id)
WHERE status = 1
GROUP BY order_id
HAVING COUNT(*) > 5;
```

### 7

There is a table one. Add table two with the same fields (id, name, seller, price). How?

```sql
INSERT INTO one(id, name, seller, price)
SELECT id, name, seller, price
FROM two;
```

### 8

There is a table books (id, publish_date, name, author, price)

Show the latest published book for each author

```sql
SELECT author,  MAX(publish_date)
FROM book
GROUP BY author;
```

### 9

What should the DB structure be? There is a list of books and a list of authors. A book can have multiple authors.

Answer: many-to-many table structure.
