# Generador de _Firma de correo electrónico_ corporativa

Según el [Manual de Identidad Corporativa de la Junta de Andalucía] (pág. 309), la firma de los correos electrónicos deben tener una apariencia determinada:

> La firma de correo elecrónico es una de las aplicaciones de marca que tiene más uso y visibililidad en el día a día de la entidad. Su diseño ha de ser sencillo y funcional, basado en elementos básicos de la identidad corporativa, adaptados a las condiciones de este medio en concreto.

Este _aplicativo_ sirve para generar el pie de firma en un documento HTML con el formato descrito.

Consiste en:

* index.html
  * Formulario web que toma los datos con los que se va a generar la firma.
* generar.php
  * Script en PHP que recibe los datos del formulario web anterior y genera un documento HTML con el pie de firma.
* res/
  * Archivos de imágenes y hojas de estilo.

## Referencias

* [Manual de Identidad Corporativa de la Junta de Andalucía]:
  * [Versión actualizada a 26/04/2021]: páginas 309 y 310.


[Manual de Identidad Corporativa de la Junta de Andalucía]: https://juntadeandalucia.es/organismos/presidenciaadministracionpublicaeinterior/areas/comunicacion-social/identidad-corporat-JdA.html
[Versión actualizada a 26/04/2021]: https://juntadeandalucia.es/export/drupaljda/Manual-IC-JdA-_26-4-21.pdf
