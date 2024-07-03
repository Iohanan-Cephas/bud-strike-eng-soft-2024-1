# Engenharia de Software - 2024.1 | Universidade Federal do Tocantins

#### Curso: Ciência da Computação

#### Professor: Edeilson Milhomem da Silva

#### Monitor: João Gabriel Alves de Souza

### Time: [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas), [João Pedro Oliveira Barbosa](https://github.com/Iohanan-Cephas), [Laura Barbosa Henrique](https://github.com/tinywin), [Micael Ribeiro dos Santos](https://github.com/messiribeiro), [Wanderson Almeida de Mello](https://github.com/sadMello)

---

## **BudStrike**

### Descrição

BudStrike é o seu destino exclusivo para dispositivos eletrônicos de última geração. Nosso compromisso é proporcionar uma experiência de compra excepcional, impulsionando a velocidade de processamento de dados e garantindo entregas rápidas aos nossos clientes. Estamos constantemente refinando nossos processos para atingir a excelência, dando passos calculados em direção ao nosso objetivo.
---
### [Landing Page](https://iohanan-cephas.github.io)
---
### [**Quadro Kanban**](https://trello.com/invite/b/tPgaPmj9/ATTI9322d3ccbbdcf979852e4b31748fad8846F0ABED/budstrike)

---

### [**Event Storm**](https://drive.google.com/file/d/1v-ndP5GvuhIqXTeI1m_8dL8Ox9ylKL4t/view)

---

### [**Prototipação**](https://www.figma.com/design/LhzyN0WpcDhjSS0pwQD3PM/Untitled?node-id=0-1&t=qVwaQpORi8sfLeux-0)

---

### [**Requisitos Funcionais**](/requisitos.md)

---

### [**Histórico de Versões e Atualizações**](https://github.com/Iohanan-Cephas/bud-strike-eng-soft-2024-1/tags)

---

### [**Apresentação final**](https://www.canva.com/design/DAGJ2JYu9jo/4FJ-I7OW2LUsGMU0dCFKJw/edit?utm_content=DAGJ2JYu9jo&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton)

---

[**v1.0.0**](https://github.com/Iohanan-Cephas/bud-strike-eng-soft-2024-1/releases/tag/v1.0.0) - Primeira Iteração: Levantamento de Rquisitos para o estudo compreenção dos Casos de Uso e User Story

[**v1.0.1**](https://github.com/Iohanan-Cephas/bud-strike-eng-soft-2024-1/releases/tag/v1.0.1) - Segunda Iteração: CRUD dos produtos a serem vendidos.

[**v1.0.2**](https://github.com/Iohanan-Cephas/bud-strike-eng-soft-2024-1/releases/tag/v1.0.2) - Terceira Iteração: Módulo de Login e Controle de Sessão, Atualizações.

[**v2.0.0**](https://github.com/Iohanan-Cephas/bud-strike-eng-soft-2024-1/releases/tag/v2.0.0) - Quarta Iteração: Readequação do projeto para o modelo arquitetural MVC e Readequação da Documentação.

[**v2.1.0**](https://github.com/Iohanan-Cephas/bud-strike-eng-soft-2024-1/releases/tag/v2.1.0) - Quinta Iteração: Implementação de uma API RESTful para gerenciar produtos. Isso inclui a criação de endpoints para listar, criar, atualizar e deletar produtos.

[**v2.2.0**](https://github.com/Iohanan-Cephas/bud-strike-eng-soft-2024-1/releases/tag/v2.2.0) - Sexta Iteração: Implementação dos Testes Unitários para garantir a funcionalidade do programa.

---
### Rodando o projeto

- Pré-requisitos

    Certifique-se de que estejam instalados em seu PC as seguintes ferramentas:
    
    - [PHP](https://www.php.net/downloads.php) (versão 7.4 ou superior)
    - [Composer](https://getcomposer.org/download/)
    - [Git](https://git-scm.com/downloads)

- Passo a passo
   1. Clone o Repositório

      Clone o repositório para sua máquina local usando o seguinte comando:
      ```bash
      git clone https://github.com/Iohanan-Cephas/bud-strike-eng-soft-2024-1.git
       ```
   2. Execute o Composer
      
      Na raíz do projeto clonado, utilize o seguinte comando para fazer a conexão automática com o banco de dados:
      ```bash
      docker-compose up -d
      ```
  1. Abra seu navegador
     
     Após terminada a conexão, abra seu navegador de preferência e busque a página:
     ```bash
     localhost:8080
     ```
     Você será direcionado para uma página em que está escrito "Infelizmente a versão para PC ainda não está disponível". Inspecionando a página coloque a resolução para mobile L (ou abaixo) e após se deparar com a tela de login, crie uma conta para utilizar o site e testar suas funcionalidades.

---

### [**Primeira Iteração**](/requisitos.md) - 13/03 - 27/03

Valor: Levantamento de Rquisitos para o estudo compreenção dos Casos de Uso e User Story.

Planejamento e Execução:

- [X] RF01 - Realizar Login do Usuário. Por [Wanderson Almeida de Mello](https://github.com/sadMello) Revisado por [Micael](https://github.com/messiribeiro)

- [X] RF02 - Realizar Cadastro do Usuário. Por [Micael Ribeiro dos Santos](https://github.com/messiribeiro) Revisado por [Wanderson](https://github.com/sadMello)

- [X] RF03 - Realizar Cadastro do Produto. Por [Laura Barbosa Henrique](https://github.com/tinywin) Revisado por [André Barcelos](https://github.com/andrebarceloschagas)

- [X] RF04- Visualizar Produto. Por [João Pedro Oliveira Barbosa](https://github.com/Iohanan-Cephas) Revisado por [Laura](https://github.com/tinywin)

- [X] RF05 - Visualizar Página Principal. Por [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas) Revisado por [João Pedro](https://github.com/Iohanan-Cephas)

---

### [**Segunda Iteração**](/requisitos.md) 27/03 - 17/04

Valor: CRUD dos produtos a serem vendidos.

Planejamento e Execução:

- [X] RF06 - Visualizar Produto. Por [Wanderson Almeida de Mello](https://github.com/sadMello) Revisado por [João Pedro](https://github.com/Iohanan-Cephas)

- [X] RF07 - Deletar Produto. Por [Micael Ribeiro dos Santos](https://github.com/messiribeiro) Revisado por [Wanderson](https://github.com/sadMello)

- [X] RF08 - Cadastrar Produto. Por [João Pedro Oliveira Barbosa](https://github.com/Iohanan-Cephas) Revisado por [André Barcelos](https://github.com/andrebarceloschagas)

- [X] RF09 - Atualizar Produto. Por [Laura Barbosa Henrique](https://github.com/tinywin) Revisado por [Laura](https://github.com/tinywin)

- [X] RF10 - Fazer a Documentação do Produto. Por [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas) Revisado por [João Pedro](https://github.com/Iohanan-Cephas)

---

### [**Terceira Iteração**](/requisitos.md) 17/04 - 08/05

Valor: Módulo de Login e Controle de Sessão, Atualizações.

Planejamento e Execução:

- [X] RF11 - Atualizar a Documentação. Por [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas) Revisado por [João Pedro](https://github.com/Iohanan-Cephas)

- [X] RF12 - Realizar Cadastro do Usuário Por [Micael Ribeiro dos Santos](https://github.com/messiribeiro) Revisado por [Laura](https://github.com/tinywin)

- [X] RF13 - Realizar Login do Usuário. Por [Laura Barbosa Henrique](https://github.com/tinywin) Revisado po [Micael](https://github.com/messiribeiro)

- [X] RF14 - Controle de Sessao. Por [Wanderson Almeida de Mello](https://github.com/sadMello) Revisado por [André Barcelos](https://github.com/andrebarceloschagas)

---

### [**Quarta Iteração**](/requisitos.md)  08/05 - 22/05

Valor: Readequação do projeto para o modelo arquitetural MVC e Readequação da Documentação.

Planejamento e Execução:

- [X] RF15 - Readequar o README.md. Por [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas) Revisado por [João Pedro](https://github.com/Iohanan-Cephas)

- [X] RF16 - Readequar o View. Por [Micael Ribeiro dos Santos](https://github.com/messiribeiro) Revisado por [Wanderson Almeida de Mello](https://github.com/sadMello)

- [X] RF17 - Readequar o Controller. Por [Wanderson Almeida de Mello](https://github.com/sadMello) Revisado por [André Barcelos](https://github.com/andrebarceloschagas)

- [X] RF18 - Readequar o Model. Por [João Pedro Oliveira Barbosa](https://github.com/Iohanan-Cephas) Revisado por [Laura Barbosa Henrique](https://github.com/tinywin)

---

### [**Quinta Iteração**](/requisitos.md) 22/05–05/06

Valor: Implementação de uma API RESTful para gerenciar produtos. Isso inclui a criação de endpoints para listar, criar, atualizar e deletar produtos.

Planejamento e Execução:

- [X] RF19 - Criação de Endpoints para Listar Produtos. Por [Micael Ribeiro dos Santos](https://github.com/messiribeiro) Revisado por [Wanderson Almeida de Mello](https://github.com/sadMello)
- [X] RF20 - Criação de Endpoints para Criar Produtos. Por [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas) Revisado por [Laura Barbosa Henrique](https://github.com/tinywin)
- [X] RF21 - Criação de Endpoints para Atualizar Produtos. Por [João Pedro Oliveira Barbosa](https://github.com/Iohanan-Cephas) Revisado por [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas)
- [X] RF22 - Criação de Endpoints para Deletar Produtos. Por [Wanderson Almeida de Mello](https://github.com/sadMello) Revisado por [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas)

---

### **Sexta Iteração**

Valor: Implementação dos Testes Unitários para garantir a funcionalidade do programa.

Planejamento e Execução:

- [X] RF23 - Implementação de Testes Unitários nos Controllers. Por [Antonio André Barcelos Chagas](https://github.com/andrebarceloschagas) e Por [João Pedro Oliveira Barbosa](https://github.com/Iohanan-Cephas) Revisado por [Wanderson Almeida de Mello](https://github.com/sadMello)
- [X] RF24 - Implementação de Testes Unitários nos Models. [Laura Barbosa Henrique](https://github.com/tinywin) e [Wanderson Almeida de Mello](https://github.com/sadMello) Revisado por [Micael Ribeiro dos Santos](https://github.com/messiribeiro)
- [X] RF25 - Implementação dos requisitos atrasados. Por [Micael Ribeiro dos Santos](https://github.com/messiribeiro) Revisado por [João Pedro Oliveira Barbosa](https://github.com/Iohanan-Cephas)

---
