# Doc
## Installation guide
### Install dependencies

Node.js (>= 16.0.0)
NPM (>= 8.11.0)
PHP (>= 8.1)
MySQL (>= 5.7)

```bash
cp .env.example .env
# If you are using api make IS_API_PROJECT=true in env file
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
# if public/storage folder is present in public folder then remove it.
php artisan storage:link 
npm install
```
### Este projeto roda com Vite com Tailwind CSS
### Depois de executar este projeto dentro de um servidor, execute este comando em um novo terminal
```bash
npm run dev
```
# Credenciais Padrão
Nós semeamos o banco de dados com algumas credenciais padrão.
```bash
'email' => 'admin@laravelfull.com.br',
'password' => ('@Micah2025'),
```
### Testing configuration
*  enable pdo_sqlite on php extension in laragon
* sudo apt install php8.1-sqlite3

## Funcionalidades Implementadas
- [x] Login e Registro do usuário.
- [x] Editar dados pessoais (Email, nome, telefone...)
- [x] CRUD para Criar e Editar Categorias.
- [x] CRUD para Criar e Editar e Excluir Produtos dentro da estrutura requerida.
- [x] Camada com validação dos campos para produtos.
- [x] Os endpoints de criação e atualização seguem retorno conforme o formato de payload modelo.
- [x] Busca pelo ID, Nome, Preço na grid dos produtos e Categorias.
- [x] Importação dos produtos API Externa com o coomando php artisan products:import sendo: A importação gera um arquivo produtos/produtosapi.json na storage. Para a listagem dos produtos no painel e realizar o cadastro por ID.
- [-] O comando php artisan products:import --id=123, sugerido não foi implementado não realizado a tempo e sem argumento necessário para a criação do comando.
