--1
SELECT numProcessoSocorro
FROM Acciona
GROUP BY numProcessoSocorro
HAVING COUNT(numProcessoSocorro) =
	(SELECT max(c)
	FROM
		(SELECT numProcessoSocorro, COUNT(numProcessoSocorro) AS c
		FROM Acciona
		GROUP BY numProcessoSocorro) t);


--2
SELECT nomeEntidade
FROM Acciona NATURAL JOIN EventoEmergencia
WHERE instanteChamada > '2018-06-21 00:00:00'
AND instanteChamada < '2018-09-23 00:00:00'
GROUP BY nomeEntidade
HAVING COUNT(numprocessosocorro) =
	(SELECT MAX(c)
	FROM
		(SELECT nomeEntidade, COUNT(numProcessoSocorro) c
		FROM Acciona NATURAL JOIN EventoEmergencia
		WHERE instanteChamada > '2018-06-21 00:00:00'
		AND instanteChamada < '2018-09-23 00:00:00'
		GROUP BY nomeEntidade ) t);


--3
SELECT numProcessoSocorro
From Acciona NATURAL JOIN EventoEmergencia
WHERE numProcessoSocorro NOT IN
    (SELECT numProcessoSocorro
    FROM Audita)
AND moradaLocal = 'Oliveira do Hospital'
AND instanteChamada > '2018-01-01 00:00:00'
AND instanteChamada < '2018-12-31 00:00:00';



--4
SELECT COUNT (numSegmento)
FROM vigia NATURAL JOIN SegmentoVideo
WHERE duracao > 60
AND dataHoraInicio >= '2018-08-01 00:00:00'
AND dataHoraInicio <= '2018-08-31 00:00:00';


--5
SELECT C.numMeio, C.nomeEntidade
FROM MeioCombate C
WHERE (c.numMeio, c.nomeEntidade) NOT IN
	(SELECT A.numMeio, A.nomeEntidade
	FROM MeioApoio A NATURAL JOIN Acciona);

--6
SELECT C.nomeEntidade
FROM MeioCombate C
WHERE NOT EXISTS(
    (SELECT S.nomeEntidade
    FROM Acciona S)
    EXCEPT
    (SELECT N.nomeEntidade
    FROM Acciona NATURAL JOIN MeioCombate N));
