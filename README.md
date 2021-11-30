# Introdução
Esse webapp possibilita gerenciar a adição, edição e exclusão de cadastros de médicos em uma database MySQL.

# Ferramentas Utilizadas
* Visual Studio Code;
* Docker e DockerHUB;
* Git e GitHUB;
* phpMyAdmin;
* Miro;

## Linguagens de programação
* HTML;
* PHP;
* CSS;
* MySQL;
* JQuerry;

# Instalação
## Build

Para criar as imagens do Docker:

- git clone https://github.com/luinal/infomed-webapp.git
- cd infomed-webapp
- docker build -t infomed-app:latest ./app/
- docker build -t infomed-db:latest ./db/

## Execução

Para rodar a aplicação voce precisa ter o docker e docker-compose instados na sua maquina. Depois de instalados, voce pode rodar:

- git clone https://github.com/luinal/infomed-webapp.git
- cd infomed-webapp
- docker-compose up -d
- Accessar a applicação via `<IP_HOST_DOCKER>:8000`

# Uso
## Índice
Na índice, o usuário podera selecionar entre a opção de **cadastrar usuários**, ou a opção de **procurar por usuários** no banco de dados.

## Menu de Cadastro
Nesse menu, o usuário poderá gerar um novo registro de médico no banco de dados, ao preencher os dados necessários. Ao clicar em cadastrar, os dados serão registrados no banco de dados, e poderão ser acessados pelo **menu de consulta**.

## Menu de Consulta
Aqui, o usuário poderá procurar por um médico registrado digitando sua busca no campo disponível. O app então irá procurar por todos os campos do registro por uma palavra ou número coincidentes. Os resultados serão exibidos em uma tabela abaixo do campo de busca, que o usuário poderá usar para verificar, editar ou excluir os registros.

### Editar cadastro
No lado esquerdo da exibição de registros, o usuário poderá clicar no ícone ![edição](app/imagens/edit.png) para modificar os dados no registro selecionado. Isso o levará para um menu similar ao menu de **cadastro**, onde poderá alterar os dados normalmente.

<img src="app/imagens/edit.png" width="18" height="18" title="excluir">

### Excluir cadastro
Ao lado do ícone de **editar cadastro**, o usuário poderá clicar em ![exclusão](app/imagens/delete.png) para remover o cadastro do banco de dados.

<img src="app/imagens/delete.png" width="18" height="18" title="excluir">
# Limitações conhecidas
Não foi possível implementar os seguintes requisitos:
- Soft Delete;
- CodeIgniter;
- Padrão REST;
- Validação YUP;
- Workspace postman/insomnia/swagger;

Os seguintes problemas não puderam ser solucionados:
- O número de especialidades está limitado a duas, e não há forma de garantir que as duas não sejam iguais;
- Ao selecionar um cadastro para edição, o CEP e as especialidades não estão sendo carregados;
- Não foi possível implementar busca por endereço, apenas por CEP.

# Considerações Finais
Esse projeto foi um excelente desafio e me fez evoluir muito como desenvolvedor. Como meu primeiro web app, o projeto exigiu muito mais do que eu sabia no momento, então infelizmente não foi possível cumprir todos os requisitos, já que tive que resolver as prioridades não só do que teria que ser desenvolvido, mas do que eu teria que aprender primeiro. Esse projeto também me ajudou a ver na prática conhecimentos que foram adquiridos ao longo dos cursos que realizei.

A partir de hoje, independente do resultado, tomarei como um projeto pessoal melhorar esse web app à medida que eu adquirir novos conhecimentos, melhorando o código e adicionando novas funcionalidades, possívelmente expandindo o escopo do projeto inicial.