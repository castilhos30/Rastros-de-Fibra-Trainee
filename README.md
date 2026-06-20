# **Trainee 2026.1**

# **Rastros de Fibra**

## **Projeto Trainee, Code Jr, 2026.1**

| **Sumário** |
|-------------|
| [Equipe](#Equipe) |
| [Descrição do Projeto](#Descrição-do-Projeto) |
| [Preparação do Ambiente (Instalações)](#Preparação-do-Ambiente) |
| [Tutorial Git](#Tutorial-Git) |
| [Executando o Projeto](#Executando-o-Projeto) |

---

## Equipe

#### Desenvolvedores:
* [Sophia Sabbo](https://github.com/sosabbo)
* [Gabriela Chapinotti](https://github.com/gbchap)
* [Guilherme Perisse](https://github.com/GPerisse)
* [Heitor Tetzner](https://github.com/heitortetznerpereira)

#### Scrum Master:
* [Marcos Castilhos](https://github.com/castilhos30).

#### Links Úteis:
* [Trello do Projeto](https://trello.com/b/yubB6yT1/261-trello-rastros-de-fibra)

---

## Descrição do Projeto

Rastros de Fibra é uma plataforma desenvolvida para reunir praticantes e entusiastas da musculação em um espaço dedicado ao compartilhamento de experiências, aprendizados e conquistas dentro da academia.

Mais do que um simples blog, o projeto busca construir uma comunidade que valoriza a disciplina, a evolução constante e as histórias que surgem ao longo da jornada de treinamento. Cada postagem representa um relato de superação, consistência ou descoberta, reforçando a ideia de que cada repetição e cada treino contribuem para resultados que vão além da estética.

O objetivo da plataforma é dar visibilidade às vivências de seus usuários, promovendo a troca de conhecimento, motivação e inspiração entre pessoas que compartilham a mesma paixão pelo treinamento físico. Aqui, o chão da academia se transforma em palco para histórias reais, onde esforço, dedicação e progresso são celebrados a cada série concluída.

Funcionalidades
Publicação e compartilhamento de posts relacionados à musculação;
Interação entre membros da comunidade;
Espaço para relatos de evolução e experiências pessoais;
Ambiente focado em motivação, aprendizado e troca de conhecimento;
Interface simples e acessível para leitura e criação de conteúdo.
Objetivo do Projeto

Este projeto foi desenvolvido como parte do programa de trainees de uma empresa júnior, com o propósito de aplicar conceitos de desenvolvimento web na construção de uma plataforma funcional, moderna e centrada na experiência do usuário.

* Blog / Sistema de treinamento e capacitação dos Trainees da CodeJR, na gestão 2026.1;
---

## Preparação do Ambiente

Para rodar este projeto, você precisará de algumas ferramentas. Você pode instalá-las rapidamente via terminal utilizando o **Winget** (Gerenciador de pacotes nativo do Windows) ou pelos links de download tradicionais.

> **Não tem o Winget instalado?**
> Verifique abrindo o terminal e digitando `winget -v`. Se der erro, abra o **PowerShell** como administrador e rode:
> ```powershell
> Invoke-WebRequest -Uri [https://aka.ms/getwinget](https://aka.ms/getwinget) -OutFile winget.msixbundle
> Add-AppxPackage winget.msixbundle
> ```

### 1. Git
Ferramenta de versionamento de código.
* **Via Winget:** `winget install --id Git.Git -e --source winget`
* **Download Manual:** [Página de Downloads do Git](https://git-scm.com/downloads)

### 2. Node.js
Ambiente de execução JavaScript (necessário para alguns pacotes e ferramentas de front-end).
* **Via Winget:** `winget install OpenJS.NodeJS`
* **Download Manual:** [Site Oficial do Node.js](https://nodejs.org/)

### 3. Docker Desktop
Para rodar contêineres e facilitar a configuração do banco de dados e ambiente.
* **Via Winget:** `winget install -e --id Docker.DockerDesktop`
* **Download Manual:** [Site Oficial do Docker](https://www.docker.com/products/docker-desktop/)

### 4. PHP (8.0+)
A linguagem base do nosso Back-End.
* **Via Winget:** `winget install php`
* **Download Manual:** [Downloads PHP para Windows](https://windows.php.net/download/)

### 5. Composer
Gerenciador de dependências do PHP.
* **Via Winget:** `winget install Composer.Composer`
* **Download Manual:** [Site Oficial do Composer](https://getcomposer.org/download/)

---

## Tutorial Git

### Primeira Configuração
Após instalar o Git, abra o terminal e configure suas credenciais <sub>(Substitua o nome e o e-mail para o seu)</sub>:
```bash
git config --global user.name "nomeDeUsuario"
git config --global user.email email@codejr.com.br
```
## Tutorial Git

### Primeira Configuração
Após instalar o DockerDesktop, abra o terminal e execute o seguinte comando para baixar todas as dependências necessárias:
```bash
docker-compose up -d --build
```
### Após a primeira configuração
Não é necessário executar o build após a primeira vez, sendo assim execute apenas o comando a seguir:
```bash
docker-compose up -d
```
