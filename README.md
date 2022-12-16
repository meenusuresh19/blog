 # go into the project
cd blog

# create a .env file
cp .env.example .env

# install composer dependencies
composer update

# install npm dependencies
npm install

# generate a key for your application
php artisan key:generate

# create a local MySQL database (make sure you have MySQL up and running)
mysql -u root

> create blog;<br>
> exit;

# add the database connection config to your .env file
DB_CONNECTION=mysql<br>
DB_DATABASE=blog<br>
DB_USERNAME=root<br>
DB_PASSWORD=

# run the migration files to generate the schema
php artisan migrate

# seed your databse 
php artisan db:seed

# run the project
php artisan serve

# login credential
username :: admin@gmail.com<br>
password :: 123456
