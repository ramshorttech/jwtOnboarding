FROM node:16.3-alpine AS build
WORKDIR /app
# ENV NODE_ENV=production
RUN apk add --no-cache python3 make g++
COPY /client/package.json /app/package.json
RUN yarn install
COPY /client /app
#RUN yarn build
RUN yarn dev
CMD [ "yarn", "dev" ]
EXPOSE 3000
