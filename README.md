# Brasa

## O que é?

Brasa é um boilerplate para CodeIgniter 4, ou seja, uma base para projetos contendo diversas funcionalidades pré-configuradas
e comentadas em português para ajudar desenvolvedores brasileiros a iniciar seus projetos em CodeIgniter4 mais rapidamente, mesmo os iniciantes.

<br/>

## Baterias inclusas

Por padrão, Brasa vem com importação de CDNs do *JQuery* e *Bootstrap*, mas que podem ser facilmente removidas se necessário, bem como a estilização inicial,
bastando apenas comentar ou apagar suas importações no header e footer que estão na pasta de templates das views.

O projeto conta ainda com:

- Diversas funções auxiliares para tornar o código mais prático, limpo e legível;
- Sistemas básicos de roteamento e autenticação,bem como níveis de acesso de usuário;
- Exemplos de controllers, models, migrations, seeders, estrutura de views e muito mais.

<br/>

## Utilizando o Brasa

Após baixar o projeto, execute o comando "php spark serve" no terminal na raiz do projeto para inciar o servidor e então
conferir a página inicial que contem instruções sobre como iniciar o projeto.

Todas as funções auxiliares estão no arquivo "Common.php" dentro da pasta app, você pode conferir o arquivo pra saber o que mais tem
a sua disposição e, por estarem devidamente comentadas, sua IDE deve te ajudar a identifica-las. Sinta-se também livre para adicionar
quaisquer outras funções que quiser neste arquivo.

<br/>

## Ademais

Brasa, apesar de funcional, é ainda um projeto em desenvolvimento, então estarei realizando algumas melhorias aos poucos, principalmente
nesta pequena documentação, com melhores exemplos de uso e afins. Até lá, sinta-se a vontade para entrar em contato comigo se tiver quaisquer
dúvidas ou até mesmo sugestões.


Obrigado por checar o Brasa!

<br/>

# CodeIgniter 4 Framework

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds the distributable version of the framework.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
