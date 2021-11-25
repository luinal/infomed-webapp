FROM php:8.0-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y

#Install git
RUN apt-get update  
RUN apt-get install -y git
RUN mkdir /home/sampleTest    
RUN cd /home/sampleTest      
RUN git clone https://github.com/luinal/infomed-webapp
           
#Set working directory
WORKDIR /home/sampleTest

#FROM php:5.6-apache
#RUN docker-php-ext-install mysqli

#FROM nginx:alpine
#COPY . /usr/share/nginx/html