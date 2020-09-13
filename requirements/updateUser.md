# Atualizar um usuário

> ## Caso de sucesso

1. ✅ Recebe uma requisição do tipo **PUT** na rota **/api/user/updateUser/:id**
2  ✅ Valida se a requisição foi feita por um **usuário**
3. ✅ Valida o parâmetro **id**
4. ✅ Valida se os **campos** tem uma resposta válida
5. ✅ **Atualiza** um registro com os dados fornecidos caso já tenha um registro
6. ✅ Retorna **200** com a mensagem de atualizado com sucesso

> ## Exceções

1. ✅ Retorna erro **404** se a API não existir
2. ✅ Retorna erro **403** se não for um usuário
3. ✅ Retorna erro **403** se o ID passado na URL for inválido
4. ✅ Retorna erro **403** se as informações enviada pelo client for uma resposta inválida
5. ✅ Retorna erro **500** se der erro ao tentar atualizar o resultado da enquete
6. ✅ Retorna erro **500** se der erro ao tentar criar o update do registro

# Attualizar uma usuário
> ## APIs relacionadas a update de usuário/registro

PUT /api/user/updateUser/:id API para atualizar um usuário
Essa rota só pode ser executada por usuários autenticados e no header da requisição deve conter o token para acesso
Exemplo no Postman em Headers passar exatemente conforme abaixo

```
Key                     Value
"Authorization"        "seu_token"
```

```
{
  "name": "string",
	"email": "string",
	"password": "password"
}

```
O Retorno da rota

```
{
    "data": {
        "msg": "Usuário atualizado com sucesso!!!"
    }
}
```
