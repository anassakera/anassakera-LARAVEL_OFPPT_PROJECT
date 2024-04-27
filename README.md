<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
### These Instructions are from ANASS CHAKLOUL

# Step 0:

### get update
>composer update

# Step 1:

### create Database
>php artisan migrate

>php artisan db:seed

# Step 2:

### Some configirations
> npm install -g vite

> npm install vite --save-dev

> npm run dev 

# Step 3:

### Create PIN & Role from phpMyAdmin
> INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `pin`, `email_verified_at`, `account_type`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, '', '', '', '', '123456', NULL, 'Admin', NULL, NULL, NULL);

# Step 4:

### Sign up with PIN And your Info 
