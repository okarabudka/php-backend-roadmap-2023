# Other Info

#### Links

- [Static code analysis](https://doka.guide/tools/static-analysis/)
- [What is code review](https://doka.guide/tools/code-review/)
- [Comments that are easy to grok and grep](https://conventionalcomments.org/)
- [What is technical debt](https://doka.guide/js/technical-debt/)
- [PSR standards](https://habr.com/ru/post/458484/)
- [PSR-1: Basic Coding Standard](https://www.php-fig.org/psr/psr-1/)
- [PSR-4: Autoloader](https://www.php-fig.org/psr/psr-4/)
- [PSR-12: Extended Coding Style](https://www.php-fig.org/psr/psr-12/)

## Composer [&uarr;](#other-info)

Composer is a package manager for PHP.

Composer, the dependency manager for PHP, was released about 10 years ago, and recently Composer 2.0 was published.
Over the years Composer gained many new features and kept pace with PHP standards. Version 2 is backward compatible but
adds several improvements.

### Speed and optimization

Performance improved. It no longer considers already installed packages for some operations, so updates are faster. It
also uses memory and CPU more efficiently.

The install command is smarter. It does not touch the vendor folder until it can guarantee all packages are installed.
This avoids wasted time removing packages on errors.

One of the best features is parallel downloads, now supported out of the box. You no longer need extra packages like
hirak/prestissimo.

### Offline support

Composer can run in offline mode. This can be useful for benchmarks or when connectivity is an issue.

### --dry-run for require and remove

This option was already available for updates (composer update --dry-run). It shows what would happen without applying
changes.

Composer 2.x adds it to `composer require` and `composer remove`.

### Preventing issues when running as root

When running as root, Composer now requires confirmation to prevent mistakes.

### Canonical repositories

This solves a problem when the same package exists in multiple repositories. Composer 1.x searched repositories in
order and used the first match. That could produce unexpected results when different versions existed in different
repos.

In Composer 2.x, all repositories are canonical by default. Composer 1.x treated them as non-canonical unless you
configured otherwise:

```json
{
  "repositories": [
    {
      "type": "composer",
      "url": "https://example.org",
      "canonical": false
    }
  ]
}
```

### Ignore specific platform requirements

If you want to ignore a specific platform requirement, run:

```
composer install --ignore-platform-req php
```

This skips the PHP requirement or a specific version. To ignore all requirements, use `--ignore-platform-reqs`.

### Difference between composer install and composer update

The main difference is that `composer install` installs dependencies exactly as specified in composer.lock, while
`composer update` updates dependencies based on composer.json.

`composer update` reads composer.json, removes packages that are no longer required, checks for the latest versions,
installs them, and updates composer.lock.

`composer install` checks whether composer.lock exists; if not, it runs `composer update` to create it. Then it installs
exactly the versions listed in composer.lock.

Use cases: `composer update` is usually used during development to upgrade dependencies. `composer install` is usually
used in deployment to install the exact locked versions in production or testing.

## Coding Standards [&uarr;](#other-info)

### Eight common rules

These rules apply to almost any language and will improve code quality:

- Use clear, readable names. Avoid transliterated words. Use English words that describe intent.
- Indent at each level and separate logical blocks with blank lines.
- Reduce nesting and remove duplication.
- Control length. Recommended: functions under 20 lines, methods under 50 lines, classes under 300 lines, files under
  1000 lines. Limit line length to what fits on screen; a soft limit is 120 characters.
- Comment and document code to capture necessary information.
- Use refactoring. Follow the rule "refactor earlier and refactor often." Consider reading "Refactoring" by Martin
  Fowler.
- Use version control, for example Git. Learn it in a short course if needed.
- Study open source code. You will see how strong developers write and can adopt best practices.

### Static code analysis

You can often evaluate code correctness without running it. This is static analysis or linting, and the tool is a
linter.

A linter parses code into standardized pieces and passes them to plugins that check rules. The most popular JavaScript
linter is ESLint. It finds code that may cause errors and reports it.

To use ESLint:

```
npm install --save-dev eslint
```

Initialize configuration:

```
npx eslint --init
```

Then add rules in .eslintrc.json. Usually you extend a standard config and customize it:

```json
{
  "extends": "eslint:recommended"
}
```

Add a lint script to package.json:

```json
{
  "scripts": {
    "lint": "eslint ./**/*.js"
  }
}
```

Run it with `npm run lint`.

Static analysis exists for almost every language. In web development, teams often add Stylelint for styles. It supports
CSS and other style languages like CSS-in-JS, SCSS, and Stylus.

Automation options:

- Run linters in CI and show results to developers.
- Run linters before creating a commit.
- Integrate linting into the editor to get suggestions while coding.

### PSR

PSR (PHP Standards Recommendations) describe common, proven conventions.

PSR standards are grouped into categories:

- Autoloading
- Interfaces
- HTTP
- Coding style

Each standard has a status:

- Accepted
- Deprecated
- Draft
- Abandoned

#### Coding style

The goal of these standards is to reduce cognitive overhead when reading code from different authors.

- PSR-1: Basic Coding Standard
- PSR-2: Coding Style Guide (deprecated)
- PSR-12: Extended Coding Style Guide

PSR-1 highlights:

- Use only `<?php` and `<?=` tags.
- Use UTF-8 without BOM for PHP files.
- Do not mix unrelated functionality in one file (1 file = 1 class).
- Namespaces and classes follow PSR-0 and PSR-4.
- Classes use StudlyCase.
- Constants use UPPER_CASE.
- Methods use camelCase.

You do not need to memorize every whitespace rule. Tools can check and format code automatically for PSR-2/PSR-12:

- Manual: use "Reformat Code" in PhpStorm.
- Advanced: use a code sniffer, for example PHP CS Fixer (often used in CI to reject non-formatted commits).

### Code review

Code review is where soft skills show up. A good review is harder than writing good code.

Changes are reviewed via pull requests. To pass review, you need approval from one or more colleagues. How reviewers are
chosen depends on company processes.

A pull request (PR) is a proposal to merge changes from a developer branch into another branch. It is sometimes called
a merge request (MR).

#### Conventional comments

Conventional Comments propose a format:

```
<label> [decorations]: <subject>
[discussion]
```

- label: comment type
- subject: main point
- decorations (optional): extra labels in parentheses
- discussion (optional): context, reasoning, and next steps

Example:

```
question (non-blocking): At this point, does it matter which thread wins?
Maybe to avoid a race condition we should keep looping until all win?
```

Recommended labels:

- praise: highlight something positive. Leave at least one. Avoid fake praise.
- nitpick: small but necessary changes. Helps focus attention.
- suggestion: ideas for improvement. Be clear about what and why. Consider blocking vs non-blocking.
- issue: concrete problems. If unsure, use question.
- question: potential issue that needs clarification.
- thought: an idea during review. Non-blocking but can lead to better suggestions.
- chore: small tasks required before a PR is officially accepted. Link to the process if possible.

Decorations add context:

- (non-blocking): should not block the PR.
- (blocking): must be resolved before approval.
- (if-minor): the author may resolve it only if changes are minor.

## Steps to Optimize a Website [&uarr;](#other-info)

### Backend and DB queries

- Analyze SQL query logs.
- Remove queries inside loops.
- Select only required fields in SQL.
- If query time exceeds 0.001 seconds, optimize the query and consider indexes.
- Ensure caching is configured and its parameters are correct.

### Server configuration and performance

- MySQL version should be at least 5.7; PHP version should be at least 7.0.
- Use a PHP accelerator if possible (OPcache, XCache, APC). OPcache is best.

### Frontend - scripts, styles, static assets, images

Check the site with:

- https://developers.google.com/speed/pagespeed/insights/ - mobile and desktop scores should be in the green zone
- https://tools.pingdom.com/ - page weight should not exceed 2-3 MB
- Chrome DevTools audits should be above 60%

What should be implemented:

- Static content should be cached by the browser (check .htaccess settings).
- Use lazy loading for images not in the first viewport (including later slides).
- Optimize and resize images for the web.
- Use the picture tag for images.
- Minify and obfuscate JS.
- Limit the number of JS files loaded on a page. Browsers usually load only 6-10 files per host in parallel. It is
  faster to bundle many small files into one.
- Load common third-party libraries from CDNs so the browser might reuse cached copies.

## Key Differences Between Scripting and Compiled Languages [&uarr;](#other-info)

A scripting language is designed to write scripts - sequences of operations a user can execute on a computer. It is
interpreted by an interpreter and usually has dynamic typing.

Interpretation is line-by-line analysis and execution of the source program or request, as opposed to compilation where
code is translated without execution.

## .htaccess

.htaccess is a local configuration file for Apache that lets you manage site settings. Unlike the main config file that
controls the whole server, .htaccess lets you adjust settings for specific directories or users.

Commands in .htaccess apply to files and subdirectories in the same directory. You can add another .htaccess in a nested
directory for different rules. If .htaccess is in the server root, its rules apply to the whole server except directories
with their own .htaccess. The mod_rewrite module has special inheritance rules.

You can also manage some PHP settings via .htaccess. PHP directives are written in the same format as php.ini, but each
line must start with php_value or php_flag.

Other .htaccess use cases:

- Set up 301 redirects (domain to domain, IP-specific, http to https, etc).
- Block search bots that overload the server CPU.
- Configure compression and caching for static files.
- Protect the admin area.

### mod_rewrite

mod_rewrite is an Apache module for URL rewriting. Rules can be described in server configuration (httpd.conf) or in
.htaccess files inside the site structure.

## HTTPS Setup with a Certificate

https://rudocs.ispmanager.com/ispmanager-lite/ustanovka-ssl-sertifikata

## LAMP

LAMP stands for Linux (OS), Apache (web server), MySQL (database), and PHP (programming language). All four are
open-source and supported by the community.

## SSH Basics

SSH is a protocol for secure remote management of an OS and data.

1. Open a terminal.
2. Run: `ssh u1234567@123.123.123.123`

Where:

- u1234567 is the account login
- 123.123.123.123 is the server IP

SSH authentication methods:

- Password authentication
- Key pair authentication

Pros and cons of each:

Password authentication:

- Simple to use.
- No extra setup.
- Less secure than key pairs.
- Vulnerable to brute-force attacks.

Key pair authentication:

- More secure than passwords.
- Can be set up for passwordless login.
- Not vulnerable to brute-force attacks.
- Requires setup on client and server.
- If the private key is compromised, attackers can access the server without a password.

## Working with Processes

- View process list
- Kill a process
- Restart services

## Cron

https://rebrainme.com/blog/linux/kak-poluchit-spisok-zadanij-cron-v-linux/

To configure script schedules, use crontab:

```
crontab -e
```

Cron syntax:

```
*min *hour *day *month *day_of_week /path/to/file
```

You can use numbers or * (meaning every unit of time). If * replaces the hour, the script runs every hour. Always use
full absolute paths.

Example: run every Wednesday at 14:45:

```
45 14 * * 3 /usr/local/ping/todo
```

Days start on Monday; Sunday is day 0 or 7.

Most cron implementations (Vixie-Cron on Debian/Ubuntu, Cronie on Fedora, Solaris Cron, etc.) list scheduled jobs for
current user with:

```
crontab -l
```

Or for another user:

```
crontab -u username -l
```

## Unix Permissions: Binary and Octal

When creating a file, it is assigned a primary group. The owner can later assign another group.

Permissions include read (r), write (w), and execute (x). There are three permission sets: for the owner (user), the
file's group, and others. Permissions are written as three triplets: rwx rwx rwx. Missing permissions are dashes.
Permissions can also be represented as an octal number. For example, rwxr-xr-- is 754. The `stat` utility can show
permissions in octal via `%a`. For example, /tmp has full permissions for all plus sticky bit:

```
$ stat --format=%a /tmp
1777
```

Permissions are checked during system calls like creat(), open(), unlink(), exec(). The most specific permission set is
used: owner overrides group and others, group overrides others.

## Absolute and Relative Paths

Linux uses several path types:

- Full (absolute) path from the filesystem root. This starts with `/` and includes the full path.
- Relative path from the current directory.
- Path relative to the current user's home directory, starting with `~/`.
