# Logout

> ## Caso de sucesso

1. ✅ Recebe uma requisição do tipo **POST** na rota **/api/logout**
2. ✅ Retorna **200** a mensagem de sucesso

> ## Exceções

1. ✅ Retorna erro **404** se a API não existir
2. ✅ Retorna erro **500** se der erro ao tentar verificar o token de acesso

POST api/logout API para logout usuário
Essa rota pode ser executada apenas por usuários autenticados

O retorno é uma mesnagem

```
{
    "accessToken": "Até a próxima!!!"
}
```