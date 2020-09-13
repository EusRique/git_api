# Remover uma registro de TAG

1.  ✅ Recebe uma requisição do tipo **DELETE** na rota **api/tag/deleteTag/:ID**
2.  ✅ Valida se a requisição foi feita por um **usuário**
3.  ✅ Valida o parâmetro **ID**
4.  ✅ Retorna **204** com a remoção do registro

> ## Exceções

1.  ✅ Retorna erro **404** se a API não existir
2.  ✅ Retorna erro **403** se não for um usuário
3.  ✅ Retorna erro **403** se o ID passado na URL for inválido
5.  ✅ Retorna erro **500** se der erro ao tentar excluir a tag
6.  ✅ Retorna erro **500** se der erro ao tentar carregar a tag

> ## APIs relacionadas a remover uma compra cadastrada
DELETE api/tag/deleteTag/:ID API excluir uma tag
Essa rota só pode ser executada por usuários autenticados e no header da requisição deve conter o token para acesso
É valido se aquela tag pertence ao usuário que está tentando excluir
Exemplo no Postman em Headers passar exatemente conforme abaixo

```
Key                     Value
"Authorizationn"        "seu_token"
```

 Retorno da rota

```
{
    "data": {
        "msg": "Tag excluída com sucesso!!!"
    }
}
```