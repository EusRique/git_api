# Criar TAG Repositório

> ## Caso de sucesso

1. ✅ Recebe uma requisição do tipo **POST** na rota **/api/tag/createTag**
2  ✅ Valida se o cliente está logado para criar uma tag
3. ✅ Valida dados obrigatórios
4. ✅ Cria uma tag
5. ✅ Retorna 200


> ## Exceções

1.  ✅ Retorna erro **404** se a API não existir
2.  ✅ Retorna erro **400** se **os valores** não forem fornecidos pelo cliente
3.  ✅ Retorna erro **400** se já existir uma tag com o mesmo nome cadastrada
4.  ✅ Retorna erro **400** se der erro ao tentar criar uma tag

# Adicionar uma tag
> ## APIs relacionadas a criação de uma tag

POST api/tag/createTag API para cadastrar uma tag
Essa rota só pode ser executada por usuários autenticados e no header da requisição deve conter o token para acesso
Exemplo no Postman em Headers passar exatemente conforme abaixo

```
Key                     Value
"Authorization"        "seu_token"
```

```
{
  "owner": "string",
	"repo": "string",
	"token_git": "string"
	"tag_name": "string"
	"body": "string"
}

```
O Retorno da rota

```
{
  "data": {
    "msg": "Tag cadastrada com sucesso!!!"
  }
}
```
