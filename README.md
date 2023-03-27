# QR Code Generator

This is a simple QR code generator that allows users to create QR codes with their name, LinkedIn profile, and GitHub profile. Users can also read a generated QR code by pointing their camera at it and being redirected to the linked information.

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
docker exec -it qrcode-web-1 php artisan migrate
```

Access the application in your web browser at http://localhost:8000.
Configuration
The application is running on Docker. The configuration settings are specified in the docker-compose.yml file. The application uses a PostgreSQL database that is also running inside the Docker container.

### Usage

#### Generating a QR Code

-   Access the application in your web browser at http://localhost:8000.

-   Enter your name, LinkedIn profile, and GitHub profile in the input fields.

-   Click the "Generate QR Code" button.

Your QR code will be generated and displayed on the page.

#### Reading a QR Code

-   Point your camera at the generated QR code.

-   Click the link that appears on your screen to be redirected to the linked information.
