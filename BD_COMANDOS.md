# CRIANDO BANCO DE DADOS
CREATE DATABASE nome_tabela;

# INSERIR DADO NA TABELA --------------------------------------------------------------------
INSERT INTO usuarios (nome, email, senha, data_nascimento) VALUES ("André Luiz", "andreluizmicro@gmail.com","123456","1987-12-21");
INSERT INTO usuarios (nome, email, senha, data_nascimento) VALUES ("Paulo Silva", "paulo@gmail.com","654321","1989-12-25");




# COMANDO SELECT --------------------------------------------------------------------

SELECT nome, email FROM usuarios;

SELECT * FROM usuarios;




# COMANDO INSERT --------------------------------------------------------------------

# FUNCIONA APENAS NOS BANCOS DE DADOS MYSQL
INSERT INTO usuarios SET nome = 'Cricrano', email = 'cicrano@gmail.com', senha = '123', data_nascimento = '2010-10-05';

# PADRÃO INTERNACIONAL - FUNCIONA EM TODOS OS BANCOS SQL
INSERT INTO usuarios (nome, email, senha, data_nascimento) VALUES ('José', 'jose@gmail.com', '111', '1956-10-14');




# COMANDO UPDATE --------------------------------------------------------------------

UPDATE usuarios SET senha = '999' WHERE id = '1';

UPDATE usuarios SET nome = 'Zezin' WHERE email = 'jose@gmail.com';





# COMANDO DELETE --------------------------------------------------------------------

DELETE FROM usuarios WHERE id = 4;

DELETE FROM usuarios WHERE email = 'jose@gmail.com';



 
# FILTRANDO COM WHERE --------------------------------------------------------------------

SELECT * FROM usuarios WHERE id = 1 OR id = 3;

SELECT * FROM usuarios WHERE email = 'andreluizmicro@gmail.com' AND senha = '999';

SELECT * FROM usuarios WHERE (email = 'andreluizmicro@gmail.com' AND senha = '999') OR (email = 'jose@gmail.com');



# LIKE, BETWEEN E IN --------------------------------------------------------------------

# LIKE
SELECT * FROM usuarios WHERE nome LIKE 'And%'; # nome começa com 

SELECT * FROM usuarios WHERE nome LIKE '%va'; # termina com

SELECT * FROM usuarios WHERE email LIKE '%@bol%'; # contem esse trecho no email

# BETWEEN
SELECT * FROM usuarios WHERE data_nascimento BETWEEN '1985-12-20' AND '1990-12-20'; # está entre duas datas 

# IN
SELECT * FROM usuarios WHERE id IN (1, 6); # seleciona onde id estiver dentro dessa lista


# FILTRANDO COM HAVING --------------------------------------------------------------------

SELECT * FROM usuarios HAVING id = 6;


# CONSULTAS COM HAVING ALIAS - ATALHOS - USAR HAVING EM CONJUNTO COM WHERE
# HAVING CONSULTA PÓS PROCESSAMENTO

SELECT (id+10) as soma FROM usuarios; # cria uma coluna temporária

SELECT *, (id+10) as soma FROM usuarios HAVING soma < 15; # com WHERE SOMA DA ERRO! 




# ORDER BY E LIMIT --------------------------------------------------------------------

SELECT * FROM usuarios ORDER BY data_nascimento ASC;

SELECT * FROM usuarios ORDER BY data_nascimento DESC;

SELECT * FROM usuarios WHERE nome LIKE '%a%' ORDER BY nome ASC;

SELECT * FROM usuarios ORDER BY nome ASC LIMIT 2;

SELECT * FROM usuarios LIMIT 1, 2; # pula o primeiro e retorna 2




# GROUP BY --------------------------------------------------------------------
# Agrupamento de informações

# QUANTAS PESSOAS TEM EM CADA FAIXA SALARIAL

# SELECT COUNT(*) as contagem FROM usuarios WHERE `faixa-salarial` = 1;

SELECT COUNT(*) as contagem, faixa_salarial FROM usuarios GROUP BY faixa_salarial;




# CONSULTAS AVANçADAS COM JOIN --------------------------------------------------------------------

# JOIN -> faz relação entre as tabelas


# INNER JOIN -> Só retorna os casos bem sucedidos, portanto não retorna o usuario fantasma da tabela usuarios
SELECT usuarios.nome, faixas.titulo FROM usuarios INNER JOIN faixas ON faixas.id = usuarios.faixa_salarial;

# LEFT JOIN -> Retorna todos os usuarios da tabela da esquerda no caso usuario, independente de ter ou não relações
SELECT usuarios.nome, faixas.titulo FROM usuarios LEFT JOIN faixas ON faixas.id = usuarios.faixa_salarial;

# RIGH JOIN Retorna todos as faixas da tabela da direita no caso faixas, independente de ter ou não relações - !!!Dificilmente usado!!!
SELECT usuarios.nome, faixas.titulo FROM usuarios RIGHT JOIN faixas ON faixas.id = usuarios.faixa_salarial; 

SELECT usuarios.id, usuarios.nome, usuarios.email, usuarios.data_nascimento, faixas.titulo as faixa FROM usuarios LEFT JOIN faixas ON faixas.id = usuarios.faixa_salarial;




# SUBCONSULTAS COM SUBQUERY --------------------------------------------------------------------
# NÃO É RECOMENDADOS DEVIDO AO PROCESSAMENTO POIS ELE GERA MUITAS CONSULTAS

SELECT usuarios.nome, (select faixas.titulo from faixas where faixas.id = usuarios.faixa_salarial) as faixa FROM usuarios;

# FORMA CORRETA - FAZ APENAS UMA CONSULTA
SELECT usuarios.nome FROM usuarios LEFT JOIN faixas ON faixas.id = usuarios.faixa_salarial WHERE faixas.titulo  = '0 - 1000';





# CRIAÇÃO DE FUNÇOES ----------------------------------------------------------------------------

DELIMITER $$ 
CREATE FUNCTION CONTAR(nome VARCHAR(100))
	RETURNS INT(10)
	BEGIN
		DECLARE qt INT(10);
		SET qt = LENGTH(nome);
		RETURN qt;
	END

SELECT nome, email, CONTAR(nome) as contagem from usuarios;


DELIMITER $$
CREATE FUNCTION SOMAR(x INT(10), y INT(10))
	RETURNS INT(10)
	BEGIN
		DECLARE r int(10);
		SET r = x + y;
		RETURN r; 
	END
	

DELIMITER ;
	
SELECT SOMAR(5,4) as soma;


# VIEWS - TABELA FALSA(TABELA VIRTUAL) ----------------------------------------------------------------------------

# CRIAMOS UMA VIEW CHAMADA usuariosprimeirafaixa A PARTIR DA TABELA DE USUARIOS E PODEMOS CONSULTAR A VIEW
# BOM PARA CASOS DE TABELAS MUITO GRANDES, COM ISSO PODEMOS DIMINUIR A TABELA COM UMA VIEW E CONSULTAR A VIEW
# ISSO MELHORA O PROCESSAMENTO.

CREATE VIEW usuariosprimeirafaixa AS
	SELECT * FROM usuarios WHERE faixa_salarial = 1;

SELECT * FROM usuariosprimeirafaixa; # tabela virtual gerada - REPLICA DA ORIGINAL



# SELECT ALL
SELECT * FROM usuarios;












