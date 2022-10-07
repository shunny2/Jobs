<p align="center">
<a href="#about-jobs">About Jobs</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="#technologies">Technologies</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="#how-to-run">How to run</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="#project-status">Project Status</a>
</p>

</br>

![jobs](https://user-images.githubusercontent.com/72872854/191293668-0e6917aa-13e1-4163-86de-16783a5d698a.png)

## About Jobs

Web application developed in PHP to register job vacancies.

## Technologies

- [PHP](https://www.php.net/)
- [phpMyAdmin](https://www.phpmyadmin.net/)
- [MySQL](https://www.mysql.com/)
- [Docker](https://www.docker.com/)

## How to run

First, start by cloning the repository:
```shell
git clone https://github.com/shunny2/jobs
```
Now copy the .env.example file, create a new .env file and place the copied file in it.
If you change the user, password, or bank, you must also change the Database.php file.

Run the command to create the image and get the container running:
```bash
docker-compose up -d --build
```

Access phpMyAdmin at the URL:
[phpMyAdmin](https://localhost:8080)

Create the "vacancies" and "users" tables. Also, create their respective fields.

Example:

![table-example](https://user-images.githubusercontent.com/72872854/191288829-6291e9fb-59e9-4e52-abb3-3e851d123201.png)

Go back to your bash and run:
```bash
docker exec -it php-apache bash
```

Now that you are inside the container, run the command below to install all dependencies.
```bash
composer install
```

And finally, access the project URL:
[https://localhost:8000](https://localhost:8000)

## Project Status

> Status: Finish.

<hr></hr>

<p align="center">Created by <a href="https://github.com/shunny2"><b>Alexander Davis</b></a>.</p>
