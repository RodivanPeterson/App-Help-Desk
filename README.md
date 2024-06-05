# App Help Desk

## Descrição

Este é um projeto de estudo de PHP, focado em criar uma aplicação de Help Desk para abertura e consulta de chamados de TI. Neste projeto, foram aplicados alguns conhecimentos de PHP, como manipulação de arquivos, sessões, autenticação de usuários e controle de acesso.

## Funcionalidades

- **Abertura de Chamados**: Os usuários podem abrir novos chamados de TI especificando o título, categoria e descrição do problema.
- **Consulta de Chamados**: 
  - Usuários não administradores podem consultar apenas os chamados que abriram.
  - Administradores podem visualizar todos os chamados.
- **Autenticação**: O sistema permite login de diferentes usuários, incluindo a distinção entre administradores e usuários comuns.
- **Controle de Acesso**: Páginas restritas apenas para usuários autenticados.

## Estrutura do Projeto

O projeto está organizado da seguinte forma:

```
/chamados
  arquivo.hd               # Arquivo de texto que armazena os chamados

/components
  menu.php                 # Menu comum incluído nas páginas

/images
  formulario_abrir_chamado.png
  formulario_consultar_chamado.png
  logo.png

/screens
  abrir_chamado.php        # Página para abertura de chamados
  consultar_chamado.php    # Página para consulta de chamados
  home.php                 # Página inicial após o login

/scripts
  logout.php               # Script para logout
  registra_chamado.php     # Script para registrar novos chamados
  valida_login.php         # Script para validar login de usuários
  validador_acesso.php     # Script para validar acesso às páginas restritas

/style
  estilo_menu.css          # Estilo CSS para o menu

aprimoramentos_de_usabilidade.md # Documento de melhorias planejadas
index.php                  # Página de login
README.md                  # Este arquivo

```

## Detalhes Técnicos

### Manipulação de Arquivos

Os chamados são armazenados em um arquivo de texto [(`arquivo.hd`)](./chamados/arquivo.hd). Cada linha do arquivo representa um chamado, e os campos são separados pelo caractere `#`.

### Sessões e Autenticação

A autenticação dos usuários é gerenciada por sessões PHP. Quando um usuário faz login com sucesso, suas informações (como ID e perfil) são armazenadas na sessão. O acesso às páginas restritas é controlado pelo script [`validador_acesso.php`](./scripts/validador_acesso.php), que verifica se a sessão está autenticada.

### Controle de Acesso

- Usuários não administradores podem visualizar apenas os chamados que eles próprios abriram.
- Administradores podem visualizar todos os chamados.

### Estilo e Usabilidade

- O projeto utiliza Bootstrap 4 para a estilização das páginas, garantindo um design responsivo e moderno.
- Melhorias de usabilidade são documentadas no arquivo [`aprimoramentos_de_usabilidade.md`](./aprimoramentos_de_usabilidade.md).

## Como Executar o Projeto

1. Clone este repositório para o seu ambiente local.
2. Inicie um servidor PHP embutido como o [XAMPP](https://www.apachefriends.org/pt_br/index.html) ou configure um servidor web com suporte a PHP.
3. Acesse a página de login em [`index.php`](./index.php) e utilize uma das credenciais de exemplo para fazer login.

## Credenciais de Exemplo

- Administrador: 
  - Email: `adm@teste.com.br`
  - Senha: `1234`
- Usuário Comum: 
  - Email: `user@teste.com.br`
  - Senha: `1234`

Todas as credenciais estão inseridas no projeto de maneira hardcoded, no início do arquivo [`valida_login.php`](./scripts/valida_login.php).

## Próximos Passos

- Implementar a persistência dos dados utilizando PDO e um banco de dados relacional.
- Adicionar validações e melhorias de segurança.
- Implementar novas funcionalidades como edição, definição de status e fechamento de chamados.
- Implementar módulos interativos de conteúdos na página [`home.php`](./screens/home.php).
- Repaginar o visual completo da aplicação.

## Licença

Este projeto é licenciado sob a [MIT License](./LICENSE).