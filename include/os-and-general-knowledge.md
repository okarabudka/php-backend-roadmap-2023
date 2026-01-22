# OS and General Knowledge

#### Links

- [What is Linux? A cheat-sheet article](https://habr.com/ru/company/timeweb/blog/668344/)
- [What is /dev/null in Linux?](https://ravesli.com/dev-null-in-linux/)
- [The Art of Command Line (RU)](https://github.com/jlevy/the-art-of-command-line/blob/master/README-ru.md)
- [Linux basics (practical overview)](https://habr.com/ru/post/655275/)
- [Studying processes in Linux: process management](https://ravesli.com/processes-v-linux/)

## How the OS Works [&uarr;](#os-and-general-knowledge)

Linux is an operating system based on the Linux kernel. It is free software that can be modified and redistributed
under the GNU GPL license. Linux was created by Linus Torvalds in 1991 and has since become popular for servers,
desktops, and many other devices.

A Linux distribution is an OS built on the Linux kernel that includes a set of libraries and utilities (packages)
from the GNU project, plus a package manager. There are 500+ distributions, built either with commercial backing
(Red Hat/Fedora, SLED/OpenSUSE, Ubuntu, etc.) or by volunteers (Debian, Slackware, Gentoo, Arch Linux, etc.).

Distributions are grouped by base distro and package format. Common server distros:

    RPM-based (use .rpm packages)
    Red Hat Enterprise Linux, CentOS, Fedora

    DEB-based (use .deb packages)
    Debian, Ubuntu, Astra Linux

Linux advantages:

- Free to use. Most Linux OSes and Linux-based software are free.
- Open source. You can study, modify, and distribute the code under the license.
- Up-to-date performance. Linux does not slow down over time like Windows; no regular cleanup or defrag is needed.
- Security. Linux supports strong security controls and is less vulnerable than many other OSes.
- Versatility. Linux supports most popular languages (Java, C/C++, Python, Ruby, C#, etc.). Package managers simplify
  installation and updates. SSH makes server administration easy.
- Distributions. Many organizations ship their own: Debian, Ubuntu, Linux Mint, Arch Linux, MX Linux, Fedora, Manjaro,
  CentOS. Linux Mint and Ubuntu are beginner-friendly; Arch, Fedora, and Debian are more advanced. You can also build
  your own distro.
- Centralized software repositories. You can install multiple programs from a repository with one command and avoid
  hunting for cracks, keys, or random installers.

A typical Linux boot process has five stages:

    1. Bootloader.
    2. Kernel startup and initial initialization.
    3. Hardware discovery, driver loading, and filesystem mounting.
    4. System services (daemons) start.
    5. Graphical or console user session starts.

## Terminal [&uarr;](#os-and-general-knowledge)

### bash

A shell is a program, in this case bash (Bourne Again Shell). The shell accepts commands and passes them to the OS.
You interact with the system via terminals such as gnome-terminal, eterm, nxterm, and others.

Bash is a command interpreter. It is just a program that starts when a shell session begins. You could run another
interpreter (python or ruby) and then execute that language's commands instead of bash.

Bash accepts commands, passes them to the system, and provides features like command history, search/replace, fixing
previous commands, and path autocompletion.

### grep

grep solves many tasks and is mostly used to find lines that match a string or regex. It can search files or filter
command output. In seconds, it can find a file by content or filter output to a few relevant lines.

Syntax:

    $ grep [options] pattern [file...]

Or:

    $ command | grep [options] pattern

Options control search behavior and output. Pattern is a string or regex. File/command is the source to search. grep
can search multiple files and even directories with recursive mode.

### alias

Use alias to name frequently used commands. For example, alias ll='ls -latr' creates a shortcut named ll.

### xargs

Do not forget xargs (or parallel). It is powerful. You can control lines per command (-L) and parallelism (-P). If you
are unsure, start with xargs echo. The -I{} option is also useful. Examples:

    find . -name '*.py' | xargs grep some_function
    cat hosts | xargs -I{} ssh root@{} hostname

xargs passes the output of one command as arguments to another. The syntax:

    $ first_command | xargs [options] second_command args

### cd

Use cd to go to the home directory. Use ~ as a prefix for home paths (for example, ~/.bashrc). In shell scripts, use
$HOME. Use cd - to return to the previous directory.

### netstat

Check which processes listen on ports with netstat -lntp or ss -plat (for TCP; add -u for UDP).

### history

Use history to view recent commands. Re-run a command with !n (n is the history number).

### ssh

Syntax:

    $ ssh [options] user@server [command]

To connect to a server:

    ssh user@host

ssh can also run a command on a remote server without opening a full shell:

    ssh user@host ls

### How to find a file with a substring in nested directories? [&uarr;](#os-and-general-knowledge)

Use find or grep.

## Process Management [&uarr;](#os-and-general-knowledge)

### Process types

A process is an instance of a running program. Every terminal command (for example, pwd) creates a process.

Linux has three main process types:

- Foreground processes (interactive). They are started and controlled by a terminal session. They require a user
  session and do not run automatically as system services. While a foreground process runs, the terminal is blocked.

- Background processes (automatic). They are not connected to a terminal and do not expect user input. Other processes
  can run in parallel while a background process runs.

- Daemons. These are special background processes that start at boot and keep running as services. They are started as
  system tasks but can be managed by users via init (or systemd). Examples include sendmail and sshd. Daemon names often
  end with a trailing d.

### How Linux identifies processes

Linux is multi-user, so each running instance must be uniquely identified by the kernel.

Each process has a unique PID (process identifier) and a PPID (parent process ID). Processes fall into two groups:

- Parent processes create other processes.
- Child processes are created by parent processes.

The ancestor of all processes is init (initialization). It is the first program started by the kernel during boot and
has PID 1. It has no parent.

Note: at any time, there cannot be two processes with the same PID. New processes may reuse a PID that is now free.

### Process states in Linux

Execution: a process is running or ready to run (waiting for CPU time).

Waiting: a process waits for an event (user input, signal, resource). The kernel distinguishes:

    - interruptible sleep: can be interrupted by signals
    - uninterruptible sleep: waiting at the hardware level and cannot be interrupted

Terminated: a process was stopped, usually by the exit() signal.

Zombie: if a parent is killed before a child finishes, the child becomes orphaned and is adopted by init. A process
that has finished but still appears in the process table is called a zombie.

### How to get a process ID (PID)

Use pidof:

    $ pidof init
    $ pidof bash
    $ pidof systemd

### Tracking active processes

Two common tools are ps and top.

#### ps command

Shows process information:

    $ ps
    $ ps -e | head # show first 10 lines of ps -e output

To see more details for current user processes:

    $ ps -f

Columns in ps output:

    UID - user ID owning the process
    PID - process ID
    PPID - parent process ID
    C - CPU utilization
    STIME - start time
    TTY - terminal type
    TIME - CPU time used
    CMD - command that started the process

#### top command

Shows processes in real time:

    $ top

Columns in top output:

    PID - process ID
    USER - user owning the process
    PR - kernel priority
    NI - nice value (-20 to 19)
    VIRT - total virtual memory in KB (process memory, shared libs, etc.)
    RES - physical memory in KB
    SHR - shared memory size
    S (status) - process state:

        S (sleeping) - interruptible sleep
        I (idle) - idle
        R (running) - running or runnable
        Z (zombie) - zombie

    %CPU - CPU usage percentage
    %MEM - memory usage percentage
    TIME+ - total CPU time
    COMMAND - command name

## Threads and Parallelism [&uarr;](#os-and-general-knowledge)

## Memory Management [&uarr;](#os-and-general-knowledge)

## Interprocess Communication [&uarr;](#os-and-general-knowledge)

## I/O Management [&uarr;](#os-and-general-knowledge)

## POSIX Basics [&uarr;](#os-and-general-knowledge)

## Network Topology Concepts [&uarr;](#os-and-general-knowledge)

The main purpose of computer networks is shared access to resources and interactive communication within an
organization and beyond.

Resources are data, applications, and peripherals such as external drives, printers, mice, modems, or joysticks.
Interactive communication means exchanging messages in real time.

Before networks, each user needed their own printer and peripherals. To share a printer, you had to move to the
computer connected to it. Networks allow multiple users to access data storage and peripherals at the same time.
If several users need to print a document, they can all send it to a shared network printer.

The simplest network has at least two computers connected by a cable. This allows shared data access. All networks,
regardless of complexity, rely on this basic principle. Networks emerged from the practical need to share data.
A personal computer is great for creating documents, spreadsheets, and graphics, but it does not allow easy sharing.
Before networks, you had to print documents so others could work with them, or at best copy data to floppy disks.
Simultaneous editing was not possible in an offline model.

A network is a group of connected computers and other devices. The concept of connected computers that share resources
is called networking. Computers in a network can share:

- data
- printers
- fax machines
- modems
- other devices
