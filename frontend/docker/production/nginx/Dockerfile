FROM node:14-alpine as builder

WORKDIR /app

COPY ./package.json ./yarn.lock ./
RUN yarn install

COPY ./ ./
RUN yarn build

FROM --platform=linux/amd64 nginx:1.17-alpine

COPY ./docker/production/nginx/conf.d /etc/nginx/conf.d

WORKDIR /app

COPY --from=builder /app/build ./public
