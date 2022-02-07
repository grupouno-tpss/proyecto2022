/*Roles*/
INSERT INTO
    roles_usuario (idrol_usuario, rol)
VALUES
    (1, "CLIENTE");

INSERT INTO
    roles_usuario (idrol_usuario, rol)
VALUES
    (2, "TRABAJADOR");

INSERT INTO
    roles_usuario (idrol_usuario, rol)
VALUES
    (3, "ADMINISTRADOR");

/*Estado reserva*/
INSERT INTO
    `estados`(`idestado`, `estado`)
VALUES
    (1, "ACTIVO");

INSERT INTO
    `estados`(`idestado`, `estado`)
VALUES
    (2, "ARCHIVADO");


INSERT INTO `horarios`(`id_horario`, `hora`, `estado`) VALUES ('1','3:30','DISPONIBLE');
INSERT INTO `horarios`(`id_horario`, `hora`, `estado`) VALUES ('2','4:30','DISPONIBLE');
INSERT INTO `horarios`(`id_horario`, `hora`, `estado`) VALUES ('3','5:30','DISPONIBLE');
INSERT INTO `horarios`(`id_horario`, `hora`, `estado`) VALUES ('4','6:30','DISPONIBLE');
INSERT INTO `horarios`(`id_horario`, `hora`, `estado`) VALUES ('5','7:30','DISPONIBLE');

/*HORARIOS*/

INSERT INTO `horarios`(`id_horario`, `hora`, `estado`) VALUES (1,'3:30','DISPONIBLE');
INSERT INTO `horarios`(`id_horario`, `hora`, `estado`) VALUES (2,'4:30','DISPONIBLE');
INSERT INTO `horarios`(`id_horario`, `hora`, `estado`) VALUES (3,'5:30','DISPONIBLE');
INSERT INTO `horarios`(`id_horario`, `hora`, `estado`) VALUES (4,'5:30','DISPONIBLE');
INSERT INTO `horarios`(`id_horario`, `hora`, `estado`) VALUES (5,'6:30','DISPONIBLE');
