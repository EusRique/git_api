# Listar usuários cadastrados

> ## Caso de sucesso

1. ✅ Recebe uma requisição do tipo **GET** na rota **/api/user/listUser**
2. ✅ Valida se a requisição foi feita por um **usuário autenticado**
3. ✅ Retorna **204** se não tiver nenhuma usuário
4. ✅ Retorna **200** com os a lista de usuários

> ## Exceções

1. ✅ Retorna erro **404** se a API não existir
2. ✅ Retorna erro **401** se não for um usuário autenticado
3. ✅ Retorna erro **500** se der erro ao tentar listar os usuários

# Lista usuários
> ## APIs relacionadas a listar todas os usuários cadastradas

GET api/user/listUser API para listar todos os usuários já cadastradas
Essa rota só pode ser executada por usuários autenticados e no header da requisição deve conter o token para acesso
Exemplo no Postman em Headers passar exatemente conforme abaixo

```
Key                     Value
"Authorization"        "seu_token"
```

O Retorno é todos os usuários cadastradas

```
"data": [
  {
      "id": 1,
      "name": "name",
      "email": "mail@mail.com",
      "email_verified_at": null,
      "created_at": "2020-09-12T21:15:02.000000Z",
      "updated_at": "2020-09-12T21:15:02.000000Z"
  }
]
```