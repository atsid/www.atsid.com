# www.atsid.com
ATS corporate website

# Contributing
This project is configured to work in a Wordpress-specific Vagrant environment called [VVV (Varying Vagrant Vagrants)](git@github.com:atsid/www.atsid.com.git). That project provides a nice workflow for developing Wordpress themes and plugins, and allows you to test changes locally.

## Getting started instructions

1. Install [VirtualBox](https://www.virtualbox.org/wiki/Downloads)
2. Install [Vagrant](http://www.vagrantup.com/downloads.html)
3. Clone the VVV repository

    git clone git://github.com/Varying-Vagrant-Vagrants/VVV.git

4. Install helpful vagrant plugins that simplify things:

    vagrant plugin install vagrant-hostsupdater
    vagrant plugin install vagrant-triggers

5. Checkout this project as `dev.atsid.com` into the `www` directory inside `VVV`:

    cd VVV/www
    git clone git@github.com:atsid/www.atsid.com.git dev.atsid.com

6. Launch the Vagrant VM (_**Note**: this will take quite a long time the first time through._)

    cd ..
    vagrant up
