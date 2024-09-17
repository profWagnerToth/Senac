#criar banco de dados
create database aero_clube;

#apontar banco de dados para trabalhar
use aero_clube;

#criação de tabelas

create table login
(
idLogin int auto_increment primary key,
usuario varchar(255),
senha varchar(40),
dtCriacao timestamp default current_timestamp
);

insert into login (usuario, senha) values
("admin","1234");

select * from login;

create table instrutores
(
idInstrutor int auto_increment primary key,
idMatriculaInstrutor int,
nomeInstrutor varchar(100),
enderecoInstrutor varchar(100),
idadeInstrutor int,
breveInstrutor varchar(10)
);

#adicionando campos na tabela instrutores
alter table instrutores add column
(
bairroInstrutor varchar(100),
cidadeInstrutor varchar(50),
estadoInstrutor enum ("Acre","Alagoas","Amapá","Amazonas","Bahia","Ceará","Distrito Federal","Espírito Santo","Goiás",
"Maranhão","Mato Grosso","Mato Grosso do Sul","Minas Gerais","Pará","Paraíba","Paraná","Pernambuco","Piauí","Rio de Janeiro",
"Rio Grande do Norte","Rio Grande do Sul","Rondônia","Roraima","Santa Catarina","São Paulo","Sergipe","Tocantins","Escolha o Estado") default "Escolha o Estado",
contatoInstrutor varchar(14),
dtCadastro timestamp default current_timestamp
);

alter table instrutores add column
(
ativo enum("0","1") default "1"
);

select * from instrutores;

#inserção dados na tabela
insert into instrutores (idMatriculaInstrutor,nomeInstrutor,enderecoInstrutor,idadeInstrutor,breveInstrutor) values
(1234,	"Mário Sobrinho Domenech",	"Av. Congonhas 1234",	48,	"12345-6"),
(1358,	"João Pereira",	"Av. Paulista 456",	45,	"12456-7"),
(1536,	"Maria Fernandes",	"R. dos Comercios 101",	42,	"13548-9"),
(1010,	"Larissa Oliveira",	"R. do Porto 303",	55,	"10123-4");

create table formacoesAdicionais
(
idFormacao int auto_increment primary key,
nomeFormacao varchar(100)
);

insert into formacoesAdicionais (nomeFormacao) values
("Piloto Acrobacias"),
("Piloto Comercial"),
("Piloto Privado"),
("Piloto Planador");

create table instrutorXformacao
(
idFormacaoXInstrutor int auto_increment primary key,
dataObtencao date,
idInstrutor int,
idFormacao int,
matriculaInstrutor int,
constraint fkidInstrutor foreign key(idInstrutor) references instrutores(idInstrutor),
constraint fkidFormacao foreign key(idFormacao) references formacoesAdicionais(idFormacao)
);

insert into instrutorXformacao (dataObtencao,idInstrutor,idFormacao,matriculaInstrutor) values
("2000-05-24",2,4,"12456-7"),
("2015-04-19",4,1,"10123-4"),
("1981-03-25",1,3,"12345-6"),
("1996-08-30",3,2,"13548-9");

create table alunos
(
idAluno int auto_increment primary key,
nomeAluno varchar(100)
);

#adicionando campos na tabela alunos
alter table alunos add column
(
enderecoAluno varchar(255),
bairroAluno varchar(100),
cidadeAluno varchar(50),
estadoAluno enum ("Acre","Alagoas","Amapá","Amazonas","Bahia","Ceará","Distrito Federal","Espírito Santo",
"Goiás","Maranhão","Mato Grosso","Mato Grosso do Sul","Minas Gerais","Pará","Paraíba","Paraná","Pernambuco",
"Piauí","Rio de Janeiro","Rio Grande do Norte","Rio Grande do Sul","Rondônia","Roraima","Santa Catarina","São Paulo",
"Sergipe","Tocantins","Escolha o Estado") default "Escolha o Estado",
contatoAluno varchar(14),
dtCadastro timestamp default current_timestamp
);

alter table alunos add column
(
ativo enum("0","1") default "1"
);

select * from alunos; 
insert into alunos (nomeAluno) values
("Bruno de Paula"),
("Rogerio Pupo");

create table RegistroVoos
(
idRegistroVoo int auto_increment primary key,
dataSaida date,
horaSaida time,
horaChegada time,
tempoVoo time,
idAluno int,
idInstrutor int,
constraint fkIdAluno_voo foreign key(idAluno) references alunos(idAluno),
constraint fkIdInstrutor_voo foreign key(idInstrutor) references instrutores(idInstrutor)
);

insert into registroVoos (dataSaida,horaSaida,horaChegada,tempoVoo,idAluno,idInstrutor) values
("2024-01-15","10:00","11:30","01:30",2,3),
("2024-01-15","09:35","11:35","02:00",1,4),
("2024-03-23","11:30","12:00","00:30",1,2),
("2024-05-16","08:00","09:00","01:00",2,3);

create table pareceres
(
idParecer int auto_increment primary key,
parecer varchar(256),
idRegistro int,
constraint fkIdRegistro_parecer foreign key(idRegistro) references registroVoos(idRegistroVoo)
);

insert into pareceres (parecer,idRegistro) values
("Decolagem e Aterrissagem suave voô com pequenas turbulencias devido variações de ventos durante o voô",	1),
("Decolagem e Aterrissagem sincronizada com a equipe de manobras, manobras de força 3G realizadas",	2),
("Condução do Planador realizada com efeciecia",	3),
("Voô realizado e condições adversas devido condições climáticas, porem sem intercorrencias",	4);

create table brevesEmetidos
(
idBreve int auto_increment primary key,
numeroBreve int,
idAluno int
);

insert into brevesEmetidos (numeroBreve, idAluno) values
("15123-4",	2),
("15124-5",	1);

#Atividade de Seleção em banco de dados

#01. Retorne os campos matriculaInstrutor, nomeInstrutor, breveInstrutor do instrutor com idInstrutor 3.
Select idmatriculaInstrutor, nomeInstrutor, breveInstrutor from instrutores where idInstrutor=3;

#2.	Retorne o nome da formação, nome do instrutor, a idade atual do instrutor, que realizou a obtenção no dia 25/03/1981.
select * from formacoesAdicionais;
select * from Instrutores;
select * from instrutorXformacao;

select instrutores.nomeInstrutor, instrutores.idadeInstrutor, formacoesAdicionais.nomeFormacao 
from instrutorXformacao
inner join instrutores on instrutorXformacao.idInstrutor=instrutores.idInstrutor
inner join formacoesAdicionais on instrutorXformacao.idFormacao=formacoesAdicionais.idFormacao
where dataObtencao="1981-03-25";

#3.	Liste todas as formações possíveis que um instrutor pode fazer
select * from formacoesAdicionais;

#4.	Retorne o nome do piloto e quando obteve a formação de piloto de acrobacia.
select * from formacoesAdicionais;
select * from Instrutores;
select * from instrutorXformacao;

select instrutores.nomeInstrutor from instrutores
inner join instrutorXformacao on instrutores.idInstrutor = instrutorXformacao.idInstrutor
inner join formacoesAdicionais on instrutorXformacao.idFormacao = formacoesAdicionais.idFormacao
where formacoesAdicionais.nomeFormacao="Piloto Acrobacias";

#5.	Retorne o nome do aluno e o nome do instrutor que esteve no voo 2
select * from alunos;
select * from instrutores;
select * from registroVoos;

select alunos.nomeAluno, instrutores.nomeInstrutor from registroVoos
inner join alunos on registroVoos.idAluno = alunos.idAluno
inner join instrutores on registroVoos.idInstrutor = instrutores.idInstrutor
where registroVoos.idRegistroVoo=2;

#6.	Retorne o nome do aluno, nome do instrutor, número do voo do parecer 3.
select * from pareceres;

select alunos.nomeAluno, instrutores.nomeInstrutor, registroVoos.idRegistroVoo
from pareceres
inner join registroVoos on pareceres.idRegistro = registroVoos.idRegistroVoo
inner join alunos on registroVoos.idAluno = alunos.idAluno
inner join instrutores on registroVoos.idInstrutor = instrutores.idInstrutor
where idParecer = 4;

#7. Quais são os pareceres dados ao aluno Rogerio Pupo em seus voos
select * from pareceres;
select * from alunos;
select * from registroVoos;

select registroVoos.idRegistroVoo, alunos.nomeAluno, parecer from pareceres
inner join registroVoos on pareceres.idRegistro = registroVoos.idRegistroVoo
inner join alunos on registroVoos.idAluno = alunos.idAluno
where alunos.nomeAluno="Rogerio Pupo";

#8. Retorne o nome do aluno, nome do instrutor, o tempo de voo e o parecer recebido para o voo realizado no dia 16-05-2024
Select alunos.nomeAluno, instrutores.nomeInstrutor, registroVoos.tempoVoo, pareceres.parecer from registroVoos
inner join alunos on registroVoos.idAluno = alunos.idAluno
inner join instrutores on registroVoos.idInstrutor = instrutores.idInstrutor
inner join pareceres on registroVoos.idRegistroVoo = pareceres.idRegistro
where registroVoos.dataSaida="2024-05-16";

#9. Mostre o nome do aluno, o numero do breve obtido e os pareceres recebidos nos voos para o aluno Bruno de Paula.


#10. Mostre o nome do instrutor, os pareceres dados por ele, a data do voo, hora de saida e chegada para o aluno Bruno de Paula


#11. Relacione o nome dos alunos e seus respectivos breves.










