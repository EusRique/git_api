# Listar tags cadastrados

> ## Caso de sucesso

1. ✅ Recebe uma requisição do tipo **GET** na rota **/api/tag/listTag**
2. ✅ Valida se a requisição foi feita por um **usuário autenticado**
2. ✅ Valida se a lista pertenece ao **usuário autenticado**
3. ✅ Retorna **204** se não tiver nenhuma tag
4. ✅ Retorna **200** com os a lista de tags cadastradas

> ## Exceções

1. ✅ Retorna erro **404** se a API não existir
2. ✅ Retorna erro **401** se não for um usuário autenticado
3. ✅ Retorna erro **500** se der erro ao tentar listar as tags

# Lista tags
> ## APIs relacionadas a listar todas os usuários cadastradas

GET api/tag/listTag API para listar todas as tags já cadastradas
Essa rota só pode ser executada por usuários autenticados e no header da requisição deve conter o token para acesso
Exemplo no Postman em Headers passar exatemente conforme abaixo

```
Key                     Value
"Authorization"        "seu_token"
```

O Retorno é todos as tags cadastradas

```
"data": [
  {
      "id": 0000000,
      "repository_id": 0000000,
      "user_id": 0000000,
      "id_tag_repository": 0000000,
      "repositorie": "repositorie-git",
      "tag_name": "V0.0.1",
      "target_commitish": "master",
      "token_git": "0000000",
      "login": "Owner",
      "body": "Description",
      "created_at": "2020-09-12T23:49:50.000000Z",
      "updated_at": "2020-09-12T23:49:50.000000Z"
  }
]
```