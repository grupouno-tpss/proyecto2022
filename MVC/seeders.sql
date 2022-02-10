/*ROLES*/
INSERT INTO
    roles (id_rol, rol)
VALUES
(1, "CLIENTE");

INSERT INTO
    roles (id_rol, rol)
VALUES
(2, "TRABAJADOR");

INSERT INTO
    roles (id_rol, rol)
VALUES
(3, "ADMINISTRADOR");

/*schedules*/

INSERT INTO `schedules`(`id_schedule`, `schedule`, `status`) VALUES (1,'3:30','AVAILABLE');
INSERT INTO `schedules`(`id_schedule`, `schedule`, `status`) VALUES (2,'4:30','AVAILABLE');
INSERT INTO `schedules`(`id_schedule`, `schedule`, `status`) VALUES (3,'5:30','AVAILABLE');

INSERT INTO `schedules`(`id_schedule`, `schedule`, `status`) VALUES (4,'6:30','AVAILABLE');

/*menu categories*/
INSERT INTO `menu_categories`(`id_menu_categories`, `category`) VALUES (1,'GRANOS');
INSERT INTO `menu_categories`(`id_menu_categories`, `category`) VALUES (2,'VERDURAS');
INSERT INTO `menu_categories`(`id_menu_categories`, `category`) VALUES (3,'BEBIDAS');

