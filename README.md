## System and Network Administration Examination

Deploying and managing a php website on a cloud server.

### Prerequisites

- [x] Google Cloud Platform
- [x] CentOS 7
- [x] Nginx
- [x] PHP 7.4 or higher
- [x] MySQL 8.0 or higher

### Installation

- [x] Create a new project on Google Cloud Platform
- [x] Create a new VM instance with CentOS 7
- [x] Create a new user `sudo adduser yourusername`
- [x] Add user to sudoers `sudo usermod -aG wheel yourusername`
- [x] Install Nginx `sudo yum install nginx`
- [x] Run `sudo systemctl start nginx && sudo systemctl enable nginx` to start Nginx
- [x] Install MySQL 8.0 `sudo yum install mysql-server`
- [x] Run `sudo systemctl start mysqld && sudo systemctl enable mysqld` to start MySQL
- [x] Run `sudo mysql_secure_installation` to secure MySQL
- [x] Install PHP  `sudo yum install php php-mysql php-fpm`
- [x] Run `sudo systemctl start php-fpm && sudo systemctl enable php-fpm` to start PHP
- [x] Edit Nginx configuration file `/etc/nginx/nginx.conf` 
- [x] Add the following lines to the `http` block
```
server {
	listen       80;
	server_name  localhost;
	root   /usr/share/nginx/html;
	index index.php index.html index.htm;
	location / {
		try_files $uri $uri/ =404;
	}
	error_page 404 /404.html;
	error_page 500 502 503 504 /50x.html;
	location = /50x.html {
		root /usr/share/nginx/html;
	}
	location ~ \.php$ {
		try_files $uri =404;
		fastcgi_pass unix:/var/run/php-fpm/php-fpm.sock;
		fastcgi_index index.php;
		fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
		include fastcgi_params;
	} 
}
```
- [x] Run `sudo nginx -t` to check for syntax errors
- [x] Run `sudo systemctl restart nginx` to restart Nginx
- [x] Create a new database using `mysql -u username -p` and `CREATE DATABASE dbname;`
- [x] Create a table using 
```
CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password TEXT NOT NULL,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);
```

### Deployment

- [x] Use `scp` to copy the website files to the server
OR
- [x] Use `git clone` to clone the website files to the server
OR
- [x] Use `Github Action` for CI/CD
- [x] Copy the website files to `/usr/share/nginx/html`
- [x] Access the server `IP address` or `localhost` in a browser to preview the website

### Built By Benjamin Dotse
