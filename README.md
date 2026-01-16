COMO INSTALAR E ABRIR O PROJETO

Salvar o projeto na pasta local:

git clone https://github.com/guil0512/backend_challenge

Instalar as dependências do PHP:

docker-compose exec app composer install

Instalar as dependências do NodeJS:

npm install

npm run build

Criar o banco de dados via migrate:

docker-compose exec app php artisan migrate

Copiar o arquivo .env:

cp .env.example .env

Criar o storage:link para imagens:

docker-compose exec app php artisan storage:link

Iniciar o projeto:

docker-compose up -d


TESTES FEITOS REALIZANDO O CADASTRO PELO CRUD 

- Feito testes para validar nome, descrição e preço do produto. Caso a descrição ou nome for muito grande, ou o preço do produto estiver inválido (exemplo: A), é bloqueado e mostrado uma mensagem impossibilitando de continuar.

- Feito testes editando o produto, as validações do cadastro também funcionaram.

- Feito testes excluíndo o produto, feito a exclusão normalmente.


TESTES FEITOS REALIZANDO O CADASTRO PELO POSTMAN

Headers:

Key: Accept Value: application/json


CREATE

POST http://localhost/api/apiprodutos

Keys name, price e description

Valores Teste, 1 e Teste

Feito o cadastro normalmente

Feito com o preço "a" para testar, mostrando a mensagem e a HTTP Code correta


READ

GET http://localhost/api/apiprodutos

Mostrado os cadastros normalmente


UPDATE

PUT http://localhost/api/apiprodutos/id do produto

Utilizado formato raw, com o seguinte formato:

{
    "name": "nome novo do produto",
    "price": preço novo do produto,
    "description": "descrição nova do produto"
}

Feito a atualização normalmente.

Também testado alterando o preço para um valor inválido, mostrado a mensagem.


DELETE

DELETE http://localhost/api/apiprodutos/id do produto

Excluído o produto normalmente.


- Feito testes com o upload de imagens

Key: photo Value: imagem

POST http://localhost/api/produtos/id do produto/upload-foto

Feito o envio de arquivo de imagem, fazendo o upload normalmente.

Também validado com um arquivo sem ser uma imagem válida, com outra extensão e maior que o tamanho permitido, mostrado todas as validações.


REQUISITOS DO DESAFIO

Escopo do projeto: Feito o CRUD contendo os campos desejados. Todos se encontram no banco de dados e com os tipos exigidos.

Upload de foto do produto: Feito o upload por API, criado uma rota separada em upload.php, além de salvar apenas o caminho no banco de dados.

Padrões de API: Seguido padrões RESTful e utilizado as rotas apiResource. Retornado respostas em JSON no postman com o HTTP Status Codes corretos.

Requisitos técnicos. 

Utilizado a apiResource, rotas separadas e migration para criar o banco de dados. 

Criado Form Requests separados para o CRUD e envio de imagens, além da validação.

Utilizado o arquivo .env.example.
