# Linux Basics Cheat Sheet

> Part of **The DevOps Playbook** by @sharmilasait
> Read the full post → [devops-playbook.hashnode.dev](https://devops-playbook.hashnode.dev)

---

## What is Linux?

Linux is a free and open source operating system built around the **Linux kernel**.

| Linux Distribution | Where you'll see it |
|---|---|
| Ubuntu | Most beginner friendly — great for local dev |
| Debian | Stable and reliable — used in production |
| Amazon Linux | Default on AWS EC2 instances |
| RHEL | Used in large enterprise companies |

---

## Linux History

| Year | Event |
|---|---|
| 1969 | Unix created at AT&T Bell Labs |
| 1983 | GNU Project started by Richard Stallman |
| 1991 | Linus Torvalds builds Linux aged 21 |

---

## Linux Architecture

Linux is built in four layers. Every command you type travels through all four.

**What each layer is responsible for:**

| Layer | Responsibilities |
|---|---|
| Hardware | Executing instructions, storing data, network communication |
| Kernel | CPU scheduling, memory allocation, file system access, device management |
| Shell | Reading your input, parsing commands, displaying output |
| Applications | Running your workloads — web servers, containers, scripts |

**How a command flows through the layers:**
```
You type a command
        ↓
Shell picks it up and translates it
        ↓
Kernel decides what needs to happen
        ↓
Hardware does the actual work
        ↓
Result travels back up to you
```

---

## Linux File System

Everything starts from `/` — the root directory.

| Directory | What lives here |
|---|---|
| `/home` | Personal files and folders for each user |
| `/etc` | System and application config files — nginx, ssh, hosts |
| `/var/log` | Log files — your first stop when something breaks |
| `/bin` | Essential commands available to all users — ls, cp, mv, cat |
| `/sbin` | System admin commands — reboot, fdisk, iptables |
| `/usr` | Installed programs and their files — git, python, curl |
| `/dev` | Device files — disks, USB drives, terminals |
| `/tmp` | Temporary files — wiped clean on every reboot |
| `/opt` | Optional third party software — manually installed apps |

**Two directories every DevOps engineer must know:**
```bash
/etc        # all your config files live here
/var/log    # first place to check when something breaks
```

---

## Key Facts

- Linux kernel was created by **Linus Torvalds** in **1991**
- Android is built on the Linux kernel
- AWS, Azure and GCP all run on Linux
- Docker and Kubernetes run on Linux

---

*© The DevOps Playbook — @sharmilasait — CC BY-NC-ND 4.0*
