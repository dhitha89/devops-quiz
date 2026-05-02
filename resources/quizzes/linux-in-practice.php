<?php

return [
    'title'    => 'Linux in Practice',
    'subtitle' => 'SSH, permissions, users, packages and cron',
    'questions' => [
        [
            'question'    => 'You have a key file called key.pem. Which command lets you SSH into a server using it?',
            'options'     => [
                'ssh user@server --key key.pem',
                'ssh -k key.pem user@server',
                'ssh -i key.pem user@server',
                'ssh --identity key.pem user@server',
            ],
            'correct'     => 2,
            'explanation' => 'The -i flag specifies the identity file (private key) to use when connecting.',
        ],
        [
            'question'    => 'Before using key.pem for SSH, what permission must you set on it?',
            'options'     => ['chmod 777 key.pem', 'chmod 644 key.pem', 'chmod 755 key.pem', 'chmod 400 key.pem'],
            'correct'     => 3,
            'explanation' => 'chmod 400 means owner read-only. SSH will refuse to use a key file with open permissions.',
        ],
        [
            'question'    => 'Which command copies your public SSH key to a remote server so you can log in without a password?',
            'options'     => ['ssh-keygen -copy user@server', 'scp ~/.ssh/id_rsa user@server', 'ssh-copy-id user@server', 'ssh --install-key user@server'],
            'correct'     => 2,
            'explanation' => 'ssh-copy-id appends your public key to ~/.ssh/authorized_keys on the remote server.',
        ],
        [
            'question'    => 'What does `cd -` do?',
            'options'     => [
                'Goes to the root directory',
                'Goes back to the previous directory',
                'Goes up one level',
                'Goes to the home directory',
            ],
            'correct'     => 1,
            'explanation' => 'cd - takes you back to whichever directory you were in before the last cd command.',
        ],
        [
            'question'    => 'Which `ls` flag shows hidden files alongside normal ones?',
            'options'     => ['ls -h', 'ls -t', 'ls -la', 'ls -r'],
            'correct'     => 2,
            'explanation' => 'ls -la lists all files including hidden ones (those starting with a dot), with full details.',
        ],
        [
            'question'    => 'You want to create the nested path /app/config/env in one command. Which works?',
            'options'     => ['mkdir /app/config/env', 'mkdir -r /app/config/env', 'mkdir -p /app/config/env', 'mkdir --all /app/config/env'],
            'correct'     => 2,
            'explanation' => 'mkdir -p creates parent directories as needed. Without -p it fails if /app/config doesn\'t exist yet.',
        ],
        [
            'question'    => 'Which command lets you watch a log file update in real time?',
            'options'     => ['cat -f /var/log/syslog', 'tail -f /var/log/syslog', 'head -f /var/log/syslog', 'watch /var/log/syslog'],
            'correct'     => 1,
            'explanation' => 'tail -f follows the file and prints new lines as they are written — essential for debugging live.',
        ],
        [
            'question'    => 'What does chmod 755 mean?',
            'options'     => [
                'Owner read only, everyone else no access',
                'Everyone has full read, write and execute',
                'Owner rwx, group and others can read and execute',
                'Owner rw, group and others read only',
            ],
            'correct'     => 2,
            'explanation' => '7 = rwx (owner), 5 = rx (group), 5 = rx (others). Common for scripts and web directories.',
        ],
        [
            'question'    => 'In the permission number system, what does 6 represent?',
            'options'     => ['read + execute', 'read only', 'read + write', 'write + execute'],
            'correct'     => 2,
            'explanation' => '4 = read, 2 = write, 1 = execute. 4+2 = 6, so 6 means read + write.',
        ],
        [
            'question'    => 'You want to change both the owner and group of a file to ubuntu:dev. Which command is correct?',
            'options'     => [
                'chown ubuntu file.txt && chgrp dev file.txt',
                'chown ubuntu:dev file.txt',
                'chmod ubuntu:dev file.txt',
                'usermod ubuntu:dev file.txt',
            ],
            'correct'     => 1,
            'explanation' => 'chown accepts owner:group in one go. This sets the owner to ubuntu and the group to dev.',
        ],
        [
            'question'    => 'What is the danger of running `usermod -G sudo devops` instead of `usermod -aG sudo devops`?',
            'options'     => [
                'It creates a duplicate group entry',
                'It removes the user entirely',
                'It replaces all existing groups with just sudo',
                'It fails because -G requires root',
            ],
            'correct'     => 2,
            'explanation' => 'Without -a (append), -G replaces the user\'s group list. The user loses membership in all other groups.',
        ],
        [
            'question'    => 'What must you always run before `sudo apt install`?',
            'options'     => ['sudo apt clean', 'sudo apt upgrade', 'sudo apt update', 'sudo apt fix'],
            'correct'     => 2,
            'explanation' => 'apt update refreshes the package list from the repositories. Without it you may install outdated versions or get "not found" errors.',
        ],
        [
            'question'    => 'What is the difference between `apt remove` and `apt purge`?',
            'options'     => [
                'remove is for packages, purge is for snap apps',
                'purge also deletes configuration files, remove does not',
                'remove needs sudo, purge does not',
                'They do the same thing',
            ],
            'correct'     => 1,
            'explanation' => 'apt remove uninstalls the package but leaves config files. apt purge removes everything including configuration.',
        ],
        [
            'question'    => 'What does this cron expression run: `0 2 * * *`',
            'options'     => ['Every 2 minutes', 'Every 2 hours', 'Every day at 2am', 'Every month on the 2nd'],
            'correct'     => 2,
            'explanation' => 'The fields are: minute hour day month weekday. 0 2 * * * = minute 0, hour 2, every day — so 2:00am daily.',
        ],
        [
            'question'    => 'What does `*/5 * * * *` mean in a crontab?',
            'options'     => ['Every 5 hours', 'Every 5 days', 'On the 5th of every month', 'Every 5 minutes'],
            'correct'     => 3,
            'explanation' => '*/5 in the minute field means "every 5 minutes". The */ syntax means "every N units" for any cron field.',
        ],
    ],
];
