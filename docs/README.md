[build_status]: https://api.travis-ci.org/LondonHeathrowACDM/Dashboard.svg?branch=master

<p align="center">
    <a href="https://acdm.hthrw.uk"><img src="https://acdm.hthrw.uk/img/LHR-ACDM.png" width="55%" /></a>
</p>

# About
An airport collaborative decision making system for London Heathrow Airport (EGLL), designed specifically to be used alongside VATSIM. This provides the user with a dashboard similar to one used at Heathrow in real life - increasing realism and making planning an ease on the network. 

# Status

|      Scan       |                            Service                            |              Status             |
|-----------------|---------------------------------------------------------------|---------------------------------|
| Build           | [TravisCI](https://travis-ci.com/LondonHeathrowACDM/Dashboard)| ![build_status]                 |

# Issue Tracking
- Report any found issues to JIRA at [LHR-ACDM](https://barlwuk.atlassian.net/secure/RapidBoard.jspa?projectKey=ACDM). 
- Note: In order to track/report an issue you will need an account, you can register through the Google OAuth implementation or register directly with Atlassian.

# Current Version
- v1.0.0 (12/2018)

# Installation Guide
## Getting Started [Without Vagrant]

- Clone the project into a web directory
- Update the .env
- Run <code>Composer install</code>
- Run php artisan key:generate
- Run php artisan migrate

### Prerequisites

You need to have the following installed:
- LAMP/LEMP Stack
- Composer
- NPM (optional)

## Getting Started [With Vagrant]

### Initialise the project
- Clone the project into a local directory
- Install VirtualBox & Vagrant
- Create a valid ssh key and make it present in the default directory
- In the project directory copy the Homestead.yaml.example to Homestead.yaml
- Make change to the Homestead.yaml and make sure the path to the ssh key is correct and directory path of the project
- Copy the .env.example file to .env
- Make change to the .env file custom to your setup (Do NOT change the MySQL settings as these are already set to favour the Homestead box)
### Run and start Vagrant
- Navigate to the project directory in the command line
- Run <code>Vagrant up</code> - this can take a while dependent on your internet speed
### Install the project into Vagrant
- Run Vagrant ssh - this will take you into the linux VM
- Navigate to the home directory of the project (/home/vagrant/Dashboard)
- Run <code>Composer install</code>
- Run php artisan key:generate
- Run php artisan migrate
### Forward the local domain for the VM [Windows]
- Go back into your Windows machine and navigate into your hosts file in C:\Windows\System32\drivers\etc (You must have admin privileges to edit this file)
- Import the following into your C:\Windows\System32\drivers\etc\hosts file - 192.168.10.10 acdm.dashboard
### Forward the local domain for the VM [MacOS/Linux]
- Go back into your MacOS/Linux machine and navigate into /etc/hosts (You must have admin privileges to edit this file)
- Import the following into your /etc/hosts - 192.168.10.10 acdm.dashboard
### Run the project
- Navigate to http://acdm.dashboard on your main machine

### Prerequisites
You need to have:
- Win32/Win64/MacOS/Linux Setup
- Vagrant
- Virtual Box





