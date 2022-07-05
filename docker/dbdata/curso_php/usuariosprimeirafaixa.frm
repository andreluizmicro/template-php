TYPE=VIEW
query=select `curso_php`.`usuarios`.`id` AS `id`,`curso_php`.`usuarios`.`nome` AS `nome`,`curso_php`.`usuarios`.`email` AS `email`,`curso_php`.`usuarios`.`senha` AS `senha`,`curso_php`.`usuarios`.`data_nascimento` AS `data_nascimento`,`curso_php`.`usuarios`.`faixa_salarial` AS `faixa_salarial` from `curso_php`.`usuarios` where (`curso_php`.`usuarios`.`faixa_salarial` = 1)
md5=703d148437a36f055c79898b83309103
updatable=1
algorithm=0
definer_user=root
definer_host=%
suid=2
with_check_option=0
timestamp=2022-07-01 17:21:51
create-version=1
source=SELECT * FROM usuarios WHERE faixa_salarial = 1
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=select `curso_php`.`usuarios`.`id` AS `id`,`curso_php`.`usuarios`.`nome` AS `nome`,`curso_php`.`usuarios`.`email` AS `email`,`curso_php`.`usuarios`.`senha` AS `senha`,`curso_php`.`usuarios`.`data_nascimento` AS `data_nascimento`,`curso_php`.`usuarios`.`faixa_salarial` AS `faixa_salarial` from `curso_php`.`usuarios` where (`curso_php`.`usuarios`.`faixa_salarial` = 1)
