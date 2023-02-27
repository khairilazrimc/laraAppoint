<p align="center">A project built using the Laravel Framework</p>
<p align="center"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="313" alt="Laravel Logo"></p>

<br>

## About LaraAppoint

LaraAppoint is a youtube crash course project built based on [this video](https://www.youtube.com/watch?v=Hh1atKEzNWs) posted by Web Tech Knowledge. 

It is built as a clinic appointment system that intends to record appointments from guests and users visiting the website. It also has login system for users and admins where user can log in to view their reservation list while admin can log in to manage appointments and resources required for the appointme function to works.

<br>

## LaraAppoint Use-Case

Guest
- View Clinic Website
- Create Appointment
- Register Account

User
- View Clinic Website
- Login, Logout Account
- View, Create Appointment
- View, Edit Profile (Jetstream)

Admin
- View, Create, Edit, Delete Doctors
- View, Update Appoinment's Status
- Send Mail to Apointment's Contact


<br>

## Within LaraAppoint

This project utilizes the initial Laravel v9 **framework** with several inclusions of other front end frameworks which files can be found inside //public/template/:
- corona admin template 
- one health website template

This project also utilizes Laravel Jetstream to automate the creation of a complete authentication system. While it is on Jetstream, Vite.js is a must to render its view. 
- composer require laravel/jetstream
- php artisan jetstream:install livewire
- npm install
- npm run dev

This project utilizes MySQL **database**. The SQL file pertaining to the database is included inside this repo named laraAppoint.sql which has several test data. Similarly, this repo also encompasses the required factories, migrations, and seeders which can be executed as to showcase the same results of that of the included SQL file.

Last but not least, the project was build using these **version** of frameworks:
- PHP 8.1.10
- MySQL 8.0.30
- Laravel 9.51.0

So with that, I humbly thank you.
