Projeto simples, criado apenas para aprender a manipular cookies e arquivos com o PHP e Laravel.

Como usar:

1º Passo: Instalar o pacote AMP (Apache, MySQL e PHP) ou ter um servidor que possua ele instalado.

2º Passo: Instalar o composer, e com o composer criar a pasta que se deseja inserir o projeto.

3º Passo: Ao criar o projeto laravel com o composer, copiar para pasta do projeto os Models,os Controllers, as Views e o arquvo de rotas (web.php).

no caso do Laravel, os arquivos estão localizados respectivamente em "projeto"/app/(cole os Models aqui), "projeto"/app/Htpp/Controllers/(cole os Controllers aqui), "projeto"/resources/views/(cole as Views aqui, e apague a View de "welcome") e por último substituir o arquivo de rotas que está localizado em "projeto"/routes/(cole o arquivo aqui).

4º Passo: Deverá ser alterado o arquivo session.php que está localizado em "projeto"/config/session.php e nele deve ser alterado a propriedade "expire_on_close" que deve ser modificada para TRUE.

5º Passo: Deverá ser alterado o arquivo filesystems.php localizado em "projeto"/config/filesystems.php, e nele deverá ser alterado a prorpiedade "default", que conterá o valor local e deve ser alterada para public, criando um link simbólico dentro da pasta public rodando o comando "php artisan storage:link", que vai criar um link simbólico para a pasta "projeto"/storage/app/public/(aqui fica a pasta criada por mim, no caso a images).

6º Passo: Criação do banco de dados desejado, no caso deste projeto foi usado um banco MySQL, após a criação do banco deve ser alterado o arquivo .env localizado na raíz do projeto "projeto"/.env e nele deve ser inserido o usuário, o nome do banco de dados e a senha do usuário.

OBS: Na parte de exclusão de postagens, o recurso de remover as imagens armazenadas no servidor pode variar de acordo com o SO utilizado, no meu caso foi utilizado o W10 e funcionou perfeitamente, mas poderá ser necessário alterá-la de acordo com o SO.

Com isso já deve ser possível utilizar o sistema.
