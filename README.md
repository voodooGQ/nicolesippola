# Website for NicoleSippolaMassage.com
Authored by [Shane Smith](https://github.com/voodooGQ) 

## Setup

1. Add `192.168.56.183  nisi.dev www.nisi.dev` to your `/etc/hosts` file
1. From the repository root: `cp public/wp-config.dist.php public/wp-config.php`
1. `cp public/.htaccess.dist public/.htaccess`
1. `cd build`
1. `npm install` - This may take a few minutes to process... go grab a coffee
1. `bower install`
1. `gulp` - This will setup a watch task for the scripts and styles. You can CTRL-C out of this after it processes if you're not making changes. Otherwise open a new tab for the rest of the commands.
1. `cd ../vagrant`
1. `vagrant up` - This may take a few minutes to process... drink some of that coffee you grabbed earlier
1. `vagrant ssh`
1. Following commands are from the vagrant ssh root: `cd /var/www`
1. `composer install`
1. Visit `nisi.dev` in your browser