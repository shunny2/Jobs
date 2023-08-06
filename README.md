<p align="center">
  <a href="#about-jobs">About Jobs</a>
  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#technologies">Technologies</a>
  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#how-to-run">How to run</a>
  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#project-status">Project Status</a>
  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#license">License</a>
</p>

</br>

![app-steps](https://user-images.githubusercontent.com/72872854/201134737-747783e9-ee67-48f0-96dd-d56b4dec1969.gif)

<p align="center">
  <a href="https://img.shields.io/github/stars/shunny2/jobs?style=social"><img src="https://img.shields.io/github/stars/shunny2/jobs?style=social" alt="Stars"></a>
  <a href="https://img.shields.io/github/forks/shunny2/jobs?style=social"><img src="https://img.shields.io/github/forks/shunny2/jobs?style=social" alt="Forks"></a>
  <a href="https://img.shields.io/github/license/shunny2/jobs"><img src="https://img.shields.io/github/license/shunny2/jobs" alt="License"></a>
</p>

## About Jobs

<b>Jobs</b> is a web application developed in [PHP](https://www.php.net/) to register job vacancies.

## Technologies

<table>
  <thead>
  </thead>
  <tbody>
    <td>
      <a href="https://www.php.net/" title="PHP"><img width="128" height="128" src="https://www.php.net/images/logos/new-php-logo.svg" alt="PHP logo image." /></a>
    </td>
    <td>
      <a href="https://www.phpmyadmin.net/" title="phpMyAdmin"><img width="128" height="128" src="https://www.vectorlogo.zone/logos/phpmyadmin/phpmyadmin-ar21.svg" alt="phpMyAdmin logo image." /></a>
    </td>
    <td>
      <a href="https://www.mysql.com/" title="MySQL"><img width="128" height="128" src="https://www.vectorlogo.zone/logos/mysql/mysql-official.svg" alt="MySQL logo image." /></a>
    </td>
    <td>
      <a href="https://www.docker.com/" title="Docker"><img width="128" height="128" src="https://cdn.worldvectorlogo.com/logos/docker.svg" alt="Docker logo image." /></a>
    </td>
  </tbody>
</table>

## How to run

First, start by cloning the repository:
```shell
git clone https://github.com/shunny2/jobs
```
Now copy the .env.example file, create a new .env file and place the copied file in it.
If you change the user, password, or database, you must also change the Database.php file.

Run the command to create the image and get the container running:
```bash
docker-compose up -d --build
```

Access phpMyAdmin at the URL:
[phpMyAdmin](https://localhost:8080)

Create the "vacancies" and "users" tables. Also, create their respective fields.

Example:

![tables](https://user-images.githubusercontent.com/72872854/201132429-7f852c03-99a0-42ad-b904-ea06e7a1e33c.gif)

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

> Status: Completed.

## License

This project is under an [MIT](https://opensource.org/licenses/MIT) license.

<hr></hr>

<p align="center">Created by <a href="https://github.com/shunny2"><b>Alexander Davis</b></a>.</p>
