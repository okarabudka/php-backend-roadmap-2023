# Version Control Systems

#### Links

- [GitSheet](https://gitsheet.wtf/)
- [Git branching - Rebasing](https://git-scm.com/book/ru/v2/%D0%92%D0%B5%D1%82%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5-%D0%B2-Git-%D0%9F%D0%B5%D1%80%D0%B5%D0%B1%D0%B0%D0%B7%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5)
- [Similarities and differences between Mercurial and Git](https://habr.com/ru/post/168675/)
- [Start a new git repository](https://kbroman.org/github_tutorial/pages/init.html)

## Overview

The most popular system is Git. Far behind it are SVN (Subversion) and Mercurial. Other systems have a tiny market share:
CVS (Concurrent Versions System), Team Foundation Server, Bazaar, Darcs, and so on.

Git and Mercurial are distributed systems, while SVN is centralized.

In a distributed system, every developer keeps a full copy of the repository locally and works independently, periodically
pushing updates to a server with the main repository.

Git, unlike Mercurial, works not only with local commits but also with local branches, which you might never push to a
remote repository.

SVN assumes that the full version of the code with all branches is stored in the remote repository, while locally a
developer has only the file being modified.

From this point of view, SVN fits a commercial development model where you track the daily volume and quality of work.

When using Git or Mercurial, a PM often needs to enforce a rule of daily commits, especially for remote teams or
outsourcers.

## Why you need Source Code Management (SCM) [&uarr;](#version-control-systems)

- Access to code. Source code is stored in a remote repository (a data store) that developers use to pull the latest
  version of files or push changes. This is how team development works.
- Change logging. Tracking commits (code changes) helps find who changed what and when, resolve conflicts in overlapping
  edits, and roll back to any previous state.
- Branching. Developers can work in parallel on new functionality in separate branches without breaking the stable code.
- Product versioning. When releasing software updates, we label release versions, for example with tags, to freeze a
  state for debugging or retrospectives.

## Which ones have you used [&uarr;](#version-control-systems)

Git (GitHub, GitLab, Bitbucket a little).

Overall, Bitbucket is more suitable for distributed teams, while GitHub is good for personal projects.

Bitbucket integrates with other Atlassian products. For large teams it is more convenient to work with Jira. For
smaller teams with few tasks, Trello can be enough.

## gitflow, cherry-pick, revert [&uarr;](#version-control-systems)

### Git-flow

Git-flow is an alternative Git branching model that uses feature branches and several long-lived branches. This model
was first published and popularized by Vincent Driessen on the nvie site. Compared to trunk-based development,
Git-flow uses more branches, each of which exists longer, and commits are usually larger. According to this model,
developers create a feature branch and delay merging it into the mainline until the feature is done. Such long-lived
feature branches require close coordination during merging and increase the risk of diverging from the mainline. They
can also contain conflicting updates.

Git-flow can be used for projects with a planned release cycle and a DevOps-style continuous delivery approach. This
workflow uses the concepts and commands proposed by feature-branch workflows. However, Git-flow introduces new specific
roles for different branches and defines the nature and frequency of interactions between them.

In addition to feature branches, this workflow uses separate branches for preparing, supporting, and tracking releases.
At the same time you can still benefit from feature-branch workflows, such as pull requests, isolated experiments, and
effective team collaboration.

### git cherry-pick

The `git cherry-pick` command takes the changes introduced by a single commit and tries to apply them as a new commit on
the current branch. This is useful when you need to take a couple of commits from another branch instead of merging the
entire branch with all its changes.

### git revert

The `git revert` command is the opposite of `git cherry-pick`. It creates a new commit that applies changes opposite to
the specified commit, effectively undoing it.

## How to move changes from one branch to another (2 ways) [&uarr;](#version-control-systems)

`merge` or `rebase`.

## Why you need `git rebase` [&uarr;](#version-control-systems)

`git rebase` is an "automated" `cherry-pick`. It does the same job but for a chain of commits, effectively moving a
branch to a new base.

It applies commits on top of another base commit. The base is the commit that the selected branch's commits are applied
to.

Rebasing is used to make a branch history linear so changes are easier to track, or to update a development branch with
the latest changes from the main branch.

## `rebase` vs `merge` - `rebase`, `merge`, `stash` [&uarr;](#version-control-systems)

### Git merge

Merging is a standard practice for developers using version control systems. Whether branches are created for testing,
bug fixes, or other reasons, merging integrates changes from a source branch into a target branch. Only the target
branch changes. The source branch history stays intact.

Pros:

- Simple.
- Preserves full history and chronological order.
- Keeps branch context.

Cons:

- Commit history can get cluttered with many merge commits.
- Debugging with `git bisect` can become harder.

### Git rebase

Rebase is another way to move changes from one branch to another. Rebase compresses all changes into a single "patch".
Then it integrates the patch into the target branch.

Unlike merging, rebasing rewrites history because it transfers completed work from one branch to another. This removes
unwanted history.

Pros:

- Simplifies a potentially complex history.
- Easier to manipulate a single commit.
- Avoids merge commits in busy repositories and branches.
- Cleans intermediate commits into one, which can be useful for DevOps teams.

Cons:

- Squashing feature work into a few commits can hide context.
- Rebasing public repositories can be dangerous in a team.
- It requires more work.
- Restoring remote branches requires a force push. This updates all branches with the same name locally and remotely,
  which is painful.

If you rebase incorrectly, history changes can cause serious problems, so make sure you know what you are doing.

### Git squash

Git squash is a technique that helps take a series of commits and compress them. For example, if you have a series of N
commits you can squash them into a single commit.

Squashing is mainly used to turn many small, low-value commits into a few meaningful ones. This makes Git history easier
to track.

This technique is also used when merging branches. You are often advised to always squash commits and rebase onto the
parent branch (for example, master or develop). In that case, the main branch history contains only meaningful commits
without excessive detail.

Squashing rewrites Git history, so it is not recommended to squash a branch if you have already pushed it to a remote
repository. Always squash before you push changes.

`git rebase -i HEAD~3`

## Difference between `git` and `svn` (if any) [&uarr;](#version-control-systems)

- SVN is centralized, Git is distributed.
- When branching, SVN copies the full branch contents, Git creates pointers.

The core difference between these two systems is that Git is a distributed version control system, while SVN is a
centralized version control system. This means you can keep a repository on your machine (distributed), work locally,
and then sync changes with a shared server. In SVN all code is in one place, and all developers must be connected to it
so everyone can sync and push changes to the server.

## Common commands

- `git checkout dev`
- `git reset --hard origin/dev`
- `git pull`

-------------------------

- `git checkout -b feature-{task_number}_{task_name}`
- `git add .`
- `git commit -m '#{task_number} {what was done}'`

-------------------------

- `git push -u origin feature-{task_number}_{task_name}`
