
# Requisitos Funcionais

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

| Passos | Descrição                                           |
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

### Protótipoda

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

## **Terceira Iteração**

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

---

## RF12 - Realizar Cadastro do Usuário

### Atributos

| Item            |Descrição                                   |
| --------------- | -------------------------------------------|
| Caso de uso     | Realizar cadastro do usuário               |
| Resumo          | Realizar  cadastro do usuário              |
| Ator principal  | Usuário                                    |
| Ator secundário | -                                          |
| Pré-condição    | O usuário deve ter um cadastro no sistema. |
| Pós-condição    | Os dados do usuário devem estar corretos   |

### Fluxo principal

| Passos  | Descrição                                         |
| ------- | ------------------------------------------------- |
| Passo 1 | O usuário informa seus dados                      |
| Passo 2 | A verificação das credenciais é efetuada          |
| Passo 3 | O cadastro é efetuado e a sessão é iniciada       |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O usuário informa seus dados                        |
| Passo 2 | A verificação das credenciais é efetuada            |
| Passo 3 | A sessão não é iniciada e o usuário n é cadastrado  |  

### Campos do formulário

| Campo            | Obrigatório? | Editável? | Formato      |
| ---------------- | ------------ | --------- | ------------ |
| Username         | Sim          | Sim       | Text        |
| Senha            | Sim          | Sim       | Password     |

### Opções dos usuários

| Opção            | Descrição | Atalho |
| ---------------- | ------------ | --------- |
| Cadastre-se      | Efetua o cadastro do usuário e o redireciona para a home com a sessão ativa | Não possui       |

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
| Como um **usuário**, eu preciso ser capaz de **realizar cadastro** na plataforma BudStrike, para que **eu possa conseguir efetuar o login na plataforma** | Certificar que o usuário **consegue efetuar o cadastro com sucesso com sucesso e acessar a plataforma**. |

### [Protótipo](https://www.figma.com/design/LhzyN0WpcDhjSS0pwQD3PM/Untitled?node-id=0-1&t=qVwaQpORi8sfLeux-0)

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

## RF14 - Controle de Sessão

### Atributos

| Item            | Descrição                               |
| --------------- | --------------------------------------- |
| Caso de uso     | Controle de Sessão                      |
| Resumo          | Implementar funcionalidades de controle de sessão para o sistema de login |
| Ator principal  | Sistema                                  |
| Ator secundário | -                                       |
| Pré-condição    | O usuário deve estar autenticado        |
| Pós-condição    | A sessão do usuário é mantida de forma segura |

### Fluxo principal

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O sistema verifica se o usuário está autenticado   |
| Passo 2 | Se autenticado, o sistema inicia a sessão do usuário |
| Passo 3 | A sessão é mantida enquanto o usuário estiver ativo |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | Se o usuário não estiver autenticado, a sessão não é iniciada |
| Passo 2 | Se a sessão expirar ou o usuário se desconectar, ele será redirecionado para a página de login |

### Funcionalidades de Controle de Sessão

- Iniciar sessão: Iniciar uma nova sessão para um usuário autenticado.
- Manter sessão ativa: Garantir que a sessão do usuário permaneça ativa enquanto estiver usando o sistema.
- Encerrar sessão: Permitir que o usuário encerre sua sessão e se desconecte do sistema.
- Verificar sessão: Verificar se a sessão do usuário ainda está ativa e válida.

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
|Como **sistema**, eu preciso de um **controle de sessão eficiente**, para que **as informações do usuário sejam mantidas seguras e a sessão não seja perdida durante o uso do sistema** | Certificar que o controle de sessão **funciona corretamente e mantém a segurança das informações do usuário**. |

### [Protótipo](https://www.figma.com/design/LhzyN0WpcDhjSS0pwQD3PM/Untitled?node-id=0-1&t=qVwaQpORi8sfLeux-0)

---

## **Quarta Iteração**

## RF15 - Readequar o README.md

### Atributos

| Item            | Descrição                               |
| --------------- | --------------------------------------- |
| Caso de uso     | Readequar o README.md                   |
| Resumo          | Atualizar o README.md para refletir as mudanças e estrutura do projeto |
| Ator principal  | Desenvolvedor                           |
| Ator secundário | -                                       |
| Pré-condição    | Ter acesso ao projeto                   |
| Pós-condição    | O README.md atualizado e disponível no repositório |

### Fluxo principal

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | Acessar o repositório do projeto                    |
| Passo 2 | Abrir o arquivo README.md                           |
| Passo 3 | Atualizar as seções do README.md com informações relevantes ao modelo MVC |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | Se o arquivo README.md não existe, criar um novo    |
| Passo 2 | Adicionar as seções necessárias e informações relevantes |
| Passo 3 | Salvar e confirmar as alterações no repositório     |

### Seções do README.md

| Seção              | Obrigatório? | Descrição                         |
| ------------------ | ------------ | --------------------------------- |
| Descrição do Projeto | Sim          | Breve descrição do projeto         |
| Estrutura do Projeto | Sim          | Descrição da estrutura MVC         |
| Requisitos         | Sim          | Requisitos para rodar o projeto    |
| Instruções de Instalação | Sim          | Passos para instalar o projeto      |
| Instruções de Uso  | Sim          | Como usar o projeto                |
| Contribuição       | Não          | Como contribuir para o projeto     |
| Licença            | Não          | Licença do projeto                 |

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
|Como um **desenvolvedor**, eu preciso que o **README.md** esteja atualizado, para que **eu possa entender a estrutura do projeto e contribuir com ele** | Certificar que o README.md **reflete com precisão a estrutura e funcionalidade do projeto**. |

---

## RF16 - Readequar o View

### Atributos

| Item            | Descrição                               |
| --------------- | --------------------------------------- |
| Caso de uso     | Readequar a View                        |
| Resumo          | Ajustar a camada de visualização para o modelo MVC |
| Ator principal  | Desenvolvedor                           |
| Ator secundário | -                                       |
| Pré-condição    | Ter acesso ao código fonte              |
| Pós-condição    | As Views estão ajustadas para o modelo MVC |

### Fluxo principal

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | Identificar todas as Views no projeto               |
| Passo 2 | Reestruturar as Views de acordo com o modelo MVC    |
| Passo 3 | Testar as Views para garantir que funcionam corretamente |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | Se uma View não funcionar corretamente após reestruturação, corrigir os erros |
| Passo 2 | Retestar para garantir que a View funcione corretamente |

### Seções da View

| Seção              | Obrigatório? | Descrição                         |
| ------------------ | ------------ | --------------------------------- |
| Estrutura HTML     | Sim          | Estrutura básica de cada View     |
| Inclusão de Templates | Sim       | Uso de templates para partes comuns |
| Estilos CSS        | Sim          | Aplicação de estilos adequados    |
| Scripts JS         | Sim          | Inclusão de scripts necessários   |

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
|Como um **desenvolvedor**, eu preciso que as **Views estejam estruturadas de acordo com o modelo MVC**, para que **o código seja mais organizado e fácil de manter** | Certificar que as Views **funcionam corretamente e estão organizadas conforme o modelo MVC**. |

---

## RF17 - Readequar o Controller

### Atributos

| Item            | Descrição                               |
| --------------- | --------------------------------------- |
| Caso de uso     | Readequar o Controller                  |
| Resumo          | Ajustar a camada de controle para o modelo MVC |
| Ator principal  | Desenvolvedor                           |
| Ator secundário | -                                       |
| Pré-condição    | Ter acesso ao código fonte              |
| Pós-condição    | Os Controllers estão ajustados para o modelo MVC |

### Fluxo principal

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | Identificar todos os Controllers no projeto         |
| Passo 2 | Reestruturar os Controllers de acordo com o modelo MVC |
| Passo 3 | Testar os Controllers para garantir que funcionam corretamente |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | Se um Controller não funcionar corretamente após reestruturação, corrigir os erros |
| Passo 2 | Retestar para garantir que o Controller funcione corretamente |

### Seções do Controller

| Seção              | Obrigatório? | Descrição                         |
| ------------------ | ------------ | --------------------------------- |
| Métodos de Controle| Sim          | Métodos para cada ação do usuário |
| Validação de Dados | Sim          | Validação dos dados de entrada    |
| Redirecionamentos  | Sim          | Redirecionamentos após ações      |

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
|Como um **desenvolvedor**, eu preciso que os **Controllers estejam estruturados de acordo com o modelo MVC**, para que **o código seja mais organizado e fácil de manter** | Certificar que os Controllers **funcionam corretamente e estão organizados conforme o modelo MVC**. |

---

## RF18 - Readequar o Model

### Atributos

| Item            | Descrição                               |
| --------------- | --------------------------------------- |
| Caso de uso     | Readequar o Model                       |
| Resumo          | Ajustar a camada de modelo para o modelo MVC |
| Ator principal  | Desenvolvedor                           |
| Ator secundário | -                                       |
| Pré-condição    | Ter acesso ao código fonte              |
| Pós-condição    | Os Models estão ajustados para o modelo MVC |

### Fluxo principal

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | Identificar todos os Models no projeto              |
| Passo 2 | Reestruturar os Models de acordo com o modelo MVC   |
| Passo 3 | Testar os Models para garantir que funcionam corretamente |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | Se um Model não funcionar corretamente após reestruturação, corrigir os erros |
| Passo 2 | Retestar para garantir que o Model funcione corretamente |

### Seções do Model

| Seção              | Obrigatório? | Descrição                         |
| ------------------ | ------------ | --------------------------------- |
| Atributos          | Sim          | Definição de atributos do modelo  |
| Métodos CRUD       | Sim          | Métodos para criar, ler, atualizar e deletar registros |
| Relacionamentos    | Sim          | Definição de relacionamentos entre modelos |

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
|Como um **desenvolvedor**, eu preciso que os **Models estejam estruturados de acordo com o modelo MVC**, para que **o código seja mais organizado e fácil de manter** | Certificar que os Models **funcionam corretamente e estão organizados conforme o modelo MVC**. |

---
## **Quinta Iteração**

## RF19 - Criação de Endpoints para Listar Produtos

### Atributos

| Item            | Descrição                                     |
| --------------- | --------------------------------------------- |
| Caso de uso     | Listar produtos                               |
| Resumo          | Criar endpoints para listar produtos na base de dados |
| Ator principal  | Desenvolvedor                                 |
| Ator secundário | Sistema de gerenciamento de produtos          |
| Pré-condição    | Ter produtos cadastrados na base de dados     |
| Pós-condição    | Os produtos são listados conforme solicitado  |

### Fluxo principal

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O desenvolvedor acessa o endpoint de listagem de produtos |
| Passo 2 | O sistema recupera todos os produtos da base de dados |
| Passo 3 | O sistema retorna a lista de produtos em formato JSON |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O desenvolvedor acessa o endpoint de listagem de produtos |
| Passo 2 | O sistema não encontra produtos cadastrados         |
| Passo 3 | O sistema retorna uma resposta indicando que não há produtos disponíveis |

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
| Como um **desenvolvedor**, eu preciso de um **endpoint para listar produtos**, para que **eu possa visualizar todos os produtos cadastrados na base de dados** | Certificar que o endpoint **retorna todos os produtos cadastrados corretamente**. |

---

## RF20 - Criação de Endpoints para Criar Produtos

### Atributos

| Item            | Descrição                                     |
| --------------- | --------------------------------------------- |
| Caso de uso     | Criar produtos                                |
| Resumo          | Criar endpoints para adicionar novos produtos na base de dados |
| Ator principal  | Desenvolvedor                                 |
| Ator secundário | Sistema de gerenciamento de produtos          |
| Pré-condição    | Ter as informações necessárias para criar um novo produto |
| Pós-condição    | O produto é adicionado à base de dados        |

### Fluxo principal

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O desenvolvedor envia uma requisição POST com os dados do novo produto |
| Passo 2 | O sistema valida os dados do produto                |
| Passo 3 | O sistema insere o novo produto na base de dados    |
| Passo 4 | O sistema retorna uma resposta de sucesso com os detalhes do produto criado |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O desenvolvedor envia uma requisição POST com os dados do novo produto |
| Passo 2 | O sistema valida os dados do produto                |
| Passo 3 | O sistema detecta dados inválidos                   |
| Passo 4 | O sistema retorna uma resposta de erro indicando quais dados estão incorretos |

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
| Como um **desenvolvedor**, eu preciso de um **endpoint para criar produtos**, para que **eu possa adicionar novos produtos na base de dados** | Certificar que o endpoint **permite a criação de novos produtos e retorna os detalhes do produto criado corretamente**. |

---

## RF21 - Criação de Endpoints para Atualizar Produtos

### Atributos

| Item            | Descrição                                     |
| --------------- | --------------------------------------------- |
| Caso de uso     | Atualizar produtos                            |
| Resumo          | Criar endpoints para atualizar produtos existentes na base de dados |
| Ator principal  | Desenvolvedor                                 |
| Ator secundário | Sistema de gerenciamento de produtos          |
| Pré-condição    | Ter um produto existente na base de dados     |
| Pós-condição    | O produto é atualizado com os novos dados     |

### Fluxo principal

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O desenvolvedor envia uma requisição PUT com os dados atualizados do produto |
| Passo 2 | O sistema valida os novos dados do produto          |
| Passo 3 | O sistema atualiza o produto na base de dados       |
| Passo 4 | O sistema retorna uma resposta de sucesso com os detalhes do produto atualizado |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O desenvolvedor envia uma requisição PUT com os dados atualizados do produto |
| Passo 2 | O sistema valida os novos dados do produto          |
| Passo 3 | O sistema detecta dados inválidos                   |
| Passo 4 | O sistema retorna uma resposta de erro indicando quais dados estão incorretos |

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
| Como um **desenvolvedor**, eu preciso de um **endpoint para atualizar produtos**, para que **eu possa modificar os dados de produtos existentes na base de dados** | Certificar que o endpoint **permite a atualização de produtos e retorna os detalhes do produto atualizado corretamente**. |

---

## RF22 - Criação de Endpoints para Deletar Produtos

### Atributos

| Item            | Descrição                                     |
| --------------- | --------------------------------------------- |
| Caso de uso     | Deletar produtos                              |
| Resumo          | Criar endpoints para remover produtos da base de dados |
| Ator principal  | Desenvolvedor                                 |
| Ator secundário | Sistema de gerenciamento de produtos          |
| Pré-condição    | Ter um produto existente na base de dados     |
| Pós-condição    | O produto é removido da base de dados         |

### Fluxo principal

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O desenvolvedor envia uma requisição DELETE com o ID do produto |
| Passo 2 | O sistema valida a existência do produto            |
| Passo 3 | O sistema remove o produto da base de dados         |
| Passo 4 | O sistema retorna uma resposta de sucesso indicando que o produto foi deletado |

### Fluxo alternativo

| Passos  | Descrição                                           |
| ------- | --------------------------------------------------- |
| Passo 1 | O desenvolvedor envia uma requisição DELETE com o ID do produto |
| Passo 2 | O sistema valida a existência do produto            |
| Passo 3 | O sistema não encontra o produto na base de dados   |
| Passo 4 | O sistema retorna uma resposta de erro indicando que o produto não foi encontrado |

### User Story

|User Story|Critério de Avaliação|
|    --    |         ---         |
| Como um **desenvolvedor**, eu preciso de um **endpoint para deletar produtos**, para que **eu possa remover produtos indesejados da base de dados** | Certificar que o endpoint **permite a remoção de produtos e retorna uma confirmação de que o produto foi deletado corretamente**. |

---