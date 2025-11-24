<p align="center"><a href="https://ae3tecnologia.com.br/" target="_blank"><img src="./src/resources/images/ae3.svg" width="200" alt="A&3 Logo"></a></p>

## A&3 Formulários

### Requisitos

- PHP >= 8.1
- Laravel >= 10.*
- Composer >= v2

### Como configurar o projeto?

1) Adicione este repositório à lista de repositórios do composer em seu projeto laravel.

```json
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/ae3tecnologiacom/survey-package"
    }
  ]
}
```

2) Execute o comando a seguir para baixar esta lib ao vendor do seu projeto.

```
composer require ae3/survey
```

3) Para executar a migração das tabelas, execute o comando: 
```json
 php artisan form:install
```
<br>
O comando irá executar o comando ```php artisan:migrate```

4) Caso precise customizar alguma migration, pode ser feita a publicação dos arquivos com o comando: ```php artisan vendor:publish --tag=form-migrations```

## IMPLEMENTAÇÕES FUTURAS

- Tornar a definição das tabelas mais dinâmica, por exemplo, o nome do schema;
