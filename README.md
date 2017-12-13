Current repository for the WikiPathways web site
====
This repository contains the code and development history of the main web site for the WikiPathways project:
[wikipathways.org](http://wikipathways.org). Built upon MediaWiki, 
the site includes numerous custom extensions, javascript, skins and hacks.

Developers
---
If you are in the development team, you should have write access to this repository. If you are an external developer, 
feel free to clone and make pull requests.

We have a development instance of WikiPathways always available at [dev.wikipathways.org](http://dev.wikipathways.org) that 
is running the ```dev``` branch of this repo.  If you are in the development team, feel free to switch this instance to ```feature*``` branches
temporarily for testing, but please restore the instance to the ```dev``` branch when you are done.

**Branching strategy**

When making decisions about how and when to branch, consider the following points:
* The ```master``` branch should always reflect the current deployable state of the site.
* Between releases, most development can be pushed directly to the ```dev``` branch.
* For major features being developed over a week or longer, consider creating a ```feature*``` branch off of ```dev``` to be merged back 
into ```dev``` when complete.
* Provide an informative name for your ```feature*``` branch, e.g., ```feature-new-search```.
* At release time, we will merge ```dev``` back into ```master``` and provide a milestone number in the comment, e.g., *Milestone 45*. 
It should be easy to track the release history via the ```master``` branch log.
* After releases, we may deleted ```feature*``` branches, but the ```dev``` branch will live on... forever!

```
              Milstone 45 (minor release)            Milestone 46 (major feature release)
                      |                                       |
master -------------------------------------------------------------->
          \         /                                       /
           dev ------------------------------------------------------>
                           \                      /
                            feature-new-search ---

```

**Shared dev checkouts**

When cloning the repo into a shared directory among users in a common group, e.g., ```www-data```, be sure to chown all the files under .git to allow multiple users to push/pull:
```sh
sudo chown -R www-data:www-data "$(git rev-parse --show-toplevel)/.git"
```

If this is _not_ set correctly, you will get errors like, "insufficient permission for adding an object to repository database .git/objects" and "cannot open .git/FETCH_HEAD: Permission denied".


# Install

Get the code:

```sh
git clone git@github.com:wikipathways/wikipathways.org.git
```
or
```sh
git clone https://github.com/wikipathways/wikipathways.org.git
```

## HTTP vs. HTTPS

If you're deploying on an SSL-enabled site, run this:
```sh
cp .htaccess.https .htaccess
cp globals.php.https globals.php
```

Otherwise, run this:
```sh
cp globals.php.http globals.php
```

## Permissions
WikiPathways developers should be able to read, write and execute. These users will be members of the group `wp-devs`.
```sh
sudo addgroup wp-devs
sudo adduser jdoe wp-devs
```

The user `www-data` is the user account that runs apache. This user should only be able to read and execute. It's not secure for it to be able to write files/directories.
```sh
sudo chown -R www-data:wp-devs /var/www/dev.wikipathways.org
sudo chmod -R 570 /var/www/dev.wikipathways.org
sudo find /var/www/dev.wikipathways.org -type d -exec echo chmod g+s {} \;
## the following command is an alternative, which also sets the guid sticky bit to directories:
#find /var/www/dev.wikipathways.org -type d -exec echo chmod 2570 {} \;
## MW needs to write to the cache directory:
sudo chmod -R 770 /var/www/dev.wikipathways.org/cache
```

For more details on permissions, see [this post](https://serverfault.com/a/357109).

---
Old Repo: http://svn.bigcat.unimaas.nl/wikipathways/
