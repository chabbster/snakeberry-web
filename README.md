Snakeberry Webpanel
==============



A small web-based control panel for the snakeberry project (https://github.com/salendron/Snakeberry).

### Requirements:


-Raspberry PI with a webserver (with PHP, for example Apache2) and snakeberry installed


![Preview](http://s14.directupload.net/images/131230/vphpws69.png "Preview")


### How to install:


1.Connect with SSH to your Raspberry PI (or use the Terminal if the desktop is enabled)

*If you haven't do this already:
Install Snakeberry (How to do: https://github.com/salendron/Snakeberry/wiki/Installation) and Apache2 (sudo apt-get install apache2 php5)*

2.Enter the directory of the Webserver and create subdirectory

> sudo cd /var/www

> sudo mkdir webpanel

> sudo cd webpanel

3.Download the webpanel

> sudo wget https://github.com/chabbster/snakeberry-web/archive/master.zip

4.Unzip the webpanel and copy the files out of the subfolder

> sudo unzip master.zip

> copy -R snakeberry-web-master/* /var/www/webpanel

5.Set the ownership of the directory to www-data

> sudo chown -R www-data:www-data /var/www/webpanel

6.Add the following to the host-configuration of apache2

> sudo nano /etc/apache2/sites-available/default

Add this:

>  `Listen 8080`
>
> `<VirtualHost *:8080>`
> 
>       DocumentRoot /var/www/webpanel 
>      
> `</VirtualHost> `

7.Restart Apache

> sudo /etc/init.d/apache2 restart

8.Now you can open the Webpanel with your Browser

> IP.of.your.pi:8080

### License:

The Snakberry-Webpanel is dual-licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) and the Beerware (http://en.wikipedia.org/wiki/Beerware) license.

### We thank the following projects and authors for their (indirect) help

designmodo - https://github.com/designmodo/Flat-UI/ - Design

salendron - https://github.com/salendron/Snakeberry/ - Snakeberry

BjoernAkaManf - https://github.com/BjoernAkAManf - JavaScript/PHP-Support


### Timeline

12/25/2013 - projectstart

12/30/2013 - Release Beta v0.1
