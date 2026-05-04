# 🚗 Sistema de Gerenciamento de Oficina Mecânica

Sistema web desenvolvido com Laravel para gerenciamento de oficinas mecânicas, permitindo o controle de clientes, veículos, peças, serviços e ordens de serviço.

O projeto foi desenvolvido com foco em organização administrativa, acompanhamento de serviços e controle de acesso por perfis de usuários.

---

## 📌 Objetivo

O sistema tem como finalidade centralizar as operações de uma oficina mecânica em uma única aplicação, facilitando o gerenciamento interno e reduzindo falhas em processos manuais.

Entre os principais objetivos estão:

- organizar cadastros de clientes e veículos;
- controlar serviços e peças utilizadas;
- acompanhar ordens de serviço;
- automatizar o cálculo de valores;
- restringir acessos conforme o perfil do usuário.

---

📄 Licença

Este projeto está licenciado sob os termos da licença MIT.  
Consulte o arquivo [LICENSE](LICENSE) para mais informações.

---

## ⚙️ Funcionalidades

- 🔐 Login com autenticação de usuários
- 👤 Cadastro de clientes
- 🚘 Cadastro de veículos vinculados aos clientes
- 🛠️ Cadastro de serviços
- 📦 Cadastro e controle de peças
- 📋 Criação de ordens de serviço
- ➕ Associação de serviços à OS
- ➕ Associação de peças à OS
- 💰 Cálculo automático do valor total
- 🔄 Controle de status da ordem de serviço
- 📝 Registro de observações técnicas
- 📄 Geração de PDF da ordem de serviço
- 📊 Relatórios administrativos

---

## 👥 Perfis de Usuário

O sistema possui controle de acesso baseado em perfis:

| Perfil        | Permissões                                                      |
|---------------|-----------------------------------------------------------------|
| Administrador | Acesso completo ao sistema                                      |
| Caixa         | Acesso às ordens de serviço,clientes,veículos, peças e serviços |
| Mecânico      | Atualização de serviços, observações e execução das ordens      |


---

## 🛠️ Tecnologias Utilizadas

- PHP
- Laravel
- MySQL
- Bootstrap
- Blade
- HTML / CSS / JavaScript

---

## 🚀 Como Executar o Projeto

1. Clonar o repositório
```
git clone https://github.com/ViniciosWE/sistema_gerenciamento_oficina_mecanica.git
cd sistema_gerenciamento_oficina_mecanica
```
---
2. Instalar dependências
```
composer install
```
---
3. Criar o arquivo de ambiente
```
cp .env.example .env
```
---
4. Configurar banco de dados
   
    Edite o arquivo .env:
```
DB_DATABASE=oficina
DB_USERNAME=root
DB_PASSWORD=
```
---
5. Gerar chave da aplicação
```
php artisan key:generate
```
---
6. Rodar migrations e seeders
```
php artisan migrate:fresh --seed
```
---
7. Iniciar o servidor
```
php artisan serve
```
   Acesse:

```
http://127.0.0.1:8000
```

---

## 🔐 Usuário Padrão

Após executar os seeders:

Email: admin@admin.com

Senha: 123456

---

## 📚 Documentação

A documentação detalhada do projeto está disponível na pasta Documentação.

Link:
```
https://github.com/ViniciosWE/sistema_gerenciamento_oficina_mecanica/tree/master/Documenta%C3%A7%C3%A3o
```
- requisitos_e_caso_uso.pdf -> Requisitos, regras de negócio e casos de uso
- diagrama_clase_e_migrações.pdf -> Diagrama de classes e estrutura das migrações

---
## Autor

* **Vinícios Weide Ebling** - [vinicioswe2005@gmail.com](mailto:vinicioswe2005@gmail.com)
