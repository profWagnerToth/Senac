create database aeroclube;
use aeroclube;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);
select * from users;

create table alunos
(
idAluno int auto_increment primary key,
nomeAluno varchar (100),
dtNasc date,
enderecoAluno varchar(255),
bairroAluno varchar(255), 
cidadeAluno varchar(100),
estadoAluno varchar(2), 
foneAluno varchar(14),
fotoAluno varchar(255),
ativo int(1) default 1
);

create table instrutores
(
idInstrutor int auto_increment primary key,
nomeInstrutor varchar (100),
matriculaInstrutor int (20),
enderecoInstrutor varchar (100),
cidadeInstrutor varchar(100),
estadoInstrutor varchar(2),
bairroInstrutor varchar(100),
dataNascInstrutor date,
breveInstrutor varchar (20),
foneInstrutor varchar(14),
fotoInstrutor varchar(255),
ativo int(1) default 1
);

select * from instrutores;

create table formacoes_Adicionais
(
idFormAdd int auto_increment primary key,
nomeFormacao varchar (100),
cargaHoraria varchar(10),
ativo int(1) default 1
);


select * from formacoes_Adicionais;

create table formacoesInstrutores
(
idFormInstrutores int auto_increment primary key,
dataObtencao date ,
matriculaInstrutor int,
idFormAdd int,
idInstrutor int,
constraint fk_idFormAdd foreign key (idFormAdd) references formacoes_Adicionais(idFormAdd),
constraint fk_idInstr_Extra foreign key (idInstrutor) references instrutores (idInstrutor)
);

select * from formacoesInstrutores;


SELECT formacoes_adicionais.idFormAdd, formacoes_adicionais.nomeFormacao, formacoes_adicionais.cargaHoraria, formacoesInstrutores.dataObtencao  FROM formacoes_adicionais
inner join formacoesInstrutores on formacoesInstrutores.idFormAdd = formacoes_adicionais.idFormAdd WHERE formacoes_adicionais.idFormAdd = 2;


SELECT * FROM formacoesInstrutores
            JOIN instrutores ON formacoesInstrutores.idInstrutor = instrutores.idInstrutor
            JOIN formacoes_Adicionais ON formacoesInstrutores.idInstrutor = formacoes_Adicionais.idFormAdd;
            
            
SELECT i.idInstrutor, i.nomeInstrutor, fa.idFormAdd, f.nomeFormacao FROM instrutores i
        INNER JOIN formacoesinstrutores f ON i.idInstrutor = f.idInstrutor
        INNER JOIN formacoes_adicionais fa ON i.idFormADD = fa.idFormAdd WHERE i.ativo = 1 ORDER BY i.nomeInstrutor ASC;      
        
select instrutores.idInstrutor, formacoesInstrutores.idFormAdd, formacoes_adicionais.nomeFormacao FROM formacoesInstrutores
inner join formacoes_adicionais on formacoes_adicionais.idFormAdd = formacoesInstrutores.idFormAdd
inner join instrutores on formacoesInstrutores.idFormAdd = instrutores.idInstrutor where instrutores.ativo = 1 order by instrutores.nomeInstrutor ASC;

create table registros_voos
(
idRegVoo int auto_increment primary key,
dataSaida date,
horaSaida time,
horaRetorno time,
tempoVoo time,
idAluno int,
idInstr int,
constraint fk_idAluno foreign key (idAluno) references alunos(idAluno),
constraint fk_idInstr foreign key (idInstr) references instrutores (idInstr)
);



create table pareceres
(
idParecer int auto_increment primary key,
parecer varchar (256),
idRegVoo int,
constraint fk_idRegVoo foreign key (idRegVoo) references registros_voos(idRegVoo)
);

create table breves_emitidos
(
idBreve int auto_increment primary key,
numBreve varchar (10),
idAluno int,
constraint fk_idAluno_breve foreign key (idAluno) references alunos(idAluno)
);

select * from instrutores;

insert into instrutores (matriculaInstr, nomeInstr, endInstr, idadeInstr, breveInstr) values
("1234", "Mario Sobrinho Domenech", "Av. Congonhas, 1234", "48", "12345-6"),
("1358", "João Pereira", "Av. Paulista, 456", "45", "12456-7"),
("1536", "Maria Fernandes", "R. dos Comercios, 101", "42", "13548-9"),
("1010", "Larissa Oliveira", "R. do Porto, 303", "55", "10123-4");

select * from instrutores;

insert into formacoes_Adicionais (nomeFormacao) values
("Piloto Acrobacias"),
("Piloto Comercial"),
("Piloto Privado"),
("Piloto Planador");

insert into alunos (nomeAluno) values
("Bruno de Paula"),
("Rogerio Pupo");

insert into formacoesInstrutores (dataObt, idInstr, IdFormAdd, matriculaInst) values
("2000-05-24", 2, 4, "12456-7"),
("2015-04-19", 4, 1, "10123-4"),
("1981-03-25", 1, 3, "12345-6"),
("1996-08-30", 3, 2, "13548-9");

select * from formacoesInstrutores;
select * from registros_voos;

insert into registros_voos (dataSaida, horaSaida, horaRetorno, tempoVoo, idAluno, IdInstr) values
("2024-01-15", "10:00", "11:30", "01:30", 2, 3),
("2024-01-15", "09:35", "11:35", "02:00", 1, 4),
("2024-03-23", "11:30", "12:00", "00:30", 1, 2),
("2024-05-16", "08:00", "09:00", "01:00", 2, 3);

insert into pareceres (parecer, idRegVoo) values
("Decolagem e Aterrissagem suave voô com pequenas turbulencias devido variações de ventos durante o voô", 1),
("Decolagem e Aterrissagem sincronizada com a equipe de manobras, manobras de força 3G realizadas", 2),
("Condução do Planador realizada com efeciecia", 3),
("Voô realizado e condições adversas devido condições climáticas, porem sem intercorrencias", 4);


select * from breves_emitidos;

insert into breves_emitidos (numBreve, idAluno) values
("15123-4", 2),
("15124-5", 1);

select * from instrutores;
select * from alunos;
select * from breves_emitidos;
select * from formacoes_Adicionais;
select * from registros_voos;

select * from instrutores;

select nome,dataNasc from amigos where nome="Gustavo" order by dataNasc;

#tarefas
#exercicio 1 Retorne is campos matriculaInstrutor, nomeInstrutor, breveInstr para o instrutor com ID = 3
select idInstr,matriculaInstr,nomeInstr,breveInstr from instrutores where idInstr=3;

#exercicio 2 Retorne o nome da formaçao, nome do instrutor, nome do instrutor, a idade atual do instrutor, que realuzou a obtenção no dia 25/03/1981
select * from formacoesInstrutores;
select * from instrutores;
select * from formacoes_Adicionais;
select formacoes_Adicionais.nomeFormacao, instrutores.nomeInstr, dataObt from formacoesInstrutores
inner join formacoes_adicionais on formacoesInstrutores.idFormAdd=formacoes_adicionais.idFormAdd
inner join instrutores on formacoesInstrutores.idInstr=instrutores.idInstr
where formacoesInstrutores.dataObt="1981-03-25";

#exercicio 3 Retornar todas as formações possiveis que um Instrutor pode fazer
select * from formacoes_Adicionais;
select * from registros_voos;

#exercicio 4 Retorne o nome do piloto e quando obteve a formação de Piloto de Acrobacia
select * from formacoesInstrutores;
select * from formacoes_Adicionais;
select instrutores.nomeInstr, formacoes_Adicionais.nomeFormacao from formacoesInstrutores
inner join instrutores on formacoesInstrutores.idInstr=instrutores.idInstr
inner join formacoes_Adicionais on formacoesInstrutores.idFormAdd=formacoes_Adicionais.idFormAdd
where formacoes_Adicionais.nomeFormacao="Piloto Acrobacias";

#exercicio 5 Retorne o nome do aluno cujo voo foi o id 2
select alunos.nomeAluno, instrutores.nomeInstr from registros_voos
inner join alunos on registros_voos.idAluno=alunos.idAluno
inner join instrutores on registros_voos.idInstr=instrutores.idInstr
where registros_voos.idRegVoo=2;

#exercicio 6 Retorne o nome do aluno, nome do instrutor, numero do voo do parecer 3
select * from pareceres;
select * from registros_voos;
select alunos.nomeAluno, instrutores.nomeInstr, registros_voos.idRegVoo from pareceres
inner join registros_voos on pareceres.idRegVoo=registros_voos.idRegVoo
inner join alunos on registros_voos.idAluno=alunos.idAluno
inner join instrutores on registros_voos.idInstr=instrutores.idInstr
where pareceres.idRegVoo=3;

#exercicio 7 Quais são os pareceres dados ao aluno Rogerio em seus voos
select * from pareceres;
select * from registros_voos;
select * from alunos;

select registros_voos.idRegVoo, alunos.nomeAluno, pareceres.parecer from pareceres
inner join registros_voos on pareceres.idRegVoo=registros_voos.idRegVoo
inner join alunos on registros_voos.idAluno=alunos.idAluno
where alunos.nomeAluno="Rogerio Pupo";

#exercicio 8 - Retorne o nome do aluno, nome do instrutor, o tempo de voo e o parecer recebido para o voo realizado no dia 16-05-2024
select * from pareceres;
select * from registros_voos;
select * from alunos;
select * from instrutores;

select alunos.nomeAluno, instrutores.nomeInstr, registros_voos.tempoVoo, pareceres.parecer from registros_voos
inner join alunos on registros_voos.idAluno=alunos.idAluno
inner join instrutores on registros_voos.idInstr=instrutores.idInstr
inner join pareceres on registros_voos.idRegVoo=pareceres.idRegVoo
where registros_voos.dataSaida="2024-05-16";

#exercicio 9 - Mostre o nome do aluno, do breve obtido e os pareceres recebidos nos voos par o aluno Bruno de Paula
select * from pareceres;
select * from registros_voos;
select * from alunos;
select * from instrutores;
select * from breves_emitidos;

select alunos.nomeAluno, breves_emitidos.numBreve, pareceres.parecer from breves_emitidos
inner join registros_voos on breves_emitidos.idAluno=registros_voos.idAluno
inner join alunos on breves_emitidos.idAluno=alunos.idAluno
inner join pareceres on registros_voos.idRegVoo=pareceres.idRegVoo
where alunos.nomeAluno="Bruno de Paula";

#exercicio 10 - Mostre o nome do instrutor, os pareceres dados por ele, a data do voo, hora de saida e chegada para aluno Bruno de Paula
select * from instrutores;
select * from pareceres;
select * from registros_voos;

select instrutores.nomeInstr, pareceres.parecer, registros_voos.dataSaida, registros_voos.horaSaida, registros_voos.horaRetorno, registros_voos.tempoVoo from registros_voos
inner join alunos on registros_voos.idAluno=alunos.idAluno
inner join instrutores on registros_voos.idInstr=instrutores.idInstr
inner join pareceres on registros_voos.idRegVoo=pareceres.idRegVoo
where alunos.nomeAluno="Bruno de Paula";

#exercicio 11 - Relacione o nome dos alunos e seus respectivos breves
select * from alunos;
select * from breves_emitidos;
select * from pareceres;
select * from registros_voos;

select alunos.nomeAluno, breves_emitidos.numBreve from breves_emitidos
inner join alunos on breves_emitidos.idAluno=alunos.idAluno;
*/


