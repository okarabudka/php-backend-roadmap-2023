# Search Engines

#### Links

- [Elasticsearch basics](https://doka.guide/tools/elasticsearch/)
- [Connecting and configuring Elasticsearch + MySQL + Yii2](https://habr.com/ru/post/590529/)
- [Elasticsearch vs Sphinx](https://habr.com/ru/post/590181/)
- [Manticore - an Elastic alternative in C++ with 21 years of history](https://habr.com/ru/post/676630/)
- [Manticore Search - a Sphinx fork: 3-year report](https://habr.com/ru/post/541126/)
- [Solr](https://ru.wikipedia.org/wiki/Solr)

## Elasticsearch [&uarr;](#search-engines)

### Summary

Elasticsearch (ES) is a scalable search engine that can also be considered a non-relational (NoSQL) database. It is
mostly used for full-text search with filters and analyzers.

ES is written in Java, uses a JSON REST API for data access, and uses Lucene for full-text search. Similar engines are
used for complex document search (relevance, morphology, dates, ranges, and so on). A document in this context is just a
set of fields we work with.

### How it works

ES enables near real-time document search, scales horizontally, and supports multithreading. Among NoSQL systems, it
stands out in text processing quality and speed, with flexible full-text search across the entire document base.

Text processing is built around an analyzer, which is a pipeline of processors. First, the text passed to ES goes
through character filters that process individual characters. For example, you can lowercase text or strip HTML tags.

Next, a tokenizer cleans the text from special characters and punctuation and splits it into tokens based on rules.

After tokenization, text is passed through one or more token filters that can transform words in the set. For example,
you can add a stop-word filter that removes stop words. The analyzer output is a set of tokens that gets added to the
search index.

At a high level, ES has indices that can be split into shards. Each running process (node) can host multiple shards.
Each node delegates operations to the relevant shard, and rebalancing is automatic. Fault tolerance is achieved by
automatically distributing indices across cluster nodes. Clusters keep working even if hardware failures occur.

![Screenshot from 2023-03-15 13-44-56.png](images%2FScreenshot%20from%202023-03-15%2013-44-56.png)

Elasticsearch pros include faceted search, a powerful and easy-to-use API, many stemmers, a flexible index structure,
and the ability to build indices after the fact. Search techniques are strong too: full-text search, geo, and fuzzy
algorithms.

Elasticsearch has many ready-made modules, can store data, supports real-time indexing, scales fairly easily, and has
ETL tooling. It also has a large community. Elasticsearch is written in Java and is used by Wikimedia, Mozilla,
SoundCloud, GitHub, and others.

Elasticsearch cons include no built-in indexer (you need to build your own or use Logstash in ELK), high memory usage,
and Russian lemmatizers installed as a separate plugin.

If we had to describe Sphinx and Elasticsearch in one phrase, the first would be "fast indexing" and the second would
be "powerful API".

## Sphinx [&uarr;](#search-engines)

Sphinx is a full-text search system. Pros include lemmatizers for ru, en, du, many stemmers, and indexing/search modes:
full-text, faceted, geo. There is nothing extra - just a search engine with fast indexing and its own indexer. With
proper RT index configuration, you can achieve real-time indexing. Compared to Elasticsearch, memory usage is moderate.

Cons include the need to design the index structure yourself, which makes scaling harder. The API is limited, there is
no visualization, fuzzy search is not available by default (but you can implement it), and the community is small.

Sphinx is written in C++. It is used by companies like Habr, Wikimapia, and Craigslist, and is supported by 1C-Bitrix.

Sphinx stopped active development in 2016, and the alternative is the Sphinx fork called Manticore.

## Manticore [&uarr;](#search-engines)

Manticore Search is a fork of Sphinxsearch developed by the Sphinxsearch team.

- Sphinx 2: The main usage is indexing data from an external DB. Sphinx returns an id, then you fetch the original
  document by id from the DB. The data schema is described in a config.
- Manticore: The main usage is the same as in MySQL, Postgres, and Elasticsearch. You create a table with a query, write
  data with single or bulk insert/replace/delete queries, it is optimized automatically in the background, and there is
  no need to fetch original documents. Auto id support is added.

- Sphinx 2: No replication.
- Manticore: Replication based on Galera, also used in MariaDB and Percona Server.

- Sphinx 2: Queries can be executed via SQL (MySQL protocol) or a binary protocol, with clients for some languages.
- Manticore: A JSON protocol similar to Elasticsearch was added. New clients exist for PHP, Python, Java, JavaScript,
  and Elixir. Clients are generated automatically, which speeds up availability of new functionality.

- Sphinx 2: Tokenization is hard to configure for most languages.
- Manticore: Simplified with cjk and non_cjk aliases. Chinese tokenization is based on ICU. Many new stemmers were
  added, including Ukrainian.

- Sphinx 2: No official Docker and no support in the Kubernetes ecosystem.
- Manticore: Official Docker images and a Helm chart for Kubernetes.

- Sphinx 2: No APT/YUM/Homebrew repositories.
- Manticore: APT/YUM/Homebrew repositories were added. Development branches are supported, with CI that builds packages
  for all new commits.

- Sphinx 2: Some beginners find it hard to understand what is what.
- Manticore: An interactive course platform was created - https://play.manticoresearch.com/

- Sphinx 2: Few examples in the documentation.
- Manticore: Documentation was rewritten, with a custom engine - https://manual.manticoresearch.com/

- Sphinx 2: Bugs that often lead to crashes.
- Manticore: Crashes are now rare. Hundreds of old bugs were fixed.

- Sphinx 2: Parallelizing a search query is only possible with one physical index chunk per thread.
- Manticore: Everything was rebuilt on coroutines. Any search query can be parallelized to fully load the CPU and reduce
  response time to a minimum.

- Sphinx 2: Cannot be used without full-text search.
- Manticore: Can be used without full-text search, like any other database.

- Sphinx 2: Non-full-text data is stored row-wise, and for efficiency it must be in memory.
- Manticore: Manticore Columnar Library was implemented, an external independent library that stores data column-wise in
  blocks with codecs for compression across data types. It requires little memory and can handle much larger volumes.

- Sphinx 2: No secondary indexes.
- Manticore: A second key feature of Manticore Columnar Library is support for secondary indexes based on the modern
  PGM algorithm.

- Sphinx 2: No percolate tables for reverse search (when queries are stored in a table and documents are passed in to
  see which queries would match them).
- Manticore: Percolate tables were added.

## Solr [&uarr;](#search-engines)

Solr (pronounced "solar") is an open-source full-text search platform based on Apache Lucene. Its main capabilities
include full-text search, result highlighting, faceted search, dynamic clustering, integration with databases, and
processing documents in complex formats (for example, Word and PDF). Because Solr supports distributed search and
replication, it scales well. As of May 2016, Solr was the second most popular search engine.

Solr is written in Java and runs as a standalone full-text search web application (starting with version 5.0 it runs as
its own application rather than inside a servlet container). Solr uses Lucene as the core for indexing and search. Solr
has HTTP/XML and JSON APIs, which makes it possible to use Solr from most popular programming languages. Solr is also
highly configurable and allows connecting external modules.

Since the two projects merged in 2010 - Lucene and Solr - they have been developed by the same team at the Apache
Software Foundation, so you will often see references to Lucene/Solr or Solr/Lucene.

Key capabilities:

- faceted search
- highlighting search results
- query language supports structured search as well as full-text search
- many interaction formats over HTTP, including JSON, XML, CSV, binary formats, plus libraries for other languages
- web admin interface
- replication, which increases query throughput
- search across data distributed across many nodes, which increases data volume for search
- result clustering based on Carrot2
- extensibility through modules (plugins)
- flexible relevance tuning
- caching of queries, filters, and documents
- geospatial search
- automatic management of large clusters with ZooKeeper
