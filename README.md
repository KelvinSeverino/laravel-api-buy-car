# Laravel-api-buy-car

## ❓ Para que serve?
Este repositorio se trata de um projeto de API desenvolvido em laravel 10 na estrutura de API para Gerenciamento de Veiculos e Simulação de financiamento.

## 💻 Pré-requisitos
Antes de começar, verifique se você atendeu aos seguintes requisitos:
* docker
* docker-compose

## 💻 Arquivos Auxiliares
Caso precise, disponibilizei dois arquivos que montei para utilização e entendimento deste projeto, ambos estão em ./source/laravel/:
* API_BuyCar.postman_collectionn.json

### 💻 Como executar

Baixar repositório
```sh
git clone https://github.com/KelvinSeverino/laravel-api-ead.git
```

Acessar diretório do projeto
```sh
cd laravel-api-ead
```

Acessar diretório do projeto
```sh
cd ./source/laravel
```

Crie o arquivo .env
```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env
```sh
APP_NAME="API BUY CAR"
APP_ENV=local
APP_KEY=base64:X8BfWMbbw8nx6BIaW97aF7llEy3JLOchYc3EEJiHSiA=
APP_DEBUG=true
APP_URL=http://localhost:8080

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=buycar
DB_USERNAME=root
DB_PASSWORD=root
```

Voltar a raiz do projeto
```sh
cd ../../
```

Criar link simbólico para o Docker ter acesso as variaveis de ambiente
```sh
ln -s ./source/laravel/.env .env
```

Iniciar os containers
```sh
docker-compose up -d
```

Acessar o container do projeto
```sh
docker-compose exec app bash
```

Executar comando composer para realizar download de arquivos necessários
```sh
composer update
```

Gerar key do projeto Laravel
```sh
php artisan key:generate
```

Criar tabelas no Banco de Dados
```sh
php artisan migrate
```

Feito os processo acima, você poderá acessar a API pelo link em [http://localhost:8080](http://localhost:8080) e consumir as rotas disponibilizadas no arquivo mencionado no inicio deste README.