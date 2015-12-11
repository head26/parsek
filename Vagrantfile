# Установить vagrant plugin install vagrant-vbguest


# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure(2) do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://atlas.hashicorp.com/search.
  config.vm.box = "debian/jessie64"

  # Disable automatic box update checking. If you disable this, then
  # boxes will only be checked for updates when the user runs
  # `vagrant box outdated`. This is not recommended.
  # config.vm.box_check_update = false

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  # config.vm.network "forwarded_port", guest: 80, host: 8080

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
   config.vm.network "private_network", ip: "192.168.7.9"

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
   config.vm.network "public_network", type: "dhcp"

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
     config.vm.synced_folder ".", "/vagrant", type: "", owner: "www-data", group: "www-data"

  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # Example for VirtualBox:
  #
   config.vm.provider "virtualbox" do |vb|
     # Display the VirtualBox GUI when booting the machine
     vb.gui = false
  
     # Customize the amount of memory on the VM:
     vb.memory = 2048
   end
  #
  # View the documentation for the provider you are using for more
  # information on available options.

  # Define a Vagrant Push strategy for pushing to Atlas. Other push strategies
  # such as FTP and Heroku are also available. See the documentation at
  # https://docs.vagrantup.com/v2/push/atlas.html for more information.
  # config.push.define "atlas" do |push|
  #   push.app = "YOUR_ATLAS_USERNAME/YOUR_APPLICATION_NAME"
  # end

  # Enable provisioning with a shell script. Additional provisioners such as
  # Puppet, Chef, Ansible, Salt, and Docker are also available. Please see the
  # documentation for more information about their specific syntax and use.
   config.vm.provision "shell", inline: <<-SHELL
     echo 'deb http://ftp.ru.debian.org/debian/ testing main contrib non-free' >> /etc/apt/sources.list
     echo 'deb-src http://ftp.ru.debian.org/debian/ testing main contrib non-free' >> /etc/apt/sources.list

     echo 'deb http://ftp.ru.debian.org/debian/ unstable main contrib non-free' >> /etc/apt/sources.list
     echo 'deb-src http://ftp.ru.debian.org/debian/ unstable main contrib non-free' >> /etc/apt/sources.list

     echo 'APT::Default-Release "jessie";' >> /etc/apt/apt.conf

     sudo apt-get update
     sudo apt-get install -y software-properties-common python-software-properties
     sudo apt-get install -y git
     sudo apt-get install -y mc
     sudo apt-get install -y curl
     sudo apt-get install -y unzip
     sudo apt-get install -y -t unstable php7.0-common php7.0-cli php7.0-curl php7.0-fpm php7.0-mysql php7.0-tidy php7.0-json
     sudo curl -sS https://getcomposer.org/installer | php
     sudo curl --silent --location https://deb.nodesource.com/setup_5.x | sudo bash -
     sudo apt-get install -y nodejs
     sudo apt-get install -y nginx-full
    # sudo apt-get install -y mongodb
     # add configuration changes
     sudo sed -i -e 's/sendfile on/sendfile off/g' /etc/nginx/nginx.conf
     sudo sed -i -e 's/index\.html/index\.php/g' /etc/nginx/sites-available/default
     sudo service nginx restart

     whoami

     # setup stuff
     npm install -g bower
    # cd /vagrant && /home/vagrant/composer.phar update
    # cd /vagrant && npm install
     cd /vagrant && bower --allow-root install
   SHELL
end



	 #sudo apt-get install -y build-essential autoconf re2c bison libssl-dev libcurl4-openssl-dev pkg-config libpng-dev libxml2-dev libxml2 libcurl3
	 #cd /usr/src
	 #wget http://be2.php.net/get/php-7.0.0.tar.gz/from/this/mirror -O php-7.0.0.tar.gz
	 #tar -xzf php-7.0.0.tar.gz
	 #cd php-7.0.0
     #./buildconf --force
     #./configure CONFIGURE_STRING="--prefix=/usr/local/php7 \
     #--enable-fpm \
     #--enable-mbstring \
     #--enable-sockets \
     #--disable-pdo \
     #--disable-phar \
     #--disable-cli \
     #--enable-intl \
     #--with-config-file-scan-dir=/usr/local/php7/etc/conf.d \
     #--with-curl \
     #--with-gd \
     #--with-tidy \
     #--with-pear \
     #--with-mcrypt \
     #--with-fpm-user=www-data \
     #--with-fpm-group=www-data \
     #--with-openssl \
     #--with-zlib \
     #--without-sqlite3 \
     #--without-pdo-sqlite "
	 # sudo make && make install
	 