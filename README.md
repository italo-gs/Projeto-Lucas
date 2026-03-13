# Desenvolvimento de Software Baseado em Frameworks (2026/1)

Exemplo de projeto com o framework `Laravel`.

## Primeira execução

Confirme os valores retornados pelos comandos abaixo:
```bash
id -u
id -g
```

Caso retorne um valor diferente de `1001` altere os arquivos `docker-compose.yml` e `Dockerfile`.

Feito isso, faça uma cópia do arquivo `.env.example` como `.env` e altere as seguintes linhas:

```bash
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=tarefas
DB_USERNAME=tarefas
DB_PASSWORD=tarefas

SESSION_DRIVER=file
```

Em seguida, execute:

```bash
docker compose up -d --build
```

Instale as dependências:
```bash
docker compose exec app composer install
```

Gera `APP_KEY`:
```bash
docker compose exec app php artisan key:generate
```

Migre o banco:
```bash
docker compose exec app php artisan migrate
```

## Outros exemplos

Exemplo de criação de módulo (criando módulo `Tarefa`):
```bash
docker compose exec app php artisan make:model Tarefa -mcr
```

Exemplo de criação de uma nova `migration`:
```bash
docker compose exec app php artisan make:migration nome_da_migration
```

Exemplo de criação de um novo projeto `Laravel`:
```bash
docker compose run --rm app composer create-project laravel/laravel .
```
