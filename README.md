# Build

Para criar as imagens do Docker:

- git clone https://github.com/luinal/infomed-webapp.git
- cd infomed-webapp
- docker build -t infomed-app:latest ./app/
- docker build -t infomed-db:latest ./db/

# Uso

Para rodar a aplicação voce precisa ter o docker e docker-compose instados na sua maquina. Depois de instalados, voce pode rodar:

- git clone https://github.com/luinal/infomed-webapp.git
- cd infomed-webapp
- docker-compose up -d
- Accessar a applicação via `<IP_HOST_DOCKER>:8000`

