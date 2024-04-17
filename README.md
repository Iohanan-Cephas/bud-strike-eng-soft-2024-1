# Engenharia de Software - 2024.1 | Universidade Federal do Tocantins

## BudStrike

### Descrição

BudStrike é o seu destino exclusivo para dispositivos eletrônicos de última geração. Nosso compromisso é proporcionar uma experiência de compra excepcional, impulsionando a velocidade de processamento de dados e garantindo entregas rápidas aos nossos clientes. Estamos constantemente refinando nossos processos para atingir a excelência, dando passos calculados em direção ao nosso objetivo.

### Definindo os requisitos e seus colaboradores

---

#### [Primeira Iteração](#primeira-iteração)

- [X] [RF01](#rf01---realizar-login-do-usuário) - Realizar Login do Usuário. Por [Wanderson Almeida de Mello](https://github.com/sadMello) Revisado por [Micael](https://github.com/messiribeiro)

- [X] [RF02](#rf02---realizar-cadastro-do-usuário) - Realizar Cadastro do Usuário. Por [Micael Ribeiro dos Santos](https://github.com/messiribeiro) Revisado por [Wanderson](https://github.com/sadMello)

- [X] [RF03](#rf03---realizar-cadastro-do-produto) - Realizar Cadastro do Produto. Por [Laura Barbosa Henrique](https://github.com/tinywin) Revisado por [André Barcelos](https://github.com/andrebarceloschagas)

- [X] [RF04](#rf04---visualizar-produto) - Visualizar Produto. Por [João Pedro Oliveira Barbosa](https://github.com/Iohanan-Cephas) Revisado por [Laura](https://github.com/tinywin)

- [X] [RF05](#rf05---visualizar-página-principal) - Visualizar Página Principal. Por [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas) Revisado por [João Pedro](https://github.com/Iohanan-Cephas)

---

#### [Segunda Iteração](#segunda-iteração)

- [X] [RF06](#rf06---read) - Read. Por [Wanderson Almeida de Mello](https://github.com/sadMello) Revisado por [João Pedro](https://github.com/Iohanan-Cephas)

- [X] [RF07](#rf07---delete) - Delete. Por [Micael Ribeiro dos Santos](https://github.com/messiribeiro) Revisado por [Wanderson](https://github.com/sadMello)

- [X] [RF08](#rf08---create) - Create. Por [João Pedro Oliveira Barbosa](https://github.com/Iohanan-Cephas) Revisado por [André Barcelos](https://github.com/andrebarceloschagas)

- [X] [RF09](#rf09---update) - Updade. Por [Laura Barbosa Henrique](https://github.com/tinywin) Revisado por [Laura](https://github.com/tinywin)

- [X] [RF10](#rf10---documentação-foi-executado-a-atualização-do-readme-e-docstrings-nos-códigos) - Documentação. Por [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas) Revisado por [João Pedro](https://github.com/Iohanan-Cephas)

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

Objeto dessa iteração, o CRUD é um acrônimo para as quatro operações básicas que você pode realizar em qualquer dado persistente em um banco de dados. As letras representam as seguintes operações:

- **C**: Create (Criar) - Adiciona novos dados ao banco de dados.
- **R**: Read (Ler) - Lê os dados existentes do banco de dados.
- **U**: Update (Atualizar) - Modifica os dados existentes no banco de dados.
- **D**: Delete (Deletar) - Remove dados do banco de dados.

Para esse iteração específica foi feito o CRUD dos produtos.

## RF06 - Read

## RF07 - Delete

## RF08 - Create

## RF09 - Update

## RF10 - Documentação

### Guia de Uso

Features futuras.

1. **Navegação**: Ao acessar o BudStrike, o usuário pode navegar pela seleção de dispositivos eletrônicos de última geração. Ele pode usar a barra de pesquisa para procurar por produtos específicos ou navegar pelas categorias para explorar a gama de produtos.

2. **Seleção de Produtos**: Quando o usuário encontrar um produto que lhe interessa, ele pode clicar nele para ver mais detalhes. Aqui, ele pode ver informações detalhadas sobre o produto, incluindo especificações, preço e avaliações de outros clientes.

3. **Adicionar ao Carrinho**: Se o usuário decidir comprar um produto, ele pode clicar no botão "Adicionar ao Carrinho". Ele pode continuar comprando e adicionar quantos itens quiser ao seu carrinho.

4. **Checkout**: Quando o usuário estiver pronto para finalizar a compra, ele pode ir para o seu carrinho e clicar em "Checkout". Aqui, ele pode revisar os itens no seu carrinho, adicionar ou remover itens e ver o total da sua compra.

5. **Pagamento**: Na página de checkout, o usuário também pode selecionar o seu método de pagamento preferido e inserir as informações necessárias. BudStrike aceita vários métodos de pagamento para sua conveniência.

6. **Confirmação do Pedido**: Depois de confirmar o seu pedido, BudStrike processará o pedido do usuário e o enviará o mais rápido possível. O usuário receberá uma confirmação por e-mail com os detalhes do seu pedido e informações de rastreamento quando o seu pedido for enviado.

7. **Suporte ao Cliente**: Se o usuário tiver qualquer problema ou dúvida durante o processo de compra, a equipe de suporte ao cliente está pronta para ajudar. O usuário pode entrar em contato com eles através da página de contato.

### Guia de Instalação

Para usuários em geral, o BudStrike funcionará em qualquer navegador atualizado e uma boa conexão com a internet.

Aqui estão as instruções passo a passo para configurar o BudStrike no ambiente local dos desenvolvedores. As tecnologias necessárias incluem **PHP**, **HTML**, **CSS**, **Docker**, **MySQL**, **phpMyAdmin**, **Git**, **GitHub** e **GitFlow**.

1. **Instalação do PHP**: Primeiro, precisa ter o PHP instalado no sistema dele. Ele pode baixar o PHP do [site oficial](https://www.php.net/downloads.php) e seguir as instruções de instalação.

2. **Instalação do Docker**: O Docker é usado para criar, implantar e executar aplicativos usando contêineres. Pode baixar o Docker do [site oficial](https://www.docker.com/products/docker-desktop) e seguir as instruções de instalação.

3. **Instalação do MySQL**: O MySQL é o sistema de gerenciamento de banco de dados que usamos. Pode baixar o MySQL do [site oficial](https://dev.mysql.com/downloads/installer/) e seguir as instruções de instalação.

4. **Instalação do phpMyAdmin**: O phpMyAdmin é uma ferramenta gratuita e de código aberto que é usada para administrar o MySQL. O desenvolvedor pode baixar o phpMyAdmin do [site oficial](https://www.phpmyadmin.net/downloads/) e seguir as instruções de instalação.

5. **Instalação do Git**: O Git é um sistema de controle de versão distribuído. Pode baixar o Git do [site oficial](https://git-scm.com/downloads) e seguir as instruções de instalação.

6. **Conta no GitHub**: O usuário precisa de uma conta no GitHub para contribuir para o projeto BudStrike. Se ele ainda não tem uma, pode criar uma no [site do GitHub](https://github.com/join).

### Contribuição

As seguintes diretrizes são usadas pela equipe de desenvolvimento:

1. **Fork do Repositório**: O primeiro passo para um contribuinte é fazer um fork do repositório original [BudStrike](https://github.com/Iohanan-Cephas/bud-strike-eng-soft-2024-1) para a conta GitHub dele. Isso cria uma cópia do repositório que pode ser modificada sem afetar o projeto original.

2. **Clone do Repositório**: Depois de fazer o fork, o contribuinte clona o repositório para o ambiente local dele para que possa começar a fazer alterações.

3. **Crie uma Branch**: Antes de começar a trabalhar, o contribuinte cria uma nova branch para as alterações dele. Isso ajuda a manter o trabalho dele separado e organizado.

4. **Faça as suas Alterações**: Agora o contribuinte pode começar a fazer as alterações dele no código. Ele deve se certificar de seguir os padrões de codificação do projeto.

5. **Teste as suas Alterações**: Antes de enviar as alterações, o contribuinte deve se certificar de que elas não quebram nada e que todos os testes passam.

6. **Envie um Pull Request**: Depois de ter feito e testado as alterações, o contribuinte pode enviar um pull request para o repositório original. Isso permite que os mantenedores do projeto revisem as alterações dele e, se aprovadas, as integrem ao projeto.

7. **Revisão**: O pull request do contribuinte será revisado pelos mantenedores do projeto. Eles podem solicitar alterações ou esclarecimentos sobre as alterações. Este é um processo normal e uma oportunidade para o contribuinte aprender e melhorar o código dele.

### Histórico de Versões e Atualizações

1. **1.0.0** - Primeira Iteração: Levantamento de Rquisitos para o estudo compreenção dos Casos de Uso e User Story

2. **2.0.0** - Segunda Iteração: CRUD dos produtos a serem vendidos.
