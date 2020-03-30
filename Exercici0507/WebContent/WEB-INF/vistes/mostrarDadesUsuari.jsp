<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="${pageContext.request.contextPath}/recursos/css/estil.css"/>
<title>mostrarDadesUsuari.jsp</title>
</head>
<body>

	<h3>MOSTRAR DADES DE L'USUARI ${usuari.nom}</h3>
	<table>	
		<tr>
		<td>DNI:</td>
		<td> ${usuari.dni } </td>
		</tr>
		<tr>
		<td>Nom:</td> 
		<td>${usuari.nom } </td>
		</tr>
		<tr>
		<td>Cognom:</td> 
		<td>${usuari.cognom }</td>
		</tr> 
		<tr>
		<td>Contrasenya:</td>
		<td> ${usuari.contrasenya } </td>
		</tr>
		<tr>
		<td>Departament:</td>
		<td> ${usuari.departament } </td>
		</tr>
		<tr>
		<td>Data de creació:</td>
		<td> ${usuari.dataCreacio } </td>
		</tr>
	</table>
</body>
</html>