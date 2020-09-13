# Busca de reposiorios GitHub

> ## Caso de sucesso

1. ✅ Recebe uma requisição do tipo **POST** na rota **/api/repositories/searchRepositories**
2. ✅ Valida dados obrigatórios **username**
3. ✅ **Busca** os repositórios do username informado
4. ✅ Retorna **200** com a lista de reposirios encontrados para o username informado

> ## Exceções

1. ✅ Retorna erro **404** se a API não existir
2. ✅ Retorna erro **400** se username não for fornecido pelo client
3. ✅ Retorna erro **401** se não encontrar repositórios com os dados fornecidos

POST /api/repositories/searchRepositories API para buscar repositórios username informado
Essa rota só pode ser executada por usuários autenticados
acesso
Exemplo no Postman em Headers passar exatemente conforme abaixo

```
Key                     Value
"Authorization"        "seu_token"
```

{
  "username": "string",
}
```
O retorno é uma lista de repositórios

```
{
    "id_repository": 00000,
    "title": "repo-name",
    "description": repo-description,
    "language": "Stacks",
    "owner": "Owner",
    "url": "https://api.github.com/repos/onwer/repo"
}
```