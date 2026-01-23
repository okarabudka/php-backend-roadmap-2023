# Databases

#### Links

- [Doctrine](https://ru.wikipedia.org/wiki/Doctrine)

<hr />

- [ACID](https://ru.wikipedia.org/wiki/ACID)
- [Race condition in web applications](https://habr.com/ru/post/460339/)
- [Transactions and auto-commit](https://www.php.net/manual/ru/pdo.transactions.php)

<hr />

- [Fixing the N+1 query problem without increasing memory usage in Laravel](https://habr.com/ru/post/508544/)
- [The N+1 query problem](https://habr.com/ru/company/otus/blog/529692/)

<hr />

- [Database normalization in simple terms](https://info-comp.ru/database-normalization)
- [First normal form (1NF) of a database](https://info-comp.ru/first-normal-form)
- [Second normal form (2NF) of a database](https://info-comp.ru/second-normal-form)
- [Third normal form (3NF) of a database](https://info-comp.ru/third-normal-form)

<hr />

- [Using indexes in MySQL](http://www.mysql.ru/docs/man/MySQL_indexes.html)
- [Indexes in MySQL](https://highload.today/indeksy-v-mysql/)
- [MySQL: what are indexes? How to create or drop an index?](https://pacificsky.ru/recepty/sql/mysql/163-mysql-chto-takoe-indeksy-kak-sozdat-ili-udalit-indeks.html)

<hr />

- [MySQL scaling strategies](http://www.phphighload.com/2012/10/mysql-scaling-strategies.html)
- [MySQL database replication](https://habr.com/ru/post/532216/)

<hr />

- [CAP theorem](https://ru.wikipedia.org/wiki/%D0%A2%D0%B5%D0%BE%D1%80%D0%B5%D0%BC%D0%B0_CAP)
- [CAP](https://www.bigdataschool.ru/wiki/cap)

<hr />

- [What is a document database?](https://wiki.merionet.ru/servernye-resheniya/100/chto-takoe-dokumentnaya-baza-dannyh/)
- [MySQL and MongoDB: when and what to use](https://habr.com/ru/post/322532/)

<hr />

- [What are time series databases?](https://wiki.merionet.ru/servernye-resheniya/110/chto-takoe-bazy-dannyh-vremennyh-ryadov/)

<hr />

- [Top 5 real-time databases](https://blog.back4app.com/ru/%D1%82%D0%BE%D0%BF-5-%D0%B1%D0%B0%D0%B7-%D0%B4%D0%B0%D0%BD%D0%BD%D1%8B%D1%85-%D1%80%D0%B5%D0%B0%D0%BB%D1%8C%D0%BD%D0%BE%D0%B3%D0%BE-%D0%B2%D1%80%D0%B5%D0%BC%D0%B5%D0%BD%D0%B8/)

<hr />

- [Cassandra](https://www.bigdataschool.ru/wiki/cassandra)
- [HBase](https://www.bigdataschool.ru/wiki/hbase)

<hr />

- [Understanding Redis](https://habr.com/ru/company/wunderfund/blog/685894/)
- [NoSQL: modeling a database with DynamoDB](https://highload.today/blogs/nosql-kak-modelirovat-bazu-dannyh-na-primere-dynamodb/)

<hr />

- [Oracle database: structure and core concepts](https://otus.ru/nest/post/1577/)

<hr />

- [What is a graph database?](https://wiki.merionet.ru/servernye-resheniya/101/chto-takoe-grafovaya-baza-dannyh/)
- [Graph database](https://ru.wikipedia.org/wiki/%D0%93%D1%80%D0%B0%D1%84%D0%BE%D0%B2%D0%B0%D1%8F_%D0%B1%D0%B0%D0%B7%D0%B0_%D0%B4%D0%B0%D0%BD%D0%BD%D1%8B%D1%85)
- [Neo4j: graph databases with simple queries](https://habr.com/ru/company/neoflex/blog/654267/)

<hr />

## ORM [&uarr;](#databases)

ORM (Object-Relational Mapping) is a general name for frameworks that automatically map a database to code. They try to
hide the database as much as possible and let developers work with data through a convenient interface.

### Doctrine [&uarr;](#databases)

Doctrine is an ORM for PHP 7.1+ built on top of the DBAL (database abstraction layer). One of its key features is
writing database queries in its object-oriented dialect called DQL (Doctrine Query Language), based on ideas from HQL
(Hibernate Query Language).

Doctrine ORM is used in frameworks such as Laravel, Yii, and Symfony.

Doctrine ORM provides powerful data retrieval tools: DQL, and a convenient Query Builder. They cover most needs, but
sometimes you must use SQL queries optimized for a specific DBMS. In those cases, it is important to understand how
Doctrine maps results.

Doctrine ORM is built on the Data Mapper pattern, which isolates the relational model from the object model and
converts data between them. A key component is ResultSetMapping, which defines how to transform a relational result set
into objects. Doctrine always uses ResultSetMapping, but it is usually generated from annotations or YAML/XML configs
and hidden from developers.

Doctrine has two QueryBuilders: SQL and ORM (DQL). ResultSetMapping is intended for SQL queries. The
EntityManager::createQueryBuilder method returns an ORM QueryBuilder. In the ORM case there is usually no need for
manual ResultSetMapping, since you already build queries in terms of mapped entities. With SQL QueryBuilder, selected
fields are not renamed automatically.

### ACID [&uarr;](#databases)

ACID requirements are a set of guarantees that keep your data safe:

- Atomicity
- Consistency
- Isolation
- Durability

#### Atomicity

Atomicity guarantees that each transaction is either fully completed or not executed at all. No intermediate states are
allowed.

#### Consistency

A transaction that completes successfully and commits its results keeps the database consistent. In other words, each
successful transaction commits only valid results.

This follows from atomicity: because a transaction has no intermediate results, the database stays consistent. Another
classic definition: a transaction is an ordered set of operations that moves the database from one consistent state to
another.

#### Isolation

While a transaction is executing, parallel transactions should not affect its result.

If the system has a single user, there are no issues. With multiple users, transactions run in parallel for speed.
That can cause anomalies:

1. Lost update
2. Dirty read
3. Non-repeatable read
4. Phantom reads

To prevent these, you isolate transactions. The main approaches are locks and versions.

- Locks: block data in the database. You can lock a row or a whole table, and lock for write or read.
- Versions: on each update, a new version is created while the old one remains. Versioning is hidden from the
  developer. Until the updating transaction commits, other readers see the old version and do not block.

#### Durability

If the user receives confirmation that a transaction is complete, the changes will not be lost even after a crash or
power failure.

### Race Conditions [&uarr;](#databases)

A race condition is a design error in a multi-threaded system where system behavior depends on the order in which code
runs. The term is common in engineering slang; in more formal contexts, it may be called nondeterminism.

A race condition is a "heisenbug" that appears at random times and disappears when you try to debug it.

Possible consequences:

- memory leaks
- segmentation faults
- data corruption
- vulnerabilities
- deadlocks
- leakage of other resources (for example, file descriptors)

This is primarily an architectural problem. With a good design, you can avoid many races.

How to deal with it:

- Use locks. The database blocks access to an object until it is unlocked. Other transactions wait. Use locks carefully.
- Use transaction isolation levels. Serializable transactions guarantee strict ordering, but can hurt performance.
- Use mutex semaphores. Use a coordinator (for example etcd). Create a record with a key before processing. If you
  cannot create it, the request is rejected. Remove the record after processing.

### Transactions [&uarr;](#databases)

If you have not worked with transactions before, they have four main properties: atomicity, consistency, isolation,
and durability (ACID).

In simple terms, any actions performed inside a transaction are safe for the database and are not affected by other
connections, even if the actions are performed in multiple steps.

Transactional operations can be rolled back on request (if the transaction is not yet committed), which simplifies
error handling in scripts.

Transactions work by temporarily storing changes and then applying them as a whole. This can significantly improve
performance and make scripts more reliable (if used correctly).

Not all databases support transactions.

You are not limited in the number of queries inside a transaction. You can run complex queries to extract data and
then use those results for updates. While a transaction is active, you can be sure no one else can modify the data you
are working with. See your database documentation for more details.

### N+1 Problem [&uarr;](#databases)

One of the main issues when building apps with an ORM is the N+1 query problem. It is an inefficient pattern where the
app generates a query for each object access. This typically happens when you load a list without lazy or eager loading.

The N+1 problem appears when a data access framework runs N additional SQL queries to fetch the same data that could be
retrieved with a single query.

The larger the N, the more queries are executed and the greater the performance impact. Slow query logs can help find
slow queries, but they do not always detect N+1 problems because each extra query is fast on its own.

The issue is the cumulative cost of many additional queries, which degrades performance.

Laravel with its Eloquent ORM provides convenient tools, but they have trade-offs.

- Eager loading: load related objects in a single query. In Laravel, use with().
- Eager loading of dynamic relationships.
- Lazy loading of dynamic relationships.

### Normalization [&uarr;](#databases)

Normalization is the process of removing redundant data.

Normalization is a database design method that brings a database to minimal redundancy.

Data redundancy means storing the same data in multiple places, which causes anomalies. Each entity should be stored
once, and referenced in other tables by a link.

Benefits of a normalized database:

- Easier queries. Data can be retrieved with relatively simple SQL.
- Data integrity. Less risk of loss or inconsistency.
- No redundancy. Less duplication reduces table size.
- Better long-term scalability.

To normalize a database, you should:

- Group data into logical sets.
- Find logical relationships between these sets. Related fields must be of the same type and tables must use InnoDB.

In general, normalization means designing tables according to a set of rules. If you satisfy all rules in a given set,
the database reaches a normal form.

A normal form is a set of rules and criteria that a database must satisfy.

There are three normal forms:

#### First normal form

To be in 1NF, tables must follow these principles:

- No duplicate rows.
- Each cell holds a single atomic value.
- Columns contain values of a single type.
- No arrays or lists in any form.

#### Second normal form

To be in 2NF, tables must satisfy:

- The table is in 1NF.
- The table has a key.
- All non-key columns depend on the entire key (if the key is composite).

A key is a column or set of columns that uniquely identifies each row.

#### Third normal form

Requires 2NF.

3NF requires that tables do not have transitive dependencies.

A transitive dependency means non-key columns depend on other non-key columns.

In 1NF, the focus is on relational principles. In 2NF, the focus is on the primary key. In 3NF, the focus is on columns
that are not part of the primary key.

To normalize to 3NF, ensure that non-key columns do not depend on other non-key columns. They should not play the role
of a key.

### Failure Modes [&uarr;](#databases)

- Read contention: multiple clients or processes read data from the same location at the same time, causing delays.
- Write contention: multiple clients or processes write to the same location at the same time, causing delays.
- Thundering herd: many clients access the same resource, causing resource exhaustion.
- Cascade: a failure in one part of the system triggers failures elsewhere.
- Deadlock: two or more transactions wait on each other to release locks.
- Corruption: data is corrupted, leading to errors when reading or writing.
- Hardware failure: disks or memory fail, causing loss or corruption.
- Software failure: DBMS or application failure leads to errors.
- Network failure: lost connection causes timeouts and errors.
- Denial of service (DoS) attack: a malicious actor overwhelms the database.

### Profiling [&uarr;](#databases)

There are several ways to profile database performance:

- Monitor system performance: use tools like Windows Task Manager or Linux top to see CPU, memory, and disk usage.
- Use database-specific tools: for example, SQL Server Management Studio (SSMS), sys.dm_os_wait_stats, Oracle Enterprise
  Manager, v$waitstat.
- Use third-party tools: SolarWinds Database Performance Analyzer, Quest Software Foglight, Redgate SQL Monitor, etc.
- Analyze slow queries: use EXPLAIN PLAN or SHOW PLAN, slow query logs, or SQL Server Profiler.
- Monitor application performance: Application Insights, New Relic, etc.

### Indexes [&uarr;](#databases)

#### Reading data from disk

A hard drive does not have a concept of a file. It has blocks. A file occupies multiple blocks. Each block knows which
block comes next. A file is split into chunks, and each chunk is stored in a free block.

![Screenshot from 2023-03-18 19-11-15.png](images%2FScreenshot%20from%202023-03-18%2019-11-15.png)

When reading a file, the system walks through all blocks and reconstructs the file. Blocks of one file can be scattered
across the disk (fragmentation). That slows reads because the head must jump between regions.

When searching inside a file, you must scan every block. If the file is large, the number of blocks is large. Jumping
between blocks in different locations slows data search.

#### Using indexes in MySQL

MySQL tables are essentially files.

There are two main problems when reading data:

- Slow reads because blocks are scattered across the disk (fragmentation).
- A large number of comparisons to find the right data.

Indexes speed up searches for rows with a given column value. Without an index, the engine scans from the first row
until it finds matching rows. The larger the table, the higher the overhead. With an index, MySQL can quickly find the
position in the data file without scanning everything.

For a table with 1000 rows, this is at least 100x faster than a full scan. However, if you need most rows, a full scan
can be faster because it avoids disk seeks.

All MySQL indexes (PRIMARY, UNIQUE, INDEX) are stored as B-trees. Rows are compressed with removal of leading and
trailing spaces.

Indexes are used to:

- Quickly find rows matching a WHERE condition.
- Retrieve rows from other tables during joins.
- Find MAX() or MIN() for an indexed column. The optimizer may replace the expression with a constant if all key parts
  are constrained.

```sql
SELECT MIN(key_part2), MAX(key_part2) FROM table_name WHERE key_part1 = 10
```

- Sort or group results if operations use the leftmost prefix of an index (ORDER BY key_part_1, key_part_2). If all
  key parts are DESC, the index is read in reverse order.
- Optimize queries to avoid reading data files. If all columns in a table are numeric and form the leftmost prefix of
  an index, values may be retrieved directly from the index tree.

```sql
SELECT key_part3 FROM table_name WHERE key_part1 = 1
```

Types of MySQL indexes:

- PRIMARY KEY: the main key with unique values. Only one per table, usually on an id column.
- UNIQUE: values must be unique and not NULL.
- Composite index: indexes multiple columns, often used when WHERE has more than one parameter.

1. Create an index:

```sql
ALTER TABLE `table_name` ADD INDEX `index_name` (`column_name`, `other_column`...)
```

Example: add an index on users.age named NEWINDEX.

```sql
ALTER TABLE `users` ADD INDEX `NEWINDEX` (`age`);
```

2. Create a unique index:

```sql
ALTER TABLE `table_name` ADD UNIQUE (`column_name`);
```

Example: add a unique index on users.age.

```sql
ALTER TABLE `users` ADD UNIQUE (`age`);
```

3. Create a composite index:

```sql
ALTER TABLE `table_name` ADD INDEX `index_name` (`column_name_n`, `column_name_n_plus_1`);
```

Example: add a composite index on users.lastname and users.age named TEST.

```sql
ALTER TABLE `users` ADD INDEX `TEST` (`lastname`, `age`);
```

4. Drop an index:

```sql
ALTER TABLE `table_name` DROP INDEX `index_name`;
```

Example: drop the age index from users.

```sql
ALTER TABLE `users` DROP INDEX `age`;
```

#### Using EXPLAIN to analyze indexes

EXPLAIN shows index usage for a query. For example:

```sql
EXPLAIN SELECT * FROM users WHERE email = 'test@gmail.com';
```

![Screenshot-2021-03-19-at-11.29.00-1000x108.png](images%2FScreenshot-2021-03-19-at-11.29.00-1000x108.png)

The key column shows the used index. The possible_keys column shows indexes that could be used. The rows column shows
how many records were read to execute the query (the table has 336 records).

In this example, no index is used. After creating an index:

```sql
EXPLAIN SELECT * FROM users WHERE email = 'test@gmail.com';
```

![Screenshot-2021-03-19-at-11.34.22-1000x92.png](images%2FScreenshot-2021-03-19-at-11.34.22-1000x92.png)

Only one row is read because the index is used.

#### Overhead

Indexes require extra disk writes. Every insert or update also updates the index.

Create only the necessary indexes to avoid wasting resources. Monitor index sizes:

```sql
SHOW TABLE STATUS;
```

#### When to create indexes?

- Create indexes after you discover slow queries. Use MySQL slow query log. Queries slower than 1 second are candidates.
- Start with the most frequent queries. A 1-second query executed 1000 times a day is worse than a 10-second query
  executed a few times.
- Do not create indexes on tables with only a few thousand rows. The benefit is minimal.
- Do not create indexes ahead of time in development. Indexes should match real production load patterns.
- Remove unused indexes.

Spend enough time analyzing and designing indexes in MySQL (and other databases). It can take longer than schema
planning. A test environment with real data helps validate index choices.

Do not add an index for every column in a query. MySQL does not work that way. Use unique indexes when needed.
Always define primary keys.

#### Drawbacks of indexes

If indexes improve query performance, why not index every column?

- Indexing creates additional tables with sorted data and consumes disk space.
- For some queries, indexes can increase execution time.
- INSERT is slower on tables with indexes.
- Indexes can hurt LIKE queries on indexed fields and provide no speedup.

### Replication [&uarr;](#databases)

Replication is the process of synchronizing multiple copies of an object. In this case, the object is a database
server, and the data is the most valuable part. If you maintain synchronized data across two or more servers, you have
replication. Even a manual mysqldump -> mysql load is replication.

Replication itself has no value without goals. It is a tool to solve problems:

- improved read performance: keep multiple copies and distribute reads.
- higher fault tolerance: remove the single point of failure; fail over to a replica.
- data distribution: global users (Sydney, Helsinki) should have low latency.
- load distribution: separate fast/light and slow/heavy queries across servers.
- testing new configurations: test DB versions, config changes, or storage engines.
- backups: make backup workflows more flexible with less impact on production.

#### How MySQL replicates data

Replication propagates changes from a primary server (master) to one or more replicas (slaves). There are more complex
setups, including multiple masters, but for each change from a given master, other masters effectively act as slaves.

In general, MySQL replication has three steps:

- The master writes data changes to a binary log (events).
- The slave copies those events into its relay log.
- The slave replays relay log events and applies them locally.

#### Types of replication

There are two main approaches: statement-based and row-based.

In statement-based replication, the master logs data-changing queries (INSERT, UPDATE, DELETE), and slaves execute the
same commands. In row-based replication, the log stores actual row changes, and those changes are applied on the slave.

Both have pros and cons. Statement-based replication is simpler and lighter on the master and network, but it can cause
unpredictable results with nondeterministic functions like NOW() or RAND(). It can also lead to master-slave
desynchronization. Row-based replication produces more predictable results but can increase load because every row
change must be logged and transferred.

MySQL supports both methods. The default has changed across versions. In modern MySQL (for example 8), row-based
replication is the default.

A second axis is the number of masters. With a single master, only that server accepts writes and acts as the source
for replicas. With master-master replication, you can accept writes in multiple locations (for example in Sydney and
Helsinki), but conflicts arise if both clients modify the same data. Which transaction wins, and which is rolled back?

Master-master replication does not increase write throughput in general. If a master handles 1000 requests per unit of
time, adding a second master does not double capacity, because each master must also apply changes from the other.
With statement-based replication, the total capacity is limited by the slowest master. With row-based replication, the
effect can be positive or negative depending on workload.

### Partitioning [&uarr;](#databases)

Some tables can be grouped logically, for example purchase logs by date. If most queries work with groups (for example
statistics for a year), it makes sense to store data as partitions. The process of splitting data into groups and
storing them as partitions is called partitioning.

Example table:

```sql
    CREATE TABLE employees (
        id INT NOT NULL,
        fname VARCHAR(30),
        lname VARCHAR(30),
        hired DATE NOT NULL DEFAULT '1970-01-01',
        separated DATE NOT NULL DEFAULT '9999-12-31',
        job_code INT NOT NULL,
        store_id INT NOT NULL
    )
```

Four partitioning types:

1. Range

Each partition contains data within a value range.

```sql
    PARTITION BY RANGE (store_id) (
        PARTITION p0 VALUES LESS THAN (6),
        PARTITION p1 VALUES LESS THAN (11),
        PARTITION p2 VALUES LESS THAN (16),
        PARTITION p3 VALUES LESS THAN (21)
    );
```

Partition p0 will contain rows where store_id < 6.

2. List

Each partition contains rows with specific values.

```sql
    PARTITION BY LIST(store_id) (
        PARTITION pNorth VALUES IN (3,5,6,9,17),
        PARTITION pEast VALUES IN (1,2,10,11,19,20),
        PARTITION pWest VALUES IN (4,12,13,14,18),
        PARTITION pCentral VALUES IN (7,8,15,16)
    );
```

Partition pNorth will contain rows where store_id is 3, 5, 6, 9, or 17.

3. Hash

The table is partitioned by hashing a column value.

4. Key

Similar to hash, but based on a key.

The last two methods do not let you choose a specific partition for a row; you only specify the number of partitions
and MySQL handles distribution.

Partitions can be split into sub-partitions, which can be further partitioned.

When writing queries, you do not need to know where data is stored. You just query the table (employees) and MySQL
chooses the relevant partitions.

In practice, partitions are used rarely because indexes are usually enough, but it is useful to know they exist.

### Sharding [&uarr;](#databases)

Sharding is an evolution of partitioning: split data into groups and store each group on a separate server (shard).
A shard can include multiple tables that belong together. For example, with many registered users whose data is stored
in multiple tables (registration, purchase history, activity log), each shard holds the full schema but only a subset
of users (for example, last names A-D, then D-K, etc.).

MySQL does not support automatic sharding, so it must be handled at the application level by routing each request to a
specific server. Typically you create a parameterized pool of servers (for example, first letter of last name) and
select the server for each request based on that parameter.

Sharding is a last-resort scaling technique (when replication is not enough). It is complex to implement and makes
working with data harder. Because sharding happens at the application layer, you lose triggers, stored procedures, and
other database features that require a global view of data. Each shard only knows its own data.

Before adopting MySQL sharding, think carefully and be sure there is no other option.

### CAP Theorem [&uarr;](#databases)

The CAP theorem (also known as Brewer's theorem) states that in any distributed system you can guarantee only two of
three properties at the same time:

- consistency: data in all nodes is the same at a given time;
- availability: every request receives a response, but responses across nodes may not match;
- partition tolerance: the system continues to operate despite network partitions.

CAP is an acronym for Consistency, Availability, and Partition tolerance. According to Eric Brewer (UC Berkeley, 2000),
distributed systems can only provide two of the three properties. Non-relational databases are often said to sacrifice
consistency in favor of availability and partition tolerance.

NoSQL classes under CAP and their relevance to Big Data:

- CA (Availability + Consistency - Partition tolerance): data is consistent and available but not tolerant to
  partitions. These systems can exist only with strict ACID guarantees and highly reliable networks. In practice, this
  is rare. Classic examples include LDAP directory services and relational databases (PostgreSQL, MySQL, MariaDB,
  MS SQL Server).
- CP (Consistency + Partition tolerance - Availability): ensures consistency and partition tolerance, sacrificing
  availability. It uses distributed pessimistic locks and requires synchronous replication of changes. It behaves like
  multiple synchronized masters. It reads consistently even if a node fails, but writes may stall until consistency is
  restored. Examples: Apache HBase, MongoDB, Redis, MemcacheDB, Berkeley DB, Hypertable, Google Bigtable.
- AP (Availability + Partition tolerance - Consistency): ensures availability and partition tolerance but not strict
  consistency (eventual consistency). An AP system can accept writes on any node without immediately propagating them.
  It handles node failures well, but may return stale data when nodes recover. Examples: CouchDB, Cassandra, Riak,
  Amazon DynamoDB.

![cap_1.png](images%2Fcap_1.png)

==============================================================================================================================
==============================================================================================================================
# NoSQL Databases [&uarr;](#databases)

NoSQL databases are designed for specific data models and use flexible schemas, which makes it easier to build modern
applications. They became popular because of simpler development, functionality, and performance at any scale.

These databases are optimized for applications that work with large volumes of data, need low latency, and use flexible
models. This is achieved by relaxing strict consistency requirements that are typical for other database types.

Consider a simple book database model:

- In a relational database, a book record is often split into multiple parts (normalized) and stored in separate
  tables with relationships defined by primary and foreign keys. For example, the Books table may have ISBN, Title, and
  Edition Number, the Authors table has Author ID and Author Name, and the Author-ISBN table has Author and ISBN.
  This model preserves referential integrity. Data is normalized to reduce redundancy and optimized for storage.
- In a NoSQL database, a book record is typically stored as a JSON document. For each book, values like ISBN, title,
  edition number, author name, and author ID are stored as attributes in a single document. This model is optimized for
  intuitive development and horizontal scalability.

NoSQL databases are a good fit for many modern applications, such as mobile, gaming, and web apps, where flexible
scalable databases with high performance and rich functionality are required.

- Flexibility. NoSQL databases usually provide flexible schemas, which speeds up development and supports incremental
  delivery. Flexible data models fit semi-structured and unstructured data well.
- Scalability. NoSQL databases scale using distributed hardware clusters instead of expensive, highly reliable servers.
  Some cloud providers handle this automatically as a managed service.
- High performance. NoSQL databases are optimized for specific data models and access patterns, often outperforming
  relational databases for those workloads.
- Rich functionality. NoSQL databases provide APIs and data types designed for their specific models.

## Document DBs [&uarr;](#databases)

A document (document-oriented) database is a non-relational DBMS that stores data not in rows and columns, but as JSON
documents. JSON is the native format used for storage and queries. Documents can be grouped into collections.

Each document consists of key-value pairs. Example:

    {
        "ID" : "001",
        "Book" : "Java: The Complete Reference",
        "Genre" : "Reference work",
        "Author" : "Herbert Schildt",
    }

JSON allows developers to store and query data in the same model they use in application code. The object model can be
serialized into JSON, BSON, or XML.

#### Relational vs document databases

Relational database management systems (RDBMS) are based on SQL. Non-relational databases do not require SQL.

RDBMS builds relationships between tables for storage and reading. Document databases focus on the data itself, and
relationships are represented as nested data.

Key comparison:

![Screenshot from 2023-03-19 14-30-12.png](images%2FScreenshot%20from%202023-03-19%2014-30-12.png)

#### Document database characteristics

Document databases provide fast queries, a structure well-suited for big data, flexible indexing, and simpler
maintenance. They are efficient for web apps and were fully adopted by large IT companies such as Amazon.

Although SQL databases offer strong stability and a vertical structure, they tend to be heavy. When instant access is
required (for example, medical apps), document databases are often a better choice. You can query data in the same
document model as your app code.

Examples of document database use cases:

`Book database`

Both relational and non-relational DBMS can model a book database, but in different ways.

In an RDBMS, relationships between books and authors are expressed via tables with ID keys: Author and Books. This model
allows no empty values, so each Author must have at least one Books record.

In the document model, you can embed data. It is simpler and more natural: each author document can have a Books
property with an array of related book documents. When you query by author, you get the whole collection of books.

`Content management`

Developers use document databases for blogs, video streaming platforms, and similar services. Each file is stored as a
separate document, and as the service grows, the database is easier to maintain. Significant data changes (like schema
changes) do not require downtime because no schema migration is needed.

`Catalogs`

For catalog file storage and reading, document databases are far more efficient than RDBMS. Catalogs may contain
thousands of attributes, and a document DB can fetch them quickly. In document databases, attributes of one product are
stored in a single document. Updating attributes for one product does not affect other documents.

#### Pros and cons of document databases

Pros:

- No schema. There are no strict format restrictions. This is great for large volumes and evolving data structures.
- Fast creation and maintenance. Once a document is created, it requires minimal upkeep.
- No foreign keys. Without cross-table constraints, documents remain independent.
- Open formats. Documents are described using XML, JSON, and similar formats.
- Built-in versioning. As documents grow, versioning helps reduce conflicts.

Cons:

- Consistency checks are limited. In the book database example, you can query books by a non-existent author. When
  querying book collections, you can find documents not linked to author collections. Author data can also be duplicated
  in multiple documents. For stricter consistency requirements, such inconsistency can hurt performance.
- Atomicity issues. Relational systems can update data in one place without JOINs. Document databases often require two
  separate requests when a change affects two collections, which breaks atomicity guarantees.
- Security. Many modern web apps leak sensitive data. Owners of non-relational databases must pay close attention to
  application vulnerabilities.

#### How to choose?

- Do you read more or write more? If you write more, relational systems can reduce duplication during updates.
- How important is synchronization? ACID standards give relational systems an advantage.
- How likely is your schema to change? Document DBs are a safe choice when you deal with varied data at scale and want
  minimal maintenance.

### MongoDB [&uarr;](#databases)

Features:

- Cross-platform. Written in C++, so it runs on Windows, Linux, macOS, and others.
- Data format. Uses its own Binary JavaScript Object Notation (BSON) format.
- Documents. Instead of rows, MongoDB uses documents with keys and values.
- Collections instead of tables. Each collection can store different sets of data.
- Replication. Storage is represented by nodes. There is one primary and many secondaries. Data is replicated between
  nodes. If the primary fails, a secondary becomes primary.
- Indexing. Indexes can be created on any document field. Indexed data is processed faster.
- Large data storage uses GridFS, which splits files into chunks. One collection stores file metadata, the other stores
  chunks up to 256 KB.
- Query support. Users can run range queries and get results quickly.
- Load balancing is used not only for distributing load across databases but also for horizontal scaling. DB segments
  are distributed across nodes, improving performance while keeping data synchronized.
- MongoDB can be delivered to end users as a cloud solution.

How it is used:

- MongoDB is used for system event storage (logging), sensor monitoring data, e-commerce, and mobile apps. It is often
  used in machine learning and AI storage.
- Forbes reduced build time by 58% and increased subscriptions by 28% by creating new features faster, enabling easier
  joins, and handling diverse data types more efficiently.
- Toyota found it easier to work with document DBs at high speed because of native JSON documents. More time went to
  business value instead of data modeling.

### CouchDB [&uarr;](#databases)

CouchDB is an open-source document database that uses key-value maps to store document fields.

Features:

- JSON is the storage unit.
- No field-level mapping, but validator functions are available.
- Queries and indexes are provided via map views.
- Partitioned databases with custom partitioning rules are supported.
- Automatic sharding can be used.
- Automatic background indexing keeps secondary indexes current.
- Browser-based UI.
- Simple replication.
- User authentication.
- ACID properties (Atomicity, Consistency, Isolation, Durability).

How it is used:

- Meebo (social network) used CouchDB for its web interface and apps.
- The BBC chose CouchDB for dynamic content platforms.

## Time Series [&uarr;](#databases)

As the name suggests, time series databases store data that changes over time. This can be any data collected over time,
including metrics from various systems. Trend systems are typical time series data sources.

Time series are not limited to database metrics. Metrics can be anything: the flow of people through a mall over time,
traffic in a city, public transport usage during the day, river flow, energy production at a hydropower station. All of
these are time series. You can query and analyze them to find correlations between metrics.

#### Data structure in time series databases

There are two main storage approaches. The first is similar to a key-value store:

![img.png](images%2Fimg.png)

In simple terms, each timestamp has a metric value.

The second approach stores more metrics together. Instead of storing each metric in a separate table or collection,
they are stored together.

![img_1.png](images%2Fimg_1.png)

This structure links metrics together and makes queries more efficient. Instead of reading multiple tables and joining
results, you can read a single table to prepare data for processing and presentation.

You might wonder what is new here. How is this different from a regular MySQL table or any other relational database?
The table structure looks similar, but the workload differs significantly. Performance can improve when the storage is
optimized for this type of data.

Time series usually only grow. You rarely update old data. Rows are usually not deleted, but you may need to aggregate
metrics over time. If you consider this in storage design, it differs from standard transactional databases. The key
requirement is the ability to append large volumes of data sequentially over time.

You can use an RDBMS for time series storage, but it is not optimized for it. Data and indexes can grow too large and
queries become slow. Storage engines are designed for mixed data types and transactional workloads, which involve
frequent updates and deletes. Relational databases often lack specialized time series functions.

### InfluxDB [&uarr;](#databases)

InfluxDB was developed by InfluxData. It is an open-source time series database written in Go. It provides an SQL-like
query language, which makes integration easy. InfluxDB can also be part of a commercial stack that covers the entire
time series pipeline in a high-availability environment.

### TimeScale [&uarr;](#databases)

TimeScale is a time series database built on PostgreSQL. It is a PostgreSQL extension that uses the native storage
engine, so it supports all SQL variants available in PostgreSQL. Because it is an extension, it uses PostgreSQL
features. You can combine time series with other data types, join time series with metadata, and use JOINs with non-time
series tables. PostgreSQL TimeScale also supports geospatial data to track locations over time, and it supports all
PostgreSQL scaling features, including replication.

## Real-time [&uarr;](#databases)

A real-time database is a database system that uses real-time processing to manage workloads with frequent state
changes. It differs from traditional databases that work with relatively static data. Real-time databases are used in
applications that require instant updates based on changes and tracking.

This type of database is a key factor for instant decision making. One key feature is real-time processing, which helps
process transactions or changes with minimal delay. These databases are used in many industries, including law,
accounting, healthcare, banking, booking systems, multimedia, and analytics.

A real-time database is essentially a regular database with the added ability to produce responses in real time. It
uses time constraints to represent specific ranges of values covered by the provided data. A traditional database
cannot operate well when there are large gaps between real-world objects and their data representation.

A real-time database is useful for managing time-sensitive requests, returning accurate time-based data, and helping
with priority planning.

#### Benefits of real-time databases

- Real-time updates. Data can be synchronized on every change, while traditional interfaces update only on request.
  Changes appear in real time on any device that accesses the data.
- Offline sync. Offline synchronization is a key advantage. Features like local disk persistence help, and when the
  server reconnects, changes are synced with the current server state.
- Data partitioning and scaling. Real-time databases allow users to distribute data across multiple databases within a
  project and set shards for each instance.
- Multi-device access. Real-time databases allow access from multiple devices and interfaces, including mobile and web.
- Affordable options. Many companies offer pricing options based on the number of connections and the volume of stored
  or downloaded data.

### Firebase [&uarr;](#databases)

Common features:

- Real-time operation
- NoSQL
- Scalability
- REST API

Pricing:

- Closed-source project
- Free tier available
- Usage-based pricing

#### Firebase - Cloud Firestore

Firebase Cloud Firestore is a NoSQL cloud database used to store and sync data for client and server development. It is
used for web, server, and mobile apps and enables real-time sync between applications.

Firestore integrates with Firebase and Google Cloud, and its SDKs support web and mobile apps. It supports Java, Go,
Unity, C++, and more. Node.js SDKs support RPC and REST APIs. Firestore provides high performance, automatic scaling,
 ease of use, and strong reliability.

Firestore-specific features:

- Multi-region support

#### Firebase - The Realtime Database

Firebase is a popular backend company that provides ready-made backend features and APIs. Its NoSQL database uses a JSON
 document protocol for storage. Firebase became popular because it reduces server management and API development
requirements and offers many configuration options.

The Firebase Realtime Database is a NoSQL cloud database that enables efficient real-time synchronization and storage.
It also works offline. Stored JSON data can be synchronized across clients.

Realtime Database-specific features:

- Real-time JSON sync
- Offline support

## Column DB [&uarr;](#databases)

A column database groups data by columns instead of rows. Adjacent values are from the same column across different
rows, not from different columns of the same row.

Like row-based DBMS, column DBs can use SQL.

Example table:

![img_2.png](images%2Fimg_2.png)

In a row-based database, this table is stored as:

    001, Vladimir, Ivanov, 34, 15 000
    002, Dmitry, Sidorov, 56, 21 000
    003, Aleksandr, Petrov, 43, 19 000

In a column database, the same data is stored as:

    001, 002, 003
    Vladimir, Dmitry, Aleksandr
    Uvanov, Sidorov, Petrov
    36, 54, 43
    15 000, 21 000, 19 000

A key property of column DBs is high speed and flexibility for complex queries. In row-based DBs, queries scan rows and
columns, and entire rows are extracted even if you need only one value. Column databases allow you to scan specific
columns and read only required values.

This makes column DBs especially promising for OLAP systems and big data. Column databases can be compressed more than
row-based databases, which saves disk space.

Column DBs emerged alongside row-based DBs. The first commercial column DB was TAXIR (1969), focused on biological data
storage and search.

### Cassandra [&uarr;](#databases)

Apache Cassandra is a non-relational, fault-tolerant distributed DBMS designed for highly scalable, reliable storage of
massive data sets. It was developed in Java at Facebook in 2008 and donated to the Apache Software Foundation in 2009.
It is a hybrid NoSQL solution that combines a column-family model with key-value concepts.

The Cassandra data model includes:

- column: a data cell with name (bytes), timestamp, and value (bytes). The timestamp is user-defined and resolves write
  conflicts: the larger value is the newer column. This matters when deleting old columns.
- row: a named collection of columns.
- column family: a named collection of rows.
- keyspace: a group of column families, providing isolation and logical grouping.

Cassandra provides:

- transparent data distribution across cluster nodes: any server can accept any request and forward it to the correct
  node if needed.
- configurable replication factor.
- configurable consistency level per operation.
- high write speed (around 80-360 MB/s per node). Data is written faster than it is read because most is kept in
  memory. Updates are applied in memory first, then flushed to disk. To avoid data loss, transactions are logged to a
  commit log on disk. Unlike updates, commit logs are append-only, which avoids disk rotation delays. If full
  consistency is not required, Cassandra writes to enough nodes without resolving conflicts, which are handled on first
  read.
- flexible scalability. Clusters can scale to hundreds of nodes and petabytes of data.

Because there is no central node, Cassandra avoids the main master/slave failure mode. All nodes are equal, and if one
fails, others take over. This decentralization makes Cassandra suitable for geo-distributed, highly available systems
across data centers. However, this architecture impacts read/write patterns and introduces limitations in real Big Data
projects.

![kas3.png](images%2F%D0%BA%D0%B0%D1%813.png)

### HBase [&uarr;](#databases)

Apache HBase is an open-source, non-relational distributed database written in Java, modeled after Google BigTable.

The HBase data model differs from classic relational DBMS. It is key-value based:

- data is organized into tables indexed by a RowKey.
- each RowKey can have an unlimited number of attributes (columns).
- columns are grouped into column families. Families group columns with similar access patterns. The list and names of
  families are fixed. At the family level, you define TTL and max versions.
- each attribute can have multiple versions, each with a different timestamp.
- rows are stored sorted by RowKey. Data from different columns is stored separately, so you can read only a needed
  column family and speed up reads.
- attributes in one column family for a given key are stored as a sorted list. An attribute can be missing with no
  storage overhead.
- if the difference between the version timestamp and the current time exceeds TTL, the record is marked for deletion.
  If the number of versions exceeds the limit, older versions are removed.

![hbase_1.png](images%2Fhbase_1.png)

High availability and fault tolerance are achieved via:

- multiple HMaster and ZooKeeper instances.
- data distribution across nodes so one node failure does not reduce availability.
- HFile format stored in HDFS can be read and written by many tools in the Apache Big Data stack (Hive, Pig, MapReduce,
  Tez), enabling near real-time analytics without copying data.

## Key-Value [&uarr;](#databases)

A key-value database is a non-relational database type where data is stored as key-value pairs. The key is a unique
identifier. Keys and values can be simple or complex objects. Key-value databases support high partitioning and provide
unmatched horizontal scalability compared to other database types.

The diagram below shows key-value data in DynamoDB.

![PartitionKey.8dd0530a7f6d66d101f31de30db515564f4cf28a.png](images%2FPartitionKey.8dd0530a7f6d66d101f31de30db515564f4cf28a.png)

#### Use cases

`Session store`

A session-based app (for example, a web app) starts a session when a user signs in. It remains active until the user
signs out or the session expires. During that period the app stores session data in memory or in a database. Session
data can include profile info, messages, personalization data, targeted campaigns, and discounts. Each session has a
unique ID. Sessions are always fetched by the primary key, so a fast key-value store is a perfect fit. In general,
key-value databases reduce per-page overhead compared to relational databases.

`Shopping cart`

During holiday sales, an e-commerce site can receive billions of orders in seconds. Key-value databases can scale to
handle large volumes of data and rapid state changes. They enable serving millions of users via distributed processing
and storage. Key-value databases also include built-in redundancy, which helps survive storage node loss.

### Redis [&uarr;](#databases)

Redis (Remote Dictionary Service) is an open-source key-value database server.

Redis is an in-memory database used mostly as a cache in front of a "real" database like MySQL or PostgreSQL. A Redis
cache improves application performance. It leverages memory speed and reduces load on the primary database for data
such as:

- Data that rarely changes but is frequently accessed.
- Non-critical data that changes often.

Examples include session caches, data caches, and admin dashboards such as leaderboards or reports that aggregate data
from multiple sources.

The traditional Redis flow looks like this: the client requests data from the app, and the app retrieves it. First, the
app checks the Redis cache (main). If the data is present, it is returned immediately. If it is a cache miss, the system
reads from persistent storage (for example MySQL). That data is then loaded into the cache so the app can use it.

![68f25fd1cedc89b95d18190a3e0a89bd.jpeg](images%2F68f25fd1cedc89b95d18190a3e0a89bd.jpeg)

In many cases Redis provides enough durability to serve as the primary database. Adding Redis plugins and high
availability configurations makes it attractive for certain workloads.

Another key feature of Redis is that it blurs the line between cache and storage. Reading and working with in-memory
data is much faster than the same operations on traditional DBMS using HDDs or SSDs.

Originally Redis was most often compared to Memcached, which at the time had no persistent storage.

### DynamoDB [&uarr;](#databases)

DynamoDB is a NoSQL key-value database offered by Amazon as part of AWS.

It is available only as a managed service in the public AWS cloud. Unlike many AWS services, it lets customers pay for
required throughput rather than storage capacity. DynamoDB automatically distributes data and traffic across a suitable
number of SSD-backed servers to provide the requested performance. It can integrate with Hadoop via Elastic MapReduce.

The database is split into partitions (nodes). Each node is a 200 GB SSD. There are many nodes, and data is distributed
across them. DynamoDB offers several advantages:

- throughput up to 7 million transactions per second (under ideal conditions)
- eventual consistency around 10 ms (under ideal data organization)
- automatic data replication
- automatic database scaling

DynamoDB uses an optimized scheme for peak loads. In SQL models, you must provision capacity for peak load, even if it
is unused. DynamoDB scales along the actual load curve, which saves resources and reduces cost.

The DynamoDB process is simple: data is hashed and partitioned into cells. This happens in constant time. On each
request, the key is hashed to locate the correct partition.

## Graph DBs [&uarr;](#databases)

Graph databases are non-relational (NoSQL) systems that model correlations between complex, interconnected entities.
They focus on relationships rather than just data, which helps avoid relational limitations.

A graph database defines relationships cleanly and can answer complex questions about how data points relate to each
other.

A graph database is a non-relational DB type based on network topology, inspired by graph theory. Graphs represent data
as nodes, edges, and properties.

- Nodes are data entities. They can be any objects you track, such as people, customers, or departments.
- Edges are the core concept of graph DBs. They represent relationships between nodes. These links have direction and
  can be one-way or two-way.
- Properties are descriptive information attached to nodes (and sometimes edges).

![1.png](images%2F1.png)

Nodes with descriptive properties form relationships represented by edges.

Graph DBs provide a conceptual model closely aligned with the real world. Modeling complex relationships is easier
because relationships get the same attention as the data itself.

#### Graph vs relational databases

Graph DBs were not created to replace relational databases. RDBMS are still the industry standard. It is important to
understand what each model offers.

Relational databases provide a structured approach to data. Graph databases are more flexible and oriented toward fast
understanding of relationships.

![2.png](images%2F2.png)

Graph and relational DBs have different use cases. Complex relationships are better handled in graph DBs because their
capabilities exceed traditional RDBMS. Modeling data in MySQL or PostgreSQL requires careful planning, while graph DBs
use a more natural and flexible approach.

Key differences:

![Screenshot from 2023-03-19 14-02-32.png](images%2FScreenshot%20from%202023-03-19%2014-02-32.png)

#### How graph databases work

Graph databases treat data and relationships as first-class. Related nodes are physically connected, and the
relationship is stored as part of the data.

You can query relationships just like data. Instead of computing joins, graph DBs read relationships directly from
storage.

In flexibility, performance, and adaptability, graph DBs are close to other non-relational models. Like other NoSQL
DBs, they often have no fixed schema, making them easy to evolve.

#### Graph database use cases

- Real-time recommendations. Dynamic product recommendations improve UX and maximize revenue. Examples include Netflix,
  eBay, and Walmart.
- Master data management. A single source of truth improves data consistency. This is critical for large enterprises.
- GDPR and compliance. Graphs make it easier to manage security and trace data movement. Databases reduce leakage risk
  and improve deletion consistency.
- Digital asset management. Large volumes of digital content require scalable models to track documents, contracts,
  calculations, etc.
- Context-aware services. Graphs help deliver context-sensitive services such as disaster alerts, traffic data, or
  location-based recommendations.
- Fraud detection. Suspicious patterns and fraudulent schemes can be detected in real time by isolating graph parts.
- Semantic search. NLP is ambiguous; semantic search helps interpret keywords and returns better results, which graphs
  can represent well.
- Network management. Networks are graphs. Graph DBs reduce the time to notify admins about network issues.
- Routing. Information flows through networks by finding optimal paths, which makes graph DBs ideal for routing.

#### Pros and cons of graph databases

Pros:

- Flexible and adaptive structure
- Clear representation of relationships
- Real-time query results (speed depends on number of relationships)

Cons:

- No standardized query language; it depends on the platform.
- Graphs are not a good fit for transaction-heavy systems.
- Small user base; support can be harder to find.

### JanusGraph [&uarr;](#databases)

JanusGraph is a distributed, scalable open-source graph DB with strong integration and big data analytics. Key
features:

- ACID transactions with thousands of concurrent users
- Multiple storage backends, including Cassandra and HBase
- Built-in advanced search, with optional Elasticsearch support
- Full Apache Spark integration for analytics
- A Turing-complete query language for graph traversal

### Neo4j [&uarr;](#databases)

Neo4j (Network Exploration and Optimization for Java) is a graph database written in Java with native graph storage and
processing. Key capabilities:

- Scalability via partitioning data into segments
- High availability through continuous backups and rolling upgrades
- Strong security: multiple database instances can be isolated on one dedicated server
- Cypher query language designed for graph development

### DGraph [&uarr;](#databases)

DGraph (Distributed graph) is a distributed, open-source graph database with strong scalability. Highlights:

- Horizontal scalability with ACID transactions
- Open-source system supporting many open standards
- GraphQL query language designed for APIs

### DataStax Enterprise Graph [&uarr;](#databases)

DataStax Enterprise Graph is a distributed graph DB built on Cassandra, optimized for enterprise use. Features:

- Constant availability for enterprise workloads
- Easy integration with standalone Apache Spark
- Full integration of real-time analytics and search
- Multi-datacenter scalability
- Gremlin and CQL query support

==============================================================================================================================
==============================================================================================================================

# Relational Databases [&uarr;](#databases)

A relational database is a set of data with predefined relationships. Data is organized as tables of rows and columns.
Tables store information about objects represented in the database. Each column stores a specific data type, each cell
stores an attribute value. Each row is a set of related values for a single object or entity. Each row has a unique
identifier called a primary key, and rows from different tables can be linked by foreign keys. Data can be accessed in
many ways, and the tables do not need to be reorganized.

Key aspects of relational databases:

- SQL (Structured Query Language). The main interface for relational databases. SQL became an ANSI standard in 1986.
  ANSI SQL is supported by all popular relational engines, and many add extensions. SQL is used to insert, update,
  delete, query, and manage all aspects of a database.
- Data integrity. This means completeness, accuracy, and consistency of data. It is enforced with primary keys, foreign
  keys, and constraints like NOT NULL, UNIQUE, DEFAULT, and CHECK. Many engines also support user-defined code that
  runs in response to DB operations.
- Transactions. A transaction is one or more SQL statements executed as a single logical unit. It is atomic: it either
  fully succeeds and is committed, or no part is written. A transaction ends with COMMIT or ROLLBACK. Each
  transaction is reliable, coherent, and independent from others.
- ACID compliance. To preserve integrity, all DB transactions must satisfy ACID: Atomicity, Consistency, Isolation,
  Durability.

### PostgreSQL [&uarr;](#databases)

PostgreSQL is a popular open-source object-relational DBMS based on SQL with many advanced features.

It is reliable and performant, supports ACID transactions, and includes built-in replication. The system is extensible:
you can create custom data types, indexes, and extend behavior using programming languages.

PostgreSQL can work not only with structured and normalized data, but also with semi-structured data (json/jsonb).
These data types can be indexed and are convenient to work with. This is especially valuable for systems where data
models must be customized in real time at the UI layer (for example, e-commerce product attributes and document
management systems).

PostgreSQL advantages:

- support for unlimited database size
- powerful and reliable transaction and replication mechanisms
- extensible programming language system and support for C-compatible modules
- inheritance
- easy extensibility

Current PostgreSQL limits:

- no limit on database size
- no limit on rows per table
- no limit on indexes per table
- max table size: 32 TB
- max row size: 1.6 TB
- max field size: 1 GB
- max columns per row: 250-1600 (depending on column types)

#### PostgreSQL features

- Functions are server-side code blocks, not client-side. They can be written in SQL, but complex logic (loops,
  conditionals) requires procedural language extensions. Functions can return sets of rows and can run with definer or
  invoker rights. They are sometimes confused with stored procedures, but differ.
- Triggers are functions invoked by DML operations. For example, INSERT can trigger a function that validates the new
  row. Triggers are associated with tables and run in alphabetical order if multiple triggers exist.
- The rules system allows user-defined handlers not only for DML but also for SELECT. Unlike triggers, rules run during
  query rewriting, before planning and execution. Rules can override the behavior of SQL operations on tables.
- Index types include B-tree, hash, R-tree, GiST, and GIN. Custom index types can be created, but it is complex.
- Multiversion concurrency control (MVCC) enables concurrent updates by multiple users while maintaining ACID. This
  often removes the need for read locks.
- PostgreSQL is extensible in almost every aspect: custom type conversions, data types, domains (types with constraints),
  functions (including aggregates), indexes, operators (including overrides), and procedural languages.
- Table inheritance is supported. Child tables inherit parent columns and properties. Data in child tables can be
  included in parent table queries unless explicitly excluded.

#### Use in web projects

For simple websites, PostgreSQL is slightly less common than MySQL/MariaDB, but those two dominate overall. In complex
web apps, PostgreSQL is used more often than MySQL/MariaDB. Most frameworks (Ruby on Rails, Yii, Symfony, Django)
 support PostgreSQL.

### MySQL [&uarr;](#databases)

MySQL is one of the most widely used DBMS. It manages relational databases where tables are linked.

MySQL follows a client-server model: the client sends a request, the database server processes it and returns a
response. This is why you often hear the term "MySQL server".

MySQL is written in C/C++. It uses SQL for queries.

#### What is SQL

SQL (Structured Query Language) is used to manage data: insert, modify, delete, and query. SQL is used by many RDBMS
engines, including:

- Microsoft SQL Server
- PostgreSQL
- Oracle Database
- MariaDB
- SQLite

Knowing SQL lets you work with any relational database that uses it.

#### Difference between WHERE and HAVING

WHERE filters rows before grouping and aggregate computation. HAVING filters groups after aggregation. Therefore,
WHERE should not contain aggregate functions, while HAVING typically does. HAVING without aggregates is possible but
rare and usually less efficient than a WHERE condition.

#### Main differences between MyISAM and InnoDB

MySQL supports two popular engines: InnoDB and MyISAM. Key differences are shown below:

![img_3.png](images%2Fimg_3.png)

Terminology:

- Transaction: a block of SQL statements that either fully rolls back on error or is committed.
- Foreign keys: link records between tables so updates in the parent can cascade to the child.
- Row-level locking: when a process updates a row, it locks only that row and allows other rows to be updated.
- Deadlock: a situation where multiple processes wait indefinitely for resources held by each other.

Conclusions:

- Use MyISAM if you need full-text search before MySQL 5.6.4.
- Use MyISAM when tables are small and reads are heavy.
- In all other cases, use InnoDB.

#### When to use a composite index

A composite index is built on multiple columns. It makes sense when a query filters by more than one column. MySQL
supports composite indexes for all table types.

1. Filtering by multiple columns

```sql
SELECT * FROM table WHERE date = '2020-10-10' AND name = 'Den'
```

The most effective index:

```sql
CREATE INDEX date_name ON table(date, name)
```

2. Filtering and sorting

```sql
SELECT * FROM table WHERE name = 'Den' ORDER BY date
```

The most effective index:

```sql
CREATE INDEX date_name ON table(name, date)
```

Put the filtered column first.

Number of columns can be any:

```sql
SELECT * FROM table
WHERE date = '2020-10-10' AND type = 2 AND name = 'Den'
ORDER BY amount DESC
CREATE INDEX date_name ON table(date, type, name, amount)
```

#### DB vulnerabilities and security questions

https://habr.com/ru/company/acribia/blog/413157/

#### What is DB optimization, especially MySQL

https://eternalhost.net/blog/hosting/optimizatsiya-mysql

![SQL-Cheat-Sheet-Summary-Full.png](images%2FSQL-Cheat-Sheet-Summary-Full.png)

### MariaDB [&uarr;](#databases)

MariaDB is a DBMS that is a successor, fork, or improved version of MySQL. MySQL is one of the most popular DBMS and
is licensed by Oracle. MariaDB was created as a real alternative. It provides the same functions as MySQL, but with
improvements, and is open source under a free license.

MariaDB features that differ from MySQL:

- Higher performance, new database management capabilities, and fewer bugs.
- More efficient query optimizer and safer indexes.
- InnoDB was replaced with XtraDB. Additional storage engines were added: Aria, PBXT, FederatedX, OQGraph, IBMDB2,
  TokuDB, Cassandra, Connect, and more.
- Supports many functional commands not available in MySQL, which makes MariaDB more flexible.

Functional and technical features:

- Licensed under GPL, LGPL, BSD.
- A wide set of storage engines that can be chosen per workload.
- SQL is the main query language.
- Runs on all popular operating systems.
- Supports many server-side languages: PHP, Python, Perl, Java, Node.js, Ruby, JavaScript, C#, and others.
- Supports Galera clustering technologies.

Interesting fact: the main developer of MariaDB is Michael "Monty" Widenius from Finland, the creator of MySQL. Both
DBMS are named after his daughters:

- MySQL is named after his older daughter My.
- MariaDB is named after his younger daughter Maria.

Another fact: MariaDB version numbering was identical to MySQL for a long time. For example, MariaDB 5.5 matched MySQL
5.5. This remained until MariaDB 10.0, after which MariaDB diverged from MySQL versioning.

### MS SQL [&uarr;](#databases)

SQL Server is one of the most popular DBMS in the world. It suits projects ranging from small apps to large
high-load systems.

SQL Server was long limited to Windows, but since version 16 it is also available on Linux.

SQL Server features:

- Performance. It is fast.
- Reliability and security. It provides data encryption.
- Simplicity. It is relatively easy to use and administer.

The central concept in SQL Server, as in any DBMS, is the database itself. A database is a data store organized in a
specific way. Physically it can be a file, but it does not have to be. Databases are managed by a DBMS, and SQL Server
is one such system.

There are two SQL variants: PL/SQL and T-SQL.

- PL/SQL is used in Oracle and MySQL.
- T-SQL (Transact-SQL) is used in SQL Server.

In this context, we focus on T-SQL.

Depending on the task, T-SQL commands fall into these categories:

- DDL (Data Definition Language): commands that create database objects such as databases, tables, indexes, stored
  procedures, etc.
  - CREATE: create database objects
  - ALTER: modify database objects
  - DROP: delete database objects
  - TRUNCATE: delete all data from tables

- DML (Data Manipulation Language): commands for selecting, inserting, updating, and deleting data.
  - SELECT: read data
  - UPDATE: update data
  - INSERT: insert data
  - DELETE: delete data

- DCL (Data Control Language): commands that manage access rights.
  - GRANT: grant access permissions
  - REVOKE: revoke access permissions

### Oracle [&uarr;](#databases)

Oracle Database is an object-relational DBMS created by Oracle. It has many versions and editions. This section focuses
on the structure and core concepts of Oracle Database.

#### Oracle databases: instances and entities

Oracle Database includes physical and logical components. The concept of an instance is important. Some people use
"database" and "instance" as synonyms, but they are related and different. In Oracle terminology, a database is the
physical storage of information, while an instance is the software running on a server that provides access to the
information stored in the Oracle database. The instance runs on a specific server or computer, while the database is
stored on disks attached to that server.
