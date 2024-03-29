# Introduction
Realtime chat app with Laravel, VueJS, Laravel Echo, SocketIO, Redis including Queue, Schedule Task, Laravel Horizon

## Overview
This app contains following features:
- Multiple chat rooms
- Realtime chat with Private and Presence Channel
- Each room contains Share area (everyone can chat) or Private chat with a specific user in the room
- Notification to user on receiving message (both on side bar and on Topbar of browser)
- Bot scheduled message
- Message reaction like Facebook Messenger (Realtime notify others on reaction)
- Celebration animation
- Change message color (private chat)
## Screenshots

![Realtime chat app](./public/images/readme/Overview.png "App overview")

<div class="tip" markdown="1">
<img src="./public/images/readme/Adminer.png" width="200" alt="Adminer">
<img src="./public/images/readme/Horizon.png" width="200" alt="Horizon dashboard">
<img src="./public/images/readme/Celebrate.png" width="200" alt="Celebrate">
<img src="./public/images/readme/Chatroom.png" width="200" alt="List Chatroom">
<img src="./public/images/readme/Customise_message_color.png" width="200" alt="Customise message color">
<img src="./public/images/readme/Message_Info.png" width="200" alt="Message info on hover">
<img src="./public/images/readme/Noti_1.png" width="200" alt="Message info on hover">
<img src="./public/images/readme/Noti_2.png" width="200" alt="Message info on hover">
<img src="./public/images/readme/Reaction.png" width="200" alt="Message info on hover">
<img src="./public/images/readme/Seen.png" width="200" alt="Message info on hover">
<img src="./public/images/readme/Typing.png" width="200" alt="Message info on hover">
<img src="./public/images/readme/User_Info.png" width="200" alt="Message info on hover">
</div>

# Installation
## Prerequisite
Check if you have `redis` installed, by running command: `redis-cli`

Note: If you're using Windows then install `Redis` may be harder than MacOS and Linux. Then you can consider running with Docker (as described in next section)
## Install guide
Clone this project.

Run the following commands:
```
composer install
npm install --legacy-peer-deps
cp .env.example .env
php artisan key:generate
npm install -g laravel-echo-server
```

Then setup your database infor in `.env` to match yours

Now, migrate and seed the database:
```
php artisan migrate --seed
```

Next, config Laravel echo server by running:
```
laravel-echo-server init
```
Just choose `Yes`, and remember to choose `redis` and `http`

After that change `MIX_FRONTEND_PORT` in `.env` to 6001
## Run the app
To run the app, run the following commands, each command in **a separate terminal**:
```
redis-server
php artisan serve
npm run watch
laravel-echo-server start
php artisan queue:work
```

Now access your app at `localhost:8000`, register an account and try, open another browser tab with another account to test realtime chat.

# Running with docker
## Pre-install
Make sure you installed `docker` and `docker-compose`
## Guide
First create `.env` file
```
cp .env.example .env
```
Edit `.env` update the following parts:
```bash
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laraveluser
DB_PASSWORD=laraveluserpass

...

REDIS_HOST=redis
REDIS_PASSWORD=redis_pass
REDIS_PORT=6379

...

LARAVEL_ECHO_SERVER_REDIS_HOST=redis
LARAVEL_ECHO_SERVER_REDIS_PORT=6379
LARAVEL_ECHO_SERVER_REDIS_PASSWORD=redis_pass
LARAVEL_ECHO_SERVER_AUTH_HOST=http://webserver:80
LARAVEL_ECHO_SERVER_DEBUG=false

...
```

Next, Run the following commands:
```
docker run --rm -v $(pwd):/app -w /app composer install --ignore-platform-reqs --no-autoloader --no-dev --no-interaction --no-progress --no-scripts --prefer-dist
docker run --rm -v $(pwd):/app -w /app composer dump-autoload --classmap-authoritative --no-dev --optimize
docker run --rm -v $(pwd):/app -w /app node npm install --legacy-peer-deps --production
docker run --rm -v $(pwd):/app -w /app node npm run prod
```
The commands above are equivalent with: 
- **composer install <...other options>**
- **composer dump-autoload <...other options>**
- **npm install --production**
- **npm run prod**

## Bootstrap application

Run the following command to start application:
```
docker-compose up -d --build
```
Now we need to generate project's key migrate and seed database. Run command:
```
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --seed
```

Now access the app at: `localhost:4000`

If you want to change to another port instead of `4000`. Change `APP_PORT` and `MIX_FRONTEND_PORT` to the same one you want. Then run following command to rebuild frontend:
```
docker run --rm -v $(pwd):/app -w /app node npm run prod
```

## Note
Every command with **Laravel** you need to run it like follow:
```
docker-compose exec app php artisan <same like normal>
```

Every command with **composer** need to run like follow:
```
docker run --rm -v $(pwd):/app -w /app composer <same like normal>
```

Every command with **npm** need to run like follow:
```
docker run --rm -v $(pwd):/app -w /app node npm run dev/watch/prod
```

## Deploy to production
When deploying to production, normally you'll run you app with HTTPS (port 443), then your frontend will be served under HTTPS too. So changing the `MIX_FRONTEND_PORT` in `.env` to 443.

Other settings are same
