# QR Code Generator

This is a simple QR code generator that allows users to create QR codes with their name, LinkedIn profile, and GitHub profile. Users can also read a generated QR code by pointing their camera at it and being redirected to the linked information.

### Setup on Local Machine

1- Clone this repository.

2- Install PHP on your machine.

3- Install Composer on your machine.

4- Install MySQL on your machine.

5- Create a database named "qrcode".

6- Copy the .env.example file to .env and update the database credentials.

```sh
cp .env.example .env
```

7- Install the dependencies:

```sh
composer install
```

8- Run the database migrations:

```sh
php artisan migrate:fresh --seed
```

9- Run the application:

```sh
php artisan serve
```

Access the application in your web browser at http://localhost:8000.

### Setup on Docker

1- Clone this repository.

2- Install Docker on your machine.

3- Build and run the Docker container:

```sh
docker-compose up -d --build
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
