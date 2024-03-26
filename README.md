# Engenharia de Software - 2024.1 | Universidade Federal do Tocantins
## BudStrike
### Descrição

BudStrike é o seu destino exclusivo para dispositivos eletrônicos de última geração. Nosso compromisso é proporcionar uma experiência de compra excepcional, impulsionando a velocidade de processamento de dados e garantindo entregas rápidas aos nossos clientes. Estamos constantemente refinando nossos processos para atingir a excelência, dando passos calculados em direção ao nosso objetivo.
### Definindo os requisitos e seus colaboradores.
---
#### Primeira Iteração
- [X] RF01 - Realizar Login do Usuário. Por [Wanderson Almeida de Mello](https://github.com/sadMello)

- RF02 - Realizar Cadastro do Usuário. Por [Micael Ribeiro dos Santos](https://github.com/messiribeiro)

- [X] RF03 - Realizar Cadastro do Produto. Por [Laura Barbosa Henrique](https://github.com/tinywin)

- RF04 - Visualizar Produto. Por [João Pedro Oliveira Barbosa](https://github.com/Iohanan-Cephas)

- [X] RF05 - Visualizar Página Principal. Por [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas) Revisado por @Iohanan-Cephas
---
## **RF01 - Realizar Login do Usuário**

### Atributos

| Item            | Descrição                                                                           |
| --------------- | ----------------------------------------------------------------------------------- |
| Caso de uso     | Realizar login do usuário                                                       |
| Resumo          | Realizar  login do usuário |
| Ator principal  | Usuário                                                    |
| Ator secundário | -                                                                             |
| Pré-condição    | O usuário deve ter um cadastro no sistema.                         |
| Pós-condição    | Os dados do usuário devem estar corretos                                                                                      |

### Fluxo principal

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O usuário informa seus dados           |
| Passo 2 | A verificação das credenciais é efetuada |
| Passo 3 | A sessão é iniciada caso de login esteja correto. |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O usuário informa seus dados            |
| Passo 2 | A verificação das credenciais é efetuada |
| Passo 3 | A sessão não é iniciada e o usuário é redirecionado para a tela de login. |

### Campos do formulário

| Campo            | Obrigatório? | Editável? | Formato      |
| ---------------- | ------------ | --------- | ------------ |
| Email             | Sim          | Sim       | Email         |
| Senha            | Sim          | Sim       | Password        |

### Opções dos usuários

| Opção            | Descrição | Atalho |
| ---------------- | ------------ | --------- |
| Login | Valida as credenciais do usuário          | Não possui       |
| Cadastre-se             | Redireciona o usuário para a tela de cadastro          | Não possui       |

### User Story

|  User Story                                        | Critério de aceitação                                 |
| ------------------------------------------------- | ----------------------------------------------------- |
| Como um **usuário**, eu preciso ser capaz de **realizar login** na plataforma BudStrike, para que **eu possa ter acesso as ofertas** | Certificar que o usuário **consegue fazer login com sucesso e acessar a plataforma**. |
---

# RF02 - Realizar Cadastro do Usuário

## Atributos

| Item            | Descrição                                           |
|-----------------|-----------------------------------------------------|
| Caso de Uso     | Realizar Cadastro do Usuário                        |
| Resumo          | Permite que novos usuários se cadastrem na plataforma |
| Ator principal  | Visitante do site                                   |
| Ator secundário | Sistema de gerenciamento de usuários                |
| Pré-condição    | Visitante acessa a página de registro               |
| Pós-condição    | Usuário registrado e capaz de acessar a plataforma |

## Fluxo Principal

| Passos | Descrição                                           |
|--------|-----------------------------------------------------|
| Passo 1 | O visitante acessa a página de registro do site     |
| Passo 2 | Preenche o formulário de cadastro com suas informações pessoais |
| Passo 3 | Submete o formulário de cadastro                    |
| Passo 4 | O sistema valida e registra o novo usuário          |

## Fluxo Alternativo

| Passos | Descrição                                           |
|--------|-----------------------------------------------------|
| Passo 1 | Se as informações fornecidas são inválidas, o sistema exibe mensagens de erro |
| Passo 2 | Se o usuário já está cadastrado, o sistema informa ao visitante para evitar duplicidade |
| Passo 3 | Visitante corrige os dados e ressubmete o formulário |
| Passo 4 | Se o visitante cancelar, o sistema descarta as informações |

## Campos

| Campo           | Obrigatório | Editável | Formato   |
|-----------------|-------------|----------|-----------|
| Nome            | Sim         | Sim      | Texto     |
| Sobrenome       | Sim         | Sim      | Texto     |
| E-mail          | Sim         | Não      | E-mail    |
| Senha           | Sim         | Não      | Texto     |
| Confirmação de Senha | Sim     | Não      | Texto     |
| País            | Sim         | Sim      | Texto     |
| Cidade          | Sim         | Sim      | Texto     |
| Endereço        | Sim         | Sim      | Texto     |
| CEP             | Sim         | Sim      | Numérico  |

## Opções de usuário

| Opção          | Descrição                                              |
|----------------|--------------------------------------------------------|
| Registrar      | Criar uma conta na plataforma para acessar recursos   |

## User Story

Como um visitante, eu quero me cadastrar na plataforma para poder acessar seus recursos.

## Critério de Avaliação

O usuário cadastrado deve ser capaz de acessar a plataforma após o registro.


## RF03 - Realizar Cadastro do Produto

### Atributos

|Item|Descrição|
| -- |    -    |
|Caso de Uso|Realizar Cadastro do Produto|
|Resumo|Permite ao administrador adicionar novos produtos à plataforma|
|Ator principal|Administrador do sistema|
|Ator secundário|Sistema de gerenciamento de estoque|
|Pré-condição|O administrador deve estar logado com privilégios de administrador|
|Pós-condição|Produto adicionado e disponível para visualização|

### Fluxo principal
|Passos|Descrição|
|  --  |    -    |
|Passo 1|O administrador acessa a área de administração do site|
|Passo 2|Seleciona a opção de adicionar novo produto|
|Passo 3|Preenche as informações do produto no formulário de cadastro|
|Passo 4|Submete o formulário de cadastro|
|Passo 5|O sistema valida e registra o novo produto|

### Fluxo alternativo

|Passos|Descrição|
|  --  |    -    |
|Passo 1|Se as informações são inválidas, o sistema mostra mensagens de erro|
|Passo 2|Se o produto já está cadastrado, o sistema informa ao administrador para evitar duplicidade|
|Passo 3|Administrador corrige os dados e ressubmete o formulário|
|Passo 4|Se o administrador cancelar, o sistema descarta as informações|

### Campos

|Campo|Obrigatório|Editável|Formato|
|  --  |     -     |   --   |   -   |
|Nome do Produto|Sim|Sim|Texto|
|Descrição|Sim|Sim|Texto|
|Preço|Sim|Sim|Numérico|
|Quantidade|Sim|Sim|Numérico|
|Imagens|Sim|Sim|Arquivo|
|Categoria|Sim|Sim|Texto|

### Opções de usuário

|Opção|Descrição|
|  --  |    -    |
|Adicionar Produto|Cadastrar um novo produto no sistema|

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
|Como um administrador, eu quero cadastrar novos produtos, para que eles possam ser disponibilizados na página principal|O produto cadastrado deve aparecer corretamente e estar disponível para compra|
---
## RF05 - Visualizar Página Principal

### Atributos

|Item|Descrição|
| -- |    -    |
|Caso de Uso|Visualizar a página principal|
|Resumo|Página inicial onde são exibidos os produtos|
|Ator principal|Usuário que acessa|
|Ator secundário|Não possui|
|Pré-condição|Acesso à internet e um navegador web|
|Pós-condição|O ator visualizou a página principal|

### Fluxo principal

|Passos|Descrição|
|  --  |    -    |
|Passo 1|O usuário abre o navegador e digita o URL do BudStrike|
|Passo 2|O sistema carrega a página principal|
|Passo 3|O usuário visualiza os produtos disponíveis na página principal|

### Fluxo alternativo

|Passos|Descrição|
|  --  |    -    |
|Passo 1|O usuário clica em um produto para visualizar mais detalhes|
|Passo 2|O usuário clica no botão home para acessar a pagina inicial novamente|

### Campos

|Campo|Obrigatório|Editável|Formato|
|  --  |     -     |   --   |   -   |
|Tela Inicial|Sim|Não|Texto|

### Opções de usuário

|Opção|Descrição|
|  --  |    -    |
|Visualizar Página inicial|Visualiza a home do site BudStrike|

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
|Como um usuário, eu quero visualizar a página principal, para que eu possa ver os produtos disponíveis|Certificar que todos os produtos são exibidos corretamente na página principal|
