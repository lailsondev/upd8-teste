-- SQL que retorna todos os representantes de uma determinada cidade.

SELECT
    r.id AS representante_id,
    r.nome AS representante_nome,
    r.telefone AS representante_telefone,
    c.nome AS cidade_nome,
    c.estado AS cidade_estado
FROM
    representantes r
JOIN
    cidades c ON r.cidade_id = c.id
WHERE
    c.id = 3;