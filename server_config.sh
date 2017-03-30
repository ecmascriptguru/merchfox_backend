sudo apt-get update
sudo apt-get install nginx
sudo ufw allow 'Nginx HTTP'
sudo apt-get install mysql-server
sudo mysql_secure_installation
sudo apt-get install php-fpm php-mysql

sudo apt-get update
sudo apt-get install build-essential libssl-dev
curl -sL https://raw.githubusercontent.com/creationix/nvm/v0.31.0/install.sh -o install_nvm.sh
