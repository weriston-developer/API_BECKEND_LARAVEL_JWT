Aqui está o README que explica cada endpoint da sua API Laravel com JWT. Para testar cada endpoint, basta copiar a URL correspondente e utilizar ferramentas como o Postman ou o cURL para fazer as requisições HTTP. Lembre-se de realizar as ações de autenticação (login) para obter o token JWT e incluí-lo no cabeçalho `Authorization` das requisições protegidas por JWT.

---

# Laravel API + JWT

Esta é uma API Laravel com autenticação JWT para gerenciar usuários, médicos, pacientes e cidades.

## Informações da API

- **Nome da API**: Laravel API + JWT
- **Versão**: 1.0.1

## Endpoints

### Rota raiz - Informações da API

- **URL**: `/`
- **Método**: `GET`
- **Descrição**: Retorna informações básicas da API, como nome e versão.

### Rota de Autenticação - Login

- **URL**: `/login`
- **Método**: `POST`
- **Descrição**: Realiza a autenticação do usuário. Recebe `email` e `password` no corpo da requisição e retorna um token JWT válido em caso de sucesso.

### Rota de Registro de Usuário

- **URL**: `/register`
- **Método**: `POST`
- **Descrição**: Cria um novo usuário no sistema. Recebe `name`, `email` e `password` no corpo da requisição.

### Rota de Listagem de Médicos

- **URL**: `/medicos`
- **Método**: `GET`
- **Descrição**: Retorna uma lista paginada de todos os médicos cadastrados no sistema.

### Rota de Detalhes de um Médico

- **URL**: `/medico/{id}`
- **Método**: `GET`
- **Descrição**: Retorna os detalhes de um médico específico com base no ID fornecido.

### Rota de Listagem de Cidades

- **URL**: `/cidades`
- **Método**: `GET`
- **Descrição**: Retorna uma lista paginada de todas as cidades cadastradas no sistema.

### Rota de Médicos por Cidade

- **URL**: `/cidades/{id_cidade}/medicos`
- **Método**: `GET`
- **Descrição**: Retorna uma lista de médicos associados a uma cidade específica com base no ID da cidade fornecido.

### Rotas Protegidas por JWT

As seguintes rotas requerem autenticação JWT (Bearer Token) no cabeçalho `Authorization`:

#### Rota de Listagem de Usuários

- **URL**: `/users`
- **Método**: `GET`
- **Descrição**: Retorna uma lista paginada de todos os usuários cadastrados no sistema. Requer autenticação JWT.

#### Rota de Detalhes de um Usuário

- **URL**: `/user/{id}`
- **Método**: `GET`
- **Descrição**: Retorna os detalhes de um usuário específico com base no ID fornecido. Requer autenticação JWT.

#### Rota de Deleção de um Usuário

- **URL**: `/user/{id}`
- **Método**: `DELETE`
- **Descrição**: Deleta um usuário específico com base no ID fornecido. Requer autenticação JWT.

#### Rota de Atualização de um Usuário

- **URL**: `/user/{id}`
- **Método**: `PATCH`
- **Descrição**: Atualiza um usuário específico com base no ID fornecido. Requer autenticação JWT.

#### Rota de Detalhes do Usuário Autenticado

- **URL**: `/me`
- **Método**: `POST`
- **Descrição**: Retorna os detalhes do usuário autenticado. Requer autenticação JWT.

#### Rota de Logout

- **URL**: `/logout`
- **Método**: `POST`
- **Descrição**: Realiza o logout do usuário autenticado e invalida o token JWT. Requer autenticação JWT.

#### Rota de Listagem de Pacientes

- **URL**: `/pacientes`
- **Método**: `GET`
- **Descrição**: Retorna uma lista paginada de todos os pacientes cadastrados no sistema. Requer autenticação JWT.

#### Rota de Detalhes de um Paciente

- **URL**: `/paciente/{id}`
- **Método**: `GET`
- **Descrição**: Retorna os detalhes de um paciente específico com base no ID fornecido. Requer autenticação JWT.

#### Rota de Atualização de um Paciente

- **URL**: `/pacientes/{id_paciente}`
- **Método**: `POST`
- **Descrição**: Atualiza um paciente específico com base no ID fornecido. Requer autenticação JWT. Permite atualizar apenas os campos `nome` e `celular`.

#### Rota de Criação de um Paciente

- **URL**: `/pacientes`
- **Método**: `POST`
- **Descrição**: Cria um novo paciente no sistema. Requer autenticação JWT. Recebe `nome`, `celular` e  `cpf`  no corpo da requisição.

#### Rota de Deleção de um Paciente



- **URL**: `/paciente/{id}`
- **Método**: `DELETE`
- **Descrição**: Deleta um paciente específico com base no ID fornecido. Requer autenticação JWT.

#### Rota de Pacientes por Médico

- **URL**: `/medicos/{id_medico}/pacientes`
- **Método**: `GET`
- **Descrição**: Retorna uma lista de pacientes associados a um médico específico com base no ID do médico fornecido. Requer autenticação JWT.

#### Rota de Criação de Médico

- **URL**: `/medicos`
- **Método**: `POST`
- **Descrição**: Cadastra um novo médico no sistema. Requer autenticação JWT. Recebe `nome`, `especialidade` e `cidade_id` no corpo da requisição.

#### Rota de Vinculação de Paciente a Médico

- **URL**: `/medicos/{id_medico}/pacientes`
- **Método**: `POST`
- **Descrição**: Vincula um paciente a um médico específico com base no ID do médico fornecido. Requer autenticação JWT. Recebe `paciente_id` no corpo da requisição.

---

Espero que esse README o ajude a entender os endpoints da sua API Laravel com JWT. Lembre-se de ajustar as configurações de autenticação, como a geração de tokens JWT e a lógica de permissões, para garantir a segurança e o controle adequado dos recursos da API.