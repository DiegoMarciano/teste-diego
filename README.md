# Teste Diego

Documento de exlicação sobre o desafio de CRUD de usuários e serviços.

# Desenvolvedor

Diego Perez Marciano <diegopmarciano@gmail.com>

# Configuração do ambiente

Instlação de aplicações necessárias:

- Apache 2
- Php
- MySQL

# Arquivos

Arquivos deste repositório:

- README.md: este arquivo
- schema.sql: arquivo de carga do banco de dados mySQL
- www: pasta com arquivos do servidor web

# Observações

- Foi adicionado campo "nome de usuário" na tabela users que não constava no arquivo de exemplo, mas constava no layout
- Campo "senha" do exemplo continha apenas 45 caracteres e foi modifcado para 60 para utilizar a função `hash_password`
- Foi inserido no layout um botão para finalizar cada um dos serviços individualmente
- Foi adicionado um link para "sair" do dashboard
- No layout do cadastro do usuário foi adicionado o campo "nome"
