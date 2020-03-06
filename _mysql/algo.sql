-- ordena paginas
update ns_encuestas_preguntas_alimentos epa
set epa.pagina = (select o.orden from ns_orden_preguntas o where o.id_alimento = epa.id_alimento)


select id_encuesta_pregunta_alimento, pagina, orden, id_encuesta, encuesta, id_pregunta, codigo, pregunta, id_modulo, modulo, id_alimento, alimento, tipo_medida, medida, tipo, respuesta, url_foto1, valor_foto1, url_foto2, valor_foto2, url_foto3, valor_foto3 from vw_get_preguntas where pagina = 66 order by pagina, orden
