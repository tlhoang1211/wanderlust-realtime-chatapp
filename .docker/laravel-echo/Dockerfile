FROM node:12.13-alpine

LABEL maintainer="VERNOM"

WORKDIR /app

COPY echo.json /app/echo.json
COPY laravel-echo-server.json /app/laravel-echo-server.json

RUN npm install -g pm2 laravel-echo-server

EXPOSE 6001

CMD ["pm2-runtime", "echo.json"]
