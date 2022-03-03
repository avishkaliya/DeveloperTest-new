# Git Commit Message

In this project we use and enforce the commit message conventions.

## The reasons for these conventions:
- automatic generating of the changelog
- simple navigation through git history (e.g. ignoring style changes)

## Format of the commit message:
```bash
<type>(<github_issue_id_with_hash>): <subject>
<BLANK LINE>
<body>
<BLANK LINE>
<footer>
```

## Example commit message:

```bash
fix(#2): Fix dashboard issue

Fix dashboard not loading issue.

Fixes #2
```

## Message subject (first line)
The first line cannot be longer than 72 characters and should be followed by a blank line. The type and scope should always be lowercase as shown below.

### Allowed `<type>` values:

* **feat** for a new feature for the user, not a new feature for build script. Such commit will trigger a release bumping a MINOR version.
* **fix** for a bug fix for the user, not a fix to a build script. Such commit will trigger a release bumping a PATCH version.
* **perf** for performance improvements. Such commit will trigger a release bumping a PATCH version.
* **docs** for changes to the documentation.
* **style** for formatting changes, missing semicolons, etc.
* **refactor** for refactoring production code, e.g. renaming a variable.
* **test** for adding missing tests, refactoring tests; no production code change.
* **build** for updating build configuration, development tools or other changes irrelevant to the user.

### What is the `<scope>` values:

The `<scope>` will be the GitHub issue number (e.g #1). This allows to build connection between Git Commits.

The `<scope>` can be empty (e.g. if the change has no specific GitHub issue), in which case the parentheses are
omitted.

## Message body

Just as in the `<subject>`, use the imperative, present tense: "change" not "changed" nor "changes". Message body should include motivation for the change and contrasts with previous behavior.

## Message footer (Optional)

### Referencing issues
Closed issues should be listed on a separate line in the footer prefixed with "Closes" keyword like this:
```bash
Closes #234
```
or in the case of multiple issues:
```bash
Closes #123, #245, #992
```
### Breaking changes

All breaking changes have to be mentioned in footer with the
description of the change, justification and migration notes.
```bash
BREAKING CHANGE:

`port-runner` command line option has changed to `runner-port`, so that it is
consistent with the configuration file syntax.

To migrate your project, change all the commands, where you use `--port-runner`
to `--runner-port`.
```

Any commit with the breaking change section will trigger a MAJOR release and appear on the changelog independently of the commit type.

---

This document is based on [Angular Commit Message Format]. See the [commit history] for examples of properly-formatted commit messages.

[Angular Commit Message Format]: https://github.com/angular/angular/blob/master/CONTRIBUTING.md#commit
[commit history]: https://github.com/karma-runner/karma/commits/master