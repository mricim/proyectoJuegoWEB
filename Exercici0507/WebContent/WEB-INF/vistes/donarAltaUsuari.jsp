<%@ taglib prefix="form" uri="http://www.springframework.org/tags/form"%>
	<%@ page import="practica05_07.Personal" %>
	<%Personal usuari = (Personal) request.getAttribute("usuari"); %>
	<%String error = (String) request.getAttribute("error"); %>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="${pageContext.request.contextPath}/recursos/css/estil.css"/>
<title>donarAltaUsuari.jsp</title>
</head>
<body>

	<h3>DONAR ALTA NOU USUARI</h3>

	<% if (!error.equals("")) { %>
		<p class="error">${error}</p>
	<%} %>
	<br>
	<table>
		<form action="formulariDonarAltaUsuari" method="post">
			<tr>
				<td>DNI usuari: </td>
				<td>
					<input type="text" name="dni"/>
					<form:errors path="dni" style="color:red"/> 
				</td>
			</tr>
			<tr>
				<td>Nom usuari: </td>
				<td><input type="text" name="nom"/> </td>
			</tr>
			<tr>
				<td>Contrasenya: </td>
				<td><input type="password" name="contrasenya"/></td>
			</tr>
			<tr>
				<td>Departament </td>
				<td>
					<input type="text" name="departament"/>
					<form:errors path="departament" style="color:red"/>
				</td>
			<tr>
				<td colspan="2"><input type="submit" value="Registrar"></td>
		</form>
	</table>
</body>
</html>