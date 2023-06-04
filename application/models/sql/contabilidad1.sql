
use educayso_facae;
create view contabilidad1 as select cont.idcontabilidad, (select concat(COALESCE(pe.apellidos,'')," ",COALESCE(pe.nombres,'')) from persona pe,beneficiario bene where cont.idbeneficiario=bene.idbeneficiario and bene.idpersona=pe.idpersona LIMIT 1) as elbeneficiario,(select concat(COALESCE(pe.apellidos,'')," ",COALESCE(pe.nombres,'')) from persona pe,pagador paga where cont.idpagador=paga.idpagador and paga.idpersona=pe.idpersona LIMIT 1) as elpagador , cont.detalle, cont.fechacontabilidad, cont.valor from contabilidad cont;


