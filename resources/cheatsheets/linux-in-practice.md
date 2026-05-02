# Linux in Practice — Cheat Sheet

> Part of **The DevOps Playbook** by @sharmilasait  
> Read the full post → [devops-playbook.hashnode.dev](https://devops-playbook.hashnode.dev)

---

## SSH

| Command | What it does |
|---|---|
| `ssh user@server` | Connect to a remote server |
| `ssh -i key.pem user@server` | Connect using a key file |
| `ssh-keygen -t rsa -b 4096` | Generate SSH key pair |
| `ssh-copy-id user@server` | Copy public key to server |
| `chmod 400 key.pem` | Set correct key permissions |
| `exit` | Disconnect from server |

---

## Navigation

| Command | What it does |
|---|---|
| `pwd` | Show current directory |
| `ls` | List files |
| `ls -la` | List all including hidden files |
| `ls -lt` | Sort by last modified |
| `ls -lh` | Human readable file sizes |
| `cd /etc` | Go to /etc |
| `cd ~` | Go to home directory |
| `cd ..` | Go up one level |
| `cd -` | Go back to previous location |
| `tree -L 2` | Visual folder structure |

---

## File Management

| Command | What it does |
|---|---|
| `touch notes.txt` | Create empty file |
| `mkdir projects` | Create directory |
| `mkdir -p a/b/c` | Create nested directories |
| `cp file.txt backup.txt` | Copy file |
| `cp -r dir/ dir-backup/` | Copy folder recursively |
| `mv file.txt docs/` | Move file |
| `mv old.txt new.txt` | Rename file |
| `rm file.txt` | Delete file |
| `rm -r projects/` | Delete folder |
| `rm -rf projects/` | Force delete — NO undo! |
| `cat file.txt` | Read entire file |
| `nano file.txt` | Edit file in terminal |
| `head -n 10 file.txt` | Show first 10 lines |
| `tail -n 10 file.txt` | Show last 10 lines |
| `tail -f /var/log/syslog` | Follow log in real time |

---

## Permissions

|Command | What it does |
|---|---|
| `ls -la` | View file permissions |
| `chmod 755 file.sh` | Owner rwx, group rx, others rx |
| `chmod 644 file.txt` | Owner rw, group r, others r |
| `chmod 400 key.pem` | Owner read only — SSH keys |
| `chmod 777 file` | Everyone full access — avoid! |
| `chmod -R 755 /var/www` | Recursive permission change |
| `chown ubuntu file.txt` | Change file owner |
| `chown ubuntu:dev file.txt` | Change owner and group |
| `chown -R ubuntu /var/www` | Recursive ownership change |

**Permission numbers:**

| Number | Permission |
|---|---|
| `7` | read + write + execute |
| `6` | read + write |
| `5` | read + execute |
| `4` | read only |
| `0` | no permission |

---

## Users

| Command | What it does |
|---|---|
| `whoami` | Show current user |
| `who` | Show logged in users |
| `id` | Show user ID and groups |
| `useradd devops` | Create new user |
| `passwd devops` | Set user password |
| `usermod -aG sudo devops` | Add to sudo group |
| `usermod -aG docker devops` | Add to docker group |
| `userdel devops` | Delete user |
| `userdel -r devops` | Delete user and home directory |
| `groups devops` | Show user groups |
| `su devops` | Switch to user |
| `sudo su -` | Switch to root |

> `-aG` means **append** to group — without `-a` you replace all existing groups

---

## Package Management

**Ubuntu / Debian — apt:**

| Command | What it does |
|---|---|
| `sudo apt update` | Refresh package list — always first! |
| `sudo apt install nginx` | Install package |
| `sudo apt install nginx -y` | Install without confirmation |
| `sudo apt remove nginx` | Remove package |
| `sudo apt purge nginx` | Remove including config files |
| `sudo apt autoremove` | Remove unused packages |
| `sudo apt upgrade` | Upgrade all packages |
| `apt list --installed` | List installed packages |
| `apt search nginx` | Search for package |

**RHEL / Amazon Linux — yum and dnf:**

| Command | What it does |
|---|---|
| `sudo yum update` | Refresh and update |
| `sudo yum install nginx` | Install package |
| `sudo yum remove nginx` | Remove package |
| `sudo dnf update` | Newer alternative to yum |
| `sudo dnf install nginx` | Install package |
| `sudo dnf remove nginx` | Remove package |

---

## Cron Jobs

| Command | What it does |
|---|---|
| `crontab -e` | Edit your cron jobs |
| `crontab -l` | List current cron jobs |
| `crontab -r` | Remove all cron jobs |

**Cron syntax:**

```
*  *  *  *  *  command
│  │  │  │  │
│  │  │  │  └── day of week  (0-7)
│  │  │  └───── month        (1-12)
│  │  └──────── day of month (1-31)
│  └─────────── hour         (0-23)
└────────────── minute       (0-59)
```

**Common examples:**

| Cron expression | When it runs |
|---|---|
| `* * * * *` | Every minute |
| `0 * * * *` | Every hour |
| `0 2 * * *` | Every day at 2am |
| `0 9 * * 1` | Every Monday at 9am |
| `*/5 * * * *` | Every 5 minutes |
| `0 0 1 * *` | First day of every month |

> Test your expressions at **[crontab.guru](https://crontab.guru)** before saving

---

## Key Reminders

| Command | Why it matters |
|---|---|
| `chmod 400 key.pem` | Always run before SSH — or it will fail |
| `sudo apt update` | Always run before apt install |
| `rm -rf` | Permanent deletion |
| `usermod -aG` | -a means append — never forget the -a |
| `tail -f` | For debugging live logs |

---

*© The DevOps Playbook — @sharmilasait — CC BY-NC-ND 4.0*
