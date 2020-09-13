# Cadastro de usuário

> ## Caso de sucesso

1. ✅ Recebe uma requisição do tipo **POST** na rota **/api/user/createUser**
2. ✅ Valida dados obrigatórios **name**, **email** e **password**
3. ✅ **Valida** se já existe um usuário com o email fornecido
4. ✅ Gera uma senha **criptografada** (essa senha não pode ser descriptografada)
5. ✅ **Cria** uma conta para o usuário com os dados informados, **substituindo** a senha pela senha criptorafada
6. ✅ Gera um **token** de acesso a partir do ID do usuário
7. ✅ **Atualiza** os dados do usuário com o token de acesso gerado
8. ✅ Retorna **200** com o token de acesso

> ## Exceções

1. ✅ Retorna erro **404** se a API não existir
2. ✅ Retorna erro **400** se name, email ou password não forem fornecidos pelo client
3. ✅ Retorna erro **403** se o email fornecido já estiver em uso
4. ✅ Retorna erro **500** se der erro ao tentar gerar uma senha criptografada
5. ✅ Retorna erro **500** se der erro ao tentar criar a conta do usuário
6. ✅ Retorna erro **500** se der erro ao tentar gerar o token de acesso
7. ✅ Retorna erro **500** se der erro ao tentar atualizar o usuário com o token de acesso gerado


# Login
> ## APIs relacionadas a Login

POST api/user/createUser API para criar conta de um usuário
Essa rota pode ser executada por qualquer usuário

```
{
  "name": "string",
  "email": "string",
  "password": "string"
}

O Retorno é um token para continuar para as outras rotas que precisam de autenticação

```
{
  "accessToken": "doasdposkdposiapodisapodoiahsudha"
}

```

