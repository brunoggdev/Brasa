
<div class="bloco-titulo">
    <h1 class="titulo">
        B
        R
        A
        S
        A
    </h1>
    <h2 class="subtitulo">Novo projeto CodeIgniter 4</h2>
</div>

<article>
    <section>
        <h4>> Iniciando</h4>
        <p>
            Utilize o comando do Brasa <tt>php spark make:env</tt>&nbsp;para gerar um novo arquivo .env na raiz do projeto e pronto!
        </p>
    </section>
    <section>
        <h4>> Login</h4>
        <p>
            Primeiro, crie um novo banco de dados. Depois, no .env, edite o campo <cite>database.default.database</cite> para o nome do seu banco de dados.
            Em seguida, utilize os comandos <tt>php spark migrate</tt>&nbsp;para criar uma tabela de usuarios pré-configurada 
            e <tt>php spark db:seed usuarios</tt>&nbsp;para popular a tabela com dois usuarios predefinidos: usuario1 que é admin e usuario2 que é 
            usuario comum, com senha 1234 para ambos. <br><br>
            Com o banco de dados populado, você pode acessar a página de <a href="<?=base_url('/login')?>">login</a> e utilizar o usuario predefinido. 
            Se tudo foi feito corretamente, você deverá ver uma simples página de área restrita com um botão para logout.
        </p>
    </section>
    <section>
        <h4>> Lembre-se</h4>
        <p>
            A documentação sempre será sua melhor amiga. Confira a documentação oficial do CodeIgniter4 <a href="https://codeigniter.com/user_guide/intro/index.html">aqui</a> e a breve documentação deste projeto no repositório do github <a href="https://github.com/brunoggdev/Brasa">aqui</a>.
        </p>
    </section>
</article>
