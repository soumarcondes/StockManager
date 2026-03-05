# 📦 Stock Manager - Sistema de Gestão de Estoque

O **Stock Manager** é um sistema web desenvolvido para facilitar a gestão de estoque em empresas e ambientes logísticos.  
Permite o gerenciamento completo de produtos, fornecedores e categorias, proporcionando controle administrativo eficiente e organização das informações.

---

## 🚀 Funcionalidades

### 🔐 Autenticação
- Login de usuários
- Cadastro de novos usuários
- Sistema de sessão
- Estrutura preparada para recuperação de senha

---

### 📦 Gestão de Produtos
- Cadastro de produtos
- Edição de informações
- Exclusão de registros
- Consulta de saldo disponível
- Associação com fornecedor e categoria

---

### 🏢 Gestão de Fornecedores
- Cadastro de fornecedores
- Edição de dados
- Exclusão de registros
- Controle de contato e relacionamento com produtos

---

### 🗂 Gestão de Categorias
- Cadastro de categorias
- Edição
- Exclusão
- Relacionamento com produtos e fornecedores

---

## 🛠 Tecnologias Utilizadas

- **PHP (PDO)** – Backend e manipulação do banco de dados
- **MySQL** – Banco de dados relacional
- **HTML5** – Estrutura das páginas
- **CSS3** – Estilização e layout
- **JavaScript** – Validações e interações
- **phpMyAdmin** – Gerenciamento do banco

---

## 🏗 Estrutura do Projeto

│StockManager/

├── css/

├── js/

├── img/

├── conexao.php

├── login.php

├── index.php

├── produtos.php

├── fornecedores.php

├── categorias.php

├── inserir_*.php

├── editar_*.php

├── excluir_*.php

O projeto segue uma organização modular separando operações de inserção, edição e exclusão por entidade.

---

## 🗄 Estrutura do Banco de Dados

O sistema utiliza banco de dados relacional com as seguintes entidades principais:

- produtos
- fornecedores
- categorias
- usuarios

Relacionamentos são realizados utilizando chaves estrangeiras e consultas JOIN.

---

## 🔒 Segurança

- Uso de Prepared Statements (PDO)
- Proteção contra SQL Injection
- Controle de sessão
- Validação de dados via backend e frontend

---

## 📱 Interface

- Layout administrativo
- Navegação por menu superior
- Tabelas organizadas
- Sistema responsivo

---

## 🌐 Acesso ao Projeto

🔗 Demonstração online:  
http://stockmanager.great-site.net

---

## 📈 Melhorias Futuras

- Dashboard com indicadores
- Controle de movimentação de estoque
- Relatórios em PDF
- Sistema de permissões avançado
- API REST
- Versão mobile

---

## 👨‍💻 Desenvolvedor

Projeto desenvolvido por Mateus como prática de consolidação de conhecimentos em desenvolvimento web e sistemas administrativos.
