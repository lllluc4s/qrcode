# QR Code Generator

This is a simple QR code generator that allows users to create QR codes with their name, LinkedIn profile, and GitHub profile. Users can also read a generated QR code by pointing their camera at it and being redirected to the linked information.

### Setup on Local Machine

1- Clone this repository.

2- Install PHP and dependencies on your machine.

```sh
sudo apt-get install php8.2 php8.2-curl php8.2-mysql php8.2-xml php8.2-zip php8.2-dom php8.2-gd php8.2-fpm php8.2-mbstring
&& pecl install imagick
```

3- Install Composer on your machine.

4- Install MySQL on your machine.

5- Create a user named "root" with no password.

5- Create a database named "qrcode".

6- Copy the .env.example file to .env.

```sh
cp .env.example .env
```

7- Set the database connection in .env file:

```sh
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=qrcode
DB_USERNAME=root
DB_PASSWORD=
```

8- Install the dependencies:

```sh
composer install
```

9- Run the database migrations:

```sh
sudo php artisan migrate:fresh --seed
```

10- Run the application:

```sh
sudo php artisan serve
```

Access the application in your web browser at http://localhost:8000.

### Setup on Docker

1- Install Docker on your machine.

2- Set the database connection in .env file:

```sh
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=qrcode
DB_USERNAME=root
DB_PASSWORD=
```

3- Build and run the Docker container:

```sh
docker compose up -d --build
```

4- Install the dependencies:

```sh
docker exec -it qrcode-web-1 composer install
```

5- Run the database migrations:

```sh
docker exec -it qrcode-web-1 php artisan migrate:fresh --seed
```

Access the application in your web browser at http://localhost:8008.
Configuration
The application is running on Docker. The configuration settings are specified in the docker-compose.yml file. The application uses a MySQL database that is also running inside the Docker container.

### Usage

#### Generating a QR Code

-   Access the application in your web browser at http://localhost:8000 (or the port you specified in the docker-compose.yml file)

-   Enter your name, LinkedIn profile, and GitHub profile in the input fields.

-   Click the "Generate QR Code" button.

Your QR code will be generated and displayed on the page.

#### Reading a QR Code

-   Point your camera at the generated QR code or click on the "Click here to read QR Code information" button.

-   Click the link that appears on your screen to be redirected to the linked information.
