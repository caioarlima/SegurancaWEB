# 🛡️ SegurancaWEB - Laboratório de Estudos

Este é um projeto desenvolvido para **aprendizado pessoal** focado em **Segurança Web**. O objetivo principal é estudar, demonstrar vulnerabilidades comuns e implementar as correções utilizando as melhores práticas de desenvolvimento PHP.

## 🚀 Tecnologias e Ambiente
Para este laboratório, utilizei uma stack moderna e isolada em containers:
* **PHP 8.x** (Lógica de servidor e conexão segura via PDO)
* **HTML5 & CSS3** (Interface e estruturação do laboratório)
* **Docker & Laradock** (Ambiente de desenvolvimento conteinerizado)
* **MySQL** (Banco de dados relacional para testes de persistência)
* **phpMyAdmin** (Gerenciamento do banco e teste de queries)

## 🔒 Diferenciais de Segurança
Neste projeto, apliquei conceitos fundamentais de proteção de infraestrutura:
* **Root Folder Segura:** O servidor web (Nginx/Apache) aponta exclusivamente para a pasta `public/`, impedindo que arquivos de sistema, logs e configurações sejam acessados via URL.
* **Roteamento por Whitelist:** O `index.php` utiliza uma lista de páginas permitidas para evitar falhas críticas de **LFI (Local File Inclusion)**.
* **Proteção de Credenciais:** Uso estratégico do `.gitignore` para garantir que o arquivo `conn.php` com senhas reais nunca seja exposto no GitHub.

## 🧪 Vulnerabilidades Estudadas e Corrigidas
O projeto contém exemplos práticos de ataque e defesa para:
1.  **XSS (Cross-Site Scripting):** Demonstração da falha e correção via sanitização de inputs.
2.  **SQL Injection:** Testes de invasão via formulários e blindagem utilizando **Prepared Statements** com PDO.
3.  **CSRF (Cross-Site Request Forgery):** Proteção de requisições utilizando validação de **Tokens de Segurança** por sessão.

## 🛠️ Como rodar o projeto
Para que o projeto funcione corretamente no seu ambiente, siga estes passos:

1.  **Clone o repositório.**
2.  **Suba o ambiente Laradock:** Acesse sua pasta do Laradock e rode: `docker-compose up -d nginx mysql phpmyadmin`.
3.  **Confira suas credenciais:** * Abra o arquivo `.env` dentro da sua pasta **laradock**.
    * Verifique os valores de: `MYSQL_DATABASE`, `MYSQL_USER`, `MYSQL_PASSWORD` e `MYSQL_PORT`.
4.  **Configure a Conexão:**
    * Na raiz deste projeto, copie o arquivo `conn.example.php` e renomeie a cópia para **`conn.php`**.
    * Preencha as variáveis do `conn.php` com os dados exatos que você encontrou no `.env` do seu Laradock.
5.  **Validação de Portas:** Rode `docker ps` no terminal para garantir que os containers estão "Up" e confirmar se a porta do MySQL bate com a configuração.
6.  **Acesso:** Acesse o projeto via navegador no domínio configurado no seu Laradock (ex: `localhost` ou `seguranca.test`).
