# Engenharia de Software - 2024.1 | Universidade Federal do Tocantins

#### Curso: Ciência da Computação

#### Professor: Edeilson Milhomem da Silva

#### Monitor: João Gabriel Alves de Souza

### Time: [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas), [João Pedro Oliveira Barbosa](https://github.com/Iohanan-Cephas), [Laura Barbosa Henrique](https://github.com/tinywin), [Micael Ribeiro dos Santos](https://github.com/messiribeiro), [Wanderson Almeida de Mello](https://github.com/sadMello)

---

## BudStrike

### Descrição

BudStrike é o seu destino exclusivo para dispositivos eletrônicos de última geração. Nosso compromisso é proporcionar uma experiência de compra excepcional, impulsionando a velocidade de processamento de dados e garantindo entregas rápidas aos nossos clientes. Estamos constantemente refinando nossos processos para atingir a excelência, dando passos calculados em direção ao nosso objetivo.

---
### [Quadro Kanban](https://trello.com/invite/b/tPgaPmj9/ATTI9322d3ccbbdcf979852e4b31748fad8846F0ABED/budstrike)

---

### [Event Storm](https://drive.google.com/file/d/1v-ndP5GvuhIqXTeI1m_8dL8Ox9ylKL4t/view)

---

### [Prototipação](https://www.figma.com/design/LhzyN0WpcDhjSS0pwQD3PM/Untitled?node-id=0-1&t=qVwaQpORi8sfLeux-0)

---

### Histórico de Versões e Atualizações

**v1.0.0** - Primeira Iteração: Levantamento de Rquisitos para o estudo compreenção dos Casos de Uso e User Story

**v1.0.1** - Segunda Iteração: CRUD dos produtos a serem vendidos.

**v1.0.3** - Terceira Iteração: Atualizações, Login e Controle de Sessão.

---

### Requisitos

#### [Primeira Iteração](#primeira-iteração)

- [X] [RF01](#rf01---realizar-login-do-usuário) - Realizar Login do Usuário. Por [Wanderson Almeida de Mello](https://github.com/sadMello) Revisado por [Micael](https://github.com/messiribeiro)

- [X] [RF02](#rf02---realizar-cadastro-do-usuário) - Realizar Cadastro do Usuário. Por [Micael Ribeiro dos Santos](https://github.com/messiribeiro) Revisado por [Wanderson](https://github.com/sadMello)

- [X] [RF03](#rf03---realizar-cadastro-do-produto) - Realizar Cadastro do Produto. Por [Laura Barbosa Henrique](https://github.com/tinywin) Revisado por [André Barcelos](https://github.com/andrebarceloschagas)

- [X] [RF04](#rf04---visualizar-produto) - Visualizar Produto. Por [João Pedro Oliveira Barbosa](https://github.com/Iohanan-Cephas) Revisado por [Laura](https://github.com/tinywin)

- [X] [RF05](#rf05---visualizar-página-principal) - Visualizar Página Principal. Por [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas) Revisado por [João Pedro](https://github.com/Iohanan-Cephas)

---

#### [Segunda Iteração](#segunda-iteração)

- [X] [RF06](#rf06---visualizar-produto) - Visualizar Produto. Por [Wanderson Almeida de Mello](https://github.com/sadMello) Revisado por [João Pedro](https://github.com/Iohanan-Cephas)

- [X] [RF07](#rf07---deletar-produto) - Deletar Produto. Por [Micael Ribeiro dos Santos](https://github.com/messiribeiro) Revisado por [Wanderson](https://github.com/sadMello)

- [X] [RF08](#rf08---cadastrar-produto) - Cadastrar Produto. Por [João Pedro Oliveira Barbosa](https://github.com/Iohanan-Cephas) Revisado por [André Barcelos](https://github.com/andrebarceloschagas)

- [X] [RF09](#rf09---atualizar-produto) - Atualizar Produto. Por [Laura Barbosa Henrique](https://github.com/tinywin) Revisado por [Laura](https://github.com/tinywin)

- [X] [RF10](#rf10---fazer-a-documentação-do-produto) - Fazer a Documentação do Produto. Por [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas) Revisado por [João Pedro](https://github.com/Iohanan-Cephas)

---

#### Terceira Iteração

- [X] [RF11]() - Atualizar a Documentação. Por [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas) Revisado por [João Pedro](https://github.com/Iohanan-Cephas)

- [X] [RF12]() - Atualizar Cadastro. Por [Micael Ribeiro dos Santos](https://github.com/messiribeiro) Revisado por [Laura](https://github.com/tinywin)

- [X] [RF13](#rf13---realizar-login-do-usuário) - Realizar Login do Usuário. Por [Laura Barbosa Henrique](https://github.com/tinywin) Revisado po [Micael](https://github.com/messiribeiro)

- [X] [RF14]() - Controle de Sessao. Por [Wanderson Almeida de Mello](https://github.com/sadMello) Revisado por [André Barcelos](https://github.com/andrebarceloschagas)

---

## **Primeira Iteração**

## RF01 - Realizar Login do Usuário

### Atributos

| Item            |Descrição                                   |
| --------------- | -------------------------------------------|
| Caso de uso     | Realizar login do usuário                  |
| Resumo          | Realizar  login do usuário                 |
| Ator principal  | Usuário                                    |
| Ator secundário | -                                          |
| Pré-condição    | O usuário deve ter um cadastro no sistema. |
| Pós-condição    | Os dados do usuário devem estar corretos   |

### Fluxo principal

| Passos  | Descrição                                         |
| ------- | ------------------------------------------------- |
| Passo 1 | O usuário informa seus dados                      |
| Passo 2 | A verificação das credenciais é efetuada          |
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
| Email            | Sim          | Sim       | Email        |
| Senha            | Sim          | Sim       | Password     |

### Opções dos usuários

| Opção            | Descrição | Atalho |
| ---------------- | ------------ | --------- |
| Login | Valida as credenciais do usuário          | Não possui       |
| Cadastre-se             | Redireciona o usuário para a tela de cadastro          | Não possui       |

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
| Como um **usuário**, eu preciso ser capaz de **realizar login** na plataforma BudStrike, para que **eu possa ter acesso as ofertas** | Certificar que o usuário **consegue fazer login com sucesso e acessar a plataforma**. |

## RF02 - Realizar Cadastro do Usuário

### Atributos

| Item            | Descrição                                           |
|-----------------|-----------------------------------------------------|
| Caso de Uso     | Realizar Cadastro do Usuário                        |
| Resumo          | Permite que novos usuários se cadastrem na plataforma |
| Ator principal  | Visitante do site                                   |
| Ator secundário | Sistema de gerenciamento de usuários                |
| Pré-condição    | Visitante acessa a página de registro               |
| Pós-condição    | Usuário registrado e capaz de acessar a plataforma |

### Fluxo Principal

| Passos | Descrihttps://www.figma.com/design/LhzyN0WpcDhjSS0pwQD3PM/Untitled?node-id=0-1&t=qVwaQpORi8sfLeux-0ção                                           |
|--------|-----------------------------------------------------|
| Passo 1 | O visitante acessa a página de registro do site     |
| Passo 2 | Preenche o formulário de cadastro com suas informações pessoais |
| Passo 3 | Submete o formulário de cadastro                    |
| Passo 4 | O sistema valida e registra o novo usuário          |

### Fluxo Alternativo

| Passos | Descrição                                           |
|--------|-----------------------------------------------------|
| Passo 1 | Se as informações fornecidas são inválidas, o sistema exibe mensagens de erro |
| Passo 2 | Se o usuário já está cadastrado, o sistema informa ao visitante para evitar duplicidade |
| Passo 3 | Visitante corrige os dados e ressubmete o formulário |
| Passo 4 | Se o visitante cancelar, o sistema descarta as informações |

### Campos

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

### Opções de usuário

| Opção          | Descrição                                              |
|----------------|--------------------------------------------------------|
| Registrar      | Criar uma conta na plataforma para acessar recursos   |

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
|Como um visitante, eu quero me cadastrar na plataforma para poder acessar seus recursos.|O usuário cadastrado deve ser capaz de acessar a plataforma após o registro.|

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

## RF04 - Visualizar Produto

### Atributos

| Item            | Descrição                                                                           |
| --------------- | ----------------------------------------------------------------------------------- |
| Caso de uso     | Visualizar detalhes de um produto                                                       |
| Resumo          | Visualizar informações detalhadas de um produto |
| Ator principal  | Usuário                                                    |
| Ator secundário | -                                                                             |
| Pré-condição    | -                         |
| Pós-condição    | O usuário visualiza as informações detalhadas do produto.                                                                                      |

### Fluxo principal

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O usuário navega para a página de detalhes do produto.           |
| Passo 2 | O sistema exibe as informações detalhadas do produto. |
| Passo 3 | O usuário pode interagir com as informações ou tomar ações relacionadas ao produto, como adicionar ao carrinho ou realizar a compra. |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O usuário navega para a página de detalhes do produto.            |
| Passo 2 | O sistema não encontra as informações detalhadas do produto ou ocorre um erro. |
| Passo 3 | O usuário recebe uma mensagem de erro ou é redirecionado para a página anterior. |

### Opções dos usuários

|Opção|Descrição|
|---|---|
|Colocar no carrinho|Adiciona o produto em visualização ao carrinho atual de compras|
|Comprar|Redireciona o usuário à página de processamento da compra do produto visualizado|
|Calcular frete|Calcula o frete da entrega com base no CEP fornecido pelo usuário|

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
| Como um usuário, eu preciso ser capaz de visualizar detalhes de um produto na plataforma BudStrike, para que eu possa tomar decisões informadas sobre a compra | Certificar que o usuário consegue visualizar as informações detalhadas do produto. |

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

---

## **Segunda Iteração**

## RF06 - Visualizar Produto

### Atributos

| Item            | Descrição                                                                           |
| --------------- | ----------------------------------------------------------------------------------- |
| Caso de uso     | Visualizar detalhes de um produto                                                       |
| Resumo          | Visualizar informações detalhadas de um produto |
| Ator principal  | Usuário                                                    |
| Ator secundário | -                                                                             |
| Pré-condição    | -                         |
| Pós-condição    | O usuário visualiza as informações detalhadas do produto.                                                                                      |

### Fluxo principal

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O usuário navega para a página de detalhes do produto.           |
| Passo 2 | O sistema exibe as informações detalhadas do produto. |
| Passo 3 | O usuário pode interagir com as informações ou tomar ações relacionadas ao produto, como adicionar ao carrinho ou realizar a compra. |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O usuário navega para a página de detalhes do produto.            |
| Passo 2 | O sistema não encontra as informações detalhadas do produto ou ocorre um erro. |
| Passo 3 | O usuário recebe uma mensagem de erro ou é redirecionado para a página anterior. |

### Opções dos usuários

|Opção|Descrição|
|---|---|
|Colocar no carrinho|Adiciona o produto em visualização ao carrinho atual de compras|
|Comprar|Redireciona o usuário à página de processamento da compra do produto visualizado|
|Calcular frete|Calcula o frete da entrega com base no CEP fornecido pelo usuário|

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
| Como um usuário, eu preciso ser capaz de visualizar detalhes de um produto na plataforma BudStrike, para que eu possa tomar decisões informadas sobre a compra | Certificar que o usuário consegue visualizar as informações detalhadas do produto. |

### Protótipo

## RF07 - Deletar Produto

### Atributos

| Item            | Descrição                                                                           |
| --------------- | ----------------------------------------------------------------------------------- |
| Caso de uso     | Deletar um produto                                                       |
| Resumo          | Deletar um produto da plataforma |
| Ator principal  |                                                     |
| Ator secundário | -                                                                             |
| Pré-condição    | O usuário deve ter permissões adequadas para deletar um produto.                         |
| Pós-condição    | O produto é removido da plataforma.                                                                                      |

### Fluxo principal

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O usuário navega para a página de detalhes do produto.           |
| Passo 2 | O usuário seleciona a opção para deletar o produto. |
| Passo 3 | O sistema confirma a ação e deleta o produto. |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O usuário navega para a página de detalhes do produto.            |
| Passo 2 | O usuário seleciona a opção para deletar o produto. |
| Passo 3 | O sistema não consegue deletar o produto ou ocorre um erro. |
| Passo 4 | O usuário recebe uma mensagem de erro ou é redirecionado para a página anterior. |

### Opções dos usuários

|Opção|Descrição|
|---|---|
|Confirmar exclusão|Confirma a exclusão do produto|
|Cancelar exclusão|Cancela a ação de exclusão do produto|

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
| Como um usuário, eu preciso ser capaz de deletar um produto na plataforma BudStrike, para que eu possa gerenciar os produtos disponíveis para venda | Certificar que o usuário consegue deletar um produto. |

### Protótipo

## RF08 - Cadastrar Produto

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

### Protótipo

## RF09 - Atualizar Produto

### Atributos

| Item            | Descrição                                                                           |
| --------------- | ----------------------------------------------------------------------------------- |
| Caso de uso     | Atualizar um produto                                                       |
| Resumo          | Atualizar as informações de um produto na plataforma |
| Ator principal  | Usuário                                                    |
| Ator secundário | -                                                                             |
| Pré-condição    | O usuário deve ter permissões adequadas para atualizar um produto.                         |
| Pós-condição    | As informações do produto são atualizadas na plataforma.                                                                                      |

### Fluxo principal

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O usuário navega para a página de detalhes do produto.           |
| Passo 2 | O usuário seleciona a opção para atualizar o produto. |
| Passo 3 | O usuário insere as novas informações do produto. |
| Passo 4 | O sistema confirma a ação e atualiza as informações do produto. |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O usuário navega para a página de detalhes do produto.            |
| Passo 2 | O usuário seleciona a opção para atualizar o produto. |
| Passo 3 | O sistema não consegue atualizar o produto ou ocorre um erro. |
| Passo 4 | O usuário recebe uma mensagem de erro ou é redirecionado para a página anterior. |

### Opções dos usuários

|Opção|Descrição|
|---|---|
|Confirmar atualização|Confirma a atualização das informações do produto|
|Cancelar atualização|Cancela a ação de atualização do produto|

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
| Como um usuário, eu preciso ser capaz de atualizar um produto na plataforma BudStrike, para que eu possa gerenciar os produtos disponíveis para venda | Certificar que o usuário consegue atualizar as informações de um produto. |

### Protótipo

## RF10 - Fazer a Documentação do Produto

### Atributos

| Item            | Descrição                                                                           |
| --------------- | ----------------------------------------------------------------------------------- |
| Caso de uso     | Documentação                                                       |
| Resumo          | Criar e manter a documentação de um produto na plataforma |
| Ator principal  | Usuário                                                    |
| Ator secundário | -                                                                             |
| Pré-condição    | O usuário deve ter permissões adequadas para criar e atualizar a documentação de um produto.                         |
| Pós-condição    | A documentação do produto é criada ou atualizada na plataforma.                                                                                      |

### Fluxo principal

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O usuário navega para a página de documentação do produto.           |
| Passo 2 | O usuário seleciona a opção para criar ou atualizar a documentação do produto. |
| Passo 3 | O usuário insere as informações da documentação. |
| Passo 4 | O sistema confirma a ação e cria ou atualiza a documentação do produto. |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O usuário navega para a página de documentação do produto.            |
| Passo 2 | O usuário seleciona a opção para criar ou atualizar a documentação do produto. |
| Passo 3 | O sistema não consegue criar ou atualizar a documentação do produto ou ocorre um erro. |
| Passo 4 | O usuário recebe uma mensagem de erro ou é redirecionado para a página anterior. |

### Opções dos usuários

|Opção|Descrição|
|---|---|
|Confirmar criação/atualização|Confirma a criação ou atualização da documentação do produto|
|Cancelar criação/atualização|Cancela a ação de criação ou atualização da documentação do produto|

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
| Como um usuário, eu preciso ser capaz de criar e atualizar a documentação de um produto na plataforma BudStrike, para que eu possa fornecer informações detalhadas e atualizadas sobre o produto | Certificar que o usuário consegue criar e atualizar a documentação de um produto. |

### Protótipo

---

## RF12 - Cadastrar Produto

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

### Protótipo

## RF13 - Realizar Login do Usuário

### Atributos

| Item            |Descrição                                   |
| --------------- | -------------------------------------------|
| Caso de uso     | Realizar login do usuário                  |
| Resumo          | Realizar  login do usuário                 |
| Ator principal  | Usuário                                    |
| Ator secundário | -                                          |
| Pré-condição    | O usuário deve ter um cadastro no sistema. |
| Pós-condição    | Os dados do usuário devem estar corretos   |

### Fluxo principal

| Passos  | Descrição                                         |
| ------- | ------------------------------------------------- |
| Passo 1 | O usuário informa seus dados                      |
| Passo 2 | A verificação das credenciais é efetuada          |
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
| Email            | Sim          | Sim       | Email        |
| Senha            | Sim          | Sim       | Password     |

### Opções dos usuários

| Opção            | Descrição | Atalho |
| ---------------- | ------------ | --------- |
| Login | Valida as credenciais do usuário          | Não possui       |
| Cadastre-se             | Redireciona o usuário para a tela de cadastro          | Não possui       |

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
| Como um **usuário**, eu preciso ser capaz de **realizar login** na plataforma BudStrike, para que **eu possa ter acesso as ofertas** | Certificar que o usuário **consegue fazer login com sucesso e acessar a plataforma**. |

### Protótipo