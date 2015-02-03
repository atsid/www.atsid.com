# Init script for VVV Auto Bootstrap Demo 1

echo "Commencing Setup of dev.atsid.com"

# Make a database, if we don't already have one
echo "Creating database (if it's not already there)"
mysql -u root --password=root -e "CREATE DATABASE IF NOT EXISTS dev_atsid_com"
mysql -u root --password=root -e "GRANT ALL PRIVILEGES ON dev_atsid_com.* TO wp@localhost IDENTIFIED BY 'wp';"

# Download WordPress
if [ ! -f htdocs/wp-config.php ]
then
	echo "Checking out Website duing WP CLI"
	#mkdir htdocs
	cd htdocs
        wp core config --dbname="dev_atsid_com" --dbuser=wp --dbpass=wp --dbhost="localhost"
	cd ..
        mysql -u root --password=root dev_atsid_com < atsid.com-init.sql
fi

# The Vagrant site setup script will restart Nginx for us

echo "ATSid Staging site now installed";

